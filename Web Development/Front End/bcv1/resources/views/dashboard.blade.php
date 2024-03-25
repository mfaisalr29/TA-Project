@extends('layouts.main')

@section('container')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <h5>Dashboard</h5>
        <br><br>

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
                            <a class="nav-link text-white" href="#" style="text-decoration: none;">Dashboard</a>
                            <a class="nav-link text-white" href="#" style="text-decoration: none;">Detail Tagihan IPL</a>
                            <a class="nav-link text-white" href="#" style="text-decoration: none;">Profile</a>
                          </nav>
                    </div>
                </div>
            </div>


            <div class="col-md-9">
                <div class="card">
                    <div class="card-body" style="background-color: #394E69; border-radius: 5px">
                        <div class="card-body col-md-6 mx-3 mb-4" style="background-color: #D9D9D9;  border-radius: 15px">
                            <h5 class="card-title" style="text-align: center">Selamat Datang</h5>
                        </div>
                        <div class="col-md-6 mx-3 mb-4">
                            <div class="card-body" style="background-color: #D9D9D9; border-radius: 15px; position: relative;">
                                <div class="d-flex align-items-center">
                                    <div style="margin-right: 30px;">
                                        <img src="{{ asset('img/Vector.png') }}" class="img-fluid" style="max-height: 100px; border-radius: 40px; padding : 5px">
                                    </div>
                                    <div style="position: absolute; top: 0; bottom: 0; left: 100px; width: 10px; background-color: #848484;"></div>
                                    <div style="padding-right: 10px;">
                                        <h5 class="card-title">Jadwal Ambil Sampah</h5>
                                        <p class="card-text">Selasa, Kamis</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mx-3 mb-4">
                            <div class="card-body" style="background-color: #D9D9D9; border-radius: 15px; position: relative;">
                                <div class="d-flex align-items-center">
                                    <div style="margin-right: 30px;">
                                        <img src="{{ asset('img/Vector.png') }}" class="img-fluid" style="max-height: 100px; border-radius: 40px; padding : 5px">
                                    </div>
                                    <div style="position: absolute; top: 0; bottom: 0; left: 100px; width: 10px; background-color: #848484;"></div>
                                    <div style="padding-right: 10px;">
                                        <h5 class="card-title">IPL Bulan Ini</h5>
                                        <p class="card-text">Meter Awal : </p>
                                        <p class="card-text">Meter Akhir : </p>
                                        <p class="card-text">Meter Tagihan bulan ini : </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" flex-col col-md-6 mx-3 mb-4 align-self-end">
                            <div class="card-body" style="background-color: #D9D9D9; border-radius: 15px">
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
