<?php

namespace App\Http\Controllers;

use App\Models\ProgramStudi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProgramStudiController extends Controller
{
    public function GetProgramStudi()
    {
        $data = ProgramStudi::all();
        return view('superadmin.program_studi', [
            'title' => 'Program Studi',
            'program_studi' => $data,
        ]);
    }
    public function AddProgramStudi(Request $request)
    {
        $request->validate([
            'kode_program_studi' => 'required|max:5',
            'nama_program_studi' => 'required|max:20',
        ]);
        try {
            ProgramStudi::create($request->all())->save();
            return redirect('program_studi')->with('success', 'berhasil di tambahkan');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect('program_studi')->with('errors', $e);
        }
    }
    public function UpdateProgramStudi(Request $request)
    {
        $request->validate([
            'kode_program_studi' => 'required|max:5',
            'nama_program_studi' => 'required|max:20',
        ]);
        try {
            $data = array(
                // 'kode_program_studi' => $request->post('kode_program_studi'),
                'nama_program_studi' => $request->post('nama_program_studi'),
            );
            ProgramStudi::where('kode_program_studi', '=', $request->post('kode_program_studi'))->update($data);
            return redirect('program_studi')->with('success', 'berhasil di update');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect('program_studi')->with('errors', $e);
        }
    }
    public function DeleteProgramStudi($id)
    {
        try {
            ProgramStudi::where('kode_program_studi', '=', $id)->delete();
            return redirect('program_studi')->with('success', 'berhasil di hapus');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect('program_studi')->with('errors', $e);
        }
    }
}
