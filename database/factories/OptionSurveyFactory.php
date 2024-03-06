<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Option;
use App\Models\Survey;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OptionSurvey>
 */
class OptionSurveyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "option_id" => fake()->numberBetween(1, Option::query()->count()),
            "survey_id" => fake()->unique()->numberBetween(0, Survey::query()->count()),
        ];
    }
}
