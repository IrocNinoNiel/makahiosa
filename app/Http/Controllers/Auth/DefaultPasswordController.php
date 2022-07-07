<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\DefaultPassword;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ChangePasswordRequest;

class DefaultPasswordController extends Controller
{
    public function index($email) {
        return view('password.change')->with('email',$email);
    }

    public function changetoNewPassword(ChangePasswordRequest $request, $email) {

        $user = User::where('email','=',$email)->first();
        if(!$user) {
            return back()->withErrors([
                'password' => 'Password Dont Exist on the database',
            ])->onlyInput('password');
        }

        $findDefault = DefaultPassword::where('user_id','=',$user->id)->where('password','=',$request->password)->first();
        if($findDefault) {
            return back()->withErrors([
                'password' => 'Password Must not be the same with the default One',
            ])->onlyInput('password');
        }

        $changeDefault = DefaultPassword::where('user_id','=',$user->id)->firstorfail();
        $changeDefault->status = false;
        $changeDefault->save();

        $user->password = Hash::make($request->password);
        // $user->status = false;
        $user->save();

        return redirect()->route('login');
    }
}
