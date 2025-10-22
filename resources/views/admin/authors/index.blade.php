<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Authors - Admin</title>
    <link href="https://ets-pweb-production.up.railway.app/style.css" rel="stylesheet" type="text/css"> 
</head>

<h1>Manage Authors</h1>

<p>
    <a href="{{ route('authors.create') }}">+ Create Author</a>
    | <a href="{{ route('books.index') }}">Manage Books</a>
    | <a href="{{ route('publishers.index') }}">Manage Publishers</a>
    | <a href="/">Home</a>
</p>

<table border="1" cellpadding="8" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Books Count</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($authors as $author)
            <tr>
                <td>{{ $author->id }}</td>
                <td>{{ $author->name }}</td>
                <td>{{ $author->books_count }}</td>
                <td>
                    <form action="{{ route('authors.edit', $author) }}" method="GET" style="display:inline;">
                        <button type="submit" style="padding:8px 16px; background:#007bff; color:white; border:none; border-radius:4px; cursor:pointer;">
                            Edit
                        </button>
                    </form>

                    <form action="{{ route('authors.destroy', $author) }}" method="POST" style="display:inline" onsubmit="return confirm('Delete this author?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="padding:8px 16px; background:#ff0000; color:white; border:none; border-radius:4px; cursor:pointer;">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" style="text-align:center;">No authors found.</td>
            </tr>
        @endforelse
    </tbody>
</table>

<div style="margin-top: 10px;">
    {{ $authors->links() }}
</div>
