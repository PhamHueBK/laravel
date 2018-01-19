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
Route::get('blog/blog-1-column_sidebar', 'PostController@blog_list');
Route::get('blog/home-2-columns-with-sidebar', 'PostController@home_2_columns_with_sidebar');


