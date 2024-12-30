<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Return Books</title>
    <style>
        /* Your existing styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding-top: 0px;
        }
        .navbar {
            background-color: #333;
            color: white;
            position: sticky;
            top: 0;
            width: 100%;
            z-index: 1000;
            padding: 15px;
        }
        .navbar a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            font-size: 18px;
        }
        .navbar a:hover {
            text-decoration: underline;
        }
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }
        select, button {
            padding: 10px;
            margin: 10px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <a href="{{ url('/home') }}">Home</a>
        <a href="{{ url('/borrow') }}">Borrow</a>
        <a href="{{ url('/history') }}">History</a>
        <a href="{{ url('/return') }}">Return</a>
    </nav>

    <!-- Return Form -->
    <div class="container">

        <form action="{{ route('return.store') }}" method="POST">
            @csrf

            <label for="book1">Select Book 1</label>
            <select name="book1" id="book1">
                <option value="">Select a Book</option>
                @foreach($borrowedBooks as $borrowed)
                    <option value="{{ $borrowed->book1 }}">{{ $borrowed->book1 }}</option>
                @endforeach
            </select><br>

            <label for="book2">Select Book 2</label>
            <select name="book2" id="book2">
                <option value="">Select a Book</option>
                @foreach($borrowedBooks as $borrowed)
                    <option value="{{ $borrowed->book2 }}">{{ $borrowed->book2 }}</option>
                @endforeach
            </select><br>

            <label for="book3">Select Book 3</label>
            <select name="book3" id="book3">
                <option value="">Select a Book</option>
                @foreach($borrowedBooks as $borrowed)
                    <option value="{{ $borrowed->book3 }}">{{ $borrowed->book3 }}</option>
                @endforeach
            </select><br>

            <button type="submit">Return Books</button>
        </form>
    </div>
</body>
</html>
