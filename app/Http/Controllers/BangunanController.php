<?php

namespace App\Http\Controllers;

use App\Models\Bangunan;
use Illuminate\Http\Request;

class BangunanController extends Controller
{
    public function AddBangunan(Request $request)
    {
        $request->validate([
            'id_sarana' => 'required',
            'jenis_bangunan' => 'required',
            'nama_bangunan' => 'required',
            'panjang' => 'required',
            'lebar' => 'required',
            'luas_tapak' => 'required',
            'kepemilikan' => 'required',
            'tahun_dibangun' => 'required',
            'tanggal_sk_pemakaian' => 'required',
        ]);
        try {
            Bangunan::create($request->all());
            return redirect('tanah')->with('success', 'berhasil di simpan');
        } catch (\Exception $e) {
            return redirect('tanah')->with('errors', 'gagal di simpan');
        }
    }
    public function UpdtBangunan(Request $request)
    {
        $request->validate([
            'id_sarana' => 'required',
            'jenis_bangunan' => 'required',
            'nama_bangunan' => 'required',
            'panjang' => 'required',
            'lebar' => 'required',
            'luas_tapak' => 'required',
            'kepemilikan' => 'required',
            'tahun_dibangun' => 'required',
            'tanggal_sk_pemakaian' => 'required',
        ]);
        try {
            $data = array(
                'id_sarana' => $request->post('id_sarana'),
                'jenis_bangunan' => $request->post('jenis_bangunan'),
                'nama_bangunan' => $request->post('nama_bangunan'),
                'panjang' => $request->post('panjang'),
                'lebar' => $request->post('lebar'),
                'luas_tapak' => $request->post('luas_tapak'),
                'kepemilikan' => $request->post('kepemilikan'),
                'tahun_dibangun' => $request->post('tahun_dibangun'),
                'tanggal_sk_pemakaian' => $request->post('tanggal_sk_pemakaian'),
            );
            Bangunan::where('id_bangunan', '=', $request->post('id_bangunan'))->update($data);
            return redirect('tanah')->with('success', 'berhasil di update');
        } catch (\Exception $e) {
            return redirect('tanah')->with('errors', 'gagal di update');
        }
    }
    public function Delete($id)
    {
        try {
            Bangunan::where('id_bangunan', '=', $id)->delete();
            return redirect('tanah')->with('success', 'berhasil di hapus');
        } catch (\Exception $e) {
            return redirect('tanah')->with('errors', 'gagal di hapus');
        }
    }
}
