<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Course;
use function GuzzleHttp\describe_type;

class CatalogController extends Controller
{

    public function index()
    {
        $courses = Course::query()->orderBy("created_at", "desc")->paginate(10);
//        dd($courses);
        return view("app.catalog.index", [
            "courses" => $courses
        ]);
    }

}
