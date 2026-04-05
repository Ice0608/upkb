<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>UPKB - Edit Khusus</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800">
@include('layouts.navadmin')

    <section class="max-w-7xl mx-auto px-6 py-10">
        <div class="rounded-3xl bg-white shadow-lg border border-gray-100 overflow-hidden">
            <div class="px-8 py-8 border-b border-gray-200">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                    <div>
                        <h1 class="text-4xl font-bold text-gray-800">Edit Khusus</h1>
                        <p class="mt-2 text-gray-600">Urus data khusus serta semua submodul syarat, silibus, kerjaya dan yuran.</p>
                    </div>
                    <a href="{{ route('admin.editinstitusi', $khusus->institusi?->id ?? 0) }}" class="inline-flex items-center gap-2 rounded-full bg-orange-500 text-white px-5 py-3 hover:bg-orange-600 transition">
                        <i class="fas fa-building"></i> Kembali ke Institusi
                    </a>
                </div>
            </div>

            <div class="bg-gray-50 px-8 py-5 border-b border-gray-200">
                <div class="flex flex-wrap gap-3 text-sm text-gray-600">
                    <a href="#maklumat-am" class="px-4 py-2 rounded-full bg-white border border-gray-200 hover:bg-orange-50 hover:text-orange-600 transition">Maklumat Am</a>
                    <a href="#syarat-kelayakan" class="px-4 py-2 rounded-full bg-white border border-gray-200 hover:bg-orange-50 hover:text-orange-600 transition">Syarat Kelayakan</a>
                    <a href="#struktur-silibus" class="px-4 py-2 rounded-full bg-white border border-gray-200 hover:bg-orange-50 hover:text-orange-600 transition">Struktur Silibus</a>
                    <a href="#laluan-kerjaya" class="px-4 py-2 rounded-full bg-white border border-gray-200 hover:bg-orange-50 hover:text-orange-600 transition">Laluan Kerjaya</a>
                    <a href="#yuran-pinjam" class="px-4 py-2 rounded-full bg-white border border-gray-200 hover:bg-orange-50 hover:text-orange-600 transition">Yuran & Pinjaman</a>
                </div>
            </div>

            <div class="px-8 py-10 space-y-10">
                @if(session('success'))
                    <div class="rounded-2xl bg-green-50 border border-green-200 p-5 text-green-700">
                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="rounded-2xl bg-red-50 border border-red-200 p-5 text-red-700">
                        <ul class="list-disc list-inside space-y-1">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div id="maklumat-am" class="space-y-6">
                    <h2 class="text-2xl font-semibold text-gray-800">Maklumat Am</h2>
                    <form action="{{ route('admin.updatekhusus', $khusus->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="grid gap-6 md:grid-cols-2">
                            <div>
                                <label for="kod_khusus" class="block text-sm font-medium text-gray-700">Kod Khusus</label>
                                <input type="text" name="kod_khusus" id="kod_khusus" value="{{ old('kod_khusus', $khusus->kod_khusus) }}" class="mt-1 block w-full border-gray-300 rounded-xl shadow-sm" required>
                            </div>
                            <div>
                                <label for="nama_khusus" class="block text-sm font-medium text-gray-700">Nama Khusus</label>
                                <input type="text" name="nama_khusus" id="nama_khusus" value="{{ old('nama_khusus', $khusus->nama_khusus) }}" class="mt-1 block w-full border-gray-300 rounded-xl shadow-sm" required>
                            </div>
                            <div>
                                <label for="jenis_khusus" class="block text-sm font-medium text-gray-700">Jenis Khusus</label>
                                <input type="text" name="jenis_khusus" id="jenis_khusus" value="{{ old('jenis_khusus', $khusus->jenis_khusus) }}" class="mt-1 block w-full border-gray-300 rounded-xl shadow-sm" required>
                            </div>
                            <div>
                                <label for="mod_pengajian" class="block text-sm font-medium text-gray-700">Mod Pengajian</label>
                                <input type="text" name="mod_pengajian" id="mod_pengajian" value="{{ old('mod_pengajian', $khusus->mod_pengajian) }}" class="mt-1 block w-full border-gray-300 rounded-xl shadow-sm" required>
                            </div>
                            <div>
                                <label for="tempoh" class="block text-sm font-medium text-gray-700">Tempoh</label>
                                <input type="text" name="tempoh" id="tempoh" value="{{ old('tempoh', $khusus->tempoh) }}" class="mt-1 block w-full border-gray-300 rounded-xl shadow-sm" required>
                            </div>
                            <div>
                                <label for="kuota" class="block text-sm font-medium text-gray-700">Kuota</label>
                                <input type="number" name="kuota" id="kuota" value="{{ old('kuota', $khusus->kuota) }}" class="mt-1 block w-full border-gray-300 rounded-xl shadow-sm" required>
                            </div>
                            <div>
                                <label for="tarikh_pendaftaran" class="block text-sm font-medium text-gray-700">Tarikh Pendaftaran</label>
                                <input type="date" name="tarikh_pendaftaran" id="tarikh_pendaftaran" value="{{ old('tarikh_pendaftaran', $khusus->tarikh_pendaftaran?->format('Y-m-d')) }}" class="mt-1 block w-full border-gray-300 rounded-xl shadow-sm" required>
                            </div>
                        </div>
                        <div>
                            <label for="penerangan" class="block text-sm font-medium text-gray-700">Penerangan</label>
                            <textarea name="penerangan" id="penerangan" rows="5" class="mt-1 block w-full border-gray-300 rounded-xl shadow-sm" required>{{ old('penerangan', $khusus->penerangan) }}</textarea>
                        </div>
                        <div class="flex flex-wrap gap-4 mt-6">
                            <button type="submit" class="rounded-full bg-orange-500 text-white px-6 py-2 hover:bg-orange-600 transition">Simpan Maklumat</button>
                            <form action="{{ route('admin.deletekhusus', $khusus->id) }}" method="POST" onsubmit="return confirm('Padam khusus ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="rounded-full bg-red-500 text-white px-6 py-2 hover:bg-red-600 transition">Padam Khusus</button>
                            </form>
                        </div>
                    </form>
                </div>

                <div id="syarat-kelayakan" class="space-y-6">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                        <h2 class="text-2xl font-semibold text-gray-800">Syarat Kelayakan</h2>
                        <form action="{{ route('admin.storesyarat') }}" method="POST" class="w-full md:w-auto bg-white rounded-3xl border border-gray-200 p-6 shadow-sm">
                            @csrf
                            <input type="hidden" name="khusus_id" value="{{ $khusus->id }}">
                            <div class="space-y-4">
                                <label for="syarat_kelayakan" class="block text-sm font-medium text-gray-700">Tambah Syarat</label>
                                <textarea name="syarat_kelayakan" id="syarat_kelayakan" rows="3" class="w-full border-gray-300 rounded-xl shadow-sm" required>{{ old('syarat_kelayakan') }}</textarea>
                                <button type="submit" class="rounded-full bg-orange-500 text-white px-5 py-2 hover:bg-orange-600 transition">Tambah Syarat</button>
                            </div>
                        </form>
                    </div>

                    <div class="grid gap-4">
                        @forelse($khusus->syaratKelayakans as $item)
                            <div class="rounded-3xl border border-gray-200 bg-gray-50 p-6 flex items-start justify-between gap-4">
                                <p class="text-gray-700">{{ $item->syarat_kelayakan }}</p>
                                <form action="{{ route('admin.deletesyarat', $item->id) }}" method="POST" onsubmit="return confirm('Padam syarat ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800">Padam</button>
                                </form>
                            </div>
                        @empty
                            <div class="rounded-3xl border border-dashed border-gray-300 bg-white p-8 text-center text-gray-500">Tiada syarat kelayakan ditambah lagi.</div>
                        @endforelse
                    </div>
                </div>

                <div id="struktur-silibus" class="space-y-6">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                        <h2 class="text-2xl font-semibold text-gray-800">Struktur Silibus</h2>
                        <form action="{{ route('admin.storesilibus') }}" method="POST" class="w-full md:w-auto bg-white rounded-3xl border border-gray-200 p-6 shadow-sm">
                            @csrf
                            <input type="hidden" name="khusus_id" value="{{ $khusus->id }}">
                            <div class="space-y-4">
                                <div>
                                    <label for="topik" class="block text-sm font-medium text-gray-700">Topik</label>
                                    <input type="text" name="topik" id="topik" class="mt-1 w-full border-gray-300 rounded-xl shadow-sm" required>
                                </div>
                                <div>
                                    <label for="isi_kandungan" class="block text-sm font-medium text-gray-700">Isi Kandungan</label>
                                    <textarea name="isi_kandungan" id="isi_kandungan" rows="3" class="w-full border-gray-300 rounded-xl shadow-sm" required></textarea>
                                </div>
                                <button type="submit" class="rounded-full bg-orange-500 text-white px-5 py-2 hover:bg-orange-600 transition">Tambah Materi</button>
                            </div>
                        </form>
                    </div>

                    <div class="grid gap-4">
                        @forelse($khusus->silibuses as $item)
                            <div class="rounded-3xl border border-gray-200 bg-gray-50 p-6 flex flex-col gap-4">
                                <div>
                                    <h3 class="font-semibold text-gray-800">{{ $item->topik }}</h3>
                                    <p class="text-gray-600 mt-2">{{ $item->isi_kandungan }}</p>
                                </div>
                                <form action="{{ route('admin.deletesilibus', $item->id) }}" method="POST" onsubmit="return confirm('Padam item silibus ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800">Padam</button>
                                </form>
                            </div>
                        @empty
                            <div class="rounded-3xl border border-dashed border-gray-300 bg-white p-8 text-center text-gray-500">Tiada silibus ditambah lagi.</div>
                        @endforelse
                    </div>
                </div>

                <div id="laluan-kerjaya" class="space-y-6">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                        <h2 class="text-2xl font-semibold text-gray-800">Laluan Kerjaya</h2>
                        <form action="{{ route('admin.storekerjaya') }}" method="POST" class="w-full md:w-auto bg-white rounded-3xl border border-gray-200 p-6 shadow-sm">
                            @csrf
                            <input type="hidden" name="khusus_id" value="{{ $khusus->id }}">
                            <div class="space-y-4">
                                <label for="bidang_kerjaya" class="block text-sm font-medium text-gray-700">Bidang Kerjaya</label>
                                <input type="text" name="bidang_kerjaya" id="bidang_kerjaya" class="mt-1 w-full border-gray-300 rounded-xl shadow-sm" required>
                                <button type="submit" class="rounded-full bg-orange-500 text-white px-5 py-2 hover:bg-orange-600 transition">Tambah Kerjaya</button>
                            </div>
                        </form>
                    </div>

                    <div class="grid gap-4 md:grid-cols-2">
                        @forelse($khusus->kerjayas as $item)
                            <div class="rounded-3xl border border-gray-200 bg-gray-50 p-6 flex items-center justify-between gap-4">
                                <p class="text-gray-700">{{ $item->bidang_kerjaya }}</p>
                                <form action="{{ route('admin.deletekerjaya', $item->id) }}" method="POST" onsubmit="return confirm('Padam laluan kerjaya ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800">Padam</button>
                                </form>
                            </div>
                        @empty
                            <div class="col-span-2 rounded-3xl border border-dashed border-gray-300 bg-white p-8 text-center text-gray-500">Tiada laluan kerjaya ditambah lagi.</div>
                        @endforelse
                    </div>
                </div>

                <div id="yuran-pinjam" class="space-y-6">
                    <h2 class="text-2xl font-semibold text-gray-800">Yuran & Pinjaman</h2>
                    <div class="grid gap-6 md:grid-cols-2">
                        <div class="rounded-3xl border border-gray-200 bg-white p-6">
                            <h3 class="font-semibold text-gray-800 mb-4">Yuran Pendaftaran</h3>
                            <form action="{{ route('admin.storeyuranpendaftaran') }}" method="POST" class="space-y-4 mb-6">
                                @csrf
                                <input type="hidden" name="khusus_id" value="{{ $khusus->id }}">
                                <div>
                                    <label for="item_pendaftaran" class="block text-sm font-medium text-gray-700">Item</label>
                                    <input type="text" id="item_pendaftaran" name="item" class="mt-1 w-full border-gray-300 rounded-xl shadow-sm" required>
                                </div>
                                <div>
                                    <label for="amount_pendaftaran" class="block text-sm font-medium text-gray-700">Jumlah</label>
                                    <input type="number" step="0.01" id="amount_pendaftaran" name="amount" class="mt-1 w-full border-gray-300 rounded-xl shadow-sm" required>
                                </div>
                                <button type="submit" class="rounded-full bg-orange-500 text-white px-5 py-2 hover:bg-orange-600 transition">Tambah Yuran Pendaftaran</button>
                            </form>
                            @forelse($khusus->yuranPendaftarans as $item)
                                <div class="rounded-3xl border border-gray-200 bg-gray-50 p-4 flex items-center justify-between gap-4">
                                    <div>
                                        <p class="font-semibold text-gray-800">{{ $item->item }}</p>
                                        <p class="text-sm text-gray-600">RM {{ number_format($item->amount, 2) }}</p>
                                    </div>
                                    <form action="{{ route('admin.deleteyuranpendaftaran', $item->id) }}" method="POST" onsubmit="return confirm('Padam yuran ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800">Padam</button>
                                    </form>
                                </div>
                            @empty
                                <p class="text-gray-500">Tiada yuran pendaftaran ditambah lagi.</p>
                            @endforelse
                        </div>

                        <div class="rounded-3xl border border-gray-200 bg-white p-6">
                            <h3 class="font-semibold text-gray-800 mb-4">Yuran Pilihan</h3>
                            <form action="{{ route('admin.storeyuranpilihan') }}" method="POST" class="space-y-4 mb-6">
                                @csrf
                                <input type="hidden" name="khusus_id" value="{{ $khusus->id }}">
                                <div>
                                    <label for="pilihan" class="block text-sm font-medium text-gray-700">Pilihan</label>
                                    <input type="text" id="pilihan" name="pilihan" class="mt-1 w-full border-gray-300 rounded-xl shadow-sm" required>
                                </div>
                                <div>
                                    <label for="item_pilihan" class="block text-sm font-medium text-gray-700">Item</label>
                                    <input type="text" id="item_pilihan" name="item" class="mt-1 w-full border-gray-300 rounded-xl shadow-sm" required>
                                </div>
                                <div>
                                    <label for="amount_pilihan" class="block text-sm font-medium text-gray-700">Jumlah</label>
                                    <input type="number" step="0.01" id="amount_pilihan" name="amount" class="mt-1 w-full border-gray-300 rounded-xl shadow-sm" required>
                                </div>
                                <button type="submit" class="rounded-full bg-orange-500 text-white px-5 py-2 hover:bg-orange-600 transition">Tambah Yuran Pilihan</button>
                            </form>
                            @forelse($khusus->yuranPilihans as $item)
                                <div class="rounded-3xl border border-gray-200 bg-gray-50 p-4 flex items-center justify-between gap-4">
                                    <div>
                                        <p class="font-semibold text-gray-800">{{ $item->pilihan }} - {{ $item->item }}</p>
                                        <p class="text-sm text-gray-600">RM {{ number_format($item->amount, 2) }}</p>
                                    </div>
                                    <form action="{{ route('admin.deleteyuranpilihan', $item->id) }}" method="POST" onsubmit="return confirm('Padam yuran ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800">Padam</button>
                                    </form>
                                </div>
                            @empty
                                <p class="text-gray-500">Tiada yuran pilihan ditambah lagi.</p>
                            @endforelse
                        </div>
                    </div>

                    <div class="grid gap-6 md:grid-cols-2">
                        <div class="rounded-3xl border border-gray-200 bg-white p-6">
                            <h3 class="font-semibold text-gray-800 mb-4">Yuran Asrama</h3>
                            <form action="{{ route('admin.storeyuranasrama') }}" method="POST" class="space-y-4 mb-6">
                                @csrf
                                <input type="hidden" name="khusus_id" value="{{ $khusus->id }}">
                                <div>
                                    <label for="item_asrama" class="block text-sm font-medium text-gray-700">Item</label>
                                    <input type="text" id="item_asrama" name="item" class="mt-1 w-full border-gray-300 rounded-xl shadow-sm" required>
                                </div>
                                <div>
                                    <label for="amount_asrama" class="block text-sm font-medium text-gray-700">Jumlah</label>
                                    <input type="number" step="0.01" id="amount_asrama" name="amount" class="mt-1 w-full border-gray-300 rounded-xl shadow-sm" required>
                                </div>
                                <button type="submit" class="rounded-full bg-orange-500 text-white px-5 py-2 hover:bg-orange-600 transition">Tambah Asrama</button>
                            </form>
                            @forelse($khusus->yuranAsramas as $item)
                                <div class="rounded-3xl border border-gray-200 bg-gray-50 p-4 flex items-center justify-between gap-4">
                                    <div>
                                        <p class="font-semibold text-gray-800">{{ $item->item }}</p>
                                        <p class="text-sm text-gray-600">RM {{ number_format($item->amount, 2) }}</p>
                                    </div>
                                    <form action="{{ route('admin.deleteyuranasrama', $item->id) }}" method="POST" onsubmit="return confirm('Padam yuran ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800">Padam</button>
                                    </form>
                                </div>
                            @empty
                                <p class="text-gray-500">Tiada yuran asrama ditambah lagi.</p>
                            @endforelse
                        </div>

                        <div class="rounded-3xl border border-gray-200 bg-white p-6">
                            <h3 class="font-semibold text-gray-800 mb-4">Yuran Pengajian</h3>
                            <form action="{{ route('admin.storeyuranpengajian') }}" method="POST" class="space-y-4 mb-6">
                                @csrf
                                <input type="hidden" name="khusus_id" value="{{ $khusus->id }}">
                                <div>
                                    <label for="peringkat" class="block text-sm font-medium text-gray-700">Peringkat</label>
                                    <input type="text" id="peringkat" name="peringkat" class="mt-1 w-full border-gray-300 rounded-xl shadow-sm" required>
                                </div>
                                <div>
                                    <label for="tempoh_yuran" class="block text-sm font-medium text-gray-700">Tempoh</label>
                                    <input type="text" id="tempoh_yuran" name="tempoh" class="mt-1 w-full border-gray-300 rounded-xl shadow-sm" required>
                                </div>
                                <div>
                                    <label for="amount_pengajian" class="block text-sm font-medium text-gray-700">Jumlah</label>
                                    <input type="number" step="0.01" id="amount_pengajian" name="amount" class="mt-1 w-full border-gray-300 rounded-xl shadow-sm" required>
                                </div>
                                <button type="submit" class="rounded-full bg-orange-500 text-white px-5 py-2 hover:bg-orange-600 transition">Tambah Yuran</button>
                            </form>
                            @forelse($khusus->yuranPengajians as $item)
                                <div class="rounded-3xl border border-gray-200 bg-gray-50 p-4 flex flex-col gap-2">
                                    <div class="flex items-center justify-between gap-4">
                                        <div>
                                            <p class="font-semibold text-gray-800">{{ $item->peringkat }} / {{ $item->tempoh }}</p>
                                        </div>
                                        <form action="{{ route('admin.deleteyuranpengajian', $item->id) }}" method="POST" onsubmit="return confirm('Padam yuran ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800">Padam</button>
                                        </form>
                                    </div>
                                    <p class="text-gray-600">RM {{ number_format($item->amount, 2) }}</p>
                                </div>
                            @empty
                                <p class="text-gray-500">Tiada yuran pengajian ditambah lagi.</p>
                            @endforelse
                        </div>
                    </div>

                    <div class="rounded-3xl border border-gray-200 bg-white p-6">
                        <h3 class="font-semibold text-gray-800 mb-4">Elaun / Bantuan Sara Hidup</h3>
                        <form action="{{ route('admin.storeelaun') }}" method="POST" class="space-y-4 mb-6">
                            @csrf
                            <input type="hidden" name="khusus_id" value="{{ $khusus->id }}">
                            <div>
                                <label for="elaun_bulanan" class="block text-sm font-medium text-gray-700">Elaun Bulanan</label>
                                <input type="text" id="elaun_bulanan" name="elaun_bulanan" class="mt-1 w-full border-gray-300 rounded-xl shadow-sm" required>
                            </div>
                            <div>
                                <label for="tempoh_elaun" class="block text-sm font-medium text-gray-700">Tempoh</label>
                                <input type="text" id="tempoh_elaun" name="tempoh" class="mt-1 w-full border-gray-300 rounded-xl shadow-sm" required>
                            </div>
                            <div>
                                <label for="jumlah_elaun" class="block text-sm font-medium text-gray-700">Jumlah</label>
                                <input type="number" step="0.01" id="jumlah_elaun" name="jumlah" class="mt-1 w-full border-gray-300 rounded-xl shadow-sm" required>
                            </div>
                            <button type="submit" class="rounded-full bg-orange-500 text-white px-5 py-2 hover:bg-orange-600 transition">Tambah Elaun</button>
                        </form>
                        @forelse($khusus->elauns as $item)
                            <div class="rounded-3xl border border-gray-200 bg-gray-50 p-4 flex items-center justify-between gap-4">
                                <div>
                                    <p class="font-semibold text-gray-800">{{ $item->elaun_bulanan }} / {{ $item->tempoh }}</p>
                                    <p class="text-gray-600">RM {{ number_format($item->jumlah, 2) }}</p>
                                </div>
                                <form action="{{ route('admin.deleteelaun', $item->id) }}" method="POST" onsubmit="return confirm('Padam elaun ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800">Padam</button>
                                </form>
                            </div>
                        @empty
                            <p class="text-gray-500">Tiada elaun ditambah lagi.</p>
                        @endforelse
                    </div>
                </div>
            </div>
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
