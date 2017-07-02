<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Question;
use App\Answer;
use Auth;

class QuestionController extends Controller
{
    public function answer($id)
    {
    	$row = Question::findOrFail($id);
    	$answer = Answer::where('user_id',Auth::user()->id)->where('question_id',$row->id)->first();
    	return view('user.questions.answer',compact('row','answer'));
    }
}
