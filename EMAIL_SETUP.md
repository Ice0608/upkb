# Setup Email/SMTP untuk Hantar Resit

## Persyaratan Sebelum Menggunakan Fitur "Hantar Email Resit"

Fitur hantar email resit memerlukan konfigurasi SMTP yang betul. Berikut adalah langkah-langkah setup:

### 1. Gunakan Gmail App Password

Untuk keselamatan Gmail, anda tidak boleh guna password Gmail biasa. Anda perlu:

1. **Enable 2-Factor Authentication** pada akaun Google anda:
   - Buka https://myaccount.google.com/security
   - Cari "2-Step Verification"
   - Ikuti langkah untuk setup

2. **Generate App Password**:
   - Setelah 2FA enabled, kembali ke Security settings
   - Cari "App passwords" (hanya muncul jika 2FA sudah aktif)
   - Pilih "Mail" dan "Windows Computer"
   - Google akan generate 16-character password
   - Copy password ini

### 2. Update File `.env`

Buka fail `.env` di root folder project dan pastikan konfigurasi berikut ada dan betul:

```
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-16-character-app-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your-email@gmail.com
MAIL_FROM_NAME="UPKB System"
```

**Ganti:**
- `your-email@gmail.com` dengan email Gmail anda
- `your-16-character-app-password` dengan App Password yang dihasilkan di atas

### 3. Pastikan Pelajar Punya Email

Setiap pelajar yang ingin menerima email resit mesti punya email yang tercatat dalam sistem. Email disimpan dalam borang BMD (Borang Maklumat Diri).

### 4. Testing Email

Untuk test konfigurasi, boleh jalankan command:

```bash
php artisan tinker
```

Kemudian jalankan:

```php
Mail::raw('Test email', function ($message) {
    $message->to('test@example.com')
        ->subject('Test Email');
});
```

### 5. Troubleshooting

**Error: "Email pelajar tidak tersedia"**
- Pastikan pelajar mempunyai email yang dicatat dalam BMD
- Cek field `email` dalam table `pelajar`

**Error: "Ralat menghantar email"**
- Cek `.env` file pastikan MAIL_USERNAME dan MAIL_PASSWORD betul
- Pastikan 2FA enabled di akaun Google
- Pastikan gunakan App Password, bukan regular password
- Cek log file: `storage/logs/laravel.log` untuk error details

**Error: Connection timeout**
- Firewall/ISP mungkin block SMTP port 587
- Cuba port 465 dengan ENCRYPTION_SMTPS
- Hubungi ISP/network administrator

### 6. Alternatif SMTP Provider

Jika Gmail tidak berfungsi, boleh guna provider lain seperti:

**Outlook/Office 365:**
```
MAIL_HOST=smtp.office365.com
MAIL_PORT=587
MAIL_USERNAME=your-email@outlook.com
MAIL_PASSWORD=your-password
MAIL_ENCRYPTION=tls
```

**Mailgun, SendGrid, dll** - Lihat dokumentasi Laravel untuk setup.

## Features

- **Hantar Email Resit**: Hantar resit pembayaran ke email pelajar dalam format HTML yang cantik
- **Fallback**: Jika PHPMailer gagal, sistem akan automatic fallback ke Laravel Mail
- **Error Logging**: Semua error dicatat dalam `storage/logs/laravel.log`
- **Validation**: Email dan data pelajar divalidasi sebelum hantar

## Security Note

- Jangan commit `.env` file ke version control
- Jangan share App Password dengan orang lain
- Regenerate App Password jika rasa ada keselamatan issue
