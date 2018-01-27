<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Post;
use App\PostCategory;
use DB;

class CategoryController extends Controller
{
	public function index(){
		$data = Category::get();
		$postAll = Post::get();
		$post = array();


		foreach ($data as $key => $value) {
			$post_category = DB::table('post_categories')->where('category_id', '=', $value['id'])->get();
			foreach ($post_category as $item) {
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

		return view('admin/category/index', ['data' => $data, 'post' => $post]);
	}

	public function findCategory(){
		$slug = $_GET['title'];
        $data = DB::table('categories')->where('slug', '=', $slug)->get();
        $category = Category::find($data[0]->id);
        return $category;
	}

	public function update(Request $request){
		$category = Category::find($request->id);
		$category->name = $request->name;

        $category->save();

        $value = $category;
        $postAll = Post::get();

        $post_category = DB::table('post_categories')->where('category_id', '=', $value['id'])->get();
		foreach ($post_category as $item) {
			foreach ($postAll as $postA) {
				if($postA['id'] == $item->post_id){
					$category['post'] = $postA;
					break;
				}
			}
		}
        return $category;
	}

	public function delete(Request $request){
		$data = Category::find($request->id);
		$postCategory = DB::table('post_categories')->where('category_id', '=', $request->id)->get();
		foreach ($postCategory as $key => $value) {
			$post_category = PostCategory::find($value->id);
			$post_category->delete();
		}
        $id = $request->id;
        $data->delete();

        return $id;
	}

	public function create(Request $request){
		$data['name'] = $request->name;
		$data['slug'] = $request->slug;
		
		$data['parent_id'] = 0;
		$data['left'] = 0;
		$data['right'] = 0;
		$data = Category::create($data);

		return $data;
	}
}

?>