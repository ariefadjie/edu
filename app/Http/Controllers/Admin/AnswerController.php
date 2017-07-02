<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\AnswerRequest;
use App\Http\Controllers\Controller;
use App\Answer;
use App\Task;

class AnswerController extends Controller
{
    public function index(Request $request)
    {
    	$rows = Answer::join('questions','answers.question_id','=','questions.id')
        ->join('tasks','questions.task_id','=','tasks.id')
        ->where(function($q) use ($request){
    		foreach ($request->all() as $key => $value) {
    			$q->orWhere($key,$value);
    		}
    	})
    	->select('answers.*')->paginate(50);
    	return view('admin.answers.index',compact('rows'));
    }
}
