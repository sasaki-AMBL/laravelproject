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
            'user_id' => $this->faker->numberBetween($min=1,$max=500),
            'product_id' => $this->faker->numberBetween($min=1,$max=500),
            'price' => $this->faker->numberBetween($min = 100,$max = 100000),
            'category_id' => $this->faker->numberBetween($min = 1,$max = 6),
            'owner_id' => $this->faker->numberBetween($min = 1,$max = 2),
            'stock' => $this->faker->numberBetween($min = 1,$max = 10000),
            'display' => $this->faker->numberBetween($min = 0,$max = 1),
            'created_at' => $this->faker->dateTimeBetween('-5 years'),
            'updated_at' => $this->faker->dateTimeBetween('-5 years'),

        ];
    }
}
