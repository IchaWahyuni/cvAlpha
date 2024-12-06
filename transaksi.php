<?php
// Mulai session untuk cek login admin
session_start();
include 'koneksi.php'; // Sambungkan ke database

// Periksa apakah pengguna login sebagai admin
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: pengguna.php"); // Arahkan ke halaman pengguna jika bukan admin
    exit();
}

// Mengambil data transaksi dari database
$query = "SELECT id_transaksi, template, metode_pembayaran, tanggal_transaksi, jumlah_pembayaran, status_pembayaran 
          FROM transaksi"; // Sesuaikan kolom dengan tabel yang sudah ada
$result = mysqli_query($conn, $query);

// Tangani jika query gagal
if (!$result) {
    die("Gagal mengambil data transaksi: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Transaksi</title>
    <style>
        /* Desain tetap tidak berubah seperti sebelumnya */
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #1a1a1a;
            color: #fff;
        }
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            height: 100%;
            background-color: #2b2b2b;
            padding-top: 20px;
        }
        .sidebar h2 {
            text-align: center;
            font-size: 20px;
            margin-bottom: 20px;
            color: #f3a2f0;
        }
        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }
        .sidebar ul li {
            margin: 10px 0;
            text-align: center;
        }
        .sidebar ul li a {
            display: block;
            background-color: #444;
            color: #f3a2f0;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 8px;
            transition: all 0.3s ease;
            font-weight: bold;
        }
        .sidebar ul li a:hover {
            background-color: #f3a2f0;
            color: #111;
        }
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }
        .header {
            background-color: #333;
            color: #f3a2f0;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logout-btn {
            background-color: #f3a2f0;
            color: #111;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .logout-btn:hover {
            background-color: #444;
            color: #f3a2f0;
        }
        .section {
            margin-top: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #444;
            text-align: center;
        }
        th, td {
            padding: 10px;
        }
        th {
            background-color: #333;
        }
        .status-paid {
            color: green;
        }
        .status-unpaid {
            color: red;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <ul>
            <li><a href="transaksi.php">Transaksi</a></li>
            <li><a href="statistik.php">Statistik Pengguna</a></li>
            <li><a href="index.php">Dashboard</a></li>
        </ul>
    </div>
    
    <div class="main-content">
        <div class="header">
            <h1>Admin Dashboard - Transaksi</h1>
            <a href="logout.php" class="logout-btn">Logout</a>
        </div>
        
        <div class="section">
            <h2>Riwayat Transaksi</h2>
            
            <!-- Tabel Transaksi -->
            <table>
                <thead>
                    <tr>
                        <th>ID Transaksi</th>
                        <th>Template</th>
                        <th>Metode Pembayaran</th>
                        <th>Tanggal Transaksi</th>
                        <th>Jumlah Pembayaran</th>
                        <th>Status Pembayaran</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Loop untuk menampilkan setiap transaksi
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['id_transaksi'] . "</td>";
                        echo "<td>" . $row['template'] . "</td>";
                        echo "<td>" . $row['metode_pembayaran'] . "</td>";
                        echo "<td>" . $row['tanggal_transaksi'] . "</td>";
                        echo "<td>Rp " . number_format($row['jumlah_pembayaran'], 0, ',', '.') . "</td>";
                        if ($row['status_pembayaran'] === 'Lunas') {
                            echo "<td class='status-paid'>Lunas</td>";
                        } else {
                            echo "<td class='status-unpaid'>Belum Lunas</td>";
                        }
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
