@include('errors.layout', [
    'statusCode' => '419',
    'title' => 'Sesi Telah Tamat',
    'message' => 'Sesi keselamatan borang anda telah luput. Sila buka semula halaman dan hantar maklumat sekali lagi.',
    'primaryLabel' => 'Muat Semula',
    'primaryUrl' => url()->previous() ?: url('/'),
    'secondaryLabel' => 'Laman Utama',
    'secondaryUrl' => url('/'),
])
