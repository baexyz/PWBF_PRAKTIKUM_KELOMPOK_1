@extends('layouts.dashboard')

@section('container')


<div class="pagetitle">
    <h1>Data Tables</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Tables</li>
        <li class="breadcrumb-item active">Data</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">

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
            data-bs-target="#tambahDetailKemajuanModal" >Tambah Data</a> 

            <h5 class="card-title">Detail Kemajuan</h5>
            <p> Berikut adalah Detail Kemajuan dari siswa <b> NAMA SISWA</b> </p>
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Buku</th>
                  <th scope="col">Bab</th>
                  <th scope="col">Keterangan</th>
                  <th scope="col" colspan="2">Action</th>
                </tr>
              </thead>

              <tbody>

                  {{-- @foreach ($bab as $item)
                  
                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->bab }}</td>
                    <td>{{ $item->judul }}</td>
                    <td>{{ $item->keterangan }}</td>
                  </tr>
                  
                  @endforeach --}}
                  
                  <tr>
                    <th scope="row">1</th>
                    <td>Lorem ipsum</td>
                    <td>1</td>
                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae odio voluptas aperiam vitae iure repellat harum, voluptatum necessitatibus numquam esse?</td>
                    <td>
                      <a href="#" class="btn btn-success" data-bs-toggle="modal" 
                      data-bs-target="#updateDetailKemajuanModal">
                        Update
                      </a>
                    </td>

                    <td>
                    <a href="#" class="btn btn-warning" data-bs-toggle="modal" 
                    data-bs-target="#fileDetailKemajuanModal">
                      File
                    </a>
                  </td>

                    <td>
                      <a href="#" class="btn btn-danger" data-bs-toggle="modal" 
                      data-bs-target="#deleteDetailKemajuanModal">
                        Delete
                      </a>
                    </td>
                  </tr>
                
              </tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
  </section>


      {{-- Modal Tambah DetailKemajuan --}}
<div class="modal fade" id="tambahDetailKemajuanModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="color: #6ab04c">Tambah Data Detail Kemajuan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="row g-3 needs-validation" id="formUpdate" action="kemajuan/create" method="post">
          @csrf

          <div class="col-12">
            <label for="yourName" class="form-label">Pilih Buku</label>
            <select class="form-select" aria-label="Default select example">
              <option selected></option>
              <option value="1">Buku 1</option>
              <option value="2">Buku 2</option>
              <option value="3">Buku 3 </option>
            </select>
          </div>

          <div class="col-12">
            <label for="yourName" class="form-label">Pilih Bab</label>
            <select class="form-select" aria-label="Default select example">
              <option selected></option>
              <option value="1">Bab 1</option>
              <option value="2">Bab 2</option>
              <option value="3">Bab 3 </option>
            </select>
          </div>

          <div class="col-12">
            <label for="yourName" class="form-label">Keterangan</label>
            <textarea class="form-control" id="message-text"></textarea>
            </select>
          </div>

          <div class="col-12">
            <label for="yourName" class="form-label">Upload File</label>
            <br>
            <form action="/action_page.php">
              <input type="file" id="myFile" name="filename">
            </form>
            </select>
          </div>
          <br>
          <br>
          
          
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


    {{-- Modal Update DetailKemajuan --}}
<div class="modal fade" id="updateDetailKemajuanModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="color: #6ab04c">Update Data Detail Kemajuan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="row g-3 needs-validation" id="formUpdate" action="kemajuan/create" method="post">
          @csrf

          <div class="col-12">
            <label for="yourName" class="form-label">Pilih Buku</label>
            <select class="form-select" aria-label="Default select example">
              <option selected></option>
              <option value="1">Buku 1</option>
              <option value="2">Buku 2</option>
              <option value="3">Buku 3 </option>
            </select>
          </div>

          <div class="col-12">
            <label for="yourName" class="form-label">Pilih Bab</label>
            <select class="form-select" aria-label="Default select example">
              <option selected></option>
              <option value="1">Bab 1</option>
              <option value="2">Bab 2</option>
              <option value="3">Bab 3 </option>
            </select>
          </div>

          <div class="col-12">
            <label for="yourName" class="form-label">Keterangan</label>
            <textarea class="form-control" id="message-text"></textarea>
            </select>
          </div>

          <div class="col-12">
            <label for="yourName" class="form-label">Upload File</label>
            <br>
            <form action="/action_page.php">
              <input type="file" id="myFile" name="filename">
            </form>
            </select>
          </div>
          <br>
          <br>
          
          
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


{{-- Modal File DetailKemajuan --}}
<div class="modal fade" id="fileDetailKemajuanModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="color: #6ab04c">File Detail Kemajuan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p> Silahkan klik tombol download untuk mengunduh file<a href="#" role="button" class="btn btn-secondary popover-test" title="Popover title" data-bs-content="Popover body content is set in this attribute.">Download</a></p>
        <hr>
        </div>
    </div>
  </div>
</div>

{{-- Modal Delete Kemajuan --}}
<div class="modal fade" id="deleteDetailKemajuanModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirmation Dialog</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Apakah anda yakin untuk menghapus data detail kemajuan? <b><span></span></b> 
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