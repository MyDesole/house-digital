<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ItemPropertyFactory extends Factory
{

    public function definition()
    {
        return [
            'property_id' => fake()->numberBetween(1, 50),
            'item_id' => fake()->numberBetween(1, 50),
        ];
    }
}
