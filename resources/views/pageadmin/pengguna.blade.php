@extends('pageadmin.template')

@section('container')
{{-- <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />  --}}

  {{-- table produk --}}
  <div class="container-fluid px-4">
    <h1 class="mt-4">Pengguna</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active">Data Pengguna</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Pengguna
        </div>
        <div class="card-body">
          {{-- <a href="portofolio\add" class="btn btn-primary btn-sm mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">New Data</a> --}}
          <table id="datatablesSimple" class="table table-striped">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Email</th>
                      <th>Level</th>
                      {{-- <th></th> --}}
                  </tr>
              </thead>
              <tfoot>
                  <tr>
                    <th>No</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Level</th>
                    {{-- <th></th> --}}
                  </tr>
              </tfoot>
              <tbody>
                @foreach ($user as $item)
                  <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $item->first_name }}</td>
                      <td>{{ $item->last_name }}</td>
                      <td>{{ $item->email }}</td>
                      <td>{{ $item->level }}</td>
                      {{-- <td><img src="/storage/{{ $item->foto_produk }}" alt="" width="100" height="100"></td> --}}
                  </tr>
                @endforeach
              </tbody>
          </table>
        </div>
    </div>
  </div>
  
  {{-- modal tambah produk --}}
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
              <label for="exampleInputEmail1" class="form-label">Kode Produk</label>
              <input type="text" name="kode_produk" class="form-control" >
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Nama Produk</label>
              <input type="text" name="nama_produk" class="form-control">
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Kategori</label>
              <select class="form-select" aria-label="Default select example" name="kategori" required>
                <option value="sepatu">Sepatu</option>
                <option value="baju">Baju</option>
                <option value="tas">Tas</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Harga Produk</label>
              <input type="text" name="harga_produk" class="form-control">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Deskripsi Produk</label>
              <input type="text" name="deskripsi_produk" class="form-control">
            </div>
            <div class="mb-3">
              <label for="formFile" class="form-label">Foto Produk</label>
              <input class="form-control" name="foto_produk" type="file" id="formFile">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="{{ asset('asset2/js/scripts.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
@endsection