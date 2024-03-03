<?php

namespace Database\Seeders;

use App\Models\Option;
use App\Models\Theme;
use App\Models\Lesson;
use App\Models\Survey;

trait ThemeSeed
{
    public function themes($number)
    {
        Theme::factory($number)->create();
    }

    public function lessons($number)
    {
        Lesson::factory($number)->create();
    }

    public function surveys($number)
    {
        Survey::factory($number)->create();
    }

    public function options($number)
    {
        Option::factory($number)->create();
    }
}
