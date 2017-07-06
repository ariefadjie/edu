<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Course;
use Auth;
use Hash;

class SettingController extends Controller
{
    public function edit()
    {
    	$row = User::find(Auth::user()->id);
    	$courses = $this->getCourses();
    	return view('user.settings.edit',compact('row','courses'));
    }

    public function update(Request $request)
    {
    	$id = Auth::user()->id;
        $user= User::find($id);
        $this->validate($request,[
            'name' => 'required|max:255',
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
        return redirect()->back();
    }

    public function getCourses()
    {
        return Course::pluck('name','id');
    }
}
