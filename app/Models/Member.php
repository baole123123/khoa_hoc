<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Member extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'members';
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'image',
    ];
    public $timestamps = true;

    public function course()
    {
        return $this->belongsTo(Course::class, 'courses_id');
    }
    public function course_member()
    {
        return $this->hasMany(Course_Member::class, 'member_id','id');
    }
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

}
