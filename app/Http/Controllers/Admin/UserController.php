<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    public function index()
    {
    	$users = User::orderBy('name')->paginate(1);
    	return view('admin.users.index',compact('users'));
    }

    public function create()
    {
    	return view('admin.users.create');
    }
}
