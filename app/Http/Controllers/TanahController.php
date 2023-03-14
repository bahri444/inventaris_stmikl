<?php

namespace App\Http\Controllers;

use App\Models\Bangunan;
use App\Models\Tanah;
use Illuminate\Http\Request;

class TanahController extends Controller
{
    public function GetTanahBangunan()
    {
        $tanah = Tanah::all();
        $bangunan = Bangunan::all();
        return view('superadmin.tanah', [
            'title' => 'data tanah dan bangunan',
            'tanah' => $tanah,
            'bangunan' => $bangunan
        ]);
    }
    public function AddTanah(Request $request)
    {
        $request->validate([]);
        try {
            return redirect('')->with('success', 'berhasil');
        } catch (\Exception $e) {
            return redirect('')->with('errors', 'gagal');
        }
    }
}
