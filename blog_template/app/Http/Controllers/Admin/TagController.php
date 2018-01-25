<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tag;
use App\Post;
use App\PostTag;
use DB;

class TagController extends Controller
{
	public function index(){
		$data = Tag::get();
		$postAll = Post::get();
		$post = array();


		foreach ($data as $key => $value) {
			$post_tag = DB::table('post_tags')->where('tag_id', '=', $value['id'])->get();
			foreach ($post_tag as $item) {
				foreach ($postAll as $postA) {
					if($postA['id'] == $item->post_id){
						$post[$value['id']][] = $postA;
						break;
					}
				}
			}
			
		}
		
		/*echo "<pre>";
		print_r($post);
		echo "</pre>";
		
		dd();*/

		return view('admin/tag/index', ['data' => $data, 'post' => $post]);
	}

	public function findTag(){
		$slug = $_GET['title'];
        $data = DB::table('tags')->where('slug', '=', $slug)->get();
        $tags = Tag::find($data[0]->id);
        return $tags;
	}

	public function update(Request $request){
		$tag = Tag::find($request->id);
		$tag->name = $request->name;

        $tag->save();

        $value = $tag;
        $postAll = Post::get();

        $post_tag = DB::table('post_tags')->where('tag_id', '=', $value['id'])->get();
		foreach ($post_tag as $item) {
			foreach ($postAll as $postA) {
				if($postA['id'] == $item->post_id){
					$tag['post'] = $postA;
					break;
				}
			}
		}
        return $tag;
	}
}

?>