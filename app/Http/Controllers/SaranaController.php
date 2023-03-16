<?php

namespace App\Http\Controllers;

use App\Models\Sarana;
use Illuminate\Http\Request;

class SaranaController extends Controller
{
    public function GetSarana()
    {
        $sarana = Sarana::all();
        $fields = ['nama_sarana',    'spesifikasi',    'kepemilikan',    'jumlah_total',    'jumlah_like'];
        return view('superadmin.sarana', [
            'title' => 'data sarana',
            'sarana' => $sarana,
            'fields' => $fields
        ]);
    }
    public function AddSarana(Request $request)
    {
        $request->validate([
            'nama_sarana' => 'required',
            'spesifikasi' => 'required',
            'kepemilikan' => 'required',
            'jumlah_total' => 'required',
            'jumlah_like' => 'required',
        ]);
        try {
            Sarana::create($request->all());
            // redirect()->back()->with('sarana');
            return redirect('sarana')->with('success', 'berhasil');
        } catch (\Exception $e) {
            return redirect('sarana')->with('errors', 'gagal');
        }
    }
    public function UpdtSarana(Request $request)
    {
        $request->validate([
            'nama_sarana' => 'required',
            'spesifikasi' => 'required',
            'kepemilikan' => 'required',
            'jumlah_total' => 'required',
            'jumlah_like' => 'required',
        ]);
        try {
            $data = array(
                'nama_sarana' => $request->post('nama_sarana'),
                'spesifikasi' => $request->post('spesifikasi'),
                'kepemilikan' => $request->post('kepemilikan'),
                'jumlah_total' => $request->post('jumlah_total'),
                'jumlah_like' => $request->post('jumlah_like'),
            );
            Sarana::where('id_sarana', '=', $request->post('id_sarana'))->update($data);
            return redirect('sarana')->with('success', 'berhasil');
        } catch (\Exception $e) {
            return redirect('sarana')->with('errors', 'gagal');
        }
    }
    public function Delete($id)
    {
        try {
            Sarana::where('id_sarana', '=', $id)->delete();
            // redirect()->back()->with('sarana');
            return redirect('sarana')->with('success', 'berhasil');
        } catch (\Exception $e) {
            return redirect('sarana')->with('errors', 'gagal');
        }
    }
}
