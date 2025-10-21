<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register/Login</title>
</head>
<body>


    @auth
        <h1>Welcome back, {{ auth()->user()->name }}!</h1>
        <form action="/logout" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>
    @else
            <div style="border:3 px solid black; padding:10px; width:300px; text-align:center;">
            <h2>Register</h2>
            <form action="/register" method="POST">
                @csrf
                <input type="text" name="name" placeholder="Name" required><br><br>
                <input type="email" name="email" placeholder="Email" required><br><br>
                <input type="password" name="password" placeholder="Password" required><br><br>
                <button type="submit">Register</button>
            </form>
        </div>
        <div style="border:3 px solid black; padding:10px; width:300px; text-align:center;">
            <h2>Login</h2>
            <form action="/login" method="POST">
                @csrf
                <input type="email" name="loginemail" placeholder="Email" required><br><br>
                <input type="password" name="loginpassword" placeholder="Password" required><br><br>
                <button type="submit">Log in</button>
            </form>
        </div>
    @endauth

</body>
</html>