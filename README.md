Laravel Bookstore Project for Technical Test Backend Developer at Timedoor By Sabar Martua Tamba

Persyaratan dan Langkah untuk instalasi proyek.

1. Persyaratan (Requirements)

Sebelum mulai, pastikan komputer kamu sudah memiliki:

    PHP ≥ 8.1

    Composer (untuk install dependency PHP)

    Database (MySQL)

    Git (untuk clone project)

2. Clone Project

    git clone https://github.com/sabarmartua/bookstore-app.git

3. Install Dependencies (Jika belum ada)

    composer install

4. Konfigurasi Database
   

    DB_CONNECTION=mysql
   
    DB_HOST=127.0.0.1
   
    DB_PORT=3308
   
    DB_DATABASE=bookstoreapp
   
    DB_USERNAME=root
   
    DB_PASSWORD=
   

6.  Migrasi dan Seed Database

   php artisan migrate
   
   php artisan db:seed

7. Jalankan Server Laravel

   php artisan serve

PROYEK SIAP UNTUK DIGUNAKAN, TERIMAKASIH
