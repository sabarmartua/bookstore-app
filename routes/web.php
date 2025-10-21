<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\AuthorController;


Route::get('/', [BookController::class, 'index'])->name("books.index");
Route::get('/books/create', [BookController::class, 'create'])->name("books.create");
Route::get('/books/{id}', [BookController::class, 'show'])->name("books.show");
Route::post('/books', [BookController::class, 'store'])->name("books.store");
Route::put('/books/{id}', [BookController::class, 'update'])->name("books.update");
Route::delete('/books/{id}', [BookController::class, 'destroy'])->name("books.destroy");

Route::resource('authors', AuthorController::class);
Route::get('/books/famous/authors', [BookController::class, 'famousAuthors'])->name('books.famous');

Route::get('/ratings/create', [RatingController::class, 'create'])->name('ratings.create');
Route::post('/ratings', [RatingController::class, 'store'])->name('ratings.store');
Route::get('/books/by-author/{authorId}', [BookController::class, 'getBooksByAuthor']);
