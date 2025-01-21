@extends('layouts.app')

@section('title', 'Registered Attendees')
@section('header', 'Attendee List')

@section('content')
    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr style="background: #007bff; color: white;">
                <th style="padding: 10px; text-align: left;">#</th>
                <th style="padding: 10px; text-align: left;">Name</th>
                <th style="padding: 10px; text-align: left;">Email</th>
                <th style="padding: 10px; text-align: left;">Phone</th>
                <th style="padding: 10px; text-align: left;">Lucky Draw Number</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($registrations as $index => $registration)
                <tr style="border-bottom: 1px solid #ddd;">
                    <td style="padding: 10px;">{{ $index + 1 }}</td>
                    <td style="padding: 10px;">{{ $registration->name }}</td>
                    <td style="padding: 10px;">{{ $registration->email }}</td>
                    <td style="padding: 10px;">{{ $registration->phone }}</td>
                    <td style="padding: 10px;">{{ $registration->lucky_draw_number }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('public-registrations.export') }}" class="btn-primary">Export to CSV</a>
@endsection
