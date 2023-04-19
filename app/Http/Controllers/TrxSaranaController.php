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
        $fields = ['jumlah_total_trx',    'jumlah_like_trx'];
        // $TrxSarana = TrxSarana::joinToSarana()->joinToTahunAkademik()->groupBy('nama_sarana')->where('jumlah_like')->count();
        $TrxSarana = TrxSarana::joinToSarana()->joinToRuang()->joinToTahunAkademik()->get();
        $getNamaRuang = Sarana::joinToRuang()->select('id_sarana', 'nama_sarana', 'nama_ruang')->get();
        $tahun_akademik = TahunAkademik::select('id_tahun_akademik', 'tahun', 'semester')->get();
        // $hitung = TrxSarana::joinToSarana()->groupBy('nama_sarana')->get();
        // dd($hitung);
        $sarana = Sarana::select('id_sarana', 'nama_sarana')->get();
        return view('superadmin.trxsarana', [
            'title' => 'Transaksi sarana',
            'transaksi_sarana' => $TrxSarana,
            'fields' => $fields,
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
        ]);
        try {
            $data = array(
                'id_sarana' => $request->post('id_sarana'),
                'id_tahun_akademik' => $request->post('id_tahun_akademik'),
                // 'jumlah_total_trx' => $request->post('jumlah_total_trx'),
                // 'jumlah_like_trx' => $request->post('jumlah_like_trx'),
            );
            TrxSarana::where('id_sarana_periodik', '=', $request->post('id_sarana_periodik'))->update($data);
            return redirect('trxsarana')->with('success', 'berhasil');
        } catch (\Exception $e) {
            return redirect('trxsarana')->with('errors', 'gagal');
        }
    }

    public function Delete($id)
    {
        try {
            TrxSarana::where('id_sarana_periodik', '=', $id)->delete();
            return redirect('TrxSarana')->with('success', 'berhasil');
        } catch (\Exception $e) {
            return redirect('TrxSarana')->with('errors', 'gagal');
        }
    }
}
