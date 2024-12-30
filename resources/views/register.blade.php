<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
        .register-container {
            background-color: #345635;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
            width: 350px;
            text-align: center;
        }
        .register-container h2 {
            color: white;
            margin-bottom: 25px;
        }
        .register-container input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 2px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 16px;
        }
        .register-container button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 12px;
            width: 100%;
            border-radius: 8px;
            cursor: pointer;
            font-size: 18px;
        }
        .register-container button:hover {
            background-color: #45a049;
        }
        #backToLoginButton {
            background-color: rgb(52, 168, 139);
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h2>Register</h2>

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

        <!-- Register Form -->
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <!-- Email Field -->
            <input type="email" name="email" id="email" placeholder="Email" required>

            <!-- Password Field -->
            <input type="password" name="password" id="password" placeholder="Password" required>

            <!-- Register Button -->
            <button type="submit">Register</button>
        </form>

        <!-- Back to Login Button -->
        <button id="backToLoginButton" type="button" onclick="window.location.href = '{{ route('login') }}'">Back to Login</button>
    </div>
</body>
</html>
