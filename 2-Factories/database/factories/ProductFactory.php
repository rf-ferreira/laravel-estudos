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
        // what will be created in the db 
        return [
            'product' => $this->faker->sentence(1),
            'price' => $this->faker->randomFloat(2, 0, 8)
        ];
    }
}
