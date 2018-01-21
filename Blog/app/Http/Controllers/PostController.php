<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use DB;

class PostController extends Controller
{
    //
    public function blog_list(){
    	//$data = Post::get();
    	$data = DB::table('posts')->where('status', '=', 1)->get();
    	
    	$usersrr = array();
    	foreach ($data as $key => $value) {
    		# code...
    		$usersrr[$value->id] = User::find($value->user_id);
    		$data[$key]->author = $usersrr[$value->id]['name'];
    	}
    	$data_page = array();
    	$num_page = ceil(count($data)/5);

    	if(count($data) >= 5){
    		for($i = 1; $i <= $num_page; $i++){
	    		for($j = 0; $j < 5; $j++){
	    			if(isset($data[($i-1)*5+$j]))
	    				$data_page[$i][] = $data[($i-1)*5+$j];
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
    	return view('Blog/post_list', ['data' => $post, 'page'=>$page, 'number_page'=>$num_page]);
    }

    public function blog_1_column(){
    	return view('Blog/blog-1-column');
    }

    public function home_2_columns_with_sidebar(){
    	return view('Blog/home_2_columns_with_sidebar');
    }

    public function detail(){
    	$id = $_GET['id'];
    	$data = Post::find($id);
    	$user = User::find($data['user_id']);
    	$data['author'] = $user['name'];
    	/*echo "<pre>";
    	print_r($data);
    	echo "</pre>";
    	dd();*/
    	return view('Blog/postDetail', ['data' => $data]);
    }
}
