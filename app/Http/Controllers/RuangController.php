<?php

namespace App\Http\Controllers;

use App\Models\Ruang;
use Illuminate\Http\Request;

class RuangController extends Controller
{
    public function GetRuang()
    {
        $ruang = Ruang::all();
        return view('superadmin.ruang', [
            'title' => 'data ruang',
            'ruang' => $ruang
        ]);
    }
    public function AddRuang(Request $request)
    {
        $request->validate([]);
        try {
            return redirect('')->with('success', 'berhasil');
        } catch (\Exception $e) {
            return redirect('')->with('errors', 'gagal');
        }
    }
}
