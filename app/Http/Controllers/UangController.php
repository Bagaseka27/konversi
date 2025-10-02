<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Uang;

class UangController extends Controller
{
    public function index()
    {
        return view('uang.index');
    }

    public function proses(Request $request)
    {
        $konversi = new Uang();
        $hasil = $konversi->hitung($request->jumlah, $request->asal, $request->tujuan);

        return view('uang.result', [
            'jumlah' => $request->jumlah,
            'asal'   => $request->asal,
            'tujuan' => $request->tujuan,
            'hasil'  => $hasil
        ]);
    }
}
