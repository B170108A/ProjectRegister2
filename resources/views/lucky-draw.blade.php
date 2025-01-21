@extends('layouts.app')

@section('title', 'Lucky Draw')

@section('header', 'Lucky Draw')

@section('content')
    <!-- Winner Announcement Outside -->
    <div style="position: relative; max-width: 600px; margin: 0 auto;">
        <!-- Winner Left -->
        <div id="winner-left" style="
            font-size: 1.5rem;
            font-weight: bold;
            color: #ffdd57;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
            display: none;
            position: absolute;
            left: -150px; /* Position to the left of the rectangle */
            top: 50%;
            transform: translateY(-50%);
        "></div>

        <!-- Rectangle Roller -->
        <div style="
            position: relative;
            width: 100%;
            max-width: 400px;
            height: 200px;
            overflow: hidden;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            margin: 0 auto;
        ">
            <!-- Spinning Names -->
            <ul id="name-list" style="
                position: absolute;
                top: 0;
                width: 100%;
                list-style: none;
                padding: 0;
                margin: 0;
                text-align: center;
                animation: none;
            ">
                @foreach ($names as $name)
                    <li style="
                        font-size: 1.5rem;
                        font-weight: bold;
                        color: #007bff;
                        margin: 30px 0;
                    ">
                        {{ $name }}
                    </li>
                @endforeach
            </ul>
        </div>

        <!-- Winner Right -->
        <div id="winner-right" style="
            font-size: 1.5rem;
            font-weight: bold;
            color: #ffdd57;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
            display: none;
            position: absolute;
            right: -150px; /* Position to the right of the rectangle */
            top: 50%;
            transform: translateY(-50%);
        "></div>
    </div>

    <!-- Start Button Container -->
    <div style="
        display: flex;
        justify-content: center;
        margin-top: 30px;
    ">
        <a href="#" class="btn-primary" id="start-button">Start Lucky Draw</a>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const names = @json($names);
            const nameList = document.getElementById('name-list');
            const winnerLeft = document.getElementById('winner-left');
            const winnerRight = document.getElementById('winner-right');
            const button = document.getElementById('start-button');

            let spinning = false;

            button.addEventListener('click', () => {
                if (spinning) return; // Prevent multiple clicks
                spinning = true;

                // Reset
                winnerLeft.style.display = 'none';
                winnerRight.style.display = 'none';
                nameList.style.animation = 'spin 1s linear infinite'; // Continuous animation

                const rollDuration = 3000; // Duration of the rolling process
                const stopIndex = Math.floor(Math.random() * names.length);
                const stopPosition = -stopIndex * 60; // Adjust based on margin

                setTimeout(() => {
                    nameList.style.animation = 'none'; // Stop animation
                    nameList.style.transform = `translateY(${stopPosition}px)`; // Fix final position
                    const winner = names[stopIndex];

                    // Display winner on both sides
                    winnerLeft.textContent = `🎉 ${winner}`;
                    winnerRight.textContent = `${winner} 🎉`;
                    winnerLeft.style.display = 'block';
                    winnerRight.style.display = 'block';

                    spinning = false;
                }, rollDuration);
            });
        });
    </script>

    <style>
        @keyframes spin {
            0% {
                transform: translateY(0);
            }
            100% {
                transform: translateY(-300px);
            }
        }

        .btn-primary {
            display: inline-block;
            padding: 15px 30px;
            font-size: 1.5rem;
            font-weight: bold;
            background: #ff5722;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            cursor: pointer;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: #e64a19;
        }

        .btn-primary:active {
            transform: scale(0.98);
        }
    </style>
@endsection
