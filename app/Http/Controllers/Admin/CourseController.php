<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::query()->paginate(7);
        return view("admin.courses.index", [
            "courses" => $courses,
        ]);
    }

    public function show($id)
    {
        $course = Course::query()->findOrFail($id);
        dd($course->lessons);
    }
}
