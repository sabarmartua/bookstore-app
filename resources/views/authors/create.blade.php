@extends('layouts.app')

@section('content')
<h2>Tambah Author Baru</h2>

<form method="POST" action="{{ route('authors.store') }}">
    @csrf
    <div class="mb-3">
        <label for="name">Nama Author</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div><br><br>
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="{{ route('authors.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
