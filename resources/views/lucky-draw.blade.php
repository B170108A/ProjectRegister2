<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lucky Draw</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom right, #f3f4f6, #dfe4ea);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        h1 {
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 20px;
        }

        #spinner {
            width: 300px;
            height: 300px;
            border-radius: 50%;
            border: 8px solid #ddd;
            border-top: 8px solid #007bff;
            animation: spin 0.1s linear infinite;
            margin: 20px auto;
            display: none;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }

        .winner {
            margin-top: 30px;
            font-size: 1.5rem;
            font-weight: bold;
            color: #007bff;
        }

        button {
            padding: 10px 20px;
            margin-top: 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
        }

        button:hover {
            background-color: #0056b3;
        }

        /* Hidden names container */
        .hidden {
            display: none;
        }
    </style>
</head>
<body>
    <h1>Lucky Draw</h1>
    <div id="spinner"></div>
    <button id="start-button">Start Lucky Draw</button>
    <div class="winner" id="winner"></div>

    <!-- Hidden Names List -->
    <div id="names-container" class="hidden">
        <!-- Names will be dynamically injected here -->
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Names array passed dynamically from the backend
            const names = @json($names);

            // DOM Elements
            const spinner = document.getElementById('spinner');
            const winnerDisplay = document.getElementById('winner');
            const startButton = document.getElementById('start-button');

            // Start Lucky Draw
            startButton.addEventListener('click', () => {
                if (names.length === 0) {
                    winnerDisplay.textContent = 'No participants found!';
                    return;
                }

                // Show spinner and hide other elements during the draw
                spinner.style.display = 'block';
                winnerDisplay.textContent = '';

                // Simulate 3 seconds of spinning and pick a random winner
                setTimeout(() => {
                    spinner.style.display = 'none';

                    const winner = names[Math.floor(Math.random() * names.length)];
                    winnerDisplay.textContent = `🎉 Congratulations, ${winner}! 🎉`;
                }, 3000);
            });
        });
    </script>
</body>
</html>
