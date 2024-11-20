{{-- <x-layout>


        <section>
            <div class="container-lg">
                <div class="row">
                    <div class="col-6">
                        <img src="/img2/gal1.jpg" width="100%" id="ProductImg">

                        <div class="row my-2">
                            <div class="small-img-col col">
                                <img src="/img2/gal1.jpg" width="100%" class="small-img">
                            </div>
                            <div class="small-img-col col">
                                <img src="/img2/gal2.png" width="100%" class="small-img">
                            </div>
                            <div class="small-img-col col">
                                <img src="/img2/gal3.jpeg" width="100%" class="small-img">
                            </div>
                            <div class="small-img-col col">
                                <img src="/img2/gal4.jpg" width="100%" class="small-img">
                            </div>
                        </div>
                    </div>

                    <div class="col-6"> 
                        <h1>Hiking di Gunung Putri Lembang</h1>
                        <p class="lead">Gunung Putri Lembang</p>
                        <p>Jl. Gunung Putri No. 184, Jayagiri, Lembang, Bandung Barat, Jawa Barat</p>
                        <p class="p">Harga Tiket: Rp25.000</p>
                        <p class="p">Harga Trip: Rp25.000</p>
                        <p>Tanggal Trip: 20 Oktober 2024</p>
                        <p>Durasi: 1 hari</p>
                        <!-- <a href="" class="btn btn-success">Daftar</a> -->
            
                        
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container my-4">
                <hr>
                <h2>Deskripsi</h2>
                <p>Gunung Putri Lembang adalah salah satu pegunungan yang terletak dikecamatan 
                    Lembang, Kabupaten Bandung Barat. Gunung Putri Lembang merupakan salah satu
                    tempat wisata yang berupa sebuah bukit yang arealnya banyak ditumbuhi dengan
                    rumput dan pohon kecil lainnya yang di tengahnya terdapat sebuah Tugu bernama 
                    Tugu Sespim Objek wisata Gunung Putri Lembang bisa jadi opsi yang cukup bersahabat 
                    bagi para pendaki pemula. Treknya berupa tangga tertata dan hanya memerlukan 
                    waktu sekitar 30 menit untuk mencapai puncak.</p>
            </div>
            <div class="container my-4">
                <hr>
                <h2>Fasilitas</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui soluta commodi inventore dicta omnis repellendus tempore impedit veritatis, neque amet! Placeat adipisci illo neque qui veniam inventore nulla dolorem dolor.</p>
            </div>

        </section>

        <section>
            <div class="container my-4">
                <hr>
                <div class="d-flex justify-content-center">
                    
                    <a href="/input-ulasan" class="btn btn-success">Tambah Ulasan</a>
    
                </div>
            </div> 
            
        </section>

        







        


        <script>
            var ProductImg = document.getElementById("ProductImg");
            var SmallImg = document.getElementsByClassName("small-img");
    
            SmallImg[0].onclick = function()
            {
                ProductImg.src = SmallImg[0].src;
            }
            SmallImg[1].onclick = function()
            {
                ProductImg.src = SmallImg[1].src;
            }
            SmallImg[2].onclick = function()
            {
                ProductImg.src = SmallImg[2].src;
            }
            SmallImg[3].onclick = function()
            {
                ProductImg.src = SmallImg[3].src;
            }
        </script>

</x-layout> --}}



<x-layout>
    <section>
        <div class="container-lg">
            <div class="row">
                <div class="col-6">
                    <!-- Main Trip Image -->
                    <img src="{{ asset('storage/' . $trip->images->first()->image_path) }}" width="100%" id="ProductImg">

                    <!-- Additional Images -->
                    <div class="row my-2">
                        @foreach ($trip->images as $image)
                            <div class="small-img-col col">
                                <img src="{{ asset('storage/' . $image->image_path) }}" width="100%" class="small-img">
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-6"> 
                    <h1>{{ $trip->judul }}</h1>
                    <p class="lead">{{ $trip->nama_destinasi }}</p>
                    <p>{{ $trip->alamat }}</p>
                    <p class="p">Harga Tiket: Rp{{ number_format($trip->harga_tiket) }}</p>
                    <p class="p">Harga Trip: Rp{{ number_format($trip->harga_trip) }}</p>
                    <p>Tanggal Trip: {{ $trip->tgl_trip }}</p>
                    <p>Durasi: {{ $trip->durasi }}</p>
                </div>
            </div>
        </div>
    </section>

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

    <section>
        <div class="container my-4">
            <hr>
            <div class="d-flex justify-content-center">
                <a href="{{ route('input.ulasan', ['tripId' => $trip->id]) }}" class="btn btn-success">Tambah Ulasan</a>
            </div>
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
