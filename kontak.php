<?php
session_start();
require_once 'koneksi.php'; // Panggil file koneksi
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak - Alpha CV</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #f0f0f0; /* Latar belakang abu-abu terang */
            color: #333333; /* Teks abu-abu gelap */
        }

        header, footer {
            background-image: url('images/headerB.jpeg');
            background-color: #333333; /* Header dan footer abu-abu gelap */
            color: white;
            text-align: center;
            padding: 20px 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            text-align: center;
        }

        h2 {
            color: #555555; /* Judul abu-abu sedang */
        }

        p {
            font-size: 18px;
            line-height: 1.8;
        }

        .social-links a {
            text-decoration: none;
            color: white;
            background-color: #444444; /* Tombol abu-abu gelap */
            padding: 10px 15px;
            margin: 5px;
            display: inline-block;
            border-radius: 5px;
        }

        .social-links a:hover {
            background-color: #666666; /* Hover abu-abu sedang */
        }

        .btn-kembali {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            color: white;
            background-color: #444444; /* Tombol abu-abu gelap */
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            cursor: pointer;
        }

        .btn-kembali:hover {
            background-color: #666666; /* Hover abu-abu sedang */
        }
    </style>
</head>
<body>
    <header>
        <h1>Kontak Kami</h1>
    </header>

    <div class="container">
        <h2>Hubungi Kami</h2>
        <p>Silakan hubungi kami melalui media sosial berikut:</p>
        <div class="social-links">
            <a href="https://facebook.com">Facebook</a>
            <a href="https://instagram.com">Instagram</a>
            <a href="https://twitter.com">Twitter</a>
            <a href="https://linkedin.com">LinkedIn</a>
        </div>

        <!-- Tombol Kembali -->
        <a href="index.php" class="btn-kembali">Kembali ke Beranda</a>
    </div>

    <footer>
        <p>&copy; 2024 Alpha CV - Semua Hak Dilindungi</p>
    </footer>
</body>
</html>
