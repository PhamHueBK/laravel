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
Auth::routes();
Route::get('/', 'PostController@index');
Route::get('contact', function(){
	return view('blog/contact');
});
Route::get('/about', function(){
	return view('blog/about');
});
Route::get('blog/detail', "PostController@detail");
Route::get('admin/login', function(){
	return view('admin/login');
});
Route::post('admin/login', 'Auth\AdminLoginController@login')->name('admin.login');


Route::group(['middleware' => 'admin.auth'],function(){
	Route::get('admin/dashboard','Admin\DashboardController@index');
	Route::post('admin/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
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

	Route::get('admin/profile', 'Admin\UserController@index');
	Route::post('admin/update', 'Admin\UserController@update');
	Route::post('admin/upload_img', 'Admin\PostController@upload_img');

	Route::get('admin/user/index', 'Admin\UserController@getList');
});

Route::group(['middleware' => 'auth'],function(){
	Route::get('user/profile','UserController@index');
	Route::post('user/upload_img', 'UserController@upload_img');
	Route::post('user/update', 'UserController@update');
	Route::post('user/addPost', 'PostController@create');
	Route::get('user/blog_list', 'UserController@blog_list');
});

Route::get('findPost', 'PostController@findPostByTag');


