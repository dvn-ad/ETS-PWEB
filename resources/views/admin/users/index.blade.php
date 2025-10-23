
<head>
    <title>Manage Users - Admin</title>
    <link href="/css/app.css" rel="stylesheet" type="text/css">
</head>
<body>

    @include('layouts.header')

    <div style="max-width: 1200px; margin: 0 auto; padding: 2rem;">
        <h1 style="color: #1e40af; margin-bottom: 2rem;">Manage Users</h1>

        <p style="margin-bottom: 1.5rem;">
            <a href="{{ route('users.create') }}" style="display: inline-block; background: #10b981; color: white; padding: 0.75rem 1.5rem; border-radius: 4px; text-decoration: none; font-weight: 500;">Add User</a>
        </p>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if($user->is_admin)
                                <span style="background: #3b82f6; color: white; padding: 0.25rem 0.5rem; border-radius: 4px; font-size: 0.875rem; font-weight: 500;">Admin</span>
                            @else
                                <span style="background: #64748b; color: white; padding: 0.25rem 0.5rem; border-radius: 4px; font-size: 0.875rem; font-weight: 500;">User</span>
                            @endif
                        </td>
                        <td>{{ $user->created_at->format('d-m-Y') }}</td>
                        <td>
                            <form action="{{ route('users.edit', $user) }}" method="GET" style="display:inline;">
                                <button type="submit" style="padding:8px 16px; background:#007bff; color:white; border:none; border-radius:4px; cursor:pointer;">
                                    Edit
                                </button>
                            </form>

                            @if($user->id !== auth()->id())
                                <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline" onsubmit="return confirm('Delete this user?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="padding:8px 16px; background:#ff0000; color:white; border:none; border-radius:4px; cursor:pointer;">Delete</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6">No users yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

</body>
</html>
