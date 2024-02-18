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
        $courses = Course::withTrashed()->paginate(10);
        $coursesCount = Course::query()->count();
        return view("admin.courses.index", [
            "courses" => $courses,
            "coursesCount" => $coursesCount,
        ]);
    }

    public function show($id)
    {
        $course = Course::withTrashed()->findOrFail($id);
        $users = $course->users;
        return view("admin.courses.show", [
            "auther" => $course->user,
            "course" => $course,
            "lessons" => $course->lessons,
            "users" => $users,
        ]);
    }

    public function find(Request $request)
    {
        $findCourses = Course::query()->where($request->field, "LIKE", "%" . $request->body . "%")->get();
        dd($findCourses);
    }

    public function edit()
    {
        
    }

    public function delete($id)
    {
        Course::query()->findOrFail($id)->delete();
        return redirect()->back();
    }

    public function restore($id)
    {
        Course::onlyTrashed()->findOrFail($id)->restore();
        return redirect()->back();
    }
}
