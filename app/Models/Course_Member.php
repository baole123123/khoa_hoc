<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course_Member extends Model
{
    use HasFactory;
    protected $table = 'Course_Member';
    protected $fillable = [
        'member_id',
        'courses_id',
        'date',
        'amount',
    ];
    public $timestamps = true;
    public function course()
    {
        return $this->belongsTo(Course::class, 'courses_id', 'id');
    }
    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id', 'id');
    }
}
