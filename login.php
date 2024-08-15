<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'koneksi.php'; 

    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === 'admin' && $password === 'admin123') {
        $_SESSION['username'] = $username;
        header("Location: wisata/daftar_pesan.php");
        exit();
    } else {
        $error = "Salah! Username = admin dan password = admin123";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('img/bg.png');
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            position: relative; /* Tambahkan position relative untuk overlay */
        }
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.3); /* Gelap lebih terang untuk overlay */
            z-index: 0; /* Agar overlay berada di bawah login container */
        }
        .login-container {
            position: relative;
            background-color: rgba(255, 255, 255, 0.9); /* Sedikit transparan */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2); /* Shadow lebih ringan */
            width: 350px;
            text-align: center;
            z-index: 1; /* Agar berada di atas overlay */
        }
        .login-container h1 {
            margin-bottom: 20px;
            font-weight: bold;
            color: #333; /* Warna teks */
        }
        .input-group {
            margin-bottom: 15px;
            text-align: left;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .btn-custom {
            width: 100%;
            padding: 10px;
            background-color: #007bff; /* Latar belakang biru */
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s, transform 0.3s;
        }
        .btn-custom:hover {
            background-color: #0056b3; /* Biru gelap saat hover */
            transform: scale(1.05); /* Zoom sedikit saat hover */
        }
        .btn-custom:active {
            background-color: #004085; /* Biru lebih gelap saat ditekan */
            transform: scale(0.98); /* Zoom keluar sedikit saat ditekan */
        }
        .alert {
            margin-bottom: 20px;
            color: #dc3545;
        }
    </style>
</head>
<body>
    <div class="overlay"></div>
    <div class="login-container">
        <h1>Login</h1>
        <?php if (isset($error)): ?>
            <div class="alert"><?php echo $error; ?></div>
        <?php endif; ?>
        <form id="loginForm" action="" method="POST">
            <div class="input-group mb-3">
                <input type="text" id="username" name="username" class="form-control" placeholder="Username" required>
            </div>
            <div class="input-group mb-3">
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-custom">Login</button>
        </form>
    </div>

    <!-- jQuery -->
    <script src="jquery/jquery.js"></script>
    <!-- Bootstrap JS -->
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
