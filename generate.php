<?php
session_start();

// Ambil template yang dipilih
$template = isset($_GET['template']) ? intval($_GET['template']) : 1;

// Ambil data dari form
$nama = $_POST['nama'];
$email = $_POST['email'];
$telepon = $_POST['telepon'];
$alamat = $_POST['alamat'];

// Template-specific data
if ($template == 1) {
    $pendidikan = $_POST['pendidikan'];
    $pengalaman = $_POST['pengalaman'];
} elseif ($template == 2) {
    $keterampilan = $_POST['keterampilan'];
    $hobi = $_POST['hobi'];
} elseif ($template == 3) {
    $profil = $_POST['profil'];
    $proyek = $_POST['proyek'];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV Anda</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: white;
            color: black;
            padding: 20px;
        }
        .cv {
            border: 1px solid #ddd;
            padding: 20px;
            max-width: 800px;
            margin: 0 auto;
            background: #f9f9f9;
        }
    </style>
</head>
<body>
    <div class="cv">
        <h1><?php echo $nama; ?></h1>
        <p><strong>Email:</strong> <?php echo $email; ?></p>
        <p><strong>Telepon:</strong> <?php echo $telepon; ?></p>
        <p><strong>Alamat:</strong> <?php echo $alamat; ?></p>

        <?php if ($template == 1): ?>
            <h3>Riwayat Pendidikan</h3>
            <p><?php echo $pendidikan; ?></p>
            <h3>Pengalaman Kerja</h3>
            <p><?php echo $pengalaman; ?></p>
        <?php elseif ($template == 2): ?>
            <h3>Keterampilan</h3>
            <p><?php echo $keterampilan; ?></p>
            <h3>Hobi</h3>
            <p><?php echo $hobi; ?></p>
        <?php elseif ($template == 3): ?>
            <h3>Profil Singkat</h3>
            <p><?php echo $profil; ?></p>
            <h3>Proyek Terakhir</h3>
            <p><?php echo $proyek; ?></p>
        <?php endif; ?>
    </div>
    <form action="print_pdf.php" method="POST">
        <input type="hidden" name="template" value="<?php echo $template; ?>">
        <button type="submit">Cetak PDF</button>
    </form>
</body>
</html>
