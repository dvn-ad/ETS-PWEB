
<head>
    <title>Edit Author - Admin</title>
    <link href="/css/app.css" rel="stylesheet" type="text/css">
</head>
<body>

    @include('layouts.header')

    <div style="max-width: 1200px; margin: 0 auto; padding: 2rem;">
        <h1 style="color: #1e40af; margin-bottom: 2rem;">Edit Author</h1>

        <p style="margin-bottom: 1.5rem;">
            <a href="{{ route('authors.index') }}" style="display: inline-block; background: #6b7280; color: white; padding: 0.5rem 1rem; border-radius: 4px; text-decoration: none;">← Back to Authors List</a>
        </p>

        @if ($errors->any())
            <div class="alert-error">
                <ul style="margin: 0; padding-left: 1.5rem;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('authors.update', $author) }}" method="POST" style="max-width: 500px;">
            @csrf
            @method('PUT')
            
            <div style="margin-bottom: 15px;">
                <label for="name" style="display: block; margin-bottom: 5px; font-weight: 500;">Author Name *</label>
                <input 
                    type="text" 
                    id="name" 
                    name="name" 
                    value="{{ old('name', $author->name) }}"
                    required
                >
            </div>

            <div>
                <button type="submit" style="padding:10px 20px; background:#2563eb; color:white; border:none; border-radius:4px; cursor:pointer; font-weight: 500;">
                    Update Author
                </button>
                <a href="{{ route('authors.index') }}" style="padding:10px 20px; background:#6c757d; color:white; text-decoration:none; border-radius:4px; display:inline-block; margin-left:10px;">
                    Cancel
                </a>
            </div>
        </form>
    </div>

</body>
</html>
