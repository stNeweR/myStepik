<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index()
    {
        $courses = Course::query()->where("is_published", 1)->orderBy("created_at", "desc")->paginate(10);
        return view("app.catalog.index", [
            "courses" => $courses
        ]);
    }

    public function find(Request $request)
    {
        $searchTerm = $request['search'];
        $courses = Course::query()
            ->where("is_published", 1)
            ->where("title", 'like', '%' . $searchTerm . '%')
            ->get();

        return view("app.catalog.find", [
            "courses" => $courses,
            'searchTerm' => $searchTerm,
        ]);
    }

}
