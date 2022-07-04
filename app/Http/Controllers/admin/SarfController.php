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

    public function show(Sarf $sarf) {
        return view('admin.sarf.show')->with('sarf',$sarf);
    }
    public function changeStatus(Request $request, Sarf $sarf) {

        // $sarf = Sarf::find($id);
        $sarf->status = $request->status;
        $sarf->save();

        return back();
    }
}
