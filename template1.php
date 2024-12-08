<?php
$targetDir = "uploads/";
if (!is_dir($targetDir)) {
    mkdir($targetDir, 0777, true);
}

if (isset($_FILES['foto'])) {
    $fotoNama = basename($_FILES['foto']['name']);
    $targetFile = $targetDir . $fotoNama;

    if (move_uploaded_file($_FILES['foto']['tmp_name'], $targetFile)) {
        $fotoURL = $targetFile;
    } else {
        $fotoURL = null;
    }
} else {
    $fotoURL = $_POST['foto_lama'] ?? "default-avatar.png";
}

$data = [
    'nama' => $_POST['nama'] ?? '',
    'profil' => $_POST['profil'] ?? '',
    'email' => $_POST['email'] ?? '',
    'telepon' => $_POST['telepon'] ?? '',
    'alamat' => $_POST['alamat'] ?? '',
    'pendidikan' => $_POST['pendidikan'] ?? '',
    'pengalaman' => $_POST['pengalaman'] ?? '',
    'keahlian' => $_POST['keahlian'] ?? '',
    'bahasa' => $_POST['bahasa'] ?? '',
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Template CV</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

    <script>
        function enableEdit() {
            document.querySelectorAll('.editable').forEach(input => input.removeAttribute('readonly'));
            document.getElementById('editButton').style.display = 'none';
            document.getElementById('saveButton').style.display = 'block';
            document.getElementById('fileInput').style.display = 'block';
        }

        function confirmSave() {
            document.getElementById('fileInput').style.display = 'none';
            return confirm("Anda yakin untuk menyimpan perubahan?");
        }

        function exportToPDF() {
    const { jsPDF } = window.jspdf;
    const element = document.querySelector('.template-cv');
    const editButton = document.getElementById('editButton');
    const saveButton = document.getElementById('saveButton');
    const fileInput = document.getElementById('fileInput');

    // Sembunyikan tombol dan input saat membuat PDF
    editButton.style.display = 'none';
    saveButton.style.display = 'none';
    fileInput.style.display = 'none';

    html2canvas(element, { scale: 2 }).then(canvas => {
        const imgData = canvas.toDataURL('image/png');
        const pdf = new jsPDF('p', 'mm', 'a4');
        const pdfWidth = pdf.internal.pageSize.getWidth();
        const pdfHeight = (canvas.height * pdfWidth) / canvas.width;

        pdf.addImage(imgData, 'PNG', 0, 0, pdfWidth, pdfHeight);
        pdf.save(prompt("Masukkan nama file", "CV-Anda") + '.pdf');

        // Tampilkan kembali tombol setelah PDF dibuat
        editButton.style.display = 'block';
    }).catch(error => {
        console.error('Error saat membuat PDF:', error);
    });
}

    </script>

    <style>
        body {
            font-family: Helvetica, Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #f4f4f9;
        }

        .template-cv {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 50px auto;
            max-width: 800px;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 2px solid #000;
            padding-bottom: 15px;
        }

        .header img {
            border-radius: 50%;
            width: 120px;
            height: 120px;
            object-fit: cover;
        }

        .header .info {
            flex: 1;
            margin-left: 20px;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
            color: #000;
        }

        .section {
            margin-top: 20px;
        }

        .section h3 {
            color: #000;
            border-bottom: 2px solid #000;
            padding-bottom: 5px;
            margin-bottom: 10px;
        }

        .editable {
            border: none;
            background: none;
            font-size: 16px;
            color: #333;
            width: 100%;
            margin-top: 5px;
        }

        .editable:focus {
            outline: none;
            background: #f0f0f0;
        }

        textarea.editable {
            resize: none;
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

        @media print {
            #editButton, #saveButton {
            display: none;
            }
        }


        .print-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            border-radius: 50px;
            font-size: 16px;
            font-weight: bold;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            cursor: pointer;
        }

        .print-button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <a href="template.php" class="back-button" style="position: fixed; top: 20px; left: 20px; background: #007bff; color: white; padding: 10px 15px; border-radius: 50px;">&larr; Kembali</a>

    <div class="template-cv">
        <form method="POST" enctype="multipart/form-data" onsubmit="return confirmSave();">
            <div class="header">
                <img src="<?php echo htmlspecialchars($fotoURL); ?>" alt="Foto Pengguna">
                <input type="hidden" name="foto_lama" value="<?php echo htmlspecialchars($fotoURL); ?>">
                <input type="file" id="fileInput" name="foto" accept="image/*" style="display: none;">
                <div class="info">
                    <input type="text" name="nama" class="editable" placeholder="Nama Anda" value="<?php echo htmlspecialchars($data['nama']); ?>" readonly>
                    <textarea name="profil" class="editable" placeholder="Profil Singkat Anda" readonly><?php echo htmlspecialchars($data['profil']); ?></textarea>
                </div>
            </div>

            <div class="section">
                <h3>Kontak</h3>
                <input type="email" name="email" class="editable" placeholder="email@contoh.com" value="<?php echo htmlspecialchars($data['email']); ?>" readonly>
                <input type="text" name="telepon" class="editable" placeholder="123-456-789" value="<?php echo htmlspecialchars($data['telepon']); ?>" readonly>
                <input type="text" name="alamat" class="editable" placeholder="Alamat Anda" value="<?php echo htmlspecialchars($data['alamat']); ?>" readonly>
            </div>

            <div class="section">
                <h3>Pendidikan</h3>
                <textarea name="pendidikan" class="editable" placeholder="Belum ada pendidikan yang diinput." readonly><?php echo htmlspecialchars($data['pendidikan']); ?></textarea>
            </div>

            <div class="section">
                <h3>Pengalaman Kerja</h3>
                <textarea name="pengalaman" class="editable" placeholder="Belum ada pengalaman kerja yang diinput." readonly><?php echo htmlspecialchars($data['pengalaman']); ?></textarea>
            </div>

            <div class="section">
                <h3>Keahlian</h3>
                <textarea name="keahlian" class="editable" placeholder="Belum ada keahlian yang diinput." readonly><?php echo htmlspecialchars($data['keahlian']); ?></textarea>
            </div>

            <div class="section">
                <h3>Bahasa</h3>
                <textarea name="bahasa" class="editable" placeholder="Belum ada bahasa yang diinput." readonly><?php echo htmlspecialchars($data['bahasa']); ?></textarea>
            </div>

            <button type="button" id="editButton" onclick="enableEdit()">Edit</button>
            <button type="submit" id="saveButton" style="display: none;">Simpan</button>
        </form>
    </div>

    <button class="print-button" onclick="exportToPDF()">Cetak PDF</button>
</body>
</html>