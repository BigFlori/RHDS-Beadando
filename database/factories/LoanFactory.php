<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Loan>
 */
class LoanFactory extends Factory
{
    protected $model = \App\Models\Loan::class;

    private static $memberId = 1;
    private static $inventoryId = 1;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'member_id' => self::$memberId++,
            'inventory_id' => self::$inventoryId++,
            'borrow_date' => $this->faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d'),
            'return_date' => $this->faker->dateTimeBetween('now', '+1 year')->format('Y-m-d'),
        ];
    }
}
