@extends('layouts.dashboard')

@section('container')

<div class="pagetitle">
  <h1>{{ $judul }}</h1>
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

            @can('isStaff')
            <a role="button" class="btn btn-primary mt-3 mb-1" data-bs-toggle="modal" 
            data-bs-target="#tambahBabModal" >Tambah Data</a> 
            @endcan

            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">Bab</th>
                  <th scope="col">Judul</th>
                  <th scope="col">Keterangan</th>
                  @can('isStaff')
                    <th scope="col" colspan="2">Action</th>
                  @endcan
                </tr>
              </thead>
              <tbody>
                  @foreach ($bab as $item) 
                  <tr>
                    <th scope="row">{{ $item->bab }}</th>
                    {{-- <td>{{ $item->bab }}</td> --}}
                    <td>{{ $item->judul }}</td>
                    <td>{{ $item->keterangan }}</td>
                    @can('isStaff')
                      <td>
                        <a role="button" class="btn btn-success updateBtn" data-bs-toggle="modal" 
                        data-bs-target="#updateBabModal" data-id={{ $item->idbab }}>
                          Update
                        </a>
                      </td>
                      <td>
                        <a role="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteBabModal" 
                        data-id={{ $item->idbab }} data-nama="{{ $item->judul }}">
                          Delete
                        </a>
                      </td>
                    @endcan
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

  {{-- Modal Tambah Bab --}}
<div class="modal fade" id="tambahBabModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="color: #6ab04c">Tambah Data Bab</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="row g-3 needs-validation" action="../bab/create" method="post">
          @csrf
          
          <input type="hidden" name='idbuku' value="{{ $idbuku }}">

          <div class="col-12">
            <label for="yourName" class="form-label">Nomor Bab</label>
            <input type="text" name="bab" class="form-control" required>
            <div class="invalid-feedback">Mohon input nomor bab</div>
          </div>

          <div class="col-12">
            <label for="yourName" class="form-label">Judul Bab</label>
            <input type="text" name="judul" class="form-control" required>
            <div class="invalid-feedback">Mohon input nama bab</div>
          </div>
      
          <div class="col-12">
            <label for="yourEmail" class="form-label">Keterangan</label>
            <textarea name="keterangan" class="form-control" rows=3 required></textarea>
            <div class="invalid-feedback">Mohon input keterangan bab</div>
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


{{-- Modal Update Bab --}}
<div class="modal fade" id="updateBabModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="color: #6ab04c">Update Data Bab</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="row g-3 needs-validation" id="formUpdate" action="../bab/update/id" method="post">
          @csrf
          <div class="col-12">
            <label for="yourName" class="form-label">Judul Bab</label>
            <input type="text" name="judul" class="form-control" id="judul" required>
            <div class="invalid-feedback">Mohon input nama bab</div>
          </div>
      
          <div class="col-12">
            <label for="yourEmail" class="form-label">Keterangan</label>
            <textarea name="keterangan" class="form-control" id="keterangan" rows=3 required></textarea>
            <div class="invalid-feedback">Mohon input keterangan bab</div>
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

{{-- Modal Delete Bab --}}
<div class="modal fade" id="deleteBabModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirmation Dialog</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Apakah anda yakin untuk menghapus bab <b><span></span></b> ?
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

@section('scripts')
  @parent
  <script>
    $(function(){
      $(document).ready(function(){
        $(document).on('click', '.updateBtn', function(){
          var parent = $(this)
          var row = parent.closest('tr')
          var columns = row.find('td')
          var id = parent.data('id')
          var judul = columns[0].innerHTML
          var keterangan = columns[1].innerHTML
          $('#judul').val(judul)
          $('#keterangan').val(keterangan)
          $('#formUpdate').attr("action", "../bab/update/"+id)
        });
      });
    });

    $('#deleteBabModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var id = button.data('id')
      var nama = button.data('nama')
      var modal = $(this)
      modal.find('.modal-body span').text(nama)
      modal.find('.modal-footer a').attr("href", "../bab/delete/"+id)
    })
  </script>
@endsection