<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function users($id) {
        return User::with('information')->where('id','!=',$id)->get();
    }

    public function currentUser($id) {
        return User::with('information')->where('id','=',$id)->firstorfail();
    }

    public function getCurrentMessages($to, $from) {
        return Message::where(function ($query) use ($to, $from) {
                                $query->where('from','=',$from)->where('to','=',$to);
                        })
                        ->orWhere(function ($query) use ($to, $from) {
                            $query->where('from','=',$to)->where('to','=',$from);
                        })
                        ->get();
    }

    public function storeMessage(Request $request) {
        // Message::create([
        //     'to' = $request->to,
        //     'from' = $request->from
        // ]);

        $message = new Message();
        $message->to = $request->to;
        $message->from = $request->from;
        $message->text = $request->text;
        $message->save();

        return 'Message Saved';
    }
}
