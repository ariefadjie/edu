<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Answer;
use App\User;
use DB;

class ReportController extends Controller
{
    public function index(Request $request)
    {
    	$rows = Answer::join('questions','answers.question_id','=','questions.id')
        ->join('tasks','questions.task_id','=','tasks.id')
        ->join('users','answers.user_id','=','users.id')
        ->where(function($q) use ($request){
    		foreach ($request->all() as $key => $value) {
    			$q->orWhere($key,$value);
    		}
    	})
        ->orderBy('users.name')
        ->groupBy('users.id')
        ->groupBy('tasks.id')
    	->select('answers.*')->paginate(50);
    	return view('admin.reports.index',compact('rows'));
    }
}
