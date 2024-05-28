@extends('layouts.main')

@section('container')
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

            <div class="p-3 mb-2" style="background-color: #394E69; border-radius: 10px">
                <div class="d-flex align-items-center">
                    <img src="{{ asset('img/Profile.png') }}" class="img-fluid mr-2" style="max-height: 100px; border-radius: 40px; padding: 10px">
                    <h5 class="mb-0 text-white" id="nomor-rumah-title">Nomor Rumah</h5>
                </div>
                <hr style="border-top: 2px solid #000000;">
                <div class="p-2 mb-2">
                    <nav class="nav flex-column">
                        <a class="nav-link {{ ($title === "Dashboard") ? 'active' : ''}}" href="/dashboardadmin">Dashboard</a>
                        <a class="nav-link {{ ($title === "Lihat Tagihan IPL") ? 'active' : ''}}" href="/tagihanipladmin">Lihat Tagihan IPL</a>
                        <a class="nav-link {{ ($title === "Input Tagihan IPL") ? 'active' : ''}}" href="/tagihan">Input Tagihan IPL</a>
                        <a class="nav-link {{ ($title === "Kondisi Air dan Alat") ? 'active' : ''}}" href="/kondisi">Kondisi Air dan Alat</a>
                        <a class="nav-link {{ ($title === "Daftar Akun Warga") ? 'active' : ''}}" href="/daftarwarga">Daftar Akun Warga</a>
                        <a class="nav-link {{ ($title === "Profile Admin") ? 'active' : ''}}" href="/profileadmin">Profile</a>
                    </nav>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="mt-4">
                <h1 class="fs-4" id="admin-name">Selamat Datang</h1>
                <h2 class="small text-muted fs-6" id="current-date">*Hari, Tanggal Bulan Tahun</h2>

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
                                        <th scope="col">Nama</th>
                                        <th scope="col">Nomor Kavling</th>
                                        <th scope="col">Meter Awal</th>
                                        <th scope="col">Meter Akhir</th>
                                        <th scope="col">Tagihan</th>
                                    </tr>
                                </thead>
                                <tbody id="bill-table-body">
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
<script>
    $(document).ready(function() {
        // Fetch admin data
        $.ajax({
            url: '/api/admin/data',
            type: 'POST',
            headers: {
                'Authorization': 'Bearer ' + localStorage.getItem('token')
            },
            success: function(response) {
                $('#admin-name').text('Selamat Datang, ' + response.nama);
                $('#current-date').text(response.tanggal);
                $('#nomor-rumah-title').text(response.nomor_rumah);
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch admin data:', error);
            }
        });

        // Fetch bills data
        $.ajax({
            url: '/api/bills',
            type: 'POST',
            headers: {
                'Authorization': 'Bearer ' + localStorage.getItem('token')
            },
            success: function(response) {
                var billTableBody = $('#bill-table-body');
                billTableBody.empty(); 

                if (response.length > 0) {
                    response.forEach(function(bill) {
                        var row = `
                            <tr>
                                <th scope="row">${bill.thn_bl.substring(0, 4)}</th>
                                <td>${new Date(bill.thn_bl.substring(0, 4), bill.thn_bl.substring(4, 6) - 1).toLocaleString('default', { month: 'long' })}</td>
                                <td>${bill.nama}</td>
                                <td>${bill.nomor_kavling}</td>
                                <td>${bill.meter_awal} M<sup>3</sup></td>
                                <td>${bill.meter_akhir} M<sup>3</sup></td>
                                <td>Rp${bill.total_tag.toLocaleString('id-ID')}</td>
                            </tr>
                        `;
                        billTableBody.append(row);
                    });
                } else {
                    billTableBody.append('<tr><td colspan="8" class="text-center">No data available</td></tr>');
                }
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch bill data:', error);
            }
        });
    });
</script>
@endsection
