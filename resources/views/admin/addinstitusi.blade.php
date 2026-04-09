<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpeg" href="/images/icon/noBgLogo.jpeg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>UPKB - Add Institusi</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800">
@include('layouts.navadmin')

    <section class="max-w-4xl mx-auto px-6 py-10">
        <div class="rounded-3xl bg-white shadow-lg p-8 border border-gray-100">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Add New Institusi</h1>

            @if($errors->any())
            <div class="mb-6 rounded-2xl bg-red-50 p-5 border border-red-200 text-red-700">
                <ul class="list-disc list-inside space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('admin.storeinstitusi') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid gap-6">
                    <div>
                        <label for="kod_institusi" class="block text-sm font-medium text-gray-700">Kod Institusi</label>
                        <input type="text" name="kod_institusi" id="kod_institusi" value="{{ old('kod_institusi') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    <div>
                        <label for="nama_institusi" class="block text-sm font-medium text-gray-700">Nama Institusi</label>
                        <input type="text" name="nama_institusi" id="nama_institusi" value="{{ old('nama_institusi') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    <div>
                        <label for="jenis_institusi" class="block text-sm font-medium text-gray-700">Jenis Institusi</label>
                        <input type="text" name="jenis_institusi" id="jenis_institusi" value="{{ old('jenis_institusi') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    <div>
                        <label for="gambar_institusi" class="block text-sm font-medium text-gray-700">Gambar Institusi</label>
                        <input type="file" name="gambar_institusi" id="gambar_institusi" class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-md shadow-sm file:border-0 file:bg-orange-100 file:px-3 file:py-2 file:rounded-md file:text-orange-700" accept="image/*" required>
                    </div>
                    <div>
                        <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                        <textarea name="alamat" id="alamat" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>{{ old('alamat') }}</textarea>
                    </div>
                    <div>
                        <label for="mengenai_institusi" class="block text-sm font-medium text-gray-700">Mengenai Institusi</label>
                        <textarea name="mengenai_institusi" id="mengenai_institusi" rows="5" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>{{ old('mengenai_institusi') }}</textarea>
                    </div>
                </div>

                <div class="mt-8 flex items-center gap-4">
                    <button type="submit" class="bg-orange-500 text-white px-6 py-2 rounded-full hover:bg-orange-600 transition">Add Institusi</button>
                    <a href="{{ route('admin.institusis') }}" class="text-gray-600 hover:text-gray-800">Cancel</a>
                </div>
            </form>
        </div>
    </section>

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
                    <a href="{{ route('institusi') }}" class="hover:text-orange-400">Institusi</a>
                    <a href="{{ route('faq') }}" class="hover:text-orange-400">FAQ</a>
                    <a href="{{ route('galeri') }}" class="hover:text-orange-400">Galeri</a>
                    <a href="{{ route('hubungi') }}" class="hover:text-orange-400">Hubungi</a>
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
