@extends('layouts.app')

@section('content')
<h2>Edit Author</h2>

<form method="POST" action="{{ route('authors.update', $author->id) }}">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="name">Nama Author</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ $author->name }}" required>
    </div><br><br>
    <button type="submit" class="btn btn-success">Update</button>
    <a href="{{ route('authors.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
