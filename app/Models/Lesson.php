<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;
    protected $table = 'lessons';
    protected $fillable = [
        'name',
        'chapter_id',
    ];
    public $timestamps = true;
    public function chapter() {
        $this->belongsTo(Chapter::class,'chapter_id','id');
    }
}
