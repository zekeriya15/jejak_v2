<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trip;
use App\Models\TripImages;
use App\Models\Review;
use App\Models\ReviewImages;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        // Get the authenticated user
        $user = auth()->user();

        // Fetch trips the user has joined
        $trips = Trip::with('images') // Include trip images
            ->whereHas('bookings', function ($query) use ($user) {
                $query->where('user_id', $user->id); // Filter trips by user bookings
            })
            ->get();

        // Return the profile view with the trips data
        return view('user.profil_user', compact('user', 'trips'));
    }


    public function detail($trip_id)
    {
        // Fetch the trip with its images
        $trip = Trip::with('images')->findOrFail($trip_id);

        // Pass the trip data to the view
        return view('user.place_detail_user_ulasan', compact('trip'));
    }


    public function inputUlasan($tripId)
    {
        // Retrieve the trip data using the tripId
        $trip = Trip::findOrFail($tripId);

        // Return the view with the trip data
        return view('user.input_ulasan', compact('trip'));
    }


    public function submitUlasan(Request $request, $tripId)
    {

        // dd($request->method());
        // dd($request->file('fotos'));

        // Validate the incoming request
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'ulasan' => 'required|string|max:255',
            'fotos.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Create the review record
        $review = Review::create([
            'user_id' => Auth::id(), // Assuming the user is logged in
            'trip_id' => $tripId,
            'rating' => $request->input('rating'),
            'ulasan' => $request->input('ulasan'),
        ]);

        // Handle image uploads if any
        if ($request->hasFile('fotos')) {
            foreach ($request->file('fotos') as $file) {
                $path = $file->store('review_images', 'public'); // Store images in the public disk

                // Create a new record in the review_images table
                ReviewImages::create([
                    'review_id' => $review->id,
                    'image_path' => $path,
                ]);
            }
        }

        // Redirect back with success message
        return redirect('/profil-user');
    }


}
