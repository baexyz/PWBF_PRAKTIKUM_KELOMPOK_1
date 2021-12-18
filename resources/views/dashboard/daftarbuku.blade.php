@extends('layouts.dashboard')

@section('title', 'Manage Buku')

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

            <a role="button" class="btn btn-primary mt-2 mb-1" data-bs-toggle="modal" 
            data-bs-target="#tambahBukuModal">Tambah Buku</a>

            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Buku</th>
                  <th scope="col">Keterangan</th>
                  <th scope="col" colspan="2">Action</th>
                </tr>
              </thead>

              <tbody>
                  @foreach ($buku as $item)
                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td> 
                      <a href="/dashboard/buku/{{ $item->idbuku }}">{{ $item->buku }}</a> 
                    </td>
                    <td>{{ $item->keterangan }}</td>
                    <td>
                      <a role="button" class="btn btn-success updateBtn" data-bs-toggle="modal" 
                      data-bs-target="#updateBukuModal" data-id={{ $item->idbuku }}>
                        Update
                      </a>
                    </td>
                    <td>
                      <a role="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteBukuModal" 
                      data-id={{ $item->idbuku }} data-nama="{{ $item->buku }}">
                      Delete
                      </a>
                    </td>
                  </tr>
                  @endforeach  
              </tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
  </section>

{{-- Modal Tambah Buku --}}
<div class="modal fade" id="tambahBukuModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="color: #6ab04c">Tambah Data Buku</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="row g-3 needs-validation" id="formUpdate" action="buku/create" method="post">
          @csrf
          <div class="col-12">
            <label for="yourName" class="form-label">Judul Buku</label>
            <input type="text" name="buku" class="form-control" id="judul" required>
            <div class="invalid-feedback">Mohon input nama buku</div>
          </div>
      
          <div class="col-12">
            <label for="yourEmail" class="form-label">Keterangan</label>
            <textarea name="keterangan" class="form-control" id="keterangan" rows=3 required></textarea>
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
            <button class="btn btn-primary w-100" type="submit">Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

{{-- Modal Update Buku --}}
<div class="modal fade" id="updateBukuModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="color: #6ab04c">Update Data Buku</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="row g-3 needs-validation" id="formUpdate" action="buku/update/id" method="post">
          @csrf
          <div class="col-12">
            <label for="yourName" class="form-label">Judul Buku</label>
            <input type="text" name="buku" class="form-control" id="judul" required>
            <div class="invalid-feedback">Mohon input nama buku</div>
          </div>
      
          <div class="col-12">
            <label for="yourEmail" class="form-label">Keterangan</label>
            <textarea name="keterangan" class="form-control" id="keterangan" rows=3 required></textarea>
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
      </div>
    </div>
  </div>
</div>

{{-- Modal Delete Buku --}}
<div class="modal fade" id="deleteBukuModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirmation Dialog</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Apakah anda yakin untuk menghapus buku <b><span></span></b> ?
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

@section('customscript')
  @parent
  <script>
    $('.updateBtn').on('click', function() {
        var parent = $(this)
        var row = parent.closest('tr')
        var columns = row.find('td')
        var id = parent.data('id')
        var judul = row.find('a')[0].innerHTML
        var keterangan = columns[1].innerHTML
        $('#judul').val(judul)
        $('#keterangan').val(keterangan)
        $('#formUpdate').attr("action", "buku/update/"+id)

    })
    $('#deleteBukuModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var id = button.data('id')
      var nama = button.data('nama')
      var modal = $(this)
      modal.find('.modal-body span').text(nama)
      modal.find('.modal-footer a').attr("href", "buku/delete/"+id)
    })
  </script>
@endsection