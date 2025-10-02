@extends('layouts.master')

@section('title', 'Konversi Uang')

@section('content')
<style>
    body {
        background: linear-gradient(135deg, #f9f9f9 0%, #e3f2fd 100%);
    }
    .glass-card {
        background: rgba(255, 255, 255, 0.85);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border-radius: 20px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    }
    .convert-btn {
        transition: all 0.3s ease;
    }
    .convert-btn:hover {
        transform: scale(1.05);
        background-color: #28a745 !important;
    }
    .currency-box {
        transition: 0.3s;
    }
    .currency-box:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    }
</style>

<div class="container mt-4">

    <div class="text-center mb-4 p-3 rounded-4 shadow-sm glass-card mx-auto" style="max-width: 600px;">
        <img src="https://cdn-icons-png.flaticon.com/512/2331/2331941.png" 
             alt="Currency Logo" 
             width="60" 
             class="mb-2">
        <h3 class="fw-bold text-primary mb-1">Currency Converter</h3>
        <p class="small text-muted mb-0">Konversi mata uang cepat & mudah 💱</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card glass-card border-0 rounded-4">
                <div class="card-header bg-primary text-white text-center rounded-top-4 py-2">
                    <h5 class="mb-0">💱 Konversi Mata Uang</h5>
                </div>
                <div class="card-body p-4">

                    <form action="{{ route('uang.result') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="jumlah" class="form-label fw-bold">Jumlah</label>
                            <input type="number" class="form-control form-control-lg shadow-sm" 
                                   id="jumlah" name="jumlah" required 
                                   placeholder="Masukkan jumlah uang">
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="asal" class="form-label fw-bold">Mata Uang Asal</label>
                                <select name="asal" id="asal" class="form-select form-select-lg shadow-sm" required>
                                    <option value="IDR">🇮🇩 IDR - Rupiah</option>
                                    <option value="USD">🇺🇸 USD - Dollar</option>
                                    <option value="EUR">🇪🇺 EUR - Euro</option>
                                    <option value="JPY">🇯🇵 JPY - Yen</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="tujuan" class="form-label fw-bold">Mata Uang Tujuan</label>
                                <select name="tujuan" id="tujuan" class="form-select form-select-lg shadow-sm" required>
                                    <option value="IDR">🇮🇩 IDR - Rupiah</option>
                                    <option value="USD">🇺🇸 USD - Dollar</option>
                                    <option value="EUR">🇪🇺 EUR - Euro</option>
                                    <option value="JPY">🇯🇵 JPY - Yen</option>
                                </select>
                            </div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" 
                                    class="btn btn-success btn-lg shadow-lg convert-btn">
                                🔄 Konversi Sekarang
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-3 mb-3">
            <div class="card glass-card currency-box text-center p-3">
                <h4>🇮🇩 IDR</h4>
                <p class="fw-bold text-primary">Rupiah</p>
                <p class="small text-muted">Mata uang resmi Indonesia (Rp), digunakan sejak 1946.</p>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card glass-card currency-box text-center p-3">
                <h4>🇺🇸 USD</h4>
                <p class="fw-bold text-primary">Dollar Amerika</p>
                <p class="small text-muted">Mata uang cadangan dunia, simbol kekuatan ekonomi global.</p>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card glass-card currency-box text-center p-3">
                <h4>🇪🇺 EUR</h4>
                <p class="fw-bold text-primary">Euro</p>
                <p class="small text-muted">Mata uang resmi Uni Eropa, digunakan di 20 negara anggota.</p>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card glass-card currency-box text-center p-3">
                <h4>🇯🇵 JPY</h4>
                <p class="fw-bold text-primary">Yen Jepang</p>
                <p class="small text-muted">Mata uang Jepang, salah satu yang paling banyak diperdagangkan di dunia.</p>
            </div>
        </div>
    </div>

</div>
@endsection
