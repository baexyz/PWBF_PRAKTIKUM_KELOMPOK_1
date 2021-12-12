@extends('layouts.form')

@section('title','Halaman Login')

@section('form')
   

<div class="pt-4 pb-2">
  <h5 class="card-title text-center pb-0 fs-4" style="color: #6ab04c">Login to Your Account</h5>
  <p class="text-center small">Enter your email & password to login</p>
</div>

<form class="row g-3 needs-validation" action="/login" method="post">
  @csrf
  <div class="col-12">
    <label for="email" class="form-label">Email</label>
    <div class="input-group has-validation">
      <input type="text" name="email" class="form-control" id="email" required>
      <div class="invalid-feedback">Please enter your email.</div>
    </div>
  </div>

  <div class="col-12">
    <label for="password" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="password" required>
    <div class="invalid-feedback">Please enter your password!</div>
  </div>

  {{-- <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
      <label class="form-check-label" for="rememberMe">Remember me</label>
    </div>
  </div> --}}

   @if (session()->has('loginError'))
   <div class="alert alert-danger col-12" role="alert">
     EMAIl ATAU PASSWORD YANG ANDA MASUKKAN SALAH
  </div>
   @endif 

  <div class="col-12">
    <button class="btn btn-primary w-100" type="submit">Login</button>
  </div>
  <div class="col-12">
    <p class="small mb-0">Don't have account? <a href="/register" style="color: #6ab04c" >Create an account</a></p>
  </div>
</form>

@endsection