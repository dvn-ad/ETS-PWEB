<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit User - Admin</title>
    <link href="/css/app.css" rel="stylesheet" type="text/css">
</head>
<body>

    @include('layouts.header')

    <div style="max-width: 1200px; margin: 0 auto; padding: 2rem;">
        <h1 style="color: #1e40af; margin-bottom: 2rem;">Edit User #{{ $user->id }}</h1>

        <form action="{{ route('users.index') }}" method="GET" style="display:inline; margin-bottom: 1.5rem;">
            <button type="submit" style="padding:8px 16px; background:#007bff; color:white; border:none; border-radius:4px; cursor:pointer;">
                Back
            </button>
        </form>

        <form action="{{ route('users.update', $user) }}" method="POST" style="margin-top: 1rem;">
            @csrf
            @method('PUT')
            @include('admin.users._form', ['user' => $user])
            <br>
            <button type="submit">Update</button>
            <a href="{{ route('users.index') }}">Cancel</a>
        </form>
    </div>

</body>
</html>
