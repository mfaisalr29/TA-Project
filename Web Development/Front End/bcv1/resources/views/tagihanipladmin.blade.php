@extends('layouts.main')

@section('container')
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

                <div class="p-3 mb-2" style="background-color: #394E69; border-radius: 10px">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('img/Profile.png') }}" class="img-fluid mr-2" style="max-height : 100px; border-radius: 40px; padding : 10px">
                        <h5 class="mb-0 text-white">Nomor Rumah</h5>
                    </div>
                    <hr style="border-top: 2px solid #000000;">
                    <div class="p-2 mb-2">
                        <nav class="nav flex-column">
                            <a class="nav-link {{ ($title === "Dashboard") ? 'active' : ''}}" href="/dashboardadmin">Dashboard</a>
                            <a class="nav-link {{ ($title === "Tagihan IPL Admin") ? 'active' : ''}}" href="/tagihanipladmin">Tagihan IPL</a>
                            <a class="nav-link {{ ($title === "Kondisi Air dan Alat") ? 'active' : ''}}" href="/kondisi">Kondisi Air dan Alat</a>
                            <a class="nav-link {{ ($title === "Daftar Akun Warga") ? 'active' : ''}}" href="/daftarwarga">Daftar Akun Warga</a>
                            <a class="nav-link {{ ($title === "Profile Admin") ? 'active' : ''}}" href="/profileadmin">Profile</a>
                          </nav>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div class="mt-4">
                    <h1 class="fs-4">Selamat Datang, *Nama Admin</h1>
                    <h2 class="small text-muted fs-6">
                       *Hari, Tanggal Bulan Tahun
                    </h2>

                    <nav class="main-nav d-flex justify-content-between mt-5">
                        <form action="">
                            <div class="input-group border">
                                <button class="btn search-btn" type="button" id="buttonSearchTable">
                                    <i class="bi bi-search"></i>
                                </button>
                                <input type="text" class="form-control search-input" placeholder="Search ..." aria-label="Example text with button addon" aria-describedby="buttonSearchTable">
                            </div>
                        </form>
                        <div class="d-flex gap-4">
                            <a href="#" class="btn btn-light border">
                                <div class="d-flex">
                                    <i class="bi bi-funnel me-2"></i>
                                    <span>Filter</span>
                                </div>
                            </a>
                            <a href="#" class="btn btn-light border">
                                <div class="d-flex">
                                    <i class="bi bi-box-arrow-up me-2"></i>
                                    <span>Export</span>
                                </div>
                            </a>
                        </div>
                    </nav>

                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col">Tahun</th>
                                            <th scope="col">Bulan</th>
                                            <th scope="col">Meter Awal</th>
                                            <th scope="col">Meter Akhir</th>
                                            <th scope="col">Tagihan</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">2023</th>
                                            <td>Januari</td>
                                            <td>10 M<sup>3</sup></td>
                                            <td>80 M<sup>3</sup></td>
                                            <td>Rp400.000</td>
                                            <td>
                                                <a href="/tagihan" class="btn btn-sm btn-info">Edit</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2023</th>
                                            <td>Januari</td>
                                            <td>10 M<sup>3</sup></td>
                                            <td>80 M<sup>3</sup></td>
                                            <td>Rp400.000</td>
                                            <td>
                                                <a href="/tagihan" class="btn btn-sm btn-info">Edit</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2023</th>
                                            <td>Januari</td>
                                            <td>10 M<sup>3</sup></td>
                                            <td>80 M<sup>3</sup></td>
                                            <td>Rp400.000</td>
                                            <td>
                                                <a href="/tagihan" class="btn btn-sm btn-info">Edit</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2023</th>
                                            <td>Januari</td>
                                            <td>10 M<sup>3</sup></td>
                                            <td>80 M<sup>3</sup></td>
                                            <td>Rp400.000</td>
                                            <td>
                                                <a href="/tagihan" class="btn btn-sm btn-info">Edit</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2023</th>
                                            <td>Januari</td>
                                            <td>10 M<sup>3</sup></td>
                                            <td>80 M<sup>3</sup></td>
                                            <td>Rp400.000</td>
                                            <td>
                                                <a href="/tagihan" class="btn btn-sm btn-info">Edit</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2023</th>
                                            <td>Januari</td>
                                            <td>10 M<sup>3</sup></td>
                                            <td>80 M<sup>3</sup></td>
                                            <td>Rp400.000</td>
                                            <td>
                                                <a href="/tagihan" class="btn btn-sm btn-info">Edit</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2023</th>
                                            <td>Januari</td>
                                            <td>10 M<sup>3</sup></td>
                                            <td>80 M<sup>3</sup></td>
                                            <td>Rp400.000</td>
                                            <td>
                                                <a href="/tagihan" class="btn btn-sm btn-info">Edit</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2023</th>
                                            <td>Januari</td>
                                            <td>10 M<sup>3</sup></td>
                                            <td>80 M<sup>3</sup></td>
                                            <td>Rp400.000</td>
                                            <td>
                                                <a href="/tagihan" class="btn btn-sm btn-info">Edit</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2023</th>
                                            <td>Januari</td>
                                            <td>10 M<sup>3</sup></td>
                                            <td>80 M<sup>3</sup></td>
                                            <td>Rp400.000</td>
                                            <td>
                                                <a href="/tagihan" class="btn btn-sm btn-info">Edit</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2023</th>
                                            <td>Januari</td>
                                            <td>10 M<sup>3</sup></td>
                                            <td>80 M<sup>3</sup></td>
                                            <td>Rp400.000</td>
                                            <td>
                                                <a href="/tagihan" class="btn btn-sm btn-info">Edit</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2023</th>
                                            <td>Januari</td>
                                            <td>10 M<sup>3</sup></td>
                                            <td>80 M<sup>3</sup></td>
                                            <td>Rp400.000</td>
                                            <td>
                                                <a href="/tagihan" class="btn btn-sm btn-info">Edit</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2023</th>
                                            <td>Januari</td>
                                            <td>10 M<sup>3</sup></td>
                                            <td>80 M<sup>3</sup></td>
                                            <td>Rp400.000</td>
                                            <td>
                                                <a href="/tagihan" class="btn btn-sm btn-info">Edit</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
@endsection
