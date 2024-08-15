<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Simpan</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .popup-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        /* Popup content */
        .popup-content {
            background-color: rgba(255, 255, 255, 0.9); /* Semi-transparent white */
            color: black; 
            padding: 30px;
            border-radius: 15px;
            text-align: center;
            position: relative;
            max-width: 600px;
            width: 90%;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
        }

        .popup-title {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 20px;
            background-color: #007bff; 
            color: white;
            padding: 15px;
            border-radius: 10px;
        }

        .success-icon {
            font-size: 60px;
            color: #28a745;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .popup-btn {
            margin-top: 20px;
        }

        .btn-custom {
            background-color: #007bff;
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            text-transform: uppercase;
            margin: 10px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #0056b3;
            color: white;
            transform: scale(1.05);
        }
    </style>
</head>
<body>

<div class="popup-container">
    <div class="popup-content">

        <h2 class="popup-title">Data Berhasil Disimpan</h2>
        <p>Terima kasih telah melakukan pemesanan.</p>
        <p>Data Anda telah berhasil disimpan.</p>

        <i class="fas fa-check-circle success-icon"></i>
        <div class="popup-btn">
            <a href="../index.php" class="btn-custom">Selanjutnya</a>
            <a href="form_pesan.php" class="btn-custom">Kembali</a>
        </div>
    </div>
</div>

</body>
</html>
