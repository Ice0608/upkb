<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/images/icon/seslogo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>SESOC - Tambah Institusi</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="admin-dark">
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
    @include('layouts.footer-admin')

</body>
</html>

