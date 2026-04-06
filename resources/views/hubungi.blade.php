<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>Hubungi Kami - UPKB</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-orange-50 text-gray-800">
    @include('layouts.navigation')  

    <main class="max-w-7xl mx-auto px-6 py-12">
        <div class="mb-10">
            <p class="text-sm font-bold text-orange-500">HUBUNGI KAMI</p>
            <h1 class="text-4xl md:text-5xl font-extrabold text-slate-900 mt-2">Kami sentiasa membantu anda di sini</h1>
            <p class="text-gray-600 mt-3 text-lg">Mempunyai sebarang pertanyaan mengenai program atau kemasukan? Pasukan kami sedia membantu anda.</p>
        </div>

        @if ($message = Session::get('success'))
            <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg">
                <i class="fas fa-check-circle mr-2"></i>{{ $message }}
            </div>
        @endif

        <div class="grid md:grid-cols-2 gap-8">
            <section class="rounded-3xl bg-white shadow-xl p-8 border border-gray-100">
                <div class="flex items-center gap-4 mb-6">
                    <div class="h-12 w-12 rounded-xl bg-orange-100 text-orange-600 flex items-center justify-center">
                        <i class="fas fa-location-dot"></i>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-slate-900">Alamat Pejabat</h2>
                        <p class="text-gray-500">34 Jalan MPK 4 Taman Bukit Kepayang 70300 Seremban Negeri Sembilan</p>
                        <a href="https://www.google.com/maps/search/?api=1&query=34+Jalan+MPK+4+Taman+Bukit+Kepayang+70300+Seremban" target="_blank" class="inline-flex items-center text-sm font-semibold text-orange-500 hover:text-orange-600 mt-2">
                            <i class="fas fa-map-marker-alt mr-2"></i> Buka di Google Maps
                        </a>
                    </div>
                </div>

                <div class="mb-6 rounded-xl overflow-hidden border border-gray-200">
                    <iframe width="100%" height="250" frameborder="0" style="border:0" loading="lazy" allowfullscreen 
                        src="https://www.google.com/maps?q=34+Jalan+MPK+4+Taman+Bukit+Kepayang+70300+Seremban&output=embed">
                    </iframe>
                </div>

                <div class="flex items-center gap-4 mb-6">
                    <div class="h-12 w-12 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center">
                        <i class="fas fa-phone"></i>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-slate-900">Telefon</h2>
                        <p class="text-gray-500">+6017 921 5543</p>
                        <p class="text-sm text-gray-400">Isnin - Jumaat (9:00 AM - 5:00 PM)</p>
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    <div class="h-12 w-12 rounded-xl bg-violet-100 text-violet-600 flex items-center justify-center">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-slate-900">Emel Rasmi</h2>
                        <p class="text-orange-500 font-semibold">info@upkb.my</p>
                    </div>
                </div>
            </section>

            <section class="rounded-3xl bg-white shadow-xl p-8 border border-gray-100">
                <h2 class="text-2xl font-extrabold text-slate-900 mb-6">Hantar Pertanyaan</h2>
                <form action="{{ route('hubungi.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label for="nama" class="block text-sm font-semibold text-gray-700 mb-1">Nama Penuh</label>
                        <input id="nama" name="nama" type="text" required class="w-full rounded-xl border @error('nama') border-red-500 @else border-gray-300 @enderror p-3 text-gray-800 focus:ring-2 focus:ring-orange-300 outline-none" placeholder="Nama anda" value="{{ old('nama') }}" />
                        @error('nama')<p class="text-red-500 text-sm mt-1"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label for="emel" class="block text-sm font-semibold text-gray-700 mb-1">Emel</label>
                        <input id="emel" name="emel" type="email" required class="w-full rounded-xl border @error('emel') border-red-500 @else border-gray-300 @enderror p-3 text-gray-800 focus:ring-2 focus:ring-orange-300 outline-none" placeholder="email@contoh.com" value="{{ old('emel') }}" />
                        @error('emel')<p class="text-red-500 text-sm mt-1"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label for="perkara" class="block text-sm font-semibold text-gray-700 mb-1">Perkara</label>
                        <input id="perkara" name="perkara" type="text" required class="w-full rounded-xl border @error('perkara') border-red-500 @else border-gray-300 @enderror p-3 text-gray-800 focus:ring-2 focus:ring-orange-300 outline-none" placeholder="Apa yang ingin anda tanya" value="{{ old('perkara') }}" />
                        @error('perkara')<p class="text-red-500 text-sm mt-1"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label for="mesej" class="block text-sm font-semibold text-gray-700 mb-1">Mesej</label>
                        <textarea id="mesej" name="mesej" rows="5" required class="w-full rounded-xl border @error('mesej') border-red-500 @else border-gray-300 @enderror p-3 text-gray-800 focus:ring-2 focus:ring-orange-300 outline-none" placeholder="Tulis mesej anda di sini">{{ old('mesej') }}</textarea>
                        @error('mesej')<p class="text-red-500 text-sm mt-1"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>@enderror
                    </div>
                    <button type="submit" class="w-full bg-orange-500 hover:bg-orange-600 text-white font-bold rounded-xl py-3 transition">
                        <i class="fas fa-paper-plane mr-2"></i> Hantar Mesej
                    </button>
                </form>
            </section>
        </div>
    </main>

    @include('components.social-float')

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
                <div class="grid grid-cols-2 gap-2 text-sm">
                    <a href="{{ url('/') }}" class="hover:text-orange-400">Utama</a>
                    <a href="{{ route('program') }}" class="hover:text-orange-400">Program</a>
                    <a href="{{ route('kuota') }}" class="hover:text-orange-400">Program Berkuota</a>
                    <a href="{{ route('faq') }}" class="hover:text-orange-400">Soalan Lazim</a>
                    <a href="{{ route('galeri') }}" class="hover:text-orange-400">Galeri</a>
                    <a href="{{ route('hubungi') }}" class="hover:text-orange-400">Hubungi Kami</a>
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
