<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Mail\NewUserNotification;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class FeedbackController extends Controller
{
    public function index() {
        return view('mail.index');
    }

    public function send(Request $request) {

        $info = [
            'to'=>'osa@gmail.com',
            'subject'=>'Concern',
            'body'=>$request->concern,
            'from'=>$request->email,
        ];

        Mail::to($info['to'])->send(new NewUserNotification($info));

        return redirect()->route('contact.index')->with('success','Email Send');
    }
}
