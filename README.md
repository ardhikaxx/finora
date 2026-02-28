# FINORA - Financial & Operational Reporting Application

Sistem Informasi Manajemen Keuangan dan Operasional berbasis web yang dirancang untuk mengelola berbagai aspek keuangan dan SDM dalam sebuah organisasi.

---

## 🚀 Fitur Utama

### 1. Dashboard
- Ringkasan statistik karyawan (total, aktif, departemen)
- Ringkasan keuangan (pendapatan, pengeluaran, piutang, hutang)
- Data payroll terbaru
- Data faktur terbaru

### 2. Pengaturan (Settings)
- **Pengguna** - Manajemen user sistem
- **Peran (Roles)** - Pengaturan role & hak akses
- **Izin (Permissions)** - Pengaturan permissions
- **Departemen** - Manajemen departemen organisasi

### 3. Payroll & HR
- **Karyawan** - Data lengkap karyawan
- **Struktur Gaji** - Konfigurasi struktur salary & komponen
- **Absensi** - Recording kehadiran karyawan
- **Pengajuan Cuti** - Management cuti karyawan
- **Jenis Cuti** - Konfigurasi tipe cuti
- **Payroll** - Proses perhitungan gaji

### 4. Keuangan
- **Bagan Akun** - Chart of Accounts (COA)
- **Jurnal Umum** - General journal entries
- **Anggaran** - Budget management
- **Piutang (AR)**
  - Faktur/invoice management
  - Pelanggan (customers)
- **Hutang (AP)**
  - Tagihan/vendor bills management
  - Vendor management

---

## 🛠️ Teknologi

- **Backend**: Laravel 12
- **Frontend**: Bootstrap 5 + Font Awesome 6
- **Database**: MySQL
- **Authentication**: Laravel Auth
- **Notifications**: SweetAlert2

---

## 📋 Persyaratan Sistem

- PHP >= 8.2
- MySQL >= 5.7
- Composer
- Node.js (optional)

---

## 💾 Instalasi

1. **Clone repository**
```bash
git clone https://github.com/ardhikaxx/finora.git
cd finora
```

2. **Install dependencies**
```bash
composer install
npm install
```

3. **Setup environment**
```bash
cp .env.example .env
php artisan key:generate
```

4. **Configure database** (edit `.env`)
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=finora
DB_USERNAME=root
DB_PASSWORD=
```

5. **Run migrations & seeders**
```bash
php artisan migrate
php artisan db:seed
```

6. **Start server**
```bash
php artisan serve
```

---

## 👥 Peran (Roles)

Sistem FINORA memiliki 4 peran (roles) dengan tingkat akses yang berbeda:

| Peran | Deskripsi |
|-------|-----------|
| **Super Admin** | Akses penuh ke seluruh sistem |
| **Admin** | Akses administratif penuh kecuali konfigurasi super admin |
| **Manager** | Mengelola departemen dan menyetujui laporan |
| **Staff** | Karyawan dengan akses terbatas |

---

## 👤 Akun Default

Setelah instalasi, gunakan akun berikut untuk login:

- **Email**: admin@finora.com
- **Password**: password
- **Role**: Super Admin

---

## 📱 Fitur UI/UX

- Responsive design (mobile, tablet, desktop)
- Modern sidebar dengan dropdown menu
- Tema warna biru (blue theme)
- Format mata uang Rupiah (IDR)
- Bahasa Indonesia

---

## 📄 Lisensi

MIT License

---

## 👨‍💻 Developer

Dikembangkan dengan Laravel 12

---

## 📞 Support

Untuk pertanyaan atau issue, please create issue di GitHub repository.
