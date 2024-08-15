Paket Wisata adalah aplikasi web yang dirancang untuk mengelola data pesanan wisata, dengan fitur utama termasuk pembuatan laporan dalam format Excel dan tampilan daftar pesanan.

Daftar Isi
Deskripsi
Fitur
Instalasi
Penggunaan
Kontribusi
Aplikasi ini menggunakan PHP dan MySQL untuk menyimpan dan mengelola data pesanan wisata. Fitur utama termasuk:

Menampilkan daftar pesanan dalam tabel. Menyediakan opsi untuk mengekspor data pesanan ke file Excel. Memungkinkan pengguna untuk mengedit dan menghapus pesanan.

Fitur Tampilan Daftar Pesanan: Menampilkan informasi pesanan dalam tabel yang mudah dibaca. Ekspor ke Excel: Menyediakan tombol untuk mengekspor data pesanan ke file Excel dengan format yang rapi. Fitur Edit dan Hapus: Memungkinkan pengguna untuk mengedit atau menghapus pesanan dari daftar. Notifikasi Status: Menampilkan pesan status setelah melakukan tindakan seperti menghapus pesanan.

Instalasi Clone Repository

bash Copy code git clone <URL_REPOSITORY>

Instalasi XAMPP Pastikan Anda telah menginstal XAMPP. Unduh dan instal XAMPP dari situs resmi XAMPP.

Setup Proyek Salin proyek ke dalam direktori htdocs pada XAMPP:

Copy code cp -r paket_wisata C:\xampp\htdocs
Masuk ke direktori proyek:

Copy code cd C:\xampp\htdocs\paket_wisata Instalasi Composer

Unduh dan instal Composer dari situs resmi Composer.

Instalasi Dependensi Jalankan perintah berikut untuk menginstal dependensi proyek:

Copy code composer install Konfigurasi Database

Edit file koneksi.php untuk menyesuaikan dengan kredensial database Anda. php Copy code

connect_error) { die("Connection failed: " . $koneksi->connect_error); } ?>
Jalankan XAMPP

Buka XAMPP Control Panel dan start Apache dan MySQL.

Penggunaan Akses Aplikasi Buka browser dan akses aplikasi dengan URL:

Copy code http://localhost/paket_wisata Login

Gunakan kredensial default untuk login: Username: admin Password: admin 123 Manajemen Pesanan

Daftar Pesanan: Lihat daftar pesanan dan opsi untuk mengedit atau menghapus pesanan. Ekspor ke Excel: Klik tombol "Ekspor Excel" untuk mendownload data pesanan dalam format Excel.
