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
                <th style="border: 1px solid #ddd; padding: 8px;">Lucky Draw Number</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($registrations as $registration)
                <tr>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $registration->name }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $registration->email }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $registration->lucky_draw_number }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
