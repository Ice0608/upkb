<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpeg" href="/images/icon/noBgLogo.jpeg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>Kaedah Pembayaran - Temu Duga</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
            <p class="amount-label mb-2">Jumlah Pembayaran</p>
            <p class="payment-amount">RM {{ number_format($jumlah, 2) }}</p>
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
            <!-- QR Code Display -->
            <div id="qr-details" class="hidden">
                <h3 class="text-2xl font-bold text-slate-900 mb-6">
                    <i class="fas fa-qrcode text-orange-600"></i> Pembayaran Melalui Kod QR
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="qr-code-display">
                        <div class="text-center">
                            <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=Payment-{{ $pelajar->id }}" alt="QR Code">
                            <p class="mt-4 text-slate-600 text-sm">Kod QR anda</p>
                        </div>
                    </div>
                    <div>
                        <p class="text-slate-600 mb-4">Langkah pembayaran:</p>
                        <ol class="list-decimal list-inside space-y-2 text-slate-600">
                            <li>Buka aplikasi perbankan anda</li>
                            <li>Pilih fungsi "Imbas Kod QR"</li>
                            <li>Imbas kod QR di sebelah</li>
                            <li>Sahkan jumlah: <span class="font-bold">RM {{ number_format($jumlah, 2) }}</span></li>
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
                        <li>Bayar ke pejabat institusi anda dalam waktu 3 hari</li>
                        <li>Jumlah pembayaran: <strong>RM {{ number_format($jumlah, 2) }}</strong></li>
                        <li>Ambil resit sebagai bukti pembayaran</li>
                        <li>Serahkan resit kepada kakitangan temu duga</li>
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
                        <p><span class="font-semibold">Nama Bank:</span> Banking Institution</p>
                        <p><span class="font-semibold">Nama Akaun:</span> {{ config('app.bank_account_name', 'Ministry/Institution Name') }}</p>
                        <p><span class="font-semibold">No. Akaun:</span> <code class="bg-white px-2 py-1 rounded text-sm">{{ config('app.bank_account_no', 'XXXX XXXX XXXX XXXX') }}</code></p>
                        <p><span class="font-semibold">Kod Bank (SWIFT):</span> <code class="bg-white px-2 py-1 rounded text-sm">XXXMYKL</code></p>
                    </div>
                </div>
                <div class="bg-amber-50 border border-amber-200 rounded-lg p-6">
                    <p class="text-amber-700 mb-2">
                        <i class="fas fa-exclamation-triangle"></i> 
                        <strong>Penting:</strong>
                    </p>
                    <ul class="list-disc list-inside space-y-2 text-slate-600 ml-4">
                        <li>Jumlah pindahan: <strong>RM {{ number_format($jumlah, 2) }}</strong></li>
                        <li>Rujukan: Gunakan No. IC Anda sebagai rujukan</li>
                        <li>Simpan bukti pindahan (resit/bukti e-banking)</li>
                        <li>Serahkan bukti kepada kakitangan temu duga</li>
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
            <input type="hidden" name="jumlah" value="{{ $jumlah }}">
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
            alert('Sila muat naik resit pembayaran terlebih dahulu.');
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpeg" href="/images/icon/noBgLogo.jpeg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>Kaedah Pembayaran - Temu Duga</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .pembayaran-page {
            position: relative;
            min-height: 100vh;
            background:
                radial-gradient(circle at top left, rgba(245, 158, 11, 0.22), transparent 20%),
                radial-gradient(circle at top right, rgba(37, 99, 235, 0.14), transparent 26%),
                radial-gradient(circle at bottom center, rgba(249, 115, 22, 0.16), transparent 24%),
                linear-gradient(180deg, #fff1db 0%, #f8fafc 46%, #e8efff 100%);
        }

        .pembayaran-page::before,
        .pembayaran-page::after {
            content: "";
            position: fixed;
            inset: 0;
            pointer-events: none;
            z-index: 0;
        }

        .pembayaran-page::before {
            background:
                linear-gradient(120deg, rgba(255, 255, 255, 0.52), rgba(255, 255, 255, 0) 40%),
                repeating-linear-gradient(90deg, rgba(148, 163, 184, 0.035) 0 1px, transparent 1px 120px),
                repeating-linear-gradient(180deg, rgba(148, 163, 184, 0.025) 0 1px, transparent 1px 120px);
            mask-image: linear-gradient(180deg, rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0.18));
            opacity: 0.55;
        }

        .pembayaran-page::after {
            inset: auto auto 3rem 50%;
            width: min(76rem, calc(100vw - 2rem));
            height: 18rem;
            transform: translateX(-50%);
            border-radius: 999px;
            background: radial-gradient(circle, rgba(255, 184, 28, 0.34), rgba(255, 184, 28, 0) 68%);
            filter: blur(36px);
            opacity: 0.94;
        }

        .pembayaran-page > * {
            position: relative;
            z-index: 1;
        }

        .pembayaran-shell {
            position: relative;
            isolation: isolate;
        }

        .pembayaran-shell::before,
        .pembayaran-shell::after {
            content: "";
            position: absolute;
            pointer-events: none;
            z-index: -1;
        }

        .pembayaran-shell::before {
            top: 1rem;
            left: -3rem;
            width: 16rem;
            height: 16rem;
            border-radius: 2rem;
            background:
                radial-gradient(circle at 30% 30%, rgba(255, 166, 0, 0.3), rgba(255, 166, 0, 0) 56%),
                linear-gradient(145deg, rgba(255, 255, 255, 0.36), rgba(255, 255, 255, 0));
            filter: blur(10px);
            opacity: 0.9;
        }

        .pembayaran-shell::after {
            right: -2rem;
            top: 10rem;
            width: 18rem;
            height: 18rem;
            border-radius: 999px;
            background: radial-gradient(circle, rgba(37, 99, 235, 0.18), rgba(37, 99, 235, 0) 70%);
            filter: blur(6px);
            opacity: 0.84;
        }

        .pembayaran-hero {
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.82);
            background: linear-gradient(90deg, #ff7300 0%, #ffd43b 100%);
            box-shadow:
                0 24px 70px rgba(15, 23, 42, 0.14),
                0 0 68px rgba(255, 166, 0, 0.3),
                0 0 130px rgba(255, 212, 59, 0.22),
                inset 0 1px 0 rgba(255, 255, 255, 0.24);
        }

        .pembayaran-hero::before,
        .pembayaran-hero::after {
            content: "";
            position: absolute;
            pointer-events: none;
        }

        .pembayaran-hero::before {
            top: -3rem;
            right: 8%;
            width: 11rem;
            height: 11rem;
            border-radius: 999px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.16), rgba(255, 255, 255, 0) 72%);
            border: 1px solid rgba(255, 255, 255, 0.24);
            box-shadow:
                0 0 36px rgba(255, 235, 140, 0.34),
                0 0 0 18px rgba(255, 255, 255, 0.08),
                0 0 0 40px rgba(255, 255, 255, 0.04);
            animation: pembayaranGlowPulse 7s ease-in-out infinite;
        }

        .pembayaran-hero::after {
            left: 4%;
            bottom: -1.5rem;
            width: 8rem;
            height: 8rem;
            border-radius: 2rem;
            background:
                linear-gradient(135deg, rgba(255, 255, 255, 0.18), rgba(255, 255, 255, 0)),
                repeating-linear-gradient(90deg, rgba(255, 255, 255, 0.12) 0 1px, transparent 1px 18px),
                repeating-linear-gradient(180deg, rgba(255, 255, 255, 0.12) 0 1px, transparent 1px 18px);
            transform: rotate(12deg);
            box-shadow: 0 0 42px rgba(255, 228, 92, 0.28);
            opacity: 0.68;
        }

        .payment-option {
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.82);
            background:
                linear-gradient(180deg, rgba(255, 255, 255, 0.96), rgba(255, 255, 255, 0.82));
            box-shadow:
                0 18px 42px rgba(15, 23, 42, 0.08),
                0 0 26px rgba(255, 184, 28, 0.08),
                inset 0 1px 0 rgba(255, 255, 255, 0.88);
            transition: transform 0.35s ease, box-shadow 0.35s ease, border-color 0.35s ease;
        }

        .payment-option::before {
            content: "";
            position: absolute;
            inset: 0;
            background:
                radial-gradient(circle at top right, rgba(255, 255, 255, 0.44), transparent 28%),
                radial-gradient(circle at bottom left, rgba(255, 184, 77, 0.08), transparent 24%);
            pointer-events: none;
            z-index: 0;
        }

        .payment-option > * {
            position: relative;
            z-index: 1;
        }

        .payment-option:hover {
            transform: translateY(-6px);
            border-color: rgba(255, 232, 168, 0.9);
            box-shadow:
                0 28px 60px rgba(15, 23, 42, 0.12),
                0 0 42px rgba(255, 166, 0, 0.16),
                inset 0 1px 0 rgba(255, 255, 255, 0.94);
        }

        .payment-option input[type="radio"]:checked + .payment-option {
            border-color: rgba(249, 115, 22, 0.5);
            box-shadow:
                0 0 0 4px rgba(249, 115, 22, 0.1),
                0 28px 60px rgba(15, 23, 42, 0.12),
                0 0 42px rgba(255, 166, 0, 0.16),
                inset 0 1px 0 rgba(255, 255, 255, 0.94);
        }

        .pembayaran-form {
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.82);
            background:
                linear-gradient(135deg, rgba(255, 255, 255, 0.88), rgba(255, 255, 255, 0.74)),
                linear-gradient(135deg, rgba(255, 166, 0, 0.1), rgba(37, 99, 235, 0.06));
            box-shadow:
                0 22px 56px rgba(15, 23, 42, 0.1),
                0 0 34px rgba(255, 184, 28, 0.12),
                inset 0 1px 0 rgba(255, 255, 255, 0.86);
            backdrop-filter: blur(16px);
        }

        .pembayaran-form::before {
            content: "";
            position: absolute;
            inset: 0;
            background:
                radial-gradient(circle at top right, rgba(255, 255, 255, 0.42), transparent 28%),
                radial-gradient(circle at bottom left, rgba(255, 184, 77, 0.08), transparent 24%);
            pointer-events: none;
        }

        .pembayaran-input {
            border: 1px solid rgba(148, 163, 184, 0.28);
            background:
                linear-gradient(135deg, rgba(255, 255, 255, 0.84), rgba(255, 255, 255, 0.68)),
                linear-gradient(135deg, rgba(255, 166, 0, 0.08), rgba(37, 99, 235, 0.05));
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.88);
        }

        .pembayaran-input:focus {
            border-color: rgba(249, 115, 22, 0.36);
            box-shadow:
                0 0 0 4px rgba(249, 115, 22, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.9);
        }

        .pembayaran-btn {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .pembayaran-btn:hover {
            transform: translateY(-2px);
        }

        .pembayaran-submit {
            box-shadow:
                0 16px 34px rgba(249, 115, 22, 0.18),
                0 0 28px rgba(255, 166, 0, 0.16),
                inset 0 1px 0 rgba(255, 255, 255, 0.18);
        }

        .pembayaran-submit:hover {
            box-shadow:
                0 24px 42px rgba(249, 115, 22, 0.22),
                0 0 38px rgba(255, 166, 0, 0.22),
                inset 0 1px 0 rgba(255, 255, 255, 0.22);
            filter: saturate(1.04);
        }

        @keyframes pembayaranGlowPulse {
            0%, 100% {
                opacity: 0.72;
                transform: scale(1);
            }
            50% {
                opacity: 1;
                transform: scale(1.05);
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .payment-option,
            .pembayaran-btn,
            .pembayaran-submit,
            .pembayaran-hero::before {
                transition: none;
                animation: none;
            }
        }
    </style>
</head>
<body class="pembayaran-page text-gray-800">

    {{-- 🔹 NAVIGATION --}}
    @include('layouts.navpelajar')

    <section class="pembayaran-shell max-w-7xl mx-auto px-6 py-10">
        <div class="pembayaran-hero rounded-3xl p-8 text-white mb-8">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                <div>
                    <h1 class="text-4xl md:text-5xl font-bold leading-tight">
                        Kaedah Pembayaran
                    </h1>
                    <p class="mt-3 text-lg text-orange-100">Pilih kaedah pembayaran yang sesuai untuk {{ $pelajar->nama_pelajar }}.</p>
                </div>
                <div class="w-14 h-14 rounded-full bg-white text-orange-600 flex items-center justify-center">
                    <i class="fas fa-credit-card text-2xl"></i>
                </div>
            </div>
        </div>

        <form action="{{ route('staff.temuduga.storepembayaran', $pelajar->id) }}" method="POST" class="space-y-8">
            @csrf

            <!-- Payment Options -->
            <div class="grid gap-6 md:grid-cols-3">
                <label class="block cursor-pointer">
                    <input type="radio" name="kaedah" value="qr" class="sr-only peer" required>
                    <div class="payment-option rounded-3xl p-8 text-center peer-checked:border-orange-500 peer-checked:ring-2 peer-checked:ring-orange-100">
                        <i class="fas fa-qrcode text-5xl text-orange-500 mb-4"></i>
                        <h3 class="text-2xl font-bold text-slate-900 mb-2">QR Code</h3>
                        <p class="text-slate-600">Bayar menggunakan QR code</p>
                    </div>
                </label>

                <label class="block cursor-pointer">
                    <input type="radio" name="kaedah" value="cash" class="sr-only peer">
                    <div class="payment-option rounded-3xl p-8 text-center peer-checked:border-orange-500 peer-checked:ring-2 peer-checked:ring-orange-100">
                        <i class="fas fa-money-bill-wave text-5xl text-green-500 mb-4"></i>
                        <h3 class="text-2xl font-bold text-slate-900 mb-2">Cash</h3>
                        <p class="text-slate-600">Bayar secara tunai</p>
                    </div>
                </label>

                <label class="block cursor-pointer">
                    <input type="radio" name="kaedah" value="transfer" class="sr-only peer">
                    <div class="payment-option rounded-3xl p-8 text-center peer-checked:border-orange-500 peer-checked:ring-2 peer-checked:ring-orange-100">
                        <i class="fas fa-university text-5xl text-blue-500 mb-4"></i>
                        <h3 class="text-2xl font-bold text-slate-900 mb-2">Transfer</h3>
                        <p class="text-slate-600">Bayar melalui bank transfer</p>
                    </div>
                </label>
            </div>

            <!-- Amount Input -->
            <div class="pembayaran-form rounded-3xl p-8">
                <div class="relative z-10">
                    <label class="block text-lg font-semibold text-gray-700 mb-4">
                        <i class="fas fa-calculator mr-2 text-orange-500"></i>Jumlah Pembayaran (RM)
                    </label>
                    <input type="number" step="0.01" name="jumlah" value="{{ old('jumlah', $jumlah) }}" 
                           class="pembayaran-input w-full rounded-2xl px-6 py-4 text-lg shadow-sm focus:outline-none" 
                           placeholder="Masukkan jumlah pembayaran" required>
                    @error('jumlah') 
                        <p class="mt-3 text-sm text-rose-600 font-medium">{{ $message }}</p> 
                    @enderror
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 justify-between">
                <a href="{{ route('staff.bmd.edit', $pelajar->id) }}" 
                   class="pembayaran-btn inline-flex items-center justify-center gap-2 rounded-2xl border border-gray-300 bg-white px-8 py-4 text-sm font-semibold text-gray-700 shadow-lg hover:bg-gray-50">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
                <button type="submit" 
                        class="pembayaran-submit inline-flex items-center justify-center gap-2 rounded-2xl bg-orange-500 px-8 py-4 text-sm font-semibold text-white shadow-lg hover:bg-orange-600">
                    Seterusnya <i class="fas fa-arrow-right"></i>
                </button>
            </div>
        </form>
    </section>

    @include('components.social-float')

    {{-- 🔹 FOOTER --}}
    @include('layouts.footer-pelajar')

</body>
</html>