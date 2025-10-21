<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Book;
use App\Models\Author;

class BookFactory extends Factory
{
    protected $model = Book::class;

    public function definition()
    {
        return [
            'name' => $this->faker->sentence(3),
            'category' => $this->faker->word(),
            'author_id' => Author::inRandomOrder()->first()->id ?? 1,
            'average_rating' => 0,
            'voter' => 0,
        ];
    }
}
