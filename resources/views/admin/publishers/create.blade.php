<head>
    <title>Create Publisher - Admin</title>
    <link href="/css/app.css" rel="stylesheet" type="text/css">
</head>

<h1>Create New Publisher</h1>

<p>
    <a href="{{ route('publishers.index') }}">Back to Publishers List</a>
</p>

@if ($errors->any())
    <div style="color: red; padding: 10px; background: #f8d7da; border: 1px solid #f5c6cb; margin-bottom: 10px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('publishers.store') }}" method="POST" style="max-width: 500px;">
    @csrf
    
    <div style="margin-bottom: 15px;">
        <label for="name" style="display: block; margin-bottom: 5px;">Publisher Name *</label>
        <input 
            type="text" 
            id="name" 
            name="name" 
            value="{{ old('name') }}"
            required
            style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;"
        >
    </div>

    <div>
        <button type="submit" style="padding:10px 20px; background:#28a745; color:white; border:none; border-radius:4px; cursor:pointer;">
            Create Publisher
        </button>
        <a href="{{ route('publishers.index') }}" style="padding:10px 20px; background:#6c757d; color:white; text-decoration:none; border-radius:4px; display:inline-block; margin-left:10px;">
            Cancel
        </a>
    </div>
</form>
