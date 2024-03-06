<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\LessonUser;
use Illuminate\Support\Facades\Auth;

class LessonController extends Controller
{
    public function show($id)
    {
        $lesson = Lesson::query()->findOrFail($id);
        $surveys = $lesson->surveys;

        $theme = $lesson->theme;
        $course = $theme->course;
        $themes = $course->themes;
        $themes = $themes->map(function ($theme) {
            $theme['lessons'] = $theme->lessons;
            return $theme;
        });
        $myLessons = Auth::user()->lessons;
        return view("app.lessons.show", [
            "lesson" => $lesson,
            "surveys" => $surveys,
            "themes" => $themes,
            "course" => $course,
            "myLessons" => $myLessons,
        ]);
    }

    public function succes($id)
    {
        LessonUser::query()->create([
            "user_id" => Auth::user()->id,
            "lesson_id" => $id,
        ]);

        return redirect()->back();
    }

    public function unsuccess($id)
    {
        LessonUser::query()
            ->where("user_id", Auth::user()->id)
            ->where("lesson_id", $id)
            ->delete();
        return redirect()->back();
    }
}
