<?php
include '../koneksi.php';

$id_pesanan = $_GET['id_pesanan'];
$sql = "SELECT * FROM pesanan WHERE id_pesanan = $id_pesanan";
$result = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pesanan</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="jquery/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 650px;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
            margin: auto;
            margin-top: 50px;
        }
        .form-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 30px;
            text-align: center;
            background-color: #007bff;
            color: #ffffff;
            padding: 10px;
            border-radius: 5px;
        }
        .form-label {
            font-weight: bold;
            color: #333;
        }
        .form-control {
            font-size: 16px;
            padding: 8px;
            height: auto;
        }
        .col-sm-8 .form-control {
            width: 100%;
        }
        .btn-primary, .btn-danger {
            padding: 10px 20px;
            color: #fff;
            border: none;
            border-radius: 3px;
            font-size: 14px;
        }
        .btn-primary {
            background-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-danger {
            background-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #c82333;
        }
        .btn-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }
        .btn-left {
            display: flex;
            gap: 10px;
        }
        .btn-right {
            margin-left: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="form-title">Edit Pesanan Paket Wisata</h2>
        <form action="edit.php" method="POST">
            <input type="hidden" name="id_pesanan" value="<?php echo $data['id_pesanan']; ?>">
            
            <div class="mb-3 row">
                <label for="nama_pemesan" class="col-sm-4 col-form-label form-label">Nama Pemesan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="nama_pemesan" name="nama_pemesan" value="<?php echo $data['nama_pemesan']; ?>" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="nomor_hp" class="col-sm-4 col-form-label form-label">Nomor HP/Telp</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="nomor_hp" name="nomor_hp" value="<?php echo $data['nomor_hp']; ?>" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="tanggal_mulai_wisata" class="col-sm-4 col-form-label form-label">Tanggal Mulai Wisata</label>
                <div class="col-sm-8">
                    <input type="date" class="form-control" id="tanggal_mulai_wisata" name="tanggal_mulai_wisata" value="<?php echo $data['tanggal_mulai_wisata']; ?>" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="durasi_wisata" class="col-sm-4 col-form-label form-label">Durasi Wisata (Hari)</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" id="durasi_wisata" name="durasi_wisata" value="<?php echo $data['durasi_wisata']; ?>" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="jumlah_peserta" class="col-sm-4 col-form-label form-label">Jumlah Peserta</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" id="jumlah_peserta" name="jumlah_peserta" value="<?php echo $data['jumlah_peserta']; ?>" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-sm-4 col-form-label form-label">Layanan Wisata</label>
                <div class="col-sm-8">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="layanan_penginapan" name="layanan_penginapan" value="1" <?php if($data['layanan_penginapan'] == 'Y') echo 'checked'; ?>>
                        <label class="form-check-label" for="layanan_penginapan">
                            Penginapan (Rp 1.000.000)
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="layanan_transportasi" name="layanan_transportasi" value="1" <?php if($data['layanan_transportasi'] == 'Y') echo 'checked'; ?>>
                        <label class="form-check-label" for="layanan_transportasi">
                            Transportasi (Rp 1.200.000)
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="layanan_makanan" name="layanan_makanan" value="1" <?php if($data['layanan_makanan'] == 'Y') echo 'checked'; ?>>
                        <label class="form-check-label" for="layanan_makanan">
                            Servis/Makan (Rp 500.000)
                        </label>
                    </div>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="harga_paket" class="col-sm-4 col-form-label form-label">Harga Paket Wisata</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="harga_paket" name="harga_paket" value="<?php echo 'Rp ' . number_format($data['harga_paket'], 0, ',', '.'); ?>" readonly>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="jumlah_tagihan" class="col-sm-4 col-form-label form-label">Jumlah Tagihan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="jumlah_tagihan" name="jumlah_tagihan" value="<?php echo 'Rp ' . number_format($data['jumlah_tagihan'], 0, ',', '.'); ?>" readonly>
                </div>
            </div>

            <div class="btn-container">
                <div class="btn-left">
                    <button type="submit" class="btn btn-primary">Edit</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </div>
                <a href="daftar_pesan.php" class="btn btn-primary btn-right">Kembali</a>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get elements
            const durasiWisataInput = document.getElementById('durasi_wisata');
            const jumlahPesertaInput = document.getElementById('jumlah_peserta');
            const layananPenginapanInput = document.getElementById('layanan_penginapan');
            const layananTransportasiInput = document.getElementById('layanan_transportasi');
            const layananMakananInput = document.getElementById('layanan_makanan');
            const hargaPaketInput = document.getElementById('harga_paket');
            const jumlahTagihanInput = document.getElementById('jumlah_tagihan');

            // Prices
            const hargaPenginapan = 1000000;
            const hargaTransportasi = 1200000;
            const hargaMakanan = 500000;

            function formatRupiah(angka) {
                let reverse = angka.toString().split('').reverse().join('');
                let ribuan = reverse.match(/\d{1,3}/g);
                ribuan = ribuan.join('.').split('').reverse().join('');
                return 'Rp ' + ribuan;
            }

            function calculateHargaPaket() {
                let totalLayanan = 0;

                if (layananPenginapanInput.checked) {
                    totalLayanan += hargaPenginapan;
                }
                if (layananTransportasiInput.checked) {
                    totalLayanan += hargaTransportasi;
                }
                if (layananMakananInput.checked) {
                    totalLayanan += hargaMakanan;
                }

                const durasiWisata = parseInt(durasiWisataInput.value) || 0;
                const hargaPaket = durasiWisata * totalLayanan;
                hargaPaketInput.value = formatRupiah(hargaPaket);
                
                calculateJumlahTagihan();
            }

            function calculateJumlahTagihan() {
                const hargaPaket = parseInt(hargaPaketInput.value.replace(/[^0-9]/g, '')) || 0;
                const jumlahPeserta = parseInt(jumlahPesertaInput.value) || 0;
                const jumlahTagihan = hargaPaket * jumlahPeserta;
                jumlahTagihanInput.value = formatRupiah(jumlahTagihan);
            }

            // Event listeners
            durasiWisataInput.addEventListener('input', calculateHargaPaket);
            jumlahPesertaInput.addEventListener('input', calculateJumlahTagihan);
            layananPenginapanInput.addEventListener('change', calculateHargaPaket);
            layananTransportasiInput.addEventListener('change', calculateHargaPaket);
            layananMakananInput.addEventListener('change', calculateHargaPaket);

            // Initial calculation
            calculateHargaPaket();
        });
    </script>
</body>
</html>
