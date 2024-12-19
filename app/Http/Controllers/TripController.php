<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Trip;
use App\Models\TripImages;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;

class TripController extends Controller
{
    public function index()
    {
        // $trips = Trip::with('images')->get();
        $trips = Trip::with([
            'images' => function ($query) {
                $query->oldest()->limit(1); // Or `latest()` to get the newest image
            }
        ])->get();
        return view('admin.profil_admin', compact('trips'));
    }

    public function getAllTrips()
    {
        // $trips = Trip::with('images')->get();
        $trips = Trip::with([
            'images' => function ($query) {
                $query->oldest()->limit(1); // Or `latest()` to get the newest image
            }
        ])->get();
        return view('homepage', compact('trips'));
    }

    public function showTripDetails($tripId)
    {
        $trip = Trip::with(['images', 'reviews.images', 'reviews.user'])
            ->findOrFail($tripId);

        // Calculate the average rating
        $averageRating = $trip->reviews->avg('rating');

        return view('place_detail', [
            'trip' => $trip,
            'averageRating' => $averageRating,
        ]);
    }


    public function store(Request $request): RedirectResponse
    {
        // dd($request->file('fotos'));

        $request->validate([
            'judul' => 'required|string|max:255',
            'nama_destinasi' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'fasilitas' => 'required|string',
            'tgl_trip' => 'required|date',
            'harga_tiket' => 'required|numeric|min:0',
            'harga_trip' => 'required|numeric|min:0',
            'durasi' => 'required|integer|min:1',
            'fotos.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048', // Validate each image
        ]);

        DB::transaction(function () use ($request) {
            // Step 1: Insert the trip
            $trip = Trip::create([
                'judul' => $request->judul,
                'nama_destinasi' => $request->nama_destinasi,
                'alamat' => $request->alamat,
                'deskripsi' => $request->deskripsi,
                'fasilitas' => $request->fasilitas,
                'tgl_trip' => $request->tgl_trip,
                'harga_tiket' => $request->harga_tiket,
                'harga_trip' => $request->harga_trip,
                'durasi' => $request->durasi,
            ]);

            // Step 2: Handle image uploads
            if ($request->hasFile('fotos')) {
                foreach ($request->file('fotos') as $foto) {
                    // Store the file in the "public/trip_images" folder
                    $path = $foto->store('trip_images', 'public');

                    // Save the image path to the trip_images table
                    TripImages::create([
                        'trip_id' => $trip->id,
                        'image_path' => $path,
                    ]);
                }
            }
        });

        return redirect('/profil-admin')->with('success', 'Trip created successfully!');
    }


    public function showPlaceDetailAdmin($trip_id)
    {
        // fetch the trip and its images based on the trip id
        $trip = Trip::with('images')->findOrFail($trip_id);

        return view('admin.place_detail_admin', compact('trip'));
    }


    public function destroy($id)
    {
        // Fetch the trip with its associated images
        $trip = Trip::with('images')->findOrFail($id);

        // Delete the image files from storage
        foreach ($trip->images as $image) {
            if (Storage::exists('public/' . $image->image_path)) {
                Storage::delete('public/' . $image->image_path);
            }
        }

        // Delete the trip (cascade will delete images from DB)
        $trip->delete();

        // Redirect back with a success message
        return redirect('/profil-admin')->with('success', 'Trip and associated images deleted successfully!');
    }


    public function edit($id)
    {
        $trip = Trip::with('images')->findOrFail($id);
        return view('admin.edit_trip', compact('trip'));
    }


    public function update(Request $request, $id)
    {
        $trip = Trip::findOrFail($id);

        // Validate the request
        $request->validate([
            'judul' => 'required|string|max:255',
            'nama_destinasi' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'fasilitas' => 'required|string',
            'tgl_trip' => 'required|date',
            'harga_tiket' => 'required|numeric|min:0',
            'harga_trip' => 'required|numeric|min:0',
            'durasi' => 'required|integer|min:1',
            'fotos.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'delete_image_ids' => 'nullable|array',
            'delete_image_ids.*' => 'integer|exists:trip_images,id',
        ]);

        // Update trip details
        $trip->update($request->only([
            'judul',
            'nama_destinasi',
            'alamat',
            'deskripsi',
            'fasilitas',
            'tgl_trip',
            'durasi',
            'harga_trip',
            'harga_tiket'
        ]));

        // Handle new image uploads
        if ($request->hasFile('fotos')) {
            foreach ($request->file('fotos') as $image) {
                $path = $image->store('trip_images', 'public');
                $trip->images()->create(['image_path' => $path]);
            }
        }

        // Handle deleting old images
        if ($request->filled('delete_image_ids')) {
            foreach ($request->delete_image_ids as $imageId) {
                $image = TripImages::find($imageId);
                if ($image) {
                    Storage::delete('public/' . $image->image_path); // Delete file
                    $image->delete(); // Delete from database
                }
            }
        }

        return redirect('/profil-admin')->with('success', 'Trip updated successfully.');
    }





}
