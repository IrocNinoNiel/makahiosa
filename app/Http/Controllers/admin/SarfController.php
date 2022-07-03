<?php

namespace App\Http\Controllers\admin;

use App\Models\Sarf;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SarfController extends Controller
{
    public function index() {
        $sarfs = Sarf::where('status','=','pending')->get();
        return view('admin.sarf.applist')->with('sarfs', $sarfs);
    }

    public function showEventList() {
        $sarfs = Sarf::where('status','!=','pending')->get();
        return view('admin.sarf.eventlist')->with('sarfs',$sarfs);
    }
}
