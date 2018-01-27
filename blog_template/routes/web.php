<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PostController@index');
Route::get('blog/detail', "PostController@detail");

Route::group(['middleware' => 'App\Http\Middleware\check'],function(){
	Route::get('admin','Admin\DashboardController@index');
	Route::get('admin/post/index', 'Admin\PostController@index');
	Route::post('admin/post/addPost', 'Admin\PostController@create');
	Route::get('admin/post/show', 'Admin\PostController@detail');
	Route::get('admin/post/findPost', 'Admin\PostController@findPost');
	Route::post('admin/post/update', 'Admin\PostController@update');
	Route::post('admin/post/deletePost', 'Admin\PostController@delete');
	Route::get('admin/post/index_approve', 'Admin\PostController@index_approve');
		//Upload thumbnail
	Route::post('admin/post/upload_img', 'Admin\PostController@upload_img');

	Route::get('admin/tag/index', 'Admin\TagController@index');
	Route::get('admin/tag/findTag', 'Admin\TagController@findTag');
	Route::post('admin/tag/update', 'Admin\TagController@update');
	Route::post('admin/tag/deleteTag', 'Admin\TagController@delete');
	Route::post('admin/tag/add', 'Admin\TagController@create');

	Route::get('admin/category/index', 'Admin\CategoryController@index');
	Route::get('admin/category/findCategory', 'Admin\CategoryController@findCategory');
	Route::post('admin/category/update', 'Admin\CategoryController@update');
	Route::post('admin/category/deleteCategory', 'Admin\CategoryController@delete');
	Route::post('admin/category/addCategory', 'Admin\CategoryController@create');
});

Route::group(['middleware' => 'App\Http\Middleware\check'],function(){
	Route::get('user/profile','UserController@index');
	/*Route::get('admin/post/index', 'Admin\PostController@index');
	Route::post('admin/post/addPost', 'Admin\PostController@create');
	Route::get('admin/post/show', 'Admin\PostController@detail');
	Route::get('admin/post/findPost', 'Admin\PostController@findPost');
	Route::post('admin/post/update', 'Admin\PostController@update');
	Route::post('admin/post/deletePost', 'Admin\PostController@delete');
	Route::get('admin/post/index_approve', 'Admin\PostController@index_approve');

	Route::get('admin/tag/index', 'Admin\TagController@index');
	Route::get('admin/tag/findTag', 'Admin\TagController@findTag');
	Route::post('admin/tag/update', 'Admin\TagController@update');*/
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
