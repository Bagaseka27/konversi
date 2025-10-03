@extends('layouts.master')

@section('title', 'Kalkulator Kurs & Info Mata Uang')

@push('styles')
<style>
    body {
        background: linear-gradient(135deg, #ffffffff 0%, #b1d3f5ff 50%, #5079e1ff 100%);
        min-height: 100vh;
    }
    
    .hero-section {
        padding: 40px 0;
    }
    
    .calculator-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border-radius: 30px;
        padding: 40px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        border: 2px solid rgba(255, 255, 255, 0.5);
    }
    
    .result-box {
        background: linear-gradient(135deg, #4661fcff 0%, #8cb6f1ff 100%);
        color: white;
        padding: 30px;
        border-radius: 20px;
        margin-top: 20px;
        display: none;
        animation: slideDown 0.5s ease;
    }
    
    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .result-box.show {
        display: block;
    }
    
    .currency-input {
        border: 2px solid #e0e0e0;
        border-radius: 15px;
        padding: 15px;
        font-size: 1.1rem;
        transition: all 0.3s ease;
    }
    
    .currency-input:focus {
        border-color: #c0cbffff;
        box-shadow: 0 0 0 0.2rem rgba(107, 130, 237, 0.8);
        transform: scale(1.02);
    }
    
    .currency-select {
        border: 2px solid #e0e0e0;
        border-radius: 15px;
        padding: 15px;
        font-size: 1.1rem;
        cursor: pointer;
        transition: all 0.3s ease;
        background: white;
    }
    
    .currency-select:focus {
        border-color: #9088ffff;
        box-shadow: 0 0 0 0.2rem rgba(75, 114, 162, 0.25);
    }
    
    .convert-btn {
        background: linear-gradient(135deg, #667eea 0%, #1951c9ff 100%);
        border: none;
        border-radius: 20px;
        padding: 18px;
        font-size: 1.2rem;
        font-weight: bold;
        color: white;
        transition: all 0.4s ease;
        box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
    }
    
    .convert-btn:hover {
        transform: translateY(-3px) scale(1.03);
        box-shadow: 0 15px 40px rgba(102, 126, 234, 0.6);
        background: linear-gradient(135deg, #3750c1ff 0%, #001b54ff  100%);
    }
    
    .info-card {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
        border-radius: 25px;
        padding: 30px;
        height: 100%;
        border: 2px solid rgba(255, 255, 255, 0.5);
        transition: all 0.4s ease;
    }
    
    .info-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 45px rgba(0, 0, 0, 0.2);
        border-color: #29a6e0ff;
    }
    
    .rate-card {
        background: linear-gradient(135deg, #93a6fbff 0%, #5764f5ff 100%);
        color: white;
        border-radius: 20px;
        padding: 25px;
        transition: all 0.4s ease;
        cursor: pointer;
        border: 2px solid rgba(255, 255, 255, 0.3);
    }
    
    .rate-card:hover {
        transform: translateY(-8px) rotate(2deg);
        box-shadow: 0 15px 40px rgba(87, 111, 245, 0.5);
    }
    
    .currency-card {
        background: rgba(255, 255, 255, 0.95);
        border-radius: 20px;
        padding: 30px;
        transition: all 0.4s ease;
        border: 2px solid #e0e0e0;
        height: 100%;
    }
    
    .currency-card:hover {
        transform: translateY(-12px) scale(1.05);
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.25);
        border-color: #667eea;
    }
    
    .currency-flag {
        font-size: 4rem;
        margin-bottom: 15px;
        display: inline-block;
        animation: float 3s ease-in-out infinite;
    }
    
    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }
    
    .table-modern {
        background: rgba(255, 255, 255, 0.95);
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    }
    
    .table-modern thead {
        background: linear-gradient(135deg, #8196f6ff 0%, #4840dbff 100%);
        color: white;
    }
    
    .table-modern tbody tr {
        transition: all 0.3s ease;
    }
    
    .table-modern tbody tr:hover {
        background: rgba(102, 126, 234, 0.1);
        transform: scale(1.01);
    }
    
    .section-title {
        color: white;
        font-weight: bold;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        margin-bottom: 30px;
    }
    
    .faq-accordion .accordion-item {
        background: rgba(255, 255, 255, 0.95);
        border: 2px solid rgba(255, 255, 255, 0.5);
        border-radius: 15px;
        margin-bottom: 15px;
        overflow: hidden;
    }
    
    .faq-accordion .accordion-button {
        background: linear-gradient(135deg, #7d92f0ff 0%, #4c61ecff 100%);
        color: white;
        font-weight: bold;
        border-radius: 15px;
    }
    
    .faq-accordion .accordion-button:not(.collapsed) {
        background: linear-gradient(135deg, #607bf4ff 0%, #3c52dfff 100%);
    }
    
    .swap-btn {
        background: white;
        border: 2px solid #667eea;
        border-radius: 50%;
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 1.5rem;
    }
    
    .swap-btn:hover {
        transform: rotate(180deg);
        background: #667eea;
        color: white;
    }
</style>
@endpush

@section('content')

<!-- Hero / Kalkulator -->
<div class="hero-section" data-aos="fade-down">
    <div class="calculator-card mx-auto" style="max-width: 800px;">
        <div class="text-center mb-4">
            <h1 class="fw-bold" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                💱 Kalkulator Kurs Universal
            </h1>
            <p class="text-muted">Konversi 11 mata uang internasional secara real-time!</p>
        </div>
        
        <form id="currencyForm">
            <div class="row align-items-center mb-3">
                <div class="col-md-5 mb-3">
                    <label class="form-label fw-bold">Jumlah & Mata Uang Asal</label>
                    <div class="input-group">
                        <input type="number" id="jumlah" class="currency-input form-control" placeholder="Masukkan jumlah" value="1000" required step="0.01">
                        <select id="asal" class="currency-select form-select">
                            @foreach($currencies as $code => $info)
                                <option value="{{ $code }}">{{ $info['symbol'] }} {{ $code }} - {{ $info['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="col-md-2 mb-3 text-center">
                    <button type="button" class="swap-btn mx-auto" id="swapBtn" title="Tukar mata uang">
                        ⇄
                    </button>
                </div>
                
                <div class="col-md-5 mb-3">
                    <label class="form-label fw-bold">Mata Uang Tujuan</label>
                    <select id="tujuan" class="currency-select form-select">
                        @foreach($currencies as $code => $info)
                            <option value="{{ $code }}" {{ $code == 'USD' ? 'selected' : '' }}>{{ $info['symbol'] }} {{ $code }} - {{ $info['name'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            
            <button type="submit" class="convert-btn w-100">
                🔄 Konversi Sekarang
            </button>
        </form>
        
        <!-- Result Box -->
        <div id="resultBox" class="result-box">
            <div class="text-center">
                <h3 class="mb-3">✨ Hasil Konversi</h3>
                <div class="row">
                    <div class="col-6">
                        <p class="mb-1 opacity-75">Dari:</p>
                        <h4 id="fromAmount" class="fw-bold">-</h4>
                    </div>
                    <div class="col-6">
                        <p class="mb-1 opacity-75">Menjadi:</p>
                        <h4 id="toAmount" class="fw-bold">-</h4>
                    </div>
                </div>
                <hr class="my-3" style="border-color: rgba(255,255,255,0.3);">
                <p class="mb-0 small opacity-75">Rate: 1 <span id="rateFrom"></span> = <span id="rateValue"></span> <span id="rateTo"></span></p>
            </div>
        </div>
    </div>
</div>

<!-- Info Fitur -->
<div class="row mb-5 mt-5">
    <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
        <div class="info-card text-center">
            <div style="font-size: 3rem; margin-bottom: 15px;">⚡</div>
            <h4 class="fw-bold mb-3" style="color: #667eea;">Instan & Cepat</h4>
            <p class="text-muted">
                Konversi langsung tanpa reload halaman. Perhitungan dilakukan secara real-time dengan data dari Model MVC.
            </p>
        </div>
    </div>
    <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
        <div class="info-card text-center">
            <div style="font-size: 3rem; margin-bottom: 15px;">🎯</div>
            <h4 class="fw-bold mb-3" style="color: #764ba2;">Akurat & Tepat</h4>
            <p class="text-muted">
                Menggunakan data kurs terupdate dari Model untuk memberikan hasil konversi yang akurat dan terpercaya.
            </p>
        </div>
    </div>
    <div class="col-md-4" data-aos="fade-left" data-aos-delay="300">
        <div class="info-card text-center">
            <div style="font-size: 3rem; margin-bottom: 15px;">🌍</div>
            <h4 class="fw-bold mb-3" style="color: #f5576c;">11 Mata Uang Global</h4>
            <p class="text-muted">
                Mendukung berbagai mata uang populer dari Asia, Eropa, Amerika hingga Timur Tengah dengan simbol unik.
            </p>
        </div>
    </div>
</div>

<!-- Kurs Populer -->
<h3 class="text-center section-title" data-aos="fade-up">📊 Kurs Populer Hari Ini</h3>
<div class="row mb-5 justify-content-center">
    @php
        $popularRates = [
            ['from'=>'IDR','to'=>'USD','emoji'=>'🏝️→🗽'],
            ['from'=>'USD','to'=>'EUR','emoji'=>'🗽→🗼'],
            ['from'=>'GBP','to'=>'SGD','emoji'=>'🎡→🦁'],
            ['from'=>'JPY','to'=>'KRW','emoji'=>'🗾→🏯'],
            ['from'=>'AUD','to'=>'MYR','emoji'=>'🦘→🕌'],
            ['from'=>'CAD','to'=>'SAR','emoji'=>'🍁→🕋'],
        ];
    @endphp
    @foreach($popularRates as $k)
    @php
        $rate = $kursData[$k['from']] / $kursData[$k['to']];
    @endphp
    <div class="col-lg-2 col-md-4 col-sm-6 mb-3" data-aos="flip-left" data-aos-delay="{{ $loop->index * 100 }}">
        <div class="rate-card text-center">
            <div style="font-size: 1.5rem; margin-bottom: 10px;">{{ $k['emoji'] }}</div>
            <h6 class="fw-bold">{{ $k['from'] }} → {{ $k['to'] }}</h6>
            <h5 class="mb-0 fw-bold">{{ number_format($rate, 4) }}</h5>
        </div>
    </div>
    @endforeach
</div>

<!-- Mata Uang Info -->
<h3 class="text-center section-title" data-aos="fade-right">💰 Informasi Mata Uang Dunia</h3>
<div class="row mb-5">
    @foreach($currencies as $code => $info)
    <div class="col-xl-3 col-lg-4 col-md-6 mb-4" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 50 }}">
        <div class="currency-card text-center">
            <div class="currency-flag">{{ $info['symbol'] }}</div>
            <h4 class="fw-bold" style="color: {{ $info['color'] }};">{{ $code }}</h4>
            <p class="fw-bold text-dark mb-2">{{ $info['name'] }}</p>
            <p class="small text-muted">{{ $info['desc'] }}</p>
        </div>
    </div>
    @endforeach
</div>

<!-- Tabel Kurs Lengkap -->
<h3 class="text-center section-title" data-aos="fade-up">📈 Tabel Nilai Tukar Lengkap</h3>
<div class="table-responsive mb-5" data-aos="fade-up">
    <table class="table table-modern table-hover">
        <thead>
            <tr>
                <th class="text-center py-3">Mata Uang</th>
                @foreach(['IDR', 'USD', 'EUR', 'GBP', 'SGD', 'AUD'] as $curr)
                    <th class="text-center py-3">{{ $currencies[$curr]['symbol'] }} {{ $curr }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach(['IDR', 'USD', 'EUR', 'GBP', 'SGD', 'AUD', 'JPY', 'KRW', 'MYR', 'CAD', 'SAR'] as $from)
            <tr>
                <td class="fw-bold text-center">{{ $currencies[$from]['symbol'] }} {{ $from }}</td>
                @foreach(['IDR', 'USD', 'EUR', 'GBP', 'SGD', 'AUD'] as $to)
                    @php
                        $value = $kursData[$from] / $kursData[$to];
                    @endphp
                    <td class="text-center">{{ $from == $to ? '1' : number_format($value, 6) }}</td>
                @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- FAQ -->
<h3 class="text-center section-title" data-aos="fade-right">❓ Pertanyaan yang Sering Ditanyakan</h3>
<div class="accordion faq-accordion mb-5" id="faqAccordion" data-aos="fade-up">
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                🤔 Bagaimana cara menghitung kurs dengan kalkulator ini?
            </button>
        </h2>
        <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                Sangat mudah! Masukkan jumlah uang, pilih mata uang asal dan tujuan, kemudian klik tombol "Konversi Sekarang". Hasil akan muncul langsung tanpa perlu reload halaman. Kalkulator menggunakan logika bisnis dari Model dengan pattern MVC yang baik.
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                ⏰ Apakah nilai kurs ini diperbarui secara real-time?
            </button>
        </h2>
        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                Nilai kurs yang ditampilkan adalah data <strong>statis untuk referensi</strong>. Untuk transaksi resmi, silakan cek dengan bank atau money changer terpercaya. Data kurs dikelola di Model sesuai best practice MVC.
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                🌐 Mata uang apa saja yang didukung?
            </button>
        </h2>
        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                Saat ini kami mendukung 11 mata uang populer: Rupiah Indonesia (IDR), Dollar Amerika (USD), Euro (EUR), Pound Sterling (GBP), Dollar Singapore (SGD), Dollar Australia (AUD), Yen Jepang (JPY), Won Korea (KRW), Ringgit Malaysia (MYR), Dollar Kanada (CAD), dan Riyal Saudi (SAR)!
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                💡 Mengapa menggunakan simbol yang berbeda untuk mata uang?
            </button>
        </h2>
        <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                Kami menggunakan simbol landmark ikonik dari setiap negara untuk memberikan pengalaman visual yang lebih menarik dan mudah diingat: 🏝️ (pulau Indonesia), 🗽 (Patung Liberty), 🗼 (Menara Eiffel), 🎡 (London Eye), 🦁 (Merlion), 🦘 (Kanguru), 🗾 (Peta Jepang), 🏯 (Pagoda Korea), 🕌 (Masjid Malaysia), 🍁 (Daun Maple), 🕋 (Ka'bah)!
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                🏗️ Apakah aplikasi ini menggunakan MVC Pattern?
            </button>
        </h2>
        <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                Ya! Aplikasi ini menggunakan <strong>MVC Pattern yang proper</strong>. Model (Uang.php) menyimpan data kurs dan logika bisnis hitung konversi. Controller (UangController.php) sebagai jembatan yang mengambil data dari Model dan mengirim ke View. View (index.blade.php) menampilkan data dan menggunakan JavaScript untuk interaktivitas tanpa reload halaman. Data tetap dikelola oleh Model sesuai best practice Laravel!
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    // Data kurs dari Model (passed via Blade)
    const kursData = @json($kursData);
    const currenciesInfo = @json($currencies);
    
    // Fungsi hitung (sama dengan logika di Model Uang)
    function hitungKonversi(jumlah, asal, tujuan) {
        if (!kursData[asal] || !kursData[tujuan]) {
            return null;
        }
        
        const idr = jumlah * kursData[asal];
        return idr / kursData[tujuan];
    }
    
    // Fungsi untuk menampilkan hasil
    function tampilkanHasil(jumlah, asal, tujuan, hasil) {
        const fromInfo = currenciesInfo[asal];
        const toInfo = currenciesInfo[tujuan];
        
        // Update from amount
        document.getElementById('fromAmount').innerHTML = 
            `${fromInfo.symbol} ${jumlah.toLocaleString()} ${asal}`;
        
        // Update to amount
        document.getElementById('toAmount').innerHTML = 
            `${toInfo.symbol} ${hasil.toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 6})} ${tujuan}`;
        
        // Update rate
        const rate = hitungKonversi(1, asal, tujuan);
        document.getElementById('rateFrom').textContent = asal;
        document.getElementById('rateValue').textContent = rate.toLocaleString('en-US', {minimumFractionDigits: 4, maximumFractionDigits: 6});
        document.getElementById('rateTo').textContent = tujuan;
        
        // Tampilkan result box dengan animasi
        const resultBox = document.getElementById('resultBox');
        resultBox.classList.add('show');
    }
    
    // Event listener untuk form submit
    document.getElementById('currencyForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const jumlah = parseFloat(document.getElementById('jumlah').value);
        const asal = document.getElementById('asal').value;
        const tujuan = document.getElementById('tujuan').value;
        
        if (isNaN(jumlah) || jumlah <= 0) {
            alert('Masukkan jumlah yang valid!');
            return;
        }
        
        if (asal === tujuan) {
            alert('Pilih mata uang yang berbeda!');
            return;
        }
        
        const hasil = hitungKonversi(jumlah, asal, tujuan);
        
        if (hasil === null) {
            alert('Mata uang tidak ditemukan!');
            return;
        }
        
        tampilkanHasil(jumlah, asal, tujuan, hasil);
    });
    
    // Event listener untuk tombol swap
    document.getElementById('swapBtn').addEventListener('click', function() {
        const asal = document.getElementById('asal');
        const tujuan = document.getElementById('tujuan');
        const temp = asal.value;
        asal.value = tujuan.value;
        tujuan.value = temp;
        
        // Sembunyikan result box setelah swap
        document.getElementById('resultBox').classList.remove('show');
    });
    
    // Optional: Auto-konversi saat pilih mata uang atau ubah jumlah (real-time preview)
    function updatePreview() {
        const jumlahInput = document.getElementById('jumlah');
        const asalSelect = document.getElementById('asal');
        const tujuanSelect = document.getElementById('tujuan');
        
        const jumlah = parseFloat(jumlahInput.value);
        const asal = asalSelect.value;
        const tujuan = tujuanSelect.value;
        
        if (!isNaN(jumlah) && jumlah > 0 && asal !== tujuan && kursData[asal] && kursData[tujuan]) {
            const hasil = hitungKonversi(jumlah, asal, tujuan);
            tampilkanHasil(jumlah, asal, tujuan, hasil);
        } else {
            document.getElementById('resultBox').classList.remove('show');
        }
    }
    
    // Event listeners untuk real-time update
    document.getElementById('jumlah').addEventListener('input', updatePreview);
    document.getElementById('asal').addEventListener('change', updatePreview);
    document.getElementById('tujuan').addEventListener('change', updatePreview);
    
    // Inisialisasi preview saat load halaman
    document.addEventListener('DOMContentLoaded', function() {
        updatePreview();
    });
</script>
@endpush