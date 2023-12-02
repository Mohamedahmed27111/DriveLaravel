<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user;

class UserController extends Controller
{
    public function profile(){
    $id = auth()->user()->id;
    $user = User::find($id);
    return view("user.profile", compact('user'));
    }

    public function Uploadimg(Request $request){
        $id = auth()->user()->id;
        $user = User::find($id);

        $file_data = $request->file("image");
        $drive_name =time() . $file_data->getClientOriginalName();
        $location = public_path("./users");
        $file_data ->move($location,$drive_name);
        $user->image = $drive_name;
       $user->save();
       return redirect()->back()->with("done","Upload Done ");

    }
}
