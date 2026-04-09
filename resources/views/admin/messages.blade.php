<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>UPKB - Urus Mesej</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800">

@include('layouts.navadmin')

    <section class="max-w-7xl mx-auto px-6 py-10">
        <div class="mb-8">
            <h1 class="text-4xl font-bold text-slate-900 mb-2">Urus Mesej Pelanggan</h1>
            <p class="text-gray-600">Lihat dan urus semua mesej yang diterima dari ruangan hubungi.</p>
        </div>

        @if ($message = Session::get('success'))
            <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg">
                <i class="fas fa-check-circle mr-2"></i>{{ $message }}
            </div>
        @endif

        {{-- Messages Table --}}
        <div class="bg-white rounded-3xl shadow-lg border border-gray-200 overflow-hidden">
            @if($messages->count() > 0)
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm">
                        <thead class="bg-gradient-to-r from-orange-500 to-orange-600 text-white">
                            <tr>
                                <th class="px-6 py-4 font-semibold">No.</th>
                                <th class="px-6 py-4 font-semibold">Nama</th>
                                <th class="px-6 py-4 font-semibold">Emel</th>
                                <th class="px-6 py-4 font-semibold">Perkara</th>
                                <th class="px-6 py-4 font-semibold">Nota</th>
                                <th class="px-6 py-4 font-semibold">Tarikh</th>
                                <th class="px-6 py-4 font-semibold text-center">Tindakan</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @php $counter = ($messages->currentPage() - 1) * $messages->perPage() + 1; @endphp
                            @foreach($messages as $msg)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-6 py-4 font-medium text-gray-700">{{ $counter++ }}</td>
                                    <td class="px-6 py-4">
                                        <p class="font-semibold text-gray-900">{{ $msg->nama }}</p>
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="mailto:{{ $msg->emel }}" class="text-orange-600 font-medium hover:text-orange-700 flex items-center gap-2">
                                            <i class="fas fa-envelope"></i>{{ $msg->emel }}
                                        </a>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-semibold">{{ Str::limit($msg->perkara, 30) }}</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        @if($msg->comment)
                                            <span class="inline-flex items-center gap-1 bg-green-100 text-green-700 px-2 py-1 rounded text-xs font-semibold">
                                                <i class="fas fa-check-circle"></i>Ada
                                            </span>
                                        @else
                                            <span class="inline-flex items-center gap-1 text-gray-400 text-xs">
                                                <i class="fas fa-times-circle"></i>Tiada
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-gray-600">
                                        <small>{{ $msg->created_at->format('d/m/Y H:i') }}</small>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <div class="flex justify-center gap-3">
                                            <a href="{{ route('admin.message-detail', $msg->id) }}" class="inline-flex items-center gap-1 bg-blue-500 hover:bg-blue-600 text-white px-3 py-2 rounded-lg transition text-xs font-semibold">
                                                <i class="fas fa-eye"></i>Lihat
                                            </a>
                                            <form action="{{ route('admin.message-delete', $msg->id) }}" method="POST" class="inline" onsubmit="return confirm('Adakah anda pasti ingin memadam mesej ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="inline-flex items-center gap-1 bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-lg transition text-xs font-semibold">
                                                    <i class="fas fa-trash"></i>Padam
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
                    {{ $messages->links() }}
                </div>
            @else
                <div class="text-center py-16">
                    <i class="fas fa-inbox text-5xl text-gray-300 mb-4"></i>
                    <p class="text-gray-500 text-lg">Tiada mesej dalam sistem.</p>
                </div>
            @endif
        </div>
    </section>

    @include('layouts.footer-admin')

</body>
</html>
