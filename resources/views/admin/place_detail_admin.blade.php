<x-layout-admin>


        <section>
            <div class="container-lg">
                <div class="row">
                    <div class="col-6">
                        <img src="{{ asset('storage/' . $trip->images->first()->image_path) }}" width="100%" id="ProductImg">

                        <div class="row my-2">
                            <!-- Loop through all images for small thumbnail previews -->
                            @foreach ($trip->images as $image)
                            <div class="small-img-col col">
                                <img src="{{ asset('storage/' . $image->image_path) }}" width="100%" class="small-img">
                            </div>
                            @endforeach
                            {{-- <div class="small-img-col col">
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
                            </div> --}}
                        </div>
                    </div>

                    <div class="col-6"> 
                        <h1>{{ $trip->judul }}</h1>
                        <p class="lead">{{ $trip->nama_destinasi }}</p>
                        <p>{{ $trip->alamat }}</p>
                        <p class="p">Harga Tiket: Rp{{ number_format($trip->harga_tiket) }}</p>
                        <p class="p">Harga Trip: Rp{{ number_format($trip->harga_trip) }}</p>
                        <p>Tanggal Trip: {{ $trip->tgl_trip }}</p>
                        <p>Durasi: {{ $trip->durasi }} hari</p>
                        <!-- <a href="" class="btn btn-success">Daftar</a> -->
            
                        
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
            <div class="container-lg">
                <hr>
                <h2>Jadwal Booking:</h2>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">KODE</th>
                        <th scope="col">NAMA</th>
                        <th scope="col">EMAIL</th>
                        <th scope="col">TANGGAL</th>
                        <th scope="col">JUMLAH</th>
                        <th scope="col">HARGA</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1A</th>
                        <td>Mark</td>
                        <td>mark123@email.com</td>
                        <td>2 oktober 2024</td>
                        <td>1 orang</td>
                        <td>25000</td>
                      </tr>
                      <tr>
                        <th scope="row">2A</th>
                        <td>Mark</td>
                        <td>mark123@email.com</td>
                        <td>2 oktober 2024</td>
                        <td>1 orang</td>
                        <td>25000</td>
                      </tr>
                      <tr>
                        <th scope="row">3A</th>
                        <td>Mark</td>
                        <td>mark123@email.com</td>
                        <td>2 oktober 2024</td>
                        <td>1 orang</td>
                        <td>25000</td>
                      </tr>
                    </tbody>
                  </table>
            </div>
        </section>

        <section>
            <div class="container-lg mt-5 mb-4 d-flex justify-content-between">
                <div class="">
                    <a href="" class="btn btn-danger">Hapus Acara</a>   
                    </div>
                    <div>    
                    <a href="" class="btn btn-warning">Edit Acara</a>
                    </div>
            </div>
        </section>








        <script>
            var MenuItems = document.getElementById("MenuItems");
    
            MenuItems.style.maxHeight = "0px";
    
            function menutoggle() {
                if(MenuItems.style.maxHeight == "0px")
                {
                    MenuItems.style.maxHeight = "200px";
                }
                else 
                {
                    MenuItems.style.maxHeight = "0px";
                }
            }
        </script>


        {{-- <script>
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
        </script> --}}

        <script>
            var ProductImg = document.getElementById("ProductImg");
            var SmallImg = document.getElementsByClassName("small-img");

            for (let i = 0; i < SmallImg.length; i++) {
                SmallImg[i].onclick = function() {
                    ProductImg.src = SmallImg[i].src;
                }
            }
        </script>

</x-layout-admin>