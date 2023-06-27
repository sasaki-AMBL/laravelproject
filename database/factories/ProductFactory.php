<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->lexify('Product????'),
            'price' => $this->faker->numberBetween($min = 100,$max = 100000),
            'category_id' => $this->faker->numberBetween($min = 1,$max = 6),
            'owner_id' => $this->faker->numberBetween($min = 1,$max ),
            'stock' => $this->faker->numberBetween($min = 1,$max = 10000),
            'display' => $this->faker->numberBetween($min = 0,$max = 1),
            'created_at' => $this->faker->dateTimeBetween('-5 years','-1 years'),
            'updated_at' => $this->faker->dateTimeBetween('-5 years','-1 years'),

        ];
    }
}
