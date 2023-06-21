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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style type="text/css">
      #navbar {
        background-color: #3b6bbd;
        box-shadow: 0px 3px 3px #888888;
      }
      /* #header {
        background-color: #134aa8;
        box-shadow: 0px 3px 3px #888888;
      } */
      #body {
        background-color: #f0f0f0;
      } 
    </style>
  </head>
  <body id="header">
    <!-- Navigation-->
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
    <!-- Product section-->
    <section class="py-5">
      <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
          <div class="col-md-6">
            @if (file_exists("storage/".$produk->foto_produk))
              <img class="rounded card-img-top mb-5 mb-md-0" src="/storage/{{ $produk->foto_produk }}"width="100px" height="500px" alt="..." />
            @endif
          </div>
          <div class="col-md-6">
            <div class="small mb-1 text-dark">SKU: {{ $produk->kode_produk }}</div>
            <h1 class="display-5 fw-bolder text-dark">{{ $produk->nama_produk }}</h1>
            <div class="fs-5 mb-3">
              <span class="text-decoration-line-through text-white"></span>
              <span class="text-dark">Rp. {{ number_format($produk->harga_produk) }}</span> <br>
              <span class="text-dark">kategori : {{ $produk->kategori }}</span>
            </div>
            <p class="text-dark lead">
              {{ $produk->deskripsi_produk }}
            </p>
            <div class="d-flex">
              {{-- <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" /> --}}
              <form action="/detail/create/{{ $produk->kode_produk}}" method="post">
                @csrf
                <div class="col-md-6 col-lg-6 col-xl-6 d-flex">
                  <a class="btn px-2"
                      onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                      <i class="fa fa-minus-circle" aria-hidden="true"></i>
                  </a>
  
                  <input id="form1" min="0" name="jumlah" value="1" type="number" class="form-control form-control-sm ms-2 me-2" />

                  <a class="btn px-2"
                      onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                      <i class="fa fa-plus-circle" aria-hidden="true"></i>
                  </a>
                </div>

                <button class="btn btn-outline-dark flex-shrink-0 mt-3" type="submit">
                {{-- <button class="btn btn-outline-light flex-shrink-0" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"> --}}
                  <i class="bi-cart-fill me-1"></i>
                  {{-- <a href="/detail/create/{{ $produk->kode_produk}}">Add to cart</a>  --}}
                  Add to cart
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <footer id="body" class="py-5">
      <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Cake House 2023</p></div>
    </footer>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="produk/create" method="post" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Jumlah Produk</label>
                <input type="number" name="kode_produk" class="form-control" >
              </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>

  </body>
</html>
