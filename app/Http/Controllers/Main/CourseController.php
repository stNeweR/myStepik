<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use App\Models\CourseUser;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function show($courseId)
    {
        $course = Course::query()->findOrFail($courseId);
        if ($course["is_published"] || Gate::allows('isAuthor', $course->id)) {
            $author = $course->user;
            $themes = $course->themes;
            return view("app.courses.show", [
                "course" => $course,
                "author" => $author,
                "themes" => $themes,
            ]);
        } else {
            abort(404);
        }
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

    public function create()
    {
        return view("app.courses.create");
    }

    public function store(CourseRequest $request)
    {
        $data = $request->validated();
        Course::query()->create([
            "title" => $data["title"],
            "description" => $data["description"],
            "body" => $data["body"],
            "is_published" => false,
            "price" => $data["price"],
            "user_id" => Auth::user()->id,
        ]);
        return redirect()->route("profile");
    }

    public function myCourses()
    {
        $courses = Course::query()->where("user_id", Auth::user()->id)->get()->sortByDesc("created_at");
        $courses = $courses->map(function ($course) {
            $course["themes"] = $course->themes;
            return $course;
        });
        $courses = $courses->map(function ($course) {
            $themes = $course["themes"]->map(function ($theme) {
                $theme["lessons"] = $theme->lessons;
            });
            return $course;
        });
        return view("app.user.myCourses", [
            "courses" => $courses,
        ]);
    }

    public function edit($id)
    {
        $course = Course::query()->findOrFail($id);
        return view("app.courses.edit", [
            "course" => $course,
        ]);
    }

    public function update(CourseRequest $request, $id)
    {
        $data = $request->validated();
        $course = Course::query()->findOrFail($id);
        $course->update($data);
        return redirect()->route("courses.show", $course->id);
    }

    public function find(Request $request)
    {
        $searchTerm = $request['search'];
        $courses = Course::query()->where('user_id', Auth::user()->id)->where("title", "like", '%' . $searchTerm . '%')->get();

        return view("app.user.myCourses", [
            "courses" => $courses,
        ]);
    }

    public function publish($courseId)
    {
        $course = Course::query()->find($courseId);

        $course['is_published'] = 1;

        $course->save();
        return redirect()->route('courses.show', $courseId);
    }

    public function unpublish( $courseId)
    {
        $course = Course::query()->find($courseId);

        $course['is_published'] = 0;

        $course->save();

        return redirect()->route("courses.show", $courseId);
    }

    public function delete($courseId)
    {
        Course::query()->find($courseId)->delete();

        return redirect()->route('myCourses');
    }
}
