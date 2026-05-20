<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/images/icon/seslogo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>SESOC - Edit Mesej</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(24px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .fade-up {
            opacity: 0;
            animation: fadeUp 0.55s ease forwards;
        }

        .mesej-hero {
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(94, 234, 212, 0.18);
            background:
                radial-gradient(circle at 12% 18%, rgba(255,255,255,0.18), transparent 24%),
                radial-gradient(circle at 88% 24%, rgba(125, 211, 252, 0.28), transparent 22%),
                radial-gradient(circle at 76% 80%, rgba(94, 234, 212, 0.26), transparent 24%),
                linear-gradient(135deg, #0f172a 0%, #0f766e 44%, #14b8a6 74%, #67e8f9 100%);
            box-shadow:
                0 24px 55px rgba(15, 23, 42, 0.16),
                0 10px 24px rgba(20, 184, 166, 0.14);
        }

        .mesej-hero::before {
            content: "";
            position: absolute;
            inset: 0;
            background:
                linear-gradient(120deg, rgba(255,255,255,0.08), transparent 42%),
                repeating-linear-gradient(90deg, rgba(255,255,255,0.08) 0 1px, transparent 1px 18px),
                repeating-linear-gradient(180deg, rgba(255,255,255,0.06) 0 1px, transparent 1px 18px);
            opacity: 0.28;
            pointer-events: none;
        }

        .mesej-hero::after {
            content: "";
            position: absolute;
            right: -4rem;
            top: -4rem;
            width: 16rem;
            height: 16rem;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(255,255,255,0.2), rgba(255,255,255,0));
            filter: blur(6px);
            pointer-events: none;
        }

        .mesej-hero-eyebrow {
            color: rgba(236, 254, 255, 0.82);
        }

        .mesej-hero-title {
            color: #ffffff;
            text-shadow: 0 10px 22px rgba(15, 23, 42, 0.24);
        }

        .mesej-hero-copy {
            color: rgba(236, 254, 255, 0.92);
        }

        .message-card {
            border: 1px solid rgba(15, 23, 42, 0.08);
            background: linear-gradient(180deg, rgba(255,255,255,0.98), rgba(248,250,252,0.96));
            box-shadow: 0 10px 24px rgba(15, 23, 42, 0.06);
            transition: transform 0.3s cubic-bezier(0.23, 1, 0.32, 1), box-shadow 0.3s ease, border-color 0.3s ease;
        }

        .message-card:hover {
            transform: translateY(-6px);
            border-color: rgba(20, 184, 166, 0.22);
            box-shadow: 0 22px 44px rgba(20, 184, 166, 0.13), 0 8px 18px rgba(15, 23, 42, 0.07);
        }

        .message-card-accent {
            background: linear-gradient(180deg, #14b8a6, #0f766e);
        }

        .message-chip {
            background: rgba(20, 184, 166, 0.08);
            color: #0f766e;
        }

        .message-mail-icon {
            color: rgba(20, 184, 166, 0.48);
        }

        .message-btn-primary {
            background: linear-gradient(120deg, #0f766e, #14b8a6);
            box-shadow: 0 10px 24px rgba(20, 184, 166, 0.22);
        }

        .message-btn-primary:hover {
            background: linear-gradient(120deg, #115e59, #0f766e);
        }

        .message-empty-icon {
            background: rgba(20, 184, 166, 0.08);
        }

    </style>
</head>
<body class="admin-dark">

@include('layouts.navadmin')

    <section class="max-w-7xl mx-auto px-6 py-12">

        <div class="mesej-hero fade-up rounded-[2.25rem] px-6 py-8 sm:px-8 sm:py-10 mb-12">
            <p class="mesej-hero-eyebrow text-xs font-bold uppercase tracking-[0.3em]">Pengurusan Pertanyaan</p>
            <h2 class="mesej-hero-title text-4xl sm:text-5xl lg:text-6xl tracking-[-0.05em] max-w-3xl">
                Urus Mesej Pelanggan
            </h2>
            <p class="mesej-hero-copy mt-5 max-w-2xl text-base sm:text-lg leading-8">
                Lihat dan urus semua mesej yang diterima dari ruangan hubungi.
            </p>
        </div>

        @if ($message = Session::get('success'))
            <div class="mb-8 bg-white border border-green-100 shadow-sm text-green-700 px-5 py-4 rounded-2xl flex items-center fade-up">
                <i class="fas fa-check-circle mr-3"></i>
                <span class="text-sm font-bold">{{ $message }}</span>
            </div>
        @endif

        @if($messages->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($messages as $i => $msg)
                    <div class="message-card group fade-up rounded-[2rem] flex flex-col h-full relative overflow-hidden" style="animation-delay: {{ 0.08 * ($i % 6) }}s">
                        
                        <div class="message-card-accent absolute left-0 top-0 bottom-0 w-1.5 opacity-0 group-hover:opacity-100 transition-opacity"></div>

                        <div class="p-8 flex-grow">
                            <div class="flex justify-between items-center mb-6">
                                <span class="message-chip text-[10px] font-black uppercase tracking-[0.2em] px-3 py-1 rounded-full">Baru</span>
                                <span class="text-[11px] font-bold text-slate-400">{{ $msg->created_at->format('d M, Y') }}</span>
                            </div>

                            <div class="mb-8">
                                <h2 class="text-xl font-black text-slate-800 leading-tight mb-2 tracking-tight">{{ $msg->nama }}</h2>
                                <p class="text-sm text-slate-400 font-medium truncate flex items-center gap-2">
                                    <i class="fas fa-at message-mail-icon"></i> {{ $msg->emel }}
                                </p>
                            </div>

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

                        <div class="px-8 pb-8 pt-2 mt-auto grid grid-cols-5 gap-3">
                            <a href="{{ route('admin.message-detail', $msg->id) }}" class="message-btn-primary col-span-4 flex justify-center items-center text-white py-4 rounded-2xl transition-all duration-300 text-xs font-black uppercase tracking-widest">
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

            <div class="mt-16 flex justify-center fade-up">
                {{ $messages->links() }}
            </div>

        @else
            <div class="bg-white rounded-[3rem] border-2 border-dashed border-slate-100 text-center py-32 shadow-sm fade-up">
                <div class="message-empty-icon w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-inbox text-teal-300 text-3xl"></i>
                </div>
                <h3 class="text-xl font-bold text-slate-800 mb-1">Peti Masuk Kosong</h3>
                <p class="text-slate-400 font-medium">Tiada sebarang mesej pelanggan buat masa ini.</p>
            </div>
        @endif
    </section>

    @include('layouts.footer-admin')

</body>
</html>
