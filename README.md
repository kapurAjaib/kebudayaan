# Web Kebudayaan - REST API

Ini adalah REST API untuk web kebudayaan yang dikembangkan menggunakan Laravel. API ini menyediakan endpoint untuk melihat budaya, menambah budaya baru, dan autentikasi (signin). Untuk dokumentasi API, dapat diakses melalui [http://localhost:8000/docs/api](http://localhost:8000/docs/api).

## Fitur Utama

- **Signup**: Endpoint untuk registrasi pengguna baru.
- **Signin**: Endpoint untuk autentikasi pengguna.

## Instalasi

Berikut adalah langkah-langkah untuk menginstal proyek ini di mesin lokal Anda:

### Prasyarat

Pastikan Anda telah menginstal:

- [PHP](https://www.php.net/) >= 8.1
- [Composer](https://getcomposer.org/)
- [Laravel](https://laravel.com/) >= 10.x
- [MySQL](https://www.mysql.com/) atau database lain yang kompatibel

### Langkah Instalasi

1. **Clone Repository**
   
   Clone repository ini ke direktori lokal Anda:
   
   ```bash
   git clone https://github.com/username/web-kebudayaan.git

2. **Masuk ke direktori dan Install Dependensi**
   
   Pindah ke direktori proyek dan instal dependensi:
   
   ```bash
   cd web-kebudayaan && composer install

3. **Salin File Konfigurasi**

    Salin file .env.example menjadi .env:
   
   ```bash
   cp .env.example .env

4. **Generate Application Key**

    Generate application key Laravel:
   
   ```bash
   php artisan key:generate

5. **Buka file .env dan konfigurasi detail database Anda:**

    Buka file `.env` dan konfigurasi detail database Anda:
    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=nama_database_anda
    DB_USERNAME=username_anda
    DB_PASSWORD=password_anda

6. **Migrasi database dan seeding**

    Jalankan migrasi untuk membuat tabel di database:

    ```bash
    php artisan migrate:fresh --seed

7. **Jalankan server**
    
    Mulai server dengan perintah:

    ```bash
    php artisan serve

Aplikasi akan berjalan di [http://localhost:8000/docs/api](http://localhost:8000/docs/api).

### Dokumentasi REST API

Untuk dokumentasi REST API bisa mengakses [http://localhost:8000/docs/api](http://localhost:8000/docs/api)
## Authors

- [Muhammad Oby](https://github.com/muhammadoby)
- [Kesava](https://github.com/kesavamas)
- [Pindra](https://github.com/)
