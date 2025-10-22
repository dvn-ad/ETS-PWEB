<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books - MyLibrary</title>
    <link href="/css/app.css" rel="stylesheet" type="text/css">
</head>
<body>

    @include('layouts.header')

    <div style="max-width: 1200px; margin: 0 auto; padding: 2rem;">
        <h1 style="color: #1e40af; margin-bottom: 2rem;">Books Collection</h1>

        @if(session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Release Date</th>
                    <th>Publisher</th>
                    <th>Author</th>
                </tr>
            </thead>
            <tbody>
                @forelse($books as $book)
                    <tr>
                        <td>{{ $book->id }}</td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->description }}</td>
                        <td>Rp {{ number_format($book->price, 0) }}</td>
                        <td>{{ optional($book->release_date)->format('Y-m-d') }}</td>
                        <td>{{ $book->publisher->name ?? '-' }}</td>
                        <td>{{ $book->author->name ?? '-' }}</td>
                    </tr>
                @empty
                    <tr><td colspan="7">No books available.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

</body>
</html>
