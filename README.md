## Fitur apa saja yang tersedia di Sistem Informasi Akademik Kampus?

- Multi User
- CRUD : Dosen, Mahasiswa, Fakultas, Gedung, Kelas, Matkul, Prodi, Ruangan, Jadwal, dan Tahun Akademik
- otomatis pengisian data user berdasarkan data mahasiswa dan dosen
- Pengelompokan kelas mahasiswa
- KRS mahasiswa
- Jadwal Dosen
- Nilai
- KHS Mahasiswa

## Release Date

19 Mar 2021

## Default Account for testing

Admin Default Account
username:erwin@gmail.com
password:11111111

Mahasiswa Default Account
username:16220320
password:11111111

Dosen Default Account
username:1102110
password:11111111

## How to Install

1. **Clone Repository**

```bash
git clone https://github.com/erwin-perdana/sistem-informasi-akademik-kampus-laravel.git
go to folder
composer install
npm install
cp .env.example .env
```

2. **Buka `.env` lalu ubah baris berikut sesuai dengan databasemu yang ingin dipakai**

```bash
DB_PORT=3306
DB_DATABASE=siakd
DB_USERNAME=root
DB_PASSWORD=
```

3. **Instalasi website**

```bash
php artisan key:generate
php artisan migrate --seed
```

4. **Jalankan website**

```bash
php artisan serve
```

## Author

- E-mail : winp2807@gmail.com
- LinkedIn : <a href="https://www.linkedin.com/in/erwin-perdana28"> Erwin Perdana</a>
