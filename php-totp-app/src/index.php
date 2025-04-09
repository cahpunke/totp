<?php
require_once 'config/config.php';
require_once 'totp.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userToken = $_POST['token'] ?? '';
    $secret = $_SESSION['totp_secret'] ?? '';

    if (validateTOTP($userToken, $secret)) {
        echo "Token is valid!";
    } else {
        echo "Invalid token. Please try again.";
    }
}

$totpSecret = generateTOTPSecret();
$_SESSION['totp_secret'] = $totpSecret;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOTP Authentication</title>
</head>
<body>
    <h1>TOTP Authentication</h1>
    <p>Your TOTP secret is: <?php echo $totpSecret; ?></p>
    <form method="POST">
        <label for="token">Enter TOTP Token:</label>
        <input type="text" id="token" name="token" required>
        <button type="submit">Verify</button>
    </form>
</body>
</html>