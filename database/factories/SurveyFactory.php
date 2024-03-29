<?php

namespace Database\Factories;

use App\Models\Lesson;
use App\Models\Lessons;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Option;
use App\Models\Survey;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Survey>
 */
class SurveyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "body" => fake()->text(),
            "lesson_id" => rand(1, Lesson::query()->count()),
        ];
    }
}
