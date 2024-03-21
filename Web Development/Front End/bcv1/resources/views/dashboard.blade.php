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
                        <a href="#" class="text-white d-md-block mb-2" style="text-decoration: none;">Dashboard</a>  
                        <a href="#" class="text-white d-md-block mb-2" style="text-decoration: none;">Detail Tagihan IPL</a>  
                        <a href="#" class="text-white" style="text-decoration: none;">Profile</a>
                    </div>
                </div>
            </div>


            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h5 class="welcome-message">Selamat datang, *Nama Warga</h5>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Jadwal Ambil Sampah</h5>
                        <p class="card-text">Selasa, Kamis</p>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>

@endsection
