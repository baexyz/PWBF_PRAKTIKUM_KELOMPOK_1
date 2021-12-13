@extends('layouts.dashboard')

@section('title','Update Pengurus')

@section('container')


<div class="pt-4 pb-2">
    <h5 class="card-title text-center pb-0 fs-4" style="color: #6ab04c">Update Data Pengurus</h5>
  </div>

  <form class="row g-3 needs-validation" action="/register" method="post">
    @csrf
    <div class="col-12">
      <label for="yourName" class="form-label">Nama</label>
      <input type="text" name="namasantri" class="form-control" id="yourName" required>
      <div class="invalid-feedback">Please, enter your name!</div>
    </div>

    <div class="col-12">
      <label for="yourEmail" class="form-label">Email</label>
      <input type="email" name="email" class="form-control" id="yourEmail" required>
      <div class="invalid-feedback">Please enter a valid Email adddress!</div>
    </div>
    
    {{-- jenis kelamin --}}
    <div class="col-12">
      <label for="yourUsername" class="form-label">Jenis Kelamin</label>
    <br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="M">
        <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="F">
        <label class="form-check-label" for="inlineRadio2">Perempuan</label>
      </div>
    </div>
    
    <div class="col-12">
      <label for="yourPassword" class="form-label">No Handphone</label>
      <input type="text" name="hp" class="form-control" id="yourPassword" required>
      <div class="invalid-feedback">TEMPLATE</div>
    </div>

    <div class="col-12">
    <label for="yourPassword" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="yourPassword" required>
      <div class="invalid-feedback">TEMPLATE</div>
    </div>
    
    <div class="col-12">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="acceptTerms" required>
        <label class="form-check-label" for="acceptTerms">Apakah anda yakin akan menyimpan perubahan?</label>
        <div class="invalid-feedback">You must agree before submitting.</div>
      </div>
    </div>
    <div class="col-12">
      <button class="btn btn-primary w-100" type="submit">Update</button>
    </div>
  </form>
    
@endsection