<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function create()
    {
        $authors = Author::with('books')->get();

        return view('rating.create', [
            'title' => 'Insert Rating',
            'authors' => $authors
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'author_id' => 'required|exists:authors,id',
            'book_id' => 'required|exists:books,id',
            'value' => 'required|integer|min:1|max:10',
        ]);

        $book = Book::where('id', $validated['book_id'])
            ->where('author_id', $validated['author_id'])
            ->first();

        if (!$book) {
            return back()->withErrors(['book_id' => 'Buku ini tidak sesuai dengan author yang dipilih.']);
        }

        Rating::create($validated);

        // Update rata-rata dan jumlah voter
        $book->update([
            'average_rating' => Rating::where('book_id', $book->id)->avg('value'),
            'voter' => Rating::where('book_id', $book->id)->count(),
        ]);

        return redirect()->route('books.index')->with('success', 'Rating berhasil ditambahkan!');
    }
}
