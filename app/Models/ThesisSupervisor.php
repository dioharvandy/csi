<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ThesisSupervisor extends Model
{
    protected $table = 'thesis_supervisors';
    protected $fillable = [
        'thesis_id',
        'lecturer_id',
        'position',
        'status',
    ];

    public function thesis()
    {
        return $this->belongsTo(Theses::class);
    }
}
