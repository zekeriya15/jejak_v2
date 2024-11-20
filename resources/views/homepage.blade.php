

<head>
    <meta charset="utf-8">
    <title>Jejak | Homepage</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="img/jejak.png" rel="icon">

    <!--font-family-->
	<link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/homepage.css" rel="stylesheet">
</head>

<body>

    <!-- Navbar & Hero Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
            <img src="{{ asset('img2/logo.png') }}" width="50px">
            <b style="font-size: 2em; color: #2dae5b;">JE</b><b style="font-size: 2em; color: #ffc120;">JAK</b>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="homepage.html" class="nav-item nav-link active">Beranda</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Kategori</a>
                        <div class="dropdown-menu m-0">
                            <a href="/trip" class="dropdown-item">Sungai dan Danau</a>
                            <a href="/trip" class="dropdown-item">Gunung</a>
                            <a href="/trip" class="dropdown-item">Wahana</a>
                            <a href="/trip" class="dropdown-item">Curug dan Air Terjun</a>
                        </div>
                    </div>
                    <a class="nav-item nav-link" onclick="scrollToBottom()">Jelajahi</a>
                    <a href="Inputplace.php" class="nav-item nav-link">Tambah</a>
                    <a class="nav-item nav-link" onclick="scrollToBottom()">Kontak</a>
                </div>
                <a href="/profil-user" class="btn btn-primary rounded-pill py-2 px-4">Profil</a>
                <form method="POST" action="{{ route('logout') }}" class="m-0">
                    @csrf
                    <a :href="route('logout')" class="btn btn-primary rounded-pill px-4" style="font-size: smaller; padding: smaller; margin:10px" onclick="event.preventDefault();
                                        this.closest('form').submit();">Keluar</a>
                </form>
            </div>
        </nav>
    </div> <!-- Navbar & Hero Start -->
        <div class="container-fluid bg-primary py-5 mb-5 hero-header">
            <div class="container py-5">
                <div class="row justify-content-center py-5">
                    <div class="col-lg-10 pt-lg-5 mt-lg-5 text-left">
                        <h1 class="display-3 text-white mb-3 animated slideInDown">Bagikan pengalaman berwisatamu pada yang lain!</h1>
                        <p class="fs-4 text-white mb-4 animated slideInDown">Sekarang kamu bisa menulis dan membaca ulasan dari tempat wisata yang pernah kamu kunjungi!</p>
                        <div class="position-relative w-75 mx-auto animated slideInDown">
                        <form method="GET" action="">
        <input class="form-control border-0 rounded-pill w-100 py-3 ps-4 pe-5" type="text" name="search_term" placeholder="Contoh: Gunung Putri" list="search-suggestions" autocomplete="off">
        <div id="results"></div>
        <datalist id="search-suggestions">
            <option value="Gunung Putri">
            <option value="Curug Cibaliung">
            <option value="Floating Market">
            <option value="Glamping Lakeside">
        </datalist>
        <button type="submit" class="btn btn-primary rounded-pill py-2 px-4 position-absolute top-0 end-0 me-2" style="margin-top: 7px;" >Cari</button>
    </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- Navbar & Hero End -->

    <!-- Destination Start -->
    <div class="container-xxl py-5 destination">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6>Jelajahi Destinasi di Jawa Barat</h6>
                <h1 class="mb-2">Temukan Destinasi Impianmu!</h1>
                <h6>Telusuri koleksi tujuan wisata yang sedang populer.</h6><br/>
            </div>
            <div class="row g-3">
                <div class="col-lg-7 col-md-6">
                    <div class="row g-3">
                        <div class="col-lg-12 col-md-12 wow zoomIn" data-wow-delay="0.1s">
                            <a class="position-relative d-block overflow-hidden" href="/place-detail">
                                <img class="img-fluid" src="img/ciremai.jpeg" alt="">
                                <div class="bg-white text-primary fw-bold position-absolute bottom-0 end-0 m-3 py-1 px-2">Gunung Ciremai, Kuningan</div>
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.3s">
                            <a class="position-relative d-block overflow-hidden" href="/trip">
                                <img class="img-fluid" src="img/putri.jpg" alt="">
                                <div class="bg-white text-primary fw-bold position-absolute bottom-0 end-0 m-3 py-1 px-2">Gunung Putri, Bandung</div>
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.5s">
                            <a class="position-relative d-block overflow-hidden" href="/trip">
                                <img class="img-fluid" src="img/floating.jpg" alt="">
                                <div class="bg-white text-primary fw-bold position-absolute bottom-0 end-0 m-3 py-1 px-2">Floating Market, Bandung</div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 wow zoomIn" data-wow-delay="0.7s" style="min-height: 350px;">
                    <a class="position-relative d-block h-100 overflow-hidden" href="/trip">
                        <img class="img-fluid position-absolute w-100 h-100" src="img/cibaliung.jpg" alt="" style="object-fit: cover;">
                        <div class="bg-white text-primary fw-bold position-absolute bottom-0 end-0 m-3 py-1 px-2">Curug cibaliung, Bogor</div>
                    </a>
                </div>
            </div>
        </div>
    </div> <!-- Destination End -->

   <!-- Package Start -->
   <div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h1 class="mb-7">Rekomendasi Wahana Keluarga</h1><br/><br/>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="package-item">
                    <div class="overflow-hidden">
                        <img class="img-fluid" src="img/Safari.jpeg" alt="">
                    </div>
                    <div class="text-center p-4">
                        <h3 class="mb-0">Taman Safari Indonesia</h3>
                        <div class="mb-3">
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                        </div>
                        <p>Taman margasatwa dengan berbagai atraksi dan kegiatan.</p>
                        <div class="d-flex justify-content-center mb-2">
                            <a href="detailsafari.php" class="btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">Kunjungi</a>
                            <a href="Inputplace.php" class="btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">Beri Ulasan</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="package-item">
                    <div class="overflow-hidden">
                        <img class="img-fluid" src="img/glamping.png" alt="">
                    </div>
                    <div class="text-center p-4">
                        <h3 class="mb-0">Glamping Lakeside Rancabali</h3>
                        <div class="mb-3">
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                        </div>
                        <p>Destinasi berkemah terbaik untuk liburan keluarga di Situ Patenggang Bandung.</p>
                        <div class="d-flex justify-content-center mb-2">
                            <a href="detailglamping.php" class="btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">Kunjungi</a>
                            <a href="#" class="btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">Beri Ulasan</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="package-item">
                    <div class="overflow-hidden">
                        <img class="img-fluid" src="img/Gowet.jpeg" alt="">
                    </div>
                    <div class="text-center p-4">
                        <h3 class="mb-0">Go Wet Waterpark</h3>
                        <div class="mb-3">
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                        </div><br/>
                        <p>Rasakan pengalaman bermain air bersama teman atau keluarga di Go! Wet.</p>
                        <div class="d-flex justify-content-center mb-2">
                            <a href="detailgowet.php" class="btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">Kunjungi</a>
                            <a href="#" class="btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">Beri Ulasan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class=" align-items-center border p-3 mb-3 rounded">
            @foreach ($trips as $trip)
            <a href="{{ route('trip.details', ['tripId' => $trip->id]) }}" style="text-decoration: none; color: inherit;">
                <div class="d-flex align-items-center border p-3 mb-3 rounded">
                    <div class="rounded">
                        <img src="{{ asset('storage/' . $trip->images->first()->image_path) }}" style="width: 200px;" class="rounded">
                    </div>
                    <div class="ms-3">
                        <div>
                            <h5>{{ $trip->judul }}</h5>
                            <hr>
                            <p class="m-0">Tanggal trip: {{ $trip->tgl_trip }}</p>
                            <p class="m-0">{{ $trip->alamat }}</p>
                            {{-- <small class="text-muted">Jam Buka: 01.00-19.50</small><br> --}}
                            <small class="text-muted">Harga: Rp{{ number_format($trip->harga_trip) }}</small>
                            <p class="mt-1">{{ Str::limit($trip->deskripsi, 100) }}</p>
                        </div>
                            
                    </div>
                </div>
            </a>   
            @endforeach
            
        </div>
    </div>
</div> <!-- Package End -->
        
    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3 judul-footer">Kategori</h4>
                    <a class="btn btn-link" href="">Sungai dan Danau</a>
                    <a class="btn btn-link" href="">Gunung</a>
                    <a class="btn btn-link" href="">Wahana</a>
                    <a class="btn btn-link" href="">Curug dan Air Terjun</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3 judul-footer">Jelajahi Kabupaten</h4>
                    <a class="btn btn-link" href="">Bandung</a>
                    <a class="btn btn-link" href="">Bandung Barat</a>
                    <a class="btn btn-link" href="">Bekasi</a>
                    <a class="btn btn-link" href="">Bogor</a>                    
                    <a class="btn btn-link" href="">Ciamis</a>
                    <a class="btn btn-link" href="">Cianjur</a>
                    <a class="btn btn-link" href="">Cirebon</a>
                    <a class="btn btn-link" href="">Garut</a>    
                    <a class="btn btn-link" href="">Indramayu</a>
                    <a class="btn btn-link" href="">Karawang</a>
                    <a class="btn btn-link" href="">Kuningan</a>
                    <a class="btn btn-link" href="">Majalengka</a>
                    <a class="btn btn-link" href="">Pangandaran</a>                    
                    <a class="btn btn-link" href="">Subang</a>
                    <a class="btn btn-link" href="">Sukabumi</a>
                    <a class="btn btn-link" href="">Sumedang</a><br/>            
                    
                </div>                
                <div class="col-lg-3 col-md-7">
                    <h4 class="text-white mb-3 judul-footer">Jelajahi Kota</h4>
                    <a class="btn btn-link" href="">Bandung</a>
                    <a class="btn btn-link" href="">Banjar</a>
                    <a class="btn btn-link" href="">Bekasi</a>
                    <a class="btn btn-link" href="">Bogor</a>
                    <a class="btn btn-link" href="">Cimahi</a>
                    <a class="btn btn-link" href="">Cirebon</a>                    
                    <a class="btn btn-link" href="">Depok</a>
                    <a class="btn btn-link" href="">Sukabumi</a>
                    <a class="btn btn-link" href="">Tasikmalaya</a>
                </div>
                <div class="col-lg-3 col-md-7">
                    <h4 class="text-white mb-3 judul-footer">Kontak</h4>
                    <div class="pt-3">
                        <div class="d-flex align-items-center mb-2">
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                            <span>jejakOfficial</span>
                        </div>
                        <div class="d-flex align-items-center mb-2">
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                            <span>jejakOfficial</span>
                        </div>
                        <div class="d-flex align-items-center mb-2">
                            <a class="btn btn-outline-light btn-social"><i class="fa fa-envelope"></i></a>
                            <span>jejak@gmail.com</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <a class="btn btn-outline-light btn-social"><i class="fa fa-phone-alt"></i></a>
                            <span>0812-1096-5976</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy;2024 Jejak. All Right Reserved.
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- Footer End -->

    <script>
        function scrollToBottom() {
            // Scroll ke paling bawah halaman
            window.scrollTo({
                top: document.body.scrollHeight,
                behavior: 'smooth'
            });
        }
    </script>
    
    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>
</html>