<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Task;
use App\Question;
use Auth;

class TaskController extends Controller
{
    public function index()
    {
    	$rows = Task::join('courses','tasks.course_id','=','courses.id')
        ->join('course_user','courses.id','=','course_user.course_id')
        ->where('course_user.user_id',Auth::user()->id)
        ->select('tasks.*')->latest()->paginate(50);
    	return view('user.tasks.index',compact('rows'));
    }

    public function show($id)
    {
    	$rows = Question::join('tasks','questions.task_id','=','tasks.id')
    	->join('courses','tasks.course_id','=','courses.id')
        ->join('course_user','courses.id','=','course_user.course_id')
        ->where('course_user.user_id',Auth::user()->id)
        ->where('questions.task_id',$id)
        ->select('questions.*')->paginate(50);
    	return view('user.questions.index',compact('rows'));
    }
}
