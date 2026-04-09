<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Bonus;
use App\Models\BonusLedger;
use App\Models\Purchase;
use App\Models\User;
use App\Models\UserLedger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SpinController extends Controller
{
    public function spin()
    {
        return view('app.main.spin.index');
    }

    public function spin_history()
    {
        return view('app.main.spin_history');
    }

    public function submitBonusCodeconfirm(Request $request)
    {
        Validator::make($request->all(), [
            'code' => 'required'
        ]);

        $code = $request->code;
        $bonus = Bonus::where('status', 'active')->first();
        $user = Auth::user();
        if ($bonus) {
            if ($code == $bonus->code) {
                //Check this bonus use this user.
                $checkBonusUses = BonusLedger::where('bonus_id',$bonus->id)->where('user_id', $user->id)->first();
                if ($checkBonusUses){
                    return response()->json(['status' => false, 'message' => 'You have already used this bonus code.']);
                }

                if ($bonus->counter < $bonus->set_service_counter) {
                    User::where('id', $user->id)->update([
                        'balance'=> $user->balance + $bonus->amount
                    ]);

                    //User Ledger
                    $ledger = new UserLedger();
                    $ledger->user_id = $user->id;
                    $ledger->reason = 'lucky';
                    $ledger->perticulation = 'congratulations '.$user->name. ' successfully';
                    $ledger->amount = $bonus->amount;
                    $ledger->debit = $bonus->amount;
                    $ledger->status = 'approved';
                    $ledger->date = date('d-m-Y H:i');
                    $ledger->save();

                    Bonus::where('id', $bonus->id)->update([
                        'counter'=> $bonus->counter + 1
                    ]);

                    $bonus_ledger = new BonusLedger();
                    $bonus_ledger->user_id = $user->id;
                    $bonus_ledger->bonus_id = $bonus->id;
                    $bonus_ledger->bonus_code = $request->code;
                    $bonus_ledger->save();

                    return response()->json(['status' => true, 'message' => 'Successfully get your promotion bonus.']);
                } else {
                    return response()->json(['status' => false, 'message' => 'Today our Earned Target Bonus members use it']);
                }
            } else {
                return response()->json(['status' => false, 'message' => 'The code you entered is invalid']);
            }
        } else {
            return response()->json(['status' => false, 'message' => 'Code not found']);
        }
    }



    public function submitbonusamount($bonus_code)
    {
        $code = $bonus_code;
        $bonus = Bonus::where('status', 'active')->first();
        $user = Auth::user();
        if ($bonus) {
            if ($code == $bonus->code) {
                //Check this bonus use this user.
                $checkBonusUses = BonusLedger::where('bonus_id',$bonus->id)->where('user_id', $user->id)->first();
                if ($checkBonusUses){
                    return response()->json(['status' => false, 'message' => 'First national substance']);
                }

                $amount = rand(3, $bonus->amount);

                if ($bonus->counter < $bonus->set_service_counter) {
                    User::where('id', $user->id)->update([
                        'balance'=> $user->balance + $amount
                    ]);

                    //User Ledger
                    $ledger = new UserLedger();
                    $ledger->user_id = $user->id;
                    $ledger->reason = 'rebate';
                    $ledger->perticulation = 'Success '.price($amount);
                    $ledger->amount = $amount;
                    $ledger->debit = $amount;
                    $ledger->status = 'approved';
                    $ledger->date = date('d-m-Y H:i');
                    $ledger->save();

                    Bonus::where('id', $bonus->id)->update([
                        'counter'=> $bonus->counter + 1
                    ]);

                    $bonus_ledger = new BonusLedger();
                    $bonus_ledger->user_id = $user->id;
                    $bonus_ledger->bonus_id = $bonus->id;
                    $bonus_ledger->bonus_code = $bonus_code;
                    $bonus_ledger->save();

                    return response()->json(['status' => true, 'message' => 'Successful', 'amount'=> price($amount)]);
                } else {
                    return response()->json(['status' => false, 'message' => 'Members who have achieved the target have completed the use']);
                }
            } else {
                return response()->json(['status' => false, 'message' => 'Invalid code']);
            }
        } else {
            return response()->json(['status' => false, 'message' => 'Invalid code']);
        }
    }
}
