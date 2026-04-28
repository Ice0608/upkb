<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpeg" href="/images/icon/noBgLogo.jpeg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>Kaedah Pembayaran - Temu Duga</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @include('components.dark-mode-init')
    <style>
        .payment-method {
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px solid #e5e7eb;
            border-radius: 1rem;
            padding: 1.5rem;
            background: white;
        }
        
        .payment-method:hover {
            border-color: #ff9800;
            background: #fff9f0;
        }
        
        .payment-method.active {
            border-color: #ff9800;
            background: linear-gradient(135deg, rgba(255, 152, 0, 0.05) 0%, rgba(255, 152, 0, 0.02) 100%);
            box-shadow: 0 4px 20px rgba(255, 152, 0, 0.15);
        }
        
        .qr-code-display {
            min-height: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #f5f9ff 0%, #fff9f0 100%);
            border-radius: 1rem;
            border: 2px solid #e5e7eb;
        }
        
        .payment-amount {
            font-size: 2.5rem;
            font-weight: 700;
            color: #ff9800;
        }
        
        .amount-label {
            font-size: 0.875rem;
            color: #6b7280;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        /* Dark Mode Styles */
        html.dark body {
            background: linear-gradient(to bottom, #0f172a, #1a1f3a);
            color: #f1f5f9;
        }

        html.dark .payment-method {
            background: #1e293b;
            border-color: #334155;
        }

        html.dark .payment-method:hover {
            border-color: #fb923c;
            background: rgba(251, 146, 60, 0.1);
        }

        html.dark .payment-method.active {
            border-color: #fb923c;
            background: linear-gradient(135deg, rgba(251, 146, 60, 0.1) 0%, rgba(251, 146, 60, 0.05) 100%);
            box-shadow: 0 4px 20px rgba(251, 146, 60, 0.2);
        }

        html.dark .text-slate-900 {
            color: #f1f5f9;
        }

        html.dark .text-slate-600 {
            color: #cbd5e1;
        }

        html.dark .text-orange-600 {
            color: #fb923c;
        }

        html.dark .text-green-600 {
            color: #86efac;
        }

        html.dark .text-blue-600 {
            color: #60a5fa;
        }

        html.dark .bg-white {
            background-color: #1e293b;
            border-color: #334155;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
        }

        html.dark .border-slate-100 {
            border-color: #334155;
        }

        html.dark .border-slate-200 {
            border-color: #334155;
        }

        html.dark .qr-code-display {
            background: linear-gradient(135deg, #0f172a 0%, #1a1f3a 100%);
            border-color: #334155;
        }

        html.dark input[type="number"] {
            background-color: #0f172a;
            border-color: #334155;
            color: #fb923c;
        }

        html.dark input[type="number"]:focus {
            border-color: #fb923c;
            box-shadow: 0 0 0 3px rgba(251, 146, 60, 0.1);
        }

        html.dark .bg-orange-100 {
            background: rgba(251, 146, 60, 0.15);
            color: #fb923c;
        }

        html.dark .text-orange-600 {
            color: #fb923c;
        }

        html.dark .hover\:bg-orange-200:hover {
            background: rgba(251, 146, 60, 0.25);
        }

        html.dark .bg-blue-50 {
            background: rgba(59, 130, 246, 0.1);
            border-color: #3b82f6;
        }

        html.dark .text-blue-700 {
            color: #93c5fd;
        }

        html.dark .bg-green-50 {
            background: rgba(34, 197, 94, 0.1);
            border-color: #22c55e;
        }

        html.dark .text-green-700 {
            color: #86efac;
        }

        html.dark .bg-amber-50 {
            background: rgba(217, 119, 6, 0.1);
            border-color: #f59e0b;
        }

        html.dark .text-amber-700 {
            color: #fcd34d;
        }

        html.dark .border-orange-600 {
            border-color: #fb923c;
        }

        html.dark .border-slate-300 {
            border-color: #334155;
        }

        html.dark .border-dashed {
            border-color: #334155;
        }

        html.dark .hover\:border-orange-400 {
            border-color: #fb923c;
        }

        html.dark .text-slate-400 {
            color: #94a3b8;
        }

        html.dark .text-emerald-600 {
            color: #10b981;
        }

        html.dark .text-orange-400 {
            color: #fb923c;
        }

        html.dark .bg-white.px-2 {
            background-color: #0f172a;
            color: #e2e8f0;
        }

        html.dark .hover\:bg-slate-50:hover {
            background: #334155;
        }

        html.dark .text-white {
            color: #ffffff;
        }

        html.dark .hover\:bg-orange-700:hover {
            background: #ea580c;
        }

        html.dark .border-blue-200 {
            border-color: #3b82f6;
        }

        html.dark .border-green-200 {
            border-color: #22c55e;
        }

        html.dark .border-amber-200 {
            border-color: #f59e0b;
        }

        html.dark .text-sm.text-slate-500 {
            color: #94a3b8;
        }
    </style>
</head>
<body class="bg-gradient-to-b from-slate-50 to-slate-100 text-slate-900">

@include('layouts.navpelajar')

<main class="min-h-screen flex-grow">
    <div class="max-w-6xl mx-auto px-4 py-12">
        <!-- Header -->
        <div class="mb-12">
            <h1 class="text-4xl font-bold text-slate-900 mb-3">
                <i class="fas fa-credit-card text-orange-600"></i> Pilih Kaedah Pembayaran
            </h1>
            <p class="text-lg text-slate-600">Sila pilih kaedah pembayaran yang sesuai untuk melanjutkan proses temu duga.</p>
        </div>

        <!-- Payment Amount -->
        <div class="bg-white rounded-3xl shadow-lg p-8 mb-8 border border-slate-100">
            <label for="jumlah-input" class="amount-label mb-2 inline-block">Jumlah Pembayaran (RM)</label>
            <div class="mt-2">
                <input id="jumlah-input" name="jumlah_visible" type="number" step="0.01" min="0" value="{{ number_format($jumlah, 2, '.', '') }}" class="w-48 px-4 py-3 rounded-xl border border-slate-200 text-2xl font-bold text-orange-600 payment-amount" />
                <p class="text-sm text-slate-500 mt-2">Masukkan jumlah yang anda ingin bayar. Contoh: 50.00</p>
            </div>
        </div>

        <!-- Payment Methods -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            <!-- QR Code Method -->
            <div class="payment-method" onclick="selectMethod('qr', this)">
                <div class="text-center mb-4">
                    <i class="fas fa-qrcode text-4xl text-orange-600 mb-3"></i>
                    <h3 class="text-xl font-bold text-slate-900">Kod QR</h3>
                </div>
                <p class="text-slate-600 text-center text-sm">
                    Imbas kod QR dengan telefon pintar anda untuk membuat pembayaran.
                </p>
                <div class="mt-4 pt-4 border-t border-slate-200">
                    <button type="button" class="w-full py-2 rounded-full bg-orange-100 text-orange-600 font-semibold text-sm hover:bg-orange-200 transition">
                        Pilih
                    </button>
                </div>
            </div>

            <!-- Cash Method -->
            <div class="payment-method" onclick="selectMethod('cash', this)">
                <div class="text-center mb-4">
                    <i class="fas fa-money-bill-wave text-4xl text-green-600 mb-3"></i>
                    <h3 class="text-xl font-bold text-slate-900">Tunai</h3>
                </div>
                <p class="text-slate-600 text-center text-sm">
                    Bayar secara tunai kepada kakitangan institusi anda.
                </p>
                <div class="mt-4 pt-4 border-t border-slate-200">
                    <button type="button" class="w-full py-2 rounded-full bg-orange-100 text-orange-600 font-semibold text-sm hover:bg-orange-200 transition">
                        Pilih
                    </button>
                </div>
            </div>

            <!-- Bank Transfer Method -->
            <div class="payment-method" onclick="selectMethod('transfer', this)">
                <div class="text-center mb-4">
                    <i class="fas fa-university text-4xl text-blue-600 mb-3"></i>
                    <h3 class="text-xl font-bold text-slate-900">Pindahan Bank</h3>
                </div>
                <p class="text-slate-600 text-center text-sm">
                    Pindahkan dana melalui akaun bank institusi.
                </p>
                <div class="mt-4 pt-4 border-t border-slate-200">
                    <button type="button" class="w-full py-2 rounded-full bg-orange-100 text-orange-600 font-semibold text-sm hover:bg-orange-200 transition">
                        Pilih
                    </button>
                </div>
            </div>
        </div>

        <!-- Selected Method Details -->
        <div id="method-details" class="hidden bg-white rounded-3xl shadow-lg p-8 mb-12">
            <div class="bg-orange-50 border border-orange-200 rounded-lg p-4 mb-6">
                <p class="text-orange-700 text-sm">
                    <i class="fas fa-info-circle"></i> 
                    <strong>Nota:</strong> Semua kaedah pembayaran memerlukan muat naik resit pembayaran (PDF atau gambar) sebelum ke halaman seterusnya.
                </p>
            </div>
            <!-- QR Code Display -->
            <div id="qr-details" class="hidden">
                <h3 class="text-2xl font-bold text-slate-900 mb-6">
                    <i class="fas fa-qrcode text-orange-600"></i> Pembayaran Melalui Kod QR
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="qr-code-display">
                        <div class="text-center">
                            <img src="{{ asset('images/QR.jpeg') }}" alt="QR Code" class="mx-auto w-52 max-w-full rounded-xl shadow-sm">
                            <p class="mt-4 text-slate-600 text-sm">Kod QR anda</p>
                        </div>
                    </div>
                    <div>
                        <p class="text-slate-600 mb-4">Langkah pembayaran:</p>
                        <ol class="list-decimal list-inside space-y-2 text-slate-600">
                            <li>Buka aplikasi perbankan anda</li>
                            <li>Pilih fungsi "Imbas Kod QR"</li>
                            <li>Imbas kod QR di sebelah</li>
                            <li>Sahkan jumlah: <span class="font-bold method-amount-display">RM {{ number_format($jumlah, 2) }}</span></li>
                            <li>Selesaikan transaksi</li>
                        </ol>
                        <div class="mt-6 p-4 bg-blue-50 rounded-lg border border-blue-200">
                            <p class="text-sm text-blue-700">
                                <i class="fas fa-info-circle"></i> 
                                <strong>Nota:</strong> Simpan bukti pembayaran untuk rekod anda.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cash Details -->
            <div id="cash-details" class="hidden">
                <h3 class="text-2xl font-bold text-slate-900 mb-6">
                    <i class="fas fa-money-bill-wave text-green-600"></i> Pembayaran Tunai
                </h3>
                <div class="bg-green-50 border border-green-200 rounded-lg p-6 mb-6">
                    <p class="text-green-700 mb-3">
                        <i class="fas fa-check-circle"></i> 
                        <strong>Instruksi Pembayaran Tunai:</strong>
                    </p>
                    <ul class="list-disc list-inside space-y-2 text-slate-600 ml-4">
                        <li>Bayar ke pegawai kami semasa temu duga berlangsung</li>
                        <li>Jumlah pembayaran: <strong class="method-amount-display">RM {{ number_format($jumlah, 2) }}</strong></li>
                        <li>Ambil resit sebagai bukti pembayaran</li>
                        <li>ambil gambar resit dan masukkan pada bahagian bawah</li>
                    </ul>
                </div>
                <p class="text-slate-600 mb-4">Hubungi:</p>
                <div class="space-y-2 text-slate-600">
                    <p><i class="fas fa-phone text-orange-600"></i> <span class="font-semibold">Telefon:</span> {{ config('app.support_phone', '03-XXXX XXXX') }}</p>
                    <p><i class="fas fa-envelope text-orange-600"></i> <span class="font-semibold">Email:</span> {{ config('app.support_email', 'support@example.com') }}</p>
                </div>
            </div>

            <!-- Bank Transfer Details -->
            <div id="transfer-details" class="hidden">
                <h3 class="text-2xl font-bold text-slate-900 mb-6">
                    <i class="fas fa-university text-blue-600"></i> Pindahan Bank
                </h3>
                <div class="bg-blue-50 border border-blue-200 rounded-lg p-6 mb-6">
                    <p class="text-blue-700 mb-4 font-semibold">
                        Maklumat Akaun Bank:
                    </p>
                    <div class="space-y-3 text-slate-700">
                        <p><span class="font-semibold">Nama Bank:</span> Maybank</p>
                        <p><span class="font-semibold">Nama Akaun:</span> {{ config('app.bank_account_name', 'SESOC LEGACY') }}</p>
                        <p><span class="font-semibold">No. Akaun:</span> <code class="bg-white px-2 py-1 rounded text-sm">{{ config('app.bank_account_no', '5551 7161 7040') }}</code></p>
                        {{-- <p><span class="font-semibold">Kod Bank (SWIFT):</span> <code class="bg-white px-2 py-1 rounded text-sm">XXXMYKL</code></p> --}}
                    </div>
                </div>
                <div class="bg-amber-50 border border-amber-200 rounded-lg p-6">
                    <p class="text-amber-700 mb-2">
                        <i class="fas fa-exclamation-triangle"></i> 
                        <strong>Penting:</strong>
                    </p>
                    <ul class="list-disc list-inside space-y-2 text-slate-600 ml-4">
                        <li>Jumlah pindahan: <strong class="method-amount-display">RM {{ number_format($jumlah, 2) }}</strong></li>
                        <li>Rujukan: Gunakan No. IC Anda sebagai rujukan</li>
                        <li>Simpan bukti pindahan (resit/bukti e-banking)</li>
                        <li>Download resit pembayaran tersebut dan masukkan resit tersebut pada bahagian bawah</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Resit Upload Section -->
        <div id="resit-section" class="bg-white rounded-3xl shadow-lg p-8 mb-12">
            <h3 class="text-2xl font-bold text-slate-900 mb-6">
                <i class="fas fa-upload text-orange-600"></i> Muat Naik Resit Pembayaran
            </h3>
            <p class="text-slate-600 mb-4">Sila muat naik resit pembayaran anda (jpg, jpeg, png, pdf, doc, docx). Resit diperlukan untuk melanjutkan.</p>
            <div class="border-2 border-dashed border-slate-300 rounded-2xl p-8 text-center hover:border-orange-400 transition cursor-pointer" onclick="document.getElementById('resit-input').click()">
                <input type="file" name="resit" id="resit-input" accept="jpg,jpeg,png,pdf,doc,docx" class="hidden" onchange="updateResitName(this)">
                <div id="resit-upload-area">
                    <i class="fas fa-cloud-upload-alt text-4xl text-slate-400 mb-4"></i>
                    <p class="text-slate-600">Klik untuk memilih fail atau seret fail ke sini</p>
                </div>
                <div id="resit-file-name" class="hidden mt-4">
                    <p class="text-emerald-600 font-semibold"><i class="fas fa-check-circle"></i> <span id="filename-display"></span></p>
                </div>
            </div>
        </div>

        <!-- Hidden Form for Submission -->
        <form id="payment-form" method="POST" action="{{ route('pelajar.store-pembayaran', $pelajar->id) }}" class="hidden" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="kaedah_pembayaran" id="kaedah-input" value="">
            <input type="hidden" name="jumlah" id="jumlah-hidden" value="{{ $jumlah }}">
        </form>

        <!-- Action Buttons -->
        <div class="flex gap-4 justify-center mb-12">
            <a href="javascript:history.back()" class="inline-flex items-center gap-2 rounded-full border border-slate-300 bg-white px-8 py-3 text-sm font-semibold text-slate-700 hover:bg-slate-50 transition">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
            <button type="submit" onclick="submitPaymentForm()" class="inline-flex items-center gap-2 rounded-full bg-orange-600 px-8 py-3 text-sm font-semibold text-white hover:bg-orange-700 transition disabled:opacity-50 disabled:cursor-not-allowed" id="submit-btn" disabled>
                <i class="fas fa-check"></i> Lanjutkan
            </button>
        </div>
    </div>
</main>

@include('layouts.footer-pelajar')

<script>
    let selectedMethod = null;

        // Sync visible jumlah input to hidden field and update displayed amounts
        document.addEventListener('DOMContentLoaded', function () {
            const jumlahVisible = document.getElementById('jumlah-input');
            const jumlahHidden = document.getElementById('jumlah-hidden');
            const updateDisplayedAmounts = () => {
                const val = parseFloat(jumlahVisible.value) || 0;
                jumlahHidden.value = val.toFixed(2);

                // Update instances inside method detail areas (if present)
                document.querySelectorAll('.method-amount-display').forEach(el => {
                    el.textContent = 'RM ' + val.toFixed(2);
                });
            };

            if (jumlahVisible) {
                jumlahVisible.addEventListener('input', updateDisplayedAmounts);
                // initialize
                updateDisplayedAmounts();
            }
        });

    function selectMethod(method, element) {
        // Remove active class from all methods
        document.querySelectorAll('.payment-method').forEach(el => {
            el.classList.remove('active');
        });

        // Add active class to selected method
        element.classList.add('active');
        selectedMethod = method;

        // Hide all details
        document.querySelectorAll('[id$="-details"]').forEach(el => {
            el.classList.add('hidden');
        });

        // Show the method details
        document.getElementById('method-details').classList.remove('hidden');
        document.getElementById(method + '-details').classList.remove('hidden');

        // Enable submit button
        document.getElementById('submit-btn').disabled = false;
    }

    function submitPaymentForm() {
        if (!selectedMethod) {
            alert('Sila pilih kaedah pembayaran terlebih dahulu.');
            return;
        }
        
        const resitInput = document.getElementById('resit-input');
        if (!resitInput.files.length) {
            alert('Sila muat naik resit pembayaran (PDF atau gambar) terlebih dahulu.');
            return;
        }
        
        // Validate file type
        const file = resitInput.files[0];
        const validTypes = ['image/jpeg', 'image/png', 'image/jpg', 'application/pdf'];
        if (!validTypes.includes(file.type)) {
            alert('Sila muat naik fail resit dalam format JPG, PNG, atau PDF sahaja.');
            return;
        }
        
        // Validate file size (max 5MB)
        if (file.size > 5 * 1024 * 1024) {
            alert('Saiz fail terlalu besar. Maximum saiz fail adalah 5MB.');
            return;
        }
        
        document.getElementById('kaedah-input').value = selectedMethod;
        
        // Create FormData and append the file
        const form = document.getElementById('payment-form');
        const formData = new FormData(form);
        formData.append('resit', resitInput.files[0]);
        
        // Submit via fetch
        fetch(form.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        }).then(response => {
            if (response.redirected) {
                window.location.href = response.url;
            } else {
                return response.text();
            }
        }).then(html => {
            if (html && html.includes('error')) {
                alert('Ralat semasa menghantar. Sila cuba lagi.');
            }
        }).catch(error => {
            console.error('Error:', error);
            alert('Ralat semasa menghantar. Sila cuba lagi.');
        });
    }

    function updateResitName(input) {
        if (input.files && input.files[0]) {
            const fileName = input.files[0].name;
            document.getElementById('filename-display').textContent = fileName;
            document.getElementById('resit-upload-area').classList.add('hidden');
            document.getElementById('resit-file-name').classList.remove('hidden');
        }
    }
</script>
