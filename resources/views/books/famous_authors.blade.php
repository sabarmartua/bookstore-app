@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3 class="text-center mb-3">Top 10 Most Famous Author</h3>
    <table class="table table-bordered text-center align-middle">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Author Name</th>
                <th>Total Voter</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($authors as $index => $author)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $author['author_name'] }}</td>
                <td>{{ number_format($author['total_voter']) }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="3">No data available</td>
            </tr>
            @endforelse

        </tbody>
    </table>
</div>
@endsection