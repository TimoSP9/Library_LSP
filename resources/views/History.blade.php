<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History of Borrowed Books</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0px;
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
            max-width: 1000px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #333;
            color: white;
        }

        tr.late {
            background-color: #f44336;
            color: white;
        }

        td {
            color: #333;
        }

        .status {
            font-weight: bold;
        }

        .status.yellow {
            color: yellow;
        }

        .status.green {
            color: green;
        }

        .status.red {
            color: red;
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

    <!-- History Content -->
    <div class="container">
        <h1>History of Borrowed Books</h1>

        <!-- Borrowed Books Table -->
        <table>
            <thead>
                <tr>
                    <th>Borrower</th>
                    <th>Book 1</th>
                    <th>Book 2</th>
                    <th>Book 3</th>
                    <th>Borrow Date</th>
                    <th>Return Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($borrows as $borrow)
                    <tr>
                        <td>{{ $borrow->name }}</td>
                        <td>{{ $borrow->book1 }}</td>
                        <td>{{ $borrow->book2 }}</td>
                        <td>{{ $borrow->book3 }}</td>
                        <td>{{ \Carbon\Carbon::parse($borrow->created_at)->format('d M Y') }}</td>
                        <td>{{ $borrow->return ? \Carbon\Carbon::parse($borrow->updated_at)->format('d M Y') : 'Not Returned' }}</td>
                        <td class="status {{ $borrow->status_color }}">
                            {{ $borrow->status }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
