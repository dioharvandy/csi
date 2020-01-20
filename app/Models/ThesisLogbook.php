<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ThesisLogbook extends Model
{
    protected $table = 'thesis_logbooks';

    public function theses()
    {
        return $this->belongsTo(Theses::class);
    }
}
