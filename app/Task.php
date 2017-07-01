<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;

    protected $fillable = [
    	'name',
    	'course_id',
    	'type',
    ];

    public function getTypeAttribute($value)
    {
    	return ucwords($value);
    }

    public function course()
    {
    	return $this->belongsTo(Course::class);
    }
}
