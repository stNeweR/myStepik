<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{

    public function index()
    {
        $lessonsCount = Lesson::query()->count();
        $lessons = Lesson::withTrashed()->paginate(20);
        return view("admin.lessons.index", [
            "lessons" => $lessons,
            "lessonsCount" => $lessonsCount,
        ]);
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

    public function search(Request $request)
    {
        $searchTerm = $request["searchTerm"];
        $query = Lesson::withTrashed()->where("title", "LIKE", "%" . $searchTerm . "%");
        if ($request["deleted"] === "true") {
            $query->whereNotNull("deleted_at");
        } elseif ($request["deleted"] === "false") {
            $query->whereNull("deleted_at");
        }
        $lessons = $query->get();
        return view("admin.lessons.search", [
            "lessons" => $lessons,
        ]);
    }
}
