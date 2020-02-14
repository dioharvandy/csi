<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ThesisSupervisor extends Model
{
    protected $table = 'thesis_supervisors';

    const SUBMITTED =0;
    const ACCEPTED =1;
    const REJECTED =2;

    protected $fillable = [
        'thesis_id',
        'lecturer_id',
        'position',
        'status',
    ];

    public function thesis()
    {
        return $this->belongsTo(Theses::class, 'thesis_id');
    }
}
