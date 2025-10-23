
<head>
    <title>Manage Authors - Admin</title>
    <link href="/css/app.css" rel="stylesheet" type="text/css">
</head>
<body>

    @include('layouts.header')

    <div style="max-width: 1200px; margin: 0 auto; padding: 2rem;">
        <h1 style="color: #1e40af; margin-bottom: 2rem;">Manage Authors</h1>

        <p style="margin-bottom: 1.5rem;">
            <a href="{{ route('authors.create') }}" style="display: inline-block; background: #10b981; color: white; padding: 0.75rem 1.5rem; border-radius: 4px; text-decoration: none; font-weight: 500;">+ Create Author</a>
        </p>


        <table>
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

    </div>

</body>
</html>
