<?php
// Handle file upload
$uploadedFoto = 'foto_pengguna.jpg';
if (!empty($_FILES['foto']['name'])) {
    $targetDir = "uploads/";
    $uploadedFoto = $targetDir . basename($_FILES["foto"]["name"]);
    move_uploaded_file($_FILES["foto"]["tmp_name"], $uploadedFoto);
}

// Data default
$data = [
    'nama' => $_POST['nama'] ?? 'Nama Lengkap',
    'jabatan' => $_POST['jabatan'] ?? 'Posisi yang ingin dilamar',
    'profil' => $_POST['profil'] ?? 'Tambahkan profil Anda',
    'pendidikan' => $_POST['pendidikan'] ?? '[Tahun] - [Institusi]',
    'pengalaman' => $_POST['pengalaman'] ?? '[Tahun] - [Perusahaan]',
    'keterampilan' => $_POST['keterampilan'] ?? "Keterampilan 1\nKeterampilan 2\nKeterampilan 3",
    'foto' => $_POST ? $uploadedFoto : 'foto_pengguna.jpg',
    'telepon' => $_POST['telepon'] ?? 'Nomor telepon Anda',
    'email' => $_POST['email'] ?? 'Alamat email Anda',
    'alamat' => $_POST['alamat'] ?? 'Alamat lengkap Anda',
    'tempat_lahir' => $_POST['tempat_lahir'] ?? 'Tempat, Tanggal Lahir',
    'kelamin' => $_POST['kelamin'] ?? 'Jenis Kelamin',
    'kewarganegaraan' => $_POST['kewarganegaraan'] ?? 'Kewarganegaraan Anda',
    'status' => $_POST['status'] ?? 'Status Perkawinan',
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Template CV 3</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #121212;
            color: #000; /* Text in the form is black */
        }
        .back-button {
            position: fixed;
            top: 20px;
            left: 20px;
            font-size: 16px;
            color: #bb86fc;
            text-decoration: none;
            padding: 10px 20px;
            border: 2px solid #bb86fc;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
        }
        .back-button:hover {
            background-color: #bb86fc;
            color: #fff;
        }
        .container {
            width: 70%;
            margin: 20px auto;
            background-color: #fff; /* White paper template */
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        }
        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .header .info {
            display: flex;
            flex-direction: column;
        }
        .header input {
            background: transparent;
            border: none;
            color: #000;
            font-size: 24px;
            font-weight: bold;
        }
        .header img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 50%;
        }
        .section h2 {
            color: #bb86fc;
            font-size: 20px;
            margin-bottom: 10px;
        }
        .editable {
            background: transparent;
            border: none;
            color: #000; /* Black text color */
            width: 100%;
            font-size: 16px;
        }
        textarea.editable {
            width: 100%;
            resize: none;
        }
        textarea, input.editable:focus {
            background-color: #f0f0f0; /* Light gray background on focus */
            outline: none;
        }
        button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        #editButton {
            background-color: #4caf50;
            color: #fff;
        }
        #saveButton {
            background-color: #2196f3;
            color: #fff;
            display: none;
        }
        .pdf-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            padding: 12px 24px;
            background-color: #bb86fc;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
        }
        .pdf-button:hover {
            background-color: #9a63f5;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script>
        function enableEdit() {
            document.querySelectorAll('.editable').forEach(input => input.removeAttribute('readonly'));
            document.getElementById('editButton').style.display = 'none';
            document.getElementById('saveButton').style.display = 'block';
            document.getElementById('photoUpload').style.display = 'block';
        }

        function confirmSave() {
            return confirm("Anda yakin ingin menyimpan perubahan?");
        }

        function exportToPDF() {
            const { jsPDF } = window.jspdf;
            document.querySelectorAll('.back-button, #editButton, #saveButton').forEach(btn => btn.style.display = 'none');
            html2canvas(document.querySelector('.container')).then(canvas => {
                const imgData = canvas.toDataURL('image/png');
                const pdf = new jsPDF('p', 'mm', 'a4');
                const pdfWidth = pdf.internal.pageSize.getWidth();
                const pdfHeight = (canvas.height * pdfWidth) / canvas.width;
                pdf.addImage(imgData, 'PNG', 0, 0, pdfWidth, pdfHeight);
                pdf.save(prompt("Masukkan nama file", "CV-Template3") + '.pdf');
                document.querySelectorAll('.back-button, #editButton, #saveButton').forEach(btn => btn.style.display = 'block');
            });
        }
    </script>
</head>
<body>

    <a href="template.php" class="back-button">&larr; Kembali</a>

    <div class="container">
        <form method="POST" enctype="multipart/form-data" onsubmit="return confirmSave();">
            <div class="header">
                <div class="info">
                    <input type="text" name="nama" class="editable" value="<?= htmlspecialchars($data['nama']) ?>" readonly>
                    <input type="text" name="jabatan" class="editable" value="<?= htmlspecialchars($data['jabatan']) ?>" readonly>
                </div>
                <div>
                    <img src="<?= $data['foto'] ?>" alt="Foto Profil">
                    <input type="file" name="foto" id="photoUpload" style="display: none;" accept="image/*">
                </div>
            </div>

            <div class="section">
                <h2>Data Pribadi</h2>
                <input type="text" name="tempat_lahir" class="editable" value="<?= htmlspecialchars($data['tempat_lahir']) ?>" readonly>
                <input type="text" name="alamat" class="editable" value="<?= htmlspecialchars($data['alamat']) ?>" readonly>
                <input type="text" name="kelamin" class="editable" value="<?= htmlspecialchars($data['kelamin']) ?>" readonly>
                <input type="text" name="kewarganegaraan" class="editable" value="<?= htmlspecialchars($data['kewarganegaraan']) ?>" readonly>
                <input type="text" name="status" class="editable" value="<?= htmlspecialchars($data['status']) ?>" readonly>
            </div>

            <div class="section">
                <h2>Pendidikan</h2>
                <textarea name="pendidikan" class="editable" readonly><?= htmlspecialchars($data['pendidikan']) ?></textarea>
            </div>

            <div class="section">
                <h2>Pengalaman</h2>
                <textarea name="pengalaman" class="editable" readonly><?= htmlspecialchars($data['pengalaman']) ?></textarea>
            </div>

            <div class="section">
                <h2>Keterampilan</h2>
                <textarea name="keterampilan" class="editable" readonly><?= htmlspecialchars($data['keterampilan']) ?></textarea>
            </div>

            <div class="section">
                <h2>Kontak</h2>
                <input type="text" name="telepon" class="editable" value="<?= htmlspecialchars($data['telepon']) ?>" readonly>
                <input type="email" name="email" class="editable" value="<?= htmlspecialchars($data['email']) ?>" readonly>
            </div>

            <div>
                <button type="button" id="editButton" onclick="enableEdit()">Edit</button>
                <button type="submit" id="saveButton">Save</button>
            </div>
        </form>
    </div>

    <button class="pdf-button" onclick="exportToPDF()">Export to PDF</button>

</body>
</html>
