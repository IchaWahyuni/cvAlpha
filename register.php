<?php
// Menyertakan file koneksi.php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Menangkap data dari form
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama = $_POST['nama_lengkap']; // Menyesuaikan dengan kolom 'nama' di database
    $email = $_POST['email'];
    $role = 'user'; // Secara default semua pengguna baru akan memiliki role 'user'

    // Enkripsi password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Query untuk menyimpan data ke database
    $sql = "INSERT INTO users (username, password, nama, email, role) 
            VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $username, $hashed_password, $nama, $email, $role);

    if ($stmt->execute()) {
        echo "<div class='success-message'>Registrasi berhasil! Silakan <a href='login.php'>Login</a>.</div>";
    } else {
        echo "<div class='error-message'>Terjadi kesalahan: " . $stmt->error . "</div>";
    }
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - AlphaCV</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #111;
            margin: 0;
            padding: 0;
            color: #fff;
        }
        .container {
            width: 350px;
            margin: 50px auto;
            padding: 30px;
            background-color: #222;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
        h2 {
            font-size: 24px;
            color: #f3a2f0;
            margin-bottom: 30px;
        }
        label {
            font-size: 14px;
            color: #f3a2f0;
            margin-bottom: 10px;
            display: block;
            text-align: left;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border-radius: 10px;
            border: 2px solid #f3a2f0;
            background-color: #333;
            color: #fff;
            font-size: 14px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #f3a2f0;
            color: #222;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #d78bb5;
        }
        .success-message {
            color: #8eff70;
            font-size: 16px;
        }
        .error-message {
            color: #ff6666;
            font-size: 16px;
        }
        .link {
            margin-top: 20px;
            font-size: 14px;
            color: #f3a2f0;
        }
        .link a {
            text-decoration: none;
            color: #f3a2f0;
        }
        .link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Registrasi Pengguna Baru</h2>
        <form action="register.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="nama_lengkap">Nama Lengkap:</label>
            <input type="text" id="nama_lengkap" name="nama_lengkap" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <input type="submit" value="Daftar">
        </form>
        <div class="link">
            <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
        </div>
    </div>
</body>
</html>
