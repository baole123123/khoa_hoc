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
}
