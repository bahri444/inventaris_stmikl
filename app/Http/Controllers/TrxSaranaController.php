<?php

namespace App\Http\Controllers;

use App\Models\Sarana;
use App\Models\TahunAkademik;
use App\Models\TrxSarana;
use Illuminate\Http\Request;

class TrxSaranaController extends Controller
{
    public function GetTrxSarana()
    {
        $TrxSarana = TrxSarana::joinToSarana()->joinToRuang()->joinToTahunAkademik()->get();
        $getNamaRuang = Sarana::joinToRuang()->select('id_sarana', 'nama_sarana', 'nama_ruang')->get();
        $tahun_akademik = TahunAkademik::select('id_tahun_akademik', 'tahun', 'semester')->get();
        $sarana = Sarana::select('id_sarana', 'nama_sarana')->get();
        return view('superadmin.trxsarana', [
            'title' => 'Transaksi sarana',
            'transaksi_sarana' => $TrxSarana,
            'sarana' => $sarana,
            'tahun_akademik' => $tahun_akademik,
            'getnamaruang' => $getNamaRuang
        ]);
    }

    public function AddTrxSarana(Request $request)
    {
        $request->validate([
            'id_sarana' => 'required',
            'id_tahun_akademik' => 'required',
            'jumlah_like' => 'required',
        ]);
        try {
            TrxSarana::create($request->all());
            return redirect('trxsarana')->with('success', 'berhasil');
        } catch (\Exception $e) {
            return redirect('trxsarana')->with('errors', 'gagal');
        }
    }

    public function UpdtTrxSarana(Request $request)
    {
        $request->validate([
            'id_sarana' => 'required',
            'id_tahun_akademik' => 'required',
            'jumlah_like' => 'required',
        ]);
        try {
            $data = array(
                'id_sarana' => $request->post('id_sarana'),
                'id_tahun_akademik' => $request->post('id_tahun_akademik'),
                'jumlah_like' => $request->post('jumlah_like'),
            );
            TrxSarana::where('id_transaksi_sarana', '=', $request->post('id_transaksi_sarana'))->update($data);
            return redirect('trxsarana')->with('success', 'berhasil');
        } catch (\Exception $e) {
            return redirect('trxsarana')->with('errors', 'gagal');
        }
    }

    public function Delete($id)
    {
        try {
            TrxSarana::where('id_transaksi_sarana', '=', $id)->delete();
            return redirect('TrxSarana')->with('success', 'berhasil');
        } catch (\Exception $e) {
            return redirect('TrxSarana')->with('errors', 'gagal');
        }
    }
}
