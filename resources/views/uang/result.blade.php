@extends('layouts.master')

@section('title', 'Hasil Konversi')

@section('content')
<style>
    .glass-card {
        background: rgba(255, 255, 255, 0.85);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border-radius: 15px;
        box-shadow: 0 6px 20px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
    }
    .glass-card:hover {
        transform: translateY(-5px);
    }
</style>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            {{-- Hasil Konversi --}}
            <div class="card shadow-lg border-0 rounded-3 mb-5">
                <div class="card-header bg-success text-white text-center">
                    <h4 class="mb-0">📊 Hasil Konversi Mata Uang</h4>
                </div>
                <div class="card-body text-center p-5">
                    
                    @if($hasil)
                        <h3 class="fw-bold text-primary mb-4">
                            {{ $jumlah }} {{ $asal }}  
                            <span class="text-dark">=</span>  
                            {{ number_format($hasil, 2) }} {{ $tujuan }}
                        </h3>
                        <p class="text-muted">Konversi berhasil dilakukan ✅</p>
                    @else
                        <div class="alert alert-danger">
                            Konversi gagal. Pastikan mata uang valid.
                        </div>
                    @endif

                    <div class="d-grid gap-2 mt-4">
                        <a href="{{ route('uang.index') }}" class="btn btn-outline-secondary btn-lg">
                            ⬅️ Kembali ke Form Konversi
                        </a>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-3 mb-3">
                    <div class="card glass-card currency-box text-center p-3 h-100">
                        <h4>🇮🇩 IDR</h4>
                        <p class="fw-bold text-primary">Rupiah</p>
                        <p class="small text-muted">Mata uang resmi Indonesia (Rp), digunakan sejak 1946.</p>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card glass-card currency-box text-center p-3 h-100">
                        <h4>🇺🇸 USD</h4>
                        <p class="fw-bold text-primary">Dollar Amerika</p>
                        <p class="small text-muted">Mata uang cadangan dunia, simbol kekuatan ekonomi global.</p>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card glass-card currency-box text-center p-3 h-100">
                        <h4>🇪🇺 EUR</h4>
                        <p class="fw-bold text-primary">Euro</p>
                        <p class="small text-muted">Mata uang resmi Uni Eropa, digunakan di 20 negara anggota.</p>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card glass-card currency-box text-center p-3 h-100">
                        <h4>🇯🇵 JPY</h4>
                        <p class="fw-bold text-primary">Yen Jepang</p>
                        <p class="small text-muted">Mata uang Jepang, salah satu yang paling banyak diperdagangkan di dunia.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
