<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TripController;
use App\Http\Controllers\UserController;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', function () {
    if (Auth::user()->role === 'admin') {
        return redirect('/profil-admin');
    } else{
        return redirect('/homepage');
    }
})->middleware(['auth', 'verified'])->name('dashboard');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    
    Route::get('/homepage', function () {
        return view('homepage');
    });

    Route::get('/place-detail', function () {
        return view('place_detail');
    });




    Route::get('/profil-user', [UserController::class, 'index']);

    Route::get('/place-detail-ulasan/{trip_id}', [UserController::class, 'detail'])->name('place-detail-user-ulasan');

    Route::get('/input-ulasan/{tripId}', [UserController::class, 'inputUlasan'])->name('input.ulasan');

    Route::post('/input-ulasan/{tripId}', [UserController::class, 'submitUlasan'])->name('submit.ulasan');






    Route::get('/profil-admin', [TripController::class, 'index']);

    Route::get('/place-detail-admin/{trip_id}', [TripController::class, 'showPlaceDetailAdmin'])->name('place-detail-admin');

    Route::get('/input-trip', function () {
        return view('admin.input_trip');
    });

    Route::get('/trip/edit/{id}', [TripController::class, 'edit'])->name('trip.edit');



    Route::post('/trip/store', [TripController::class, 'store'])->name('trip.store');

    Route::put('/trip/update/{id}', [TripController::class, 'update'])->name('trip.update');

    Route::delete('/trip/{id}', [TripController::class, 'destroy'])->name('trip.destroy');


        
});


require __DIR__.'/auth.php';












