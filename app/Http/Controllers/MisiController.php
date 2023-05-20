<?php

namespace App\Http\Controllers;

use App\Models\Misi;
use App\Models\ProgramStudi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MisiController extends Controller
{
    public function GetMisi()
    {
        $data_misi = Misi::with('JoinToTableProgramStudi')->get();
        // dd($data_misi);
        $program_studi = ProgramStudi::select('kode_program_studi', 'nama_program_studi')->get();
        return view('superadmin.misi', [
            'title' => 'Misi',
            'data_misi' => $data_misi,
            'program_studi' => $program_studi,
        ]);
    }
    public function AddMisi(Request $request)
    {
        $request->validate([
            'kode_program_studi' => 'required|max:5',
            'point_misi' => 'required|max:255',
        ]);
        try {
            $data = new Misi($request->all());
            $data->save();
            return redirect('misi')->with('success', 'berhasil di tambahkan');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect('misi')->with('errors', $e);
        }
    }
    public function UpdateMisi(Request $request)
    {
        $request->validate([
            'kode_program_studi' => 'required|max:5',
            'point_misi' => 'required|max:255',
        ]);
        try {
            $data = array(
                'kode_program_studi' => $request->post('kode_program_studi'),
                'point_misi' => $$request->post('point_misi'),
            );
            Misi::where('id_misi', $request->post('id_misi'))->update($data);
            return redirect('misi')->with('success', 'berhasil di edit');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect('misi')->with('errors', $e);
        }
    }
    public function DeleteMisi($id)
    {
        try {
            Misi::where('id_misi', '=', $id)->delete();
            return redirect('misi')->with('success', 'berhasil di hapus');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect('misi')->with('errors', $e);
        }
    }
}
