<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Tag;
use App\PostTag;
use DB;
use Auth;

class PostController extends Controller
{
    //
    public function index(){
    	$data = DB::table('posts')
    			->where('status', '=', 1)
    			->orderBy('updated_at', 'desc')
    			->get();
        
    	
    	$usersrr = array();
    	foreach ($data as $key => $value) {
    		# code...
    		$usersrr[$value->id] = User::find($value->user_id);
    		$data[$key]->author = $usersrr[$value->id]['name'];
    	}
    	$data_page = array();
    	$num_page = ceil(count($data)/10);

    	if(count($data) >= 10){
    		for($i = 1; $i <= $num_page; $i++){
	    		for($j = 0; $j < 10; $j++){
	    			if(isset($data[($i-1)*10+$j]))
	    				$data_page[$i][] = $data[($i-1)*10+$j];
	    			else
	    				break;
	    		}

    		}

	    	if(isset($_GET['page']))
	    		$page = $_GET['page'];
	    	else
	    		$page = 1;
	    	
			if($page <= $num_page && $page >= 1)
				$post = $data_page[$page];
			elseif($page < 1){
				$post = $data_page[1];
				$page = 1;
			}
			elseif($page > $num_page){
				$post = $data_page[$num_page];
				$page = $num_page;
			}
			else
				$post = $data_page[1];
	    }
	    else
	    {
	    	$page = 1;
	    	$num_page = 0;
	    	$post = array();
	    	$usersrr = array();
	    }
    	return view('blog/index', ['data' => $post, 'page'=>$page, 'number_page'=>$num_page]);
    }

    public function detail(){
    	$slug = $_GET['title'];
    	$post = DB::table('posts')->where('slug', '=', $slug)->get();
        $category_arr = array();
        $categories = DB::table('categories')
                    ->join('post_categories', 'categories.id', '=', 'post_categories.category_id')
                    ->where('post_categories.post_id', '=', $post[0]->id)
                    ->get();
        $category_arr = $categories;

        $tags = DB::table('tags')
                    ->join('post_tags', 'tags.id', '=', 'post_tags.tag_id')
                    ->where('post_tags.post_id', '=', $post[0]->id)
                    ->get();

    	$data = Post::find($post[0]->id);
    	$user = User::find($data['user_id']);
    	$data['author'] = $user['name'];
    	
    	return view('blog/postDetail', ['data' => $data, 'category_arr' => $category_arr, 'tags' => $tags]);
    }

    public function create(Request $req){
    	$data['title'] = $req->title;
    	$data['description'] = $req->description;
    	$data['content'] = $req->content;
    	$data['type'] = $req->type;
    	$data['status'] = Auth::user()->permission;
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
        
        $data->author = Auth::user()->name;
        return $data;
    }

    public function findPostByTag(){
        $slug_tag = $_GET['tag'];
        $tag = DB::table('tags')
                ->where('slug', '=', $slug_tag)
                ->get();
        $posts = DB::table('posts')
                    ->join('post_tags', 'posts.id', '=', 'post_tags.post_id')
                    ->where('post_tags.tag_id', '=', $tag[0]->id)
                    ->get();


        return view('admin/post/tag_find_rs', ['post' => $posts, 'tag' => $tag[0]->name]);
    }
}
