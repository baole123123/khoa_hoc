<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;
    protected $table = 'chapters';
    protected $fillable = [
        'name',
        'course_id',
    ];
    public $timestamps = true;
    public function course() {
        return $this->belongsTo(Course::class,'courses_id','id');
    }
    public function lesson() {
        return $this->hasMany(Lesson::class,'chapter_id','id');
    }
}
