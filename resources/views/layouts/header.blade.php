<!-- resources/views/layouts/header.blade.php -->
<header class="main-header">
    <div class="container flex justify-between items-center py-4">
        <a href="/" class="logo font-bold text-2xl text-blue-700">MyLibrary</a>
        <nav class="nav-links flex gap-6">
            <a href="/" class="hover:text-blue-500">Home</a>
            <a href="/admin/books" class="hover:text-blue-500">Books</a>
            <a href="/admin/publishers" class="hover:text-blue-500">Publishers</a>
            <a href="/profile" class="hover:text-blue-500">Profile</a>
        </nav>
        <div class="user-actions flex gap-4">
            @auth
                <form action="/logout" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn-logout px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Logout</button>
                </form>
            @endauth
        </div>
    </div>
</header>
