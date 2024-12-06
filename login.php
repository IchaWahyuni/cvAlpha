<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AlphaCV - Selamat Datang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        .header {
            background-color: #333;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .header .logo {
            font-size: 24px;
            font-weight: bold;
            color: white;
            display: flex;
            align-items: center;
        }
        .header .logo img {
            width: 40px;
            height: 40px;
            margin-right: 10px;
        }
        .content {
            max-width: 1200px;
            margin: 50px auto;
            padding: 20px;
            display: flex;
            gap: 20px;
        }
        .content .text-section {
            flex: 2;
        }
        .content .text-section h2 {
            color: #333;
            margin-bottom: 20px;
        }
        .content .text-section p {
            margin: 10px 0;
            line-height: 1.6;
            color: #4a4a4a;
        }
        .content .image-section {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        .content .image-section img {
            width: 100%;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .content .text-section img {
            max-width: 50%;  /* Membatasi lebar gambar menjadi setengah ukuran aslinya */
            height: auto;    /* Menjaga proporsi gambar */
            display: block;
            margin: 0 auto;  /* Menempatkan gambar di tengah */
        }
        .auth-container {
            margin-top: 50px;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .auth-container h3 {
            margin-bottom: 15px;
        }
        .auth-container button {
            padding: 10px 20px;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 10px;
        }
        .auth-container button:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo">
            <img src="images/logo.webp" alt="AlphaCV Logo">
            AlphaCV
        </div>
    </div>

    <div class="content">
        <!-- Bagian Teks -->
        <div class="text-section">
            <h2>AlphaCV ??</h2>
            <p>AlphaCV adalah platform inovatif untuk pembuatan desain CV (Curriculum Vitae) yang modern, profesional, dan sesuai dengan standar pasar kerja saat ini. Kami memahami bahwa CV adalah langkah pertama untuk memperkenalkan diri Anda kepada perekrut, dan dengan AlphaCV, Anda dapat membuat CV yang tidak hanya menarik secara visual tetapi juga mudah dibaca dan dioptimalkan untuk Applicant Tracking Systems (ATS).</p>
            
            <!-- Menambahkan gambar contoh CV di sini -->
            <img src="images/contohCV.png" alt="Contoh Template CV">


            <p>AlphaCV memahami bahwa setiap individu memiliki cerita karier yang unik. Oleh karena itu, platform ini menawarkan fleksibilitas yang tinggi dalam mengatur tata letak dan konten CV. Anda dapat menyesuaikan font, warna, dan elemen visual lainnya sehingga CV Anda tidak hanya menjadi dokumen formal tetapi juga mencerminkan kepribadian Anda. Antarmuka yang sederhana memudahkan siapa saja, bahkan yang baru pertama kali membuat CV, untuk menghasilkan dokumen yang rapi dan profesional hanya dalam beberapa langkah.

Sebagai alat bantu karier, AlphaCV tidak hanya berfokus pada desain, tetapi juga pada substansi. Setiap bagian dalam CV, mulai dari informasi pribadi, pendidikan, hingga pengalaman kerja dan keterampilan, dirancang agar mampu menonjolkan nilai Anda sebagai kandidat. Untuk mendukung ini, AlphaCV menyediakan panduan penulisan yang mudah dipahami sehingga Anda dapat menyusun kalimat yang relevan dan kuat. Dengan fitur ini, Anda tidak akan kesulitan dalam menggambarkan pengalaman atau pencapaian penting yang ingin Anda soroti.</p>
            <!-- Gambar yang diperkecil dan ditempatkan di tengah -->
            <img src="images/header.png" alt="Gambar Orang Bekerja"> 
            
            <p>AlphaCV juga memberikan nilai tambah bagi pelamar pekerjaan dengan fitur tambahan yang mendukung karier di era digital. Anda dapat menyertakan portofolio dalam bentuk tautan langsung atau lampiran, memungkinkan perekrut untuk melihat hasil kerja Anda secara langsung. Selain itu, dengan dukungan untuk berbagai bahasa, AlphaCV membuka peluang bagi Anda yang ingin melamar pekerjaan di luar negeri atau di perusahaan multinasional.

Platform ini juga dirancang untuk menjadi solusi yang praktis. CV Anda dapat disimpan dalam format PDF yang mudah dibagikan, baik melalui email maupun platform lamaran online. Anda juga dapat kembali kapan saja untuk mengedit CV Anda sesuai kebutuhan, tanpa harus memulai dari awal. Ini adalah solusi yang efisien, terutama bagi mereka yang aktif melamar berbagai posisi di perusahaan yang berbeda.</p>

        </div>

        <!-- Bagian Gambar -->
        <div class="image-section">
            <img src="images/example-cv1.webp" alt="Template CV 1">
            <img src="images/example-cv2.webp" alt="Template CV 2">
        </div>
    </div>

    <div class="auth-container">
        <h3>Masuk atau Daftar</h3>
        <!-- Tombol Login yang mengarahkan ke pengguna.php -->
        <button id="signInButton" onclick="window.location.href='pengguna.php';">Login</button>
        <!-- Tombol Register yang mengarahkan ke register.php -->
        <button id="signUpButton" onclick="window.location.href='register.php';">Register</button>
    </div>

    <script>
        document.getElementById('signInButton').addEventListener('click', function() {
            window.location.href = 'pengguna.php';  // Arahkan ke halaman pengguna.php
        });
    </script>
</body>
</html>
