<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\College;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\UserInformation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreBasicInfo;
use App\Http\Requests\UpdateEmailInfo;
use App\Http\Requests\UpdateImageInfo;
use App\Http\Requests\StoreUserRequest;
use App\Models\DefaultPassword;

class UserController extends Controller
{
    public function index() {

        $organizations = User::where('is_admin','=',false)->where('status','=',true)->get();
        return view('admin.user.index')->with('organizations', $organizations);
    }

    public function show(User $user) {
        return view('admin.user.show')->with('user',$user);
    }

    public function create() {

        $colleges = College::where('id','!=',1)->where('status','=',true)->get();
        return view('admin.user.create')->with('colleges', $colleges);
    }

    public function store(StoreUserRequest $request) {

        $random_password = Str::random(8);

        $user = new User;
        $user->email = $request->email_input;
        $user->password = Hash::make($random_password);
        $user->save();

        DefaultPassword::create([
            'user_id'=>$user->id,
            'password'=>$random_password,
        ]);

        $userinformation =  new UserInformation;
        $userinformation->user_id = $user->id;
        $userinformation->college_id = $request->college_id;
        $userinformation->orgname = $request->orgname;
        $userinformation->adviser = $request->adviser;
        $userinformation->representative = $request->representative;
        $userinformation->vision = $request->vision;
        $userinformation->mission = $request->mission;

        $imageName = $user->id.''.time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $userinformation->image = $imageName;
        $userinformation->save();

        return redirect()->route('user.index');
    }

    public function edit(User $user) {

        $colleges = College::where('id','!=',1)->where('status','=',true)->get();
        return view('admin.user.edit')->with('user',$user)->with('colleges', $colleges);
    }

    public function updateBasicInformation(StoreBasicInfo $request, User $user ){

        $user->information->update($request->validated());
        return redirect()->route('user.index')->with('success','Basic Information Updated');

    }

    public function updateEmail(UpdateEmailInfo $request, User $user ){

        $user->update($request->validated());
        return redirect()->route('user.index')->with('success','Email Information Updated');

    }

    public function updatePassword(Request $request, User $user ){

        if (!Hash::check($request['oldpassword'], $user->password)) {
            return back()->withErrors(["oldpassword" => "Invalid Password"])->withInput();
        }

        $request->validate([
            'password'      => 'required|confirmed|min:8',
        ]);

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('user.index')->with('success','Password Information Updated');
    }

    public function updateImage(UpdateImageInfo $request, User $user) {

        File::delete($user->information->image);

        $imageName = $user->id.''.time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $user->information->image = $imageName;
        $user->information->save();

        return redirect()->route('user.index')->with('success','Image Updated');
    }

}


// <?php

// namespace App\Http\Controllers;

// use App\Models\User;
// use App\Models\College;
// use Illuminate\Http\Request;
// use App\Models\UserInformation;
// use Illuminate\Support\Facades\File;
// use Illuminate\Support\Facades\Hash;
// use App\Http\Requests\StoreBasicInfo;
// use App\Http\Requests\UpdateEmailInfo;
// use App\Http\Requests\UpdateImageInfo;
// use App\Http\Requests\StoreUserRequest;

// class UserController extends Controller
// {
//     public function index() {

//         $organizations = User::where('is_admin','=',false)->where('status','=',true)->get();
//         return view('user.index')->with('organizations', $organizations);
//     }

    // public function create() {

    //     $colleges = College::where('id','!=',1)->where('status','=',true)->get();
    //     return view('user.create')->with('colleges', $colleges);
    // }

    // public function store(StoreUserRequest $request) {


    //     $user = new User;
    //     $user->email = $request->email_input;
    //     $user->password = Hash::make($request->password);
    //     $user->save();

    //     $userinformation =  new UserInformation;
    //     $userinformation->user_id = $user->id;
    //     $userinformation->college_id = $request->college_id;
    //     $userinformation->orgname = $request->orgname;
    //     $userinformation->adviser = $request->adviser;
    //     $userinformation->representative = $request->representative;
    //     $userinformation->vision = $request->vision;
    //     $userinformation->mission = $request->mission;

    //     $imageName = $user->id.''.time().'.'.$request->image->extension();
    //     $request->image->move(public_path('images'), $imageName);

    //     $userinformation->image = $imageName;
    //     $userinformation->save();

    //     return redirect()->route('user.index');
    // }

    // public function edit(User $user) {

    //     $colleges = College::where('id','!=',1)->where('status','=',true)->get();
    //     return view('user.edit')->with('user',$user)->with('colleges', $colleges);
    // }

    // public function updateBasicInformation(StoreBasicInfo $request, User $user ){

    //     $user->information->update($request->validated());
    //     return redirect()->route('user.index')->with('success','Basic Information Updated');

    // }

    // public function updateEmail(UpdateEmailInfo $request, User $user ){

    //     $user->update($request->validated());
    //     return redirect()->route('user.index')->with('success','Email Information Updated');

    // }

    // public function updatePassword(Request $request, User $user ){

    //     if (!Hash::check($request['oldpassword'], $user->password)) {
    //         return back()->withErrors(["oldpassword" => "Invalid Password"])->withInput();
    //     }

    //     $request->validate([
    //         'password'      => 'required|confirmed|min:8',
    //     ]);

    //     $user->password = Hash::make($request->password);
    //     $user->save();

    //     return redirect()->route('user.index')->with('success','Password Information Updated');
    // }

    // public function updateImage(UpdateImageInfo $request, User $user) {

    //     File::delete($user->information->image);

    //     $imageName = $user->id.''.time().'.'.$request->image->extension();
    //     $request->image->move(public_path('images'), $imageName);

    //     $user->information->image = $imageName;
    //     $user->information->save();

    //     return redirect()->route('user.index')->with('success','Image Updated');
    // }

// }
