<?php

namespace App\Http\Controllers;

use App\Models\Misi;
use App\Models\Visi;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function GetVisiMisiTI()
    {
        $visi = Visi::with('JoinToTableKodeProgramStudi')->get();
        $data = Misi::with('JoinToTableSubMisi')->get();
        return view('home.teknikinformatika', [
            'title' => 'Data sub misi',
            'data' => $data,
            'visi' => $visi,
        ]);
    }
    public function GetVisiMisiSI()
    {
        $visi = Visi::with('JoinToTableKodeProgramStudi')->get();
        $data = Misi::with('JoinToTableSubMisi')->get();
        return view('home.sisteminformasi', [
            'title' => 'Data sub misi',
            'data' => $data,
            'visi' => $visi,
        ]);
    }
}
