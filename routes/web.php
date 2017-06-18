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
    return redirect()->route('admin.dashboard');
});

Route::group(['namespace'=>'Admin','as'=>'admin.'],function(){
	Route::get('/', function () {
	    return redirect()->route('admin.dashboard');
	});
	Route::get('dashboard',function(){
		return view('admin.dashboard');
	})->name('dashboard');
	Route::resource('students','StudentController');
});
