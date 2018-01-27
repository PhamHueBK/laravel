<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\User;
use DB;

class PostController extends Controller
{
    //
    public function index(){
    	$data = DB::table('posts')->where('status', '=', 1)->get();
        foreach ($data as $key => $value) {
            $user = User::find($value->user_id);
            $data[$key]->author = $user['name'];

            if($value->type == 0)
                $data[$key]->type = "Truyện ngắn";
            elseif($value->type == 1)
                $data[$key]->type = "Truyện Blog";
            elseif($value->type == 2)
                $data[$key]->type = "Tâm sự";
            elseif($value->type == 3)
                $data[$key]->type = "Tản mản";
            elseif($value->type == 4)
                $data[$key]->type = "Cuộc sống";
            elseif($value->type = 5)
                $data[$key]->type = "Gia đình";
            else
                $data[$key]->type = "Bạn bè";
        }

    	return view('admin/post/index', ['data' => $data, 'controllTitle' => 'Post List']);
    }

    public function index_approve(){
        $data = DB::table('posts')->where('status', '=', 0)->get();
        foreach ($data as $key => $value) {
            $user = User::find($value->user_id);
            $data[$key]->author = $user['name'];
           
            if($value->type == 0)
                $data[$key]->type = "Truyện ngắn";
            elseif($value->type == 1)
                $data[$key]->type = "Truyện Blog";
            elseif($value->type == 2)
                $data[$key]->type = "Tâm sự";
            elseif($value->type == 3)
                $data[$key]->type = "Tản mản";
            elseif($value->type == 4)
                $data[$key]->type = "Cuộc sống";
            elseif($value->type = 5)
                $data[$key]->type = "Gia đình";
            else
                $data[$key]->type = "Bạn bè";
        }
        return view('admin/post/index', ['data' => $data, 'controllTitle' => 'Approve Post']);
    }

    public function create(Request $req){
    	$data['title'] = $req->title;
    	$data['description'] = $req->description;
    	$data['content'] = $req->content;
    	$data['type'] = $req->type;
    	$data['status'] = 1;
    	$data['views'] = $req->views;
    	$data['user_id'] = $req->user_id;
    	$data['slug'] = $data['title'];
        $data['thumbnail'] = $req->thumbnail;

        $data = Post::create($data);

        return $data;
    }

    public function detail(){
    	$slug = $_GET['title'];
    	$data = DB::table('posts')->where('slug', '=', $slug)->get();
    	
        $value = $data[0];
        $user = User::find($value->user_id);
        $data[0]->author = $user['name'];

    	return view('admin/post/detail', ['data' => $data[0]]);
    }
    public function findPost(){
        $slug = $_GET['title'];
        $data = DB::table('posts')->where('slug', '=', $slug)->get();
        $posts = Post::find($data[0]->id);
        return $posts;
    }

    public function update(Request $req){
        $data = Post::find($req->id);
        $data->title = $req->title;
        $data->description = $req->description;
        $data->content = $req->content;
        $data->type = $req->type;
        $data->status = 1;
        if($req->thumbnail != "")
            $data->thumbnail = $req->thumbnail;

        $data->save();

        $value = $data;
        $user = User::find($value->user_id);
        $data->author = $user['name'];

        if($value->type == 0)
            $data->type = "Truyện ngắn";
        elseif($value->type == 1)
            $data->type = "Truyện Blog";
        elseif($value->type == 2)
            $data->type = "Tâm sự";
        elseif($value->type == 3)
            $data->type = "Tản mản";
        elseif($value->type == 4)
            $data->type = "Cuộc sống";
        elseif($value->type = 5)
            $data->type = "Gia đình";
        else
            $data->type = "Bạn bè";
        return $data;
    }

    public function delete(Request $req){
        $data = Post::find($req->id);
        $id = $req->id;
        $data->delete();

        return $id;
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
}