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

}
