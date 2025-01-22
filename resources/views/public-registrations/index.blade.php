@extends('layouts.app')

@section('title', 'Public Registrations')

@section('header', 'Public Registrations')

@section('content')
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
    <div style="margin-top: 20px; display: flex; justify-content: center; align-items: center; gap: 10px;">
        <!-- Display the pagination links -->
        @if ($registrations->lastPage() > 1)
            @for ($i = 1; $i <= $registrations->lastPage(); $i++)
                <a href="{{ $registrations->url($i) }}" style="
                    padding: 8px 12px;
                    text-decoration: none;
                    color: {{ $registrations->currentPage() == $i ? 'white' : '#007bff' }};
                    background-color: {{ $registrations->currentPage() == $i ? '#007bff' : 'transparent' }};
                    border: 1px solid #007bff;
                    border-radius: 5px;
                ">
                    {{ $i }}
                </a>
            @endfor
        @endif
    </div>
@endsection
