<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\OptionRequest;
use App\Models\Option;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    public function store(OptionRequest $request, $survey_id)
    {
        $data = $request->validated();
        Option::query()->create([
            "body" => $data["body"],
            "survey_id" => $survey_id,
        ]);
        return redirect()->route("lessons.show", $survey_id);
    }
}
