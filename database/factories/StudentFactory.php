<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => fake()->name(),
            "address" => fake()->address(),
            "mobile" => fake()->phoneNumber(),
            "age" => fake()->numberBetween(15, 25),
            "parent-contact" => fake()->phoneNumber()
        ];
    }
}
