@extends('layouts.form')

@section('title','Halaman Register')

@section('form')


<div class="pt-4 pb-2">
    <h5 class="card-title text-center pb-0 fs-4" style="color: #6ab04c">Pendaftaran Santri</h5>
    <p class="text-center small">Masukan Data Diri Santri</p>
  </div>

  <form class="row g-3 needs-validation" action="/register" method="post" enctype="multipart/form-data">
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
      <label for="yourUsername" class="form-label">Tanggal Lahir</label>
      <div class="input-group has-validation">
        <input type="date" name="tanggallhr" class="form-control" id="yourUsername" required>
        <div class="invalid-feedback">Please enter a city</div>
      </div>
    </div>
    
    <div class="col-12">
      <label for="yourUsername" class="form-label">Kota Lahir</label>
      <div class="input-group has-validation">
        <input type="text" name="kotalhr" class="form-control" id="yourUsername" required>
        <div class="invalid-feedback">Please enter a city</div>
      </div>
    </div>

    <div class="col-12">
      <label for="yourPassword" class="form-label">No Handphone</label>
      <input type="text" name="hp" class="form-control" id="yourPassword" required>
      <div class="invalid-feedback">TEMPLATE</div>
    </div>

    <div class="col-12">
      <label for="yourUsername" class="form-label">Tanggal Masuk</label>
      <div class="input-group has-validation">
        <input type="date" name="tanggalmasuk" class="form-control" id="yourUsername" required>
        <div class="invalid-feedback">Please enter a city</div>
      </div>
    </div>

    <div class="col-12">
      <label for="yourPassword" class="form-label">Nama Orang Tua</label>
      <input type="text" name="namaortu" class="form-control" id="yourPassword" required>
      <div class="invalid-feedback">TEMPLATE</div>
    </div>

    <div class="col-12">
    <label for="yourPassword" class="form-label">Alamat Orang Tua</label>
    <input type="text" name="alamatortu" class="form-control" id="yourPassword" required>
      <div class="invalid-feedback">TEMPLATE</div>
    </div>
    
    <div class="col-12">
    <label for="yourPassword" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="yourPassword" required>
      <div class="invalid-feedback">TEMPLATE</div>
    </div>

    <div class="mb-3">
      <label for="formFile" class="form-label">Pilih Foto</label>
      <input class="form-control" type="file" id="formFile">
    </div>
    
    <div class="col-12">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="acceptTerms" required>
        <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
        <div class="invalid-feedback">You must agree before submitting.</div>
      </div>
    </div>
    <div class="col-12">
      <button class="btn btn-primary w-100" type="submit">Create Account</button>
    </div>
    <div class="col-12">
      <p class="small mb-0">Already have an account? <a href="pages-login.html">Log in</a></p>
    </div>
  </form>
    
@endsection