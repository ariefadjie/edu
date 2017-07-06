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

Auth::routes();

Route::get('/',['middleware'=>'auth',function(){
	if(auth()->user()->hasRole('admin'))
	{
		return redirect()->route('admin.');
	}
	else
	{
		return redirect()->route('user.');
	}
}]);

Route::group(['prefix'=>'admin','namespace'=>'Admin','as'=>'admin.','middleware'=>['auth','role:admin']],function(){
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
	Route::resource('answers','AnswerController');
	Route::get('reports',['as'=>'reports.index','uses'=>'ReportController@index']);
	Route::get('settings',['as'=>'settings.edit','uses'=>'SettingController@edit']);
	Route::put('settings',['as'=>'settings.update','uses'=>'SettingController@update']);
});

Route::group(['prefix'=>'user','namespace'=>'User','as'=>'user.','middleware'=>['auth','role:user']],function(){
	Route::get('/', function () {
	    return redirect()->route('user.tasks.index');
	});
	Route::get('dashboard',function(){
		return view('admin.dashboard');
	})->name('dashboard');
	Route::get('tasks',['as'=>'tasks.index','uses'=>'TaskController@index']);
	Route::get('tasks/{id}',['as'=>'tasks.show','uses'=>'TaskController@show']);
	Route::get('questions/{id}/answer',['as'=>'questions.answer','uses'=>'QuestionController@answer']);
	Route::post('answers',['as'=>'answers.store','uses'=>'AnswerController@store']);
	Route::get('reports',['as'=>'reports.index','uses'=>'ReportController@index']);
	Route::get('settings',['as'=>'settings.edit','uses'=>'SettingController@edit']);
	Route::put('settings',['as'=>'settings.update','uses'=>'SettingController@update']);
});
