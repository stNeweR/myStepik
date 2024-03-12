<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\OptionRequest;
use App\Models\Option;
use App\Models\OptionSurvey;
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

    public function succesStore(Request $request, $survey_id)
    {
        OptionSurvey::query()->create([
            'option_id' => $request['succes_option'],
            'survey_id' => $survey_id,
        ]);
        return redirect()->route('lessons.show', $survey_id);
    }
}
