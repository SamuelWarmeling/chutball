<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserLedger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(Request $request)
    {
        $ref_by = $request->query('inviteCode');
        return view('app.auth.registration', compact('ref_by'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'phone' => ['required', 'numeric', 'unique:users,phone'],
            'password' => ['required'],
            'ref_by' => ['nullable'],
            ]);
            
            
            
        if ($validate->fails()){
            $user = User::where('phone', $request->phone)->first();
            if ($user){
                return back()->with('message', ' There is an account at this number');
            }
            return back()->with('message', $validate->errors());
        }

        $getIp = \Request::ip();

//        $checkUserIp = DB::table('users')->where('ip', $getIp)->exists();
//        if ($checkUserIp){
//            return back()->with('message', 'An account exists in your device');
//        }

        $refBy = null;
        if ($request->filled('ref_by')) {
            $getUser = User::where('ref_id', $request->ref_by)->first();
            if ($getUser){
                $refBy = $getUser->ref_id;
                $first_level_users = User::where('ref_by', $getUser->ref_id)->count();
                if ($first_level_users <= setting('total_member_register_reword')){
                    $getUser->rebate_balance = $getUser->rebate_balance + setting('total_member_register_reword_amount');
                    $getUser->save();

                    if (setting('total_member_register_reword_amount') > 0)
                    {
                        $ledger = new UserLedger();
                        $ledger->user_id = $getUser->id;
                        $ledger->reason = 'rebate';
                        $ledger->perticulation = 'Congratulations. number of member '. $first_level_users . ' register rebate received';
                        $ledger->amount = setting('total_member_register_reword_amount');
                        $ledger->debit = setting('total_member_register_reword_amount');
                        $ledger->status = 'approved';
                        $ledger->date = now();
                        $ledger->save();
                    }
                }
            }
        }

        //Check refer code is next time edit
        $user = User::create([
            'name' => 'User'.rand(22,99),
            'username' => 'uname'.$request->phone,
            'ref_id' => $this->ref_code().$this->ref_code(),
            'ref_by' => $refBy,
            'email' => 'user'.rand(11111,99999).time().'@gmail.com',
            'password' => Hash::make($request->password),
            'type' => 'user',
            'phone' => $request->phone,
            'balance' => setting('registration_bonus'),
            'ip' => $getIp,
            'remember_token' => Str::random(30),
        ]);

        if ($user){

            if (setting('registration_bonus') > 0){
                $ledger = new UserLedger();
                $ledger->user_id = $user->id;
                $ledger->reason = 'rebate';
                $ledger->perticulation = 'Congratulations. you have received registration bonus.';
                $ledger->amount = setting('registration_bonus');
                $ledger->debit = setting('registration_bonus');
                $ledger->status = 'approved';
                $ledger->date = now();
                $ledger->save();
            }

            Auth::login($user);

            return redirect()->route('dashboard');
        }else{
            return back()->with('message', 'Registration Fail');
        }

    }

    public function ref_code()
    {
        $str1 = strtolower(Str::random(3));
        $rand = rand(000,999);

        if (rand(111,999) % 2 == 0){
            $refCode = $str1.$rand;
        }else{
            $refCode = $rand.$str1;
        }
        return $refCode;
    }
}
