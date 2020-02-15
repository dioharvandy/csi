<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ClassLecturer extends Model
{
    protected $fillable = ['lecturer_id','classroom_id'];
    // public function lecturer()
    // {
    // 	return $this->belongsTo(Lecturer::class);
    // }

    // public function classroom()
    // {
    // 	return $this->belongsTo(Classroom::class);
    // }

    // public function classroom()
    // {
    // 	return $this->hasMany('App\Models\Classroom');
    // }
}
