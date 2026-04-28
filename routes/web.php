<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Everything inside this group requires the user to be logged in
Route::middleware(['auth', 'verified'])->group(function () {
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // --- ADD THESE LINES BELOW ---
    
    // Service Management Routes (index, create, store, edit, update, destroy)
    Route::resource('services', ServiceController::class);

    // Appointment Management Routes
    Route::resource('appointments', AppointmentController::class);
    

    // Payment Management Routes
    Route::get('payments', [PaymentController::class, 'index'])->name('payments.index');
    Route::patch('payments/{id}/pay', [PaymentController::class, 'updateStatus'])->name('payments.update');
    
    // ------------------------------

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';