@extends('layouts.app')

@section('content')
<div style="max-width: 600px; margin: 0 auto;">
    <h2 style="text-align:center; margin-top:30px;">Insert Rating</h2>

    @if ($errors->any())
    <div style="color:red; margin-bottom:15px;">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('ratings.store') }}" method="POST" style="text-align:center;">
        @csrf
        <table style="margin: 0 auto;">
            <tr>
                <td style="text-align:right; padding:8px;">Book Author :</td>
                <td style="padding:8px;">
                    <select id="author" name="author_id" required>
                        <option value="">-- Select Author --</option>
                        @foreach ($authors as $author)
                        <option value="{{ $author->id }}" {{ old('author_id') == $author->id ? 'selected' : '' }}>
                            {{ $author->name }}
                        </option>
                        @endforeach
                    </select>
                </td>
            </tr>

            <tr>
                <td style="text-align:right; padding:8px;">Book Name :</td>
                <td style="padding:8px;">
                    <select id="book" name="book_id" required>
                        <option value="">-- Select Book --</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td style="text-align:right; padding:8px;">Rating :</td>
                <td style="padding:8px;">
                    <select name="value" required>
                        <option value="">-- Select Rating --</option>
                        @for ($i = 1; $i <= 10; $i++)
                            <option value="{{ $i }}" {{ old('value') == $i ? 'selected' : '' }}>{{ $i }}</option>
                            @endfor
                    </select>
                </td>
            </tr>

            <tr>
                <td colspan="2" style="text-align:center; padding-top:15px;">
                    <button type="submit" class="btn">SUBMIT</button>
                </td>
            </tr>
        </table>
    </form>
</div>

<script>
    document.getElementById('author').addEventListener('change', function() {
        const authorId = this.value;
        const bookSelect = document.getElementById('book');

        bookSelect.innerHTML = '<option value="">-- Loading... --</option>';

        if (authorId) {
            fetch(`/books/by-author/${authorId}`)
                .then(response => response.json())
                .then(data => {
                    bookSelect.innerHTML = '<option value="">-- Select Book --</option>';
                    data.forEach(book => {
                        const option = document.createElement('option');
                        option.value = book.id;
                        option.textContent = book.name;
                        bookSelect.appendChild(option);
                    });
                })
                .catch(() => {
                    bookSelect.innerHTML = '<option value="">-- Failed to Load --</option>';
                });
        } else {
            bookSelect.innerHTML = '<option value="">-- Select Book --</option>';
        }
    });
</script>
@endsection