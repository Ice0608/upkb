<?php
// Quick script to check and fix staff user level

$host = '127.0.0.1';
$db = 'upkb';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    
    // Check current staff user
    $stmt = $pdo->prepare("SELECT id, username, level FROM users WHERE username = ?");
    $stmt->execute(['staff']);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($result) {
        echo "Current user: " . json_encode($result) . "\n";
        
        // Update to staff level if not already
        if ($result['level'] !== 'staff') {
            $updateStmt = $pdo->prepare("UPDATE users SET level = 'staff' WHERE username = ?");
            $updateStmt->execute(['staff']);
            echo "Updated user level to 'staff'\n";
        } else {
            echo "User already has 'staff' level\n";
        }
    } else {
        echo "User 'staff' not found\n";
    }
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
?>
