@extends('layouts.dashboard')

@section('title','Update Buku')

@section('container')


<div class="pt-4 pb-2">
    <h5 class="card-title text-center pb-0 fs-4" style="color: #6ab04c">Update Data Buku</h5>
  </div>

  <form class="row g-3 needs-validation" action="/register" method="post">
    @csrf
    <div class="col-12">
      <label for="yourName" class="form-label">Judul Buku</label>
      <input type="text" name="buku" class="form-control" id="yourName" required>
      <div class="invalid-feedback">Mohon input nama buku</div>
    </div>

    <div class="col-12">
      <label for="yourEmail" class="form-label">Keterangan</label>
      <input type="text" name="keterangan" class="form-control" id="yourEmail" required>
      <div class="invalid-feedback">Mohon input keterangan buku</div>
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