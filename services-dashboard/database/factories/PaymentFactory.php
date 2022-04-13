<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class paymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $types = ['deposit', 'payment'];
        return [
            'type' => $this->faker->randomElement($types),
            'stripe' => $this->faker->text(50),
            'users' => $this->faker->numberBetween(0 ,\App\Models\User::count()),
            'contracts' => $this->faker->numberBetween(0 ,\App\Models\Contract::count()),
            'amount' => $this->faker->numberBetween(50,5000),
            'paid' => $this->faker->boolean(),
        ];
    }
}
