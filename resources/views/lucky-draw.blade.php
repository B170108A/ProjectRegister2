@extends('layouts.app')

@section('title', 'Lucky Draw')

@section('content')
    <div style="
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100%;
        width: 100%;
    ">
        <!-- Header -->
        <h1 style="
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        ">Lucky Draw</h1>

        <!-- Rectangle Roller Container -->
        <div style="
            position: relative;
            width: 90%;
            max-width: 400px;
            height: 200px;
            overflow: hidden;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            display: flex;
            justify-content: center;
            align-items: center;
        ">
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

        <!-- Winner Display -->
        <div id="winner" style="
            margin-top: 20px;
            font-size: 2rem;
            font-weight: bold;
            text-align: center;
            color: #ffdd57;
            display: none;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        "></div>

        <!-- Start Button -->
        <div style="margin-top: 30px;">
            <button id="start-button" style="
                padding: 15px 30px;
                font-size: 1.5rem;
                font-weight: bold;
                background: #ff5722;
                color: white;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
                transition: all 0.3s ease;
                width: 90%;
                max-width: 300px;
            ">Start Lucky Draw</button>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const names = @json($names);
            const nameList = document.getElementById('name-list');
            const winnerDisplay = document.getElementById('winner');
            const button = document.getElementById('start-button');

            let spinning = false;

            button.addEventListener('click', () => {
                if (spinning) return; // Prevent multiple clicks
                spinning = true;

                // Reset
                winnerDisplay.style.display = 'none';
                nameList.style.animation = 'spin 1s linear infinite'; // Continuous animation

                // Calculate animation
                const rollDuration = 3000; // Duration of the rolling process
                const stopIndex = Math.floor(Math.random() * names.length);
                const stopPosition = -stopIndex * 60; // Adjust 60px per name

                setTimeout(() => {
                    // Stop animation
                    nameList.style.animation = 'none';
                    nameList.style.transform = `translateY(${stopPosition}px)`;
                    winnerDisplay.textContent = `🎉 Congratulations, ${names[stopIndex]}! 🎉`;
                    winnerDisplay.style.display = 'block';
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

        button:hover {
            background: #e64a19;
            transform: translateY(-2px);
        }

        button:active {
            transform: translateY(0);
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            h1 {
                font-size: 2rem;
            }
            button {
                font-size: 1.2rem;
            }
            #winner {
                font-size: 1.8rem;
            }
        }

        @media (max-width: 480px) {
            h1 {
                font-size: 1.5rem;
            }
            button {
                font-size: 1rem;
                padding: 10px 20px;
            }
            #winner {
                font-size: 1.5rem;
            }
        }
    </style>
@endsection
