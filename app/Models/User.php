<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    const STUDENT = 1;
    const LECTURER = 2;
    const STAFF = 3;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function student()
    {
        return $this->hasOne(Student::class, 'id');
    }

    public function lecturer()
    {
        return $this->hasOne(Lecturer::class, 'id');
    }

    public function staff()
    {
        return $this->hasOne(Staff::class, 'id');
    }

    public function families()
    {
        return $this->hasMany(FamilyMember::class, 'id', 'user_id');
    }

    public function educations()
    {
        return $this->hasMany(UserEducation::class, 'id', 'user_id');
    }

}
