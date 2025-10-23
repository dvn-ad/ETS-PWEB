<!-- resources/views/layouts/header.blade.php -->
<header class="main-header">
    <div class="container flex justify-between items-center py-4">
        <a href="/" class="logo font-bold text-2xl text-blue-700">WebPro Library</a>
        <nav class="nav-links flex gap-6">
            @auth
                <a href="/" class="hover:text-blue-500">Home</a>
                <a href="/books" class="hover:text-blue-500">Books</a>
                <a href="/authors" class="hover:text-blue-500">Authors</a>
                <a href="/publishers" class="hover:text-blue-500">Publishers</a>
                @if(auth()->user()->is_admin)
                    <div class="dropdown">
                        <button class="dropdown-btn">
                            Manage
                            <svg class="dropdown-arrow" width="12" height="12" fill="white">
                                <path d="M6 8L2 4h8z"/>
                            </svg>
                        </button>
                        <div class="dropdown-menu">
                            <a href="/admin/books" class="dropdown-item">Manage Books</a>
                            <a href="/admin/authors" class="dropdown-item">Manage Authors</a>
                            <a href="/admin/publishers" class="dropdown-item">Manage Publishers</a>
                            <a href="/admin/users" class="dropdown-item">Manage Users</a>
                        </div>
                    </div>
                @endif
            @endauth
        </nav>
        <div class="user-actions">
            @auth
                <form action="/logout" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn-logout">Logout</button>
                </form>
            @endauth
        </div>
    </div>
</header>

<script>
    //NEW NEW dropdown
    document.addEventListener('DOMContentLoaded', function() {
        const dropdown = document.querySelector('.dropdown');
        if (dropdown) {
            const dropdownBtn = dropdown.querySelector('.dropdown-btn');
            const dropdownMenu = dropdown.querySelector('.dropdown-menu');
            
            dropdownBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                dropdown.classList.toggle('active');
            });
            
            //
            document.addEventListener('click', function(e) {
                if (!dropdown.contains(e.target)) {
                    dropdown.classList.remove('active');
                }
            });
        }
    });
</script>
