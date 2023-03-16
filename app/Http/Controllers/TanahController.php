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
        $fields = [
            'jenis_prasarana',
            'nama_prasarana',
            'no_sertifikat_tanah',
            'panjang',
            'lebar',
            'luas_lahan_tersedia',
            'kepemilikan',
            'alamat',
            'rt',
            'rw',
            'nama_dusun',
            'desa_kelurahan',
            'kecamatan',
            'kode_pos'
        ];
        return view('superadmin.tanah', [
            'title' => 'Tanah dan bangunan',
            'tanah' => $tanah,
            'bangunan' => $bangunan,
            'fields' => $fields
        ]);
    }
    public function AddTanah(Request $request)
    {
        $request->validate([
            'jenis_prasarana' => 'required',
            'nama_prasarana' => 'required',
            'no_sertifikat_tanah' => 'required',
            'panjang' => 'required',
            'lebar' => 'required',
            'luas_lahan_tersedia' => 'required',
            'kepemilikan' => 'required',
            'alamat' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'nama_dusun' => 'required',
            'desa_kelurahan' => 'required',
            'kecamatan' => 'required',
            'kode_pos' => 'required'
        ]);
        try {
            Tanah::create($request->all());
            redirect()->back()->with('tanah');
            return redirect('tanah')->with('success', 'berhasil');
        } catch (\Exception $e) {
            return redirect('tanah')->with('errors', 'gagal');
        }
    }
    public function UpdtTanah(Request $request)
    {
        $request->validate([
            'jenis_prasarana' => 'required',
            'nama_prasarana' => 'required',
            'no_sertifikat_tanah' => 'required',
            'panjang' => 'required',
            'lebar' => 'required',
            'luas_lahan_tersedia' => 'required',
            'kepemilikan' => 'required',
            'alamat' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'nama_dusun' => 'required',
            'desa_kelurahan' => 'required',
            'kecamatan' => 'required',
            'kode_pos' => 'required'
        ]);
        try {
            $data = array(
                'jenis_prasarana' => $request->post('jenis_prasarana'),
                'nama_prasarana' => $request->post('nama_prasarana'),
                'no_sertifikat_tanah' => $request->post('no_sertifikat_tanah'),
                'panjang' => $request->post('panjang'),
                'lebar' => $request->post('lebar'),
                'luas_lahan_tersedia' => $request->post('luas_lahan_tersedia'),
                'kepemilikan' => $request->post('kepemilikan'),
                'alamat' => $request->post('alamat'),
                'rt' => $request->post('rt'),
                'rw' => $request->post('rw'),
                'nama_dusun' => $request->post('nama_dusun'),
                'desa_kelurahan' => $request->post('desa_kelurahan'),
                'kecamatan' => $request->post('kecamatan'),
                'kode_pos' => $request->post('kode_pos')
            );
            Tanah::where('id_sarana', '=', $request->post('id_sarana'))->update($data);
            redirect()->back()->with('tanah');
            return redirect('tanah')->with('success', 'berhasil');
        } catch (\Exception $e) {
            return redirect('tanah')->with('errors', 'gagal');
        }
    }

    public function Delete($id)
    {
        try {
            Tanah::where('id_sarana', '=', $id)->delete();
            redirect()->back()->with('tanah');
            return redirect('tanah')->with('success', 'berhasil');
        } catch (\Exception $e) {
            return redirect('tanah')->with('errors', 'gagal');
        }
    }
}
