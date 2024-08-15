<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pemesanan Paket Wisata</title>
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
        .btn-primary, .btn-danger, .btn-success {
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
        .btn-success {
            background-color: #007bff;
        }
        .btn-success:hover {
            background-color: #218838;
        }
        .btn-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }
        .btn-container .btn-group-left {
            display: flex;
            gap: 10px;
        }
        .btn-container .btn-group-left .btn {
            font-size: 14px; 
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="form-title">Form Pemesanan Paket Wisata</h2>
        <form id="form_pesan" action="input.php" method="POST">
            <!-- Form fields here -->
            <div class="mb-3 row">
                <label for="nama_pemesan" class="col-sm-4 col-form-label form-label">Nama Pemesan:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="nama_pemesan" name="nama_pemesan" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nomor_hp" class="col-sm-4 col-form-label form-label">Nomor HP/Telp:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="nomor_hp" name="nomor_hp" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="tanggal_mulai_wisata" class="col-sm-4 col-form-label form-label">Tanggal Mulai Wisata:</label>
                <div class="col-sm-8">
                    <input type="date" class="form-control" id="tanggal_mulai_wisata" name="tanggal_mulai_wisata" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="durasi_wisata" class="col-sm-4 col-form-label form-label">Durasi Wisata (Hari):</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" id="durasi_wisata" name="durasi_wisata" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jumlah_peserta" class="col-sm-4 col-form-label form-label">Jumlah Peserta:</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" id="jumlah_peserta" name="jumlah_peserta" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-4 form-label">Layanan Wisata:</label>
                <div class="col-sm-8">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="layanan_penginapan" name="layanan_wisata[]" value="1000000">
                        <label class="form-check-label" for="layanan_penginapan">
                            Penginapan (Rp 1.000.000)
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="layanan_transportasi" name="layanan_wisata[]" value="1200000">
                        <label class="form-check-label" for="layanan_transportasi">
                            Transportasi (Rp 1.200.000)
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="layanan_makanan" name="layanan_wisata[]" value="500000">
                        <label class="form-check-label" for="layanan_makanan">
                            Servis/Makan (Rp 500.000)
                        </label>
                    </div>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="harga_paket" class="col-sm-4 col-form-label form-label">Harga Paket Wisata:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="harga_paket" name="harga_paket" readonly>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jumlah_tagihan" class="col-sm-4 col-form-label form-label">Jumlah Tagihan:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="jumlah_tagihan" name="jumlah_tagihan" readonly>
                </div>
            </div>
            <div class="btn-container">
                <div class="btn-group-left">
                    <form id="form_pesan" action="hasil_pesan.php" method="POST">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    </form>
                    <button type="button" class="btn btn-success" id="hitung">Hitung</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </div>
                <a href="../index.php" class="btn btn-success">Kembali</a>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('hitung').addEventListener('click', function() {
            var hargaLayanan = 0;
            var durasi = parseInt(document.getElementById('durasi_wisata').value);
            var peserta = parseInt(document.getElementById('jumlah_peserta').value);

            var layanan_penginapan = document.getElementById('layanan_penginapan').checked;
            var layanan_transportasi = document.getElementById('layanan_transportasi').checked;
            var layanan_makanan = document.getElementById('layanan_makanan').checked;

            if (!layanan_penginapan && !layanan_transportasi && !layanan_makanan) {
                alert("Harap pilih setidaknya satu layanan wisata.");
                return;
            }

            if (layanan_penginapan) hargaLayanan += 1000000;
            if (layanan_transportasi) hargaLayanan += 1200000;
            if (layanan_makanan) hargaLayanan += 500000;

            if (isNaN(durasi) || isNaN(peserta) || durasi <= 0 || peserta <= 0) {
                alert("Durasi wisata dan jumlah peserta harus diisi dengan angka yang valid.");
                return;
            }

            var hargaPaket = hargaLayanan * durasi;
            var totalTagihan = hargaPaket * peserta;

            var hargaPaketFormatted = hargaPaket.toLocaleString('id-ID', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
            var totalTagihanFormatted = totalTagihan.toLocaleString('id-ID', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

            document.getElementById('harga_paket').value = 'Rp ' + hargaPaketFormatted;
            document.getElementById('jumlah_tagihan').value = 'Rp ' + totalTagihanFormatted;
        });

        document.querySelector('button[type="reset"]').addEventListener('click', function() {
            document.getElementById('harga_paket').value = '';
            document.getElementById('jumlah_tagihan').value = '';
        });

        document.getElementById('form_pesan').addEventListener('submit', function(e) {
            var checkboxes = document.querySelectorAll('input[name="layanan_wisata[]"]:checked');
            if (checkboxes.length === 0) {
                alert("Harap pilih setidaknya satu layanan wisata.");
                e.preventDefault();
                return;
            }
        });
    </script>
</body>
</html>