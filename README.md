@ Laravel 11
@ Tailwind
@ Blade
@ Alpinejs
@ Breeze
@ Sql Lite

This app is simple auth and write profile just in minutes

## FITURE Fullstack
1. Register
2. Login
4. email verification

## FITURE API
1. Register
2. Register with facebook, google
3. Login with facebook, google
4. otp email verification
5. Dashboard with list user and paging
   

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
8. setup facebook,google login config
    - open .env
    - add this config  :
       GITHUB_CLIENT_ID= (YOUR GITHUB_CLIENT_ID)
        GITHUB_CLIENT_SECRET= (YOUR GITHUB_CLIENT_SECRET)
         
        FACEBOOK_CLIENT_ID=(YOUR FACEBOOK_CLIENT_ID_
        FACEBOOK_CLIENT_SECRET=(YOUR FACEBOOK_CLIENT_SECRET)
         
        GOOGLE_CLIENT_ID=(YOUR GOOGLE_CLIENT_ID)
        GOOGLE_CLIENT_SECRET= (YOUR GOOGLE_CLIENT_SECRET)
9. npm run dev/build
10. php artisan serv or if you use HERD is very simple just open browser your_folder.test

## DOCUMENTATION API
[Register]<br />
END POINT : https://full-stack.test/api/register <br />
method : POST <br />
sample with curl:<br />
curl --location 'https://full-stack.test/api/register' \
--header 'Content-Type: application/json' \
--header 'Cookie: XSRF-TOKEN=eyJpdiI6ImliQVRqTlNOM2hDOWtVSEEzTVNBTkE9PSIsInZhbHVlIjoiMWRZSTdWZ3VxNHZIMi9Mems5amFoT3RiR0VGVjgzVWwwWFRXL1AzNWtQZ0xQdUhYbUlNR0hxNVFnMXZ5Y1h0T2o5eTRHTlZRZFdoMVB6QU12Z1BBeGJMTzVuMkgvR0ovcHRwbTZPNmlFQUZFK2tBSGdoU3NlVEk4WjlMMVlCaEkiLCJtYWMiOiI1ZmM1ZmNmYzU1MWNjZDhlN2MxNTMyMjEzMDZlZDdjMGIwYTMyODQwNWQ0ZDlmMDdlN2RlMGIyZmQxZWE4OWQ0IiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6IjJCcDJXQmVpT2JtVmVNTmhBd0lQVHc9PSIsInZhbHVlIjoiTzFqUmdUcjhnMzVLazNEbzQrWTlhcDg4QWUrWTJFMFU0akF0WkNpYzQ4VUVGTzdxVkhuL1dXUnI2endnSEJIUTVsTVl6STJuYUxPNGExSFkzZWtleUp6djhiNVNCU2xZVmNaRmt0MkxtQVA3Q1BwNHY0TUkxU1ZNQWQ4U0srTWsiLCJtYWMiOiI0Mzk0OTFlNWQ4NDdkMDE3M2RkNmEyNjM4MzIxNDQxMTFjN2JmYzk2YTJlN2U0OTM5MGRjZTYyOGMxYjljZDA3IiwidGFnIjoiIn0%3D' \
--data-raw '{
    "name": "Hermawan Prabowo",
    "email": "hermawankoding@gmail.com",
    "phone": "085749458179",
    "address": "Ponorogo",
    "password": "Aa345678"
}'<br />

[Register or LOGIN with facebook or google]<br />
    
END POINT : https://full-stack.test/api/auth/facebook/redirect<br />
method : GET<br />
sample with curl:<br />
curl --location 'https://full-stack.test/api/auth/facebook/redirect'<br />
curl --location 'https://full-stack.test/api/auth/google/redirect'<br />

END POINT CALL BACK : https://full-stack.test/api/auth/facebook/callback<br />
method : GET<br />
sample with curl:<br />
curl --location 'https://full-stack.test/api/auth/facebook/callback'<br />
curl --location 'https://full-stack.test/api/auth/google/callback'<br />

[LOGIN]<br />
END POINT : https://full-stack.test/api/login<br />
method : POST<br />
sample with curl<br />
curl --location 'https://full-stack.test/api/login' \
--header 'Content-Type: application/json' \
--data-raw '{
    "email":"hermawankoding@gmail.com",
    "password":"AaFFds_8"
}'<br />

[LOG OUT]<br />
END POINT : https://full-stack.test/api/logout<br />
method : POST<br />
sample with curl<br />
curl --location 'https://full-stack.test/api/logout' \
--header 'Authorization: Bearer 9|QHLkz2AJsUcbSiORcGv0TQxnFrjNhyaPlt7DGAkRa8fe2ebc' \
--header 'acc: application/json'<br />

[DASHBOARD]<br />
END POINT : https://full-stack.test/api/dashboard<br />
method : GET<br />
sample with curl<br />
curl --location 'https://full-stack.test/api/dashboard' \
--header 'Authorization: Bearer 9|QHLkz2AJsUcbSiORcGv0TQxnFrjNhyaPlt7DGAkRa8fe2ebc' \
--header 'acc: application/json'<br />


