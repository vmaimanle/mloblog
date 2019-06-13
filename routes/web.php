<?php

//后台
Route::get('admin', 'Admin\Admin@home')->name('admin');
Route::get('article/detail/{article}', 'Admin\Admin@detail')->name('article_detail');

//Route::get('article/detail/{id}', function ($id){
//    return view( 'admin.home.detail' , [ 'id' => $id ] );
//})->name('article_detail');

//登陆
Route::get('login', 'Admin\Login@create')->name('login');
Route::post('login', 'Admin\Login@store')->name('login');
Route::delete('logout', 'Admin\Login@destroy')->name('logout');

//文章
Route::resource('article', 'Admin\ArticleController');

//分类
Route::resource('category', 'Admin\CategoryController');

//用户
Route::get('users/{user}/edit', 'Admin\UserController@edit')->name('users.edit');
Route::patch('users/{user}', 'Admin\UserController@update')->name('users.update');
Route::get('users/{user}/edit_avatar','Admin\UserController@editAvatar')->middleware('auth')->name('users.edit_avatar');
Route::post('users/{user}/update_avatar','Admin\UserController@updateAvatar')->middleware('auth')->name('users.update_avatar');

/* 后台↑ 分割线 前端↓ */

//文章
Route::get('', 'Home\ArticleController@index');
Route::get('cate/{cate_id}', 'Home\ArticleController@index')->name('index');

//搜索
Route::post('', 'Home\ArticleController@index')->name('index_search');

//文章详情
Route::get('home/{article}/detail', 'Home\ArticleController@detail')->name('index_detail');