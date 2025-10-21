<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register/Login</title>
</head>
<link href="./../css/style.css" rel="stylesheet" type="text/css">
<body>


    @auth
        <h1>Welcome back, {{ auth()->user()->name }}!</h1>
        <form action="/logout" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>
    @else
        <div style="display:flex; justify-content:center; align-items:center; gap:40px; height:100vh;">
            <div id="registerForm" style="padding:40px; width:500px; text-align:center; border:2px solid #333; border-radius:10px; box-shadow:0 4px 6px rgba(0,0,0,0.1);">
                <h2 style="font-size:32px; margin-bottom:30px;">Register</h2>
                <form action="/register" method="POST">
                    @csrf
                    <input type="text" name="name" placeholder="Name" required style="width:100%; padding:15px; font-size:18px; margin-bottom:20px; border:1px solid #ccc; border-radius:5px;"><br>
                    <input type="email" name="email" placeholder="Email" required style="width:100%; padding:15px; font-size:18px; margin-bottom:20px; border:1px solid #ccc; border-radius:5px;"><br>
                    <input type="password" name="password" placeholder="Password" required style="width:100%; padding:15px; font-size:18px; margin-bottom:20px; border:1px solid #ccc; border-radius:5px;"><br>
                    <button type="submit" style="width:100%; padding:15px; font-size:20px; background:#007bff; color:white; border:none; border-radius:5px; cursor:pointer; font-weight:bold;">Register</button>
                </form>
                <br>
                <button onclick="showLogin()" style="background:none; border:none; color:blue; text-decoration:underline; cursor:pointer; font-size:16px; margin-top:10px;">
                    Already have an account? Login
                </button>
            </div>

            <div id="loginForm" style="display:none; padding:40px; width:500px; text-align:center; border:2px solid #333; border-radius:10px; box-shadow:0 4px 6px rgba(0,0,0,0.1);">
                <h2 style="font-size:32px; margin-bottom:30px;">Login</h2>
                <form action="/login" method="POST">
                    @csrf
                    <input type="email" name="loginemail" placeholder="Email" required style="width:100%; padding:15px; font-size:18px; margin-bottom:20px; border:1px solid #ccc; border-radius:5px;"><br>
                    <input type="password" name="loginpassword" placeholder="Password" required style="width:100%; padding:15px; font-size:18px; margin-bottom:20px; border:1px solid #ccc; border-radius:5px;"><br>
                    <button type="submit" style="width:100%; padding:15px; font-size:20px; background:#28a745; color:white; border:none; border-radius:5px; cursor:pointer; font-weight:bold;">Log in</button>
                </form>
                <br>
                <button onclick="showRegister()" style="background:none; border:none; color:blue; text-decoration:underline; cursor:pointer; font-size:16px; margin-top:10px;">
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