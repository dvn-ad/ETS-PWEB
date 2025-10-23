<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <!-- pake local app.css -->
    <link href="/css/app.css" rel="stylesheet" type="text/css">
</head>
<h1>Create Book</h1>

<p><a href="{{ route('books.index') }}">← Back</a></p>

<form action="{{ route('books.store') }}" method="POST">
    @csrf
    @include('admin.books._form')
    <br>
    <button type="submit">Save</button>
</form>
