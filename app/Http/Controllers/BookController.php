<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class BookController extends Controller
{
    public function index(Request $request): View
    {
        $limit = $request->input('limit', 10);
        $search = $request->input('search');

        $query = Book::with('author');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhereHas('author', function ($sub) use ($search) {
                      $sub->where('name', 'like', "%{$search}%");
                  });
            });
        }

        $books = $query->orderByDesc('average_rating')->paginate($limit);

        return view('books.index', compact('books', 'limit', 'search'));
    }

    public function create(): View
    {
        $authors = Author::all();
        return view('books.create', compact('authors'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'author_id' => 'required|exists:authors,id',
        ], [
            'name.required' => 'Nama buku wajib diisi.',
            'author_id.exists' => 'Author tidak ditemukan.',
        ]);

        Book::create($validated + [
            'average_rating' => 0,
            'voter' => 0,
        ]);

        return redirect()
            ->route('books.index')
            ->with('success', 'Book berhasil ditambahkan!');
    }

    public function famousAuthors(): View
    {
        $authors = Author::with(['books' => function ($q) {
                $q->where('average_rating', '>', 5)
                  ->withCount('ratings');
            }])
            ->get()
            ->map(fn($author) => [
                'author_name' => $author->name,
                'total_voter' => $author->books->sum('ratings_count'),
            ])
            ->filter(fn($author) => $author['total_voter'] >= 5)
            ->sortByDesc('total_voter')
            ->take(10)
            ->values();

        return view('books.famous_authors', compact('authors'));
    }

    public function getBooksByAuthor(int $authorId): JsonResponse
    {
        $books = Book::where('author_id', $authorId)
            ->select('id', 'name')
            ->get();

        return response()->json($books);
    }
}
