<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        /* Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: rgb(141, 179, 140);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background-color: #345635;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
            width: 350px;
            text-align: center;
        }
        .login-container h2 {
            color: white;
            margin-bottom: 25px;
        }
        .login-container input,
        .login-container select {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 2px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 16px;
        }
        .login-container button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 12px;
            width: 100%;
            border-radius: 8px;
            cursor: pointer;
            font-size: 18px;
        }
        .login-container button:hover {
            background-color: #45a049;
        }
        #registerButton {
            background-color: rgb(52, 168, 139);
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login to Library</h2>

        <!-- Display Validation Errors -->
        @if($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Login Form -->
        <form id="loginForm" method="POST" action="{{ route('login.post') }}">
            @csrf
            <input type="email" name="email" id="email" placeholder="Email" required>
            <input type="password" name="password" id="password" placeholder="Password" required>

            <!-- Status Dropdown -->
            <select name="status" id="status" required>
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>

            <button type="submit">Login</button>
            <button id="registerButton" type="button" onclick="window.location.href = '{{ route('register') }}'">Register</button>
        </form>
    </div>
</body>
</html>
