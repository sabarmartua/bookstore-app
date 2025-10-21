<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RatingFactory extends Factory
{
    protected $model = \App\Models\Rating::class;

    public function definition(): array
    {
        return [
            'book_id' => $this->faker->numberBetween(1, 100000),
            'author_id' => $this->faker->numberBetween(1, 1000),
            'value' => $this->faker->numberBetween(1, 10),
        ];
    }
}
