<?php

namespace App\Http\Controllers;

use App\Models\TahunAkademik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TahunAkademikController extends Controller
{
    public function GetTahunAkademik()
    {
        $tahun_akademik = TahunAkademik::all();
        return view('superadmin.tahun_akademik', [
            'title' => 'Tahun akademik',
            'tahun_akademik' => $tahun_akademik
        ]);
    }
    public function AddTahunAkademik(Request $request)
    {
        $request->validate([
            'semester' => 'required',
            'tahun' => 'required|max:4'
        ]);
        try {
            TahunAkademik::create($request->all());
            return redirect('tahun_akademik')->with('success', 'berhasil di tambahkan');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect('tahun_akademik')->with('errors', $e);
        }
    }
    public function UpdateTahunAkademik(Request $request)
    {
        $request->validate([
            'semester' => 'required',
            'tahun' => 'required|max:4'
        ]);
        try {
            $data = array(
                'semester' => $request->post('semester'),
                'tahun' => $request->post('tahun')
            );
            // dd($data);
            TahunAkademik::where('id_tahun_akademik', '=', $request->post('id_tahun_akademik'))->update($data);
            return redirect('tahun_akademik')->with('success', 'berhasil di update');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect('tahun_akademik')->with('errors', $e);
        }
    }
    public function DeleteTahunAkademik($id)
    {
        try {
            TahunAkademik::where('id_tahun_akademik', '=', $id)->delete();
            return redirect('tahun_akademik')->with('success', 'berhasil di hapus');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect('tahun_akademik')->with('errors', $e);
        }
    }
}
