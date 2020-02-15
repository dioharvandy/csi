<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    public function classroom()
    {
    	return $this->hasMany(Classroom::class);
    }
}
