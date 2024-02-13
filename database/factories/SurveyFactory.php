<?php

namespace Database\Factories;

use App\Models\Lesson;
use App\Models\Lessons;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            "question" => fake()->sentence(),
            "lesson_id" => rand(1, Lesson::query()->count())
        ];
    }
}
