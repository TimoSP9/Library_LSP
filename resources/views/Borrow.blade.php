<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Catalog</title>
    <style>
        /* Add your styles here */
        body, h1, h2, p, button {
            margin: 0;
            padding: 0;
        }

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
            flex-wrap: wrap;
            justify-content: center;
            padding: 20px;
        }

        .book-card {
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            width: 200px;
            margin: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            padding: 20px;
            transition: transform 0.3s ease-in-out;
        }

        .book-card:hover {
            transform: scale(1.05);
        }

        .book-card img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            border-radius: 8px;
        }

        .book-title {
            font-size: 18px;
            font-weight: bold;
            margin-top: 10px;
        }

        .book-author {
            color: #555;
            margin-top: 5px;
        }

        @media (max-width: 768px) {
            .book-card {
                width: 45%;
            }
        }

        @media (max-width: 500px) {
            .book-card {
                width: 90%;
            }
        }

        .form-container {
            margin-top: 20px;
            text-align: center;
        }

        .form-container input,
        .form-container select {
            width: 80%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .form-container button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }

        .form-container button:hover {
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

    <!-- Display Flash Messages -->
    @if(session('success'))
        <div style="color: green; text-align: center;">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div style="color: red; text-align: center;">
            {{ session('error') }}
        </div>
    @endif

    <!-- Book Catalog -->
    <div class="container">
        @foreach($books as $book)
            <div class="book-card">
                <img src="https://via.placeholder.com/200x300?text=Book+Cover" alt="Book Cover">
                <h2 class="book-title">{{ $book->title }}</h2>
                <p class="book-author">by {{ $book->writer }}</p>
            </div>
        @endforeach
    </div>

    <!-- Borrow Form -->
    <div class="form-container">
        <form action="{{ route('borrow.store') }}" method="POST">
            @csrf

            <!-- Name Input -->
            <label for="name">Your Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required>
            @error('name')
                <div style="color: red;">{{ $message }}</div>
            @enderror

            <!-- Book Selection -->
            <label for="book1">Select Book 1</label>
            <select name="book1" id="book1" required>
                <option value="">Select a Book</option>
                @foreach($books as $book)
                    <option value="{{ $book->title }}" {{ old('book1') == $book->title ? 'selected' : '' }}>{{ $book->title }}</option>
                @endforeach
            </select><br>
            @error('book1')
                <div style="color: red;">{{ $message }}</div>
            @enderror

            <label for="book2">Select Book 2</label>
            <select name="book2" id="book2">
                <option value="">Select a Book</option>
                @foreach($books as $book)
                    <option value="{{ $book->title }}" {{ old('book2') == $book->title ? 'selected' : '' }}>{{ $book->title }}</option>
                @endforeach
            </select><br>
            @error('book2')
                <div style="color: red;">{{ $message }}</div>
            @enderror

            <label for="book3">Select Book 3</label>
            <select name="book3" id="book3">
                <option value="">Select a Book</option>
                @foreach($books as $book)
                    <option value="{{ $book->title }}" {{ old('book3') == $book->title ? 'selected' : '' }}>{{ $book->title }}</option>
                @endforeach
            </select><br>
            @error('book3')
                <div style="color: red;">{{ $message }}</div>
            @enderror

            <button type="submit">Borrow Books</button>
        </form>
    </div>

</body>
</html>
