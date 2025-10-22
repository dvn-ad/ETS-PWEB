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

        <!-- Search Form -->
        <div class="search-container">
            <form method="GET" action="{{ route('books.public') }}" class="search-form">
                <div class="search-input-group">
                    <select name="search_type" id="search_type" class="search-select">
                        <option value="name" {{ request('search_type', 'name') == 'name' ? 'selected' : '' }}>Search by Name</option>
                        <option value="id" {{ request('search_type') == 'id' ? 'selected' : '' }}>Search by ID</option>
                    </select>
                    <input 
                        type="text" 
                        name="search" 
                        id="search" 
                        class="search-input" 
                        placeholder="Enter book name or ID..." 
                        value="{{ request('search') }}"
                    >
                    <button type="submit" class="btn-search">Search</button>
                    @if(request('search'))
                        <a href="{{ route('books.public') }}" class="btn-clear">Clear</a>
                    @endif
                </div>
            </form>
        </div>

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

    <script>
        // Update placeholder text based on search type
        const searchTypeSelect = document.getElementById('search_type');
        const searchInput = document.getElementById('search');
        
        function updatePlaceholder() {
            if (searchTypeSelect.value === 'id') {
                searchInput.placeholder = 'Enter book ID...';
                searchInput.type = 'number';
            } else {
                searchInput.placeholder = 'Enter book name...';
                searchInput.type = 'text';
            }
        }
        
        searchTypeSelect.addEventListener('change', updatePlaceholder);
        
        // Set initial placeholder on page load
        updatePlaceholder();
    </script>

</body>
</html>
