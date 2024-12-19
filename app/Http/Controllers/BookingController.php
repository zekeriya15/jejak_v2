<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;


class BookingController extends Controller
{
    public function index()
    {
        // Fetch all bookings with related trip and user information
        $bookings = Booking::with(['trip', 'user'])->get();

        // dd($bookings);

        return view('admin.list_booking', compact('bookings'));
    }
}
