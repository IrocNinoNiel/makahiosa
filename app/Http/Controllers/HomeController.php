<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        if(!Auth::user()->is_admin) {
            return view('home');
        }

        return view('homeadmin');
    }

    public function showTimeline() {
        return view('timeline');
    }

    public function showOrganization() {
        return view('organization');
    }

    public function showSarfList() {
        return view('sarflist');
    }

    public function showOrgList() {
        return view('orglist');
    }

    public function showAppList() {
        return view('applist');
    }

}
