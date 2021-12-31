@extends('layouts.dashboard')

@section('container')

@section('title', 'Detail Kemajuan')


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
            <h5 class="card-title">Detail kemajuan santri <b>{{ $namasantri }}</b></h5>
            @can('isGuru')
            <a role="button" class="btn btn-primary mb-2" data-bs-toggle="modal" 
            data-bs-target="#tambahDetailKemajuanModal" >Tambah Data</a> 
            @endcan
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Pengurus</th>
                  <th scope="col">Buku</th>
                  <th scope="col">Bab</th>
                  <th scope="col">Keterangan</th>
                  <th scope="col">Status</th>
                  <th scope="col">Tanggal Input</th>
                  @can('isGuru')
                  <th scope="col">Action</th>
                  @endcan
                </tr>
              </thead>

              <tbody>
                @foreach ($kemajuan as $item)
                  @php
                    $bab = $item->detailkemajuan()->first()->bab()->first();
                    $buku = $bab->buku()->first();
                  @endphp
                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->pengurus()->first()->nama }}</td>
                    <td>{{ $buku->buku }}</td>
                    <td>{{ $bab->bab }}</td>
                    <td>{{ $item->detailkemajuan()->first()->keterangan }}</td>
                    <td>{{ $item->status }}</td>
                    <td style='white-space: nowrap'>{{ $item->detailkemajuan()->first()->created_at }}</td>
                    @can('isGuru')
                      @if ($item->idpengurus == auth()->user()->idpengurus)
                        <td style='white-space: nowrap'>
                          <a role="button" class="btn btn-success btn-block updateBtn" data-bs-toggle="modal"
                          data-id={{ $item->idkemajuan }} data-idbab={{ $bab->idbab }} 
                          data-idbuku={{ $bab->idbuku }} data-bs-target="#updateDetailKemajuanModal">
                            Update
                          </a>
                          <a role="button" class="btn btn-warning btn-block" data-bs-toggle="modal" 
                          data-bs-target="#fileDetailKemajuanModal">
                            File
                          </a>
                          <a role="button" class="btn btn-danger btn-block" data-bs-toggle="modal" 
                          data-id={{ $item->idkemajuan }} data-bs-target="#deleteDetailKemajuanModal">
                            Delete
                          </a>
                        </td>                      
                      @else
                        <td>No Action</td>
                      @endif
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


      {{-- Modal Tambah DetailKemajuan --}}
<div class="modal fade" id="tambahDetailKemajuanModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="color: #6ab04c">Tambah Data Detail Kemajuan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="row g-3 needs-validation" id="formCreate" action="../kemajuan/create" method="post">
          @csrf
          <input type="hidden" name="idsantri" value="{{ $idsantri }}">
          <div class="col-12">
            <label for="yourName" class="form-label">Pilih Buku</label>
            <select class="form-select listbuku" onchange="getDataBab(this, 'tambah');">
              <option selected></option>
            </select>
          </div>

          <div class="col-12">
            <label for="yourName" class="form-label">Pilih Bab</label>
            <select class="form-select" id="tambah" name="idbab">
              <option selected></option>
            </select>
          </div>

          <div class="col-12">
            <label for="yourName" class="form-label">Keterangan</label>
            <textarea class="form-control" id="message-text" name="keterangan"></textarea>
          </div>

          {{-- <div class="col-12">
            <label for="yourName" class="form-label">Upload File</label>
            <br>
            <form action="/action_page.php">
              <input type="file" id="myFile" name="filename">
            </form>
            </select>
          </div>
          <br> --}}    

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


    {{-- Modal Update DetailKemajuan --}}
<div class="modal fade" id="updateDetailKemajuanModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="color: #6ab04c">Update Data Detail Kemajuan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="row g-3 needs-validation" id="formUpdate" action="/" method="post">
          @csrf
          <div class="col-12">
            <label for="yourName" class="form-label">Pilih Buku</label>
            <select class="form-select listbuku" id="bukuedit" onchange="getDataBab(this, 'edit');">
              <option value="0" selected></option>
            </select>
          </div>

          <div class="col-12">
            <label for="yourName" class="form-label">Pilih Bab</label>
            <select class="form-select" name="idbab" id="edit">
              <option selected></option>
            </select>
          </div>

          <div class="col-12">
            <label for="yourName" class="form-label">Keterangan</label>
            <textarea class="form-control" id="keterangan" name="keterangan"></textarea>
            </select>
          </div>

          <!-- <div class="col-12">
            <label for="yourName" class="form-label">Upload File</label>
            <br>
            <form action="/action_page.php">
              <input type="file" id="myFile" name="filename">
            </form>
            </select>
          </div> -->
          <br>
          <br>
          
          
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
        Apakah anda yakin untuk menghapus data detail kemajuan? 
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
    var idbab
    var urlbuku = '/dashboard/buku/list'
    var urlbab = '/dashboard/buku/listbab/'
    //Get buku
    $.ajax({
      url: urlbuku,
      type: 'get',
      success: function(data){
        $.each(data, function(key, obj){
          var id = obj['idbuku']
          var nama = obj['buku']
          $('.listbuku').append($('<option>', {
              value: id,
              text: nama
          }))
        })
      }
    })

    function getDataBab(sel, idbab) {
      // alert( this.value );
      var idbuku = sel.value
      var a = "#" + idbab
      $.ajax({
        url: urlbab + idbuku,
        type: 'get',
        success: function(data){
          $(a).html("")     
          $.each(data, function(key, obj){
            var id = obj['idbab']
            var nama = obj['judul']
            $(a).append($('<option>', {
              value: id,
              text: nama
            }))            
          })
          $(a + ' option[value='+idbab+']').prop('selected', true)
        }
      });
    }

    $('.updateBtn').on('click', function() {
        var parent = $(this)
        var row = parent.closest('tr')
        var columns = row.find('td')
        var id = parent.data('id')
        var idbuku = parent.data('idbuku').toString()
        idbab = parent.data('idbab')
        var keterangan = columns[3].innerHTML
        $('#keterangan').val(keterangan)
        $('#bukuedit option[value='+idbuku+']').prop('selected', true).trigger('change')
        $('#formUpdate').attr("action", "../kemajuan/update/"+id)
    })

    $('#updateDetailKemajuanModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var id = button.data('id')
      var idbuku = button.data('idbuku')
      var idbab = button.data('idbab')
      var modal = $(this)
      modal.find('.modal-footer a').attr("href", "../kemajuan/delete/"+id)
    })

    $('#deleteDetailKemajuanModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var id = button.data('id')
      var modal = $(this)
      modal.find('.modal-footer a').attr("href", "../kemajuan/delete/"+id)
    })
  </script>    
@endsection