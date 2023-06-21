@extends('pageadmin.template')

@section('container')
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" /> 

  {{-- table produk --}}
  <div class="container-fluid px-4">
    <h1 class="mt-4">My Profil</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active">My Profil</li>
    </ol>
  </div>

  <div class="container">
    <div class="card">
      <h5 class="card-header">My Profil</h5>
      <div class="card-body">
        <form action="/user/update/{{ $user->id }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">First Name</label>
            <input type="text" name="first_name" class="form-control" value="{{ $user->first_name }}">
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Last Name</label>
            <input type="text" name="last_name" class="form-control" value="{{ $user->last_name }}">
          </div>
          <div class="mb-3">
            <label for="" class="form-label">Level</label>
            <select class="form-select" aria-label="Default select example" name="level" required>
              <option selected value="{{ $user->level }}">{{ $user->level }}</option>
              <option value="admin">Admin</option>
              <option value="Member">Member</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="text" name="email" class="form-control" value="{{ $user->email }}">
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