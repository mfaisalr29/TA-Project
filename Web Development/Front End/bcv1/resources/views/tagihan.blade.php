@extends('layouts.main')

@section('container')
<div class="container-fluid">
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-3">
                <div class="d-flex justify-content-center">
                    <nav style="--bs-breadcrumb-divider: '>'" aria-current="page">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                               Home
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                               {{ $title }}
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
        <div class="row">
            <div class="col-md-3">
                <div class="p-3 mb-2" style="background-color: #394E69; border-radius: 10px">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('img/Profile.png') }}" class="img-fluid mr-2" style="max-height : 100px; border-radius: 40px; padding : 10px">
                        <h5 class="mb-0 text-white">Nomor Rumah</h5>
                    </div>
                    <hr style="border-top: 2px solid #000000;">
                    <div class="p-2 mb-2">
                        <nav class="nav flex-column">
                            <a class="nav-link {{ ($title === "Dashboard") ? 'active' : ''}}" href="/dashboard">Dashboard</a>
                            <a class="nav-link {{ ($title === "Input Tagihan") ? 'active' : ''}}" href="/tagihanipladmin">Tagihan IPL</a>
                            <a class="nav-link {{ ($title === "Kondisi Air dan Alat") ? 'active' : ''}}" href="/kondisi">Kondisi Air dan Alat</a>
                            <a class="nav-link {{ ($title === "Daftar Akun Warga") ? 'active' : ''}}" href="#">Daftar Akun Warga</a>
                            <a class="nav-link {{ ($title === "Profile Admin") ? 'active' : ''}}" href="/profileadmin">Profile</a>
                          </nav>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div class="card card-tagihan-ipl">
                    <div class="card-title">
                        Masukan Tagihan IPL
                    </div>
                    <div class="card-body">
                        <form action="">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="blockInput" placeholder="Masukan blok" />
                                        <label for="blockInput">Blok</label>
                                    </div>
                
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="noHomeInput" placeholder="Masukan nomor rumah" />
                                        <label for="noHomeInput">Nomor Rumah</label>
                                    </div>
                
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Rp</span>
                                        <div class="form-floating">
                                            <input type="number" class="form-control" id="nominalInput"  placeholder="Masukan nominal" />
                                            <label for="nominalInput">Nominal</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="tanggalInput" class="form-label">Tanggal</label>
                                        <input type="date" class="form-control form-date" id="tanggalInput" placeholder="name@example.com" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="meterAwalInput">Meter Awal</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" placeholder="Masukan meter awal" aria-label="Meter Awal" aria-describedby="meterAwalInput" />
                                            <span class="input-group-text" id="meterAwalInput">M<sup>3</sup></span>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="meterAkhirInput">Meter Akhir</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" placeholder="Masukan meter akhir" aria-label="Meter Akhir" aria-describedby="meterAkhirInput" />
                                            <span class="input-group-text" id="meterAkhirInput">M<sup>3</sup></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-2 d-flex justify-content-center">
                                <button class="btn btn-success btn-outline">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
