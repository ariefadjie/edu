<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\CourseRequest;
use App\Http\Controllers\Controller;
use App\Course;
use App\Task;

class CourseController extends Controller
{
    public function index()
    {
    	$rows = Course::orderBy('name')->paginate(50);
    	return view('admin.courses.index',compact('rows'));
    }

    public function create()
    {
    	return view('admin.courses.create');
    }

    public function store(CourseRequest $request)
    {
    	Course::create($request->all());
    	swal('success');
    	return redirect()->route('admin.courses.index');
    }

    public function edit($id)
    {
    	$row = Course::findOrFail($id);
    	return view('admin.courses.edit',compact('row'));
    }

    public function update(CourseRequest $request,$id)
    {
    	Course::find($id)->update($request->all());
    	swal('success');
    	return redirect()->route('admin.courses.index');
    }

    public function destroy($id)
    {
    	Course::find($id)->delete();
    	swal('success');
    	return redirect()->route('admin.courses.index');
    }
}
