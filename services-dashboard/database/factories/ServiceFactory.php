<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use app\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'address' => $this->faker->address(),
            'score' => $this->faker->numberBetween(0,10),
            'price' => $this->faker->numberBetween(12,500),
            'users' => $this->faker->numberBetween(0 ,\App\Models\User::count()),
        ];
    }
}
