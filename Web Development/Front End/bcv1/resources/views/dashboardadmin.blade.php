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
            <div class="p-3 mb-2" style="background-color: #394E69; border-radius: 10px">
                <div class="d-flex align-items-center">
                    <img src="{{ asset('img/Profile.png') }}" class="img-fluid mr-2" style="max-height: 100px; border-radius: 40px; padding: 10px">
                    <h5 class="mb-0 text-white" id="admin-title">Admin</h5>
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
            <div class="card">
                <div class="card-body" style="background-color: #394E69; border-radius: 5px; color:white;">
                    <div class="card-body col-md-6 mx-3 mb-4" style="background-color: #D9D9D9; border-radius: 15px">
                        <h5 class="card-title" style="text-align: center">Selamat Datang</h5>
                    </div>
                    <div class="col-md-6 mx-3 mb-4">
                        <div class="card-body" style="background-color: #D9D9D9; border-radius: 15px; position: relative;">
                            <div class="d-flex align-items-center">
                                <div style="margin-right: 30px;">
                                    <img src="{{ asset('img/Vector.png') }}" class="img-fluid" style="max-height: 100px; border-radius: 40px; padding: 5px">
                                </div>
                                <div style="position: absolute; top: 0; bottom: 0; left: 100px; width: 10px; background-color: #848484;"></div>
                                <div style="padding-right: 10px;">
                                    <h5 class="card-title">Jadwal Ambil Sampah</h5>
                                    <p class="card-text" id="schedule-title">Selasa, Kamis</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mx-3 mb-4">
                        <div class="card-body" style="background-color: #D9D9D9; border-radius: 15px; position: relative;">
                            <div class="d-flex align-items-center">
                                <div style="margin-right: 30px;">
                                    <img src="{{ asset('img/Vector.png') }}" class="img-fluid" style="max-height: 100px; border-radius: 40px; padding: 5px">
                                </div>
                                <div style="position: absolute; top: 0; bottom: 0; left: 100px; width: 10px; background-color: #848484;"></div>
                                <div style="padding-right: 10px;">
                                    <h5 class="card-title">IPL Bulan Ini</h5>
                                    <p class="card-text" id="meter-awal">Meter Awal: </p>
                                    <p class="card-text" id="meter-akhir">Meter Akhir: </p>
                                    <p class="card-text" id="meter-tagihan">Meter Tagihan bulan ini: </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex-col col-md-6 mx-3 mb-4 align-self-end">
                        <div class="card-body" style="background-color: #D9D9D9; border-radius: 15px">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $.ajax({
            url: '/api/admin/dashboard/data',
            type: 'POST',
            headers: {
                'Authorization': 'Bearer ' + localStorage.getItem('token')
            },
            success: function(response) {
                $('#schedule-title').text(response.schedule_title);
                $('#meter-awal').text('Meter Awal: ' + response.meter_awal);
                $('#meter-akhir').text('Meter Akhir: ' + response.meter_akhir);
                $('#meter-tagihan').text('Meter Tagihan bulan ini: ' + response.meter_tagihan);
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch dashboard data:', error);
            }
        });
    });
</script>
@endsection
