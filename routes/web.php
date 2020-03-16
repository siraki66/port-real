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
Route::get('/a', function () {
    return view('welcome');
});

Route::get('/', 'PostsController@index');
Route::post('/', 'PostsController@index');



Route::get('/posts/{ico}', 'PostsController@show')->where('ico', '[0-9]+');


Route::post('/posts', 'PostsController@store');

 Route::get('/posts/{ico}/edit', 'PostsController@edit');
 Route::patch('/posts/{ico}', 'PostsController@update');

 Route::delete('/posts/{ico}', 'PostsController@destroy');

 Route::get('/search', 'PostsController@search');

 Route::post('/search', 'PostsController@search');

 Route::post('/search2', 'PostsController@search2');

 Route::post('/posts/{ico}/comments', 'CommentsController@store');

 Route::delete('/posts/{ico}/comments/{comment}','CommentsController@destroy');

 Auth::routes();

 Route::get('/posts/customer_input', 'PostsController@signup');
 Route::get('/posts/login', 'PostsController@login');

 //会員登録
 Route::post('/posts/customer_output', 'PostsController@signup_out');
 Route::get('/posts/customer_output', 'PostsController@test');

 //ログイン
 Route::post('/posts/login_output', 'PostsController@login_out');
 Route::post('/posts/login', 'PostsController@login');

 //ログアウト
 Route::get('/posts/logout', 'PostsController@logout');

// 実験
Route::get('/posts/test', 'PostsController@test');
Route::get('/posts/test/{id}', 'PostsController@test2');

Route::get('/posts/create', 'PostsController@create'); 

Route::get('/posts/create', 'PostsController@img_index');
Route::post('/posts/create', 'PostsController@img_store');

//CSVダウンロード
Route::get('/posts/csv', 'PostsController@csv');

// 画像検証part2
Route::get('/post2', 'Post2Controller@showCreateForm')->name('posts.create2');
Route::post('/post2', 'Post2Controller@create');

//投稿確認ページ
Route::get('/post2/{post}', 'Post2Controller@detail')->name('posts.detail');

//a～zループ
Route::get('/posts/az/{initial}', 'PostsController@az')->name('posts.az');
