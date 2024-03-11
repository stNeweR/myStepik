<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Course;
use function GuzzleHttp\describe_type;

class CatalogController extends Controller
{

    public function index()
    {
        $courses = Course::query()->where("is_published", 1)->orderBy("created_at", "desc")->paginate(10);
        return view("app.catalog.index", [
            "courses" => $courses
        ]);
    }

}
