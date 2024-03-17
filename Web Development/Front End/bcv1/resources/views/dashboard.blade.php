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
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action active">
                        Nomor Rumah
                    </a>
                    <a href="#" class="list-group-item list-group-item-action ">Detail Tagihan IPL</a>
                    <a href="#" class="list-group-item list-group-item-action" href="/profile">Profile</a>

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

