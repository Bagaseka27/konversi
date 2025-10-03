<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Uang;

class UangController extends Controller
{
    protected $uang;

    public function __construct()
    {
        $this->uang = new Uang();
    }

    public function index()
    {
        // Ambil semua data dari Model
        $currencies = $this->uang->getCurrencyInfo();
        $kursData = $this->uang->getKurs();

        return view('uang.index', compact('currencies', 'kursData'));
    }
}