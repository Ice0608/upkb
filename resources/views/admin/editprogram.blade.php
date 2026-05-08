<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/images/icon/seslogoo.png">
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
    @include('layouts.footer-admin')

</body>
</html>
