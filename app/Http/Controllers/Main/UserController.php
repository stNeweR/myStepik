<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $courses = Auth::user()->courses;
        $myCourses = Auth::user()->myCourses;
        $myLessons = Auth::user()->lessons;
        $courses = $courses->map(function ($course) {
            $course["themes"] = $course->themes;
            return $course;
        });
        $courses = $courses->map(function ($course) {
            $themes = $course["themes"]->map(function ($theme) {
                $theme["lessons"] = $theme->lessons;
            });
            return $course;
        });
        return view("app.user.index", [
            "user" => $user,
            "courses" => $courses,
            "myCourses" => $myCourses,
            "myLessons" => $myLessons,
        ]);
    }
}
