<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ThesisProposal extends Model
{
    protected  $table = 'thesis_proposals';

    protected $fillable  = [
        'thesis_id',
        'datetime',
        'room_id',
        'grade',
        'file_path',
        'status',
    ];
    
    const SUBMITTED =0;
    const APPROVED =1;
    const REJECTED =2;
    
    public static $proposalStatuses =  [
        self::SUBMITTED => 'Pengajuan',
        self::APPROVED => 'Diterima',
        self::REJECTED => 'Ditolak',
    ];

}
