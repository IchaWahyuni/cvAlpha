<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alpha CV - Platform CV Online</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f9;
            color: #000;
        }

        header {
            background-image: url('images/headerB.jpeg'); /* Menggunakan gambar header yang kamu sebutkan */
            background-size: cover;
            background-position: center;
            color: white;
            padding: 20px;
            text-align: center;
        }

        nav {
            display: flex;
            justify-content: center;
            background-color: #333;
            padding: 10px 0;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            font-size: 18px;
            font-weight: 600;
        }

        nav a:hover {
            text-decoration: underline;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            text-align: center;
        }

        .intro {
            margin: 20px 0;
        }

        .intro h2 {
            color: #000;
            margin-bottom: 15px;
        }

        .intro p {
            font-size: 18px;
            line-height: 1.5;
            color: #000;
        }

        .cta {
            margin: 30px 0;
        }

        .cta a {
            text-decoration: none;
            padding: 15px 25px;
            color: white;
            background-color: #000;
            border-radius: 5px;
            font-size: 18px;
            font-weight: bold;
        }

        .cta a:hover {
            background-color: #333;
        }

        footer {
            background-color: #333333;
            color: white;
            text-align: center;
            padding: 10px 0;
            margin-top: 20px;
        }

        /* Tombol panah */
        .arrow-btn {
            position: absolute;
            top: 20px;
            left: 20px;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            cursor: pointer;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
        }

        .arrow-btn:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <!-- Tombol panah -->
    <button class="arrow-btn" onclick="location.href='pengguna.php'">⬅</button>

    <header>
        <h1>Alpha CV</h1>
        <p>Solusi Mudah Membuat CV Profesional Secara Online</p>
    </header>

    <nav>
        <a href="index.php">Beranda</a>
        <a href="template.php">Template</a>
        <a href="info.php">Tentang Kami</a>
        <a href="kontak.php">Kontak</a>
    </nav>

    <div class="container">
        <div class="intro">
            <h2>Selamat Datang di Alpha CV</h2>
            <p>
                Alpha CV adalah platform yang memudahkan Anda membuat CV profesional hanya dengan beberapa klik. 
                Cocok untuk mahasiswa, pekerja profesional, maupun pencari kerja yang ingin tampil lebih menonjol di dunia kerja.
            </p>
        </div>

        <div class="cta">
            <a href="template.php">Mulai Buat CV Anda</a>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Alpha CV - Semua Hak Dilindungi</p>
    </footer>
</body>
</html>
