<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/images/icon/seslogoo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>UPKB - Add Program</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800">
@include('layouts.navadmin')

    <section class="max-w-4xl mx-auto px-6 py-10">
        <div class="bg-white rounded-3xl shadow-lg p-8">
            <h1 class="text-3xl font-bold text-orange-600 mb-6">Tambah Program Baru</h1>

            <form action="{{ route('admin.storeprogram') }}" method="POST" class="space-y-6">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="jenis_program" class="block text-sm font-medium text-gray-700">Jenis Program</label>
                        <input type="text" name="jenis_program" id="jenis_program" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-orange-500 focus:border-orange-500" placeholder="Masukkan jenis program" required>
                    </div>

                    <div>
                        <label for="icon" class="block text-sm font-medium text-gray-700">Icon</label>
                        <input type="text" name="icon" id="icon" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-orange-500 focus:border-orange-500" placeholder="Contoh: fas fa-star" required>
                    </div>
                </div>

                <div>
                    <label for="info_program" class="block text-sm font-medium text-gray-700">Info Program</label>
                    <textarea name="info_program" id="info_program" rows="4" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-orange-500 focus:border-orange-500" placeholder="Masukkan informasi tentang program" required></textarea>
                </div>

                <div class="flex justify-end space-x-4">
                    <button type="button" class="bg-gray-200 text-gray-700 px-6 py-2 rounded-full hover:bg-gray-300 transition">Batal</button>
                    <button type="submit" class="bg-orange-500 text-white px-6 py-2 rounded-full hover:bg-orange-600 transition">Simpan Program</button>
                </div>
            </form>
        </div>
    </section>

    @include('components.social-float')

    {{-- 🔹 FOOTER --}}
    @include('layouts.footer-admin')

</body>
</html>
