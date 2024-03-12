<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lesson extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = [
        'title', 'body', 'theme_id'
    ];

    public function surveys()
    {
        return $this->hasMany(Survey::class);
    }

    public function hasSurvey()
    {
        return !$this->surveys->isEmpty();
    }

//    public function course()
//    {
//        return $this->belongsTo(Course::class);
//    }

    public function theme()
    {
        return $this->belongsTo(Theme::class);
    }
}
