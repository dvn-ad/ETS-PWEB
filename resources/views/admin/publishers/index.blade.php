<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Publishers - Admin</title>
    <link href="/css/app.css" rel="stylesheet" type="text/css">
</head>
<body>

    @include('layouts.header')

    <div style="max-width: 1200px; margin: 0 auto; padding: 2rem;">
        <h1 style="color: #1e40af; margin-bottom: 2rem;">Manage Publishers</h1>

        <p style="margin-bottom: 1.5rem;">
            <a href="{{ route('publishers.create') }}" style="display: inline-block; background: #10b981; color: white; padding: 0.75rem 1.5rem; border-radius: 4px; text-decoration: none; font-weight: 500;">+ Add Publisher</a>
        </p>

        @if(session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert-error">{{ session('error') }}</div>
        @endif

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

    </div>

</body>
</html>
