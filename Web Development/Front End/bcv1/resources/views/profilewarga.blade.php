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
                        <img src="{{ asset('img/Profile.png') }}" class="img-fluid mr-2" style="max-height: 100px; border-radius: 40px; padding: 10px">
                        <h5 class="mb-0 text-white">Nomor Rumah</h5>
                    </div>
                    <hr style="border-top: 2px solid #000000;">
                    <div class="p-2 mb-2">
                        <nav class="nav flex-column">
                            <a class="nav-link {{ ($title === "Dashboard") ? 'active' : ''}}" href="/dashboard">Dashboard</a>
                            <a class="nav-link" href="/detailtagihan">Detail Tagihan IPL</a>
                            <a class="nav-link {{ ($title === "Profile Warga") ? 'active' : ''}}" href="/profilewarga">Profile</a>
                        </nav>
                    </div>
                </div>
            </div>
            
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body" style="background-color: #394E69; border-radius: 5px; color:white;">
                        Personal Data
                        <hr style="border-top: 2px solid #000000; margin-top: 20px; margin-bottom: 20px;">
                    
                        <div class="container">
                            <div class="row">
                                <div class="col-2">
                                    <div class="bg-white mt-3 p-3 rounded" style="width: 150px; margin-left: 20px">
                                        <img src="{{ asset('img/Profile.png') }}" class="img-fluid">
                                        <div class="text-center mt-3" style="color: #000000; background-color: white; border: 2px solid black; border-radius: 50px">
                                            *Blok 
                                        </div>
                                    </div>
                                    <div class="text-center mt-5" style="color: #000000; background-color: white; border: 2px solid black; border-radius: 50px; width: 150px; margin-left: 20px">
                                        *Change Password
                                    </div>
                                </div>
                                <div class="col d-flex flex-column" style="margin-left : 70px">
                                    <div class="mt-3" style="color : #33FF00;">
                                        <p>Ubah Data Pribadi</p>
                                        <hr style="border-top: 2px solid black; margin-bottom : 0px; margin-top: 0px">
                                    </div>
                                    <div class="mt-3" style="color : white;">
                                        <div class="d-flex">
                                            <div style="width : 200px;">
                                                <p>Nama</p>
                                                <p>No. Rumah</p>
                                                <p>Blok</p>
                                            </div>
                                            <div style="flex: 1;">
                                                <p>Ais</p>
                                                <p>50 A</p>
                                                <p>Laguna Seca</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col d-flex flex-column">
                                        <div class="mt-3" style="color : #33FF00;">
                                            <p>Ubah Detail Profile</p>
                                            <hr style="border-top: 2px solid black; margin-bottom : 0px; margin-top: 0px">
                                        </div>
                                        <div class="mt-3" style="color : white;">
                                            <div class="d-flex">
                                                <div style="width : 200px;">
                                                    <p>No.HP</p>
                                                    <p>Password</p>
                                                </div>
                                                <div style="flex: 1;">
                                                    <p>081224515931</p>
                                                    <div class="d-flex align-items-center">
                                                        <input type="password" class="form-control bg-transparent border-0" id="password" value="saya asik sendiri" style="color: white; width: 40%" readonly>
                                                        <button onclick="togglePassword()" class="btn btn-link">
                                                            <i id="toggleIcon" class="bi bi-eye-slash"></i></button>
                                                    </div>
                                                </div>
                                                <script>
                                                    function togglePassword() {
                                                        var passwordInput = document.getElementById("password");
                                                        var toggleIcon = document.getElementById("toggleIcon");
                                                        if (passwordInput.type === "password") {
                                                            passwordInput.type = "text";
                                                            toggleIcon.classList.remove("bi-eye-slash");
                                                            toggleIcon.classList.add("bi-eye");
                                                        } else {
                                                            passwordInput.type = "password";
                                                            toggleIcon.classList.remove("bi-eye");
                                                            toggleIcon.classList.add("bi-eye-slash");
                                                        }
                                                    }
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
