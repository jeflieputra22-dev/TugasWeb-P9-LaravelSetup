# TugasWeb-P9-LaravelSetup

**Tugas Rutin 9 — Pemrograman Web (3KOM40115)**
Nama: JEFLIE YOFI PUTRA · NIM: 4253250027 · Kelas: PSIK 25D

Project Laravel pertama: setup, koneksi MySQL, 3 route custom (`/`, `/about`, `/contact`) yang me-return Blade view dengan data dinamis, serta penggunaan `make:controller` dan `make:model -m`.

---

## 1. Prasyarat

| Tools | Cek versi | Keterangan |
|---|---|---|
| PHP | `php -v` | minimal 8.2 |
| Composer | `composer -V` | package manager PHP |
| Node.js | `node -v` | untuk Vite/Tailwind (opsional di tugas ini) |
| MySQL | via Laragon/XAMPP | pastikan service MySQL **aktif** |

## 2. Langkah Instalasi

```bash
# 1. Buat project Laravel baru
composer create-project laravel/laravel tugas-p9
cd tugas-p9

# 2. Buat database di phpMyAdmin (http://localhost/phpmyadmin)
#    Nama database: tugas_p9_laravel  (collation utf8mb4_unicode_ci)

# 3. Edit file .env  -> lihat file .env.example.snippet
#    DB_CONNECTION=mysql
#    DB_DATABASE=tugas_p9_laravel
#    DB_USERNAME=root
#    DB_PASSWORD=

# 4. Generate file dengan Artisan (minimal 1x, sesuai ketentuan)
php artisan make:controller PageController
php artisan make:model Course -m

# 5. Isi method up() pada file database/migrations/*_create_courses_table.php
#    (lihat isi file migration di repo ini), lalu jalankan migration
php artisan migrate

# 6. Jalankan server dan screenshot welcome page bawaan Laravel
php artisan serve
# -> buka http://127.0.0.1:8000

# 7. Setelah screenshot, timpa isi file berikut dengan file dari repo ini:
#    routes/web.php, app/Http/Controllers/PageController.php, app/Models/Course.php,
#    resources/views/* (termasuk folder layouts)
#    Server tidak perlu di-restart, cukup refresh browser.
```

> Penting: `php artisan migrate` harus dijalankan **sebelum** membuka halaman apa pun. Laravel 11+ menyimpan session di database, jadi tanpa migration halaman akan error "Table sessions doesn't exist".
>
> Jangan menyalin file migration dari repo ini ke project jika sudah ada hasil `make:model Course -m`. Cukup salin isi method `up()`-nya, agar tidak ada dua migration `courses`.

## 3. Daftar Route

| URL | Nama Route | Handler | View | Data dinamis |
|---|---|---|---|---|
| `/` | `home` | closure | `home.blade.php` | `$nama`, `$courses` (array) |
| `/about` | `about` | closure | `about.blade.php` | `$profil`, `$skills` (array) |
| `/contact` | `contact` | closure | `contact.blade.php` | `$kontak` (array) |
| `/hello/{nama}` _(bonus)_ | `hello` | `PageController@hello` | `hello.blade.php` | `$nama` dari URL |

Cek dengan `php artisan route:list`.

## 4. Struktur Folder (yang disentuh di tugas ini)

```
tugas-p9/
├── app/
│   ├── Models/Course.php                    # M  — model Eloquent (hasil make:model -m)
│   └── Http/Controllers/PageController.php  # C  — controller (hasil make:controller)
├── database/migrations/                     # versi skema database (tabel courses)
├── resources/views/                         # V  — template Blade
│   ├── layouts/app.blade.php                #      layout utama (navbar + footer, Tailwind CDN)
│   └── home / about / contact / hello .blade.php
├── routes/web.php                           # peta URL -> view/controller
├── public/                                  # document root, satu-satunya folder yang diakses browser
├── .env                                     # konfigurasi lokal & rahasia (TIDAK di-commit)
└── composer.json / composer.lock            # dependency PHP
```

**Penjelasan singkat:**
- `app/` = otak aplikasi (Model dan Controller dari MVC).
- `resources/views/` = tampilan (View) memakai Blade; `{{ }}` otomatis di-escape (aman dari XSS).
- `routes/web.php` = mendefinisikan URL yang tersedia dan apa yang dijalankan.
- `database/` = migration (version control skema DB), factories, dan seeders.
- `public/` = document root; semua request masuk lewat `public/index.php` (front controller).
- `.env` = konfigurasi per lingkungan, berisi password DB & `APP_KEY`, sudah masuk `.gitignore`.
- `vendor/` = hasil `composer install`, tidak di-commit.

## 5. Screenshot

| Welcome page bawaan Laravel (`php artisan serve`) | Halaman `/` |
|---|---|
| ![welcome](screenshots/welcome.png) | ![home](screenshots/home.png) |

| `/about` | `/contact` | `/hello/budi` |
|---|---|---|
| ![about](screenshots/about.png) | ![contact](screenshots/contact.png) | ![hello](screenshots/hello.png) |

## 6. Bonus yang Dikerjakan

- [x] Styling dengan Tailwind CDN (`layouts/app.blade.php`)
- [x] Route parameter `/hello/{nama}` dengan constraint regex

## 7. Checklist Requirements

- [x] Install Composer & buat project (`composer create-project`)
- [x] Database dibuat di phpMyAdmin & `.env` memakai `mysql`
- [x] `php artisan serve` berjalan + screenshot welcome page
- [x] 3 route custom (`/`, `/about`, `/contact`) return Blade view
- [x] View menampilkan data dinamis (array dari route)
- [x] `make:controller` dan `make:model -m` dipakai
- [x] README: langkah install + penjelasan struktur folder
- [x] Repo: `TugasWeb-P9-LaravelSetup`
