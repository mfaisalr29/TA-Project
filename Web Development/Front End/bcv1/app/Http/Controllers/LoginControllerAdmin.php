<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginControllerAdmin extends Controller
{
    public function index(){
        return view('login.admin', [
            "title" => "Login Admin"
        ]);
    }
}
