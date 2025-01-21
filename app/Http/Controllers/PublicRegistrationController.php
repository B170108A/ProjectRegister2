<?php

namespace App\Http\Controllers;

use App\Models\PublicRegistration;
use Illuminate\Http\Request;

class PublicRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $registrations = PublicRegistration::all();
        return view('public-registrations.index', compact('registrations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('public-registrations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:public_registrations',
            'phone' => 'required|string|max:15',
        ]);

        // Generate the lucky draw number
        $latestRegistration = PublicRegistration::latest()->first();
        $newNumber = $latestRegistration ? intval($latestRegistration->lucky_draw_number) + 1 : 1;
        $formattedNumber = str_pad($newNumber, 4, '0', STR_PAD_LEFT);

        // Create the registration
        PublicRegistration::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'lucky_draw_number' => $formattedNumber,
        ]);

        return redirect()->route('home')->with('success', 'Registration successful! Your lucky draw number is ' . $formattedNumber);
    }

    /**
     * Display the specified resource.
     */
    public function show(PublicRegistration $publicRegistration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PublicRegistration $publicRegistration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PublicRegistration $publicRegistration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PublicRegistration $publicRegistration)
    {
        //
    }
}
