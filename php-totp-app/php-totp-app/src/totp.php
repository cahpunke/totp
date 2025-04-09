<?php
require_once 'vendor/autoload.php';

use OTPHP\TOTP;

function generateSecret() {
    $totp = TOTP::create();
    return $totp->getSecret();
}

function generateQRCode($label, $secret) {
    $totp = TOTP::create($secret);
    return $totp->getProvisioningUri($label);
}

function validateToken($secret, $token) {
    $totp = TOTP::create($secret);
    return $totp->verify($token);
}
?>