#!/bin/bash
# test-email-setup.sh - Test email configuration

cd "$(dirname "$0")"

echo "Testing Email Configuration..."
echo "================================"
echo ""

php artisan tinker <<'EOF'
use Illuminate\Support\Facades\Mail;

echo "Testing SMTP Configuration:\n";
echo "----------------------------\n";
echo "MAIL_HOST: " . env('MAIL_HOST') . "\n";
echo "MAIL_PORT: " . env('MAIL_PORT') . "\n";
echo "MAIL_USERNAME: " . env('MAIL_USERNAME') . "\n";
echo "MAIL_FROM_ADDRESS: " . env('MAIL_FROM_ADDRESS') . "\n";
echo "MAIL_FROM_NAME: " . env('MAIL_FROM_NAME') . "\n";
echo "\n";

// Test PHPMailer
echo "Testing PHPMailer Connection:\n";
echo "------------------------------\n";
try {
    $mail = new \PHPMailer\PHPMailer\PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = env('MAIL_HOST');
    $mail->SMTPAuth = true;
    $mail->Username = env('MAIL_USERNAME');
    $mail->Password = env('MAIL_PASSWORD');
    $mail->SMTPSecure = \PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = env('MAIL_PORT');
    
    // Test SMTP connection
    if ($mail->smtpConnect()) {
        echo "✓ PHPMailer SMTP connection successful!\n";
        $mail->smtpClose();
    } else {
        echo "✗ PHPMailer SMTP connection failed!\n";
    }
} catch (Exception $e) {
    echo "✗ PHPMailer error: " . $e->getMessage() . "\n";
}

echo "\nDone!\n";
exit;
EOF
