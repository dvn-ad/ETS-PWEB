@php($editing = isset($book))
@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div style="display:grid; gap:8px; max-width:520px;">
    <label>
        Title
        <input type="text" name="title" value="{{ old('title', $editing ? $book->title : '') }}" required />
    </label>

    <label>
        Description
        <textarea name="description" rows="4">{{ old('description', $editing ? $book->description : '') }}</textarea>
    </label>

    <label>
        Price
        <input type="number" step="0.01" min="0" name="price" value="{{ old('price', $editing ? $book->price : '') }}" required />
    </label>

    <label>
        Stock
        <input type="number" min="0" name="stock" value="{{ old('stock', $editing ? $book->stock : 0) }}" required />
    </label>

    <label>
        Release Date
        <input type="date" name="release_date" value="{{ old('release_date', $editing && $book->release_date ? $book->release_date->format('Y-m-d') : '') }}" />
    </label>

    <label>
        Author
        <select name="author_id" required>
            <option value="">-- select --</option>
            @foreach($authors as $author)
                <option value="{{ $author->id }}" @selected(old('author_id', $editing ? $book->author_id : '') == $author->id)>
                    {{ $author->name }}
                </option>
            @endforeach
        </select>
    </label>

    <label>
        Publisher
        <select name="publisher_id" required>
            <option value="">-- select --</option>
            @foreach($publishers as $publisher)
                <option value="{{ $publisher->id }}" @selected(old('publisher_id', $editing ? $book->publisher_id : '') == $publisher->id)>
                    {{ $publisher->name }}
                </option>
            @endforeach
        </select>
    </label>
</div>
