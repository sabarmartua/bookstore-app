<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Author;
use App\Models\Book;
use App\Models\Rating;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Author::factory(1000)->create();
        $this->command->info('1000 authors created');

        Book::factory(5000)->create();
        $this->command->info('5,000 books created');

        $books = Book::all();
        $ratings = [];

        foreach ($books as $book) {
            $count = rand(0, 5);
            for ($i = 0; $i < $count; $i++) {
                $ratings[] = [
                    'book_id' => $book->id,
                    'author_id' => $book->author_id,
                    'value' => rand(1, 10),
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        foreach (array_chunk($ratings, 1000) as $chunk) {
            DB::table('ratings')->insert($chunk);
        }
        $this->command->info(' Ratings created');

        foreach ($books as $book) {
            $avg = DB::table('ratings')->where('book_id', $book->id)->avg('value') ?? 0;
            $count = DB::table('ratings')->where('book_id', $book->id)->count();
            $book->update([
                'average_rating' => $avg,
                'voter' => $count,
            ]);
        }
        $this->command->info(' Book average_rating & voter updated');
    }
}
