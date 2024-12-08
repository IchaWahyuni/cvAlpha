<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_unset();
    session_destroy();
    header("Location: pengguna.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: 'Poppins', sans-serif;
            background-color: #1a1a1a;
            color: #f3a2f0;
        }
        .modal {
            background-color: #2b2b2b;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
        }
        button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .confirm {
            background-color: #f3a2f0;
            color: #111;
        }
        .cancel {
            background-color: #333;
            color: #f3a2f0;
        }
    </style>
</head>
<body>
    <div class="modal">
        <h2>Apakah Anda yakin ingin logout?</h2>
        <form method="POST">
            <button type="submit" class="confirm">Logout</button>
            <a href="admin_beranda.php" class="cancel">Batal</a>
        </form>
    </div>
</body>
</html>
