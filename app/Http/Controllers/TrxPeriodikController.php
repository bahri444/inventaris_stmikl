<?php

namespace App\Http\Controllers;

use App\Models\Sarana;
use App\Models\TrxPeriodik;
use Illuminate\Http\Request;

class TrxPeriodikController extends Controller
{
    public function GetTrxPeriodik()
    {
        $fields = ['jumlah_total_trx',    'jumlah_like_trx'];
        $trxPeriodik = TrxPeriodik::joinToSarana()->get();
        $sarana = Sarana::select('id_sarana', 'nama_sarana')->get();
        return view('superadmin.trxperiodik', [
            'title' => 'data transaksi periodik',
            'trxperiodik' => $trxPeriodik,
            'fields' => $fields,
            'sarana' => $sarana,
        ]);
    }

    public function AddTrxPeriodik(Request $request)
    {
        $request->validate([
            'id_sarana' => 'required',
            'jumlah_total_trx' => 'required|max:3',
            'jumlah_like_trx' => 'required|max:3',
        ]);
        try {
            TrxPeriodik::create($request->all());
            return redirect('trxperiodik')->with('success', 'berhasil');
        } catch (\Exception $e) {
            return redirect('trxperiodik')->with('errors', 'gagal');
        }
    }

    public function UpdtTrxPeriodik(Request $request)
    {
        $request->validate([
            'id_sarana' => 'required',
            'jumlah_total_trx' => 'required|max:3',
            'jumlah_like_trx' => 'required|max:3',
        ]);
        try {
            $data = array(
                'id_sarana' => $request->post('id_sarana'),
                'jumlah_total_trx' => $request->post('jumlah_total_trx'),
                'jumlah_like_trx' => $request->post('jumlah_like_trx'),
            );
            TrxPeriodik::where('id_sarana_periodik', '=', $request->post('id_sarana_periodik'))->update($data);
            return redirect('trxperiodik')->with('success', 'berhasil');
        } catch (\Exception $e) {
            return redirect('trxperiodik')->with('errors', 'gagal');
        }
    }

    public function Delete($id)
    {
        try {
            TrxPeriodik::where('id_sarana_periodik', '=', $id)->delete();
            return redirect('trxperiodik')->with('success', 'berhasil');
        } catch (\Exception $e) {
            return redirect('trxperiodik')->with('errors', 'gagal');
        }
    }
}
