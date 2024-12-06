<?php
// Data default
$data = [
    'nama' => $_POST['nama'] ?? '',
    'posisi' => $_POST['posisi'] ?? '',
    'profil' => $_POST['profil'] ?? '',
    'pengalaman' => $_POST['pengalaman'] ?? '',
    'pendidikan' => $_POST['pendidikan'] ?? '',
    'pelatihan' => $_POST['pelatihan'] ?? '',
    'keterampilan' => $_POST['keterampilan'] ?? '',
    'telepon' => $_POST['telepon'] ?? '',
    'email' => $_POST['email'] ?? '',
    'alamat' => $_POST['alamat'] ?? '',
];

// Simpan foto jika ada file yang diunggah
$uploadDir = 'uploads/';
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true);
}
if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
    $uploadFile = $uploadDir . basename($_FILES['foto']['name']);
    if (move_uploaded_file($_FILES['foto']['tmp_name'], $uploadFile)) {
        $data['foto'] = $uploadFile;
    }
} else {
    $data['foto'] = $_POST['foto_lama'] ?? 'default-photo.jpg';
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Template CV</title>
    <style>
        body {
            font-family: Helvetica, Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
            color: #333;
        }
        .back-button {
            display: inline-block;
            margin: 20px;
            font-size: 20px;
            color: #4a335a;
            text-decoration: none;
            font-weight: bold;
        }
        .back-button:hover {
            color: #333;
        }
        .container {
            max-width: 800px;
            margin: 30px auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background: #4a335a;
            color: white;
            border-radius: 10px 10px 0 0;
        }
        .header .info {
            display: flex;
            flex-direction: column;
        }
        .header input {
            font-size: 18px;
            font-weight: bold;
            border: none;
            color: white;
            background: transparent;
        }
        .header input:focus {
            outline: none;
        }
        .header img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 50%;
        }
        .section {
            margin-top: 20px;
        }
        .section h3 {
            color: #4a335a;
            margin-bottom: 10px;
            font-size: 20px;
            border-bottom: 2px solid #ddd;
            display: inline-block;
            padding-bottom: 5px;
        }
        .editable {
            border: none;
            width: 100%;
            font-size: 16px;
            background: #f8f8f8;
        }
        .editable:focus {
            outline: none;
            background: #f0f0f0;
        }
        textarea.editable {
            resize: none;
        }
        .footer {
            margin-top: 20px;
            padding: 15px;
            background: #f4f4f4;
            text-align: center;
            border-radius: 0 0 10px 10px;
        }
        button {
            margin-top: 20px;
            padding: 10px 15px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        #editButton {
            background: #007bff;
            color: #fff;
        }
        #editButton:hover {
            background: #0056b3;
        }
        #saveButton {
            background: #28a745;
            color: #fff;
            display: none;
        }
        #saveButton:hover {
            background: #218838;
        }

        /* Tombol PDF di pojok kanan bawah */
        .pdf-button-container {
            position: fixed;
            bottom: 20px;
            right: 20px;
        }

        .pdf-button-container button {
            background-color: #28a745; /* Hijau */
            color: white;
            padding: 12px 20px;
            border-radius: 8px;
            border: none;
            font-size: 16px;
            cursor: pointer;
        }

        .pdf-button-container button:hover {
            background-color: #218838;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script>
        function enableEdit() {
            document.querySelectorAll('.editable').forEach(input => input.removeAttribute('readonly'));
            document.getElementById('editButton').style.display = 'none';
            document.getElementById('saveButton').style.display = 'block';
            document.getElementById('photoUpload').style.display = 'block'; // Munculkan unggah foto
        }

        function confirmSave() {
            return confirm("Anda yakin ingin menyimpan perubahan?");
        }

        function exportToPDF() {
            const { jsPDF } = window.jspdf;
            document.querySelectorAll('.back-button, #editButton, #saveButton').forEach(btn => btn.style.display = 'none');
            const element = document.querySelector('.container');
            html2canvas(element, { scale: 2 }).then(canvas => {
                const imgData = canvas.toDataURL('image/png');
                const pdf = new jsPDF('p', 'mm', 'a4');
                const pdfWidth = pdf.internal.pageSize.getWidth();
                const pdfHeight = (canvas.height * pdfWidth) / canvas.width;
                pdf.addImage(imgData, 'PNG', 0, 0, pdfWidth, pdfHeight);
                pdf.save(prompt("Masukkan nama file", "CV-Anda") + '.pdf');
                document.querySelectorAll('.back-button, #editButton, #saveButton').forEach(btn => btn.style.display = 'block');
            });
        }
    </script>
</head>
<body>
    <!-- Tombol Panah Kembali -->
    <a href="template.php" class="back-button">&larr; Kembali</a>

    <div class="container">
        <form method="POST" enctype="multipart/form-data" onsubmit="return confirmSave();">
            <div class="header">
                <div class="info">
                    <input type="text" name="nama" class="editable" placeholder="Nama Anda" value="<?php echo htmlspecialchars($data['nama']); ?>" readonly>
                    <input type="text" name="posisi" class="editable" placeholder="Posisi yang Dilamar" value="<?php echo htmlspecialchars($data['posisi']); ?>" readonly>
                </div>
                <div>
                    <img src="<?php echo htmlspecialchars($data['foto']); ?>" alt="Foto Profil">
                    <input type="hidden" name="foto_lama" value="<?php echo htmlspecialchars($data['foto']); ?>">
                    <input type="file" name="foto" id="photoUpload" accept="image/*" style="display: none;">
                </div>
            </div>

            <div class="section">
                <h3>Profil</h3>
                <textarea name="profil" class="editable" placeholder="Tambahkan profil Anda" readonly><?php echo htmlspecialchars($data['profil']); ?></textarea>
            </div>

            <div class="section">
                <h3>Pengalaman Kerja</h3>
                <textarea name="pengalaman" class="editable" placeholder="Tambahkan pengalaman kerja" readonly><?php echo htmlspecialchars($data['pengalaman']); ?></textarea>
            </div>

            <div class="section">
                <h3>Pendidikan</h3>
                <textarea name="pendidikan" class="editable" placeholder="Tambahkan riwayat pendidikan" readonly><?php echo htmlspecialchars($data['pendidikan']); ?></textarea>
            </div>

            <div class="section">
                <h3>Pelatihan</h3>
                <textarea name="pelatihan" class="editable" placeholder="Tambahkan pelatihan yang diikuti" readonly><?php echo htmlspecialchars($data['pelatihan']); ?></textarea>
            </div>

            <div class="section">
                <h3>Keterampilan</h3>
                <textarea name="keterampilan" class="editable" placeholder="Tambahkan keterampilan Anda" readonly><?php echo htmlspecialchars($data['keterampilan']); ?></textarea>
            </div>

            <div class="footer">
                <input type="text" name="telepon" class="editable" placeholder="Tambahkan nomor telepon" value="<?php echo htmlspecialchars($data['telepon']); ?>" readonly>
                <input type="email" name="email" class="editable" placeholder="Tambahkan email" value="<?php echo htmlspecialchars($data['email']); ?>" readonly>
                <input type="text" name="alamat" class="editable" placeholder="Tambahkan alamat" value="<?php echo htmlspecialchars($data['alamat']); ?>" readonly>
            </div>

            <button type="button" id="editButton" onclick="enableEdit()">Edit</button>
            <button type="submit" id="saveButton">Simpan</button>
        </form>
    </div>

    <!-- Tombol Cetak PDF di pojok kanan bawah -->
    <div class="pdf-button-container">
        <button type="button" onclick="exportToPDF()">Cetak ke PDF</button>
    </div>
</body>
</html>
