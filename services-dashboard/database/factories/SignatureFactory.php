<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SignatureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'users' => $this->faker->numberBetween(0 ,\App\Models\User::count()),
            'contract' => $this->faker->numberBetween(0 ,\App\Models\Contract::count()),
            'hash' => $this->faker->hash(),
        ];
    }
}
