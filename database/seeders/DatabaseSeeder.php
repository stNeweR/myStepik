<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Course;
use App\Models\CourseUser;
use App\Models\Lesson;
use App\Models\Option;
use App\Models\Survey;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//         \App\Models\User::factory()->create([
//             'user_name' => 'stNeweR',
//             "first_name" => "Egor",
//             "last_name" => "Sarafannikov",
//             'email' => 'shyguy096com@gmail.com',
//         ]);
//         \App\Models\User::factory(40)->create();
//         Course::factory(30)->create();
//         Lesson::factory(180)->create();
//         CourseUser::factory(40)->create();
//         Survey::factory(100)->create();
         Option::factory(300)->create();


    }
}
