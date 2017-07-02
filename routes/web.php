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

Route::group(['prefix'=>'admin','namespace'=>'Admin','as'=>'admin.','middleware'=>'auth'],function(){
	Route::get('/', function () {
	    return redirect()->route('admin.dashboard');
	});
	Route::get('dashboard',function(){
		return view('admin.dashboard');
	})->name('dashboard');
	Route::resource('users','UserController');
	Route::resource('courses','CourseController');
	Route::resource('tasks','TaskController');
	Route::resource('questions','QuestionController');
	//Route::resource('answers','AnswerController');
});

Auth::routes();

Route::group(['prefix'=>'user','namespace'=>'User','as'=>'user.','middleware'=>'auth'],function(){
	Route::get('tasks',['as'=>'tasks.index','uses'=>'TaskController@index']);
	Route::get('tasks/{id}',['as'=>'tasks.show','uses'=>'TaskController@show']);
	Route::get('questions/{id}/answer',['as'=>'questions.answer','uses'=>'QuestionController@answer']);
	Route::post('answer',['as'=>'answer.store','uses'=>'AnswerController@store']);
});
