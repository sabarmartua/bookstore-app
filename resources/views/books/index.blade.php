@extends('layouts.app')

@section('content')
<h2>List of Books with Filter</h2>

<a href="{{ route('books.create') }}" class="btn btn-primary mb-3">+ Tambah Book</a><br><br>
<form method="GET" action="{{ route('books.index') }}" class="mb-4">
    <label>List shown:</label>
    <select name="limit">
        {{-- 10, 20, 30 ... 100 --}}
        @for ($i = 10; $i <= 100; $i +=10)
            <option value="{{ $i }}" {{ $limit == $i ? 'selected' : '' }}>{{ $i }}</option>
            @endfor

            {{-- tambahan: 200, 500, 1000 --}}
            @foreach ([200, 500, 1000] as $val)
            <option value="{{ $val }}" {{ $limit == $val ? 'selected' : '' }}>{{ $val }}</option>
            @endforeach
    </select>


    <label class="ms-3">Search:</label>
    <input type="text" name="search" value="{{ $search }}">
    <button type="submit" class="btn btn-sm btn-secondary">SUBMIT</button>
</form>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Book Name</th>
            <th>Category</th>
            <th>Author</th>
            <th>Average Rating</th>
            <th>Voter</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($books as $index => $book)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $book->name }}</td>
            <td>{{ $book->category ?? '-' }}</td>
            <td>{{ $book->author->name ?? '-' }}</td>
            <td>{{ number_format($book->average_rating, 2) }}</td>
            <td>{{ $book->voter }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="6">No books found.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection