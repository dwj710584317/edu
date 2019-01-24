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
    return view('welcome');
});

//prefix 前缀
Route::group(['prefix'=>'admin'],function (){
    //管理登录
    Route::get('public/login','Admin\PubilcController@login');
    //验证登录
    Route::post('public/check','Admin\PubilcController@check');
});
