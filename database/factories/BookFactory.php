<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    protected $model = \App\Models\Book::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ISBN' => $this->faker->isbn13(),
            'title' => $this->faker->sentence(),
            'author' => $this->faker->name(),
            'publisher' => $this->faker->company(),
            'publication_year' => $this->faker->year(),
            'edition' => $this->faker->word(),
        ];
    }
}
