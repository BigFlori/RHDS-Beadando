<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MemberType>
 */
class MemberTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'borrow_limit' => $this->faker->numberBetween(1, 30),
            'borrow_day_limit' => $this->faker->numberBetween(1, 10),
        ];
    }
}
