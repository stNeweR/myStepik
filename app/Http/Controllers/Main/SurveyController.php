<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\OptionSurvey;
use App\Models\Survey;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function check(Request $request, $id)
    {
        dump($request->all());
        $result = OptionSurvey::query()
            ->where("survey_id", $id)
            ->where("option_id", $request->option_id)->exists();
        $succesOption = Survey::query()->find($id)->succesOption[0];
        if ($result) {
            return redirect()->back()->with("message", "Вы выбрали правильный ответ!");
        }
        return redirect()->back()->with("message", "Нет, это не правильный ответ: " . $succesOption->body);
    }
}
