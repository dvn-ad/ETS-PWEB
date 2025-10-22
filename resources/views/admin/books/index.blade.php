@php /** @var \Illuminate\Pagination\LengthAwarePaginator|\App\Models\Book[] $books */ @endphp
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
                <td>{{ \Illuminate\Support\Str::limit($book->description, 60) }}</td>
                <td>${{ number_format($book->price, 2) }}</td>
                <td>{{ optional($book->release_date)->format('Y-m-d') }}</td>
                <td>{{ $book->publisher->name ?? '-' }}</td>
                <td>{{ $book->author->name ?? '-' }}</td>
                <td>
                    <a href="{{ route('books.edit', $book) }}">Edit</a>
                    <form action="{{ route('books.destroy', $book) }}" method="POST" style="display:inline" onsubmit="return confirm('Delete this book?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
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
    <!-- Default pagination links; requires Tailwind or will render plain if not styled -->
    <!-- If pagination styling isn't desired, consider simple ->get() instead of ->paginate() in controller. -->
    
</div>
