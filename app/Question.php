<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use SoftDeletes;

    protected $fillable = [
    	'content',
    	'task_id',
    	'max_score',
    ];

    public function task()
    {
    	return $this->belongsTo(Task::class);
    }
}
