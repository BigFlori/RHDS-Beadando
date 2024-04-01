<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Member>
 */
class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type_id' => $this->faker->numberBetween(1, 4),
            'name' => $this->faker->name(),
            'email' => $this->faker->unique(maxRetries: 999999)->safeEmail(),
            'phone_number' => $this->faker->phoneNumber(),
            'zip_code' => $this->faker->postcode(),
            'city' => $this->faker->city(),
            'address' => $this->faker->address(),
        ];
    }
}
