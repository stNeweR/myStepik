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
        $option = OptionSurvey::query()->where('survey_id', $survey_id)->first();

        if ($option) {
            $option->delete();
        }

        OptionSurvey::query()->create([
            'option_id' => $request['succes_option'],
            'survey_id' => $survey_id,
        ]);
        return redirect()->route('lessons.show', $survey_id);
    }

    public function delete(Request $request, $lesson_id)
    {
        $optionSurvey = OptionSurvey::query()->where('option_id', $request['delete_option'])->first();
        if ($optionSurvey) {
            $optionSurvey->delete();
            Option::query()->find($request['delete_option'])->delete();
            return redirect()->route('lessons.show', $lesson_id);
        }

        Option::query()->find($request['delete_option'])->delete();

        return redirect()->route('lessons.show',$lesson_id );
    }
}
