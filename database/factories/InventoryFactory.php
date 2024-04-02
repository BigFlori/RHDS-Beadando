<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inventory>
 */
class InventoryFactory extends Factory
{
    protected $model = \App\Models\Inventory::class;

    private static $bookId = 1;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'book_id' => self::$bookId++, // Increment the book ID for each new inventory record
            'borrowable' => $this->faker->boolean(),
        ];
    }
}
