<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\QuestionRequest;
use App\Http\Controllers\Controller;
use App\Question;
use App\Task;
use DB;

class QuestionController extends Controller
{
    public function index()
    {
    	$rows = Question::latest()->paginate(50);
    	return view('admin.questions.index',compact('rows'));
    }

    public function show($id)
    {
        $rows = Question::where('task_id',$id)->latest()->paginate(50);
        return view('admin.questions.index',compact('rows'));
    }

    public function create()
    {
        $tasks = $this->getTasks();
    	return view('admin.questions.create',compact('tasks'));
    }

    public function store(QuestionRequest $request)
    {
        $request['task_id'] = $request->input('task');
    	Question::create($request->all());
    	swal('success');
    	return redirect()->route('admin.questions.index');
    }

    public function edit($id)
    {
    	$row = Question::findOrFail($id);
        $tasks = $this->getTasks();
    	return view('admin.questions.edit',compact('row','tasks'));
    }

    public function update(QuestionRequest $request,$id)
    {
        $request['task_id'] = $request->input('task');
    	Question::find($id)->update($request->all());
    	swal('success');
    	return redirect()->route('admin.questions.index');
    }

    public function destroy($id)
    {
    	Question::find($id)->delete();
    	swal('success');
    	return redirect()->route('admin.questions.index');
    }

    public function getTasks()
    {
        return Task::join('courses','tasks.course_id','=','courses.id')->select(DB::raw('CONCAT(courses.name, " - ", CONCAT(UPPER(SUBSTR(tasks.type,1,1)),LOWER(SUBSTR(tasks.type,2))), " - " ,tasks.name) AS name'),'tasks.id')->pluck('name','id');
    }
}
