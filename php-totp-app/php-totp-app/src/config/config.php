<?php
// Configuration settings for the TOTP application

// Database connection settings
define('DB_HOST', 'localhost');
define('DB_NAME', 'your_database_name');
define('DB_USER', 'your_database_user');
define('DB_PASS', 'your_database_password');

// TOTP settings
define('TOTP_SECRET_LENGTH', 16); // Length of the TOTP secret
define('TOTP_DIGITS', 6); // Number of digits in the TOTP token
define('TOTP_PERIOD', 30); // Time period in seconds for TOTP validity

// Other environment-specific settings can be added here
?>