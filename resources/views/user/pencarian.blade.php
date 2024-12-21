<x-layout>

    <section>
        {{-- <div class="container my-4">
            <p class="lead">OPEN TRIP YANG SUDAH DIIKUTI</p>
            <hr>
           
            @foreach ($trips as $trip)
            <a href="{{ route('place-detail-user-ulasan', ['trip_id' => $trip->id]) }}" style="text-decoration: none; color: inherit;">
                <div class="d-flex align-items-center border p-3 mb-3 mt-3 rounded">
                    <div class="rounded">
                        <img src="{{ asset('storage/' . $trip->images->first()->image_path) }}" style="width: 200px;" class="rounded">
                    </div>
                    <div class="ms-3">
                        <div>
                            <h5>{{ $trip->judul }}</h5>
                            <hr>
                            <p class="m-0">Tanggal trip: {{ $trip->tgl_trip }}</p>
                            <p class="m-0">{{ $trip->alamat }}</p>
                            <small class="text-muted">Harga: Rp{{ number_format($trip->harga_trip) }}</small>
                            <p class="mt-1">{{ Str::limit($trip->deskripsi, 100) }}</p>
                        </div>
                            
                    </div>
                </div>
            </a>   
            @endforeach

        </div> --}}


        <div class="container mt-5">
            <h3>Hasil Pencarian untuk: "{{ $searchTerm }}"</h3> <br>
    
            @if ($trips->isEmpty())
                <p>Tidak ada hasil ditemukan.</p>
            @else
                @foreach ($trips as $trip)
                <a href="{{ route('trip.details', ['tripId' => $trip->id]) }}" style="text-decoration: none; color: inherit;">
                    <div class="d-flex align-items-center border p-3 mb-3 mt-3 rounded">
                        <div class="rounded">
                            <img src="{{ asset('storage/' . $trip->images->first()->image_path) }}" style="width: 200px;" class="rounded">
                        </div>
                        <div class="ms-3">
                            <div>
                                <h5>{{ $trip->judul }}</h5>
                                <hr>
                                <p class="m-0">Tanggal trip: {{ $trip->tgl_trip }}</p>
                                <p class="m-0">{{ $trip->alamat }}</p>
                                <small class="text-muted">Harga: Rp{{ number_format($trip->harga_trip) }}</small>
                                <p class="mt-1">{{ Str::limit($trip->deskripsi, 100) }}</p>
                            </div>
                                
                        </div>
                    </div>
                </a>   
                @endforeach
            @endif
        </div>
        
    </section>


</x-layout>