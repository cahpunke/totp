<?php
require 'vendor/autoload.php';
require 'db.php';

use OTPHP\TOTP;
use Endroid\QrCode\QrCode;

session_start();

// Pastikan pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    die('Anda harus login terlebih dahulu.');
}

$user_id = $_SESSION['user_id'];

// Generate TOTP secret
$totp = TOTP::create();
$secret = $totp->getSecret();

// Simpan secret ke database
$stmt = $pdo->prepare('UPDATE users SET totp_secret = :secret WHERE id = :id');
$stmt->execute([':secret' => $secret, ':id' => $user_id]);

// Generate QR Code
$totp->setLabel("MyApp:User{$user_id}");
$qrCode = new QrCode($totp->getProvisioningUri());

header('Content-Type: image/png');
echo $qrCode->writeString();
