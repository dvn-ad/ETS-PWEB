@php /** @var \App\Models\Book $book */ @endphp
<h1>Edit Book #{{ $book->id }}</h1>

<p><a href="{{ route('books.index') }}">← Back</a></p>

<form action="{{ route('books.update', $book) }}" method="POST">
    @csrf
    @method('PUT')
    @include('admin.books._form', ['book' => $book])
    <br>
    <button type="submit">Update</button>
    <a href="{{ route('books.index') }}">Cancel</a>
 </form>
