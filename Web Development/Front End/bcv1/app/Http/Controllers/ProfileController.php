<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
    public function getProfile(Request $request)
    {
        $user = Auth::user();

        return response()->json($user, 200);
    }
}
