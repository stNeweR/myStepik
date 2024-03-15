<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'user_name',
        'email',
        'password',
        "full_name",
        'description'
    ];

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

    public function subscribeCourse($courseId)
    {
        return $this->courses()->where("course_id", $courseId)->exists();
    }

    public function myCourses()
    {
        return $this->hasMany(Course::class);
    }

    public function isMyCourse($id)
    {
        return $this->myCourses()->where("id", $id)->exists();
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasRole($roleName)
    {
        return $this->roles()->where('body', $roleName)->exists();
    }

    public function lessons()
    {
        return $this->belongsToMany(Lesson::class);
    }

    public function succesLesson($lessonId)
    {
        return $this->lessons()->where("lesson_id", $lessonId)->exists();
    }
}
