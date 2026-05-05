# Test Email Configuration
# Run this to verify your SMTP settings are correct

Write-Host "Testing Email Configuration..." -ForegroundColor Cyan
Write-Host "================================" -ForegroundColor Cyan
Write-Host ""

# Read .env file to display current settings
$envPath = ".\.env"
if (Test-Path $envPath) {
    Write-Host "Current Email Configuration from .env:" -ForegroundColor Yellow
    Write-Host "--------------------------------------" -ForegroundColor Yellow
    $envContent = Get-Content $envPath
    $mailSettings = $envContent | Where-Object { $_ -match '^MAIL_' }
    foreach ($setting in $mailSettings) {
        if ($setting -match "MAIL_PASSWORD") {
            Write-Host $setting.Replace($setting.Split('=')[1], "*****") -ForegroundColor Gray
        } else {
            Write-Host $setting -ForegroundColor Gray
        }
    }
    Write-Host ""
}

Write-Host "To test email sending, run this command in artisan tinker:" -ForegroundColor Yellow
Write-Host ""
Write-Host "php artisan tinker" -ForegroundColor Cyan
Write-Host ""
Write-Host "Then copy-paste the following code:" -ForegroundColor Yellow
Write-Host ""
Write-Host @"
`$mail = new \PHPMailer\PHPMailer\PHPMailer(true);
try {
    `$mail->isSMTP();
    `$mail->Host = env('MAIL_HOST');
    `$mail->SMTPAuth = true;
    `$mail->Username = env('MAIL_USERNAME');
    `$mail->Password = env('MAIL_PASSWORD');
    `$mail->SMTPSecure = \PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
    `$mail->Port = env('MAIL_PORT');
    
    if (`$mail->smtpConnect()) {
        echo "Success! SMTP connection works!`n";
    } else {
        echo "Failed: SMTP connection error`n";
    }
} catch (Exception `$e) {
    echo "Error: " . `$e->getMessage() . "`n";
}
"@ -ForegroundColor Cyan

Write-Host ""
Write-Host "OR: Check logs for errors" -ForegroundColor Yellow
Write-Host "Get-Content .\storage\logs\laravel.log -Tail 50" -ForegroundColor Cyan
