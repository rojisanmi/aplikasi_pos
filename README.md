# Aplikasi Point of Sale (POS)

Aplikasi Point of Sale (POS) adalah sistem manajemen penjualan berbasis web yang dirancang untuk membantu bisnis ritel dalam mengelola produk, stok, transaksi, dan laporan penjualan secara efisien. Aplikasi ini dibangun menggunakan framework CodeIgniter 3 dan mendukung operasi CRUD (Create, Read, Update, Delete) untuk berbagai entitas bisnis.

## 🚀 Fitur Utama

### Manajemen Produk
- **CRUD Produk**: Tambah, lihat, edit, dan hapus produk dengan detail lengkap (barcode, nama, kategori, satuan, harga, stok).
- **Pencarian Barcode**: Pencarian produk berdasarkan barcode untuk transaksi cepat.
- **Manajemen Kategori**: Kelola kategori produk untuk pengorganisasian yang lebih baik.
- **Manajemen Satuan**: Atur satuan produk (pcs, kg, liter, dll.).

### Manajemen Stok
- **Stok Masuk**: Catat pemasukan stok dari supplier.
- **Stok Keluar**: Catat pengeluaran stok untuk keperluan internal.
- **Monitoring Stok**: Pantau level stok produk secara real-time.

### Transaksi Penjualan
- **Proses Transaksi**: Lakukan penjualan dengan pemindaian barcode atau pencarian manual.
- **Diskon**: Terapkan diskon pada transaksi.
- **Pelanggan**: Kelola data pelanggan dan hubungkan dengan transaksi.
- **Cetak Struk**: Generate dan cetak struk penjualan.

### Manajemen Bisnis
- **Supplier**: Kelola data supplier untuk tracking sumber produk.
- **Pelanggan**: Manajemen database pelanggan.
- **Pengguna**: Sistem multi-user dengan role-based access.

### Laporan dan Analitik
- **Laporan Penjualan**: Lihat ringkasan penjualan harian, bulanan, atau berdasarkan periode.
- **Laporan Stok Masuk/Keluar**: Monitor pergerakan stok.
- **Dashboard**: Ringkasan visual data penjualan dan stok.

### Sistem dan Keamanan
- **Autentikasi**: Sistem login/logout untuk keamanan akses.
- **Pengaturan**: Konfigurasi aplikasi sesuai kebutuhan bisnis.
- **Responsive Design**: Interface yang responsif untuk desktop dan mobile.

## 🛠️ Teknologi yang Digunakan

- **Backend**: CodeIgniter 3 (PHP Framework)
- **Database**: MySQL/MariaDB
- **Frontend**: HTML5, CSS3, Bootstrap, JavaScript
- **JavaScript Library**: jQuery, AJAX untuk interaksi dinamis
- **Server**: Apache/Nginx (via XAMPP untuk development)

## 📋 Persyaratan Sistem

- **PHP**: Versi 5.6 atau lebih baru (disarankan 7.0+)
- **Database**: MySQL 5.6+ atau MariaDB 10.0+
- **Web Server**: Apache dengan mod_rewrite enabled
- **Browser**: Chrome, Firefox, Safari, Edge (versi terbaru)

## 🔧 Instalasi dan Setup

### 1. Persiapan Environment
Pastikan XAMPP atau server lokal lainnya sudah terinstall dengan:
- Apache
- MySQL/MariaDB
- PHP

### 2. Clone atau Download Proyek
```bash
# Jika menggunakan Git
git clone https://github.com/username/app-pointofsale.git

# Atau download ZIP dan ekstrak ke folder htdocs
```

### 3. Konfigurasi Database
1. Buat database baru di phpMyAdmin (misalnya: `pos_db`)
2. Import file SQL yang disediakan (jika ada) atau buat tabel sesuai model

### 4. Konfigurasi Aplikasi
Edit file `application/config/database.php`:
```php
$db['default'] = array(
    'dsn'   => '',
    'hostname' => 'localhost',
    'username' => 'root', // Ganti dengan username database Anda
    'password' => '',     // Ganti dengan password database Anda
    'database' => 'pos_db', // Ganti dengan nama database Anda
    'dbdriver' => 'mysqli',
    // ... konfigurasi lainnya
);
```

Edit file `application/config/config.php` untuk base_url:
```php
$config['base_url'] = 'http://localhost/app_pointofsale/';
```

### 5. Install Dependencies (jika menggunakan Composer)
```bash
composer install
```

### 6. Akses Aplikasi
Buka browser dan akses: `http://localhost/app_pointofsale/`

**Default Login** (jika ada):
- Username: admin
- Password: admin

## 📖 Panduan Penggunaan

### Login ke Sistem
1. Akses halaman login
2. Masukkan kredensial pengguna
3. Klik "Login"

### Manajemen Produk
1. Navigasi ke menu "Produk"
2. Klik "Tambah Produk" untuk menambah produk baru
3. Isi detail produk (barcode, nama, kategori, dll.)
4. Klik "Simpan"

### Melakukan Transaksi
1. Pilih menu "Transaksi"
2. Pindai barcode produk atau cari manual
3. Masukkan jumlah dan diskon jika ada
4. Pilih pelanggan (opsional)
5. Klik "Bayar" dan cetak struk

### Melihat Laporan
1. Akses menu "Laporan"
2. Pilih jenis laporan (Penjualan, Stok Masuk, Stok Keluar)
3. Pilih periode tanggal
4. Klik "Generate" untuk melihat laporan

## 🗂️ Struktur Proyek

```
app_pointofsale/
├── application/          # Kode aplikasi utama
│   ├── config/          # File konfigurasi
│   ├── controllers/     # Controller CI
│   ├── models/          # Model database
│   ├── views/           # Template view
│   └── ...
├── assets/              # CSS, JS, gambar
├── system/              # Framework CodeIgniter
├── uploads/             # File upload
├── user_guide/          # Dokumentasi CI
├── composer.json        # Dependencies PHP
└── index.php            # Entry point aplikasi
```

## 🔒 Keamanan

- Sistem menggunakan session-based authentication
- Input validation pada semua form
- SQL injection protection melalui Active Record CI
- XSS protection enabled
- File upload dengan validasi tipe dan ukuran

## 🤝 Kontribusi

Kami menerima kontribusi untuk pengembangan aplikasi ini. Silakan:

1. Fork repository
2. Buat branch fitur baru (`git checkout -b feature/AmazingFeature`)
3. Commit perubahan (`git commit -m 'Add some AmazingFeature'`)
4. Push ke branch (`git push origin feature/AmazingFeature`)
5. Buat Pull Request

## 📄 Lisensi

Proyek ini menggunakan lisensi MIT. Lihat file `license.txt` untuk detail lebih lanjut.

## 📞 Dukungan

Jika Anda mengalami masalah atau memiliki pertanyaan:

- Buat issue di repository GitHub
- Email: support@pointofsale.com
- Forum: [Link forum jika ada]

## 🙏 Ucapan Terima Kasih

Terima kasih kepada komunitas CodeIgniter dan semua kontributor yang telah membantu dalam pengembangan framework ini.

---

**Catatan**: Pastikan untuk backup database secara berkala dan update aplikasi ke versi terbaru untuk fitur dan keamanan terbaru.