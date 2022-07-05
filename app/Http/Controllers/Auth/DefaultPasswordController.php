<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\DefaultPassword;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;

class DefaultPasswordController extends Controller
{
    public function index(User $user) {

    }

    public function changetoNewPassword(ChangePasswordRequest $request, User $user) {

        $findDefault = DefaultPassword::where('user_id','=',$user->id)->where('password','=',$request->password)->first();
        if($findDefault) {
            return back()->withErrors([
                'password' => 'Password Must not be the same with the default One',
            ])->onlyInput('password');
        }

        // $user->update([
        //     'password'=>
        // ])
    }
}
