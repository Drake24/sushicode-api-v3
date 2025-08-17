# Sushicode Blog Api V3

Laravel API to connect with Wordpress. The main support for Sushicode blog in handling the back-end side of things.


1. Run composer install
2. Run OAuth2 Server (Laravel Passport) using the commands below.

php artisan migrate:fresh
php artisan passport:client --personal (create a personal access client name)
