@extends('layouts.main')
<body style="background: linear-gradient(to bottom right, #394E69 45%, #F4D772) 55%;">
    <style>
        .navbar {
            background: transparent;
        }

        .content {
            margin-top: 18vh;
            color: azure;
        }
        .empty-column {
            background-color: #C4C4C4; 
            position: absolute; 
            top: 7.8%; 
            right: 0%; 
            left: 60%;
            /* width: 613px;  */
            height: 92%; 
            border-top-left-radius: 80px;
        }
    </style>
    @section('container')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="content">
                    <h2 style="font-size: 7vh">{{ $name }}</h2>
                    <br>
                    <h5>Perumahan Bandung City View I</h5>
                    <div class="empty-column"></div>
                </div>

            </div>
        </div>
    </div>
    @endsection
</body>
