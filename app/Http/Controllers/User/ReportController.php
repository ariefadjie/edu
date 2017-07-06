<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Answer;
use Auth;

class ReportController extends Controller
{
    public function index()
    {
    	$rows = Answer::join('questions','answers.question_id','=','questions.id')
        ->join('tasks','questions.task_id','=','tasks.id')
        ->join('users','answers.user_id','=','users.id')
        ->orderBy('users.name')
        ->groupBy('users.id')
        ->groupBy('tasks.id')
        ->where('users.id',Auth::user()->id)
    	->select('answers.*')->paginate(50);
    	return view('user.reports.index',compact('rows'));
    }
}
