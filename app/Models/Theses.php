<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Theses extends Model
{
    protected $table = 'theses';

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function logbook()
    {
        return $this->hasMany(ThesisLogbook::class, 'thesis_id');
    }

}
