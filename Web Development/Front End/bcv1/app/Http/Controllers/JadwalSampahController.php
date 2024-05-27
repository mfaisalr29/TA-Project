<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JadwalSampah;
use Illuminate\Support\Facades\Auth;

class JadwalSampahController extends Controller
{
    public function getSchedule(Request $request)
    {
        // Logika untuk warga mengambil jadwal sampah
        $schedule = JadwalSampah::all(); // Contoh mengambil semua jadwal
        return response()->json($schedule, 200);
    }

    public function editSchedule(Request $request)
    {
        // Validasi peran admin
        if (Auth::user()->role !== 'admin') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        // Logika untuk admin mengedit jadwal sampah
        $validatedData = $request->validate([
            'id' => 'required|integer',
            'hari' => 'required|string',
            'waktu' => 'required|string',
        ]);

        $schedule = JadwalSampah::find($validatedData['id']);
        if ($schedule) {
            $schedule->hari = $validatedData['hari'];
            $schedule->waktu = $validatedData['waktu'];
            $schedule->save();
            return response()->json(['message' => 'Schedule updated successfully'], 200);
        } else {
            return response()->json(['message' => 'Schedule not found'], 404);
        }
    }
}
