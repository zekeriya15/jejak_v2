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

    }


    public function callback(Request $request)
    {
    $serverKey = config('midtrans.server_key');
    $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

    if ($hashed == $request->signature_key) {
        // Extract the actual booking ID (remove 'BOOKING-' prefix)
        $bookingId = str_replace('BOOKING-', '', $request->order_id);

        $booking = Booking::where('id', $bookingId)->first();

        // if ($booking) {
        //     // Update the status based on the transaction status
        //     $booking->status = $request->transaction_status === 'capture' || $request->transaction_status === 'success' ? 'paid' : 'unpaid';
        //     $booking->save();
        // }

        if ($booking) {
            if (in_array($request->transaction_status, ['capture', 'settlement', 'success'])) {
                $booking->status = 'paid';
            } else {
                $booking->status = 'unpaid';
            }
            $booking->save();
        }
        
    }

    return response()->json(['status' => 'success']);
    }


    public function invoice($booking_id) {

        // Fetch booking and its related trip
        $booking = Booking::with('trip')->findOrFail($booking_id);

        return view('user.invoice', compact('booking'));

        
    }


}
