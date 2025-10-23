
<html>
<head>
    <title>Reviews</title>
    <link href="/css/app.css" rel="stylesheet" type="text/css">
</head>
<body>
    @include('layouts.header')
    <div style="max-width: 900px; margin: 2rem auto; padding: 2rem; background: #f8fafc; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.05);">
        <h1>Reviews</h1>
        <a href="{{ route('review.create') }}" class="btn btn-primary" style="margin-bottom: 1.5rem;">Add Review</a>
        <ul style="list-style:none; padding:0;">
            @foreach($reviews as $review)
                <li style="background:white; margin-bottom:1rem; padding:1rem; border-radius:6px; box-shadow:0 1px 4px rgba(0,0,0,0.04);">
                    <strong>User ID:</strong> {{ $review->user_id }}<br>
                    <strong>Rating:</strong> {{ $review->rating }}<br>
                    <strong>Comment:</strong> {{ $review->content }}
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>
