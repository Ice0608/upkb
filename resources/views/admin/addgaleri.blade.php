<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/images/icon/seslogo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>UPKB - Add Galeri</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800">
@include('layouts.navadmin')

    <section class="max-w-4xl mx-auto px-6 py-10">
        <div class="rounded-3xl bg-white shadow-lg p-8 border border-gray-100">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Add New Foto Galeri</h1>

            @if($errors->any())
            <div class="mb-6 rounded-2xl bg-red-50 p-5 border border-red-200 text-red-700">
                <ul class="list-disc list-inside space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('admin.storagaleri') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid gap-6">
                    <input type="hidden" name="kod_institusi" value="{{ $kod_institusi }}">
                    
                    <div>
                        <label for="imej" class="block text-sm font-medium text-gray-700">Gambar</label>
                        <input type="file" name="imej" id="imej" class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-md shadow-sm file:border-0 file:bg-orange-100 file:px-3 file:py-2 file:rounded-md file:text-orange-700" accept="image/*" required>
                    </div>
                    
                    <div>
                        <label for="penerangan" class="block text-sm font-medium text-gray-700">Penerangan</label>
                        <textarea name="penerangan" id="penerangan" rows="5" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>{{ old('penerangan') }}</textarea>
                    </div>
                </div>

                <div class="mt-8 flex items-center gap-4">
                    <button type="submit" class="bg-orange-500 text-white px-6 py-2 rounded-full hover:bg-orange-600 transition">Add Foto</button>
                    <a href="javascript:history.back()" class="text-gray-600 hover:text-gray-800">Cancel</a>
                </div>
            </form>
        </div>
    </section>

    @include('components.social-float')

    @include('layouts.footer-admin')

</body>
</html>
