<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title></title>

    
    <link rel="stylesheet" href="/css/profil.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-xxl">
            <a href="" class="navbar-brand">
                <img src="/img2/logo.png" width="50px" class="pb-3">
                <span style="color: #2dae5b; font-size: 2em;">JE</span><span style="color: #ffc120; font-size: 2em;">JAK</span>
            </a>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/homepage">Beranda</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Kategori</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Tentang</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/profil-user">Profil</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('profile.update') }}">Edit Profil</a>
                  </li>
                  <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}" class="m-0">
                      @csrf
                      <a :href="route('logout')" class="nav-link" style="cursor: pointer" onclick="event.preventDefault();
                                          this.closest('form').submit();">Keluar</a>
                  </form>
                  </li>
                </ul>
              </div>
        </div>
    </nav>



    {{ $slot }}




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>