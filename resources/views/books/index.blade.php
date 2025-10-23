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

        <!-- search form -->
        <div class="search-container">
            <form method="GET" action="{{ route('books.public') }}" class="search-form">
                <div class="search-input-group">
                    <select name="search_type" id="search_type" class="search-select">
                        <option value="title" {{ request('search_type', 'title') == 'title' ? 'selected' : '' }}>Search by Title</option>
                        <option value="author" {{ request('search_type') == 'author' ? 'selected' : '' }}>Search by Author</option>
                        <option value="publisher" {{ request('search_type') == 'publisher' ? 'selected' : '' }}>Search by Publisher</option>
                        <option value="id" {{ request('search_type') == 'id' ? 'selected' : '' }}>Search by ID</option>
                    </select>
                    <input 
                        type="text" 
                        name="search" 
                        id="search" 
                        class="search-input" 
                        placeholder="Enter book title..." 
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
                    <th>Stock</th>
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
                        <td>{{ $book->stock }}</td>
                        <td>{{ optional($book->release_date)->format('Y-m-d') }}</td>
                        <td>{{ $book->publisher->name ?? '-' }}</td>
                        <td>{{ $book->author->name ?? '-' }}</td>
                    </tr>
                @empty
                    <tr><td colspan="8">No books available.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <script>
        const searchTypeSelect = document.getElementById('search_type');
        const searchInput = document.getElementById('search');
        
        function updatePlaceholder() {
            const searchType = searchTypeSelect.value;
            
            if (searchType === 'id') {
                searchInput.placeholder = 'Enter book ID...';
                searchInput.type = 'number';
            } else if (searchType === 'title') {
                searchInput.placeholder = 'Enter book title...';
                searchInput.type = 'text';
            } else if (searchType === 'author') {
                searchInput.placeholder = 'Enter author name...';
                searchInput.type = 'text';
            } else if (searchType === 'publisher') {
                searchInput.placeholder = 'Enter publisher name...';
                searchInput.type = 'text';
            }
        }
        
        searchTypeSelect.addEventListener('change', updatePlaceholder);
        
        // Set initial placeholder on page load
        updatePlaceholder();
    </script>

</body>
</html>
