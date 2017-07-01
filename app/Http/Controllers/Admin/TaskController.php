<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\TaskRequest;
use App\Http\Controllers\Controller;
use App\Task;
use App\Course;

class TaskController extends Controller
{
    public function index()
    {
    	$courses = Task::latest()->paginate(50);
    	return view('admin.tasks.index',compact('courses'));
    }

    public function create()
    {
        $courses  = $this->getCourses();
    	return view('admin.tasks.create',compact('courses'));
    }

    public function store(TaskRequest $request)
    {
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
