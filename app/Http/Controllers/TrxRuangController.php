<?php

namespace App\Http\Controllers;

use App\Models\Ruang;
use App\Models\TrxRuang;
use Illuminate\Http\Request;

class TrxRuangController extends Controller
{
    public function GettrxRuang()
    {
        $trxRuang = TrxRuang::joinToRuang()->get();
        $ruang = Ruang::select('id_ruang', 'nama_ruang')->get();
        // $fields = [];
        return view('superadmin.trxruang', [
            'title' => 'data transaksi ruang',
            'trxRuang' => $trxRuang,
            // 'fields' => $fields,
            'ruang' => $ruang,
        ]);
    }
    public function AddTrxRuang(Request $request)
    {
        $request->validate([
            'id_ruang' => 'required',
            'kerusakan' => 'required',
            'nilai_kerusakan' => 'required',
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
            'kerusakan' => 'required',
            'nilai_kerusakan' => 'required',
        ]);
        try {
            $data = array(
                'id_ruang' => $request->post('id_ruang'),
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
