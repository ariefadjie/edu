<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Question;
use Auth;
use App\Task;
use DB;

class QuestionController extends Controller
{
    public function answer($id)
    {
    	$row = Question::findOrFail($id);
    	$tasks = $this->getTasks();
    	return view('user.questions.answer',compact('row','tasks'));
    }

    public function getTasks()
    {
        return Task::join('courses','tasks.course_id','=','courses.id')->select(DB::raw('CONCAT(courses.name, " - ", CONCAT(UPPER(SUBSTR(tasks.type,1,1)),LOWER(SUBSTR(tasks.type,2))), " - " ,tasks.name) AS name'),'tasks.id')->pluck('name','id');
    }
}
