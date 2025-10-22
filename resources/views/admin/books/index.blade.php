<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <!-- link style.css -->
    <link href="https://ets-pweb-production.up.railway.app/style.css" rel="stylesheet" type="text/css"> 
</head>

<h1>Manage Books</h1>

<p>
    <a href="{{ route('books.create') }}">+ Create Book</a>
    | <a href="/">Back to Home</a>
</p>

@if(session('success'))
    <div style="color: green;">{{ session('success') }}</div>
@endif

<table border="1" cellpadding="8" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Price</th>
            <th>Release Date</th>
            <th>Publisher</th>
            <th>Author</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($books as $book)
            <tr>
                <td>{{ $book->id }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->description }}</td>
                <td>Rp {{ number_format($book->price) }}</td>
                <td>{{ optional($book->release_date)->format('d-m-Y') }}</td>
                <td>{{ $book->publisher->name ?? '-' }}</td>
                <td>{{ $book->author->name ?? '-' }}</td>
                <td>
                    <!-- <a href="{{ route('books.edit', $book) }}">Edit</a> -->
                     <form action="{{ route('books.edit', $book) }}" method="GET" style="display:inline;">
                        <button type="submit" style="padding:8px 16px; background:#007bff; color:white; border:none; border-radius:4px; cursor:pointer;">
                            Edit
                        </button>
                    </form>

                    <form action="{{ route('books.destroy', $book) }}" method="POST" style="display:inline" onsubmit="return confirm('Delete this book?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="padding:8px 16px; background:#ff0000; color:white; border:none; border-radius:4px; cursor:pointer;">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="8">No books yet.</td></tr>
        @endforelse
    </tbody>
</table>

<div style="margin-top: 10px;">
    {{ $books->links() }}
</div>
