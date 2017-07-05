<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Answer;
use App\Task;
use App\Question;
use Auth;

class AnswerController extends Controller
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
    	->select('answers.*')->paginate(50);
    	return view('admin.answers.index',compact('rows'));
    }

    public function edit($id)
    {
        $row = Answer::find($id);
        return view('admin.answers.edit',compact('row'));
    }

    public function update(Request $request,$id)
    {
        $row = Answer::find($id);
        $this->validate($request,[
            'score' => 'required|numeric|min:0|max:'.$row->question->max_score,
            ]);
        $row->update($request->all());
        swal('success');
        return redirect()->route('admin.answers.index');
    }
}
