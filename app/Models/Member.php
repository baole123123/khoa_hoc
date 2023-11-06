<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $table = 'members';
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'image',
    ];
    public $timestamps = true;
    public function course() {
        return $this->belongsToMany(Course::class);
    }
}
