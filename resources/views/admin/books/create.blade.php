<h1>Create Book</h1>

<p><a href="{{ route('books.index') }}">← Back</a></p>

<form action="{{ route('books.store') }}" method="POST">
    @csrf
    @include('admin.books._form')
    <br>
    <button type="submit">Save</button>
</form>
