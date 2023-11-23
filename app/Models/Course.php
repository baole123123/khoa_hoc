<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PHPUnit\Framework\Constraint\Count;

class Course extends Model
{
    const ACTIVE = 0;
    const INACTIVE = 1;
    use HasFactory;
    protected $table = 'courses';
    protected $fillable = [
        'name',
        'description',
        'image',
        'status',
        'category_id',
        'level_id',
        'video',
        'reading'

    ];
    public $timestamps = true;
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function level()
    {
        return $this->belongsTo(Level::class, 'level_id', 'id');
    }
    public function chapter()
    {
        return $this->hasMany(Chapter::class, 'courses_id', 'id');
    }

    public function course_member()
    {
        return $this->hasMany(Course_Member::class, 'courses_id','id');
    }
}
