<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'nomor_kavling' => 'required|string|max:255',
            'blok_cluster' => 'required|string|max:255',
            'no_hp' => 'required|string|max:255',
            'id_pelanggan_online' => 'required|string|max:255|unique:users',
        ]);

        $user = User::create($validatedData);

        return response()->json($user, 201);
    }

    public function show($id)
    {
        return User::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'nama' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255|unique:users,email,'.$id,
            'password' => 'sometimes|required|string|min:8',
            'nomor_kavling' => 'sometimes|required|string|max:255',
            'blok_cluster' => 'sometimes|required|string|max:255',
            'no_hp' => 'sometimes|required|string|max:255',
            'id_pelanggan_online' => 'sometimes|required|string|max:255|unique:users,id_pelanggan_online,'.$id,
        ]);

        $user->update($validatedData);

        return response()->json($user, 200);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json(null, 204);
    }
}
