<?php
  session_start();
  $sesname = $_SESSION["nama"];
  $sesemail = $_SESSION["email"];
  $sespesan = $_SESSION["pesan"];
?>

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
        <h2>Nilai Saya</h2>
        <?php
        $namaMatkul1 = "Algoritma dan Struktur Data";
        $namaMatkul2 = "Agama";
        $namaMatkul3 = "Bahasa Inggris";
        $namaMatkul4 = "Matematika Komputer";
        $namaMatkul5 = "Pemrograman Web Dasar";

        $sksMatkul1 = 4;
        $sksMatkul2 = 2;
        $sksMatkul3 = 6;
        $sksMatkul4 = 5;
        $sksMatkul5 = 3;

        $nilaiHadir1 = 90; $nilaiTugas1 = 60; $nilaiUTS1 = 80; $nilaiUAS1 = 70;
        $nilaiHadir2 = 70; $nilaiTugas2 = 50; $nilaiUTS2 = 60; $nilaiUAS2 = 80;
        $nilaiHadir3 = 85; $nilaiTugas3 = 75; $nilaiUTS3 = 65; $nilaiUAS3 = 80;
        $nilaiHadir4 = 95; $nilaiTugas4 = 85; $nilaiUTS4 = 80; $nilaiUAS4 = 90;
        $nilaiHadir5 = 69; $nilaiTugas5 = 80; $nilaiUTS5 = 90; $nilaiUAS5 = 100;

        $nilaiAkhir1 = (0.1 * $nilaiHadir1) + (0.2 * $nilaiTugas1) + (0.3 * $nilaiUTS1) + (0.4 * $nilaiUAS1);
        $nilaiAkhir2 = (0.1 * $nilaiHadir2) + (0.2 * $nilaiTugas2) + (0.3 * $nilaiUTS2) + (0.4 * $nilaiUAS2);
        $nilaiAkhir3 = (0.1 * $nilaiHadir3) + (0.2 * $nilaiTugas3) + (0.3 * $nilaiUTS3) + (0.4 * $nilaiUAS3);
        $nilaiAkhir4 = (0.1 * $nilaiHadir4) + (0.2 * $nilaiTugas4) + (0.3 * $nilaiUTS4) + (0.4 * $nilaiUAS4);
        $nilaiAkhir5 = (0.1 * $nilaiHadir5) + (0.2 * $nilaiTugas5) + (0.3 * $nilaiUTS5) + (0.4 * $nilaiUAS5);

        if ($nilaiHadir1 < 70) {
          $grade1 = "E";
        } elseif ($nilaiAkhir1 >= 85) {
          $grade1 = "A";
        } elseif ($nilaiAkhir1 >= 80) {
          $grade1 = "A-";
        } elseif ($nilaiAkhir1 >= 75) {
          $grade1 = "B+";
        } elseif ($nilaiAkhir1 >= 70) {
          $grade1 = "B";
        } elseif ($nilaiAkhir1 >= 65) {
          $grade1 = "B-";
        } elseif ($nilaiAkhir1 >= 60) {
          $grade1 = "C+";
        } elseif ($nilaiAkhir1 >= 55) {
          $grade1 = "C";
        } elseif ($nilaiAkhir1 >= 50) {
          $grade1 = "C-";
        } elseif ($nilaiAkhir1 >= 45) {
          $grade1 = "D";
        } elseif ($nilaiAkhir1 >= 40) {
          $grade1 = "E";
        } elseif ($nilaiAkhir1 >= 35) {
        }

        if ($nilaiHadir2 < 70) {
          $grade2 = "E";
        } elseif ($nilaiAkhir2 >= 85) {
          $grade2 = "A";
        } elseif ($nilaiAkhir2 >= 80) {
          $grade2 = "A-";
        } elseif ($nilaiAkhir2 >= 75) {
          $grade2 = "B+";
        } elseif ($nilaiAkhir2 >= 70) {
          $grade2 = "B";
        } elseif ($nilaiAkhir2 >= 65) {
          $grade2 = "B-";
        } elseif ($nilaiAkhir2 >= 60) {
          $grade2 = "C+";
        } elseif ($nilaiAkhir2 >= 55) {
          $grade2 = "C";
        } elseif ($nilaiAkhir2 >= 50) {
          $grade2 = "C-";
        } elseif ($nilaiAkhir2 >= 45) {
          $grade1 = "D";
        } elseif ($nilaiAkhir1 >= 40) {
          $grade1 = "E";
        } elseif ($nilaiAkhir1 >= 35) {
        }

        if ($nilaiHadir3 < 70) {
          $grade3 = "E";
        } elseif ($nilaiAkhir3 >= 85) {
          $grade3 = "A";
        } elseif ($nilaiAkhir3 >= 80) {
          $grade3 = "A-";
        } elseif ($nilaiAkhir3 >= 75) {
          $grade3 = "B+";
        } elseif ($nilaiAkhir3 >= 70) {
          $grade3 = "B";
        } elseif ($nilaiAkhir3 >= 65) {
          $grade3 = "B-";
        } elseif ($nilaiAkhir3 >= 60) {
          $grade3 = "C+";
        } elseif ($nilaiAkhir3 >= 55) {
          $grade3 = "C";
        } elseif ($nilaiAkhir3 >= 50) {
          $grade3 = "C-";
        } elseif ($nilaiAkhir3 >= 45) {
          $grade1 = "D";
        } elseif ($nilaiAkhir1 >= 40) {
          $grade1 = "E";
        } elseif ($nilaiAkhir1 >= 35) {
        }

        if ($nilaiHadir4 < 70) {
          $grade4 = "E";
        } elseif ($nilaiAkhir4 >= 85) {
          $grade4 = "A";
        } elseif ($nilaiAkhir4 >= 80) {
          $grade4 = "A-";
        } elseif ($nilaiAkhir4 >= 75) {
          $grade4 = "B+";
        } elseif ($nilaiAkhir4 >= 70) {
          $grade4 = "B";
        } elseif ($nilaiAkhir4 >= 65) {
          $grade4 = "B-";
        } elseif ($nilaiAkhir4 >= 60) {
          $grade4 = "C+";
        } elseif ($nilaiAkhir4 >= 55) {
          $grade4 = "C";
        } elseif ($nilaiAkhir4 >= 50) {
          $grade4 = "C-";
        } elseif ($nilaiAkhir4 >= 45) {
          $grade1 = "D";
        } elseif ($nilaiAkhir1 >= 40) {
          $grade1 = "E";
        } elseif ($nilaiAkhir1 >= 35) {
        }

        if ($nilaiHadir5 < 70) {
          $grade5 = "E";
        } elseif ($nilaiAkhir5 >= 85) {
          $grade5 = "A";
        } elseif ($nilaiAkhir5 >= 80) {
          $grade5 = "A-";
        } elseif ($nilaiAkhir5 >= 75) {
          $grade5 = "B+";
        } elseif ($nilaiAkhir5 >= 70) {
          $grade5 = "B";
        } elseif ($nilaiAkhir5 >= 65) {
          $grade5 = "B-";
        } elseif ($nilaiAkhir5 >= 60) {
          $grade5 = "C+";
        } elseif ($nilaiAkhir5 >= 55) {
          $grade5 = "C";
        } elseif ($nilaiAkhir5 >= 50) {
          $grade5 = "C-";
        } elseif ($nilaiAkhir5 >= 45) {
          $grade1 = "D";
        } elseif ($nilaiAkhir1 >= 40) {
          $grade1 = "E";
        } elseif ($nilaiAkhir1 >= 35) {
        }

        switch ($grade1) {
          case "A": $mutu1 = 4.00; break;
          case "A-": $mutu1 = 3.70; break;
          case "B+": $mutu1 = 3.30; break;
          case "B": $mutu1 = 3.00; break;
          case "B-": $mutu1 = 2.70; break;
          case "C+": $mutu1 = 2.30; break;
          case "C": $mutu1 = 2.00; break;
          case "C-": $mutu1 = 1.70; break;
          case "D": $mutu1 = 1.00; break;
          default: $mutu1 = 0.00;
        }

        switch ($grade2) {
          case "A": $mutu2 = 4.00; break;
          case "A-": $mutu2 = 3.70; break;
          case "B+": $mutu2 = 3.30; break;
          case "B": $mutu2 = 3.00; break;
          case "B-": $mutu2 = 2.70; break;
          case "C+": $mutu2 = 2.30; break;
          case "C": $mutu2 = 2.00; break;
          case "C-": $mutu2 = 1.70; break;
          case "D": $mutu2 = 1.00; break;
          default: $mutu2 = 0.00;
        }

        switch ($grade3) {
          case "A": $mutu3 = 4.00; break;
          case "A-": $mutu3 = 3.70; break;
          case "B+": $mutu3 = 3.30; break;
          case "B": $mutu3 = 3.00; break;
          case "B-": $mutu3 = 2.70; break;
          case "C+": $mutu3 = 2.30; break;
          case "C": $mutu3 = 2.00; break;
          case "C-": $mutu3 = 1.70; break;
          case "D": $mutu3 = 1.00; break;
          default: $mutu3 = 0.00;
        }

        switch ($grade4) {
          case "A": $mutu4 = 4.00; break;
          case "A-": $mutu4 = 3.70; break;
          case "B+": $mutu4 = 3.30; break;
          case "B": $mutu4 = 3.00; break;
          case "B-": $mutu4 = 2.70; break;
          case "C+": $mutu4 = 2.30; break;
          case "C": $mutu4 = 2.00; break;
          case "C-": $mutu4 = 1.70; break;
          case "D": $mutu4 = 1.00; break;
          default: $mutu4 = 0.00;
        }

        switch ($grade5) {
          case "A": $mutu5 = 4.00; break;
          case "A-": $mutu5 = 3.70; break;
          case "B+": $mutu5 = 3.30; break;
          case "B": $mutu5 = 3.00; break;
          case "B-": $mutu5 = 2.70; break;
          case "C+": $mutu5 = 2.30; break;
          case "C": $mutu5 = 2.00; break;
          case "C-": $mutu5 = 1.70; break;
          case "D": $mutu5 = 1.00; break;
          default: $mutu5 = 0.00;
        }

        $status1 = ($grade1 == "D" || $grade1 == "E") ? "Gagal" : "Lulus";
        $status2 = ($grade2 == "D" || $grade2 == "E") ? "Gagal" : "Lulus";
        $status3 = ($grade3 == "D" || $grade3 == "E") ? "Gagal" : "Lulus";
        $status4 = ($grade4 == "D" || $grade4 == "E") ? "Gagal" : "Lulus";
        $status5 = ($grade5 == "D" || $grade5 == "E") ? "Gagal" : "Lulus";

        $bobot1 = $mutu1 * $sksMatkul1;
        $bobot2 = $mutu2 * $sksMatkul2;
        $bobot3 = $mutu3 * $sksMatkul3;
        $bobot4 = $mutu4 * $sksMatkul4;
        $bobot5 = $mutu5 * $sksMatkul5;

        $totalBobot = $bobot1 + $bobot2 + $bobot3 + $bobot4 + $bobot5;
        $totalSKS = $sksMatkul1 + $sksMatkul2 + $sksMatkul3 + $sksMatkul4 + $sksMatkul5;
        $IPK = $totalBobot / $totalSKS;

        for ($i=1; $i<=5; $i++) {
          echo "<hr>";
          echo "<p><strong>Nama Matakuliah ke-$i :</strong> ${'namaMatkul'.$i}</p>";
          echo "<p><strong>SKS :</strong> ${'sksMatkul'.$i}</p>";
          echo "<p><strong>Kehadiran :</strong> ${'nilaiHadir'.$i}</p>";
          echo "<p><strong>Tugas :</strong> ${'nilaiTugas'.$i}</p>";
          echo "<p><strong>UTS :</strong> ${'nilaiUTS'.$i}</p>";
          echo "<p><strong>UAS :</strong> ${'nilaiUAS'.$i}</p>";
          echo "<p><strong>Nilai Akhir :</strong> " . number_format(${"nilaiAkhir$i"}, 2) . "</p>";
          echo "<p><strong>Grade :</strong> ${'grade'.$i}</p>";
          echo "<p><strong>Angka Mutu :</strong> " . number_format(${"mutu$i"}, 2) . "</p>";
          echo "<p><strong>Bobot :</strong> " . number_format(${"bobot$i"}, 2) . "</p>";
          echo "<p><strong>Status :</strong> ${'status'.$i}</p>";
        }

        echo "<hr>";
        echo "<p><strong>Total Bobot =</strong> " . number_format($totalBobot, 2) . "</p>";
        echo "<p><strong>Total SKS =</strong> $totalSKS</p>";
        echo "<p><strong>IPK =</strong> " . number_format($IPK, 2) . "</p>";
        ?>
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
             <p>Terimakasih sudah menghubungi kami:
        <label>Nama: <strong><?php echo $sesname; ?></strong></label>
        <label>Email: <strong><?php echo $sesemail; ?></strong></label>
        <label>Pesan: <strong><?php echo $sespesan; ?></strong></label>
      </p>
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