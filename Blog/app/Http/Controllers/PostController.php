<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    //
    public function blog_list(){
    	$data = Post::get();
    	$data_page = array();
    	$num_page = ceil(count($data)/10);

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
    		
    	/*echo "<pre>";
    	print_r($data_page[1]);
    	echo "</pre>";
    	dd($data_page);*/
    	return view('Blog/post_list', ['data' => $post, 'page'=>$page, 'number_page'=>$num_page]);
    }

    public function blog_1_column(){
    	return view('Blog/blog-1-column');
    }

    public function home_2_columns_with_sidebar(){
    	return view('Blog/home_2_columns_with_sidebar');
    }
}
