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
// 	// return view('auth/login');
//     return view('welcome');
// });

Route::get('/', 'TestingController@index')->name('testing.index');

Route::get('site_id/{id}',function ($id){
	Session::put('site_id', $id);
	return redirect()->back();
});

Route::get('admin/home', 'HomeController@adminHome')->name('admin.home')->middleware('is_admin');

/******* Project Detail This is Upload Image Controller *****/
Route::post('admin/project_detail/image_upload', 'Admin\ProjectDetailController@upload')->name('upload');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
