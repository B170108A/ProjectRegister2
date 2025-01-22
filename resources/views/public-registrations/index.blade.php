@extends('layouts.app')

@section('title', 'Public Registrations')

@section('header', 'Public Registrations')

@section('content')
    <!-- Import and Export CSV Buttons -->
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <!-- Import CSV Form -->
        <form action="{{ route('public-registrations.import') }}" method="POST" enctype="multipart/form-data" style="display: flex; align-items: center;">
            @csrf
            <input type="file" name="csv_file" accept=".csv" required style="margin-right: 10px; padding: 5px;">
            <button type="submit" style="
                padding: 10px 20px;
                background-color: #007bff;
                color: white;
                border: none;
                border-radius: 5px;
                font-size: 1rem;
                cursor: pointer;
            ">Upload CSV</button>
        </form>

        <!-- Export CSV Button -->
        <form action="{{ route('public-registrations.export') }}" method="GET">
            <button type="submit" style="
                padding: 10px 20px;
                background-color: #28a745;
                color: white;
                border: none;
                border-radius: 5px;
                font-size: 1rem;
                cursor: pointer;
            ">Download CSV</button>
        </form>
    </div>

    <!-- Table of Public Registrations -->
    <h3>Registered Participants</h3>
    <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
        <thead>
            <tr>
                <th style="border: 1px solid #ddd; padding: 8px;">Name</th>
                <th style="border: 1px solid #ddd; padding: 8px;">Email</th>
                <th style="border: 1px solid #ddd; padding: 8px;">Phone</th>
                <th style="border: 1px solid #ddd; padding: 8px;">Lucky Draw Number</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($registrations as $registration)
                <tr>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $registration->name }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $registration->email }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $registration->phone }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $registration->lucky_draw_number }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination Links -->
<div style="margin-top: 20px; display: flex; justify-content: center;">
    <style>
        .pagination {
            display: flex;
            list-style: none;
            padding: 0;
            gap: 5px;
        }

        .pagination li {
            margin: 0;
        }

        .pagination li a,
        .pagination li span {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            width: 40px;
            height: 40px;
            text-decoration: none;
            border: 1px solid #007bff;
            border-radius: 5px;
            color: #007bff;
            font-size: 1rem;
            transition: background-color 0.3s, color 0.3s;
        }

        .pagination li a:hover {
            background-color: #007bff;
            color: white;
        }

        .pagination .active span {
            background-color: #007bff;
            color: white;
            border: 1px solid #007bff;
            cursor: default;
        }

        .pagination li.disabled span {
            background-color: #f0f0f0;
            color: #bbb;
            border: 1px solid #ddd;
            cursor: not-allowed;
        }
    </style>

    {{ $registrations->onEachSide(1)->links() }}
</div>

@endsection
