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
            /*
            <option value="0">Truyện ngắn</option>
            <option value="1">Truyện Blog</option>
            <option value="2">Tâm sự</option>
            <option value="3">Tản mản</option>
            <option value="4">Cuộc sống</option>
            <option value="5">Gia đình</option>
            */
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
            /*
            <option value="0">Truyện ngắn</option>
            <option value="1">Truyện Blog</option>
            <option value="2">Tâm sự</option>
            <option value="3">Tản mản</option>
            <option value="4">Cuộc sống</option>
            <option value="5">Gia đình</option>
            */
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
    	$data['status'] = $req->status;
    	$data['views'] = $req->views;
    	$data['user_id'] = $req->user_id;
    	$data['slug'] = $data['title'];

        $data = Post::create($data);

        $value = $data;
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

        return $data;
    }

    public function detail(){
    	$slug = $_GET['title'];
    	$data = DB::table('posts')->where('slug', '=', $slug)->get();
    	/*echo "<pre>";
    	print_r($data);
    	echo "</pre>";
    	dd($data);*/
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


}