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
              <h5 class="card-title">Datatables</h5>
              <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">No HP</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Status</th>
                    <th scope="col">Peran</th>
                  </tr>
                </thead>

                <tbody>

                    @foreach ($pengurus as $item)
                    
                    <tr>
                      <th scope="row">{{ $loop->iteration }}</th>
                      <td>{{ $item->nama }}</td>
                      <td>{{ $item->email }}</td>
                      <td>{{ $item->hp }}</td>
                      <td>{{ $item->gender }}</td>
                      <td>{{ $item->aktif }}</td>
                      <td>{{ $item->detailperan()->first()->peran()->first()->peran }}</td>
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