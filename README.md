# API Test PT. EDII

## Overview

Project ini dibuat untuk memenuhi syarat recruitment di PT. EDII sebagai PHP Developer.

## Installation & updates

Jalankan perintah `composer update` untuk menunduh dependensi.

## Setup

- Jalankan `cp env .env` untuk menyalin `env` dan menamainya menjadi `.env`, lalu ubah `.env` dengan menyesuaikan pengaturan pada database anda.
- Jalankan `php spark migrate` untuk membuat tabel yang tersedia pada migrasi basis data.
- Jalankan `php spark serve` untuk menjalankan program.

## Routes

- `/api-test-edii/api/login` untuk login dan mendapatkan token otorisasi.
- `/api-test-edii/api/register` untuk membuat akun agar dapat melakukan login.
- `/api-test-edii/api/data` untuk menampilkan data.
- `/api-test-edii/api/entry` untuk menambahkan data.
- `/api-test-edii/api/update` untuk menyunting data.
- `/api-test-edii/api/delete` untuk menghapus data.

## Server Requirements

PHP versi 8.1 atau lebih anyar direkomendasikan, dengan ekstensi berikut ini telah terpasang:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

Sebagai tambahan, pastikan ekstensi berikut ini diaktifkan di PHP pada perangkat anda:

- json (diaktifkan secara default)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) jika ingin menggunakan MySQL
- [libcurl](http://php.net/manual/en/curl.requirements.php) jika ingin menggunakan perpustakaan HTTP\CURLRequest
