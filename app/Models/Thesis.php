<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Thesis extends Model
{
    protected $table = 'theses';
    protected $guarded = [];

    public function thesisLogbook()
    {
        return $this->hasMany(ThesisLogbook::class, 'thesis_id');
    }

    public function thesisSupervisor()
    {
        return $this->hasMany(ThesisSupervisor::class, 'thesis_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
