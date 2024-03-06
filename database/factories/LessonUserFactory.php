<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Lesson;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LessonUser>
 */
class LessonUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "lesson_id" => $this->faker->numberBetween(0, Lesson::query()->count()),
            "user_id" => $this->faker->numberBetween(0, User::query()->count()),
        ];
    }
}
