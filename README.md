🕌 Sistem Informasi Manajemen ZIS (Zakat, Infaq, Sedekah)

Sistem Informasi Manajemen ZIS adalah aplikasi berbasis web yang dikembangkan menggunakan Framework Laravel. Aplikasi ini dirancang untuk mendigitalisasi proses pengelolaan dana Zakat, Infaq, dan Sedekah pada lembaga amil zakat atau masjid, memastikan pencatatan yang transparan, akuntabel, dan efisien.

✨ Fitur Utama

Role-Based Access Control (RBAC): Pemisahan hak akses yang tegas antara Admin (Akses Penuh) dan Amil (Staf Operasional).

Dashboard Interaktif: Menampilkan statistik real-time mengenai total pemasukan, penyaluran, dan saldo kas akhir.

Manajemen Data Master: Pengelolaan data Muzakki (Donatur) dan Mustahiq (Penerima Manfaat).

Pencatatan Transaksi: Pencatatan arus kas masuk (Zakat Fitrah, Zakat Mal, Infaq, Sedekah) dan arus kas keluar (Penyaluran dana).

Generate Laporan: Pembuatan laporan keuangan periodik yang rapi dan Printer-Friendly (siap cetak).

📸 Screenshots

Note: Tambahkan screenshot aplikasi Anda di sini dengan mengganti URL gambar.

Halaman Login

Halaman Dashboard





Transaksi Masuk

Laporan Keuangan





🚀 Panduan Instalasi (Local Development)

Ikuti langkah-langkah di bawah ini untuk menjalankan proyek ini di komputer lokal Anda.

Persyaratan Sistem

Pastikan Anda telah menginstal perangkat lunak berikut:

PHP >= 8.0

Composer

MySQL (melalui XAMPP/Laragon/dll)

Git

Langkah-langkah Instalasi

Clone Repositori

git clone [https://github.com/USERNAME_ANDA/sistem-zis-laravel.git](https://github.com/USERNAME_ANDA/sistem-zis-laravel.git)
cd sistem-zis-laravel


Instalasi Dependencies (Library)

composer install


Pengaturan Environment
Salin file .env.example menjadi .env.

cp .env.example .env


Buka file .env dan sesuaikan konfigurasi database Anda:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database_anda
DB_USERNAME=root
DB_PASSWORD=


Generate Application Key

php artisan key:generate


Migrasi Database & Seeder (Data Awal)
(Pastikan Anda sudah membuat database kosong di MySQL sesuai nama di file .env)

php artisan migrate --seed


Jalankan Aplikasi

php artisan serve


Aplikasi dapat diakses melalui browser pada alamat: http://localhost:8000

🔐 Akun Default (Testing)

Gunakan kredensial berikut untuk masuk ke dalam sistem. (Data ini di-generate melalui Database Seeder).

1. Akun Admin

Email: admin@example.com (Sesuaikan dengan email di seeder Anda)

Password: password

2. Akun Amil

Email: amil@example.com (Sesuaikan dengan email di seeder Anda)

Password: password

👨‍💻 Penulis / Pengembang

[Nama Anda] - Fullstack Developer - Profil GitHub Anda

📄 Lisensi

Proyek ini bersifat Open-Source dan dilisensikan di bawah MIT License.
