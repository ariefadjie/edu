<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    public function index()
    {
    	return view('admin.students.index');
    }

    public function create()
    {
    	return view('admin.students.create');
    }
}
