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
                        <a class="nav-link {{ ($title === "Daftar Akun Warga") ? 'active' : ''}}" href="#">Daftar Akun Warga</a>
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
                                    <div class="interactive-circle" onclick="handleClick('mode-kontrol')">
                                        <img id="gambar1" src="{{ asset('img/lightbulb-off.png') }}" class="img-fluid" style="width: 100px; height: 100px;">
                                        <h5 class="mt-2">Mode Kontrol</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-center">
                                    <div class="interactive-circle" onclick="handleClick('bor-besar')">
                                        <img id="gambar2" src="{{ asset('img/lightbulb-off.png') }}" class="img-fluid" style="width: 100px; height: 100px;">
                                        <h5 class="mt-2">Bor Besar</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-center">
                                    <div class="interactive-circle" onclick="handleClick('kondisi-air')">
                                        <img id="gambar3" src="{{ asset('img/lightbulb-off.png') }}" class="img-fluid" style="width: 100px; height: 100px;">
                                        <h5 class="mt-2">Kondisi Air</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mt-3">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="text-center">
                                    <div class="interactive-circle" onclick="handleClick('pompa-dorong')">
                                        <img id="gambar4" src="{{ asset('img/lightbulb-off.png') }}" class="img-fluid" style="width: 100px; height: 100px;">
                                        <h5 class="mt-2">Pompa Dorong</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-center">
                                    <div class="interactive-circle" onclick="handleClick('reservoir-atas')">
                                        <img id="gambar5" src="{{ asset('img/water-pump-off.png') }}" class="img-fluid" style="width: 100px; height: 100px;">
                                        <h5 class="mt-2">Reservoir Atas</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-center">
                                    <div class="interactive-circle" onclick="handleClick('reservoir-bawah')">
                                        <img id="gambar6" src="{{ asset('img/water-pump-off.png') }}" class="img-fluid" style="width: 100px; height: 100px;">
                                        <h5 class="mt-2">Reservoir Bawah</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script type="module" src="{{ asset('js/firebase.js') }}"></script>
        <script type="module">
            import { database, ref, set, get, child, onValue } from "{{ asset('js/firebase.js') }}";

            function handleClick(elementId) {
                console.log("Element clicked:", elementId); // Debugging log
                var img;
                switch (elementId) {
                    case 'mode-kontrol':
                        img = document.getElementById('gambar1');
                        img.src = "{{ asset('img/lightbulb-on.png') }}";
                        changeCircleColor(elementId, '#0000FF');
                        updateFirebase('Automation', 1);
                        break;
                    case 'bor-besar':
                        img = document.getElementById('gambar2');
                        img.src = "{{ asset('img/lightbulb-on.png') }}";
                        changeCircleColor(elementId, '#0000FF');
                        updateFirebase('Reservoir2/RadarBorBesar1', 1);
                        break;
                    case 'kondisi-air':
                        img = document.getElementById('gambar3');
                        img.src = "{{ asset('img/lightbulb-on.png') }}";
                        changeCircleColor(elementId, '#0000FF');
                        updateFirebase('Reservoir1/Radar', 1);
                        break;
                    case 'pompa-dorong':
                        img = document.getElementById('gambar4');
                        img.src = "{{ asset('img/lightbulb-on.png') }}";
                        changeCircleColor(elementId, '#0000FF');
                        updateFirebase('Reservoir2/Pompa3', 1);
                        break;
                    case 'reservoir-atas':
                        img = document.getElementById('gambar5');
                        img.src = "{{ asset('img/water-pump.png') }}";
                        changeCircleColor(elementId, '#0000FF');
                        updateFirebase('Reservoir1/Radar', 1);
                        break;
                    case 'reservoir-bawah':
                        img = document.getElementById('gambar6');
                        img.src = "{{ asset('img/water-pump.png') }}";
                        changeCircleColor(elementId, '#0000FF');
                        updateFirebase('Reservoir2/RadarPompa3', 1);
                        break;
                    default:
                        break;
                }
            }

            function changeCircleColor(elementId, color) {
                var circle = document.getElementById(elementId);
                circle.style.backgroundColor = color;
            }

            function updateFirebase(path, value) {
                const dbRef = ref(database, `ControlSystem/${path}`);
                console.log(`Updating Firebase at ${path} with value ${value}`);
                set(dbRef, value)
                    .then(() => {
                        console.log("Data updated successfully!");
                    })
                    .catch((error) => {
                        console.error("Error updating data: ", error);
                    });
            }

            // Example of reading data from Firebase
            function readFirebase(path) {
                const dbRef = ref(database);
                get(child(dbRef, `ControlSystem/${path}`))
                    .then((snapshot) => {
                        if (snapshot.exists()) {
                            console.log(snapshot.val());
                        } else {
                            console.log("No data available");
                        }
                    })
                    .catch((error) => {
                        console.error("Error reading data: ", error);
                    });
            }

            // Example of listening to data changes from Firebase
            function listenFirebase(path) {
                const dbRef = ref(database, `ControlSystem/${path}`);
                onValue(dbRef, (snapshot) => {
                    const data = snapshot.val();
                    console.log(data);
                });
            }

            // Initialize listeners
            listenFirebase('Reservoir1/Radar');
            listenFirebase('Reservoir2/RadarBorBesar1');
        </script>
    </div>
</div>
@endsection
