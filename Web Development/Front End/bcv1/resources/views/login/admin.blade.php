@extends('layouts.main')

<link rel="stylesheet" href="/css/style.css">

<body style="background: linear-gradient(to right, #F8F2F0 50%, #394E69 50%); margin:0; padding:0;">
  <style>
    @media (max-width: 768px) {
      body {
        background: linear-gradient(to bottom, #F8F2F0 50%, #394E69 50%);
      }
      .container-fluid {
        display: flex;
        flex-direction: column;
        align-items: center;
      }
      .col-md-4 {
        width: 100%;
        padding: 20px;
      }
      .col-md-6 {
        display: none;
      }
      .form-signin {
        width: 100%;
      }
    }

    @media (min-width: 768px) {
      .image-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
      }
    }
  </style>

  <div class="container-fluid" style="display: grid; height:100vh">
    <div class="row">
      <div class="col-md-4" style="align-self: center; margin: auto">
        <form class="form-signin">
          <h1 class="h3 mt-3 d-flex justify-content-center">Welcome!</h1>
          <p class="mt-3 d-flex justify-content-center" style="color:#808080">Welcome back! Please enter your details</p>
          <div class="form-floating">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Enter your username</label>
          </div>
          <br>
          <div class="form-floating mb-4">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
          </div>
          <a href="/dashboardadmin" class="btn w-100 py-2" style="background: #FE8660; color: white" type="submit">Sign In</a>
        </form>
      </div>
      <div class="col-md-6" style="align-self: center; margin: auto">        
        <div class="image-container">
          <img src="img/login.png" alt="Image" class="img-fluid">
        </div>
      </div>
    </div>
  </div>
</body>
