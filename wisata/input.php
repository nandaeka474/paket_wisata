<?php
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_pemesan = $_POST['nama_pemesan'];
    $nomor_hp = $_POST['nomor_hp'];
    $tanggal_mulai_wisata = $_POST['tanggal_mulai_wisata'];
    $durasi_wisata = $_POST['durasi_wisata'];
    $jumlah_peserta = $_POST['jumlah_peserta'];
    $layanan_wisata = isset($_POST['layanan_wisata']) ? $_POST['layanan_wisata'] : [];
    
    $layanan_penginapan = in_array('1000000', $layanan_wisata) ? 'Y' : 'N';
    $layanan_transportasi = in_array('1200000', $layanan_wisata) ? 'Y' : 'N';
    $layanan_makanan = in_array('500000', $layanan_wisata) ? 'Y' : 'N';

    $harga_paket = 0;
    foreach ($layanan_wisata as $layanan) {
        $harga_paket += intval($layanan);
    }
    $harga_paket *= intval($durasi_wisata);
    $jumlah_tagihan = $harga_paket * intval($jumlah_peserta);

    $sql = "INSERT INTO pesanan (nama_pemesan, nomor_hp, tanggal_mulai_wisata, durasi_wisata, jumlah_peserta, layanan_penginapan, layanan_transportasi, layanan_makanan, harga_paket, jumlah_tagihan)
            VALUES ('$nama_pemesan', '$nomor_hp', '$tanggal_mulai_wisata', $durasi_wisata, $jumlah_peserta, '$layanan_penginapan', '$layanan_transportasi', '$layanan_makanan', $harga_paket, $jumlah_tagihan)";

    if (mysqli_query($koneksi, $sql)) {
        header("Location: hasil_pesan.php");
    } else {
        echo "Error updating record: " . mysqli_error($koneksi);
    }

    $koneksi->close();
}
?>