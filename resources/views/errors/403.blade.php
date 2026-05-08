@include('errors.layout', [
    'statusCode' => '403',
    'title' => 'Akses Tidak Dibenarkan',
    'message' => 'Akaun anda tidak mempunyai kebenaran untuk melihat halaman ini. Sila masuk menggunakan akaun yang betul atau kembali ke dashboard anda.',
    'primaryLabel' => 'Laman Utama',
    'primaryUrl' => url('/'),
    'secondaryLabel' => 'Log Masuk',
    'secondaryUrl' => route('login'),
])
