<?php
require 'vendor/autoload.php';
require 'db.php';

use OTPHP\TOTP;

session_start();

// Pastikan pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    die('Anda harus login terlebih dahulu.');
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare('SELECT totp_secret FROM users WHERE id = :id');
    $stmt->execute([':id' => $user_id]);
    $totp_secret = $stmt->fetchColumn();

    if ($totp_secret) {
        $totp = TOTP::create($totp_secret);
        $code = $_POST['code'];

        if ($totp->verify($code)) {
            echo "Login berhasil!";
            exit;
        } else {
            echo "Kode TOTP salah.";
        }
    }
}
?>

<form method="POST">
    <input type="text" name="code" placeholder="Masukkan kode TOTP" required>
    <button type="submit">Verifikasi</button>
</form>
