<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <!-- -->
    <link href="/css/app.css" rel="stylesheet" type="text/css">
</head>

<h1>Edit Book #{{ $book->id }}</h1>

<form action="{{ route('books.index') }}" method="GET" style="display:inline;">
    <button type="submit" style="padding:8px 16px; background:#007bff; color:white; border:none; border-radius:4px; cursor:pointer;">
        Back
    </button>
</form>

<form action="{{ route('books.update', $book) }}" method="POST">
    @csrf
    @method('PUT')
    @include('admin.books._form', ['book' => $book])
    <br>
    <button type="submit">Update</button>
    <a href="{{ route('books.index') }}">Cancel</a>
 </form>
