@extends('layouts.app')

@section('title', 'Public Registration')
@section('header', 'Register for the Event')

@section('content')
    @if (session('success'))
        <div style="background: #d4edda; color: #155724; padding: 10px; border: 1px solid #c3e6cb; border-radius: 5px; margin-bottom: 20px;">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('public-registrations.store') }}" method="POST">
        @csrf
        <div style="margin-bottom: 15px;">
            <label for="name" style="font-weight: bold;">Name</label>
            <input type="text" id="name" name="name" required placeholder="Your full name"
                   style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="email" style="font-weight: bold;">Email</label>
            <input type="email" id="email" name="email" required placeholder="Your email address"
                   style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="phone" style="font-weight: bold;">Phone</label>
            <input type="text" id="phone" name="phone" required placeholder="Your phone number"
                   style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
        </div>
        <button type="submit" class="btn-primary">Register Now</button>
    </form>
@endsection
