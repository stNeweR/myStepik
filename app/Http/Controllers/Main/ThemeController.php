<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\ThemeRequest;
use App\Models\Course;
use App\Models\Theme;
use Illuminate\Http\Request;

class ThemeController extends Controller
{

    public function create($id)
    {
        return view("app.courses.themes.create", [
            "id" => $id
        ]);
    }

    public function store(ThemeRequest $request, $id)
    {
        $data = $request->validated();
        Theme::query()->create([
            "title" =>  $data["title"],
            "description" => $data["description"],
            "course_id" => $id,
        ]);

        return redirect()->route("courses.show", $id);
    }

    public function edit($theme_id)
    {
        $theme = Theme::query()->find($theme_id);
        return view('app.courses.themes.edit', [
            'theme' => $theme,
        ]);
    }

    public function update(ThemeRequest $request, $theme_id)
    {
        $data = $request->validated();
        $theme = Theme::query()->findOrFail($theme_id);
        $theme->update($data);

        $course_id = $theme->course->id;

        return redirect()->route('courses.show', $course_id);
    }

    public function delete($theme_id)
    {
        $course_id = Theme::query()->find($theme_id)->course->id;

        Theme::query()->find($theme_id)->delete();

        return redirect()->route('courses.show', $course_id);
    }
}
