<?php

namespace App\Http\Controllers;

use App\Models\Bangunan;
use App\Models\Ruang;
use Illuminate\Http\Request;

class RuangController extends Controller
{
    public function GetRuang()
    {
        $ruang = Ruang::joinToBangunan()->get();
        $bangunan = Bangunan::select('id_bangunan', 'nama_bangunan')->get();
        $fields = ['kode_ruang',    'nama_ruang',    'panjang',    'lebar',    'luas_ruang',    'kapasitas'];
        return view('superadmin.ruang', [
            'title' => 'data ruang',
            'ruang' => $ruang,
            'fields' => $fields,
            'bangunan' => $bangunan,
        ]);
    }
    public function AddRuang(Request $request)
    {
        $request->validate([
            'id_bangunan' => 'required',
            'kode_ruang' => 'required',
            'nama_ruang' => 'required',
            'panjang' => 'required',
            'lebar' => 'required',
            'luas_ruang' => 'required',
            'kapasitas' => 'required',
        ]);
        try {
            Ruang::create($request->all());
            return redirect('ruang')->with('success', 'berhasil di simpan');
        } catch (\Exception $e) {
            return redirect('ruang')->with('errors', 'gagal di simpan');
        }
    }
    public function UpdtRuang(Request $request)
    {
        $request->validate([
            'id_bangunan' => 'required',
            'kode_ruang' => 'required',
            'nama_ruang' => 'required',
            'panjang' => 'required',
            'lebar' => 'required',
            'luas_ruang' => 'required',
            'kapasitas' => 'required',
        ]);
        try {

            $data = array(
                'id_bangunan' => $request->post('id_bangunan'),
                'kode_ruang' => $request->post('kode_ruang'),
                'nama_ruang' => $request->post('nama_ruang'),
                'panjang' => $request->post('panjang'),
                'lebar' => $request->post('lebar'),
                'luas_ruang' => $request->post('luas_ruang'),
                'kapasitas' => $request->post('kapasitas'),
            );
            Ruang::where('id_ruang', '=', $request->post('id_ruang'))->update($data);
            return redirect('ruang')->with('success', 'berhasil di update');
        } catch (\Exception $e) {
            return redirect('ruang')->with('errors', 'gagal di update');
        }
    }
    public function Delete($id)
    {
        try {
            Ruang::where('id_ruang', '=', $id)->delete();
            return redirect('ruang')->with('success', 'berhasil di hapus');
        } catch (\Exception $e) {
            return redirect('ruang')->with('errors', 'gagal di hapus');
        }
    }
}
