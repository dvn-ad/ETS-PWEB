<head>
    @include('layouts.header')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Publishers - Admin</title>
    <link href="/css/app.css" rel="stylesheet" type="text/css">
</head>

<h1>Manage Publishers</h1>

<p>
    <a href="{{ route('publishers.create') }}">+ Create Publisher</a>
    | <a href="{{ route('books.index') }}">Manage Books</a>
    | <a href="{{ route('authors.index') }}">Manage Authors</a>
    | <a href="/">Back to Home</a>
</p>

@if(session('success'))
    <div style="color: green; padding: 10px; background: #d4edda; border: 1px solid #c3e6cb; margin-bottom: 10px;">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div style="color: red; padding: 10px; background: #f8d7da; border: 1px solid #f5c6cb; margin-bottom: 10px;">
        {{ session('error') }}
    </div>
@endif

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
        @forelse($publishers as $publisher)
            <tr>
                <td>{{ $publisher->id }}</td>
                <td>{{ $publisher->name }}</td>
                <td>{{ $publisher->books_count }}</td>
                <td>
                    <form action="{{ route('publishers.edit', $publisher) }}" method="GET" style="display:inline;">
                        <button type="submit" style="padding:8px 16px; background:#007bff; color:white; border:none; border-radius:4px; cursor:pointer;">
                            Edit
                        </button>
                    </form>

                    <form action="{{ route('publishers.destroy', $publisher) }}" method="POST" style="display:inline" onsubmit="return confirm('Delete this publisher?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="padding:8px 16px; background:#ff0000; color:white; border:none; border-radius:4px; cursor:pointer;">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="5">No publishers yet.</td></tr>
        @endforelse
    </tbody>
</table>

<div style="margin-top: 10px;">
    {{ $publishers->links() }}
</div>
