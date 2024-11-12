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
        $trips = Trip::with(['images' => function($query) {
            $query->oldest()->limit(1); // Or `latest()` to get the newest image
        }])->get();
        return view('admin.profil_admin', compact('trips'));
    }

    public function store(Request $request): RedirectResponse
    {
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
            'fotos.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validate each image
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
    
}
