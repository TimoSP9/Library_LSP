<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Catalog</title>
    <!-- Tambahkan link ke Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom styling */
        body, h1, h2, p, button {
            margin: 0;
            padding: 0;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .navbar {
            background-color: #333;
            color: white;
            position: sticky;
            top: 0;
            width: 100%;
            padding: 15px;
        }
        .navbar a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            font-size: 18px;
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
            text-align: center;
            padding: 20px;
        }
        .borrow-btn {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <a href="{{ url('/home') }}">Home</a>
        <a href="{{ url('/borrow') }}">Borrow</a>
        <a href="{{ route('history') }}">History</a>
        <a href="{{ url('/return') }}">Return</a>
    </nav>

    <!-- Tombol "Add Book" -->
    <div class="container mt-4">
        <button class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#addBookModal">Add Book</button>
    </div>

    <!-- Modal Pop-up untuk Add Book -->
    <div class="modal fade" id="addBookModal" tabindex="-1" aria-labelledby="addBookModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addBookModalLabel">Add New Book</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form untuk Add Book -->
                    <form action="{{ route('book.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Book Title</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="writer" class="form-label">Writer</label>
                            <input type="text" class="form-control" id="writer" name="writer" required>
                        </div>
                        <div class="mb-3">
                            <label for="genre" class="form-label">Genre</label>
                            <input type="text" class="form-control" id="genre" name="genre" required>
                        </div>
                        <div class="mb-3">
                            <label for="year" class="form-label">Year</label>
                            <input type="number" class="form-control" id="year" name="year" required min="1000" max="9999">
                        </div>
                        <button type="submit" class="btn btn-success">Add Book</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Book Catalog -->
    <div class="container">
        @forelse($books as $book)
            <div class="book-card">
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

    <!-- Tambahkan link ke Bootstrap JS dan Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
