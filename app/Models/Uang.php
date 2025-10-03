<?php

namespace App\Models;

class Uang
{
    protected $kurs = [
        'IDR' => 1,        // Indonesia
        'USD' => 16680,    // Amerika Serikat
        'EUR' => 19500,    // Euro
        'GBP' => 21500,    // Pound Sterling Inggris
        'SGD' => 12400,    // Singapore
        'AUD' => 10800,    // Australia
        'JPY' => 112,      // Jepang
        'KRW' => 12.5,     // Korea Selatan
        'MYR' => 3750,     // Ringgit Malaysia
        'CAD' => 12200,    // Kanada
        'SAR' => 4450,     // Saudi Arabia
    ];

    protected $currencyInfo = [
        'IDR' => [
            'name' => 'Rupiah Indonesia',
            'symbol' => '🏝️',
            'desc' => 'Mata uang resmi Republik Indonesia, digunakan di kepulauan Nusantara.',
            'color' => '#f5576c'
        ],
        'USD' => [
            'name' => 'Dollar Amerika',
            'symbol' => '🗽',
            'desc' => 'Mata uang cadangan dunia dan paling dominan dalam perdagangan internasional.',
            'color' => '#667eea'
        ],
        'EUR' => [
            'name' => 'Euro Eropa',
            'symbol' => '🗼',
            'desc' => 'Mata uang resmi Uni Eropa, digunakan oleh 19 negara anggota zona Euro.',
            'color' => '#764ba2'
        ],
        'GBP' => [
            'name' => 'Pound Sterling',
            'symbol' => '🎡',
            'desc' => 'Mata uang Inggris Raya, salah satu mata uang tertua yang masih digunakan.',
            'color' => '#5e72e4'
        ],
        'SGD' => [
            'name' => 'Dollar Singapore',
            'symbol' => '🦁',
            'desc' => 'Mata uang Singapore, pusat keuangan terbesar di Asia Tenggara.',
            'color' => '#2dce89'
        ],
        'AUD' => [
            'name' => 'Dollar Australia',
            'symbol' => '🦘',
            'desc' => 'Mata uang Australia, mata uang kelima paling diperdagangkan di dunia.',
            'color' => '#fb6340'
        ],
        'JPY' => [
            'name' => 'Yen Jepang',
            'symbol' => '🗾',
            'desc' => 'Mata uang Jepang dan salah satu mata uang paling stabil di Asia.',
            'color' => '#f093fb'
        ],
        'KRW' => [
            'name' => 'Won Korea',
            'symbol' => '🏯',
            'desc' => 'Mata uang Korea Selatan, negara dengan ekonomi teknologi terbesar.',
            'color' => '#11cdef'
        ],
        'MYR' => [
            'name' => 'Ringgit Malaysia',
            'symbol' => '🕌',
            'desc' => 'Mata uang resmi Malaysia, negara tetangga Indonesia di Asia Tenggara.',
            'color' => '#8965e0'
        ],
        'CAD' => [
            'name' => 'Dollar Kanada',
            'symbol' => '🍁',
            'desc' => 'Mata uang Kanada, mata uang komoditas utama dunia.',
            'color' => '#f5365c'
        ],
        'SAR' => [
            'name' => 'Riyal Saudi',
            'symbol' => '🕋',
            'desc' => 'Mata uang Arab Saudi, negara penghasil minyak terbesar di dunia.',
            'color' => '#ffd600'
        ],
    ];

    public function hitung($jumlah, $asal, $tujuan)
    {
        if (!isset($this->kurs[$asal]) || !isset($this->kurs[$tujuan])) {
            return null;
        }

        $idr = $jumlah * $this->kurs[$asal];
        return $idr / $this->kurs[$tujuan];
    }

    public function getKurs()
    {
        return $this->kurs;
    }

    public function getCurrencyInfo($code = null)
    {
        if ($code) {
            return $this->currencyInfo[$code] ?? null;
        }
        return $this->currencyInfo;
    }

    public function getAllCurrencies()
    {
        return array_keys($this->kurs);
    }
}