<?php
include 'koneksi.php';

// Ambil semua data pengguna
$query = "SELECT id, password FROM users";
$result = $conn->query($query);

while ($user = $result->fetch_assoc()) {
    $hashed_password = password_hash($user['password'], PASSWORD_DEFAULT);

    // Update password ke dalam database
    $update_query = "UPDATE users SET password = ? WHERE id = ?";
    $stmt = $conn->prepare($update_query);
    $stmt->bind_param("si", $hashed_password, $user['id']);
    $stmt->execute();
}

echo "Semua password berhasil di-hash!";
?>
