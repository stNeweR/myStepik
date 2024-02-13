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
        dump($lesson->surveys[0]->options);

    }

}
