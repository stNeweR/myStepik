<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function show($id)
    {
        $course = Course::query()->findOrFail($id);
        $author = $course->user;
        $lessons = $course->lessons;
        return view("app.courses.show", [
            "course" => $course,
            "author" => $author,
            "lessons" => $lessons,
        ]);
    }

    public function subsribe(Request $request)
    {
        dd($request->all());
    }

    public function unSubscribe(Request $request)
    {
        dd($request->all());
    }
}
