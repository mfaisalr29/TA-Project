<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bill;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class BillController extends Controller
{
    public function getBills(Request $request)
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            $bills = Bill::all();
        } else {
            $bills = Bill::where('user_id', $user->id)->get();
        }

        return response()->json($bills, 200);
    }

    public function addBill(Request $request)
    {
        Log::info('Request data:', $request->all());
    
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'nomor_kavling' => 'required|string',
            'nama' => 'required|string',
            'paid' => 'required|boolean',
            'thn_bl' => 'required|string',
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

        $bill = Bill::where('user_id', $data['user_id'])
                    ->where('nomor_kavling', $data['nomor_kavling'])
                    ->where('thn_bl', $data['thn_bl'])
                    ->first();
    
        if ($bill) {
            $bill->update(array_merge($data, $billData));
            return response()->json($bill, 200); 
        } else {
            $bill = Bill::create(array_merge($data, $billData));
            return response()->json($bill, 201); 
        }
    }
}
