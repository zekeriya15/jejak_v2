

<x-layout>
    <section>
        <div class="container-lg">
            <div class="row">
                <!-- Trip Images -->
                <div class="col-6">
                    <img src="{{ asset('storage/' . $trip->images->first()->image_path) }}" width="100%" id="ProductImg">

                    <div class="row my-2">
                        @foreach ($trip->images as $image)
                            <div class="small-img-col col">
                                <img src="{{ asset('storage/' . $image->image_path) }}" width="100%" class="small-img">
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Trip Details -->
                <div class="col-6">
                    <h1>{{ $trip->judul }}</h1>
                    <p class="lead">{{ $trip->nama_destinasi }}</p>
                    <p>{{ $trip->alamat }}</p>
                    <p class="p">Harga Tiket: Rp{{ number_format($trip->harga_tiket) }}</p>
                    <p class="p">Harga Trip: Rp{{ number_format($trip->harga_trip) }}</p>
                    <p>Tanggal Trip: {{ $trip->tgl_trip }}</p>
                    <p>Durasi: {{ $trip->durasi }}</p>
                    <a href="{{ route('checkout.index', ['trip_id' => $trip->id]) }}" class="btn btn-success">Daftar</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Description and Facilities -->
    <section>
        <div class="container my-4">
            <hr>
            <h2>Deskripsi</h2>
            <p>{{ $trip->deskripsi }}</p>
        </div>
        <div class="container my-4">
            <hr>
            <h2>Fasilitas</h2>
            <p>{{ $trip->fasilitas }}</p>
        </div>
    </section>

    <!-- Reviews -->
    <section>
        <div class="container my-4 mb-2">
            <h2>Ulasan ({{ $trip->reviews->count() }} ulasan)</h2>
            <p>Rating Rata-rata: {{ number_format($averageRating, 1) }} <i class="fa">&#xf005;</i></p>
            <hr>
            @foreach ($trip->reviews as $review)
                <div class="me-3 d-flex align-items-center">
                    <div class="me-2">
                        <img src="{{ asset('img2/user.png') }}" style="width: 70px;" class="rounded-circle">
                    </div>
                    <p>{{ $review->user->name }}</p>
                </div>
                @for ($i = 1; $i <= 5; $i++)
                    <i style="font-size:24px" class="fa {{ $i <= $review->rating ? 'fa-star' : 'fa-star-o' }}"></i>
                @endfor
                <p>{{ $review->ulasan }}</p>

                <!-- Review Images -->
                <div class="user">
                    @foreach ($review->images as $image)
                        <a href="{{ asset('storage/' . $image->image_path) }}">
                            <img src="{{ asset('storage/' . $image->image_path) }}" style="width: 15%;">
                        </a>
                    @endforeach
                </div>
                <hr>
            @endforeach
        </div>
    </section>

    <script>
        var ProductImg = document.getElementById("ProductImg");
        var SmallImg = document.getElementsByClassName("small-img");

        for (let i = 0; i < SmallImg.length; i++) {
            SmallImg[i].onclick = function() {
                ProductImg.src = SmallImg[i].src;
            }
        }
    </script>
</x-layout>
