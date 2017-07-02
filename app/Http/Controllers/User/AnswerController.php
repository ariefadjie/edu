<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Requests\User\AnswerRequest;
use App\Http\Controllers\Controller;
use Auth;
use App\Answer;

class AnswerController extends Controller
{
    public function store(AnswerRequest $request)
    {
        $answer = Answer::firstOrCreate(['user_id'=>Auth::user()->id,'question_id'=>$request->input('question_id')]);
        $answer->update(['content'=>$request->input('answer')]);
		swal('success');
        return redirect()->back();
    }
}
