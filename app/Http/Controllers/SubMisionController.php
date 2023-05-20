<?php

namespace App\Http\Controllers;

use App\Models\Misi;
use App\Models\SubMisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SubMisionController extends Controller
{
    public function GetSubMisi()
    {
        $data = SubMisi::with('JoinToTableMisi', 'JoinToProgramStudi')->get();
        $get_misi = Misi::select('kode_program_studi', 'id_misi', 'point_misi')->get();
        return view('superadmin.sub_misi', [
            'title' => 'Data sub misi',
            'data' => $data,
            'get_misi' => $get_misi,
        ]);
    }
    public function AddSubMisi(Request $request)
    {
        $request->validate([
            'id_misi' => 'required|max:5',
            'point_sub_misi' => 'required|max:255',
        ]);
        try {
            $data = new SubMisi($request->all());
            // dd($data);
            $data->save();
            return redirect('sub_misi')->with('success', 'berhasil di tambahkan');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect('sub_misi')->with('errors', $e);
        }
    }
    public function UpdateSubMisi(Request $request)
    {
        $request->validate([
            'id_misi' => 'required|max:5',
            'point_sub_misi' => 'required|max:255',
        ]);
        try {
            $data = array(
                'id_misi' => $request->post('id_misi'),
                'point_sub_misi' => $$request->post('point_sub_misi'),
            );
            SubMisi::where('id_sub_misi', $request->post('id_sub_misi'))->update($data);
            return redirect('sub_misi')->with('success', 'berhasil di edit');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect('sub_misi')->with('errors', $e);
        }
    }
    public function DeleteSubMisi($id)
    {
        try {
            SubMisi::where('id_misi', '=', $id)->delete();
            return redirect('sub_misi')->with('success', 'berhasil di hapus');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect('sub_misi')->with('errors', $e);
        }
    }
}
