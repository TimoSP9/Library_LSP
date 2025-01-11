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

            <label for="name">Select Borrower</label>
            <select name="name" id="name" onchange="fetchBooks()">
                <option value="">Select a Borrower</option>
                @foreach($borrowers as $borrower)
                    <option value="{{ $borrower->name }}">{{ $borrower->name }}</option>
                @endforeach
            </select><br>

            <label for="book1">Select Book 1</label>
            <select name="book1" id="book1">
                <option value="">Select a Book</option>
            </select><br>

            <label for="book2">Select Book 2</label>
            <select name="book2" id="book2">
                <option value="">Select a Book</option>
            </select><br>

            <label for="book3">Select Book 3</label>
            <select name="book3" id="book3">
                <option value="">Select a Book</option>
            </select><br>

            <button type="submit">Return Books</button>
        </form>
    </div>

    <script>
    function fetchBooks() {
        var borrowerName = document.getElementById('name').value;
        console.log('Selected borrower:', borrowerName);
        // Clear previous book options
        document.getElementById('book1').innerHTML = "<option value=''>Select a Book</option>";
        document.getElementById('book2').innerHTML = "<option value=''>Select a Book</option>";
        document.getElementById('book3').innerHTML = "<option value=''>Select a Book</option>";

        // Fetch borrowed books based on borrower name
        if (borrowerName) {
            fetch(`/get-borrowed-books/${borrowerName}`)
                .then(response => response.json())
                .then(data => {
                    console.log('Borrowed books:', data); // Log data from API
                    
                    // Fill the dropdowns with the borrowed books
                    document.getElementById('book1').innerHTML += `<option value="${data[0].book1}" selected>${data[0].book1}</option>`;
                    document.getElementById('book2').innerHTML += `<option value="${data[0].book2}" selected>${data[0].book2}</option>`;
                    document.getElementById('book3').innerHTML += `<option value="${data[0].book3}" selected>${data[0].book3}</option>`;
                });
        }
    }
    </script>

</body>
</html>
