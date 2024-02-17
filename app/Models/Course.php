<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory, SoftDeletes;

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
