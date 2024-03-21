<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\LessonRequest;
use App\Http\Requests\ThemeRequest;
use App\Models\Theme;
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

    public function create($theme_id)
    {
        $theme = Theme::query()->findOrFail($theme_id);
        return view("app.courses.lessons.create", [
            "theme" => $theme,
        ]);
    }

    public function store(LessonRequest $request, $theme_id)
    {
        $data = $request->validated();
        $course_id = Theme::query()->find($theme_id)->course->id;
        Lesson::query()->create([
            "title" => $data["title"],
            "body" => $data['body'],
            'theme_id' => $theme_id,
        ]);
        return redirect()->route("courses.show", $course_id);
    }

    public function edit($lesson_id)
    {
        $lesson = Lesson::query()->findOrFail($lesson_id);

        return view('app.courses.lessons.edit', [
            'lesson' => $lesson
        ]);
    }

    public function update(LessonRequest $request, $lesson_id)
    {
        $data = $request->validated();
        $lesson = Lesson::query()->findOrFail($lesson_id);

        $lesson->update($data);

        return redirect()->route('lessons.show', $lesson_id);
    }

    public function delete($lesson_id)
    {
        $lesson = Lesson::query()->findOrFail($lesson_id);
        $course_id = $lesson->theme->course->id;
        $lesson->delete();

        return redirect()->route('courses.show',$course_id);
    }
}
