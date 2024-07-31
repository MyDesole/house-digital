<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFeedbackFactory extends Factory
{
    public function definition()
    {
        return [
            'item_id' => fake()->numberBetween(1, 50),
            'header' => fake()->title(),
            'body' => fake()->text(),
            'score' => fake()->numberBetween(1, 5)
        ];
    }
}
