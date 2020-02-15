<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function classroom()
    {
    	return $this->hasMany(Classroom::class);
    }
}
