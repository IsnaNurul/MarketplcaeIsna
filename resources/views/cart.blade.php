<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
        #navbar {
        background-color: #3b6bbd;
        box-shadow: 0px 3px 3px #888888;
      }
        #header {
            background-color: #e1c5c5;
        }
        /* #body {
            background-color: #f0f0f0;
        } */
        body{margin-top:20px;
        background:#eee;
        }
        h3 {
            font-size: 16px;
        }
        .text-navy {
            color: #1ab394;
        }
        .cart-product-imitation {
        text-align: center;
        padding-top: 30px;
        height: 80px;
        width: 80px;
        background-color: #f8f8f9;
        }
        .product-imitation.xl {
        padding: 120px 0;
        }
        .product-desc {
        padding: 20px;
        position: relative;
        }
        .ecommerce .tag-list {
        padding: 0;
        }
        .ecommerce .fa-star {
        color: #d1dade;
        }
        .ecommerce .fa-star.active {
        color: #f8ac59;
        }
        .ecommerce .note-editor {
        border: 1px solid #e7eaec;
        }
        table.shoping-cart-table {
        margin-bottom: 0;
        }
        table.shoping-cart-table tr td {
        border: none;
        text-align: right;
        }
        table.shoping-cart-table tr td.desc,
        table.shoping-cart-table tr td:first-child {
        text-align: left;
        }
        table.shoping-cart-table tr td:last-child {
        width: 80px;
        }
        .ibox {
        clear: both;
        margin-bottom: 25px;
        margin-top: 0;
        padding: 0;
        }
        .ibox.collapsed .ibox-content {
        display: none;
        }
        .ibox:after,
        .ibox:before {
        display: table;
        }
        .ibox-title {
        -moz-border-bottom-colors: none;
        -moz-border-left-colors: none;
        -moz-border-right-colors: none;
        -moz-border-top-colors: none;
        background-color: #ffffff;
        border-color: #e7eaec;
        border-image: none;
        border-style: solid solid none;
        border-width: 3px 0 0;
        color: inherit;
        margin-bottom: 0;
        padding: 14px 15px 7px;
        min-height: 48px;
        }
        .ibox-content {
        background-color: #ffffff;
        color: inherit;
        padding: 15px 20px 20px 20px;
        border-color: #e7eaec;
        border-image: none;
        border-style: solid solid none;
        border-width: 1px 0;
        }
        .ibox-footer {
        color: inherit;
        border-top: 1px solid #e7eaec;
        font-size: 90%;
        background: #ffffff;
        padding: 10px 15px;
        }

    </style>
</head>
<body>
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

    <div class="container py-5">
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row d-flex justify-content-center">
                <div class="col-md-10">
                    <div class="ibox">
                        <div class="ibox-title">
                            <span class="pull-right">(<strong>{{ $carts }}</strong>) items</span>
                            <h5>Items in your cart</h5>
                        </div>
                        @php
                            $total = 0
                        @endphp
                            
                        @foreach ($cart as $item)
                            <div class="ibox mb-0">
                                <div class="ibox-content p-4">
                                    <div class="row d-flex justify-content-between align-items-center">
                        
                                        <div class="col-md-2 col-lg-2 col-xl-2 ms-4">
                                            @if (file_exists("storage/".$item->foto_produk))
                                            <img class="img-fluid rounded-3 mb-4" src="/storage/{{ $item->foto_produk }}" width="100%" height="100%" alt="..." />
                                            @endif
                                        </div>

                                        <div class="col-md-3 col-lg-3 col-xl-3">
                                            <p class="lead fw-normal mb-2 text-navy">{{ $item->nama_produk }}</p>
                                            <p><span class="text-muted">Kategori: </span>{{ $item->kategori }}
                                            <div class="m-t-sm">                                                |
                                                <a href="/cart/delete/{{ $item->id }}" class="text-muted"><i class="fa fa-trash"></i> Remove item</a>
                                            </div>
                                        </div>
                                        
                                        {{-- <div class="col-md-1 col-lg-1 col-xl-1 d-flex">
                                            <button id="form1" class="btn btn-outline-dark">{{ $item->jumlah }}</button>                                           
                                        </div> --}}
                                        <div class="col-md-2 col-lg-2 col-xl-2 d-flex">
                                            <form action="/detail/create/{{ $item->kode_produk}}" method="post">
                                                @csrf
                                                <div class="d-flex justify-content-beetwen">
                                                    <button class="btn px-2"
                                                        onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                        <i class="fa fa-minus-circle" aria-hidden="true"></i>
                                                    </button>
                                    
                                                    <input id="form1" min="0" name="jumlah" value="{{ $item->jumlah }}" type="number" class="form-control form-control-sm ms-2 me-2" />
                                  
                                                    <button class="btn px-2"
                                                        onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
    
                                            <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                <h5 class="mb-0">Rp. {{ number_format($item->jumlah_harga) }}</h5> 
                                            </div>
                                        
                                        {{-- <div class="ibox-footer text-end">
                                            <div class="d-flex justify-content-end">
                                                <button class="btn"><a href="/cart/delete/{{ $item->id }}" class="btn btn-danger btn-sm me-3 mt-3"><i class="fa fa-trash"></i> Remove</a></button>
                                                <button class="btn"><a href="/checkout/{{ $item->kode_produk }}" class="btn btn-success btn-sm me-3 mt-3"><i class="fa fa-shopping-cart"></i> Checkout</a></button>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                            @php
                                $total += ($item->harga_produk * $item->jumlah)
                            @endphp
                            @endforeach
                            
                            <div class="ibox-footer text-end">
                                {{-- <h5 class="me-3">Total : Rp. {{ $item->total_harga }}</h5> --}}
                                {{-- <h5 class="me-3">Total : Rp. {{ number_format($item->total_harga, 2) }}</h5> --}}
                                {{-- <h5 class="me-3">Total : Rp. {{ $pesanan }}</h5> --}}
                                <h5 class="me-3">Total : Rp. {{number_format ($total) }}</h5>
                                
                            </div>
                            
                            <div class="row">
                                <div class="col col-md-6">
                        
                                </div>
                                <div class="col col-md-6">
                                    <div class="m-t-sm d-flex justify-content-end">
                                        <div class="btn-group mt-3">
                                            <div class="d-flex justify-content-end">
                                                <button class="btn"><a href="/page" class="btn btn-dark btn-sm me-3"><i class="fa fa-arrow-left"></i> Go Back </a></button>
                                                 <button class="btn"><a href="/checkout" class="btn btn-primary btn-sm me-3"><i class="fa fa-shopping-cart"></i> Checkout</a></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>