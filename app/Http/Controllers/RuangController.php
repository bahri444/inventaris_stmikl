<?php

namespace App\Http\Controllers;

use App\Models\Ruang;
use Illuminate\Http\Request;

class RuangController extends Controller
{
    public function GetRuang()
    {
        $ruang = Ruang::all();
        $fields = ['id_bangunan',    'kode_ruang',    'nama_ruang',    'panjang',    'lebar',    'luas_ruang',    'kapasitas'];
        return view('superadmin.ruang', [
            'title' => 'data ruang',
            'ruang' => $ruang,
            'fields' => $fields,
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
