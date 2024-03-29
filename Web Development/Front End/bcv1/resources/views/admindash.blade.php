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
                            <a class="nav-link text-white" href="#" >Tagihan IPL</a>
                            <a class="nav-link text-white" href="#" >Kondisi Air dan Alat</a>
                            <a class="nav-link text-white" href="#" >Daftar Akun Warga</a>
                            <a class="nav-link text-white " href="#" >Profile</a>
                          </nav>
                    </div>
                </div>
            </div>


            <div class="col-md-9">
                <div class="card">
                    <div class="card-body" style="background-color: #ffffff; border-radius: 5px">
                    </div>
                    
                </div>

            </div>
        </div>
    </div>


    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>

@endsection
