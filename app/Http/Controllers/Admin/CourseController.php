<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::withTrashed()->paginate(10);
        $coursesCount = Course::query()->count();
        return view("admin.courses.index", [
            "courses" => $courses,
            "coursesCount" => $coursesCount,
        ]);
    }

    public function show($id)
    {
        $course = Course::withTrashed()->findOrFail($id);
        $users = $course->users;
        return view("admin.courses.show", [
            "author" => $course->user,
            "course" => $course,
            "lessons" => $course->lessons,
            "users" => $users,
        ]);
    }

    public function search(Request $request)
    {
        $search = $request["searchTerm"];
        $query = Course::withTrashed()->where("title", "LIKE", "%" . $search . "%");
        if ($request["deleted"] === "true") {
            $query->whereNotNull("deleted_at");
        } elseif ($request["deleted"] === "false") {
            $query->whereNull("deleted_at");
        }
        $courses = $query->get();
        return view('admin.courses.find', ["courses" => $courses]);
    }

    public function edit($id)
    {
        $course = Course::withTrashed()->findOrFail($id);
        return view("admin.courses.edit", [
            "course" => $course,
        ]);
    }

    public function update($id, CourseRequest $request)
    {
        $course = Course::withTrashed()->findOrFail($id);
        $data = $request->validated();
        $course->update([
            "title" => $data["title"],
            "desription" => $data["description"],
            "price" => $data["price"],
        ]);
        return redirect()->route("admin.courses.show", $id);
    }

    public function delete($id)
    {
        Course::query()->findOrFail($id)->delete();
        return redirect()->back();
    }

    public function restore($id)
    {
        Course::onlyTrashed()->findOrFail($id)->restore();
        return redirect()->back();
    }
}
