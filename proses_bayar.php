<?php
session_start();
include 'koneksi.php';

// Periksa apakah form di-submit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $template = $_POST['template'];
    $bukti = $_FILES['bukti']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["bukti"]["name"]);

    // Simpan bukti pembayaran
    if (move_uploaded_file($_FILES["bukti"]["tmp_name"], $target_file)) {
        // Simpan transaksi ke database
        $username = $_SESSION['username'];
        $status = 'Menunggu Persetujuan'; // Status transaksi
        $sql = "INSERT INTO transaksi (username, template, bukti, status) VALUES ('$username', '$template', '$bukti', '$status')";
        if (mysqli_query($koneksi, $sql)) {
            $_SESSION['success'] = "Bukti pembayaran berhasil diunggah, menunggu persetujuan admin.";
            header("Location: transaksi.php"); // Arahkan ke halaman transaksi admin
            exit();
        } else {
            $_SESSION['error'] = "Terjadi kesalahan saat menyimpan transaksi.";
            header("Location: bayar.php?template=" . $template);
            exit();
        }
    } else {
        $_SESSION['error'] = "Terjadi kesalahan saat mengunggah file.";
        header("Location: bayar.php?template=" . $template);
        exit();
    }
}
?>
