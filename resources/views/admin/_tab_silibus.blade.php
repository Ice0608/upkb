<div class="space-y-6">
    <div class="rounded-3xl border border-orange-100 bg-gradient-to-r from-orange-50 via-white to-amber-50 p-6 shadow-sm">
        <div class="flex flex-col gap-2 md:flex-row md:items-start md:justify-between">
            <div>
                <h2 class="text-2xl font-semibold text-gray-800">Struktur Silibus</h2>
                <p class="mt-1 text-sm text-gray-600">Susun topik pembelajaran dan pecahkan kandungan penting supaya struktur kursus lebih mudah dibaca.</p>
            </div>
            <div class="inline-flex items-center rounded-full border border-orange-200 bg-white px-4 py-2 text-xs font-semibold uppercase tracking-[0.2em] text-orange-700 shadow-sm">
                {{ $kursus->silibuses->count() }} Topik
            </div>
        </div>
    </div>

    <form id="silibus-form" action="{{ route('admin.storesilibus') }}" method="POST" class="rounded-3xl border border-gray-200 bg-white p-6 shadow-sm">
        @csrf
        <input type="hidden" name="kursus_id" value="{{ $kursus->id }}">
        <div class="grid gap-5 lg:grid-cols-[1.1fr,1.4fr]">
            <div>
                <label for="topik" class="block text-sm font-semibold text-gray-700">Topik</label>
                <input type="text" name="topik" id="topik" class="mt-2 w-full rounded-2xl border border-gray-200 bg-white px-4 py-3 text-gray-800 shadow-sm transition focus:border-orange-400 focus:ring focus:ring-orange-100" placeholder="Contoh: Asas Pengaturcaraan" required>
            </div>
            <div>
                <label for="isi_kandungan" class="block text-sm font-semibold text-gray-700">Isi Kandungan</label>
                <textarea name="isi_kandungan" id="isi_kandungan" rows="4" class="mt-2 w-full rounded-2xl border border-gray-200 bg-white px-4 py-3 text-gray-800 shadow-sm transition focus:border-orange-400 focus:ring focus:ring-orange-100" placeholder="Tulis isi kandungan. Guna baris baru untuk pecahkan kepada beberapa point." required></textarea>
            </div>
        </div>
        <div class="mt-4 flex items-center justify-between gap-3 rounded-2xl bg-gray-50 px-4 py-3">
            <p class="text-sm text-gray-500">Petua: setiap baris baru akan dipaparkan sebagai pecahan point berasingan.</p>
            <button type="submit" class="inline-flex items-center justify-center rounded-full bg-orange-500 px-6 py-3 font-semibold text-white shadow-sm transition hover:bg-orange-600">
                Tambah Silibus
            </button>
        </div>
    </form>

    <div id="silibus-list" class="grid gap-4">
        @forelse($kursus->silibuses as $item)
            @php
                $pecahanIsi = preg_split('/\r\n|\r|\n/', trim($item->isi_kandungan));
                $pecahanIsi = array_values(array_filter(array_map('trim', $pecahanIsi)));
            @endphp
            <div class="rounded-3xl border border-gray-200 bg-gray-50 p-5 shadow-sm">
                <div class="flex flex-col gap-4 lg:flex-row lg:items-start lg:justify-between">
                    <div class="min-w-0 flex-1">
                        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                            <div class="flex items-center gap-3">
                                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-2xl bg-orange-100 text-sm font-bold text-orange-600">
                                    {{ $loop->iteration }}
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-800">{{ $item->topik }}</h3>
                                    <p class="text-sm text-gray-500">Topik silibus</p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 rounded-2xl border border-gray-200 bg-white p-4">
                            @if(count($pecahanIsi) > 1)
                                <div class="grid gap-3 sm:grid-cols-2">
                                    @foreach($pecahanIsi as $isi)
                                        <div class="flex items-start gap-3 rounded-2xl bg-orange-50 px-4 py-3">
                                            <span class="mt-1 h-2.5 w-2.5 shrink-0 rounded-full bg-orange-400"></span>
                                            <p class="text-sm leading-6 text-gray-700">{{ $isi }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <p class="text-sm leading-7 text-gray-700">{{ $item->isi_kandungan }}</p>
                            @endif
                        </div>
                    </div>

                    <form action="{{ route('admin.deletesilibus', $item->id) }}" method="POST" onsubmit="return confirm('Padam item silibus ini?');" class="lg:shrink-0">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-flex items-center justify-center rounded-full bg-red-50 px-5 py-2.5 font-semibold text-red-600 ring-1 ring-red-200 transition hover:bg-red-100 hover:text-red-700">
                            Padam
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="rounded-3xl border border-dashed border-gray-300 bg-white p-8 text-center text-gray-500">Tiada silibus ditambah lagi.</div>
        @endforelse
    </div>
</div>
