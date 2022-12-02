<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\DB;

class CetakDokumenController extends Controller
{
    public function cetak_kwitansi($id)
    {
        $data["data"] = DB::table('user_detail')
            ->where('id_user_detail', '=', $id)
            ->join('baju_batik', 'user_detail.id_baju_batik', '=', 'baju_batik.id_baju_batik')
            ->join('baju_olahraga', 'user_detail.id_baju_olahraga', '=', 'baju_olahraga.id_baju_olahraga')
            ->get();
        // echo var_dump($data["data"]);
        // die();

        $pdf = PDF::loadView('siswa.kwitansi', $data);

        return $pdf->download('tagihan_siswa.pdf');
    }
}
