## Laravel 11
## Tailwind
## Blade
## Alpinejs
## Breeze
## Sql Lite

This app is simple auth and write profile just in minutes

## Installation

1. clone this repo
2. composer install
3. npm install
4. rename file .env.example to .env
5. php artisan key:generate
6. php artisan migrate -> The SQLite database configured for this application does not exist: database/database.sqlite.  ? choose YES
7. setup email config
    - open .env
    - setup / find this config :
       MAIL_MAILER=smtp
       MAIL_HOST=sandbox.smtp.mailtrap.io
       MAIL_PORT=587
       MAIL_USERNAME=<YOUR MAIL USERNAME >
       MAIL_PASSWORD=<YOUR MAIL PASSWORD>
       MAIL_ENCRYPTION=tls
9. npm run dev/build
10. php artisan serv or if you use HERD is very simple just open browser your_folder.test
   
