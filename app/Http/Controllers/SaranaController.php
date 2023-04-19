<?php

namespace App\Http\Controllers;

use App\Models\Ruang;
use App\Models\Sarana;
use App\Models\TahunAkademik;
use Illuminate\Http\Request;

class SaranaController extends Controller
{
    public function GetSarana()
    {
        $sarana = Sarana::joinToRuang()->joinToBangunan()->get();
        $ruang = Ruang::select('id_ruang', 'nama_ruang')->get();
        $fields = [
            'nama_sarana',
            'spesifikasi',
            'kepemilikan_sarana',
            'jumlah_total',
            // 'jumlah_like'
        ];
        return view('superadmin.sarana', [
            'title' => 'data sarana',
            'sarana' => $sarana,
            'ruang' => $ruang,
            'fields' => $fields,
        ]);
    }
    public function AddSarana(Request $request)
    {
        $request->validate([
            'id_ruang' => 'required',
            'nama_sarana' => 'required|max:50',
            'spesifikasi' => 'required|max:50',
            'kepemilikan_sarana' => 'required|max:15',
            'jumlah_total' => 'required|max:3',
            // 'jumlah_like' => 'required|max:3',
        ]);
        try {
            Sarana::create($request->all());
            return redirect('sarana')->with('success', 'berhasil');
        } catch (\Exception $e) {
            return redirect('sarana')->with('errors', $e);
        }
    }
    public function UpdtSarana(Request $request)
    {
        $request->validate([
            'id_ruang' => 'required',
            'nama_sarana' => 'required|max:50',
            'spesifikasi' => 'required|max:50',
            'kepemilikan_sarana' => 'required|max:15',
            'jumlah_total' => 'required|max:3',
            // 'jumlah_like' => 'required|max:3',
        ]);
        try {
            $data = array(
                'id_ruang' => $request->post('id_ruang'),
                'nama_sarana' => $request->post('nama_sarana'),
                'spesifikasi' => $request->post('spesifikasi'),
                'kepemilikan_sarana' => $request->post('kepemilikan_sarana'),
                'jumlah_total' => $request->post('jumlah_total'),
                // 'jumlah_like' => $request->post('jumlah_like'),
            );
            Sarana::where('id_sarana', '=', $request->post('id_sarana'))->update($data);
            return redirect('sarana')->with('success', 'berhasil');
        } catch (\Exception $e) {
            return redirect('sarana')->with('errors', $e);
        }
    }
    public function Delete($id)
    {
        try {
            Sarana::where('id_sarana', '=', $id)->delete();
            return redirect('sarana')->with('success', 'berhasil');
        } catch (\Exception $e) {
            return redirect('sarana')->with('errors', $e);
        }
    }
}
