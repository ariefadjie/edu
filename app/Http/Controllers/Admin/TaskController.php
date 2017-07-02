<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\TaskRequest;
use App\Http\Controllers\Controller;
use App\Task;
use App\Course;
use App\Question;

class TaskController extends Controller
{
    public function index()
    {
    	$rows = Task::latest()->paginate(50);
    	return view('admin.tasks.index',compact('rows'));
    }

    public function show($id)
    {
        $rows = Task::where('course_id',$id)->latest()->paginate(50);
        return view('admin.tasks.index',compact('rows'));
    }

    public function create()
    {
        $courses  = $this->getCourses();
    	return view('admin.tasks.create',compact('courses'));
    }

    public function store(TaskRequest $request)
    {
        $request['course_id'] =  $request->input('course');
    	Task::create($request->all());
    	swal('success');
    	return redirect()->route('admin.tasks.index');
    }

    public function edit($id)
    {
    	$row = Task::findOrFail($id);
        $courses  = $this->getCourses();
    	return view('admin.tasks.edit',compact('row','courses'));
    }

    public function update(TaskRequest $request,$id)
    {
        $request['course_id'] =  $request->input('course');
    	Task::find($id)->update($request->all());
    	swal('success');
    	return redirect()->route('admin.tasks.index');
    }

    public function destroy($id)
    {
    	Task::find($id)->delete();
    	swal('success');
    	return redirect()->route('admin.tasks.index');
    }

    public function getCourses()
    {
        return Course::pluck('name','id');
    }
}
