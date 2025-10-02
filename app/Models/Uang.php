<?php

namespace App\Models;

class Uang
{
    protected $kurs = [
        'IDR' => 1,
        'USD' => 16680,
        'EUR' => 19500,
        'JPY' => 112,
    ];

    public function hitung($jumlah, $asal, $tujuan)
    {
        if (!isset($this->kurs[$asal]) || !isset($this->kurs[$tujuan])) {
            return null;
        }

        $idr = $jumlah * $this->kurs[$asal];
        return $idr / $this->kurs[$tujuan];
    }
}
