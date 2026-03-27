<p align="center">
  <img src="public/images/HGS LOGO.png" width="200" alt="HGS Sparepart Logo">
</p>

<h1 align="center">HGS Sparepart</h1>

<p align="center">
  Sistem Manajemen Sparepart berbasis Web menggunakan Laravel & Filament
</p>

---

## 📋 Tentang Aplikasi

HGS Sparepart adalah aplikasi manajemen gudang sparepart yang dibangun menggunakan Laravel dan Filament Admin Panel. Aplikasi ini dirancang untuk memudahkan pengelolaan stok sparepart, pencatatan transaksi masuk/keluar, dan pelaporan.

---

## ✨ Fitur

### Dashboard
- Statistik Total Part In, Part Out, Total Part, Transaksi Hari Ini
- Notifikasi stok menipis & habis
- Grafik transaksi per hari (Part In & Part Out)

### Transaksi
- **Part In** — Input penerimaan sparepart, list, search, filter, print PDF
- **Part Out** — Input pengeluaran sparepart, list, search, filter, print PDF

### Sparepart
- **Riwayat Mutasi** — Histori pergerakan stok, filter, print PDF bulanan, export Excel

### Laporan
- **Laporan Stok Part** — Stok terkini semua part, print PDF, export Excel
- **Laporan Per Part** — Histori mutasi per part tertentu, print PDF

### Master Data
- **Data Part** — CRUD data sparepart dengan badge status stok
- **Data User** — Manajemen user (hanya admin utama)
- **Log Aktivitas** — Tracking aktivitas user (hanya admin utama)

---

## 🛠️ Teknologi

- **Framework** — Laravel 11
- **Admin Panel** — Filament v3
- **Database** — MySQL
- **PDF** — barryvdh/laravel-dompdf
- **Excel** — maatwebsite/laravel-excel
- **Server Lokal** — XAMPP

---

## ⚙️ Instalasi

### 1. Clone Repository
```bash
git clone https://github.com/dmsfauzan/hgsSparepart.git
cd hgsSparepart
```

### 2. Install Dependencies
```bash
composer install
npm install
```

### 3. Setup Environment
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Konfigurasi Database
Edit file `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=laravel
DB_PASSWORD=laravel
```

### 5. Jalankan Migration
```bash
php artisan migrate
```

### 6. Buat User Admin
```bash
php artisan make:filament-user
```

### 7. Set User sebagai Admin Utama
```bash
php artisan tinker
>>> \App\Models\User::where('email', 'email_anda@gmail.com')->update(['is_admin' => true]);
```

### 8. Jalankan Aplikasi
```bash
php artisan serve
```

Akses aplikasi di: `http://127.0.0.1:8000/admin`

---

## 🗄️ Struktur Database

| Tabel | Keterangan |
|---|---|
| `users` | Data user login |
| `parts` | Master data sparepart |
| `tr_partin_h` | Header transaksi penerimaan |
| `tr_partin_d` | Detail transaksi penerimaan |
| `tr_partout_h` | Header transaksi pengeluaran |
| `tr_partout_d` | Detail transaksi pengeluaran |
| `tr_part_main_mutasi` | Riwayat mutasi stok |
| `activity_logs` | Log aktivitas user |

---

## 👤 Default Admin

Setelah instalasi, buat user baru via:
```bash
php artisan make:filament-user
```
Lalu set sebagai admin utama via tinker.

---

## 📄 License

Project ini dibuat untuk keperluan internal perusahaan **HGS**.
