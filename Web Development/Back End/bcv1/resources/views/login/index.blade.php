@extends('layouts.main')

<link rel="stylesheet" href="/css/style.css">
<body style="background: linear-gradient(to right, #F8F2F0 50%, #394E69 50%); margin:0; padding:0;">
  <div class="container-fluid" style="display: grid; height:100vh">
    <div class="row">
      <div class="col-md-6" style="align-self: center; margin: auto">
        <form class="form-signin">
          <h1 class="h3 mt-3 d-flex justify-content-center">Welcome!</h1>
          <p class= "mt-3 d-flex justify-content-center"> Welcome back! Please enter your details</p>
          <div class="form-floating">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Enter your username</label>
          </div>
          <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
          </div>
          
          <div class="form-check text-start my-3">
            <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
              Remember for 30 days
            </label>
          </div>
          <a href="/dashboard" class="btn btn-primary w-100 py-2" type="submit">Sign In</a>
        </form>
      </div>
      <div class="col-md-6" style="align-self: center; margin: auto">        
          <div class="image-container" style="display:flex; justify-content:center;">
          <img src="img/login.png" alt="Image" class="img-fluid">
        </div>
      </div>
    </div>
  </div>
</body>
