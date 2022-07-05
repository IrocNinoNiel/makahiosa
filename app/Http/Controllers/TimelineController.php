<?php

namespace App\Http\Controllers;

use App\Models\Sarf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TimelineController extends Controller
{
    public function index() {
        return view('timeline.timeline');
    }

    public function getAllEvent() {

        // $events = Sarf::with('org')->get();

        $events = DB::table('sarves')
            ->join('users', 'users.id', '=', 'sarves.organization_id')
            ->join('user_information', 'users.id', '=', 'user_information.user_id')
            ->select('sarves.*', 'users.email', 'user_information.orgname')
            ->get();

        return response()->json([
            'events' => $events,
        ]);

    }
}
