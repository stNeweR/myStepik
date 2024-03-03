<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title" => fake()->sentence(),
            "description" => fake()->paragraph(6),
            "body" => fake()->text(2000),
            "user_id" => rand(0, User::all()->count()),
            "price" => fake()->randomNumber(4, true),
            "is_published" => fake()->boolean(),
        ];
    }
}
