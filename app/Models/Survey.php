<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;

    protected $fillable = [
        'body', 'lesson_id'
    ];

    public function options()
    {
        return $this->hasMany(Option::class);
    }

    public function succesOption()
    {
        return $this->belongsToMany(Option::class);
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}
