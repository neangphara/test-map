<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LocationController;

// Route::get('/', function () {
//     return view('map');
// });

Route::post('/locations', [LocationController::class, 'store'])->name('locations.store');
Route::get('/', [LocationController::class, 'index'])->name('map.index');
Route::get('/pinlocation', [LocationController::class, 'create'])->name('pin.location');
Route::get('/locations/{id}', [LocationController::class, 'show'])->name('locations.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
