<?php

namespace App\Http\Controllers;

use App\Models\TrxRuang;
use App\Models\TrxSarana;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function ViewDashboard()
    {
        $ruang_masih_bagus = TrxRuang::where('kerusakan', '=', 'tidak ada kerusakan')->get()->count();
        $ruang_kondisi_rusak_sedang = TrxRuang::where('kerusakan', '=', 'rusak sedang')->get()->count();
        $ruang_kondisi_rusak_berat = TrxRuang::where('kerusakan', '=', 'rusak berat')->get()->count();

        $transaksi_kondisi_ruang = TrxRuang::joinToRuang()->joinToTahunAkademik()->get();
        $transaksi_sarana_periodik = TrxSarana::joinToSarana()->joinToRuang()->joinToTahunAkademik()->orderBy('id_transaksi_sarana', 'desc')->get();

        $data_total_sarana = TrxSarana::joinToSarana()->select('id_tahun_akademik', 'jumlah_total')->groupBy('id_tahun_akademik')->sum('jumlah_total');
        $total_sarana_like = TrxSarana::joinToSarana()->select('id_tahun_akademik', 'jumlah_like')->groupBy('id_tahun_akademik')->sum('jumlah_like');
        $jumlah_rusak = ($data_total_sarana - $total_sarana_like);

        $getId_tahun_akademik_in_trxSarana = TrxSarana::select('id_tahun_akademik')->limit(1)->get();
        return view('superadmin.dashboard', [
            'title' => 'Dashboard',
            'transaksi_kondisi_ruang' => $transaksi_kondisi_ruang,
            'transaksi_sarana_periodik' => $transaksi_sarana_periodik,

            'masih_bagus' => $ruang_masih_bagus,
            'rusak_sedang' => $ruang_kondisi_rusak_sedang,
            'rusak_berat' => $ruang_kondisi_rusak_berat,

            'data_total_sarana' => $data_total_sarana,
            'total_sarana_like' => $total_sarana_like,
            'jumlah_rusak' => $jumlah_rusak,

            'getId_tahun_akademik_in_trxSarana' => $getId_tahun_akademik_in_trxSarana
        ]);
    }
}
