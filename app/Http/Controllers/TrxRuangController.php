<?php

namespace App\Http\Controllers;

use App\Models\Ruang;
use App\Models\TahunAkademik;
use App\Models\TrxRuang;
use Illuminate\Http\Request;

class TrxRuangController extends Controller
{
    public function GettrxRuang()
    {
        $trxRuang = TrxRuang::joinToRuang()->joinToTahunAkademik()->get();
        // $trxRuang = TrxRuang::joinToRuang()->joinToTahunAkademik()->groupBy('tahun', 'semester')->where('kerusakan', '=', 'rusak sedang')->count();

        $tahun_akademik = TahunAkademik::select('id_tahun_akademik', 'tahun', 'semester')->get();
        $ruang = Ruang::select('id_ruang', 'nama_ruang')->get();
        // $fields = [];
        return view('superadmin.trxruang', [
            'title' => 'data transaksi ruang',
            'trxRuang' => $trxRuang,
            // 'fields' => $fields,
            'ruang' => $ruang,
            'tahun_akademik' => $tahun_akademik,
        ]);
    }
    public function AddTrxRuang(Request $request)
    {
        $request->validate([
            'id_ruang' => 'required',
            'id_tahun_akademik' => 'required',
            'kerusakan' => 'required',
            'nilai_kerusakan' => 'required|max:2',
        ]);
        // dd($request);
        try {
            TrxRuang::create($request->all());
            return redirect('trxruang')->with('success', 'berhasil di simpan');
        } catch (\Exception $e) {
            return redirect('trxruang')->with('errors', 'gagal di simpan');
        }
    }
    public function UpdtTrxRuang(Request $request)
    {
        // id_trx	
        // id_ruang	
        // kerusakan	
        // nilai_kerusakan
        $request->validate([
            'id_ruang' => 'required',
            'id_tahun_akademik' => 'required',
            'kerusakan' => 'required',
            'nilai_kerusakan' => 'required|max:2',
        ]);
        try {
            $data = array(
                'id_ruang' => $request->post('id_ruang'),
                'id_tahun_akademik' => $request->post('id_tahun_akademik'),
                'kerusakan' => $request->post('kerusakan'),
                'nilai_kerusakan' => $request->post('nilai_kerusakan'),
            );
            TrxRuang::where('id_trx', '=', $request->post('id_trx'))->update($data);
            return redirect('trxruang')->with('success', 'berhasil di update');
        } catch (\Exception $e) {
            return redirect('trxruang')->with('errors', 'gagal di update');
        }
    }
    public function Delete($id)
    {
        try {
            TrxRuang::where('id_trx', '=', $id)->delete();
            return redirect('trxruang')->with('success', 'berhasil di hapus');
        } catch (\Exception $e) {
            return redirect('trxruang')->with('errors', 'gagal di hapus');
        }
    }
}
