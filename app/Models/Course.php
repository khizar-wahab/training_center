<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'day',
        'date',
        'time',
        'gender',
        'traiPro',
        'members',
        'img_path',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_courses');
    }
}
