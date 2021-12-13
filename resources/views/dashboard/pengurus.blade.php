@extends('layouts.dashboard')

@section('title', 'Dashboard Pengurus')

@section('container')

<div class="pagetitle">
  <h1>Daftar Pengurus</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
      <li class="breadcrumb-item active">Pengurus</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">

  <div class="row">
    <div>

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Seluruh Pengurus</h5>
          <a href="#" class="btn btn-primary mt-3 mb-1">Tambah Data</a>
          

          <!-- Table with hoverable rows -->
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Gender</th>
                <th scope="col">Peran</th>
                <th scope="col">Email</th>
                <th scope="col">HP</th>
                <th scope="col">Created at</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($pengurus as $item)
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->gender }}</td>
                <td>{{ $item->detailperan()->first()
                  ->peran()->first()->peran }}
                </td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->hp }}</td>
                <td>{{ $item->created_at }}</td>
                <td>
                  <a href="/updatepengurus" class="btn btn-success">
                    Update
                  </a>
                  <td><a href="/remove/{{ $item->idpengurus }}" class="btn btn-danger">
                    Delete 
                  </a>
                  </td>
                </td>
              </tr>                  
              @endforeach              
            </tbody>
          </table>
          <!-- End Table with hoverable rows -->

        </div>
      </div>

    </div>
  </div>
</section>

@endsection