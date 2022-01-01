@extends('layouts.dashboard')

@section('title', 'User Profile')

@section('container')

  <div class="pagetitle">
    <h1>Profile</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Dashboard</a></li>
        <li class="breadcrumb-item">Profile</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section profile">
    <div class="row">
      <div class="col-xl-4">

        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

            <img src="{{ $user->profile_pic ?: "/img/dashboard/profile-img.jpg"}}" alt="Profile" class="rounded-circle">
            <h2>{{ $user->namasantri }}</h2>
            <h3>Santri</h3>
          </div>
        </div>

      </div>

      <div class="col-xl-8">

        <div class="card">
          <div class="card-body pt-3">
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

            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">

              <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Detail Profile</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
              </li>
              
              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-photo">Upload Photo</button>
              </li>

            </ul>
            <div class="tab-content pt-2">

              <div class="tab-pane fade show active profile-overview" id="profile-overview">

                <h5 class="card-title">Profile User</h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Full Name</div>
                  <div class="col-lg-9 col-md-8">{{ $user->namasantri }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Gender</div>
                  <div class="col-lg-9 col-md-8">{{ $user->gender == 'M' ? 'Male' : 'Female' }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Tanggal Lahir</div>
                  <div class="col-lg-9 col-md-8">{{ $user->tanggallhr }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Kota Lahir</div>
                  <div class="col-lg-9 col-md-8">{{ $user->kotalhr }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Nama Orang Tua</div>
                  <div class="col-lg-9 col-md-8">{{ $user->namaortu }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Alamat Orang Tua</div>
                  <div class="col-lg-9 col-md-8">{{ $user->alamatortu }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Phone</div>
                  <div class="col-lg-9 col-md-8">{{ $user->hp }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Email</div>
                  <div class="col-lg-9 col-md-8">{{ $user->email }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Tanggal Masuk</div>
                  <div class="col-lg-9 col-md-8">{{ $user->tanggalmasuk }}</div>
                </div>

              </div>

              <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                <!-- Profile Edit Form -->
                <form method="post">
                  @csrf

                  <div class="row mb-3">
                    <label class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="namasantri" type="text" class="form-control" value="{{ $user->namasantri }}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label class="col-md-4 col-lg-3 col-form-label">Gender</label>
                    <div class="col-md-8 col-lg-9">
                      <select class="form-select" id="tambah" name="gender">
                        <option value='M' {{ $user->gender == 'M' ? 'selected' : ''}}>Male</option>
                        <option value='F' {{ $user->gender == 'F' ? 'selected' : ''}}>Female</option>
                      </select>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label class="col-md-4 col-lg-3 col-form-label">Tanggal Lahir</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="tanggallhr" type="date" class="form-control" value="{{ $user->tanggallhr }}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label class="col-md-4 col-lg-3 col-form-label">Kota Lahir</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="kotalhr" type="text" class="form-control" value="{{ $user->kotalhr }}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label class="col-md-4 col-lg-3 col-form-label">Nama Orang Tua</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="namaortu" type="text" class="form-control" value="{{ $user->namaortu }}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label class="col-md-4 col-lg-3 col-form-label" style="white-space: nowrap;">Alamat Orang Tua</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="alamatortu" type="text" class="form-control" value="{{ $user->alamatortu }}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label class="col-md-4 col-lg-3 col-form-label">Nomor Hp</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="hp" type="tel" class="form-control" value="{{ $user->hp }}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label class="col-md-4 col-lg-3 col-form-label">Email</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="email" type="email" class="form-control" value="{{ $user->email }}">
                    </div>
                  </div>
       
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                  </div>
                </form><!-- End Profile Edit Form -->

              </div>

              <div class="tab-pane fade profile-photo pt-3" id="profile-photo">

                <!-- Profile Photo Form -->
                <form method="post" action="profile/photo" enctype="multipart/form-data">
                  @csrf
                  <div class="mb-3">
                    <input class="form-control" type="file" id="formFile" name="image" >
                  </div>
       
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Upload Photo</button>
                  </div>
                </form><!-- End Profile photo Form -->

              </div>

            </div><!-- End Bordered Tabs -->

          </div>
        </div>

      </div>
    </div>
  </section>

@endsection