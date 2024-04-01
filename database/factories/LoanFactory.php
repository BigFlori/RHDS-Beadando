<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Loan>
 */
class LoanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'member_id' => $this->faker->numberBetween(1, 50),
            'inventory_id' => $this->faker->numberBetween(1, 50),
            'borrow_date' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'return_date' => $this->faker->dateTimeBetween('now', '+1 year'),
        ];
    }
}
