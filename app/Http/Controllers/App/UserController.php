<?php

namespace App\Http\Controllers\App;

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
        return view("app.user.index", [
            "user" => $user,
            "courses" => $courses,
            "myCourses" => $myCourses,
        ]);
    }
}
