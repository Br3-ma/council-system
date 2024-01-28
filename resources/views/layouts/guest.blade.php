<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Council') }}</title>
        
        <!-- Include Tailwind CSS from CDN -->
        {{-- <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> --}}

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
        @livewireStyles

        <style>
            body {
                font-family: 'Arial', sans-serif;
                display: flex;
                justify-content: center;
                align-items: center;
                background-color: #f4f4f4;
            }

            .form-container {
                background-color: #ffffff;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                width: 300px;
                text-align: center;
            }

        /* Style input and button like Tailwind CSS */
        .content input[type="text"], .content button {
            padding: 2px 8px;
            margin: 3px 0;
            width: 100%;
            box-sizing: border-box;
            border: 1px solid #cbd5e0;
            border-radius: 4px;
            outline: none;
            transition: border-color 0.3s ease;
        }

        .content input[type="text"]:focus {
            border-color: #3498db;
        }

        .content button {
            background-color: #3498db;
            color: #353535;
            cursor: pointer;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            padding: 8px 12px;
            transition: background-color 0.3s ease;
        }

        .content button:hover {
            background-color: #2980b9;
        }      /* Add a semi-transparent overlay */
            .overlay {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.372); /* Adjust the last value for the level of opacity */
            }

            .content {
                z-index: 9999; /* Ensure content is above the overlay */
                position: relative;
                color: #1e1e1e; /* Set text color to contrast with the background */
            }
        </style>
        
    </head>
    <body style="background: url('https://www.vayeni.com/wp-content/uploads/2020/04/lusakazambia.jpg') no-repeat center center fixed;
    background-size: cover;">
        <div class="overlay"></div>
        <div class="content font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>

        @livewireScripts
    </body>
</html>
