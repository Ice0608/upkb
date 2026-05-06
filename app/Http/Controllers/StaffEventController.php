<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Kursus;
use App\Models\Pelajar;
use App\Models\Pembayaran;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use Illuminate\Support\Facades\Mail;

class StaffEventController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->except([
            'guestBmd',
            'storeGuestPelajar',
            'pelajarSenaraiNama',
            'pelajarLogin',
            'pelajarVerifyIc',
            'pelajarEditBmd',
            'pelajarUpdateBmd',
            'pelajarWelcome',
            'pelajarDashboard',
            'pelajarProgram',
            'pelajarProgramList',
            'pelajarInstitusi',
            'pelajarListKursus',
            'pelajarPilihanKursus',
            'pelajarFilterByName',
            'pelajarInfoInstitusi',
            'pelajarInfoKursus',
            'pelajarTabMaklumat',
            'pelajarTabSyarat',
            'pelajarTabSilibus',
            'pelajarTabKerjaya',
            'pelajarTabYuran',
            'pelajarTabGaleri',
            'pelajarApplyNow',
            'pelajarPembayaran',
            'pelajarStorePembayaran',
            'pelajarResit',
            'pelajarSuratTawaran',
            'pelajarDownloadSuratTawaran',
            'pelajarSendEmail',
            'pelajarComplete',
            'pelajarLogout',
        ]);
    }

    public function index(Request $request)
    {
        abort_if(auth()->user()->level !== 'staff', 403);

        $events = Event::orderBy('tarikh_event', 'desc')->get();
        $selectedEvent = null;
        $pelajars = collect();
        $paymentStatus = collect();

        if ($request->filled('event_id')) {
            $selectedEvent = Event::find($request->event_id);
        }

        if (! $selectedEvent && $events->count()) {
            $selectedEvent = $events->first();
        }

        if ($selectedEvent) {
            $pelajars = Pelajar::where('event_id', $selectedEvent->id)
                ->orderBy('nama_pelajar')
                ->get();

            $paymentStatus = Pembayaran::whereIn('ic_pelajar', $pelajars->pluck('ic_pelajar')->toArray())
                ->orderByDesc('created_at')
                ->get()
                ->groupBy('ic_pelajar')
                ->map(fn ($items) => $items->first());
        }

        return view('staff.main', compact('events', 'selectedEvent', 'pelajars', 'paymentStatus'));
    }

    public function create()
    {
        abort_if(auth()->user()->level !== 'staff', 403);

        return view('staff.addevent');
    }

    public function store(Request $request)
    {
        abort_if(auth()->user()->level !== 'staff', 403);

        $data = $request->validate([
            'nama_event' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'tarikh_event' => 'required|date',
            'masa_event' => 'required',
            'PIC' => 'required|string|max:255',
        ]);

        $event = Event::create($data);

        return redirect()->route('staff.main', ['event_id' => $event->id])
            ->with('success', 'Event berjaya ditambah.');
    }

    public function guestBmd(Request $request)
    {
        $event = null;
        if ($request->filled('event_id')) {
            $event = Event::find($request->event_id);
        }

        // If user clicked "Daftar Sekarang" from a kursus page, remember the selected kursus
        if ($request->filled('set_kursus_redirect')) {
            session([
                'guest_course_redirect' => [
                    'kod_kursus' => $request->input('set_kursus_redirect'),
                    'kod_institusi' => $request->input('kod_institusi'),
                ],
            ]);
        }

        $pelajar = null;
        return view('pelajar.bmd', compact('event', 'pelajar'));
    }

    public function storeGuestPelajar(Request $request)
    {
        $data = $request->validate([
            'tarikh_pendaftaran' => 'required|date',
            'noreff' => 'nullable|string|max:255',
            'program' => 'nullable|string|max:100',
            'status_perkahwinan' => 'nullable|string|max:50',
            'nama_pelajar' => 'required|string|max:255',
            'ic_pelajar' => 'required|string|max:50',
            'spm_credit' => 'nullable|numeric|min:0',
            'no_tel' => 'required|string|max:50',
            'email' => 'nullable|email|max:255',
            'address_line1' => 'nullable|string|max:255',
            'address_line2' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:100',
            'region' => 'nullable|string|max:100',
            'postcode' => 'nullable|string|max:20',
            'nama_bapa' => 'nullable|string|max:255',
            'ic_bapa' => 'nullable|string|max:50',
            'no_tel_bapa' => 'nullable|string|max:50',
            'pekerjaan_bapa' => 'nullable|string|max:255',
            'pendapatan_bapa' => 'nullable|string|max:100',
            'nama_ibu' => 'nullable|string|max:255',
            'ic_ibu' => 'nullable|string|max:50',
            'no_tel_ibu' => 'nullable|string|max:50',
            'pekerjaan_ibu' => 'nullable|string|max:255',
            'pendapatan_ibu' => 'nullable|string|max:100',
            'jumlah_tanggungan' => 'nullable|integer|min:0',
            'event_id' => 'nullable|integer|exists:event,id',
        ]);

        // Add event_id from QR code if not validated
        if (!isset($data['event_id'])) {
            $data['event_id'] = $request->input('event_id');
        }

        // If user came from a course page, save the selected course
        $extraData = [];
        if (session()->has('guest_course_redirect')) {
            $courseRedirect = session('guest_course_redirect');
            $extraData['kod_kursus'] = $courseRedirect['kod_kursus'] ?? null;
            $extraData['kod_institusi'] = $courseRedirect['kod_institusi'] ?? null;
            // Keep session alive so pelajarVerifyIc can use it, clear it only after login
        }

        $pelajar = Pelajar::create(array_merge([
            'jumlah_tanggungan' => $request->input('jumlah_tanggungan', 0),
        ], $data, $extraData));

        return redirect()->route('pelajar.senarainama', ['pelajar_id' => $pelajar->id])
            ->with('success', 'Maklumat pelajar telah dihantar.');
    }

    public function editBmd(Pelajar $pelajar)
    {
        abort_if(auth()->user()->level !== 'staff', 403);

        $namaKursusOptions = \App\Models\Kursus::distinct('nama_kursus')->pluck('nama_kursus')->sort()->toArray();

        return view('staff.editbmd', compact('pelajar', 'namaKursusOptions'));
    }

    public function updatePelajar(Request $request, Pelajar $pelajar)
    {
        abort_if(auth()->user()->level !== 'staff', 403);

        $data = $request->validate([
            'tarikh_pendaftaran' => 'required|date',
            'noreff' => 'nullable|string|max:255',
            'program' => 'nullable|string|max:100',
            'status_perkahwinan' => 'nullable|string|max:50',
            'nama_pelajar' => 'required|string|max:255',
            'ic_pelajar' => 'required|string|max:50',
            'spm_credit' => 'nullable|numeric|min:0',
            'no_tel' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
            'address_line1' => 'nullable|string|max:255',
            'address_line2' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:100',
            'region' => 'nullable|string|max:100',
            'postcode' => 'nullable|string|max:20',
            'kod_institusi' => 'nullable|string|max:100',
            'kod_kursus' => 'nullable|string|max:100',
            'nama_bapa' => 'nullable|string|max:255',
            'ic_bapa' => 'nullable|string|max:50',
            'no_tel_bapa' => 'nullable|string|max:50',
            'pekerjaan_bapa' => 'nullable|string|max:255',
            'pendapatan_bapa' => 'nullable|string|max:100',
            'nama_ibu' => 'nullable|string|max:255',
            'ic_ibu' => 'nullable|string|max:50',
            'no_tel_ibu' => 'nullable|string|max:50',
            'pekerjaan_ibu' => 'nullable|string|max:255',
            'pendapatan_ibu' => 'nullable|string|max:100',
            'jumlah_tanggungan' => 'nullable|integer|min:0',
            'event_id' => 'nullable|integer|exists:event,id',
            'pilihan_pertama' => 'nullable|string|max:255',
            'pilihan_kedua' => 'nullable|string|max:255',
            'pilihan_ketiga' => 'nullable|string|max:255',
        ]);

        // Custom validation for unique course choices
        $pilihan = array_filter([$request->pilihan_pertama, $request->pilihan_kedua, $request->pilihan_ketiga]);
        if (count($pilihan) !== count(array_unique($pilihan))) {
            return back()->withErrors(['pilihan' => 'Pilihan kursus mesti berbeza antara satu sama lain.'])->withInput();
        }

        $pelajar->update(array_merge([
            'jumlah_tanggungan' => $request->input('jumlah_tanggungan', 0),
        ], $data));

        return redirect()->route('staff.bmd.edit', $pelajar->id)
            ->with('success', 'Maklumat pelajar telah dikemaskini.');
    }

    public function printBmd(Pelajar $pelajar, Request $request)
    {
        abort_if(!in_array(auth()->user()->level, ['staff', 'admin']), 403);

        if ($request->has('modal')) {
            return view('staff.partials.bmd-print-content', compact('pelajar'));
        }

        $html = view('staff.bmd-print', compact('pelajar'))->render();

        $pdf = Pdf::loadHtml($html);
        $pdf->setPaper('A4', 'portrait');
        return $pdf->download('BMD_' . $pelajar->ic_pelajar . '.pdf');
    }

    public function staffResit(Pelajar $pelajar, Request $request)
    {
        abort_if(!in_array(auth()->user()->level, ['staff', 'admin']), 403);

        $pembayaran = Pembayaran::where('ic_pelajar', $pelajar->ic_pelajar)->latest()->first();
        $kursus = Kursus::with('institusi')
            ->where('kod_kursus', $pelajar->kod_kursus)
            ->when($pelajar->kod_institusi, fn ($query) => $query->where('kod_institusi', $pelajar->kod_institusi))
            ->first();
        $institusi = $kursus?->institusi;

        // If modal=1, return only the content for modal display
        if ($request->modal == 1) {
            return view('staff.resit', compact('pelajar', 'pembayaran', 'kursus', 'institusi'))->render();
        }

        return view('staff.resit', compact('pelajar', 'pembayaran', 'kursus', 'institusi'));
    }

    public function sendEmailResit(Request $request)
    {
        try {
            $validated = $request->validate([
                'pelajar_id' => 'required|integer|exists:pelajar,id',
            ]);

            $pelajarId = $validated['pelajar_id'];
            $pelajar = Pelajar::findOrFail($pelajarId);

            if (!$pelajar->email) {
                return response()->json(['success' => false, 'message' => 'Email pelajar tidak tersedia.'], 422);
            }

            $pelajarEmail = $pelajar->email;
            $pelajarName = $pelajar->nama_pelajar;
            $pembayaran = Pembayaran::where('ic_pelajar', $pelajar->ic_pelajar)->latest()->first();
            $kursus = Kursus::with('institusi')
                ->where('kod_kursus', $pelajar->kod_kursus)
                ->when($pelajar->kod_institusi, fn ($query) => $query->where('kod_institusi', $pelajar->kod_institusi))
                ->first();
            $institusi = $kursus?->institusi;
            $isPdf = true;
            $safeIc = preg_replace('/[^A-Za-z0-9_-]/', '', $pelajar->ic_pelajar ?? (string) $pelajar->id);
            $filename = 'Resit_' . $safeIc . '.pdf';
            $pdf = Pdf::loadView('staff.resit', compact('pelajar', 'pembayaran', 'kursus', 'institusi', 'isPdf'));
            $pdf->setPaper('A4', 'portrait');
            $pdfContent = $pdf->output();

            // Email content
            $emailBody = '
                <html>
                <head>
                    <style>
                        body { font-family: Arial, sans-serif; color: #333; }
                        .header { background-color: #f97316; color: white; padding: 20px; text-align: center; border-radius: 8px 8px 0 0; }
                        .content { padding: 20px; background-color: #f9f9f9; }
                        .footer { background-color: #f1f5f9; padding: 10px; text-align: center; font-size: 12px; border-radius: 0 0 8px 8px; }
                        .receipt-section { border: 1px solid #ddd; padding: 10px; margin: 20px 0; background-color: white; border-radius: 4px; }
                    </style>
                </head>
                <body>
                    <div class="header">
                        <h2>Resit Pembayaran</h2>
                        <p>Universiti Pertahanan Nasional Malaysia</p>
                    </div>
                    <div class="content">
                        <p>Salam ' . htmlspecialchars($pelajarName) . ',</p>
                        <p>Berikut adalah resit pembayaran anda dalam format PDF.</p>
                        <p>Sila buka lampiran PDF untuk melihat atau menyimpan resit rasmi.</p>
                        <p>Sila simpan resit ini untuk rekod anda.</p>
                        <p>Sebarang pertanyaan, sila hubungi kami.</p>
                        <p>Terima kasih.</p>
                    </div>
                    <div class="footer">
                        <p>&copy; 2024 UPNM. Sistem Pengurusan Pelajar.</p>
                    </div>
                </body>
                </html>
            ';

            // Try using PHPMailer first
            $sentViaPhpMailer = false;
            try {
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host = env('MAIL_HOST', 'smtp.gmail.com');
                $mail->SMTPAuth = true;
                $mail->Username = env('MAIL_USERNAME');
                $mail->Password = env('MAIL_PASSWORD');
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = env('MAIL_PORT', 587);
                $mail->setFrom(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME', 'UPKB System'));
                $mail->addAddress($pelajarEmail, $pelajarName);
                $mail->isHTML(true);
                $mail->Subject = 'Resit Pembayaran - ' . $pelajarName;
                $mail->Body = $emailBody;
                $mail->AltBody = 'Resit pembayaran anda dilampirkan dalam format PDF.';
                $mail->addStringAttachment($pdfContent, $filename, 'base64', 'application/pdf');
                $mail->send();
                $sentViaPhpMailer = true;
            } catch (\Throwable $e) {
                \Log::warning('PHPMailer failed: ' . $e->getMessage());
                // Fall through to Laravel Mail
            }

            // If PHPMailer failed, try Laravel Mail
            if (!$sentViaPhpMailer) {
                try {
                    Mail::html($emailBody, function ($message) use ($pelajarEmail, $pelajarName, $pdfContent, $filename) {
                        $message->to($pelajarEmail, $pelajarName)
                            ->subject('Resit Pembayaran - ' . $pelajarName)
                            ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME', 'UPKB System'))
                            ->attachData($pdfContent, $filename, ['mime' => 'application/pdf']);
                    });
                } catch (\Throwable $e) {
                    \Log::error('Both PHPMailer and Laravel Mail failed: ' . $e->getMessage());
                    return response()->json([
                        'success' => false,
                        'message' => 'Tidak dapat menghantar email. Sila semak konfigurasi SMTP: ' . $e->getMessage()
                    ], 500);
                }
            }

            return response()->json([
                'success' => true,
                'message' => $pelajarEmail
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Ralat validasi: ' . json_encode($e->errors())
            ], 422);
        } catch (\Exception $e) {
            \Log::error('sendEmailResit error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Ralat sistem: ' . $e->getMessage()
            ], 500);
        }
    }

    // ========== PELAJAR ROUTES ==========

    public function pelajarSenaraiNama(Request $request)
    {
        $pelajar = null;
        $events = \App\Models\Event::orderBy('tarikh_event', 'desc')->get();
        $selectedEvent = null;
        $pelajars = collect();

        if ($request->filled('pelajar_id')) {
            $pelajar = Pelajar::find($request->pelajar_id);
            if ($pelajar && $pelajar->event_id) {
                $selectedEvent = Event::find($pelajar->event_id);
            }
        }

        if ($request->filled('event_id')) {
            $selectedEvent = Event::find($request->event_id);
        }

        if ($selectedEvent) {
            $pelajars = Pelajar::where('event_id', $selectedEvent->id)
                ->orderBy('nama_pelajar')
                ->get();
        }

        return view('pelajar.senarainama', compact('pelajar', 'events', 'selectedEvent', 'pelajars'));
    }

    public function pelajarLogin(Request $request, $pelajar_id = null)
    {
        $pelajar = null;
        // Cari pelajar ikut parameter route dahulu, fallback ke query string jika perlu
        if ($pelajar_id) {
            $pelajar = Pelajar::find($pelajar_id);
        } elseif ($request->filled('pelajar_id')) {
            $pelajar = Pelajar::find($request->pelajar_id);
        }

        $events = \App\Models\Event::orderBy('tarikh_event', 'desc')->get();
        $selectedEvent = null;
        $pelajars = collect();

        if ($pelajar && $pelajar->event_id) {
            $selectedEvent = Event::find($pelajar->event_id);
            $pelajars = Pelajar::where('event_id', $selectedEvent->id)
                ->orderBy('nama_pelajar')
                ->get();
        }

        return view('pelajar.loginpelajar', compact('pelajar', 'events', 'selectedEvent', 'pelajars'));
    }

    public function pelajarVerifyIc(Request $request)
    {
        $request->validate([
            'pelajar_id' => 'required|exists:pelajar,id',
            'ic_pelajar' => 'required|string',
        ]);

        $pelajar = Pelajar::find($request->pelajar_id);

        if ($pelajar->ic_pelajar === $request->ic_pelajar) {
            // Guest browsing flow: user clicked "Daftar Sekarang" from a course page
            if (session()->has('guest_course_redirect')) {
                $courseRedirect = session('guest_course_redirect');
                $kod_kursus = $courseRedirect['kod_kursus'] ?? null;
                $kod_institusi = $courseRedirect['kod_institusi'] ?? null;

                // Clear the session now that we're using it
                session()->forget('guest_course_redirect');

                if ($kod_kursus && $kod_institusi) {
                    $kursusDipilih = \App\Models\Kursus::where('kod_kursus', $kod_kursus)
                        ->where('kod_institusi', $kod_institusi)
                        ->first();

                    if ($kursusDipilih) {
                        return redirect()->route('pelajar.infokursus', [$pelajar->id, $kursusDipilih->id])
                            ->with('success', 'IC disahkan. Melangkah ke maklumat kursus yang anda pilih.');
                    }
                }
            }

            // QR / direct access flow: go to pelajar dashboard
            return redirect()->route('pelajar.welcome', $pelajar->id)
                ->with('success', 'IC disahkan. Selamat datang ke dashboard pelajar.');
        }

        return back()->withErrors(['ic_pelajar' => 'No. IC tidak sepadan.'])->withInput();
    }

    public function pelajarEditBmd(Pelajar $pelajar)
    {
        $event = $pelajar->event_id ? Event::find($pelajar->event_id) : null;
        return view('pelajar.editbmd', compact('pelajar', 'event'));
    }

    public function pelajarUpdateBmd(Request $request, Pelajar $pelajar)
    {
        $data = $request->validate([
            'tarikh_pendaftaran' => 'required|date',
            'noreff' => 'nullable|string|max:255',
            'program' => 'nullable|string|max:100',
            'status_perkahwinan' => 'nullable|string|max:50',
            'nama_pelajar' => 'required|string|max:255',
            'ic_pelajar' => 'required|string|max:50',
            'spm_credit' => 'nullable|numeric|min:0',
            'no_tel' => 'required|string|max:50',
            'email' => 'nullable|email|max:255',
            'address_line1' => 'nullable|string|max:255',
            'address_line2' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:100',
            'region' => 'nullable|string|max:100',
            'postcode' => 'nullable|string|max:20',
            'nama_bapa' => 'nullable|string|max:255',
            'ic_bapa' => 'nullable|string|max:50',
            'no_tel_bapa' => 'nullable|string|max:50',
            'pekerjaan_bapa' => 'nullable|string|max:255',
            'pendapatan_bapa' => 'nullable|string|max:100',
            'nama_ibu' => 'nullable|string|max:255',
            'ic_ibu' => 'nullable|string|max:50',
            'no_tel_ibu' => 'nullable|string|max:50',
            'pekerjaan_ibu' => 'nullable|string|max:255',
            'pendapatan_ibu' => 'nullable|string|max:100',
            'jumlah_tanggungan' => 'nullable|integer|min:0',
            'event_id' => 'nullable|integer|exists:event,id',
        ]);

        $pelajar->update(array_merge([
            'jumlah_tanggungan' => $request->input('jumlah_tanggungan', 0),
        ], $data));

        return redirect()->route('pelajar.welcome', $pelajar->id)
            ->with('success', 'Maklumat telah dikemaskini.');
    }

    public function pelajarWelcome(Pelajar $pelajar)
    {
        $programs = \App\Models\Program::all();
        return view('pelajar.student-dashboard', compact('pelajar', 'programs'));
    }

    public function pelajarDashboard(Pelajar $pelajar)
    {
        return view('pelajar.student-dashboard', compact('pelajar'));
    }

    public function pelajarProgram(Pelajar $pelajar)
    {
        $programs = \App\Models\Program::all();
        return view('pelajar.program', compact('pelajar', 'programs'));
    }

    public function pelajarProgramList(Pelajar $pelajar)
    {
        $programs = \App\Models\Program::all();
        return view('pelajar.program', compact('pelajar', 'programs'));
    }

    public function pelajarInstitusi(Pelajar $pelajar, Request $request)
    {
        $jenis = $request->query('jenis');
        $negeri = $request->query('negeri');
        $kuota = $request->query('kuota');

        $query = \App\Models\Institusi::query()
            ->withCount('kursuses')
            ->with(['kursuses' => function ($q) {
                $q->select('id', 'kod_institusi', 'kod_kursus', 'nama_kursus');
            }]);

        if ($jenis) {
            $query->where('jenis_institusi', $jenis);
        }

        if ($negeri) {
            $query->where('alamat', 'LIKE', '%' . $negeri . '%');
        }

        if ($kuota) {
            $query->whereHas('kursuses', function ($q) {
                $q->where('kuota', '>', 0);
            });
        }

        $institusis = $query->get();

        return view('pelajar.institusi', compact('pelajar', 'institusis', 'jenis'));
    }

    public function pelajarListKursus(Pelajar $pelajar, $nama)
    {
        $jenis = $nama; // Untuk kompatibilitas route lama
        if (request()->has('jenis')) {
            $jenis = request('jenis');
        }

        $query = \App\Models\Kursus::with(['institusi', 'galeris']);
        if ($jenis) {
            $query->whereHas('institusi', function ($q) use ($jenis) {
                $q->where('jenis_institusi', $jenis);
            });
        }
        $kursusList = $query->get();
        $selectedProgram = \App\Models\Program::where('jenis_program', $jenis)->first();

        // Render pelajar-specific view dan sertakan objek pelajar
        return view('pelajar.listkursus', compact('pelajar', 'kursusList', 'jenis', 'selectedProgram'));
    }

    public function pelajarPilihanKursus(Pelajar $pelajar, $nama)
    {
        // If AJAX request, return the partial HTML (used by the frontend filters)
        if (request()->ajax() || request()->wantsJson()) {
            $namaKursus = urldecode($nama);
            $query = \App\Models\Kursus::with(['institusi', 'galeris'])
                ->where('nama_kursus', $namaKursus);

            $semuaKursus = $query->get();
            $html = view('pelajar._pilihankursus_institusi', compact('semuaKursus', 'pelajar'))->render();

            return response()->json(['html' => $html]);
        }

        // Non-AJAX: render the full pilihan-kursus page (behaviour like KursusController/InterviewController)
        $namaKursus = urldecode($nama);
        $semuaKursus = \App\Models\Kursus::with(['institusi', 'galeris'])
            ->where('nama_kursus', $namaKursus)
            ->get();

        $selectedCourse = $semuaKursus->first();
        $heroImage = optional($selectedCourse?->galeris->first())->imej
            ?? optional($selectedCourse?->institusi)->gambar_institusi
            ?? 'images/default-course.jpg';
        $selectedDescription = $selectedCourse?->penerangan
            ?? 'Penerangan kursus tidak tersedia pada masa ini.';

        $jenisKursusOptions = $semuaKursus->pluck('jenis_kursus')->filter()->unique()->values();
        $tempohOptions = $semuaKursus->pluck('tempoh')->filter()->unique()->values();
        $modPengajianOptions = $semuaKursus->pluck('mod_pengajian')->filter()->unique()->values();

        return view('pelajar.pilihankursus', compact(
            'pelajar',
            'semuaKursus',
            'namaKursus',
            'heroImage',
            'selectedDescription',
            'jenisKursusOptions',
            'tempohOptions',
            'modPengajianOptions'
        ));
    }

    public function pelajarFilterByName(Pelajar $pelajar, $nama)
    {
        $query = \App\Models\Kursus::with(['institusi', 'galeris'])
            ->where('nama_kursus', $nama);

        $semuaKursus = $query->get();
        $html = view('pelajar._pilihankursus_institusi', compact('semuaKursus', 'pelajar'))->render();

        return response()->json(['html' => $html]);
    }

    public function pelajarInfoInstitusi(Pelajar $pelajar, $kod_institusi)
    {
        $institusi = \App\Models\Institusi::where('kod_institusi', $kod_institusi)->firstOrFail();
        $kursusList = \App\Models\Kursus::where('kod_institusi', $institusi->kod_institusi)->get();
        $galeriList = \App\Models\Galeri::where('kod_institusi', $institusi->kod_institusi)->get();

        return view('pelajar.infoinstitusi', compact('pelajar', 'institusi', 'kursusList', 'galeriList'));
    }

    public function pelajarInfoKursus(Pelajar $pelajar, Kursus $kursus)
    {
        $kursus->load('institusi');
        $kursus->loadScopedCourseDetails([
            'galeris',
            'syaratKelayakans',
            'silibuses',
            'kerjayas',
            'yuranPendaftarans',
            'yuranPilihans',
            'yuranAsramas',
            'yuranPengajians',
            'elauns',
        ]);

        return view('pelajar.infokursus', compact('pelajar', 'kursus'));
    }

    public function pelajarTabMaklumat(Pelajar $pelajar, Kursus $kursus)
    {
        $kursus->loadScopedCourseDetails('syaratKelayakans');
        return view('pelajar._guest_tab_maklumat', compact('kursus'));
    }

    public function pelajarTabSyarat(Pelajar $pelajar, Kursus $kursus)
    {
        $kursus->loadScopedCourseDetails('syaratKelayakans');
        return view('pelajar._guest_tab_syarat', compact('kursus'));
    }

    public function pelajarTabSilibus(Pelajar $pelajar, Kursus $kursus)
    {
        $kursus->loadScopedCourseDetails('silibuses');
        return view('pelajar._guest_tab_silibus', compact('kursus'));
    }

    public function pelajarTabKerjaya(Pelajar $pelajar, Kursus $kursus)
    {
        $kursus->loadScopedCourseDetails('kerjayas');
        return view('pelajar._guest_tab_kerjaya', compact('kursus'));
    }

    public function pelajarTabYuran(Pelajar $pelajar, Kursus $kursus)
    {
        $kursus->loadScopedCourseDetails([
            'yuranPendaftarans',
            'yuranPilihans',
            'yuranAsramas',
            'yuranPengajians',
            'elauns',
        ]);
        return view('pelajar._guest_tab_yuran', compact('kursus'));
    }

    public function pelajarTabGaleri(Pelajar $pelajar, Kursus $kursus)
    {
        $kursus->load('institusi');

        $galleries = \App\Models\Galeri::where('kod_kursus', $kursus->kod_kursus)
            ->where('kod_institusi', $kursus->institusi?->kod_institusi)
            ->get();

        // Keep legacy variable name ($galeri) for compatibility with existing views.
        $galeri = $galleries;

        return view('pelajar._guest_tab_galeri', compact('kursus', 'galleries', 'galeri'));
    }

    public function pelajarApplyNow(Request $request, Pelajar $pelajar)
    {
        $request->validate([
            'kod_institusi' => 'required|string',
            'kod_kursus' => 'required|string',
        ]);

        $pelajar->update([
            'kod_institusi' => $request->kod_institusi,
            'kod_kursus' => $request->kod_kursus,
        ]);

        return redirect()->route('pelajar.editbmd', $pelajar->id)
            ->with('success', 'Kod institusi dan kod kursus telah dikemaskini.');
    }

    public function pelajarPembayaran(Pelajar $pelajar)
    {
        $kursus = null;
        if ($pelajar->kod_kursus) {
            $kursus = \App\Models\Kursus::where('kod_kursus', $pelajar->kod_kursus)
                ->when($pelajar->kod_institusi, fn ($query) => $query->where('kod_institusi', $pelajar->kod_institusi))
                ->first();
        }

        $yuranPendaftaran = $kursus ? \App\Models\YuranPendaftaran::where('kod_kursus', $kursus->kod_kursus)
            ->where('kod_institusi', $kursus->kod_institusi)
            ->first() : null;
        $jumlah = $yuranPendaftaran ? $yuranPendaftaran->yuran : 0;

        return view('pelajar.pembayaran', compact('pelajar', 'kursus', 'jumlah'));
    }

    public function pelajarStorePembayaran(Request $request, Pelajar $pelajar)
    {
        try {
            $validated = $request->validate([
                'kaedah_pembayaran' => 'required|string|in:qr,cash,transfer',
                'resit' => 'required|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
                'jumlah' => 'required|numeric|min:0',
            ], [
                'resit.required' => 'Resit pembayaran diperlukan.',
                'resit.mimes' => 'Resit mesti dalam format JPG, PNG, PDF, DOC atau DOCX.',
                'resit.max' => 'Saiz resit tidak boleh melebihi 2MB.',
                'kaedah_pembayaran.required' => 'Kaedah pembayaran diperlukan.',
                'jumlah.required' => 'Jumlah pembayaran diperlukan.',
            ]);

            $resitPath = null;
            if ($request->hasFile('resit')) {
                $file = $request->file('resit');
                // Generate unique filename
                $filename = time() . '_' . $pelajar->ic_pelajar . '_' . $file->getClientOriginalName();
                $resitPath = $file->storeAs('resit', $filename, 'public');
                
                \Log::info('Resit uploaded successfully', [
                    'pelajar_id' => $pelajar->id,
                    'filename' => $filename,
                    'path' => $resitPath
                ]);
            }

            $jumlah = (float) $validated['jumlah'];

            $pembayaran = \App\Models\Pembayaran::create([
                'ic_pelajar' => $pelajar->ic_pelajar,
                'username' => 'pelajar',
                'kaedah_pembayaran' => $validated['kaedah_pembayaran'],
                'jumlah_bayaran' => $jumlah,
                'bayaran_semasa' => $jumlah,
                'status' => 'pending',
                'resit' => $resitPath,
                'tarikh_pembayaran' => now()->toDateString(),
                'masa_pembayaran' => now()->toTimeString(),
            ]);

            \Log::info('Pembayaran recorded successfully', [
                'pelajar_id' => $pelajar->id,
                'pembayaran_id' => $pembayaran->id,
                'jumlah' => $jumlah,
            ]);

            return redirect()->route('pelajar.surat-tawaran', $pelajar->id)
                ->with('success', 'Pembayaran telah direkod berjaya! Terima kasih.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            \Log::warning('Pembayaran validation error', $e->errors());
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            \Log::error('Pembayaran storage error', [
                'error' => $e->getMessage(),
                'pelajar_id' => $pelajar->id,
            ]);
            return back()->with('error', 'Ralat semasa menyimpan pembayaran: ' . $e->getMessage())->withInput();
        }
    }

    public function pelajarResit(Pelajar $pelajar)
    {
        $pembayaran = \App\Models\Pembayaran::where('ic_pelajar', $pelajar->ic_pelajar)->latest()->first();
        return view('pelajar.resit', compact('pelajar', 'pembayaran'));
    }

    public function pelajarSuratTawaran(Pelajar $pelajar)
    {
        $kursus = null;
        $institusi = null;
        $hasSuratTawaran = false;

        if ($pelajar->kod_kursus) {
            $kursus = \App\Models\Kursus::where('kod_kursus', $pelajar->kod_kursus)
                ->when($pelajar->kod_institusi, fn ($query) => $query->where('kod_institusi', $pelajar->kod_institusi))
                ->first();
            if ($kursus && $kursus->kod_institusi) {
                $institusi = \App\Models\Institusi::where('kod_institusi', $kursus->kod_institusi)->first();
                $suratPath = public_path("wordinstitusi/{$kursus->kod_institusi}/SURAT TAWARAN/{$kursus->kod_kursus}.docx");
                $hasSuratTawaran = file_exists($suratPath);
            }
        }

        // View expects variable named $hasSurat — provide both for compatibility
        $hasSurat = $hasSuratTawaran;
        return view('pelajar.surat-tawaran', compact('pelajar', 'kursus', 'institusi', 'hasSurat'));
    }

    public function pelajarDownloadSuratTawaran(Pelajar $pelajar)
    {
        if (!$pelajar->kod_kursus) {
            return back()->with('error', 'Tiada kursus dipilih.');
        }

        $kursus = \App\Models\Kursus::where('kod_kursus', $pelajar->kod_kursus)
            ->when($pelajar->kod_institusi, fn ($query) => $query->where('kod_institusi', $pelajar->kod_institusi))
            ->first();
        if (!$kursus) {
            return back()->with('error', 'Kursus tidak ditemui.');
        }

        $templatePath = public_path("wordinstitusi/{$kursus->kod_institusi}/SURAT TAWARAN/{$kursus->kod_kursus}.docx");

        if (!file_exists($templatePath)) {
            return back()->with('error', 'Template surat tawaran tidak ditemui.');
        }

        try {
            $processor = new \PhpOffice\PhpWord\TemplateProcessor($templatePath);
            $institusi = \App\Models\Institusi::where('kod_institusi', $kursus->kod_institusi)->first();

            $processor->setValues([
                'nama_pelajar' => $pelajar->nama_pelajar,
                'ic_pelajar' => $pelajar->ic_pelajar,
                'alamat' => ($pelajar->address_line1 ?? '') . ($pelajar->address_line2 ? ', ' . $pelajar->address_line2 : '') . ', ' . ($pelajar->city ?? '') . ' ' . ($pelajar->postcode ?? ''),
                'tarikh_hari_ini' => now()->format('d/m/Y'),
                'tarikh_pendaftaran' => $pelajar->tarikh_pendaftaran ? $pelajar->tarikh_pendaftaran->format('d/m/Y') : now()->format('d/m/Y'),
                'tarikh_daftar' => now()->format('d/m/Y'),
                'nama_kursus' => $kursus->nama_kursus,
                'nama_institusi' => $institusi->nama_institusi ?? '',
            ]);

            $tempPath = storage_path('app/temp/surat_tawaran_' . $pelajar->id . '.docx');
            $processor->saveAs($tempPath);

            return response()->download($tempPath)->deleteFileAfterSend(true);
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menghasilkan surat tawaran: ' . $e->getMessage());
        }
    }

    public function pelajarSendEmail(Pelajar $pelajar)
    {
        // Placeholder for email sending functionality
        return redirect()->route('pelajar.complete', $pelajar->id)
            ->with('success', 'Email telah dihantar.');
    }

    public function pelajarComplete(Pelajar $pelajar)
    {
        // Update payment status to pending
        \App\Models\Pembayaran::where('ic_pelajar', $pelajar->ic_pelajar)->update(['status' => 'pending']);

        return view('pelajar.complete', compact('pelajar'));
    }

    public function pelajarLogout()
    {
        return redirect()->route('pelajar.senarainama')
            ->with('success', 'Anda telah logout.');
    }

    // Staff: Update payment status
    public function updatePaymentStatus(Request $request)
    {
        abort_if(auth()->user()->level !== 'staff', 403);
        $request->validate([
            'ic_pelajar' => 'required|string',
            'status' => 'required|string',
            'jumlah_bayaran' => 'nullable|numeric|min:0',
            'bayaran_semasa' => 'nullable|numeric|min:0',
        ]);

        $pembayaran = Pembayaran::where('ic_pelajar', $request->ic_pelajar)->latest()->first();

        $dataToUpdate = [
            'status' => $request->status,
        ];

        if ($request->filled('jumlah_bayaran')) {
            $dataToUpdate['jumlah_bayaran'] = $request->input('jumlah_bayaran');
        }

        if ($request->filled('bayaran_semasa')) {
            $dataToUpdate['bayaran_semasa'] = $request->input('bayaran_semasa');
        }

        if ($pembayaran) {
            $pembayaran->update(array_merge($dataToUpdate, ['username' => auth()->user()->name]));
        } else {
            Pembayaran::create([
                'ic_pelajar' => $request->ic_pelajar,
                'username' => auth()->user()->name,
                'kaedah_pembayaran' => 'Manual',
                'jumlah_bayaran' => $request->input('jumlah_bayaran', 0),
                'bayaran_semasa' => $request->input('bayaran_semasa', 0),
                'status' => $request->status,
                'resit' => null,
                'tarikh_pembayaran' => now()->toDateString(),
                'masa_pembayaran' => now()->toTimeString(),
            ]);
        }

        return redirect()->route('staff.main')->with('success', 'Status pembayaran telah dikemaskini.');
    }
}
