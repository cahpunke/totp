# PHP TOTP Authentication Application

This is a simple PHP application that implements Time-based One-Time Password (TOTP) authentication. It allows users to generate and validate TOTP tokens for secure authentication.

## Project Structure

```
php-totp-app
├── src
│   ├── index.php          # Entry point of the application
│   ├── totp.php           # Logic for TOTP generation and validation
│   └── config
│       └── config.php     # Configuration settings
├── vendor                 # Composer dependencies
├── composer.json          # Composer configuration file
└── README.md              # Project documentation
```

## Installation

1. Clone the repository:
   ```
   git clone https://github.com/yourusername/php-totp-app.git
   cd php-totp-app
   ```

2. Install dependencies using Composer:
   ```
   composer install
   ```

## Usage

1. Configure your application settings in `src/config/config.php`.
2. Access the application by navigating to `src/index.php` in your web browser.
3. Follow the on-screen instructions to generate and validate TOTP tokens.

## Dependencies

This project uses the following libraries for TOTP functionality:
- [Google Authenticator](https://github.com/PHPGangsta/GoogleAuthenticator) for generating and validating TOTP tokens.

## License

This project is licensed under the MIT License. See the LICENSE file for more details.