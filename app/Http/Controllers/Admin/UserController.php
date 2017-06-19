<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    public function index()
    {
    	$users = User::orderBy('name')->paginate(50);
    	return view('admin.users.index',compact('users'));
    }

    public function create()
    {
    	return view('admin.users.create');
    }

    public function edit($id)
    {
    	$row = User::findOrFail($id);
    	return view('admin.users.edit',compact('row'));
    }

    public function update(Request $request,$id)
    {
        if(empty($request->input('password')))
        {
            unset($request['password']);
            unset($request['password_confirm']);
        }
        User::find($id)->update($request->all());
        alert()->success(alertMessage(),'Success!');
        return redirect()->route('admin.users.index');
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        alert()->success(alertMessage(),'Success!');
        return redirect()->route('admin.users.index');
    }
}
