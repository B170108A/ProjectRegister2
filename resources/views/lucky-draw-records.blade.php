@extends('layouts.app')

@section('title', 'Lucky Draw Records')

@section('header', 'Lucky Draw Records')

@section('content')
    <h3>Lucky Draw Winners</h3>
    <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
        <thead>
            <tr>
                <th style="border: 1px solid #ddd; padding: 8px;">Name</th>
                <th style="border: 1px solid #ddd; padding: 8px;">Draw Time</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($records as $record)
                <tr>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $record->name }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $record->draw_time }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
