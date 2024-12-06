<?php 
session_start();
include 'koneksi.php';

// Periksa apakah pengguna login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Ambil role dari session
$role = $_SESSION['role'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alpha CV - Pilihan Template</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #fff; /* Warna latar putih */
            color: #333; /* Warna teks abu-abu gelap */
        }

        header {
            background: url('images/headerB.jpeg') no-repeat center center / cover; /* Tambahkan gambar latar */
            color: white;
            padding: 40px 20px;
            text-align: center;
        }

        header h1 {
            margin: 0;
            font-size: 36px;
            font-weight: 600;
        }

        header p {
            margin: 10px 0 0;
            font-size: 18px;
            font-weight: 300;
        }

        nav {
            display: flex;
            justify-content: center;
            background-color: #222; /* Warna abu-abu gelap */
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
        }

        .templates {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .template {
            border: 2px solid #ddd;
            border-radius: 10px;
            overflow: hidden;
            text-align: center;
            background-color: #f9f9f9;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 250px;
        }

        .template img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }

        .template h3 {
            margin: 15px 0;
            font-size: 18px;
            color: #333;
        }

        .template button {
            padding: 10px 15px;
            margin-bottom: 15px;
            background-color: #333;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        .template button:hover {
            background-color: #555;
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Alpha CV</h1>
        <p>Pilih Template CV Favorit Anda</p>
    </header>

    <nav>
        <a href="index.php">Beranda</a>
        <a href="template.php">Template</a>
        <a href="info.php">Tentang Kami</a>
        <a href="kontak.php">Kontak</a>
    </nav>

    <div class="container">
        <div class="templates">
            <!-- Template 1 -->
            <div class="template">
                <img src="template-preview1.jpg" alt="Template 1">
                <h3>Original Ordinary</h3>
                <button onclick="window.location.href='<?php echo $role === 'admin' ? 'template1.php' : 'bayar.php?template=Template1'; ?>'">Gunakan Desain Ini</button>
            </div>
            <!-- Template 2 -->
            <div class="template">
                <img src="template-preview2.jpg" alt="Template 2">
                <h3>Purple Profesional</h3>
                <button onclick="window.location.href='<?php echo $role === 'admin' ? 'template2.php' : 'bayar.php?template=Template2'; ?>'">Gunakan Desain Ini</button>
            </div>
            <!-- Template 3 -->
            <div class="template">
                <img src="template-preview3.jpg" alt="Template 3">
                <h3>Elegant Black</h3>
                <button onclick="window.location.href='<?php echo $role === 'admin' ? 'template3.php' : 'bayar.php?template=Template3'; ?>'">Gunakan Desain Ini</button>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Alpha CV - Semua Hak Dilindungi</p>
    </footer>
</body>
</html>
