<?php

namespace App\Http\Controllers;

use App\Models\Bangunan;
use App\Models\Sarana;
use App\Models\Tanah;
use Illuminate\Http\Request;

class TanahController extends Controller
{
    public function GetTanahBangunan()
    {
        $tanah = Tanah::all();
        $bangunan = Bangunan::joinToTanah()->get();
        $tanahid = Tanah::select('id_tanah', 'nama_prasarana')->get();
        // dd($bangunan);
        $fields = [
            'jenis_prasarana',
            'nama_prasarana',
            'no_sertifikat_tanah',
            'panjang_tanah',
            'lebar_tanah',
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
        $fieldsBangunan = [
            'jenis_bangunan',
            'nama_bangunan',
            'panjang_bangunan',
            'lebar_bangunan',
            'luas_tapak',
            // 'kepemilikan',
            'tahun_dibangun',
        ];
        return view('superadmin.tanah', [
            'title' => 'Tanah dan bangunan',
            'tanah' => $tanah,
            'bangunan' => $bangunan,
            'fields' => $fields,
            'tanahid' => $tanahid,
            'fieldsBangunan' => $fieldsBangunan
        ]);
    }
    public function AddTanah(Request $request)
    {
        $request->validate([
            'jenis_prasarana' => 'required|max:10',
            'nama_prasarana' => 'required|max:50',
            'no_sertifikat_tanah' => 'required|max:20',
            'panjang_tanah' => 'required|max:4',
            'lebar_tanah' => 'required|max:4',
            'luas_lahan_tersedia' => 'required|max:4',
            'kepemilikan' => 'required|max:20',
            'alamat' => 'required|max:50',
            'rt' => 'required|max:3',
            'rw' => 'required|max:3',
            'nama_dusun' => 'required|max:20',
            'desa_kelurahan' => 'required|max:20',
            'kecamatan' => 'required|max:20',
            'kode_pos' => 'required|max:5'
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
            'jenis_prasarana' => 'required|max:10',
            'nama_prasarana' => 'required|max:50',
            'no_sertifikat_tanah' => 'required|max:20',
            'panjang_tanah' => 'required|max:4',
            'lebar_tanah' => 'required|max:4',
            'luas_lahan_tersedia' => 'required|max:4',
            'kepemilikan' => 'required|max:20',
            'alamat' => 'required|max:50',
            'rt' => 'required|max:3',
            'rw' => 'required|max:3',
            'nama_dusun' => 'required|max:20',
            'desa_kelurahan' => 'required|max:20',
            'kecamatan' => 'required|max:20',
            'kode_pos' => 'required|max:5'
        ]);
        try {
            $data = array(
                'jenis_prasarana' => $request->post('jenis_prasarana'),
                'nama_prasarana' => $request->post('nama_prasarana'),
                'no_sertifikat_tanah' => $request->post('no_sertifikat_tanah'),
                'panjang_tanah' => $request->post('panjang_tanah'),
                'lebar_tanah' => $request->post('lebar_tanah'),
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
            Tanah::where('id_tanah', '=', $request->post('id_tanah'))->update($data);
            redirect()->back()->with('tanah');
            return redirect('tanah')->with('success', 'berhasil');
        } catch (\Exception $e) {
            return redirect('tanah')->with('errors', 'gagal');
        }
    }

    public function Delete($id)
    {
        try {
            Tanah::where('id_tanah', '=', $id)->delete();
            redirect()->back()->with('tanah');
            return redirect('tanah')->with('success', 'berhasil');
        } catch (\Exception $e) {
            return redirect('tanah')->with('errors', 'gagal');
        }
    }
}
