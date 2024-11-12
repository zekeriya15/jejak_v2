<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TripController;

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




    Route::get('/profil-user', function () {
        return view('user.profil_user');
    });

    Route::get('/place-detail-ulasan', function () {
        return view('user.place_detail_user_ulasan');
    });

    Route::get('/input-ulasan', function () {
        return view('user.input_ulasan');
    });





    Route::get('/profil-admin', [TripController::class, 'index']);

    Route::get('/place-detail-admin/{trip_id}', [TripController::class, 'showPlaceDetailAdmin'])->name('place-detail-admin');

    Route::get('/input-trip', function () {
        return view('admin.input_trip');
    });


    Route::post('/trip/store', [TripController::class, 'store'])->name('trip.store');

        
});


require __DIR__.'/auth.php';












