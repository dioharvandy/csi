<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ThesisLogbook extends Model
{
    protected $table = 'thesis_logbooks';
    protected $guarded = [];

    public function supervisor()
    {
        return $this->belongsTo(ThesisSupervisor::class, 'supervisor_id');
    }

    public function thesis()
    {
        return $this->belongsTo(Thesis::class, 'thesis_id');
    }
}
