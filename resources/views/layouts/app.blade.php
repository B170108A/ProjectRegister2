<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Application')</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            color: #333;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        header {
            text-align: center;
            padding: 20px;
            background: white;
            width: 100%;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        header h1 {
            font-size: 2rem;
            color: #007bff;
        }

        main {
            flex: 1;
            width: 100%;
            max-width: 1200px;
            padding: 20px;
            box-sizing: border-box;
        }

        footer {
            text-align: center;
            padding: 10px 20px;
            background: white;
            width: 100%;
            font-size: 0.9rem;
            color: #777;
            box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1);
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            header h1 {
                font-size: 1.5rem;
            }

            main {
                padding: 15px;
            }

            footer {
                font-size: 0.8rem;
            }
        }

        @media (max-width: 480px) {
            header h1 {
                font-size: 1.2rem;
            }

            main {
                padding: 10px;
            }

            footer {
                font-size: 0.7rem;
            }
        }
    </style>
    @yield('styles')
</head>
<body>
    <header>
        <h1>@yield('header', 'Welcome to My App')</h1>
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        &copy; {{ date('Y') }} My Application. All rights reserved.
    </footer>
</body>
</html>
