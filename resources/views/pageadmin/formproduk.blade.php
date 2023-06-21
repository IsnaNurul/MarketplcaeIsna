@extends('pageadmin.template')

@section('container')
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" /> 

  {{-- table produk --}}
  <div class="container-fluid px-4">
    <h1 class="mt-4">Product</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active">Data Product</li>
    </ol>
  </div>

  <div class="container">
    <div class="card">
      <h5 class="card-header">Data Produk</h5>
      <div class="card-body">
        <form action="/produk/update/{{ $produk->id }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Kode Produk</label>
            <input type="text" name="kode_produk" class="form-control" value="{{ $produk->kode_produk }}" readonly>
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama Produk</label>
            <input type="text" name="nama_produk" class="form-control" value="{{ $produk->nama_produk }}">
          </div>
          <div class="mb-3">
            <label for="" class="form-label">Kategori</label>
            <select class="form-select" aria-label="Default select example" name="kategori" required>
              <option selected>{{ $produk->kategori }}</option>
              <option value="sepatu">Sepatu</option>
                <option value="baju">Baju</option>
                <option value="tas">Tas</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Harga Produk</label>
            <input type="text" name="harga_produk" class="form-control" value="{{ $produk->harga_produk }}">
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Deskripsi Produk</label>
            <input type="text" name="deskripsi_produk" class="form-control" value="{{ $produk->deskripsi_produk }}">
          </div>
          <div class="mb-3">
            <label for="formFile" class="form-label">Foto Produk</label>
            <br>
            @if (file_exists("storage/".$produk->foto_produk))
              <img src="/storage/{{ $produk->foto_produk }}" alt="" width="100" height="100">
            @endif
            <input class="form-control mt-3" name="foto_produk" type="file" id="formFile" value="{{ $produk->foto_produk }}">
          </div>
          <div class="mb-3">
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="{{ asset('asset2/js/scripts.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
  <script src="{{ asset('asset2/js/datatables-simple-demo.js') }}"></script>
@endsection