<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\User;
use DB;
use Auth;

class UserController extends Controller
{
    //
    public function index(){
        $posts = DB::table('posts')->where('user_id', '=', Auth::user()->id)->get();
        return view('admin/user/profile', ['post' => $posts]);
    }

    public function update(Request $request){
        $user = User::find(Auth::user()->id);
        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->address = $request->address;
        $user->birthday = $request->birthday;
        if($request->avatar != "")
            $user->avatar = $request->avatar;

        $user->save();
        Auth::user()->name = $user->name;
        Auth::user()->email = $user->email;
        Auth::user()->mobile = $user->mobile;
        Auth::user()->address = $user->address;
        Auth::user()->birthday = $user->birthday;
        Auth::user()->avatar = $user->avatar;


        return $user;
    }

    public function getList(){
        $data = User::get();
        return view('admin/user/list', ['data' => $data]);
    }
}