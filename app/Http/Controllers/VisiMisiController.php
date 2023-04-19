<?php

namespace App\Http\Controllers;

use App\Models\ProgramStudi;
use App\Models\VisiMisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Expr\New_;

class VisiMisiController extends Controller
{
    public function GetVisiMisi()
    {
        $data = VisiMisi::with('programStudi')->get();
        $program_studi = ProgramStudi::select('kode_program_studi', 'nama_program_studi')->get();
        return view('superadmin.visi_misi', [
            'title' => 'Visi dan Misi',
            'visimisi' => $data,
            'program_studi' => $program_studi,
        ]);
    }
    public function AddVisiMisi(Request $request)
    {
        $request->validate([
            'kode_program_studi' => 'required|max:5',
            'visi' => 'required',
            'misi' => 'required',
        ]);
        try {
            VisiMisi::create($request->all())->save();
            return redirect('visi_misi')->with('success', 'berhasil di tambahkan');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect('visi_misi')->with('errors', $e);
        }
    }
    public function UpdateVisiMisi(Request $request)
    {
        $request->validate([
            'kode_program_studi' => 'required|max:5',
            'visi' => 'required',
            'misi' => 'required',
        ]);
        try {
            $data = array(
                'kode_program_studi' => $request->post('kode_program_studi'),
                'visi' => $request->post('visi'),
                'misi' => $request->post('misi'),
            );
            VisiMisi::where('id_visi_misi', '=', $request->post('id_visi_misi'))->update($data);
            return redirect('visi_misi')->with('success', 'berhasil di update');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect('visi_misi')->with('errors', $e);
        }
    }
    public function DeleteVisiMisi($id)
    {
        try {
            VisiMisi::where('id_visi_misi', '=', $id)->delete();
            return redirect('visi_misi')->with('success', 'berhasil di hapus');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect('visi_misi')->with('errors', $e);
        }
    }
}
