<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publishers - WebPro Library</title>
    <link href="/css/app.css" rel="stylesheet" type="text/css">
</head>
<body>

    @include('layouts.header')

    <div style="max-width: 1200px; margin: 0 auto; padding: 2rem;">
        <h1 style="color: #1e40af; margin-bottom: 2rem;">Publishers</h1>

        @if(session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Books Count</th>
                </tr>
            </thead>
            <tbody>
                @forelse($publishers as $publisher)
                    <tr>
                        <td>{{ $publisher->id }}</td>
                        <td>{{ $publisher->name }}</td>
                        <td>{{ $publisher->books_count }}</td>
                    </tr>
                @empty
                    <tr><td colspan="3">No publishers available.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

</body>
</html>
