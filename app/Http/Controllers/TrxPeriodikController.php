<?php

namespace App\Http\Controllers;

use App\Models\TrxPeriodik;
use Illuminate\Http\Request;

class TrxPeriodikController extends Controller
{
    public function GetTrxPeriodik()
    {
        $trxPeriodik = TrxPeriodik::all();
        return view('superadmin.trxperiodik', [
            'title' => 'data transaksi periodik',
            'trxPeriodik' => $trxPeriodik
        ]);
    }
    public function AddTrxPeriodik(Request $request)
    {
        $request->validate([]);
        try {
            return redirect('')->with('success', 'berhasil');
        } catch (\Exception $e) {
            return redirect('')->with('errors', 'gagal');
        }
    }
}
