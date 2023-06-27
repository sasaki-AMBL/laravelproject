<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1,500),
            'product_id' => $this->faker->numberBetween(1,500),
            'price' => $this->faker->numberBetween(100,100000),
            'amount' => $this->faker->numberBetween(1,100),
            'created_at' => $this->faker->dateTimeBetween('-1 years'),
            'updated_at' => $this->faker->dateTimeBetween('-1 years'),
        ];
    }
}
