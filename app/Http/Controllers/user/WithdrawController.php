<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use App\Models\User;
use App\Models\UserLedger;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Deposit;
use App\Models\Bet;
use App\Models\Purchase;
use Carbon\Carbon;
use Illuminate\Support\Str;

class WithdrawController extends Controller
{
    public function withdraw()
    {
        if(user()->gateway_method == null || user()->gateway_number == null){
            return redirect()->route('user.bank.create');
        }
        return view('app.main.withdraw.index');
    }

    public function withdraw_history()
    {
        return view('app.main.withdraw_history_chutball');
    }

    public function withdrawRequest(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'amount' => 'required|numeric',
            'password' => 'required',
        ]);

        if ($request->amount == null){
            return redirect()->back()->with('error', 'Withdraw the required amount.');
        }

        if ($request->password == null){
            return redirect()->back()->with('error', 'Withdraw the required password.');
        }

        $user = Auth::user();

        if ($validate->fails()) {
            return redirect()->back()->withErrors('errors', $validate->errors());
        }

        if (! empty($user->withdraw_password) && $request->password !== $user->withdraw_password) {
            return redirect()->back()->with('error', 'Senha de saque invalida.');
        }

        if (Bet::where('user_id', $user->id)->count() < 9) {
            return redirect()->back()->with('error', 'O primeiro saque exige pelo menos 9 apostas realizadas.');
        }

        if ($request->amount <= $user->balance) {
            if ($request->amount >= 20) {
                $charge = ($request->amount * 7) / 100;


                //Update User Balance
                $balance = $user->balance - $request->amount;
                User::where('id', $user->id)->update([
                    'balance' => $balance,
                ]);

                //Withdraw
                $withdrawal = new Withdrawal();
                $withdrawal->user_id = $user->id;
                $withdrawal->method_name = $user->gateway_method;
                $withdrawal->number = $user->gateway_number;
                $withdrawal->amount = $request->amount;
                $withdrawal->charge = $charge;
                $withdrawal->oid = rand(000000, 999999) . strtolower(Str::random(5)) . rand(000000, 999999);
                $withdrawal->final_amount = $request->amount - $charge;
                $withdrawal->status = 'pending';
                $withdrawal->save();

                return redirect()->back()->with('success', 'Solicitacao de saque enviada com sucesso.');
            } else {
                return redirect()->back()->with('error', 'O saque minimo e ' . price(20));
            }
        } else {
            return redirect()->back()->with('error', 'Saldo insuficiente');
        }
    }
}
