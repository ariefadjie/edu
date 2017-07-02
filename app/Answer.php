<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
}
