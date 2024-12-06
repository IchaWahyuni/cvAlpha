<?php
session_start();
require_once 'koneksi.php'; // Panggil file koneksi
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - Alpha CV</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #f0f0f0; /* Warna abu-abu terang untuk latar belakang */
            color: #333333; /* Warna teks abu-abu gelap */
        }

        header, footer {
            background-image: url('images/headerB.jpeg');
            background-color: #333333; /* Warna abu-abu gelap */
            color: white;
            text-align: center;
            padding: 20px 0;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
        }

        h2 {
            color: #555555; /* Warna abu-abu sedang untuk judul */
        }

        p {
            line-height: 1.8;
            margin-bottom: 20px;
        }

        .btn-kembali {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            color: white;
            background-color: #444444; /* Warna abu-abu gelap untuk tombol */
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            cursor: pointer;
        }

        .btn-kembali:hover {
            background-color: #666666; /* Warna abu-abu sedang untuk hover */
        }
    </style>
</head>
<body>
    <header>
        <h1>Tentang Kami</h1>
    </header>

    <div class="container">
        <h2>Alpha CV</h2>
        <p>
            Alpha CV didirikan pada tahun 2024 dengan tujuan membantu siapa saja membuat CV profesional secara mudah. 
            Dengan fokus pada kemudahan, kecepatan, dan hasil yang menarik, Alpha CV telah digunakan oleh banyak pengguna 
            di seluruh Indonesia.
            AlphaCV merupakan platform yang menawarkan desain pembuatan curriculum vitae (CV) yang menjadi berkas utama dalam melamar pada sebuah perusahaan.
        </p>
        <h2>Keunggulan Kami</h2>
        <p>
            Alpha CV memberikan kemudahan dalam proses pembuatan CV dengan fitur-fitur yang ramah pengguna dan hasil yang sesuai dengan kebutuhan dunia kerja modern.
        </p>

        <!-- Tombol Kembali -->
        <a href="index.php" class="btn-kembali">Kembali ke Beranda</a>
    </div>

    <footer>
        <p>&copy; 2024 Alpha CV - Semua Hak Dilindungi</p>
    </footer>
</body>
</html>
