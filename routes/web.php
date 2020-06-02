<?php

use Illuminate\Support\Facades\Route;

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
//首页
Route::get('/','IndexController@index');
//客户
Route::get('/customer','CustomerController@index');
//会议
Route::get('/meeting','MeetingController@index');
//管理员
Route::get('/admin','AdminController@index');
//登陆
Route::get('/login','LoginController@login');
Route::post('/dologin','LoginController@dologin');
Route::get('logout','LoginController@logout');

