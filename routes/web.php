<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicRegistrationController;
use App\Models\PublicRegistration;
use App\Models\LuckyDrawRecord;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
Route::post('/lucky-draw', function () {
    // Fetch all participant names from PublicRegistration table
    $participants = PublicRegistration::pluck('name')->toArray();

    // Check if there are participants
    if (empty($participants)) {
        return response()->json([
            'error' => 'No participants found in the public registrations.',
        ], 404);
    }

    // Randomly select a winner from the participants
    $winner = $participants[array_rand($participants)];

    // Record the winner's name and draw time in lucky_draw_records table
    $record = LuckyDrawRecord::create([
        'name' => $winner,
        'draw_time' => now(),
    ]);

    // Return the winner as a response
    return response()->json([
        'winner' => $record->name,
        'time' => $record->draw_time,
    ]);
});

Route::get('/lucky-draw-records', function () {
    $records = LuckyDrawRecord::all();

    return view('lucky-draw-records', compact('records'));
});

// Route for CSV export , import
Route::get('/public-registrations/export', [PublicRegistrationController::class, 'export'])->name('public-registrations.export');
Route::post('/public-registrations/import', [PublicRegistrationController::class, 'importCSV'])->name('public-registrations.import');
Route::get('/public-registrations', [PublicRegistrationController::class, 'index'])->name('public-registrations.index');

// Set the landing page to the registration form
Route::get('/', [PublicRegistrationController::class, 'create'])->name('home');

// Resource routes for public registrations
Route::resource('public-registrations', PublicRegistrationController::class);

// Lucky draw route
Route::get('lucky-draw', function () {
    $names = PublicRegistration::pluck('name')->toArray(); // Fetch only names
    return view('lucky-draw',
    compact('names'));
});

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
