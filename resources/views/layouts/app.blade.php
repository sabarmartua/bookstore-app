<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Book App' }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #fafafa;
        }

        header {
            background-color: #3490dc;
            padding: 15px 40px;
            color: white;
        }

        nav {
            display: flex;
            gap: 20px;
            margin-top: 10px;
        }

        nav a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        nav a:hover {
            text-decoration: underline;
        }

        main {
            margin: 40px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        .btn {
            padding: 6px 12px;
            background-color: #3490dc;
            color: white;
            border: none;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #2779bd;
        }

        .text-danger {
            color: red;
        }
    </style>
</head>

<body>
    <header>
        <h1>{{ $title ?? 'Book App' }}</h1>
        <nav>
            <a href="{{ route('books.index') }}">List Book</a>
            <a href="{{ route('authors.index') }}">List of Author</a>
            <a href="{{ route('ratings.create') }}">Ratings</a>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>
</body>

</html>