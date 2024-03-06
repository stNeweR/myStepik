<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Course;
use App\Models\CourseUser;
use App\Models\Lesson;
use App\Models\Option;
use App\Models\OptionSurvey;
use App\Models\Survey;
use Illuminate\Database\Seeder;
use App\Models\RoleUser;

class DatabaseSeeder extends Seeder
{
    use UserSeed, CourseSeed, ThemeSeed;
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
    //    $this->users(50);
    //    $this->roles(8);
    //    $this->courses(30);
    //    $this->tags();
    //    $this->themes(150);
    //    $this->lessons(450);
    //    $this->surveys(150);
    //    $this->options(450);
    //    $this->courseTag(45);
    //    $this->courseUser(50);
    //    $this->lessonUser(60);
        OptionSurvey::factory(150)->create();
    }
}
