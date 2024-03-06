<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\CourseUser;
use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function show($id)
    {
        $course = Course::query()->findOrFail($id);
        $author = $course->user;
        $themes = $course->themes;
        return view("app.courses.show", [
            "course" => $course,
            "author" => $author,
            "themes" => $themes,
        ]);
    }

    public function subscribe(Request $request, $id)
    {
        CourseUser::query()->create([
            "user_id" => Auth::user()->id,
            "course_id" => $id,
        ]);
        return redirect()->back();
    }

    public function unSubscribe(Request $request, $id)
    {
        CourseUser::query()->where("course_id", $id)->where("user_id", Auth::user()->id)->delete();
        return redirect()->back();
    }
}
