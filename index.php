<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saba Baduy</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <style>
        /* Styling for header image */
        .header-container {
            position: relative;
            width: 100%;
            height: auto;
            max-height: 300px; /* Reduced the max-height for the header */
            overflow: hidden;
        }

        .header-image {
            width: 100%;
            height: auto;
            max-height: 300px; /* Reduced the max-height for the header image */
            object-fit: cover;
            display: block;
        }

        /* Lighter transparent overlay */
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

        /* Styling for the title on the image */
        .title-overlay {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 48px;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
            z-index: 2;
        }

        .navbar {
            z-index: 3;
            position: relative;
        }

        /* Hello Nanda Eka text with attractive background */
        .hello-text {
            position: absolute;
            top: 10px;
            right: 10px;
            background: #007bff; /* Solid blue background */
            color: white;
            font-size: 18px;
            font-weight: bold;
            padding: 10px 20px;
            border-radius: 8px; /* Rounded corners */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3); /* Shadow for better visibility */
            z-index: 4;
        }

        /* Ensuring the tour package images are of equal size */
        .card-img-top {
            height: 250px;
            object-fit: cover;
        }
    </style>
</head>

<body>

    <div class="container-fluid p-0 header-container">
        <img src="img/header.png" class="img-fluid header-image" alt="Banner Image">
        <div class="overlay"></div>
        <div class="title-overlay text-center">Selamat Datang di Saba Baduy</div>
        <div class="hello-text">Hello Nanda Eka</div> <!-- Text with background -->
    </div>

    <header class="bg-primary text-white">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container">
                <a class="navbar-brand" href="#">Beranda</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="wisata/form_pesan.php">Form Pemesanan</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container py-4">
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="img/baduy_dalam.png" class="card-img-top img-fluid" alt="Tour Package 1">
                    <div class="card-body">
                        <h5 class="card-title">Saba Baduy Dalam</h5>
                        <p class="card-text">Saba 2 Hari 1 peserta include pelayanan, penginapan dan transportasi.</p>
                        <a href="wisata/form_pesan.php" class="btn btn-primary">Daftar Paket</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="img/baduy_luar.png" class="card-img-top img-fluid" alt="Tour Package 2">
                    <div class="card-body">
                        <h5 class="card-title">Saba Baduy Luar</h5>
                        <p class="card-text">Menjelajahi Baduy Luar sebagai pengalaman yang menyenangkan.</p>
                        <a href="wisata/form_pesan.php" class="btn btn-primary">Daftar Paket</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="ratio ratio-16x9">
                        <iframe src="https://www.youtube.com/embed/CgGSrRgWHEA?si=zFxIdF0P4pcd-Qmj" title="YouTube video" allowfullscreen></iframe>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Open Trip Saba Baduy</h5>
                    </div>
                </div>
            </div>
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
                        <li><a href="#" class="text-white">Beranda</a></li>
                        <li><a href="wisata/form_pesan.php" class="text-white">Form Pemesanan</a></li>
                        <li><a href="login.php" class="text-white">Log in Operator</a></li>
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

    <script src="jquery/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
