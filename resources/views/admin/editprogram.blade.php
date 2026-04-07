<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>UPKB - Edit Program</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800">
@include('layouts.navadmin')

    <section class="max-w-4xl mx-auto px-6 py-10">
        <div class="bg-white rounded-3xl shadow-lg p-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Edit Program</h1>

            <form action="{{ route('admin.updateprogram', $program->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="jenis_program" class="block text-sm font-medium text-gray-700">Jenis Program</label>
                    <input type="text" name="jenis_program" id="jenis_program" value="{{ $program->jenis_program }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>

                <div class="mb-4">
                    <label for="info_program" class="block text-sm font-medium text-gray-700">Info Program</label>
                    <textarea name="info_program" id="info_program" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>{{ $program->info_program }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="icon" class="block text-sm font-medium text-gray-700">Icon (FontAwesome class)</label>
                    <input type="text" name="icon" id="icon" value="{{ $program->icon }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>

                <button type="submit" class="bg-orange-500 text-white px-6 py-2 rounded-full hover:bg-orange-600 transition">Update Program</button>
                <a href="{{ route('admin.programs') }}" class="ml-4 text-gray-600 hover:text-gray-800">Cancel</a>
            </form>
        </div>
    </section>

    @include('components.social-float')

    {{-- 🔹 FOOTER --}}
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
