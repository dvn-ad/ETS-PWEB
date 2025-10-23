<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User - Admin</title>
    <link href="/css/app.css" rel="stylesheet" type="text/css">
</head>
<body>

    @include('layouts.header')

    <div style="max-width: 1200px; margin: 0 auto; padding: 2rem;">
        <h1 style="color: #1e40af; margin-bottom: 2rem;">Create User</h1>

        <p style="margin-bottom: 1.5rem;">
            <a href="{{ route('users.index') }}" style="color: #2563eb;">Back to Users</a>
        </p>

        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            @include('admin.users._form')
            <br>
            <button type="submit">Save</button>
            <a href="{{ route('users.index') }}">Cancel</a>
        </form>
    </div>

</body>
</html>
