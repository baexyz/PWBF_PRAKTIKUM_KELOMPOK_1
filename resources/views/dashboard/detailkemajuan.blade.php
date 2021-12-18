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
            <h5 class="card-title">Detail Kemajuan</h5>
            <p> Berikut adalah Detail Kemajuan dari siswa <b> NAMA SISWA</b> </p>
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Guru</th>
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
                    <td>NAMA GURU</td>
                    <td>Lorem ipsum</td>
                    <td>1</td>
                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae odio voluptas aperiam vitae iure repellat harum, voluptatum necessitatibus numquam esse?</td>
                    <td>
                      <a href="#" class="btn btn-success">
                        Update
                      </a>
                    </td>

                    <td>
                    <a href="#" class="btn btn-warning">
                      File
                    </a>
                  </td>

                    <td>
                      <a href="#" class="btn btn-danger">
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


@endsection