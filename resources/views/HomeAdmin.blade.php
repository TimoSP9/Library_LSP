<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Catalog</title>
    <style>
        /* Reset some default styles */
        body, h1, h2, p, button {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding-top: 0px;
        }

        /* Sticky navigation bar */
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

        /* Container for book cards */
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 20px;
        }

        /* Book card styling */
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

        .borrow-btn {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
            width: 100%;
        }

        .borrow-btn:hover {
            background-color: #45a049;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .book-card {
                width: 45%; /* Adjust width for tablets */
            }
        }

        @media (max-width: 500px) {
            .book-card {
                width: 90%; /* Full width for mobile devices */
            }
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

    <!-- Book Catalog -->
    <div class="container">
        @forelse($books as $book)
            <div class="book-card">
                <img src="https://via.placeholder.com/200x300?text=Book+Cover" alt="Book Cover">
                <h2 class="book-title">{{ $book->title }}</h2>
                <p class="book-author">by {{ $book->writer }}</p>
                <p class="book-genre">Genre: {{ $book->genre }}</p>
                <p class="book-year">Year: {{ $book->year }}</p>
                <button class="borrow-btn">Borrow</button>
            </div>
        @empty
            <p>No books available at the moment.</p>
        @endforelse
    </div>
</body>
</html>
