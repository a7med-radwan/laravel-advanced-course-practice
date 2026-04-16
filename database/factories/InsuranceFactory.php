<?php

namespace Database\Factories;

use App\Models\Insurance;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Insurance>
 */
class InsuranceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'serial' => fake()->unique()->randomNumber(8),
            'expire' => fake()->date(),
            'wife_name' => fake()->name('female'),
            'user_id' => null, // Will set when creating
        ];
    }
}
