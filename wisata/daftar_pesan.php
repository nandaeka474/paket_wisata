<?php
include '../koneksi.php'; // Including database connection

// Handle status message
$status_message = '';
if (isset($_GET['status'])) {
    if ($_GET['status'] === 'success') {
        $status_message = '<div class="alert alert-success" role="alert">Pesanan berhasil dihapus!</div>';
    } else {
        $status_message = '<div class="alert alert-danger" role="alert">Gagal menghapus pesanan!</div>';
    }
}

// Fetching data from the database
$sql = "SELECT * FROM pesanan";
$result = $koneksi->query($sql);

if (!$result) {
    die("Error retrieving data: " . htmlspecialchars($koneksi->error));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pesanan</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <style>
        /* Custom CSS */
        .header-container {
            width: 100%;
            max-height: 200px; /* Set max-height untuk header image */
            overflow: hidden;
        }
        .header-image {
            width: 100%;
            height: auto;
            object-fit: cover;
            object-position: center;
        }
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(128, 128, 128, 0.3);
            z-index: 1;
            pointer-events: none;
        }
        .title-overlay {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 36px;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
            z-index: 2;
        }
        .btn-custom {
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }
        .btn-custom i {
            margin-right: 5px;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .hello-operator {
            position: fixed;
            top: 10px;
            right: 10px;
            background-color: #007bff; /* Latar belakang biru */
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 18px;
            z-index: 1000; /* Pastikan berada di atas semua elemen lain */
        }
        .action-buttons .btn-custom i {
            margin-right: 0;
        }
        /* CSS untuk tombol Ekspor Excel */
        .btn-export {
            background-color: #007bff; /* Biru */
            color: #fff; /* Teks putih */
            position: absolute;
            top: 0;
            right: 0;
            margin: 10px; /* Jarak dari tepi */
        }
        .btn-export:hover {
            background-color: #0056b3; /* Biru gelap saat hover */
            color: #fff; /* Teks putih saat hover */
        }
        /* CSS untuk container tabel */
        .table-container {
            position: relative; /* Memungkinkan posisi absolute untuk tombol ekspor */
            margin-bottom: 20px;
        }
        /* CSS tambahan untuk tombol ekspor agar tidak menutupi tabel */
        .table-container .btn-export {
            position: absolute;
            top: -50px; /* Atur sesuai kebutuhan untuk jarak atas dari container tabel */
            right: 0;
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="header-container position-relative">
        <img src="../img/header1.png" class="img-fluid header-image" alt="Banner Image">
        <div class="overlay"></div>
        <div class="title-overlay text-center">Open Trip Saba Baduy</div>
    </div>

    <header class="bg-primary text-white">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container">
                <a class="navbar-brand" href="#">Daftar Pesan</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="../login.php">Log out</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Hello Operator Button -->
    <div class="hello-operator">Hello Operator</div>

    <main class="container py-4">
        <h1 class="text-center mb-4">Daftar Pesanan</h1>

        <!-- Status message -->
        <?= $status_message; ?>

        <div class="table-container">
            <!-- Tombol Ekspor -->
            <a href="../export_excel.php" class="btn btn-export">Ekspor Excel</a>

            <!-- Tabel -->
            <table class="table table-hover table-striped table-bordered table-responsive">
                <thead>
                    <tr>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Phone</th>
                        <th class="text-center">Jumlah Peserta</th>
                        <th class="text-center">Jumlah Hari</th>
                        <th class="text-center">Akomodasi</th>
                        <th class="text-center">Transportasi</th>
                        <th class="text-center">Service/Makanan</th>
                        <th class="text-center">Harga Paket</th>
                        <th class="text-center">Total Tagihan</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result->num_rows > 0) : ?>
                        <?php while($row = $result->fetch_assoc()) : ?>
                            <tr>
                                <td class="text-center"><?= htmlspecialchars($row['nama_pemesan']); ?></td>
                                <td class="text-center"><?= htmlspecialchars($row['nomor_hp']); ?></td>
                                <td class="text-center"><?= htmlspecialchars($row['jumlah_peserta']); ?></td>
                                <td class="text-center"><?= htmlspecialchars($row['durasi_wisata']); ?></td>
                                <td class="text-center"><?= htmlspecialchars($row['layanan_penginapan'] == '1' ? 'Y' : 'N'); ?></td>
                                <td class="text-center"><?= htmlspecialchars($row['layanan_transportasi'] == '1' ? 'Y' : 'N'); ?></td>
                                <td class="text-center"><?= htmlspecialchars($row['layanan_makanan'] == '1' ? 'Y' : 'N'); ?></td>
                                <td class="text-center"><?= number_format($row['harga_paket'], 0, ',', '.'); ?></td>
                                <td class="text-center"><?= number_format($row['jumlah_tagihan'], 0, ',', '.'); ?></td>
                                <td class="text-center action-buttons">
                                    <a href="edit_pesan.php?id_pesanan=<?= htmlspecialchars($row['id_pesanan']); ?>" class="btn btn-primary btn-sm btn-custom"><i class="bi bi-pencil"></i>Edit</a>
                                    <button class="btn btn-danger btn-sm btn-custom" onclick="confirmDelete(<?= htmlspecialchars($row['id_pesanan']); ?>)"><i class="bi bi-trash"></i>Delete</button>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="10" class="text-center">No data available</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </main>

    <footer class="bg-primary text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>Tentang Kami</h5>
                    <p>
                    Open Trip Wisata Saba Baduy menyediakan pengalaman unik menjelajahi 
                    kawasan adat Baduy yang kaya akan budaya dan tradisi. Kami menawarkan 
                    perjalanan yang menyeluruh dengan pelayanan terbaik.
                </p>
                </div>
                <div class="col-md-4">
                    <h5>Tautan</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">Daftar Pesan</a></li>
                        <li><a href="../login.php" class="text-white">Log out</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Kontak Kami</h5>
                    <p>Alamat: Jalan Raya Ciboleger, Banten, Indonesia</p>
                    <p>Telepon: +62 123 4567 890</p>
                    <p>Email: info@sababaduy.com</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS and jQuery -->
    <script src="../jquery/jquery.js"></script>
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
        function confirmDelete(id_pesanan) {
            if (confirm("Anda yakin akan hapus?")) {
                window.location.href = "hapus.php?id_pesanan=" + id_pesanan;
            }
        }
    </script>
</body>
</html>
