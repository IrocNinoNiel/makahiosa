<?php

namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;
use App\Models\FAQ;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    public function index(){
        $faqs = FAQ::where('status','=',true)->get();
        return view('user.contact.index')->with('faqs',$faqs);
    }
}
