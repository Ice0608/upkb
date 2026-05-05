# Troubleshooting Pembayaran - Tidak Masuk Halaman Seterusnya

Jika anda mengalami masalah setelah menekan "Lanjutkan" pada halaman pembayaran, ikuti langkah-langkah di bawah untuk debug masalah.

## Step 1: Buka Developer Console (F12)

1. Buka halaman pembayaran
2. Tekan **F12** untuk buka Developer Tools
3. Pergi ke tab **Console**
4. Ini akan menunjukkan error messages dan debug logs

## Step 2: Tekan "Lanjutkan" dan Lihat Console Output

Apabila anda tekan "Lanjutkan", console akan menunjukkan:

### Jika Berjaya:
```
Submitting payment form with:
- Kaedah: qr
- Jumlah: 100.00
- Resit: SES-RESIT.pdf Size: 12345 Type: application/pdf
- Action URL: http://localhost/pelajar/store-pembayaran/1

Response received - Status: 200 Redirected: false
Response OK, checking for data
Redirecting to: http://localhost/pelajar/surat-tawaran/1
```

### Jika Ada Error:

Cari pesan error di console. Contoh error:

**Error 1: "Resit tidak ditemui" - Resit gagal upload**
```
- Resit: undefined atau tidak ada Size
```
**Solusi:** Pastikan file resit dipilih sebelum tekan Lanjutkan

**Error 2: "Status 422" - Validation error**
```
Server HTML error: ...validation errors...
```
**Solusi:** Check console untuk lihat validation messages

**Error 3: "Status 500" - Server error**
```
Server HTML error: ...error details...
```
**Solusi:** Check server logs di `storage/logs/laravel.log`

## Step 3: Check Server Logs

Buka terminal dan jalankan:

```bash
# Terminal 1: Monitor logs real-time
Get-Content .\storage\logs\laravel.log -Tail 50 -Wait

# Terminal 2: Tekan Lanjutkan di browser sambil monitoring
```

Logs akan menunjukkan:
- Resit uploaded ke path mana
- Pembayaran saved dengan data apa
- Sebarang error

## Step 4: Verify Database

Buka database dan check:

```sql
-- Check pembayaran record
SELECT * FROM pembayaran 
WHERE ic_pelajar = '[IC PELAJAR]' 
ORDER BY created_at DESC 
LIMIT 5;

-- Check resit path
SELECT id, ic_pelajar, resit, status, created_at 
FROM pembayaran 
WHERE resit IS NOT NULL 
ORDER BY created_at DESC 
LIMIT 5;
```

## Checklist Debugging

- [ ] Developer Console (F12) menunjukkan debug logs
- [ ] Resit file dipilih dan name muncul di console
- [ ] Status code adalah 200 (OK)
- [ ] Redirect URL correct: `/pelajar/surat-tawaran/{id}`
- [ ] Server logs tidak menunjukkan error
- [ ] Database pembayaran record sudah ada
- [ ] Resit file ada di `storage/app/public/resit/`

## Common Issues & Solutions

### 1. File Tidak Ter-upload
**Tanda:** Resit undefined di console
**Sebab:** File size terlalu besar atau format tidak disokong
**Solusi:** 
- Max 2MB
- Format: JPG, PNG, PDF, DOC, DOCX

### 2. CSRF Token Error
**Tanda:** Status 419
**Sebab:** Session expired atau token invalid
**Solusi:** 
- Refresh halaman
- Login kembali

### 3. Resit Path Error
**Tanda:** "The "public" disk is not available."
**Sebab:** Storage link tidak ada atau permission issue
**Solusi:**
```bash
php artisan storage:link
chmod -R 755 storage public/storage
```

### 4. Route Tidak Found
**Tanda:** Status 404
**Sebab:** Pelajar ID tidak valid
**Solusi:**
- Pastikan pelajar ID ada di URL
- Check pelajar ada di database

## Jika Masih Bermasalah

1. Copy console output sepenuhnya
2. Check file: `storage/logs/laravel.log`
3. Hubungi support dengan:
   - Console output (F12 > Console)
   - Server logs (tail 50 lines dari laravel.log)
   - Browser: Chrome/Firefox version
   - Resolved error message
