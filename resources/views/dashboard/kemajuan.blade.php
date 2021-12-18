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
            <a href="#" class="btn btn-primary mt-3 mb-1">Tambah Data</a>

            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nama Santri</th>
                  <th scope="col">Nama Pengurus</th>
                  <th scope="col">Tanggal</th>
                  <th scope="col">Status</th>
                  <th scope="col">Detail</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>

              <tbody>

                  @foreach ($kemajuan as $item)
                  
                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->santri()->first()->namasantri }}</td>
                    <td>{{ $item->pengurus()->first()->nama }}</td>
                    <td>{{ $item->tanggal }}</td>
                    <td>{{ $item->status }}</td>
                    <td><a href="/dashboard/kemajuan/1" class="btn btn-primary">Detail</a></td>
                    <td>
                      <a href="#" class="btn btn-success">
                        Update
                      </a>
                      
                      @can('isStaff')
                      <a href="#" class="btn btn-danger">
                        Delete
                      </a>
                      @endcan

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


@endsection