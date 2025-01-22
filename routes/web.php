<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicRegistrationController;
use App\Models\PublicRegistration;



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
