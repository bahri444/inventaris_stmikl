<?php

namespace App\Http\Controllers;

use App\Models\ProgramStudi;
use App\Models\Visi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class VisiController extends Controller
{

    public function GetVisi()
    {
        $data_visi = Visi::with('JoinToTableProgramStudi')->get();
        $program_studi = ProgramStudi::select('kode_program_studi', 'nama_program_studi')->get();
        return view('superadmin.visi', [
            'title' => 'page visi',
            'data_visi' => $data_visi,
            'program_studi' => $program_studi,
        ]);
    }
    public function AddVisi(Request $request)
    {
        $request->validate([
            'kode_program_studi' => 'required|max:5',
            'point_visi' => 'required',
        ]);
        try {
            $data = new Visi($request->all());
            $data->save();
            return redirect('visi')->with('success', 'berhasil di tambahkan');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect('visi')->with('errors', $e);
        }
    }
    public function UpdateVisi(Request $request)
    {
        $request->validate([
            'kode_program_studi' => 'required|max:5',
            'point_visi' => 'required',
        ]);
        try {
            $data = array(
                'kode_program_studi' => $request->post('kode_program_studi'),
                'point_visi' => $$request->post('point_visi'),
            );
            Visi::where('id_visi', $request->post('id_visi'))->update($data);
            return redirect('visi')->with('success', 'berhasil di edit');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect('visi')->with('errors', $e);
        }
    }
    public function DeleteVisi($id)
    {
        try {
            Visi::where('id_visi', '=', $id)->delete();
            return redirect('visi')->with('success', 'berhasil di hapus');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect('visi')->with('errors', $e);
        }
    }
}
