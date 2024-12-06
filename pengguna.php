<?php
// Memasukkan koneksi ke database
include 'koneksi.php';
session_start();

// Cek apakah form login telah disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk memeriksa apakah username ada di database
    $query = "SELECT * FROM users WHERE username = ? LIMIT 1";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            // Redirect berdasarkan role
            if ($user['role'] === 'admin') {
                header("Location: admin_beranda.php");
            } else {
                header("Location: index.php");
            }
            exit();
        } else {
            $error = "Password salah!";
        }
    } else {
        $error = "Username tidak ditemukan!";
    }
}
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - AlphaCV</title>
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
        <h2>Login Pengguna</h2>

        <?php if (isset($error)) { ?>
            <div class="error-message"><?php echo $error; ?></div>
        <?php } ?>

        <form action="pengguna.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" value="Login">
        </form>

        <div class="link">
            <p>Belum punya akun? <a href="register.php">Daftar sekarang</a></p>
        </div>
    </div>
</body>
</html>
