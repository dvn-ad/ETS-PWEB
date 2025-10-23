<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebPro Library</title>
    
    <link href="/css/app.css" rel="stylesheet" type="text/css">
</head>
<script>
    function showPassRegis() {
        var y = document.getElementById("regisPass");
        if (y.type === "password") {
            y.type = "text";
        } else {
            y.type = "password";
        }
    }
    function showPassLogin(){
        var x = document.getElementById("loginPass");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
<body>

    @include('layouts.header')

    @auth
        <div style="max-width: 1200px; margin: 0 auto; padding: 3rem 2rem;">
            <div style="text-align: center; margin-bottom: 3rem;">
                <img src="/favicon.ico" alt="WebPro Library Favicon" style="width:128px; height:128px;">
                <h1 style="font-size: 3rem; color: #1e40af; margin-bottom: 1rem;">Welcome to WebPro Library</h1>
                <p style="font-size: 1.25rem; color: #475569; line-height: 1.8;">
                    You can check out our collection of books, authors, and publishers using the links below.
                </p>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem; margin-top: 3rem;">
                <div style="background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                    <h3 style="color: #2563eb; font-size: 1.5rem; margin-bottom: 1rem;">📚 Browse Books</h3>
                    <p style="color: #64748b; margin-bottom: 1.5rem;">Check our books</p>
                    <a href="/books" style="display: inline-block; background: #2563eb; color: white; padding: 0.75rem 1.5rem; border-radius: 4px; text-decoration: none; font-weight: 500;">View Books</a>
                </div>

                <div style="background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                    <h3 style="color: #2563eb; font-size: 1.5rem; margin-bottom: 1rem;">✍️ Browse Authors</h3>
                    <p style="color: #64748b; margin-bottom: 1.5rem;">Check our authors</p>
                    <a href="/authors" style="display: inline-block; background: #2563eb; color: white; padding: 0.75rem 1.5rem; border-radius: 4px; text-decoration: none; font-weight: 500;">View Authors</a>
                </div>

                <div style="background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                    <h3 style="color: #2563eb; font-size: 1.5rem; margin-bottom: 1rem;">🏢 Browse Publishers</h3>
                    <p style="color: #64748b; margin-bottom: 1.5rem;">Check our publishers</p>
                    <a href="/publishers" style="display: inline-block; background: #2563eb; color: white; padding: 0.75rem 1.5rem; border-radius: 4px; text-decoration: none; font-weight: 500;">View Publishers</a>
                </div>
            </div>
        </div>

        <!-- Review Section -->
        <div style="max-width: 900px; margin: 3rem auto 0 auto; padding: 2rem; background: #f8fafc; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.05);">
            <h2 style="color: #1e40af; font-size: 2rem; margin-bottom: 1.5rem;">Website Reviews</h2>
            <a href="{{ route('review.create') }}" class="btn btn-primary" style="margin-bottom: 1.5rem;">Add Your Review</a>
            <table style="width:100%; border-collapse:collapse; background:white;">
                <thead>
                    <tr style="background:#e0e7ef;">
                        <th style="padding:10px; border:1px solid #d1d5db;">Name</th>
                        <th style="padding:10px; border:1px solid #d1d5db;">Comment</th>
                        <th style="padding:10px; border:1px solid #d1d5db;">Rating</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(App\Models\Review::latest()->take(5)->get() as $review)
                        <tr>
                            <td style="padding:10px; border:1px solid #d1d5db;">
                                {{ optional(App\Models\User::find($review->user_id))->name ?? 'Unknown' }}
                            </td>
                            <td style="padding:10px; border:1px solid #d1d5db;">{{ $review->content }}</td>
                            <td style="padding:10px; border:1px solid #d1d5db;">{{ $review->rating }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div style="display:flex; justify-content:center; align-items:center; gap:40px; height:100vh;">
            <div id="registerForm" style="padding:40px; width:500px; text-align:center; border:2px solid #333; border-radius:10px; box-shadow:0 4px 6px rgba(0,0,0,0.1);">
                <h2 style="font-size:32px; margin-bottom:30px;">Register</h2>
                <form action="/register" method="POST">
                    @csrf
                    <input type="text" name="name" placeholder="Name" required style="width:100%; padding:15px; font-size:18px; margin-bottom:20px; border:1px solid #ccc; border-radius:5px;"><br>
                    <input type="email" name="email" placeholder="Email" required style="width:100%; padding:15px; font-size:18px; margin-bottom:20px; border:1px solid #ccc; border-radius:5px;"><br>
                    <input id="regisPass" type="password" name="password" placeholder="Password" required style="width:100%; padding:15px; font-size:18px; margin-bottom:10px; border:1px solid #ccc; border-radius:5px;"><br>
                    <div style="display: flex; align-items: center; justify-content: flex-start; margin-bottom: 20px;">
                        <input type="checkbox" onclick="showPassRegis()" id="showPassRegisCheck" style="width: 20px; height: 20px; cursor: pointer; margin-right: 8px;">
                        <label for="showPassRegisCheck" style="font-size: 16px; cursor: pointer; user-select: none;">Show Password</label>
                    </div>
                    <button type="submit" style="width:100%; padding:15px; font-size:20px; background:#007bff; color:white; border:none; border-radius:5px; cursor:pointer; font-weight:bold;">Register</button>
                </form>
                <br>
                <button onclick="showLogin()" style="width:100%; padding:12px; font-size:16px; background:#6c757d; color:white; border:none; border-radius:5px; cursor:pointer; margin-top:10px;">
                    Already have an account? Login
                </button>
            </div>

            <div id="loginForm" style="display:none; padding:40px; width:500px; text-align:center; border:2px solid #333; border-radius:10px; box-shadow:0 4px 6px rgba(0,0,0,0.1);">
                <h2 style="font-size:32px; margin-bottom:30px;">Login</h2>
                <form action="/login" method="POST">
                    @csrf
                    <input type="email" name="loginemail" placeholder="Email" required style="width:100%; padding:15px; font-size:18px; margin-bottom:20px; border:1px solid #ccc; border-radius:5px;"><br>
                    <input id="loginPass" type="password" name="loginpassword" placeholder="Password" required style="width:100%; padding:15px; font-size:18px; margin-bottom:10px; border:1px solid #ccc; border-radius:5px;"><br>
                    <div style="display: flex; align-items: center; justify-content: flex-start; margin-bottom: 20px;">
                        <input type="checkbox" onclick="showPassLogin()" id="showPassLoginCheck" style="width: 20px; height: 20px; cursor: pointer; margin-right: 8px;">
                        <label for="showPassLoginCheck" style="font-size: 16px; cursor: pointer; user-select: none;">Show Password</label>
                    </div>
                    <button type="submit" style="width:100%; padding:15px; font-size:20px; background:#28a745; color:white; border:none; border-radius:5px; cursor:pointer; font-weight:bold;">Log in</button>
                </form>
                <br>
                <button onclick="showRegister()" style="width:100%; padding:12px; font-size:16px; background:#6c757d; color:white; border:none; border-radius:5px; cursor:pointer; margin-top:10px;">
                    Don't have an account? Register
                </button>
            </div>
        </div>

        <script>
            function showLogin() {
                document.getElementById('registerForm').style.display = 'none';
                document.getElementById('loginForm').style.display = 'block';
            }

            function showRegister() {
                document.getElementById('loginForm').style.display = 'none';
                document.getElementById('registerForm').style.display = 'block';
            }
        </script>
    @endauth

</body>
</html>
