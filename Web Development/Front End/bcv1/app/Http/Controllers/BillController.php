<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bill;
use Illuminate\Support\Facades\Auth;

class BillController extends Controller
{
    public function getBills(Request $request)
    {
        $user = Auth::user();

        // Jika admin, dapat melihat semua tagihan
        if ($user->role === 'admin') {
            $bills = Bill::all();
        } else {
            // Jika warga, hanya dapat melihat tagihan miliknya
            $bills = Bill::where('user_id', $user->id)->get();
        }

        return response()->json($bills, 200);
    }

    public function addBill(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'no_kav' => 'required|string',
            'nama' => 'required|string',
            'paid' => 'required|boolean',
            'thn_bl' => 'required|string', // YYYYMM format
            'ipl' => 'required|integer',
            'meter_awal' => 'required|integer',
            'meter_akhir' => 'required|integer',
            'tunggakan_1' => 'integer|nullable',
            'tunggakan_2' => 'integer|nullable',
            'tunggakan_3' => 'integer|nullable',
        ]);

        $billData = Bill::calculateBill(
            $data['meter_awal'],
            $data['meter_akhir'],
            $data['ipl'],
            $data['tunggakan_1'] ?? 0,
            $data['tunggakan_2'] ?? 0,
            $data['tunggakan_3'] ?? 0
        );

        $bill = Bill::create(array_merge($data, $billData));

        return response()->json($bill, 201);
    }
    public function getBillDetails($id)
    {
        $bill = Bill::findOrFail($id);
        return response()->json($bill, 200);
    }

    public function updateBill(Request $request)
    {
        $data = $request->validate([
            'bill_id' => 'required|exists:bills,id',
            'nominal' => 'required|integer',
            'meter_awal' => 'required|integer',
            'meter_akhir' => 'required|integer',
            'tanggal' => 'required|date',
        ]);

        $bill = Bill::findOrFail($data['bill_id']);
        $bill->meter_awal = $data['meter_awal'];
        $bill->meter_akhir = $data['meter_akhir'];
        $bill->thn_bl = substr($data['tanggal'], 0, 6); // YYYYMM
        $bill->total_tag = $data['nominal'];
        $bill->save();

        return response()->json($bill, 200);
    }

}
