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
            
            <a href="#" class="btn btn-primary mt-3 mb-1">Tambah Buku</a>

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
                    <td> <a href="/dashboard/buku/{{ $item->idbuku }}"> {{ $item->buku }} </a> </td>
                    <td>{{ $item->keterangan }}</td>
                    <td>
                      <a href="/updatebuku" class="btn btn-success">
                        Update
                      </a>
                    </td>
                    <td>
                      <a href="#" class="btn btn-danger">
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

@endsection