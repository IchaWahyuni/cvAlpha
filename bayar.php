<?php
session_start();
include 'koneksi.php';

// Periksa apakah pengguna login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Ambil nama template dari URL
$template = isset($_GET['template']) ? $_GET['template'] : 'template1'; // Default ke 'template1'

// Proses jika formulir konfirmasi pembayaran dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $metode_pembayaran = $_POST['metode_pembayaran'];
    $bukti_pembayaran = $_FILES['bukti']['name'];
    $target_dir = "uploads/";  // Direktori untuk menyimpan file
    $target_file = $target_dir . basename($bukti_pembayaran);

    // Pindahkan file bukti pembayaran ke direktori uploads
    if (move_uploaded_file($_FILES['bukti']['tmp_name'], $target_file)) {
        // Setelah proses upload selesai, langsung arahkan ke halaman template
        $redirect_url = "$template.php"; // Template file PHP sesuai input
        header("Location: $redirect_url");
        exit();
    } else {
        echo "Maaf, ada masalah saat mengunggah bukti pembayaran.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pembayaran</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
        }
        h1 {
            color: #333;
        }
        .template-info {
            margin: 20px 0;
            font-size: 18px;
        }
        .price {
            font-size: 24px;
            font-weight: bold;
            margin: 20px 0;
            color: #ff5722;
        }
        form {
            margin-top: 20px;
        }
        select, input[type="file"] {
            padding: 10px;
            width: 100%;
            margin: 10px 0;
        }
        button {
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s;
        }
        button:hover {
            background-color: #555;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Konfirmasi Pembayaran</h1>
    <div class="template-info">
        <p>Anda akan membeli desain: <strong><?php echo ucfirst($template); ?></strong></p>
    </div>

    <!-- Formulir Konfirmasi Pembayaran -->
    <form action="bayar.php?template=<?php echo $template; ?>" method="POST" enctype="multipart/form-data">
        <label for="metode_pembayaran">Metode Pembayaran:</label>
        <select name="metode_pembayaran" id="metode_pembayaran" required>
            <option value="DANA">DANA</option>
            <option value="OVO">OVO</option>
            <option value="BSI">BSI</option>
        </select>

        <label for="bukti">Unggah Bukti Pembayaran:</label>
        <input type="file" name="bukti" id="bukti" required>

        <button type="submit">Konfirmasi Pembayaran</button>
    </form>
</div>

</body>
</html>
