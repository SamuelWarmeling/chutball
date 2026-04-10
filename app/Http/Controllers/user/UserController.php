<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Bet;
use App\Models\Checkin;
use App\Models\Deposit;
use App\Models\FootballMatch;
use App\Models\PaymentMethod;
use App\Models\User;
use App\Models\UserLedger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class UserController extends Controller
{
    public function dashboard()
    {
        $matches = collect();
        $recentBets = collect();
        $betsCount = 0;
        $pendingBets = 0;

        if (Schema::hasTable('football_matches')) {
            $matches = FootballMatch::where('status', 'scheduled')
                ->orderBy('starts_at')
                ->get();
        }

        if (Schema::hasTable('bets')) {
            $recentBets = Bet::with('match')
                ->where('user_id', auth()->id())
                ->latest()
                ->take(3)
                ->get();
            $betsCount = Bet::where('user_id', auth()->id())->count();
            $pendingBets = Bet::where('user_id', auth()->id())
                ->where('status', 'pending')
                ->count();
        }

        return view('app.main.index', compact('matches', 'recentBets', 'betsCount', 'pendingBets'));
    }

    public function single_deposit__pay($amount, $channel)
    {
        $channel = PaymentMethod::find($channel);

        if (! $channel) {
            return redirect()->route('user.deposit')->with('error', 'Canal de deposito nao encontrado.');
        }

        if ($channel->type === 'usdt') {
            return view('app.main.deposit.recharge_confirm', compact('amount', 'channel'));
        }

        return view('app.main.deposit.wallet', compact('amount', 'channel'));
    }

    public function payment_Confirm(Request $request)
    {
        $request->validate([
            'channel_id' => ['required', 'integer'],
            'amount' => ['required', 'numeric', 'min:1'],
            'transaction_id' => ['nullable', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:255'],
            'ref' => ['nullable', 'string', 'max:255'],
        ]);

        $channel = PaymentMethod::find($request->channel_id);

        if (! $channel) {
            return redirect()->route('user.deposit')->with('error', 'Canal de deposito invalido.');
        }

        $deposit = new Deposit();
        $deposit->user_id = user()->id;
        $deposit->method_name = $channel->channel ?? $channel->type;
        $deposit->order_id = $request->ref ?: ('dep'.time());
        $deposit->transaction_id = $request->transaction_id;
        $deposit->address = $request->address;
        $deposit->amount = $request->amount;
        $deposit->final_amount = $request->amount;
        $deposit->date = now();
        $deposit->status = 'pending';
        $deposit->save();

        return redirect()->route('user.deposit')->with('success', 'Deposito enviado para analise.');
    }

    public function vip()
    {
        return view('app.main.vip');
    }

    public function vip_details($id)
    {
        $match = FootballMatch::findOrFail($id);

        return view('app.main.vip_details', compact('match'));
    }

    public function purchase_history()
    {
        $bets = Bet::with('match')->where('user_id', auth()->id())->latest()->get();

        return view('app.main.purchase_history', compact('bets'));
    }

    public function history()
    {
        $ledgers = UserLedger::where('user_id', auth()->id())->latest()->get();

        return view('app.main.history', compact('ledgers'));
    }

    public function ordered()
    {
        $bets = Bet::with('match')->where('user_id', auth()->id())->latest()->get();

        return view('app.main.ordered', compact('bets'));
    }

    public function checkin()
    {
        $user = auth()->user();
        $checkinData = checkin_streak_data($user);

        if ($checkinData['checked_today']) {
            return redirect()->back()->with('error', 'Voce ja fez o check-in de hoje.');
        }

        $streak = $checkinData['last_date'] === now()->subDay()->toDateString()
            ? $checkinData['streak'] + 1
            : 1;

        if ($streak > 30) {
            $streak = 1;
        }

        $reward = checkin_reward_for_streak($streak);

        $checkin = new Checkin();
        $checkin->user_id = $user->id;
        $checkin->date = now()->toDateString();
        $checkin->amount = $reward;
        $checkin->save();

        if ($reward > 0) {
            User::where('id', $user->id)->update([
                'balance' => $user->balance + $reward,
            ]);

            $ledger = new UserLedger();
            $ledger->user_id = $user->id;
            $ledger->reason = 'checkin';
            $ledger->perticulation = "Recompensa de check-in de {$streak} dias";
            $ledger->amount = $reward;
            $ledger->debit = $reward;
            $ledger->status = 'approved';
            $ledger->step = 'third';
            $ledger->date = now()->format('d-m-Y H:i');
            $ledger->save();
        }

        $message = $reward > 0
            ? 'Check-in concluido. Voce recebeu '.price($reward).'.'
            : "Check-in concluido. Sequencia atual: {$streak} dia(s).";

        return redirect()->back()->with('success', $message);
    }

    public function recharge_history()
    {
        return view('app.main.deposit_history_chutball');
    }

    public function commission()
    {
        return view('app.main.commission');
    }

    public function package_details($id)
    {
        $match = FootballMatch::findOrFail($id);

        return view('app.main.vip_details', compact('match'));
    }

    public function profile()
    {
        return view('app.main.profile_chutball');
    }

    public function setting()
    {
        return redirect()->route('profile');
    }

    public function recharge()
    {
        return view('app.main.deposit_chutball');
    }

    public function recharge_amount($amount)
    {
        return view('app.main.deposit.recharge_confirm', compact('amount'));
    }

    public function personal_details()
    {
        return view('app.main.update_personal_details');
    }

    public function personal_details_submit(Request $request)
    {
        $user = Auth::user();

        $data = $request->validate([
            'name' => ['nullable', 'string', 'max:255'],
            'username' => ['nullable', 'string', 'max:255', 'unique:users,username,'.$user->id],
            'email' => ['nullable', 'email', 'max:255', 'unique:users,email,'.$user->id],
            'password' => ['nullable', 'string', 'min:6'],
        ]);

        $user->name = $data['name'] ?: $user->name;
        $user->username = $data['username'] ?: $user->username;
        $user->email = $data['email'] ?: $user->email;

        if (! empty($data['password']) && $data['password'] !== '*********') {
            $user->password = Hash::make($data['password']);
        }

        $user->save();

        return redirect()->route('user.personal-details')->with('success', 'Dados atualizados com sucesso.');
    }

    public function setupGateway(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'gateway_method' => ['required', 'string', 'max:255'],
            'gateway_number' => ['required', 'string', 'max:255'],
        ]);

        User::where('id', Auth::id())->update([
            'name' => $request->name,
            'gateway_method' => $request->gateway_method,
            'gateway_number' => $request->gateway_number,
        ]);

        return redirect()->route('user.withdraw')->with('success', 'Informacoes de saque atualizadas.');
    }

    public function invite()
    {
        return view('app.main.invite_chutball');
    }

    public function service()
    {
        return view('app.main.service');
    }

    public function add_bank_create()
    {
        return view('app.main.add_bank_create_chutball');
    }

    public function setting_change_password(Request $request)
    {
        $request->validate([
            'old_password' => ['required'],
            'new_password' => ['required', 'string', 'min:6'],
            'confirm_password' => ['required', 'same:new_password'],
        ]);

        $user = User::findOrFail(Auth::id());

        if (! Hash::check($request->old_password, $user->password)) {
            return redirect()->route('user.change.password')->with('error', 'Senha atual invalida.');
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('user.change.password')->with('success', 'Senha alterada com sucesso.');
    }

    public function download_apk()
    {
        $file = public_path('bpip.apk');

        abort_unless(file_exists($file), 404);

        return response()->file($file, [
            'Content-Type' => 'application/vnd.android.package-archive',
            'Content-Disposition' => 'attachment; filename=\"bpip.apk\"',
        ]);
    }
}
