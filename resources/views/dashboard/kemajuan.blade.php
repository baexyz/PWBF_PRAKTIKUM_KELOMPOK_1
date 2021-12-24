@extends('layouts.dashboard')

@section('title', 'Kemajuan')

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
            data-bs-target="#tambahKemajuanModal" >Tambah Data</a> 

            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nama Santri</th>
                  <th scope="col">Input Data Terakhir</th>
                  <th scope="col">Status</th>
                  <th scope="col">Detail</th>
                  {{-- <th scope="col">Action</th> --}}
                </tr>
              </thead>

              <tbody>

                  @foreach ($kemajuan as $i)
                    @php
                        $item = $i[0];
                        $santri = $item->santri()->first();
                    @endphp
                  
                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $santri->namasantri }}</td>
                    <td>{{ $item->tanggal }}</td>
                    <td>{{ $item->status }}</td>
                    <td>
                      <a href="/dashboard/santri/{{ $santri->idsantri }}" class="btn btn-primary">Detail</a>
                      {{-- <a role="button" class="btn btn-primary detailBtn" data-bs-toggle="modal" 
                        data-bs-target="#detailKemajuanModal" data-id={{ $item->idkemajuan }}>
                        Detail
                      </a> --}}
                    </td>
                    {{-- <td>
                      <a role="button" class="btn btn-success updateBtn" data-bs-toggle="modal" 
                        data-bs-target="#updateKemajuanModal" data-id={{ $item->idkemajuan }}>
                        Update
                      </a>
                      
                      @can('isStaff')
                      <a role="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteKemajuanModal" 
                      data-id={{ $item->idkemajuan }} data-nama="{{ $santri->namasantri }}">
                      Delete
                      </a>
                      @endcan

                    </td> --}}
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

  {{-- Modal Tambah Kemajuan --}}
<div class="modal fade" id="tambahKemajuanModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="color: #6ab04c">Tambah Data Kemajuan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="row g-3 needs-validation" id="formCreate" action="kemajuan/create" method="post">
          @csrf
          
          <div class="col-12">
            <label for="yourName" class="form-label">Nama Santri</label>
            <select class="form-select" id="listsantri" name="idsantri" aria-label="List Bab">
              <option selected>Input Santri</option>
            </select>
          </div>

          <div class="col-12">
            <label for="yourName" class="form-label">Pilih Buku</label>
            <select class="form-select" id="listbuku" onchange="getDataBab(this);" aria-label="List Buku">
              <option selected>Input Buku</option>
            </select>
          </div>

          <div class="col-12">
            <label for="yourName" class="form-label">Pilih Bab</label>
            <select class="form-select" id="listbab" name="idbab" aria-label="List Bab">
              <option selected>Input Bab</option>
            </select>
          </div>

          <div class="col-12">
            <label for="yourName" class="form-label">Keterangan</label>
            <textarea class="form-control" id="message-text" name="keterangan"></textarea>
          </div>

          <div class="col-12">
            <label for="yourUsername" class="form-label">Status</label>
          <br>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="status" value="N">
              <label class="form-check-label">Naik</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="status" value="T">
              <label class="form-check-label">Turun</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="status" value="M">
              <label class="form-check-label">Mundur</label>
            </div>
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


{{-- Modal Update Kemajuan --}}
<div class="modal fade" id="updateKemajuanModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="color: #6ab04c">Update Data Kemajuan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="row g-3 needs-validation" id="formUpdate" action="kemajuan/update/id" method="post">
          @csrf
          <div class="col-12">

            <label for="yourName" class="form-label">Nama Santri</label>
            <input type="text" name="namasantri" class="form-control" id="namasantri" required>
            <div class="invalid-feedback">Silahkan input nama santri</div>
          </div>

          <div class="col-12">
            <label for="yourName" class="form-label">Nama Pengurus</label>
            <input type="text" name="namasantri" class="form-control" id="namapengurus" required>
            <div class="invalid-feedback">Silahkan input nama pengurus</div>
          </div>
      
          <div class="col-12">
            <label for="yourUsername" class="form-label">Status</label>
          <br>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="gender" id="naik" value="M">
              <label class="form-check-label" for="inlineRadio1">Naik</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="gender" id="turun" value="F">
              <label class="form-check-label" for="inlineRadio2">Turun</label>
            </div>
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

{{-- Modal Delete Kemajuan --}}
<div class="modal fade" id="deleteKemajuanModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirmation Dialog</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Apakah anda yakin untuk menghapus data kemajuan dari santri <b><span></span></b> ?
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
    var urlsantri = '/dashboard/santri/list'
    var urlbuku = '/dashboard/buku/list'
    var urlbab = '/dashboard/buku/listbab/'
    var urlkemajuan = '/dashboard/kemajuan/'

    // $('.detailBtn').on('click', function() {
    //     var id = $(this).data('id')
    //     $.ajax({
    //       url: urlkemajuan + id,
    //       type: 'get',
    //       success: function(data){

    //       }
    //     })        
    //     $('#judul').val(judul)
    //     $('#keterangan').val(keterangan)
    //     $('#formUpdate').attr("action", "buku/update/"+id)

    // })

    // $('#detailKemajuanModal').on('show.bs.modal', function (event) {
    //   var button = $(event.relatedTarget)
    //   var id = button.data('id')
    //   var nama = button.data('nama')
    //   var modal = $(this)
    //   modal.find('.modal-body span').text(nama)
    //   modal.find('.modal-footer a').attr("href", "kemajuan/delete/"+id)
    // })

    //Get Santri
    $.ajax({
        url: urlsantri,
        type: 'get',
        success: function(data){
          $.each(data, function(key, obj){
            var id = obj['idsantri']
            var nama = obj['namasantri']
            $('#listsantri').append($('<option>', {
                value: id,
                text: nama
            }))
          })
        }
    })

    //Get buku
    $.ajax({
        url: urlbuku,
        type: 'get',
        success: function(data){
          $.each(data, function(key, obj){
            var id = obj['idbuku']
            var nama = obj['buku']
            $('#listbuku').append($('<option>', {
                value: id,
                text: nama
            }))
          })
        }
    })

    function getDataBab(sel) {
      // alert( this.value );
      var idbuku = sel.value
      $.ajax({
        url: urlbab + idbuku,
        type: 'get',
        success: function(data){
          $('#listbab').html("<option selected>Input Bab</option>")     
          $.each(data, function(key, obj){
            var id = obj['idbab']
            var nama = obj['judul']
            $('#listbab').append($('<option>', {
                value: id,
                text: nama
            }))
          })
        }
      });
    }
    
    // $('#deleteKemajuanModal').on('show.bs.modal', function (event) {
    //   var button = $(event.relatedTarget)
    //   var id = button.data('id')
    //   var nama = button.data('nama')
    //   var modal = $(this)
    //   modal.find('.modal-body span').text(nama)
    //   modal.find('.modal-footer a').attr("href", "kemajuan/delete/"+id)
    // })
  </script>    
@endsection