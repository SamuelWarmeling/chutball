<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Bet;
use App\Models\FootballMatch;
use App\Models\Fund;
use App\Models\FundInvest;
use App\Models\Package;
use App\Models\Purchase;
use App\Models\Rebate;
use App\Models\User;
use App\Models\UserLedger;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    public function purchaseConfirmation($id)
    {
        $match = FootballMatch::findOrFail($id);

        return view('app.main.vip_details', compact('match'));
    }

    public function submitBet(Request $request, $id)
    {
        $match = FootballMatch::findOrFail($id);
        $user = Auth::user();
        $rebate = Rebate::first();

        $data = $request->validate([
            'selection' => 'required|in:home,draw,away',
            'stake' => 'required|numeric|min:20',
            'bet_type' => 'required|in:guaranteed,free',
        ]);

        $stake = (float) $data['stake'];
        $betType = $data['bet_type'];
        $betLimit = user_bet_limit($user);

        if ($betLimit <= 0) {
            return redirect()->back()->with('error', 'Seu nivel atual ainda nao permite apostas.');
        }

        if ($stake > $betLimit) {
            return redirect()->back()->with('error', 'Essa aposta excede o limite do seu nivel.');
        }

        if ($betType === 'guaranteed' && user_guaranteed_bets_today($user) >= 3) {
            return redirect()->back()->with('error', 'Voce atingiu o limite de 3 apostas garantidas hoje.');
        }

        if ($betType === 'free' && $stake < 50) {
            return redirect()->back()->with('error', 'A aposta sem garantia exige no minimo R$ 50,00.');
        }

        if ($stake > $user->balance) {
            return redirect()->back()->with('error', 'Saldo insuficiente.');
        }

        $odds = match ($data['selection']) {
            'home' => $match->home_odds,
            'draw' => $match->draw_odds,
            default => $match->away_odds,
        };

        $selectionLabel = match ($data['selection']) {
            'home' => $match->home_team,
            'draw' => 'Empate',
            default => $match->away_team,
        };

        User::where('id', $user->id)->update([
            'balance' => $user->balance - $stake,
            'investor' => 1,
        ]);

        $bet = Bet::create([
            'user_id' => $user->id,
            'football_match_id' => $match->id,
            'bet_type' => $betType,
            'market' => 'Resultado final',
            'selection' => $selectionLabel,
            'odds' => $odds,
            'stake' => $stake,
            'potential_win' => round($stake * $odds, 2),
            'status' => 'pending',
        ]);

        if ($rebate) {
            $this->applyReferralCommission($user, $stake, $rebate);
        }

        $ledger = new UserLedger();
        $ledger->user_id = $user->id;
        $ledger->reason = 'bet';
        $ledger->perticulation = "Bilhete enviado: {$match->home_team} x {$match->away_team}";
        $ledger->amount = $stake;
        $ledger->credit = $stake;
        $ledger->status = 'approved';
        $ledger->date = now()->format('d-m-Y H:i');
        $ledger->save();

        return redirect()->route('ordered')->with('success', 'Bilhete enviado com sucesso.');
    }


    public function vip_confirm($vip_id)
    {
        $vip = Package::find($vip_id);
        return view('app.main.vip_confirm', compact('vip'));
    }

    protected function ref_user($ref_by)
    {
        return User::where('ref_id', $ref_by)->first();
    }

    protected function applyReferralCommission(User $user, float $stake, Rebate $rebate): void
    {
        $firstRef = User::where('ref_id', $user->ref_by)->first();
        if (! $firstRef) {
            return;
        }

        $levels = [
            ['user' => $firstRef, 'rate' => $rebate->team_commission1, 'column' => 'rb1', 'label' => 'first'],
            ['user' => User::where('ref_id', $firstRef->ref_by)->first(), 'rate' => $rebate->team_commission2, 'column' => 'rb2', 'label' => 'second'],
        ];

        $thirdRef = isset($levels[1]['user']) && $levels[1]['user']
            ? User::where('ref_id', $levels[1]['user']->ref_by)->first()
            : null;

        $levels[] = ['user' => $thirdRef, 'rate' => $rebate->team_commission3, 'column' => 'rb3', 'label' => 'third'];

        foreach ($levels as $level) {
            if (! $level['user']) {
                continue;
            }

            $amount = $stake * $level['rate'] / 100;
            $level['user']->increment($level['column'], $amount);

            $ledger = new UserLedger();
            $ledger->user_id = $level['user']->id;
            $ledger->get_balance_from_user_id = $user->id;
            $ledger->reason = 'commission';
            $ledger->perticulation = 'Comissao de rede por aposta';
            $ledger->amount = $amount;
            $ledger->debit = $amount;
            $ledger->status = 'approved';
            $ledger->step = $level['label'];
            $ledger->date = date('d-m-Y H:i');
            $ledger->save();
        }
    }
}
