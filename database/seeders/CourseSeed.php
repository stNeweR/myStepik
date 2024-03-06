<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\CourseTag;
use App\Models\LessonUser;
use App\Models\Tag;

trait CourseSeed
{

    public function courses($number)
    {
        Course::factory($number)->create();
    }

    public function tags()
    {
        Tag::factory()->create([
            "body" => "PHP"
        ]);
        Tag::factory()->create([
            "body" => "JavaScript"
        ]);
        Tag::factory()->create([
            "body" => "Java"
        ]);
        Tag::factory()->create([
            "body" => "Golang"
        ]);
        Tag::factory()->create([
            "body" => "Laravel"
        ]);
        Tag::factory()->create([
            "body" => "Symfony"
        ]);
        Tag::factory()->create([
            "body" => "Vue"
        ]);
        Tag::factory()->create([
            "body" => "Angular"
        ]);
        Tag::factory()->create([
            "body" => "Личностный рост"
        ]);
        Tag::factory()->create([
            "body" => "Django"
        ]);
        Tag::factory()->create([
            "body" => "ЕГЭ"
        ]);
        Tag::factory()->create([
            "body" => "Spring"
        ]);
    }
    public function courseTag($number)
    {
        CourseTag::factory($number)->create();
    }

    public function lessonUser($number)
    {
        LessonUser::factory($number)->create();
    }

}
