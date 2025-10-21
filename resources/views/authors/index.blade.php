@extends('layouts.app')

@section('content')
<h2>List of Authors</h2>

<div class="mb-3">
    <a href="{{ route('authors.create') }}" class="btn btn-primary">+ Tambah Author</a>
    <a href="{{ route('books.famous') }}" class="btn btn-success ms-2">Lihat 10 Author Paling Terkenal</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Author Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($authors as $index => $author)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $author->name }}</td>
                <td>
                    <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('authors.destroy', $author->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="3">No authors found</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
