
<html>
<head>
    <title>Add Review</title>
    <link href="/css/app.css" rel="stylesheet" type="text/css">
</head>
<body>
    @include('layouts.header')
    <div style="max-width: 600px; margin: 32px auto; padding: 32px; background: #ffffffff; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.05);">
        <h1>Add Review</h1>
        <form method="POST" action="{{ route('review.store') }}">
            @csrf
            <div style="margin-bottom: 16px;">
                <label for="rating">Rating:</label>
                <input type="number" name="rating" id="rating" min="1" max="5" required>
            </div>
            <div style="margin-bottom: 16px;">
                <label for="content">Comment:</label>
                <textarea name="content" id="comment" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
