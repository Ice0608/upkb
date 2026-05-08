@include('errors.layout', [
    'statusCode' => '404',
    'title' => 'Halaman Tidak Ditemui',
    'message' => 'Pautan yang dibuka mungkin sudah berubah, dipadam, atau tersalah alamat. Sila kembali ke halaman utama dan pilih laluan yang tersedia.',
    'primaryLabel' => 'Laman Utama',
    'primaryUrl' => url('/'),
    'secondaryLabel' => 'Program',
    'secondaryUrl' => route('program'),
])
