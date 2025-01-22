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
    // Import CSV
    public function importCSV(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt',
        ]);

        $file = $request->file('csv_file');
        $data = array_map('str_getcsv', file($file->getRealPath()));

        $header = $data[0]; // Assuming the first row is a header
        unset($data[0]); // Remove the header row

        foreach ($data as $row) {
            PublicRegistration::create([
                'name' => $row[0],
                'email' => $row[1],
                'lucky_draw_number' => $this->generateLuckyDrawNumber(),
            ]);
        }

        return redirect()->route('public-registrations.index')->with('success', 'CSV data imported successfully.');
    }
    // Export attendees as CSV
    public function export()
    {
        $fileName = 'registered_attendees.csv';

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$fileName\"",
        ];

        $callback = function () {
            $file = fopen('php://output', 'w');

            // Add CSV headers
            fputcsv($file, ['#', 'Name', 'Email', 'Phone', 'Lucky Draw Number']);

            // Add attendee data
            $registrations = PublicRegistration::all();
            foreach ($registrations as $index => $registration) {
                fputcsv($file, [
                    $index + 1,                         // Row number
                    $registration->name,               // Name
                    $registration->email,              // Email
                    $registration->phone,              // Phone
                    $registration->lucky_draw_number,  // Lucky Draw Number
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    // Generate unique lucky draw number
    private function generateLuckyDrawNumber()
    {
        $lastNumber = PublicRegistration::max('id');
        return str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
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
