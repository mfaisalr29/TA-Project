@extends('layouts.main')

@section('container')
    <div class="container-fluid">
        <div class="container-fluid mt-5">
            <div class="row">
                <div class="col-md-3">
                    <div class="d-flex justify-content-center">
                        <nav style="--bs-breadcrumb-divider: '>'" aria-current="page">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">Home</li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="p-3 mb-2 sidebar-card card" style="background-color: #394E69; border-radius: 10px">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('img/Profile.png') }}" class="img-fluid mr-2" style="max-height : 100px; border-radius: 40px; padding : 10px">
                        <h5 class="mb-0 text-white">Nomor Rumah</h5>
                    </div>
                    <hr style="border-top: 2px solid #000000;">
                    <div class="p-2 mb-2">
                        <nav class="nav flex-column">
                            <a class="nav-link {{ ($title === 'Dashboard') ? 'active' : '' }}" href="/dashboardadmin">Dashboard</a>
                            <a class="nav-link {{ ($title === 'Tagihan IPL Admin') ? 'active' : '' }}" href="/tagihanipladmin">Tagihan IPL</a>
                            <a class="nav-link {{ ($title === 'Kondisi Air dan Alat') ? 'active' : '' }}" href="/kondisi">Kondisi Air dan Alat</a>
                            <a class="nav-link {{ ($title === 'Daftar Akun Warga') ? 'active' : '' }}" href="/daftarwarga">Daftar Akun Warga</a>
                            <a class="nav-link {{ ($title === 'Profile Admin') ? 'active' : '' }}" href="/profileadmin">Profile</a>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div class="card">
                    <div class="card-body" style="background-color: #394E69; border-radius: 10px; color: white;">
                        <h3 class="text-center">Masukkan Data Warga</h3>
                        <form>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control input-custom" id="nama" placeholder="Masukkan nama warga">
                            </div>
                            <div class="mb-3">
                                <label for="noRumah" class="form-label">No. Rumah</label>
                                <input type="text" class="form-control input-custom" id="noRumah" placeholder="Masukkan No. Rumah">
                            </div>
                            <div class="mb-3">
                                <label for="blok" class="form-label">Blok</label>
                                <select class="form-select input-custom" id="blok">
                                    <option selected>Pilih blok tempat tinggal warga</option>
                                    <option value="1">Blok A</option>
                                    <option value="2">Blok B</option>
                                    <option value="3">Blok C</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="noHP" class="form-label">No. HP</label>
                                <input type="text" class="form-control input-custom" id="noHP" placeholder="Masukkan nomor HP warga">
                            </div>
                            <button type="submit" class="btn btn-custom" style="background-color: #28a745; border: none;">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
