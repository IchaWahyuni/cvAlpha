<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'koneksi.php';

// Pastikan auto-commit diaktifkan (jika menggunakan mode transaksi, bisa diubah)
$conn->autocommit(TRUE);

// Ambil semua data pengguna dari tabel `users`
$query = "SELECT id, password FROM users";
$result = $conn->query($query);

if (!$result) {
    die("Query gagal: " . $conn->error);
}

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $password_plain = $row['password'];

        // Skip jika password sudah di-hash
        if (password_get_info($password_plain)['algo'] !== 0) {
            echo "Password untuk ID $id sudah di-hash, skip.<br>";
            continue;
        }

        // Hash password plaintext
        $password_hashed = password_hash($password_plain, PASSWORD_DEFAULT);

        // Update password di database
        $update_query = "UPDATE users SET password = ? WHERE id = ?";
        $stmt = $conn->prepare($update_query);
        if (!$stmt) {
            die("Prepare statement gagal: " . $conn->error);
        }

        // Bind parameter dan eksekusi
        $stmt->bind_param("si", $password_hashed, $id);
        $stmt->execute();

        // Periksa apakah update berhasil
        if ($stmt->affected_rows > 0) {
            echo "Password berhasil di-hash untuk ID $id!<br>";
        } else {
            echo "Gagal meng-update password untuk ID $id.<br>";
        }

        $stmt->close(); // Tutup statement setiap iterasi
    }
} else {
    echo "Tidak ada data pengguna yang ditemukan.";
}

$conn->close();
