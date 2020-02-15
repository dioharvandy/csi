<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
	protected $fillable = ['course_id','semester_id','name','min_students','max_students','cancelled','description'];
	
    // public function classlecturer()
    // {
    // 	return $this->hasMany(Classlecturer::class);
    // }

    public function lecturer()
    {
    	return $this->belongsToMany(Lecturer::class,'class_lecturers','lecturer_id','classroom_id');
    }

    public function course()
    {
    	return $this->belongsTo(Course::class);
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }

    public function lecturertes()
    {
        return $this->belongsToMany(Lecturer::class,'class_lecturers','classroom_id','lecturer_id');
    }
}
