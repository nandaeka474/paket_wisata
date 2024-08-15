<?php
include '../koneksi.php';

// Mendapatkan dan memvalidasi data dari form
$id_pesanan = isset($_POST['id_pesanan']) ? $_POST['id_pesanan'] : '';
$nama_pemesan = isset($_POST['nama_pemesan']) ? $_POST['nama_pemesan'] : '';
$nomor_hp = isset($_POST['nomor_hp']) ? $_POST['nomor_hp'] : '';
$tanggal_mulai_wisata = isset($_POST['tanggal_mulai_wisata']) ? $_POST['tanggal_mulai_wisata'] : '';
$durasi_wisata = isset($_POST['durasi_wisata']) ? (int)$_POST['durasi_wisata'] : 0;
$jumlah_peserta = isset($_POST['jumlah_peserta']) ? (int)$_POST['jumlah_peserta'] : 0;
$harga_paket = isset($_POST['harga_paket']) ? (int)preg_replace('/[^0-9]/', '', $_POST['harga_paket']) : 0;
$jumlah_tagihan = isset($_POST['jumlah_tagihan']) ? (int)preg_replace('/[^0-9]/', '', $_POST['jumlah_tagihan']) : 0;

// Menyimpan nilai 1 atau 0 ke dalam database
$layanan_penginapan = isset($_POST['layanan_penginapan']) ? 1 : 0;
$layanan_transportasi = isset($_POST['layanan_transportasi']) ? 1 : 0;
$layanan_makanan = isset($_POST['layanan_makanan']) ? 1 : 0;

// Validasi input
if (empty($id_pesanan) || empty($nama_pemesan) || empty($nomor_hp) || empty($tanggal_mulai_wisata) || $durasi_wisata <= 0 || $jumlah_peserta <= 0) {
    die("Input tidak valid");
}

$sql = "UPDATE pesanan SET 
        nama_pemesan = '$nama_pemesan', 
        nomor_hp = '$nomor_hp', 
        tanggal_mulai_wisata = '$tanggal_mulai_wisata',
        durasi_wisata = $durasi_wisata,
        jumlah_peserta = $jumlah_peserta,
        harga_paket = $harga_paket,
        jumlah_tagihan = $jumlah_tagihan,
        layanan_penginapan = $layanan_penginapan,
        layanan_transportasi = $layanan_transportasi,
        layanan_makanan = $layanan_makanan
        WHERE id_pesanan = $id_pesanan";

if (mysqli_query($koneksi, $sql)) {
    header("Location: daftar_pesan.php");
} else {
    echo "Error updating record: " . mysqli_error($koneksi);
}

mysqli_close($koneksi);
?>
