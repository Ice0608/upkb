@include('errors.layout', [
    'statusCode' => '500',
    'title' => 'Sistem Mengalami Ralat',
    'message' => 'Maaf, sistem tidak dapat memproses permintaan anda buat masa ini. Pasukan teknikal boleh semak log aplikasi untuk butiran lanjut.',
    'primaryLabel' => 'Laman Utama',
    'primaryUrl' => url('/'),
    'secondaryLabel' => 'Cuba Semula',
    'secondaryUrl' => url()->current(),
])
