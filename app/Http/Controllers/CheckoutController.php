<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trip;
use App\Models\Booking;

class CheckoutController extends Controller
{
    public function index($trip_id)
    {
        // Find the trip by its ID
        $trip = Trip::findOrFail($trip_id);

        // Pass the trip to the view
        return view('user.checkout', compact('trip'));
    }

    public function store(Request $request, $trip_id)
    {
        // Get the trip
        $trip = Trip::findOrFail($trip_id);

        // Get the quantity from the form
        $quantity = $request->input('quantity');

        // Calculate the total price based on the quantity
        $harga_total = $trip->harga_trip * $quantity;

        // Get the current logged-in user's ID (using Breeze)
        $user_id = auth()->id();

        // Create a new booking record
        $booking = Booking::create([
            'trip_id' => $trip->id,
            'user_id' => $user_id,
            'jumlah' => $quantity,
            'harga_total' => $harga_total,
            'status' => 'unpaid', // You can change this as needed
        ]);



        // For debugging: check the created booking
        // dd($booking);

        //SAMPLE REQUEST START HERE

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = [
            'transaction_details' => [
                'order_id' => 'BOOKING-' . $booking->id, // Unique ID based on the booking ID
                'gross_amount' => $harga_total, // Total price based on trip
            ],
            'customer_details' => [
                'first_name' => auth()->user()->name, // Assuming Breeze uses 'name' field
                'email' => auth()->user()->email,
                'phone' => auth()->user()->phone_number ?? null,
            ],
            'item_details' => [
                [
                    'id' => $trip->id,
                    'price' => $trip->harga_trip,
                    'quantity' => $quantity,
                    'name' => $trip->judul,
                ]
            ],
        ];

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return view('user.payment', ['snapToken' => $snapToken, 'trip' => $trip, 'quantity' => $quantity]);
        // dd($params);


        // // Redirect or show a success page after storing the booking
        // return redirect()->route('trip.details', ['tripId' => $trip->id]);
    }



}
