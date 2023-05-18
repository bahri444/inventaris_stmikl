<?php

namespace App\Http\Controllers;

use App\Models\ProgramStudi;
use App\Models\VisiMisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Spatie\PdfToText\Pdf;

class VisiMisiController extends Controller
{
    public function GetVisiMisi()
    {
        $data = VisiMisi::with('programStudi')->get();

        $datasubmisi = Pdf::getText('file.pdf'); //convert teks from pdf
        $program_studi = ProgramStudi::select('kode_program_studi', 'nama_program_studi')->get();
        return view('superadmin.visi_misi', [
            'title' => 'Visi dan Misi',
            'visimisi' => $data,
            // 'datasubmisi' => $datasubmisi,
            'program_studi' => $program_studi,
        ]);
    }
    public function GetInfo($id)
    {
        $data = VisiMisi::with('programStudi')->get();
        return view('superadmin.visi_dan_misi', [
            'visi_dan_misi' => $data,
            'id' => $id,
            'title' => 'view visi dan misi'
        ]);
    }
    public function AddVisiMisi(Request $request)
    {
        $request->validate([
            'kode_program_studi' => 'required|max:5',
            'visi_dan_misi' => 'required|file|mimes:pdf|max:5000',
        ]);
        try {
            $getFile = $request->file('visi_dan_misi'); //ambil file yang di upload dari gambar
            $getFileName = $getFile->hashName(); //hash nama file yang di upload
            $request->visi_dan_misi->move(public_path('/storage/file_visi_misi'), $getFileName);
            $data = new VisiMisi([
                'kode_program_studi' => $request->kode_program_studi,
                'visi_dan_misi' => $getFileName,
            ]);
            $data->save();
            return redirect('visi_misi')->with('success', 'berhasil di tambahkan');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect('visi_misi')->with('errors', $e);
        }
    }
    public function UpdateVisiMisi(Request $request)
    {
        // dd($request);
        $request->validate([
            'kode_program_studi' => 'required|max:5',
            'visi_dan_misi' => 'required|file|mimes:pdf|max:5000',
        ]);
        try {
            $getFile = $request->file('visi_dan_misi'); //ambil file yang di upload dari gambar
            $getFileName = $getFile->hashName(); //hash nama file yang di upload
            $request->visi_dan_misi->move(public_path('/storage/file_visi_misi'), $getFileName);

            $data = array(
                'kode_program_studi' => $request->post('kode_program_studi'),
                'visi_dan_misi' => $getFileName,
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
