# Final-Project-MBD-QuickServe


### Preresquited
XAMPP (pastikan MySQL dan Apache berjalan)

PHP (versi 8.0 atau lebih tinggi)

### Database Setup
Mulai XAMPP dan buka phpMyAdmin.

Buat database baru dengan nama quickserve.

Import skema database menggunakan file quick_serve.sql.

## Directory Structure
Tempatkan file proyek di directory htdocs dari instalasi XAMPP Anda:

htdocs/

└── quickserve/

    ├── admin/
    │   ├── add_menu.php
    │   ├── add_restaurant.php
    │   ├── dashboard.php
    │   ├── edit_menu.php
    │   ├── view_menus.php
    ├── css/
    │   └── styles.css
    ├── includes/
    │   ├── db.php
    │   ├── functions.php
    │   ├── header.php
    │   └── footer.php
    ├── uploads/  
    ├── user/
    │   ├── login.php
    │   ├── register.php
    │   ├── restaurant_list.php
    │   ├── menu.php
    │   └── order_status.php
    ├── index.php
    └── .htaccess

### Installation
 1. Unduh dan extract file project ke htdocs/quickserve.
 2. Pastikan directory uploads memiliki izin tulis.
 3. Edit includes/db.php dengan detail koneksi database Anda.

### Penggunaan
- Akses aplikasi melalui http://localhost/quickserve/.

- Daftar atau login sebagai user.

- Admin menggunakan admin/admin.php untuk mengakses dashboard.

- Tambah atau edit menu, restoran, dan kelola pesanan melalui dashboard admin.

### Fitur
- Login & Registrasi Pengguna
- Dashboard Admin
- Konfirmasi Pesanan
- Proses Pesanan
- Siap Diambil
- Tambah & Edit Menu dan Restoran
- Manajemen Pesanan
- Desain Responsif

### Notes
Pastikan gambar diupload ke directory uploads.
