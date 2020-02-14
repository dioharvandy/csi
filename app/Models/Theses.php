<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Theses extends Model
{
    protected $table = 'theses';

    const PENGAJUAN =0;
    const SEMPRO =5;
    const BIMBINGAN =10;
    const P_SEMHAS =15;
    const S_SEMHAS =20;
    const P_SIDANG =25;
    const S_SIDANG =30;
    const BATAL =35;

    protected $fillable = [
        'thesis_id',
        'student_id',
        'title',
        'abstract',
        'start_at',
        'status'
    ] ;

    public static $theses_statuses =  [
        self::PENGAJUAN => 'Pengajuan',
        self::SEMPRO => 'Seminar Proposal',
        self::BIMBINGAN => 'Masa Bimbingan',
        self::P_SEMHAS => 'Pengajuan Seminar Hasil',
        self::S_SEMHAS => 'Selesai Seminar Hasil',
        self::P_SIDANG => 'Pengajuan Sidang',
        self::S_SIDANG => 'Selesai Sidang',
        self::BATAL => 'Cancelled/Failed',
    ];

    //Relation
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function thesisSupervisor()
    {
        return $this->hasMany(ThesisSupervisor::class, 'thesis_id');
    }

    public function logbook()
    {
        return $this->hasMany(ThesisLogbook::class, 'thesis_id');
    }

    public function thesisProposal()
    {
        // return $this->hasMany('App\Models\ThesisProposal');
        return $this->hasMany(ThesisProposal::class);
    }
}
