<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function change_password()
    {
        return view('app.auth.change_password');
    }

    public function change_password_confirm(Request $request)
    {
        $validate = Validator::make($request->all(), [
           'old_password' => 'required',
           'new_password' => 'required',
           'confirm_password' => 'required',
        ]);

        if ($validate->fails()){
            return back()->with('success', 'All Field Required');
        }

        $user = User::find(Auth::id());
        if (!Hash::check($request->old_password, $user->password)){
            return back()->with('error', 'Password does not match.');
        }

        if ($request->new_password != $request->confirm_password){
            return back()->with('error', 'Confirm password not match.');
        }

        $user->password = Hash::make($request->confirm_password);
        $user->update();

        return back()->with('success', 'Successfully.');
    }

    public function change_tpassword()
    {
        return view('app.auth.change_tpassword');
    }

    public function change_tpassword_confirm(Request $request)
    {
        $validate = Validator::make($request->all(), [
           'new_password' => 'required',
           'confirm_password' => 'required',
        ]);

        if ($validate->fails()){
            return back()->with('success', 'All Field Required');
        }

        $user = User::find(Auth::id());

        if ($request->new_password != $request->confirm_password){
            return back()->with('error', 'Confirm password not match.');
        }

        $user->withdraw_password = $request->confirm_password;
        $user->update();

        return back()->with('success', 'Successfully.');
    }
}
