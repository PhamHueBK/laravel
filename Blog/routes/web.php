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

Route::get('/', function () {
    return view('Blog/index');
});

Route::get('/contact', function () {
    return view('Blog/contact');
});

Route::get('/about', function () {
    return view('Blog/about');
});

Route::get('blog/home-1-column', 'PostController@blog_1_column');
//Trang danh sách bài viết
Route::get('blog/blog-1-column_sidebar', 'PostController@blog_list');
Route::get('blog/home-2-columns-with-sidebar', 'PostController@home_2_columns_with_sidebar');
//Trang chi tiết bài viết
Route::get('blog/detail', "PostController@detail");


//view Login
Route::get('login', 'UserController@getLogin');
//xử lý login
Route::post('login', 'UserController@postLogin');
//logout
Route::get('logout', 'UserController@logout');
//Trang cá nhân 
Route::get('profile', 'UserController@profile');
//View đăng ký tài khoản
Route::get('register', 'UserController@register');
//Xử lý đăng ký tài khoản
Route::post('register', 'UserController@post_register');
//Upload avatar
Route::post('upload_img', 'UserController@upload_img');
//Cập nhật hồ sơ người dùng
Route::post('/profile/update', 'UserController@update');
//Đăng bài viết
Route::post('/profile/create/post', 'UserController@createPost');

//Trang sau khi đăng nhập thành công
Route::get('/blog', 'HomeController@getIndex');





