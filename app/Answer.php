<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class Answer extends Model
{
    use SoftDeletes;

    protected $fillable = [
    	'content',
    	'score',
    	'question_id',
    	'user_id',
    ];

    public function question()
    {
    	return $this->belongsTo(Question::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getCourseTypeTaskAttribute()
    {
        try{
            return $this->question->task->course->name.' - '. $this->question->task->type.' - '. $this->question->task->name;
        } catch (\Exception $e){
            return null;
        }
    }

    public function getSumScoreAttribute()
    {
        return DB::table('tasks')
        ->join('questions','questions.task_id','=','tasks.id')
        ->join('answers','answers.question_id','=','questions.id')
        ->where('tasks.id',$this->question->task_id)
        ->where('answers.user_id',$this->user_id)
        ->sum('answers.score');
    }

    public function getSumMaxScoreAttribute()
    {
        return DB::table('tasks')
        ->join('questions','questions.task_id','=','tasks.id')
        ->where('tasks.id',$this->question->task_id)
        ->sum('questions.max_score');
    }
}
