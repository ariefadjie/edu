<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Course;
use Hash;

class UserController extends Controller
{
    public function index()
    {
    	$rows = User::orderBy('name')->paginate(50);
    	return view('admin.users.index',compact('rows'));
    }

    public function create()
    {
        $courses = $this->getCourses();
    	return view('admin.users.create',compact('courses'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:255',
            'email' => 'required|unique:users|max:255',
            'password' => 'required|min:6|max:255',
            'password_confirmation' => 'same:password'
            ]);
        $request['password'] = bcrypt($request->input('password'));
        User::create($request->all());
        swal('success');
        return redirect()->route('admin.users.index');
    }

    public function edit($id)
    {
    	$row = User::findOrFail($id);
        $courses = $this->getCourses();
    	return view('admin.users.edit',compact('row','courses'));
    }

    public function update(Request $request,$id)
    {
        $user= User::find($id);
        $this->validate($request,[
            'name' => 'required|max:255'
        ]);
        if($request->input('email')!=$user->email)
        {
            $this->validate($request,[
                'email' => 'required|unique:users|max:255',
            ]);
        }
        if($request->input('current_password'))
        {
            if(Hash::check($request->input('current_password'),$user->password)){
                $this->validate($request,[
                    'new_password' => 'min:6|max:255',
                    'new_password_confirmation' => 'same:new_password'
                ]);
                $request['password'] = bcrypt($request->input('new_password'));
            } else
            {
                alert()->error('The current password must match.','Error!');
                return redirect()->back();
            }
        }
        if($request->input('new_password')||$request->input('new_password'))
        {
            $this->validate($request,[
                'current_password' => 'required|min:6|max:255'
            ]);
        }
        $user->update($request->all());
        $user->courses()->sync($request->input('courses'));
        swal('success');
        return redirect()->route('admin.users.index');
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        swal('success');
        return redirect()->route('admin.users.index');
    }

    public function getCourses()
    {
        return Course::pluck('name','id');
    }
}
