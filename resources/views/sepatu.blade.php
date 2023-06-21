<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E-commers</title>
    <link rel="stylesheet" href="{{ asset('/asset1/css/bootstrap.min.css') }}" />
    <script src="/asset1/js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <style type="text/css">
      #navbar {
        background-color: #3b6bbd;
        box-shadow: 0px 3px 3px #888888;
      }
      #header {
        background-color: #134aa8;
        /* background-color: #f0f0f0; */

        box-shadow: 0px 3px 3px #888888;
      }
      #body {
        background-color: #f0f0f0;
      } 

    </style>
  </head>
  <body id="body">
    <nav id="navbar" class="navbar navbar-expand-md navbar-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="/page">Fashion Store</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/page">Home</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="false">Kategori</a>
              <ul class="dropdown-menu" aria-labelledby="dropdown01">
                <li><a class="dropdown-item" href="/sepatu">Sepatu</a></li>
                <li><a class="dropdown-item" href="/baju">Baju</a></li>
                <li><a class="dropdown-item" href="/tas">Tas</a></li>
              </ul>
            </li>
          </ul>
          <form class="d-flex" action="/cart">
            <button class="btn btn-outline-light" type="submit">
              <i class="fa fa-shopping-cart"></i>
              <i class="bi-cart-fill me-1"></i>
              Cart
              <span class="badge bg-light text-dark ms-1 rounded-pill">{{ $cart }}</span>
            </button>
          </form>
        </div>
      </div>
    </nav>
    {{-- <header id="header" class="py-5">
      <div class="container px-4 px-lg-5 mt-5">
        <div class="text-center text-white">
          <h1 class="display-4 fw-bolder"><img src="asset1/img/logo.png" width="30%" alt="" srcset="" class="rounded-circle" /></h1>
          <p class="lead fw-normal text-white mb-0">Cake House</p>
        </div>
      </div>
    </header> --}}

    <!-- Section-->
    <section class="py-5 mt-5">
      <div class="container px-4 px-lg-5 mt-2">
        <h4 class="text-center">Produk</h4>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center pt-4">
            @foreach ($produk as $item)
                <div class="col mb-5">
                  <div class="card h-100">
                      <!-- Product image-->
                      <img class="card-img-top pt-2 ps-2 pe-2" src="storage/{{ $item->foto_produk }}" alt="..." />
                      <!-- Product details-->
                      <div class="card-body p-2">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">{{ $item->nama_produk }}</h5>
                            <!-- Product price-->
                            Rp. {{ number_format($item->harga_produk) }}
                        </div>
                      </div>
                      <!-- Product actions-->
                      <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                      <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="/detail/{{ $item->id }}">View options</a></div>
                      </div>
                  </div>
                </div>
            @endforeach
        </div>
      </div>
    </section>
  </body>
</html>
