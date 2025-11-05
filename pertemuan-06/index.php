<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Judul Halaman</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1>Ini Header</h1>
        <button class="menu-toggle" id="menuToggle" aria-table="Toggle Navigation">
            &#9776;
        </button>
        <nav>
            <ul>
                <li><a href="#home">Beranda</a></li>
                <li><a href="#about">Tentang</a></li>
                <li><a href="#ipk">IPK</a></li>
                <li><a href="#contact">Kontak</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section id="home">
            <h2>Selamat Datang</h2>
            <p>Ini contoh Paragraf HTML</p>
            <?php
echo "Halo Dunia!";
echo "<br>Nama saya Reynanda Oktarian";
?>
        </section>
        <section id="about">
            <?php
            $NIM = "2511500054";
            $nim = "1212233132";
            $Nim = "";
            $nama = "Reynanda Oktarian &#128512";
            $tempatLahir = "Tanjung Pandan";
            $tanggalLahir = "29 Oktober 2007";
            $hobi = "Menonton Anime, Mendengarkan musik, bermain game";
            $pasangan = "Belum ada";
            $pekerjaan = "Mahasiswa di ISB Atma Luhur 2025";
            $namaorangtua = "Bapak Mardedi dan Ibu Herlina";
            $namaabang = "Derry Andeka";
            ?>
            <h2>Tentang Saya</h2>
            <p><strong>NIM:</strong><?php echo $NIM; ?></p>
            <p><strong>Nama Lengkap:</strong><?php echo $nama; ?></p>
            <p><strong>Tempat Lahir:</strong><?php echo $tempatLahir; ?></p>
            <p><strong>Tanggal Lahir:</strong><?php echo $tanggalLahir; ?></p>
            <p><strong>Hobi:</strong><?php echo $hobi; ?></p>
            <p><strong>Pasangan:</strong><?php echo $pasangan; ?></p>
            <p><strong>Pekerjaan:</strong><?php echo $pekerjaan; ?></p>
            <p><strong>Nama Orang Tua:</strong><?php echo $namaorangtua; ?></p>
            <p><strong>Nama Abang:</strong><?php echo $namaabang; ?></p>
        </section>
<section id="ipk">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Nilai Saya</h2>
                <hr class="primary">
            </div>
        </div>
    </div>
    <div class="container">
        <?php
        function hitungGrade($nilaiAkhir, $nilaiHadir) {
            if ($nilaiHadir < 70) { $grade = 'E'; } 
            elseif ($nilaiAkhir >= 85) { $grade = 'A'; } 
            elseif ($nilaiAkhir >= 80) { $grade = 'A-'; } 
            elseif ($nilaiAkhir >= 75) { $grade = 'B+'; } 
            elseif ($nilaiAkhir >= 70) { $grade = 'B'; } 
            elseif ($nilaiAkhir >= 65) { $grade = 'B-'; } 
            elseif ($nilaiAkhir >= 60) { $grade = 'C+'; } 
            elseif ($nilaiAkhir >= 55) { $grade = 'C'; } 
            elseif ($nilaiAkhir >= 50) { $grade = 'C-'; } 
            elseif ($nilaiAkhir >= 40) { $grade = 'D'; } 
            else { $grade = 'E'; }

            switch ($grade) {
                case 'A': $mutu = 4.00; $status = 'Lulus'; break;
                case 'A-': $mutu = 3.70; $status = 'Lulus'; break;
                case 'B+': $mutu = 3.30; $status = 'Lulus'; break;
                case 'B': $mutu = 3.00; $status = 'Lulus'; break;
                case 'B-': $mutu = 2.70; $status = 'Lulus'; break;
                case 'C+': $mutu = 2.30; $status = 'Lulus'; break;
                case 'C': $mutu = 2.00; $status = 'Lulus'; break;
                case 'C-': $mutu = 1.70; $status = 'Lulus'; break;
                case 'D': $mutu = 1.00; $status = 'Gagal'; break;
                case 'E': $mutu = 0.00; $status = 'Gagal'; break;
                default: $mutu = 0.00; $status = 'Gagal'; break;
            }
            return ['grade' => $grade, 'mutu' => $mutu, 'status' => $status];
        }

        $semuaMatkul = [
            [ "nama" => "Algoritma dan Struktur Data", "sks" => 4, "hadir" => 90, "tugas" => 60, "uts" => 80, "uas" => 70 ],
            [ "nama" => "Agama", "sks" => 2, "hadir" => 70, "tugas" => 50, "uts" => 60, "uas" => 80 ],
            [ "nama" => "Basis Data", "sks" => 4, "hadir" => 85, "tugas" => 75, "uts" => 80, "uas" => 88 ],
            [ "nama" => "Kalkulus", "sks" => 3, "hadir" => 95, "tugas" => 90, "uts" => 85, "uas" => 92 ],
            [ "nama" => "Pemrograman Web Dasar", "sks" => 3, "hadir" => 69, "tugas" => 80, "uts" => 90, "uas" => 100 ]
        ];

        $totalSKS = 0;
        $totalBobot = 0;
        $hasilAkhirMatkul = [];

        foreach ($semuaMatkul as $matkul) {

            $nilaiAkhir = (0.1 * $matkul['hadir']) + (0.2 * $matkul['tugas']) + (0.3 * $matkul['uts']) + (0.4 * $matkul['uas']);
            
            $hasilGrade = hitungGrade($nilaiAkhir, $matkul['hadir']);
            
            $bobot = $hasilGrade['mutu'] * $matkul['sks'];

            $totalSKS += $matkul['sks'];
            $totalBobot += $bobot;
            
            $hasilAkhirMatkul[] = [
                'nama' => $matkul['nama'],
                'sks' => $matkul['sks'],
                'hadir' => $matkul['hadir'],
                'tugas' => $matkul['tugas'],
                'uts' => $matkul['uts'],
                'uas' => $matkul['uas'],
                'nilaiAkhir' => $nilaiAkhir,
                'grade' => $hasilGrade['grade'],
                'mutu' => $hasilGrade['mutu'],
                'bobot' => $bobot,
                'status' => $hasilGrade['status']
            ];
        }

        $IPK = $totalSKS > 0 ? $totalBobot / $totalSKS : 0;
        ?>

        <?php foreach ($hasilAkhirMatkul as $index => $mk): ?>
            <table class="nilai-table">
                <tr><td class="label">Nama Matakuliah ke-<?php echo $index + 1; ?></td><td class="value">: <?php echo $mk['nama']; ?></td></tr>
                <tr><td class="label">SKS</td><td class="value">: <?php echo $mk['sks']; ?></td></tr>
                <tr><td class="label">Kehadiran</td><td class="value">: <?php echo $mk['hadir']; ?></td></tr>
                <tr><td class="label">Tugas</td><td class="value">: <?php echo $mk['tugas']; ?></td></tr>
                <tr><td class="label">UTS</td><td class="value">: <?php echo $mk['uts']; ?></td></tr>
                <tr><td class="label">UAS</td><td class="value">: <?php echo $mk['uas']; ?></td></tr>
                <tr><td class="label">Nilai Akhir</td><td class="value">: <?php echo number_format($mk['nilaiAkhir'], 2); ?></td></tr>
                <tr><td class="label">Grade</td><td class="value">: <?php echo $mk['grade']; ?></td></tr>
                <tr><td class="label">Angka Mutu</td><td class="value">: <?php echo number_format($mk['mutu'], 2); ?></td></tr>
                <tr><td class="label">Bobot</td><td class="value">: <?php echo number_format($mk['bobot'], 2); ?></td></tr>
                <tr><td class="label">Status</td><td class="value">: <?php echo $mk['status']; ?></td></tr>
            </table>
        <?php endforeach; ?>

        <hr class="primary">
        <table class="nilai-table total-table">
            <tr><td class="label">Total Bobot</td><td class="value">: <?php echo number_format($totalBobot, 2); ?></td></tr>
            <tr><td class="label">Total SKS</td><td class="value">: <?php echo $totalSKS; ?></td></tr>
            <tr><td class="label">IPK</td><td class="value">: <?php echo number_format($IPK, 2); ?></td></tr>
        </table>
    </div>
    
    <style>
        #ipk { background-color: #ffffff; border-radius: 10px; padding: 20px; max-width: 700px; margin: 20px auto; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); }
        #ipk h2 { color: #003366; border-bottom: 2px solid #003366; padding-bottom: 6px; margin-top: 0; margin-bottom: 16px; }
        #ipk table { width: 100%; border-collapse: collapse; margin-bottom: 24px; }
        #ipk tr { display: flex; justify-content: flex-start; align-items: baseline; padding: 6px 0; border-bottom: 1px solid #e6e6e6; }
        #ipk table tr:last-child { border-bottom: none; }
        #ipk td { padding: 0; border: none; }
        #ipk .label { min-width: 180px; color: #003366; font-weight: 600; text-align: right; padding-right: 16px; flex-shrink: 0; }
        #ipk .value { text-align: left; }
        #ipk .total-table .label, #ipk .total-table .value { font-size: 1.1em; font-weight: bold; }
        @media (max-width: 600px) {
            #ipk tr { flex-direction: column; align-items: flex-start; }
            #ipk .label { text-align: left; padding-right: 0; margin-bottom: 2px; min-width: auto; }
        }
    </style>
</section>
        <section id="contact">
            <h2>Kontak Kami</h2>
            <form action="" method="GET">
                <label for="txtNama"><span>Nama:</span>
                    <input type="text" id="txtNama" name="txtNama" placeholder="Masukkan nama" required
                        autocomplete="name" />
                </label>

                <label for="txtEmail"><span>Email:</span>
                    <input type="email" id="txtEmail" name="txtEmail" placeholder="Masukkan email" required
                        autocomplete="email" />
                </label>

                <label for="txtPesan"><span>Pesan Anda</span>
                    <textarea id="txtPesan" name="txtPesan" rows="4" placeholder="Tulis pesan anda..."
                        required></textarea>
                    <small id="charCount">0/200 karakter</small>
                </label>
                <button type="submit">Kirim</button>
                <button type="reset">Batal</button>
            </form>
        </section>
</body>

<h2></h2>
<p>&copy; 2025 Reynanda Oktarian [2511500054]</p>
</section>
<section>
    <h2></h2>
    <p></p>
</section>
</main>
<footer>
    <p></p>
</footer>

<script src="script.js"></script>
</body>

</html>