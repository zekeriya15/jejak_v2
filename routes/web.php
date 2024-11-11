<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', function () {
    if (Auth::user()->role == 'admin') {
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
});

require __DIR__.'/auth.php';













Route::get('/homepage', function () {
    return view('homepage');
});

Route::get('/place-detail', function () {
    return view('place_detail');
});





Route::get('/profil-admin', function () {
    return view('admin.profil_admin');
});

Route::get('/place-detail-admin', function () {
    return view('admin.place_detail_admin');
});

Route::get('/input-trip', function () {
    return view('admin.input_trip');
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

