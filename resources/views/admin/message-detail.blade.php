<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>UPKB - Detail Mesej</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800">

@include('layouts.navadmin')

    <section class="max-w-4xl mx-auto px-6 py-10">
        <div class="mb-8">
            <a href="{{ route('admin.messages') }}" class="inline-flex items-center gap-2 text-blue-600 font-semibold hover:text-blue-800 mb-4">
                <i class="fas fa-arrow-left"></i>Kembali ke Senarai Mesej
            </a>
            <h1 class="text-4xl font-bold text-slate-900">Detail Mesej</h1>
        </div>

        <div class="bg-white rounded-3xl shadow-lg border border-gray-200 p-8">
            {{-- Header Info --}}
            <div class="grid md:grid-cols-2 gap-6 mb-8 pb-8 border-b border-gray-200">
                <div>
                    <p class="text-gray-600 text-sm mb-1">Nama Penuh</p>
                    <p class="text-2xl font-bold text-slate-900">{{ $message->nama }}</p>
                </div>
                <div>
                    <p class="text-gray-600 text-sm mb-1">Emel</p>
                    <a href="mailto:{{ $message->emel }}" class="text-2xl font-bold text-orange-600 hover:text-orange-700 flex items-center gap-2">
                        <i class="fas fa-envelope"></i>{{ $message->emel }}
                    </a>
                </div>
            </div>

            {{-- Perkara --}}
            <div class="mb-8 pb-8 border-b border-gray-200">
                <p class="text-gray-600 text-sm mb-2">Perkara</p>
                <div class="bg-blue-50 border-l-4 border-blue-500 p-4 rounded">
                    <p class="text-lg font-semibold text-blue-900">{{ $message->perkara }}</p>
                </div>
            </div>

            {{-- Mesej Content --}}
            <div class="mb-8">
                <p class="text-gray-600 text-sm mb-3">Mesej</p>
                <div class="bg-gray-50 border border-gray-200 p-6 rounded-xl whitespace-pre-wrap text-gray-700 leading-relaxed">
                    {{ $message->mesej }}
                </div>
            </div>

            {{-- Admin Comment Section --}}
            <div class="mb-8 pb-8 border-b border-gray-200">
                <p class="text-gray-600 text-sm mb-3 font-semibold">Nota Admin</p>
                <form action="{{ route('admin.message-comment', $message->id) }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <textarea name="comment" rows="4" class="w-full border border-gray-300 rounded-xl p-4 text-gray-800 focus:ring-2 focus:ring-orange-300 outline-none" placeholder="Tambah nota atau comment tentang mesej ini...">{{ $message->comment }}</textarea>
                        @error('comment')<p class="text-red-500 text-sm mt-1"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>@enderror
                    </div>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg font-semibold transition">
                        <i class="fas fa-save mr-2"></i>Simpan Nota
                    </button>
                </form>

                @if($message->comment)
                    <div class="mt-6 bg-blue-50 border-l-4 border-blue-500 p-4 rounded">
                        <p class="text-sm text-blue-600 mb-2"><i class="fas fa-sticky-note mr-2"></i><strong>Nota Tersimpan:</strong></p>
                        <p class="text-gray-700 whitespace-pre-wrap">{{ $message->comment }}</p>
                    </div>
                @endif
            </div>

            <div class="grid md:grid-cols-3 gap-4 pt-8 border-t border-gray-200">
                <div class="bg-gray-50 p-4 rounded-lg">
                    <p class="text-gray-600 text-sm mb-1">Masuk Pada</p>
                    <p class="font-semibold text-slate-900">{{ $message->created_at->format('d/m/Y') }}</p>
                    <p class="text-gray-500 text-sm">{{ $message->created_at->format('H:i') }}</p>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg">
                    <p class="text-gray-600 text-sm mb-1">ID Mesej</p>
                    <p class="font-semibold text-slate-900">#{{ $message->id }}</p>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg">
                    <p class="text-gray-600 text-sm mb-1">Status</p>
                    <span class="inline-block bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">Diterima</span>
                </div>
            </div>

            {{-- Actions --}}
            <div class="flex gap-4 mt-10 pt-8 border-t border-gray-200">
                <a href="mailto:{{ $message->emel }}" class="inline-flex items-center gap-2 bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold transition">
                    <i class="fas fa-reply"></i>Balas Email
                </a>
                <form action="{{ route('admin.message-delete', $message->id) }}" method="POST" class="inline" onsubmit="return confirm('Adakah anda pasti ingin memadam mesej ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="inline-flex items-center gap-2 bg-red-500 hover:bg-red-600 text-white px-6 py-3 rounded-lg font-semibold transition">
                        <i class="fas fa-trash"></i>Padam Mesej
                    </button>
                </form>
            </div>
        </div>
    </section>

    <footer class="bg-gray-900 text-gray-300 mt-16">
        <div class="max-w-7xl mx-auto px-6 py-12 grid md:grid-cols-3 gap-10">
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <img src="{{ asset('images/logo.jpeg') }}" class="h-12" alt="logo">
                    <div>
                        <h2 class="text-lg font-bold text-white">UPKB</h2>
                        <p class="text-sm text-gray-400">Pusat maklumat program & pengambilan</p>
                    </div>
                </div>
                <p class="text-sm text-gray-400 leading-relaxed">Bantu pelajar dan ibu bapa melihat pilihan pusat, program, kuota semasa dan maklumat penting dengan lebih jelas dalam satu tempat.</p>
            </div>
            <div>
                <h3 class="font-semibold text-white mb-4">Pautan Pantas</h3>
                <div class="space-y-2 text-sm">
                    <a href="{{ route('dashboard') }}" class="hover:text-orange-400">Dashboard</a>
                    <a href="{{ route('admin.programs') }}" class="hover:text-orange-400">Program</a>
                    <a href="{{ route('admin.institusis') }}" class="hover:text-orange-400">Institusi</a>
                    <a href="{{ route('admin.messages') }}" class="hover:text-orange-400">Mesej</a>
                </div>
            </div>
            <div>
                <h3 class="font-semibold text-white mb-4">Hubungi Kami</h3>
                <ul class="space-y-3 text-sm text-gray-400">
                    <li>📞 +6017 921 5543</li>
                    <li>✉️ info@upkb.my</li>
                    <li>📍 34 Jalan MPK 4 Taman Bukit Kepayang, Seremban</li>
                </ul>
            </div>
        </div>
        <div class="border-t border-gray-700"></div>
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center text-sm">
            <p class="text-gray-400">© {{ date('Y') }} Unit Pembangunan Kemahiran Belia.</p>
        </div>
    </footer>

</body>
</html>
