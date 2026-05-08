<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/images/icon/seslogoo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>UPKB - Urus Mesej</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>

        .mesej-hero {
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(255, 227, 170, 0.48);
            background:
                linear-gradient(90deg, #ff7a00 0%, #ff9924 56%, #ffd24a 100%);
            box-shadow:
                inset 0 1px 0 rgba(255, 250, 236, 0.44),
                0 24px 55px rgba(205, 112, 24, 0.22),
                0 0 46px rgba(255, 177, 60, 0.2);
            animation: faqFloat 6.6s var(--xmb-ease-soft) infinite;
        }

        .mesej-hero::before {
            content: "";
            position: absolute;
            inset: 0;
            background:
                radial-gradient(circle at 84% 30%, rgba(255, 249, 235, 0.3), transparent 18%),
                linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.18), transparent 72%),
                repeating-linear-gradient(90deg, rgba(255, 255, 255, 0.12) 0 1px, transparent 1px 14px),
                repeating-linear-gradient(180deg, rgba(255, 255, 255, 0.12) 0 1px, transparent 1px 14px);
            background-size: auto, auto, 8rem 5.8rem, 8rem 5.8rem;
            background-position: center, center, 1.25rem calc(100% - 0.95rem), 1.25rem calc(100% - 0.95rem);
            background-repeat: no-repeat;
            opacity: 0.9;
            pointer-events: none;
        }

        .mesej-hero::after {
            content: "";
            position: absolute;
            right: 6%;
            top: -2.25rem;
            width: 12rem;
            height: 12rem;
            border-radius: 50%;
            border: 1px solid rgba(255, 241, 209, 0.22);
            box-shadow:
                0 0 0 1rem rgba(255, 241, 209, 0.08),
                0 0 0 2rem rgba(255, 241, 209, 0.04);
            opacity: 0.92;
            pointer-events: none;
        }

        .mesej-hero-eyebrow {
            color: rgba(255, 244, 228, 0.74);
        }

        .mesej-hero-title {
            color: #ffffff;
            text-shadow: 0 10px 22px rgba(160, 74, 0, 0.24);
        }

        .mesej-hero-copy {
            color: rgba(255, 247, 235, 0.92);
        }

    </style>
</head>
<body class="bg-[#FBFCFE] text-slate-900">

@include('layouts.navadmin')

    <section class="max-w-7xl mx-auto px-6 py-12">

        <div class="mesej-hero rounded-[2.25rem] px-6 py-8 sm:px-8 sm:py-10 mb-12">
            <h2 class="mesej-hero-title text-4xl sm:text-5xl lg:text-6xl tracking-[-0.05em] max-w-3xl">
                Urus Mesej Pelanggan
            </h2>
            <p class="mesej-hero-copy mt-5 max-w-2xl text-base sm:text-lg leading-8">
                Lihat dan urus semua mesej yang diterima dari ruangan hubungi.
            </p>
        </div>

        @if ($message = Session::get('success'))
            <div class="mb-8 bg-white border border-green-100 shadow-sm text-green-700 px-5 py-4 rounded-2xl flex items-center">
                <i class="fas fa-check-circle mr-3"></i>
                <span class="text-sm font-bold">{{ $message }}</span>
            </div>
        @endif

        @if($messages->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($messages as $msg)
                    <div class="group bg-white rounded-[2rem] border border-slate-100 flex flex-col h-full shadow-sm hover:shadow-xl hover:border-orange-100 transition-all duration-300 relative overflow-hidden">
                        
                        {{-- Subtle Orange Accent Line --}}
                        <div class="absolute left-0 top-0 bottom-0 w-1.5 bg-orange-500 opacity-0 group-hover:opacity-100 transition-opacity"></div>

                        <div class="p-8 flex-grow">
                            {{-- Date & Status --}}
                            <div class="flex justify-between items-center mb-6">
                                <span class="text-[10px] font-black uppercase tracking-[0.2em] text-orange-500 bg-orange-50 px-3 py-1 rounded-full">Baru</span>
                                <span class="text-[11px] font-bold text-slate-400">{{ $msg->created_at->format('d M, Y') }}</span>
                            </div>

                            {{-- User Info --}}
                            <div class="mb-8">
                                <h2 class="text-xl font-black text-slate-800 leading-tight mb-2 tracking-tight">{{ $msg->nama }}</h2>
                                <p class="text-sm text-slate-400 font-medium truncate flex items-center gap-2">
                                    <i class="fas fa-at text-orange-300"></i> {{ $msg->emel }}
                                </p>
                            </div>

                            {{-- Preview Section --}}
                            <div class="space-y-5">
                                <div class="relative">
                                    <label class="text-[9px] font-black uppercase text-slate-300 mb-2 block tracking-widest">Perkara</label>
                                    <p class="text-sm font-bold text-slate-600 line-clamp-2 leading-relaxed">
                                        {{ $msg->perkara }}
                                    </p>
                                </div>

                                <div class="flex items-center gap-2">
                                    @if($msg->comment)
                                        <div class="flex items-center gap-1.5 bg-green-50 text-green-600 px-3 py-1 rounded-lg">
                                            <i class="fas fa-comment-dots text-[10px]"></i>
                                            <span class="text-[10px] font-black uppercase tracking-wider">Ada Ulasan</span>
                                        </div>
                                    @else
                                        <div class="flex items-center gap-1.5 bg-slate-50 text-slate-400 px-3 py-1 rounded-lg">
                                            <i class="fas fa-comment-slash text-[10px]"></i>
                                            <span class="text-[10px] font-black uppercase tracking-wider">Tiada</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        {{-- Premium Actions --}}
                        <div class="px-8 pb-8 pt-2 mt-auto grid grid-cols-5 gap-3">
                            <a href="{{ route('admin.message-detail', $msg->id) }}" class="col-span-4 flex justify-center items-center bg-orange-500 hover:bg-orange-600 text-white py-4 rounded-2xl transition-all duration-300 text-xs font-black uppercase tracking-widest shadow-lg shadow-orange-200">
                                Lihat Mesej
                            </a>
                            
                            <form action="{{ route('admin.message-delete', $msg->id) }}" method="POST" class="col-span-1" onsubmit="return confirm('Padam mesej ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full h-full flex items-center justify-center rounded-2xl border-2 border-slate-50 text-slate-300 hover:text-red-500 hover:border-red-50 transition-all duration-300">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-16 flex justify-center">
                {{ $messages->links() }}
            </div>

        @else
            <div class="bg-white rounded-[3rem] border-2 border-dashed border-slate-100 text-center py-32 shadow-sm">
                <div class="w-20 h-20 bg-orange-50 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-inbox text-orange-200 text-3xl"></i>
                </div>
                <h3 class="text-xl font-bold text-slate-800 mb-1">Peti Masuk Kosong</h3>
                <p class="text-slate-400 font-medium">Tiada sebarang mesej pelanggan buat masa ini.</p>
            </div>
        @endif
    </section>

    @include('layouts.footer-admin')

</body>
</html>