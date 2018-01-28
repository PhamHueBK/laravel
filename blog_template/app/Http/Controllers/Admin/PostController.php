<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\User;
use App\Tag;
use App\PostTag;
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
        //Lay tag
        $tagArr = $req->tag;
        $tags = array();
        $vt = strpos($tagArr, ',');
        for($i = 0; $i < strlen($tagArr); $i++){
            $length = strlen($tagArr);
            $str = substr($tagArr, 0, $vt);
            if($vt > 0)
                $tagArr = substr($tagArr, $vt+1, $length - strlen($str));
            $tags[] = $str;
            $vt = strpos($tagArr, ',');
        }
        $tags[] = $tagArr;

        //Them moi tag
        foreach ($tags as $tag) {
            if($tag != ""){
                $tagFind = DB::table('tags')->where('slug', '=', $tag)->get();
                //Nếu tồn tại tag này rồi thì thêm mới post_tags
                if(count($tagFind) > 0){
                    $tag_id = $tagFind[0]->id;
                    $post_id = $data->id;
                    $post_tag['tag_id'] = $tag_id;
                    $post_tag['post_id'] = $post_id;
                    PostTag::create($post_tag);
                }
                //Nếu chưa có thì thêm mới trong tags và cả post_tags
                else
                {
                    //Thêm tag
                    $tagAdd['name'] = $tag;
                    $tagAdd['slug'] = $tag;
                    Tag::create($tagAdd);

                    //Thêm post_tags
                    $tag_find_after_create = DB::table('tags')->where('slug', '=', $tag)->get();
                    $post_tag['tag_id'] = $tag_find_after_create[0]->id;
                    $post_tag['post_id'] = $data->id;
                    PostTag::create($post_tag);
                }
            }
            
        }
        

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
        
        $post_tags = DB::table('post_tags')->where('post_id', '=', $data[0]->id)->get();
        if(count($post_tags) > 0){
            foreach ($post_tags as $key => $post_tag) {
                $tag = Tag::find($post_tag->tag_id);
                $posts['tag'] .= $tag['name'].",";
            }
        }
        $posts['tag'] = trim($posts['tag'], ",");
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

        $post_tag_old = DB::table('post_tags')->where('post_id', '=', $data->id)->get();
        $tag_old = array();
        if(count($post_tag_old) > 0){
            foreach ($post_tag_old as $key => $value) {
                //Lay tag
                $tag1 = Tag::find($value->tag_id);
                $tag_old[] = $tag1;
            }
        }
        //Lay tag
        $tagArr = $req->tag;
        $tags = array();
        $vt = strpos($tagArr, ',');
        for($i = 0; $i < strlen($tagArr); $i++){
            $length = strlen($tagArr);
            $str = substr($tagArr, 0, $vt);
            if($vt > 0)
                $tagArr = substr($tagArr, $vt+1, $length - strlen($str));
            $tags[] = $str;
            $vt = strpos($tagArr, ',');
        }
        $tags[] = $tagArr;

        //Them moi tag
        foreach ($tags as $tag) {
            if($tag != ""){
                $tagFind = DB::table('tags')->where('slug', '=', $tag)->get();
                //Nếu tồn tại tag này rồi thì thêm mới post_tags
                if(count($tagFind) > 0){
                    $tag_post_join = DB::table('post_tags')
                                        ->where('post_tags.tag_id', '=', $tagFind[0]->id)
                                        ->where('post_tags.post_id', '=', $data->id)
                                        ->get();
                    if(count($tag_post_join) <= 0){
                        $tag_id = $tagFind[0]->id;
                        $post_id = $data->id;
                        $post_tag['tag_id'] = $tag_id;
                        $post_tag['post_id'] = $post_id;
                        PostTag::create($post_tag);
                    }                }
                //Nếu chưa có thì thêm mới trong tags và cả post_tags
                else
                {
                    //Thêm tag
                    $tagAdd['name'] = $tag;
                    $tagAdd['slug'] = $tag;
                    $tagAdd = Tag::create($tagAdd);

                    //Thêm post_tags
                    $post_tag['tag_id'] = $tagAdd->id;
                    $post_tag['post_id'] = $data->id;
                    PostTag::create($post_tag);
                }
            }
            
        }


        $data->save();
        foreach ($tag_old as $key => $value) {
            if(in_array($value['name'], $tags) == false){
                //xóa các bản ghi có tag_id = $value['id'] trong post_tags
                $post_tags = DB::table('post_tags')->where('tag_id', '=', $value['id'])->get();
                foreach ($post_tags as $post_tag) {
                    $post_tag_rs = PostTag::find($post_tag->id);
                    $post_tag_rs->delete();
                }
            }
        }
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

        //Xóa các bản ghi trong post_tags
        $post_tags = DB::table('post_tags')->where('post_id', '=', $id)->get();
        foreach ($post_tags as $post_tag) {
            $post_tag_rs = PostTag::find($post_tag->id);
            $post_tag_rs->delete();
        }

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