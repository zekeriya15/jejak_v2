<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TripController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CheckoutController;


// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', function () {
    if (Auth::user()->role === 'admin') {
        return redirect('/profil-admin');
    } 
    else if (Auth::user()->role === 'super admin') {
        return redirect('/superadmin');
    }
    else if (Auth::user()->role === 'customer service') {
        return redirect('/customerservice/index');
    }
    else{
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

    Route::resource('roles', RoleController::class);
    // Route::resource('users', UserController::class);


    // In routes/web.php
    Route::get('/superadmin/users', [UserController::class, 'showUsers'])->name('users.showUsers');
    Route::get('/superadmin/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/superadmin/users/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/superadmin/users/show-detail/{id}', [UserController::class, 'show'])->name('users.show');
    Route::get('/superadmin/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/superadmin/users/update/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/superadmin/users/destroy{id}', [UserController::class, 'destroy'])->name('users.destroy');

    Route::get('/superadmin/roles', [RoleController::class, 'showRoles'])->name('roles.showRoles');
    Route::get('/superadmin/roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('/superadmin/roles', [RoleController::class, 'store'])->name('roles.store');
    Route::get('/superadmin/roles/show-detail/{id}', [RoleController::class, 'show'])->name('roles.show');
    Route::get('/superadmin/roles/edit/{id}}', [RoleController::class, 'edit'])->name('roles.edit');
    Route::put('/superadmin/roles/update/{id}', [RoleController::class, 'update'])->name('roles.update');
    Route::delete('/superadmin/roles/destroy/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');
    

    
    Route::get('/superadmin', function () {
        return view('super_admin.welcome');
    });

    Route::get('/customerservice/index', [BookingController::class, 'index']);

    
    Route::get('/homepage', [TripController::class, 'getAllTrips']);

    Route::get('/trip/{tripId}', [TripController::class, 'showTripDetails'])->name('trip.details');

    




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


    Route::get('/checkout/{trip_id}', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout/{trip_id}', [CheckoutController::class, 'store'])->name('checkout.store');
    Route::get('/invoice/{booking_id}', [CheckoutController::class, 'invoice'])->name('checkout.invoice');
    


        
});




require __DIR__.'/auth.php';












