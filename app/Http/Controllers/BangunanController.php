<?php

namespace App\Http\Controllers;

use App\Models\Bangunan;
use Illuminate\Http\Request;

class BangunanController extends Controller
{
    public function AddBangunan(Request $request)
    {
        $request->validate([]);
        try {
            return redirect('')->with('success', 'berhasil');
        } catch (\Exception $e) {
            return redirect('')->with('errors', 'gagal');
        }
    }
}
