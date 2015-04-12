## Simulasi UN CBT 2015

Aplikasi ini hanyalah simulasi untuk Ujian Nasional tingkat SMA/SMK yang mulai tahun 2015 ini menggunakan Sistem Computer Based Test. Aplikasi ini telah diuji coba pada bulan Maret lalu di Makassar, dengan diikuti oleh seratusan siswa dari berbagai sekolah yang penasaran untuk melakukan uji coba. Kegiatan tersebut difasilitasi oleh Bimbingan Belajar terbesar di Makassar.

Walaupun sukses sebagai aplikasi simulasi UN CBT, tapi aplikasi ini sangat tidak recommended untuk diterapkan karena:
 1. Masih menggunakan file image untuk menampilkan soal dan ini sangat boros dalam hal sumber daya
 2. Masih terlalu banyak kekurangan untuk diperbaiki

Meski begitu, pada akhirnya saya tetap memutuskan mempublish source code aplikasi ini ke publik, karena beberapa alasan berikut:
 1. Menjadi saran pembelajaran bagi programmer pemula
 2. Salah satu referensi untuk mendevelop simulasi UN CBT ini
 3. Siapatau dengan mempublish ke publik banyak developer-developer lain yang lebih berkualitas mau berkontribusi dan terinspirasi membuat sistem yang jauh lebih baik. Dan tentunya kita bisa menghasilkan UN CBT yang lebih berkualitas di tahun-tahun yang akan datang.

## Struktur Repository

Repository ini terdiri atas module, yaitu:
 1.  Modul Panitia, digunakan oleh panitia untuk mengelola:
   - Paket Soal
   - Login untuk calon Peserta Ujian
   - Monitoring Hasil Ujian
 2.  Modul Ujian, digunakan oleh siswa/peserta ujian untuk:
   - Login dan mengerjakan soal
   - Mengakses paket soal yang diinginkan
   - Mengerjakan Soal Secara Online
   - Melihat hasil dan history hasil ujian
3.  File database.sql
4.  File README.md

## Instalasi
### Instalasi Modul Panitia
Buat laravel project untuk Panitia:
```
composer create-project laravel/laravel panitia 4.2 --prefer-dist
```
Replace folder controllers, models, views dan file routes.php pada folder app dengan folder serupa dari folder Panitia.
Salin folder asset dari folder Panitia ke folder public pada project laravel panitia.

### Instalasi Modul Ujian
Buat laravel project untuk Ujian:
```
composer create-project laravel/laravel ujian 4.2 --prefer-dist
```
Replace folder controllers, models, views dan file routes.php pada folder app dengan folder serupa dari folder Ujian.


### Instalasi Database
Buat database pada server mysql dengan nama sesuai yang anda inginkan. Lalu import file database.sql yang telah tersedia. Input satu user ke table users agar anda dapat melakukan autentikasi sebagai panitia di halaman panitia.


### Konfigurasi
Masing-masing pada project panitia dan ujian, lakukan konfigurasi database sesuai dengan mysql server anda.
jangan lupa lakukan konfigurasi virtual host (untuk pengguna apache) atau yang semisal sesuai dengan web server anda


## How To
1. Untuk bisa menggunakan aplikasi ini, dan ini bagian tersulit dan menyusahkan, anda harus mengkonversi
   soal dalam bentuk gambar, saya sertakan contohnya pada folder contoh.

2. Setelah menginput soal dan akan melakukan uji coba, salin folder listenings, questions, literatures dari folder asset project pantia ke folder asset  project ujian.
