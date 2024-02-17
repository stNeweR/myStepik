<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{

    public function index()
    {
        return view("admin.lessons.index");
    }

    public function show($id)
    {
        $lesson = Lesson::query()->findOrFail($id);
        $surveys = $lesson->surveys;
        return view("admin.lessons.show", [
            "lesson" => $lesson,
            "surveys" => $surveys
        ]);
    }

}
