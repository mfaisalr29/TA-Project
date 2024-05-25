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
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="text-center">
                                    <div class="interactive-circle" id="reservoir-atas">
                                        <img id="gambar-reservoir-atas" src="{{ asset('img/water-pump-off.png') }}" class="img-fluid" style="width: 100px; height: 100px;">
                                        <h5 class="mt-2">Reservoir Atas</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-center">
                                    <div class="interactive-circle" id="reservoir-bawah">
                                        <img id="gambar-reservoir-bawah" src="{{ asset('img/water-pump-off.png') }}" class="img-fluid" style="width: 100px; height: 100px;">
                                        <h5 class="mt-2">Reservoir Bawah</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mt-3">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="text-center">
                                    <div class="interactive-circle" id="mode-kontrol" onclick="handleClick('mode-kontrol', 'ControlSystem/Automation', 'gambar1', '{{ asset('img/lightbulb-on.png') }}', '{{ asset('img/lightbulb-off.png') }}')">
                                        <img id="gambar1" src="{{ asset('img/lightbulb-off.png') }}" class="img-fluid" style="width: 100px; height: 100px;">
                                        <h5 class="mt-2">Mode Kontrol</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-center">
                                    <div class="interactive-circle" id="bor-besar" onclick="handleClick('bor-besar', 'ControlSystem/Reservoir2/Relay1', 'gambar2', '{{ asset('img/lightbulb-on.png') }}', '{{ asset('img/lightbulb-off.png') }}')">
                                        <img id="gambar2" src="{{ asset('img/lightbulb-off.png') }}" class="img-fluid" style="width: 100px; height: 100px;">
                                        <h5 class="mt-2">Pompa Celup Besar</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-center">
                                    <div class="interactive-circle" id="kondisi-air" onclick="handleClick('kondisi-air', 'ControlSystem/Reservoir2/Relay2', 'gambar3', '{{ asset('img/lightbulb-on.png') }}', '{{ asset('img/lightbulb-off.png') }}')">
                                        <img id="gambar3" src="{{ asset('img/lightbulb-off.png') }}" class="img-fluid" style="width: 100px; height: 100px;">
                                        <h5 class="mt-2">Pompa Celup Kecil</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mt-3">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="text-center">
                                    <div class="interactive-circle" id="pompa-dorong" onclick="handleClick('pompa-dorong', 'ControlSystem/Reservoir2/Relay3', 'gambar4', '{{ asset('img/lightbulb-on.png') }}', '{{ asset('img/lightbulb-off.png') }}')">
                                        <img id="gambar4" src="{{ asset('img/lightbulb-off.png') }}" class="img-fluid" style="width: 100px; height: 100px;">
                                        <h5 class="mt-2">Pompa Dorong</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Impor modul Firebase dari CDN -->
        <script type="module">
            // Impor modul Firebase
            import { initializeApp } from "https://www.gstatic.com/firebasejs/9.0.0/firebase-app.js";
            import { getDatabase, ref, set, onValue } from "https://www.gstatic.com/firebasejs/9.0.0/firebase-database.js";

            const firebaseConfig = {
                apiKey: "AIzaSyBrFK8HL0bBK7QaVm5dsQJ9Gk9Nm5-LmlU",
                authDomain: "bcv1-f450b.firebaseapp.com",
                databaseURL: "https://bcv1-f450b-default-rtdb.asia-southeast1.firebasedatabase.app",
                projectId: "bcv1-f450b",
                storageBucket: "bcv1-f450b",
                messagingSenderId: "632085793199",
                appId: "1:632085793199:web:64563abd2d0d8faad2c75a",
            };

            // Inisialisasi Firebase
            const app = initializeApp(firebaseConfig);
            const database = getDatabase(app);

            // Definisikan fungsi global
            window.handleClick = function(elementId, firebasePath, imageId, onImage, offImage) {
                const img = document.getElementById(imageId);
                const currentSrc = img.src;
                const newValue = currentSrc.includes('off') ? 1 : 0;
                const newImage = newValue === 1 ? onImage : offImage;

                img.src = newImage;
                updateFirebase(firebasePath, newValue);
            };
            
            function updateFirebase(path, value) {
                const dbRef = ref(database, path);
                console.log(`Updating Firebase at ${path} with value ${value}`); 
                set(dbRef, value)
                    .then(() => {
                        console.log("Data updated successfully!");
                    })
                    .catch((error) => {
                        console.error("Error updating data: ", error);
                    });
            }

            function listenFirebase(path, callback) {
                const dbRef = ref(database, path);
                onValue(dbRef, (snapshot) => {
                    const data = snapshot.val();
                    callback(data);
                });
            }

            function updateUIForAutomation(value) {
                const elements = ['bor-besar', 'kondisi-air', 'pompa-dorong'];
                elements.forEach(id => {
                    const element = document.getElementById(id);
                    if (value === 1) {
                        element.style.pointerEvents = 'none';
                        element.style.opacity = '0.5';
                    } else {
                        element.style.pointerEvents = 'auto';
                        element.style.opacity = '1';
                    }
                });
            }

            function updateImageBasedOnFirebaseValue(elementId, imageId, value) {
                const img = document.getElementById(imageId);
                const onImage = '{{ asset('img/lightbulb-on.png') }}';
                const offImage = '{{ asset('img/lightbulb-off.png') }}';
                img.src = value === 1 ? onImage : offImage;
            }

            listenFirebase('ControlSystem/Automation', updateUIForAutomation);
            listenFirebase('ControlSystem/Reservoir1/Radar', (data) => {
                const img = document.getElementById('gambar-reservoir-atas');
                const newImage = data === 1 ? '{{ asset('img/water-pump.png') }}' : '{{ asset('img/water-pump-off.png') }}';
                img.src = newImage;
            });
            listenFirebase('ControlSystem/Reservoir2/RadarPompa3', (data) => {
                const img = document.getElementById('gambar-reservoir-bawah');
                const newImage = data === 1 ? '{{ asset('img/water-pump.png') }}' : '{{ asset('img/water-pump-off.png') }}';
                img.src = newImage;
            });

            // Listen to Firebase changes for each control element
            listenFirebase('ControlSystem/Automation', (data) => {
                updateImageBasedOnFirebaseValue('mode-kontrol', 'gambar1', data);
            });
            listenFirebase('ControlSystem/Reservoir2/Relay1', (data) => {
                updateImageBasedOnFirebaseValue('bor-besar', 'gambar2', data);
            });
            listenFirebase('ControlSystem/Reservoir2/Relay2', (data) => {
                updateImageBasedOnFirebaseValue('kondisi-air', 'gambar3', data);
            });
            listenFirebase('ControlSystem/Reservoir2/Relay3', (data) => {
                updateImageBasedOnFirebaseValue('pompa-dorong', 'gambar4', data);
            });
        </script>
    </div>
</div>
@endsection
