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
           
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">Bab</th>
                  <th scope="col">Judul</th>
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
                    <td>Lorem ipsum dolor sit.</td>
                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident, similique magni sit nostrum distinctio neque maxime expedita fugit ratione, dicta consectetur architecto inventore, veritatis exercitationem quis cum iure quae a!</td>
                    <td>
                      <a href="#" class="btn btn-success">
                        Update
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