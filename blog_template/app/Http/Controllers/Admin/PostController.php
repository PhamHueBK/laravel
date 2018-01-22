<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use DB;

class PostController extends Controller
{
    //
    public function index(){
    	$data = DB::table('posts')->where('status', '=', 1)->get();

    	return view('admin/post/index', ['data' => $data, 'controllTitle' => 'Post List']);
    }

    public function index_approve(){
        $data = DB::table('posts')->where('status', '=', 0)->get();

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

        return $data;
    }

    public function detail(){
    	$slug = $_GET['title'];
    	$data = DB::table('posts')->where('slug', '=', $slug)->get();
    	/*echo "<pre>";
    	print_r($data);
    	echo "</pre>";
    	dd($data);*/
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
        return $data;
    }

    public function delete(Request $req){
        $data = Post::find($req->id);
        $id = $req->id;
        $data->delete();

        return $id;
    }


}