<?php

namespace App\Http\Controllers;

use App\Models\Sarana;
use Illuminate\Http\Request;

class SaranaController extends Controller
{
    public function GetSarana()
    {
        $sarana = Sarana::all();
        return view('superadmin.sarana', [
            'title' => 'data sarana',
            'sarana' => $sarana
        ]);
    }
    public function AddSarana(Request $request)
    {
        $request->validate([]);
        try {
            return redirect('')->with('success', 'berhasil');
        } catch (\Exception $e) {
            return redirect('')->with('errors', 'gagal');
        }
    }
}
