<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::query()->paginate(5);
        $coursesCount = Course::query()->count();
        return view("admin.courses.index", [
            "courses" => $courses,
            "coursesCount" => $coursesCount,
        ]);
    }

    public function show($id)
    {
        $course = Course::query()->findOrFail($id);

        return view("admin.courses.show", [
            "lessons" => $course->lessons,
        ]);
    }

    public function find(Request $request)
    {
        $findCourses = Course::query()->where($request->field, "LIKE", "%" . $request->body . "%")->get();
        dd($findCourses);
    }
}
