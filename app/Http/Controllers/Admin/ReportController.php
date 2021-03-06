<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Answer;

class ReportController extends Controller
{
    public function index(Request $request)
    {
    	$rows = Answer::join('questions','answers.question_id','=','questions.id')
        ->join('tasks','questions.task_id','=','tasks.id')
        ->join('users','answers.user_id','=','users.id')
        ->where(function($q) use ($request){
            if($request->get('user_id'))
            {
                $q->orWhere('users.id',$request->get('user_id'));
            }
            if($request->get('task_id'))
            {
                $q->orWhere('tasks.id',$request->get('task_id'));
            }
    	})
        ->orderBy('users.name')
        ->groupBy('users.id')
        ->groupBy('tasks.id')
    	->select('answers.*')->paginate(50);
    	return view('admin.reports.index',compact('rows'));
    }
}
