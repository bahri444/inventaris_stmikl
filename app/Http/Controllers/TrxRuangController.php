<?php

namespace App\Http\Controllers;

use App\Models\TrxRuang;
use Illuminate\Http\Request;

class TrxRuangController extends Controller
{
    public function GettrxRuang()
    {
        $trxRuang = TrxRuang::all();
        return view('superadmin.trxruang', [
            'title' => 'data transaksi ruang',
            'trxRuang' => $trxRuang
        ]);
    }
    public function AddTrxRuang(Request $request)
    {
        $request->validate([]);
        try {
            return redirect('')->with('success', 'gagal');
        } catch (\Exception $e) {
            return redirect('')->with('errors', 'gagal');
        }
    }
}
