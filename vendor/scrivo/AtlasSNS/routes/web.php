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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();


//ログアウト中のページ

Route::get('/login', 'Auth\'FollowsController@followCounts');

Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');
Route::get('/logout', 'Auth\LoginController@logout');


Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');
Route::get('/register', 'Auth\RegisterController@validator');
Route::post('/register', 'Auth\RegisterController@validator');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

//ログイン中のページ

// RESTfulサービスのルーティング
Route::resource('/post', 'PostController');

// RESTfulサービス省略なしだとこうなる
// Route::get('post', 'PostController@index')->name('post.index'); // 一覧
// Route::post('post', 'PostController@store')->name('post.store'); // 保存
// Route::get('post/create', 'PostController@create')->name('post.create'); // 作成
// Route::get('post/{post_id}', 'PostController@show')->name('post.show'); // 表示
// Route::get('post/edit/{post_id}', 'PostController@edit')->name('post.edit'); // 編集
// Route::put('post/{post_id}', 'PostController@update')->name('post.update'); // 更新
// Route::delete('post/{post_id}', 'PostController@destroy')->name('post.destroy'); // 削除


Route::get('/top','PostsController@index');//topページ表示
Route::post('/create_post', 'PostsController@create');     // formのつぶやき登録

Route::get('/top/{post}/delete', 'postsController@delete');
Route::put('/top', 'PostsController@update');
Route::post('/top', 'PostsController@update');

Route::get('/followList','FollowsController@followIcon');
Route::get('/followList','FollowsController@followList');
Route::get('/followerList','FollowsController@followerList');
Route::get('/profiles/{user_id}','FollowsController@show')->name('users.profiles');


Route::get('/search','UsersController@index');
Route::get('/search','UsersController@search');

    // フォロー/フォロー解除を追加
    Route::post('users/{user}/follow', 'UsersController@follow')->name('follow');
    Route::post('users/{user}/unfollow', 'UsersController@unfollow')->name('unfollow');
Route::get('/profile','UsersController@profile');
Route::post('/profile','UsersController@profile');
// Route::get('/search','UsersController@search');
Route::put('/update','UsersController@update');

// Route::get('/profile','UsersController@store');



Route::get('/follow-list','PostsController@index');
Route::get('/follower-list','PostsController@index');

Route::post('users/{user}/follows', 'FollowsController@follows')->name('follows');
Route::post('users/{user}/unfollows', 'FollowsController@unfollows')->name('unfollows');
// Route::get('/follow-list','PostsController@icon');
// Route::get('/follower-list','PostsController@icon');



Auth::routes();
