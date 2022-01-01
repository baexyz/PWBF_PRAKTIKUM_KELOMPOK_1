@extends('layouts.dashboard')

@section('title', 'Santri')

@section('container')

@php
    function isAktif($aktif) {
      if ($aktif)
        return 'Aktif';
      else
        return 'Tidak Aktif';          
    }
@endphp

<div class="pagetitle">
    <h1>Data Santri</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item">Santri</li>
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
              data-bs-target="#tambahSantriModal" >Tambah Data</a> 
            @endcan

            <!-- Table with stripped rows -->
            <div style="overflow-x: scroll">
              <table class="table" id="tablesantri">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Santri</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Kota</th>
                    <th scope="col">Nama Walisiswa</th>
                    <th scope="col">Alamat Walisiswa</th>
                    <th scope="col">No Handphone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Tanggal Masuk</th>
                    <th scope="col">Status</th>
                    @can('isStaff')
                      <th scope="col" colspan="2">Action</th>
                    @endcan
                  </tr>
                </thead>

                <tbody>

                    @foreach ($santri as $item)
                    
                    <tr>
                      <th scope="row">{{ $loop->iteration }}</th>
                      <td class="namasantri">{{ $item->namasantri }}</td>
                      <td class="gender">{{ $item->gender }}</td>
                      <td class="tanggallhr">{{ $item->tanggallhr }}</td>
                      <td class="kotalhr">{{ $item->kotalhr }}</td>
                      <td class="namaortu">{{ $item->namaortu }}</td>
                      <td class="alamatortu">{{ $item->alamatortu }}</td>
                      <td class="hp">{{ $item->hp }}</td>
                      <td class="email">{{ $item->email }}</td>
                      <td>{{ $item->tanggalmasuk }}</td>
                      <td>{{ isAktif($item->aktif) }}</td>
                      @can('isStaff')
                        <td>
                          <a role="button" class="btn btn-success updateBtn" data-bs-toggle="modal" 
                          data-bs-target="#updateSantriModal"  data-id={{ $item->idsantri }}>
                            Update
                          </a>
                        </td>
                        <td>
                          <a role="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteSantriModal" 
                          data-id={{ $item->idsantri }} data-nama="{{ $item->namasantri }}">
                            Delete
                          </a>
                        </td>
                      @endcan
                    </tr>
                    
                    @endforeach

                  
                </tbody>
              </table>
            </div>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
  </section>

@can('isStaff')
  {{-- Modal Tambah Santri --}}
  <div class="modal fade" id="tambahSantriModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" style="color: #6ab04c">Tambah Data Santri</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="row g-3 needs-validation" action="santri/create" method="post">
            @csrf
            
            <div class="col-12">
              <label class="form-label">Nama Santri</label>
              <input type="text" name="namasantri" class="form-control"  required>
              <div class="invalid-feedback">Silahkan input nama santri</div>
            </div>
        
            <div class="col-12">
              <label class="form-label">Email Santri</label>
              <input type="email" name="email" class="form-control"  required>
              <div class="invalid-feedback">Silahkan input email santri</div>
            </div>
            
            {{-- jenis kelamin --}}
            <div class="col-12">
              <label class="form-label">Jenis Kelamin</label>
            <br>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender"  value="M">
                <label class="form-check-label">Laki-Laki</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender"  value="F">
                <label class="form-check-label">Perempuan</label>
              </div>
            </div>
            
            <div class="col-12">
              <label class="form-label">Tanggal Lahir</label>
              <div class="input-group has-validation">
                <input type="date" name="tanggallhr" class="form-control"  required>
                <div class="invalid-feedback">Silahkan input tanggal lahir santri</div>
              </div>
            </div>
            
            <div class="col-12">
              <label class="form-label">Kota Lahir</label>
              <div class="input-group has-validation">
                <input type="text" name="kotalhr" class="form-control"  required>
                <div class="invalid-feedback">Silahkan input kota lahir santri</div>
              </div>
            </div>
        
            <div class="col-12">
              <label class="form-label">No Handphone</label>
              <input type="text" name="hp" class="form-control"  required>
              <div class="invalid-feedback">Silahkan input nomor handphone santri</div>
            </div>
        
            <div class="col-12">
              <label class="form-label">Tanggal Masuk</label>
              <div class="input-group has-validation">
                <input type="date" name="tanggalmasuk" class="form-control"  required>
                <div class="invalid-feedback">Silahkan input tanggal masuk santri</div>
              </div>
            </div>
        
            <div class="col-12">
              <label class="form-label">Nama Orang Tua</label>
              <input type="text" name="namaortu" class="form-control"  required>
              <div class="invalid-feedback">Silahkan input nama orang tua santri</div>
            </div>
        
            <div class="col-12">
            <label class="form-label">Alamat Orang Tua</label>
            <input type="text" name="alamatortu" class="form-control"  required>
              <div class="invalid-feedback">Silahkan input alamat orang tua santri</div>
            </div>
            
            <div class="col-12">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control"  required>
              <div class="invalid-feedback">Silahkan input password santri</div>
            </div>
            
            <div class="col-12">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="acceptTerms" required>
                <label class="form-check-label" >Apakah anda yakin akan menambahkan data?</label>
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


  {{-- Modal Update Santri --}}
  <div class="modal fade" id="updateSantriModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" style="color: #6ab04c">Update Data Santri</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="row g-3 needs-validation" id="formUpdate" action="santri/update/id" method="post">
            @csrf
            <div class="col-12">
              <label for="yourName" class="form-label">Nama Santri</label>
              <input type="text" name="namasantri" class="form-control" id="namasantri" required>
              <div class="invalid-feedback">Silahkan input nama santri</div>
            </div>
        
            <div class="col-12">
              <label for="yourEmail" class="form-label">Email Santri</label>
              <input type="email" name="email" class="form-control" id="email" required>
              <div class="invalid-feedback">Silahkan input email santri</div>
            </div>
            
            {{-- jenis kelamin --}}
            <div class="col-12">
              <label class="form-label">Jenis Kelamin</label>
            <br>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="lakilaki" value="M">
                <label class="form-check-label">Laki-Laki</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="perempuan" value="F">
                <label class="form-check-label">Perempuan</label>
              </div>
            </div>
            
            <div class="col-12">
              <label class="form-label">Tanggal Lahir</label>
              <div class="input-group has-validation">
                <input type="date" name="tanggallhr" class="form-control" id="tanggallhr" required>
                <div class="invalid-feedback">Silahkan input tanggal lahir santri</div>
              </div>
            </div>
            
            <div class="col-12">
              <label class="form-label">Kota Lahir</label>
              <div class="input-group has-validation">
                <input type="text" name="kotalhr" class="form-control" id="kotalhr" required>
                <div class="invalid-feedback">Silahkan input kota lahir santri</div>
              </div>
            </div>
        
            <div class="col-12">
              <label class="form-label">No Handphone</label>
              <input type="text" name="hp" class="form-control" id="hp" required>
              <div class="invalid-feedback">Silahkan input nomor handphone santri</div>
            </div>
        
            <div class="col-12">
              <label class="form-label">Nama Orang Tua</label>
              <input type="text" name="namaortu" class="form-control" id="namaortu" required>
              <div class="invalid-feedback">Silahkan input nama orang tua santri</div>
            </div>
        
            <div class="col-12">
            <label class="form-label">Alamat Orang Tua</label>
            <input type="text" name="alamatortu" class="form-control" id="alamatortu" required>
              <div class="invalid-feedback">Silahkan input alamat orang tua santri</div>
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

  {{-- Modal Delete Santri --}}
  <div class="modal fade" id="deleteSantriModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Confirmation Dialog</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Apakah anda yakin untuk menghapus data santri <b><span></span></b> ?
        </div>
        <div class="modal-footer">
          <a type="button" class="btn btn-danger" href="">Delete</a>
          {{-- <button type="button" class="btn btn-danger" onclick="window.location.href='/logout'">Delete</button> --}}
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>
@endcan
    
@endsection

@section('scripts')
    @parent
    <script>
      const dataTable = new simpleDatatables.DataTable("#tablesantri", {
	    searchable: true,
    	fixedHeight: false,
      })
      @can('isStaff')
        $(function(){
          $(document).ready(function(){
            $(document).on('click', '.updateBtn', function(){
              var parent = $(this)
              var row = parent.closest('tr')
              var columns = row.find('td')
              var id = parent.data('id')
              $('#namasantri').val(columns[0].innerHTML)
              $('#tanggallhr').val(columns[2].innerHTML)
              $('#kotalhr').val(columns[3].innerHTML)
              $('#namaortu').val(columns[4].innerHTML)
              $('#alamatortu').val(columns[5].innerHTML)
              $('#hp').val(columns[6].innerHTML)
              $('#email').val(columns[7].innerHTML)
              if (columns[1].innerHTML == 'M') 
                $('#lakilaki').prop('checked', true)
              else
                $('#perempuan').prop('checked', true)
              $('#formUpdate').attr("action", "santri/update/"+id)
            });
          });
        });

        $('#deleteSantriModal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var id = button.data('id')
          var nama = button.data('nama')
          var modal = $(this)
          modal.find('.modal-body span').text(nama)
          modal.find('.modal-footer a').attr("href", "santri/delete/"+id)
        })
      @endcan
    </script>
@endsection