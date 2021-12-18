@extends('layouts.dashboard')

@section('title', 'Dashboard Pengurus')

@section('container')

<div class="pagetitle">
  <h1>Daftar Pengurus</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
      <li class="breadcrumb-item active">Pengurus</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">

  <div class="row">
    <div>

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Seluruh Pengurus</h5>
          
          @if (session()->has('success'))
            <div class="alert alert-success mt-2" role="alert">
              {{ session('success') }}
            </div>            
            @endif
            @if (session()->has('error'))
            <div class="alert alert-danger mt-2" role="alert">
              {{ session('error') }}
            </div>            
            @endif

            <a role="button" class="btn btn-primary mt-3 mb-1" data-bs-toggle="modal" 
            data-bs-target="#tambahPengurusModal" >Tambah Data</a> 
          

          <!-- Table with hoverable rows -->
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Gender</th>
                <th scope="col">Peran</th>
                <th scope="col">Email</th>
                <th scope="col">HP</th>
                <th scope="col">Created at</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($pengurus as $item)
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->gender }}</td>
                <td>{{ $item->detailperan()->first()
                  ->peran()->first()->peran }}
                </td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->hp }}</td>
                <td>{{ $item->created_at }}</td>
                
                <td>
                  <a role="button" class="btn btn-success updateBtn" data-bs-toggle="modal" 
                  data-bs-target="#updatePengurusModal" data-id={{ $item->idsantri }}>
                    Update
                  </a>
                </td>
                <td>
                  <a role="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deletePengurusModal" 
                  data-id={{ $item->idbab }} data-nama="{{ $item->judul }}">
                    Delete
                  </a>
                </td>
                
                </td>
              </tr>                  
              @endforeach              
            </tbody>
          </table>
          <!-- End Table with hoverable rows -->

        </div>
      </div>

    </div>
  </div>
</section>

{{-- Modal Tambah Pengurus --}}
<div class="modal fade" id="tambahPengurusModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="color: #6ab04c">Tambah Data Pengurus</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="row g-3 needs-validation" id="formUpdate" action="pengurus/create" method="post">
          @csrf
          
          <div class="col-12">
            <label for="yourName" class="form-label">Nama Pengurus</label>
            <input type="text" name="namasantri" class="form-control" id="" required>
            <div class="invalid-feedback">Silahkan input nama pengurus</div>
          </div>
      
          <div class="col-12">
            <label for="yourEmail" class="form-label">Email Pengurus</label>
            <input type="email" name="email" class="form-control" id="" required>
            <div class="invalid-feedback">Silahkan input email Pengurus</div>
          </div>
          
          {{-- jenis kelamin --}}
          <div class="col-12">
            <label for="yourUsername" class="form-label">Jenis Kelamin</label>
          <br>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="gender" id="" value="M">
              <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="gender" id="" value="F">
              <label class="form-check-label" for="inlineRadio2">Perempuan</label>
            </div>
          </div>
          
          <div class="col-12">
            <label for="yourPassword" class="form-label">No Handphone</label>
            <input type="text" name="hp" class="form-control" id="" required>
            <div class="invalid-feedback">Silahkan input nomor handphone pengurus</div>
          </div>
    
          <div class="col-12">
          <label for="yourPassword" class="form-label">Password</label>
          <input type="password" name="password" class="form-control" id="" required>
            <div class="invalid-feedback">Silahkan input password pengurus</div>
          </div>
          
          <div class="col-12">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="acceptTerms" required>
              <label class="form-check-label" for="acceptTerms">Apakah anda yakin akan menambahkan data?</label>
              <div class="invalid-feedback">Silahkan klik kolom persetujuan terlebih dahulu</div>
            </div>
          </div>
          <div class="col-12">
            <button class="btn btn-primary w-100" type="submit">Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


{{-- Modal Update Pengurus --}}
<div class="modal fade" id="updatePengurusModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="color: #6ab04c">Update Data Pengurus</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="row g-3 needs-validation" id="formUpdate" action="pengurus/update/id" method="post">
          @csrf
          <div class="col-12">
            <label for="yourName" class="form-label">Nama Pengurus</label>
            <input type="text" name="namasantri" class="form-control" id="namap" required>
            <div class="invalid-feedback">Silahkan input nama pengurus</div>
          </div>
      
          <div class="col-12">
            <label for="yourEmail" class="form-label">Email Pengurus</label>
            <input type="email" name="email" class="form-control" id="emailp" required>
            <div class="invalid-feedback">Silahkan input email Pengurus</div>
          </div>
          
          {{-- jenis kelamin --}}
          <div class="col-12">
            <label for="yourUsername" class="form-label">Jenis Kelamin</label>
          <br>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="gender" id="lakilakip" value="M">
              <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="gender" id="perempuanp" value="F">
              <label class="form-check-label" for="inlineRadio2">Perempuan</label>
            </div>
          </div>
          
          <div class="col-12">
            <label for="yourPassword" class="form-label">No Handphone</label>
            <input type="text" name="hp" class="form-control" id="nohpp" required>
            <div class="invalid-feedback">Silahkan input nomor handphone pengurus</div>
          </div>
    
          <div class="col-12">
          <label for="yourPassword" class="form-label">Password</label>
          <input type="password" name="password" class="form-control" id="passwordp" required>
            <div class="invalid-feedback">Silahkan input password pengurus</div>
          </div>
          
          <div class="col-12">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="acceptTerms" required>
              <label class="form-check-label" for="acceptTerms">Apakah anda yakin akan menyimpan perubahan?</label>
              <div class="invalid-feedback">Silahkan klik kolom persetujuan terlebih dahulu</div>
            </div>
          </div>
          <div class="col-12">
            <button class="btn btn-primary w-100" type="submit">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

{{-- Modal Delete Pengurus --}}
<div class="modal fade" id="deletePengurusModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirmation Dialog</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Apakah anda yakin untuk menghapus data pengurus? <b><span></span></b> 
      </div>
      <div class="modal-footer">
        <a type="button" class="btn btn-danger" href="">Delete</a>
        {{-- <button type="button" class="btn btn-danger" onclick="window.location.href='/logout'">Delete</button> --}}
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

@endsection