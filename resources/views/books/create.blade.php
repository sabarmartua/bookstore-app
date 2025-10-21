@extends('layouts.app')

@section('content')
<h2>Tambah Book</h2>

<form action="{{ route('books.store') }}" method="POST">
    @csrf

    <div>
        <label for="name">Book Name:</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" required>
    </div>

    <div>
        <label for="category">Category:</label>
        <input type="text" id="category" name="category" value="{{ old('category') }}">
    </div>

    <div>
        <label for="author_id">Author:</label>
        <select id="author_id" name="author_id" required>
            <option value="">-- Pilih Author --</option>
            @foreach($authors as $author)
                <option value="{{ $author->id }}">{{ $author->name }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="average_rating">Average Rating:</label>
        <input type="number" step="0.01" min="0" max="10" id="average_rating" name="average_rating" value="{{ old('average_rating') }}">
    </div>

    <div>
        <label for="voter">Voter:</label>
        <input type="number" min="0" id="voter" name="voter" value="{{ old('voter') }}">
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="{{ route('books.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
