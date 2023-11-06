<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $table = 'courses';
    protected $fillable = [
        'name',
        'description',
        'image',
        'status',
        'category_id',
        'level_id'
    ];
    public $timestamps = true;
    public function category() {
        return $this->belongsTo(Category::class,'category_id','id');
    }
    public function level() {
        return $this->belongsTo(Level::class,'level_id','id');
    }
    public function chapter() {
        return $this->hasMany(Chapter::class,'course_id','id');
    }
    public function member() {
        return $this->belongsToMany(Member::class);
    }
}
