<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lesson;

class LessonController extends Controller
{
    public function show($id)
    {
        $lesson = Lesson::query()->findOrFail($id);

        $surveys = $lesson->surveys;

        $course = $lesson->course;
        $lessons = $course->lessons;
//        foreach($surveys as $survey)
//        {
//            dump($survey->options);
//        }
        return view("app.lessons.show", [
            "lesson" => $lesson,
            "surveys" => $surveys,
            "lessons" => $lessons,
            "course" => $course,
        ]);
    }
}
