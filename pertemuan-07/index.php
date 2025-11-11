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
      <?php
      $namaMatkul1 = "Algoritma dan Struktur Data";
      $namaMatkul2 = "Agama";
      $namaMatkul3 = "Bahasa Indonesia";
      $namaMatkul4 = "Logika Informatika";
      $namaMatkul5 = "Pemrograman Web dasar";
      $sksMatkul1 = 4;
      $sksMatkul2 = 3;
      $sksMatkul3 = 2;
      $sksMatkul4 = 3;
      $sksMatkul5 = 3;
      $nilaiHadir1 = 90;
      $nilaiHadir2 = 90;
      $nilaiHadir3 = 70;
      $nilaiHadir4 = 80;
      $nilaiHadir5 = 90;
      $nilaiTugas1 = 60;
      $nilaiTugas2 = 70;
      $nilaiTugas3 = "";
      $nilaiTugas4 = "";
      $nilaiTugas5 = "";
      $nilaiUTS1 = "";
      $nilaiUTS2 = "";
      $nilaiUTS3 = "";
      $nilaiUTS4 = "";
      $nilaiUTS5 = "";
      $nilaiUAS1 = "";
      $nilaiUAS2 = "";
      $nilaiUAS3 = "";
      $nilaiUAS4 = "";
      $nilaiUAS5 = "";

      $nilaiAkhir1 = (0.1 * $nilaiHadir1) + (0.2 * $nilaiTugas1) + (0.3 * $nilaiUTS1) + (0.4 * $nilaiUAS1);
      $nilaiAkhir2 = (0.1 * $nilaiHadir2) + (0.2 * $nilaiTugas2) + (0.3 * $nilaiUTS2) + (0.4 * $nilaiUAS2);
      $nilaiAkhir3 = (0.1 * $nilaiHadir3) + (0.2 * $nilaiTugas3) + (0.3 * $nilaiUTS3) + (0.4 * $nilaiUAS3);
      $nilaiAkhir4 = (0.1 * $nilaiHadir4) + (0.2 * $nilaiTugas4) + (0.3 * $nilaiUTS4) + (0.4 * $nilaiUAS4);
      $nilaiAkhir5 = (0.1 * $nilaiHadir5) + (0.2 * $nilaiTugas5) + (0.3 * $nilaiUTS5) + (0.4 * $nilaiUAS5);
      
      if (($nilaiAkhir1>=91) && ($nilaiAkhir1<=100)):
        $grade1 = "A";
        $mutu1 = 4;
      elseif (($nilaiAkhir1>=81) && ($nilaiAkhir1<=90)):
        $grade1 = "A-";
        $mutu1 = 3.7;
      endif;

      if (($nilaiAkhir2 >= 91) && ($nilaiAkhir2 <= 100)):
        $grade2 = "A";
        $mutu2 = 4;
      elseif (($nilaiAkhir2 >= 81) && ($nilaiAkhir2 <= 90)):
        $grade2 = "A-";
        $mutu2 = 3.7;
      endif;
      
      if ($nilaiHadir1 < 70):
        $grade1 = "E";
      endif;
      if ($nilaiHadir2 < 70):
        $grade2 = "E";
      endif;
      if ($nilaiHadir3 < 70):
        $grade3 = "E";
      endif;
      if ($nilaiHadir4 < 70):
        $grade4 = "E";
      endif;
      if ($nilaiHadir5 < 70):
        $grade5 = "E";
      endif;



      
      $bobot1 = $mutu1 * $sksMatkul1;
      $bobot2 = $mutu2 * $sksMatkul2;
      $bobot3 = $mutu3 * $sksMatkul3;
      $bobot4 = $mutu4 * $sksMatkul4;
      $bobot5 = $mutu5 * $sksMatkul5;

      switch ($grade1):
        case "A": $status1 = "LULUS"; break;
        case "A-": $status1 = "LULUS"; break;
        case "B+": $status1 = "LULUS"; break;
        case "B": $status1 = "LULUS"; break;
        case "B-": $status1 = "LULUS"; break;
        case "C+": $status1 = "LULUS"; break;
        case "C": $status1 = "LULUS"; break;
        case "C-": $status1 = "LULUS"; break;
        case "D":
        case "E":
          $status1 = "GAGAL";
          break;
      endswitch;

      switch ($grade2):
        case "A":
          $status2 = "LULUS";
          break;
        case "A-":
          $status2 = "LULUS";
          break;
        case "B+":
          $status2 = "LULUS";
          break;
        case "B":
          $status2 = "LULUS";
          break;
        case "B-":
          $status2 = "LULUS";
          break;
        case "C+":
          $status2 = "LULUS";
          break;
        case "C":
          $status2 = "LULUS";
          break;
        case "C-":
          $status2 = "LULUS";
          break;
        case "D":
        case "E":
          $status2 = "GAGAL";
          break;
      endswitch;

      switch ($grade3):
        case "A":
          $status3 = "LULUS";
          break;
        case "A-":
          $status3 = "LULUS";
          break;
        case "B+":
          $status3 = "LULUS";
          break;
        case "B":
          $status3 = "LULUS";
          break;
        case "B-":
          $status3 = "LULUS";
          break;
        case "C+":
          $status3 = "LULUS";
          break;
        case "C":
          $status3 = "LULUS";
          break;
        case "C-":
          $status3 = "LULUS";
          break;
        case "D":
        case "E":
          $status3 = "GAGAL";
          break;
      endswitch;

      switch ($grade4):
        case "A":
          $status4 = "LULUS";
          break;
        case "A-":
          $status4 = "LULUS";
          break;
        case "B+":
          $status4 = "LULUS";
          break;
        case "B":
          $status4 = "LULUS";
          break;
        case "B-":
          $status4 = "LULUS";
          break;
        case "C+":
          $status4 = "LULUS";
          break;
        case "C":
          $status4 = "LULUS";
          break;
        case "C-":
          $status4 = "LULUS";
          break;
        case "D":
        case "E":
          $status4 = "GAGAL";
          break;
      endswitch;

      switch ($grade5):
        case "A":
          $status5 = "LULUS";
          break;
        case "A-":
          $status5 = "LULUS";
          break;
        case "B+":
          $status5 = "LULUS";
          break;
        case "B":
          $status5 = "LULUS";
          break;
        case "B-":
          $status5 = "LULUS";
          break;
        case "C+":
          $status5 = "LULUS";
          break;
        case "C":
          $status5 = "LULUS";
          break;
        case "C-":
          $status5 = "LULUS";
          break;
        case "D":
        case "E":
          $status5 = "GAGAL";
          break;
      endswitch;

      $totalBobot = $bobot1 + $bobot2 + $bobot3 + $bobot4 + $bobot5;
      $totalSKS = $sksMatkul1 + $sksMatkul2 + $sksMatkul3 + $sksMatkul4 + $sksMatkul5;


      $IPK = $totalBobot / $totalSKS;

      ?>
      <h2>Nilai Saya</h2>

      <p><strong>Nama Matakuliah ke-1:</strong> <?php echo $namaMatkul1 ?></p>
      <p><strong>SKS:</strong> <?php echo $sksMatkul1 ?></p>
      <p><strong>Kehadiran:</strong> <?php echo $nilaiHadir1 ?></p>
      <p><strong>Tugas:</strong> <?php echo $nilaiTugas1 ?></p>
      
UTS : 80 => $nilaiUTS1
UAS : 70 => $nilaiUAS1
Nilai Akhir : 73 => $nilaiAkhir1
Grade : B => $grade1
Angka Mutu : 3.00 => $mutu1
Bobot : 12 => $bobot1
Status : Lulus => $status1

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