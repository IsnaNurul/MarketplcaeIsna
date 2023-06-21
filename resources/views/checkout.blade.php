<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.84.0">
  <title>Checkout</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/checkout/">

  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- Bootstrap core CSS -->
  <link href="../asset1/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    #navbar {
        background-color: #3b6bbd;
        box-shadow: 0px 3px 3px #888888;
      }
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>

  
  <!-- Custom styles for this template -->
  <link href="form-validation.css" rel="stylesheet">
</head>

<body>

  @include('sweetalert::alert')

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
            <span class="badge bg-light text-dark ms-1 rounded-pill">{{ $carts }}</span>
          </button>
        </form>
      </div>
    </div>
  </nav>

  <div class="container">
    <main>
      <div class="py-5 mt-5 text-center">
        {{-- <img class="d-block mx-auto mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> --}}
        <h2>Checkout form</h2>
      </div>

      <div class="row g-5">
        <div class="col-md-5 col-lg-4 order-md-last">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-primary">Your Product</span>
            <span class="badge bg-primary rounded-pill">{{ $carts }}</span>
          </h4>
          @php
              $total = 0
          @endphp
          <ul class="list-group mb-3">
            @foreach ($cart as $item)
            <li class="list-group-item d-flex lh-sm">
              <div class="d-flex justify-content-between">
                  @if (file_exists("storage/".$item->foto_produk))
                    <img class="img-fluid rounded-3 " src="/storage/{{ $item->foto_produk }}" width="40%" height="40%" alt="..." />
                  @endif
                  
                  <div class="mt-2">
                    <h6 class="my-0">{{ $item->nama_produk }}</h6>
                    <small class="text-muted">Brief description</small> <br> <br>
                    <span class="text-muted mt-2 text-end">Rp. {{ number_format($item->harga_produk) }}
                    {{-- x {{ $item->jumlah }} --}}
                    </span>
                    <span class="text-muted ms-4 text-end"> x{{ $item->jumlah }}
                    </span>
                  </div>
                </div>

              </li>
              @php
                  $total += ($item->harga_produk * $item->jumlah)
              @endphp
              @endforeach
              <li class="list-group-item d-flex justify-content-between">
                <span>Total (Rp)</span>
                <strong>Rp. {{ number_format($total) }}</strong>
              </li>
          </ul>

          {{-- <form class="card p-2">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Promo code">
              <button type="submit" class="btn btn-secondary">Redeem</button>
            </div>
          </form> --}}
        </div>

        <div class="col-md-7 col-lg-8">
          <h4 class="mb-3">Billing address</h4>
          @php
              $random = mt_rand(100, 9999);
          @endphp
          <form class="needs-validation" novalidate method="post" action="/checkout/create/{{ $random }}/{{ $total }}">
            @csrf
            <div class="row g-3">
              <div class="col-sm-6">
                <label for="firstName" class="form-label">First name</label>
                <input type="text" name="first_name" class="form-control" id="firstName" placeholder="" value="{{ auth()->user()->first_name }}" required>
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>

              <div class="col-sm-6">
                <label for="lastName" class="form-label">Last name</label>
                <input type="text" name="last_name" class="form-control" id="lastName" placeholder="" value="{{ auth()->user()->last_name }}" required>
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div>

              <div class="col-12">
                <label for="email" class="form-label">Email <span class="text-muted">(Optional)</span></label>
                <input type="email" name="email" class="form-control" id="email" value="{{ auth()->user()->email }}">
                <div class="invalid-feedback">
                  Please enter a valid email address for shipping updates.
                </div>
              </div>

              <div class="col-12">
                <label for="address" class="form-label">Address</label>
                <input type="text" name="address" class="form-control" id="address" placeholder="1234 Main St" required>
                <div class="invalid-feedback">
                  Please enter your shipping address.
                </div>
              </div>


            <hr class="my-4">

            <h4 class="mb-3">Payment</h4>

            <div class="my-3">
              <div class="form-check">
                <input id="credit" name="payment" type="radio" class="form-check-input" value="Credit card" checked required>
                <label class="form-check-label" for="credit">Cash</label>
              </div>
              <div class="form-check">
                <input id="debit" name="payment" type="radio" class="form-check-input" value="Debit card" required>
                <label class="form-check-label" for="debit">Debit card</label>
              </div>
            </div>

            <div class="row gy-3">
              <div class="col-md-6">
                <label for="cc-name" class="form-label">Name on card</label>
                <input type="text" name="name_card" class="form-control" id="cc-name" placeholder="" required>
                <small class="text-muted">Full name as displayed on card</small>
                <div class="invalid-feedback">
                  Name on card is required
                </div>
              </div>

              <div class="col-md-6">
                <label for="cc-number" class="form-label">Credit card number</label>
                <input type="text" name="number_card" class="form-control" id="cc-number" placeholder="" required>
                <div class="invalid-feedback">
                  Credit card number is required
                </div>
              </div>

            <hr class="my-4">

            <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to checkout</button>
          </form>
        </div>
      </div>
    </main>

    <footer class="my-5 pt-5 text-muted text-center text-small">
      <p class="mb-1">&copy; 2017–2021 Company Name</p>
      <ul class="list-inline">
        <li class="list-inline-item"><a href="#">Privacy</a></li>
        <li class="list-inline-item"><a href="#">Terms</a></li>
        <li class="list-inline-item"><a href="#">Support</a></li>
      </ul>
    </footer>
  </div>


  <script src="../asset1/dist/js/bootstrap.bundle.min.js"></script>

  <script src="form-validation.js"></script>

</body>
</html>
