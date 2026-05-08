@include('errors.layout', [
    'statusCode' => '503',
    'eyebrow' => 'Penyelenggaraan Sistem',
    'title' => 'Kami Sedang Menaik Taraf Sistem',
    'message' => 'Sistem SES sedang dalam proses penyelenggaraan ringkas untuk memastikan pengalaman pengguna lebih stabil. Sila cuba semula sebentar lagi.',
    'primaryLabel' => 'Semak Semula',
    'primaryUrl' => url()->current(),
    'secondaryLabel' => 'Laman Utama',
    'secondaryUrl' => url('/'),
])
