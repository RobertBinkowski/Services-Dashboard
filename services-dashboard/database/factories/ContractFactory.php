<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contract>
 */
class ContractFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'address' => $this->faker->address(),
            'document' => $this->faker->word(),
            'details' => $this->faker->sentence(),
            'users' => $this->faker->numberBetween(0 ,\App\Models\User::count()),
            'service' => $this->faker->numberBetween(0 ,\App\Models\Service::count()),
            'completed' => $this->faker->boolean(),
        ];
    }
}
