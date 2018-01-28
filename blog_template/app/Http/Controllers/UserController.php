<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\User;

class UserController extends Controller
{
    public function index(){
    	$posts = DB::table('posts')->where('user_id', '=', Auth::user()->id)->orderBy('updated_at', 'desc')->get();
        return view('admin/user/profile', ['post' => $posts]);
    }
    public function upload_img(Request $request){
        $duoi = explode('.', $_FILES['file']['name']); // tách chuỗi khi gặp dấu .
        $duoi = $duoi[(count($duoi)-1)];//lấy ra đuôi file
        //Kiểm tra xem có phải file ảnh không
        if($duoi === 'jpg' || $duoi === 'png' || $duoi === 'gif' || $duoi === 'jpeg'){
            //tiến hành upload
            $url = 'img/' . $_FILES['file']['name'];
            if(move_uploaded_file($_FILES['file']['tmp_name'], $url)){
                //Nếu thành công
                echo $url;
            } else{ //nếu k thành công
                echo "Có lỗi"; //in ra thông báo
            }
        } else{ //nếu k phải file ảnh
            echo "File không phải ảnh"; //in ra thông báo
        }
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

    public function blog_list(){
        $posts = DB::table('posts')->where('user_id', '=', Auth::user()->id)->orderBy('updated_at', 'desc')->get();
        foreach ($posts as $key => $value) {
            if($value->status == 0)
                $posts[$key]->status = "Chờ duyệt";
            elseif($value->status == 1)
                $posts[$key]->status = "Đã duyệt";
            else
                $posts[$key]->status = "Đã xóa";

            if($value->type == 0)
                $posts[$key]->type = "Truyện ngắn";
            elseif($value->type == 1)
                $posts[$key]->type = "Truyện Blog";
            elseif($value->type == 2)
                $posts[$key]->type = "Tâm sự";
            elseif($value->type == 3)
                $posts[$key]->type = "Tản mản";
            elseif($value->type == 4)
                $posts[$key]->type = "Cuộc sống";
            elseif($value->type = 5)
                $posts[$key]->type = "Gia đình";
            else
                $posts[$key]->type = "Bạn bè";
        }
        return view('admin/user/blog_list', ['post' => $posts]);
    }
}
