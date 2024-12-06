<?php 
include 'koneksi.php'; 
session_start();

// Periksa apakah pengguna login sebagai admin
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: pengguna.php"); // Arahkan ke halaman pengguna jika bukan admin
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - AlphaCV</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Library Chart.js -->
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #1a1a1a; /* Abu-abu gelap */
            color: #fff; /* Warna teks */
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
        canvas {
            background-color: #2b2b2b;
            border-radius: 10px;
            margin: 15px auto;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <ul>
            <li><a href="admin_beranda.php">Statistik Pengguna</a></li>
            <li><a href="transaksi.php">Transaksi/Pembayaran</a></li> <!-- Tombol menu Transaksi/Pembayaran -->
            <li><a href="index.php">Beranda</a></li> <!-- Beranda menu -->
        </ul>
    </div>

    <div class="main-content">
        <div class="header">
            <h1>Admin Dashboard</h1>
            <a href="logout.php" class="logout-btn">Logout</a>
        </div>

        <!-- Statistik -->
        <div id="statistik" class="section">
            <h2>Statistik Pengguna</h2>
            <canvas id="userChart" width="400" height="200"></canvas>
        </div>

        <!-- Transaksi -->
        <div id="transaksi" class="section">
            <h2>Transaksi/Pembayaran</h2>
            <p>Fitur untuk melihat riwayat transaksi pengguna.</p>
        </div>
    </div>

    <script>
        // Data untuk grafik statistik
        const ctx = document.getElementById('userChart').getContext('2d');
        const userChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'], // Data contoh
                datasets: [{
                    label: 'Jumlah Login',
                    data: [0, 1, 2, 0, 1], // Ganti dengan data dinamis dari server
                    borderColor: '#f3a2f0',
                    borderWidth: 2,
                    fill: true,
                    backgroundColor: 'rgba(243, 162, 240, 0.1)'
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true
                    }
                }
            }
        });
    </script>
</body>
</html>
