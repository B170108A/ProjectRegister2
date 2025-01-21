<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Application')</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom right, #f3f4f6, #dfe4ea);
            color: #333;
            height: 100%;
        }

        .container {
            max-width: 900px;
            margin: 50px auto;
            padding: 30px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        header {
            text-align: center;
            margin-bottom: 30px;
        }

        header h1 {
            font-size: 2.5rem;
            color: #007bff;
        }

        footer {
            text-align: center;
            margin-top: 20px;
            color: #888;
        }

        .btn-primary {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            font-size: 1rem;
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: 0.3s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(to right, #2575fc, #6a11cb);
        }
    </style>
    @yield('styles')
</head>
<body>
    <div class="container">
        <header>
            <h1>@yield('header')</h1>
        </header>

        @yield('content')

        <footer>
            &copy; {{ date('Y') }} My Application. All Rights Reserved.
        </footer>
    </div>
</body>
</html>
