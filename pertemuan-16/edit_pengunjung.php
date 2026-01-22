<?php
  session_start();
  require 'koneksi.php';
  require 'fungsi.php';

  // 1. Ambil Parameter Kode Pengunjung dari URL
  // Karena tipe datanya String (VARCHAR), kita ambil langsung dari $_GET
  $bid = $_GET['bid'] ?? '';

  if (empty($bid)) {
    $_SESSION['flash_error'] = 'Kode Pengunjung tidak ditemukan.';
    redirect_ke('read.php');
  }

  // 2. Query Data dari Database
  $stmt = mysqli_prepare($conn, "SELECT * FROM biodata_pengunjung WHERE bid_pengunjung = ?");
  mysqli_stmt_bind_param($stmt, "s", $bid);
  mysqli_stmt_execute($stmt);
  $res = mysqli_stmt_get_result($stmt);
  $row = mysqli_fetch_assoc($res);
  mysqli_stmt_close($stmt);

  // Jika data tidak ditemukan
  if (!$row) {
    $_SESSION['flash_error'] = 'Data pengunjung tidak ditemukan.';
    redirect_ke('read.php');
  }

  // 3. Persiapan Data untuk Form
  // Cek apakah ada data 'old' (inputan user sebelumnya yang gagal validasi)
  // Jika tidak ada, pakai data dari database ($row)
  $flash_error = $_SESSION['flash_error'] ?? '';
  $old = $_SESSION['old_bio'] ?? []; 
  unset($_SESSION['flash_error'], $_SESSION['old_bio']);

  // Mapping data ke variabel array agar form lebih rapi
  $d = [
    'bid'      => $old['txtKodePen'] ?? $row['kode_pengunjung'],
    'nama'      => $old['txtNmPengunjung'] ?? $row['nama_pengunjung'],
    'alamat'    => $old['txtAlRmh'] ?? $row['alamat_rumah'],
    'tanggal'   => $old['txtTglKunjungan'] ?? $row['tgl_kunjungan'],
    'hobi'      => $old['txtHobi'] ?? $row['hobi'],
    'asal_sma'  => $old['txtAsalSMA'] ?? $row['asal_slta'],
    'pekerjaan' => $old['txtKerja'] ?? $row['pekerjaan'],
    'ortu'      => $old['txtNmOrtu'] ?? $row['nama_ortu'],
    'pacar'     => $old['txtNmPacar'] ?? $row['nama_pacar'],
    'mantan'    => $old['txtNmMantan'] ?? $row['nama_mantan'],
  ];
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Biodata Pengunjung</title>
  <style>
      /* Style sederhana agar form terlihat rapi */
      body { font-family: sans-serif; padding: 20px; }
      label { display: block; margin-top: 10px; font-weight: bold; }
      input[type=text], input[type=date] { width: 100%; padding: 8px; margin-top: 5px; max-width: 400px; display:block;}
      button { margin-top: 20px; padding: 10px 20px; cursor: pointer; background: blue; color: white; border: none;}
      a { display: inline-block; margin-top: 20px; margin-left: 10px; color: red; text-decoration: none;}
  </style>
</head>
<body>
  <main>
    <section>
      <h2>Edit Biodata Pengunjung</h2>
      
      <?php if (!empty($flash_error)): ?>
        <div style="background:#f8d7da; color:#721c24; padding:10px; margin-bottom:10px; border-radius: 5px;">
          <?= $flash_error; ?>
        </div>
      <?php endif; ?>

      <form action="proses_update_biodata.php" method="POST">
        
        <input type="hidden" name="kode_lama" value="<?= htmlspecialchars($row['kode_pengunjung']) ?>">

        <label for="txtKodePen">Kode Pengunjung:</label>
        <input type="text" id="txtKodePen" name="txtKodePen" value="<?= htmlspecialchars($d['bid']) ?>" required>

        <label for="txtNmPengunjung">Nama Pengunjung:</label>
        <input type="text" id="txtNmPengunjung" name="txtNmPengunjung" value="<?= htmlspecialchars($d['nama']) ?>" required>

        <label for="txtAlRmh">Alamat Rumah:</label>
        <input type="text" id="txtAlRmh" name="txtAlRmh" value="<?= htmlspecialchars($d['alamat']) ?>" required>

        <label for="txtTglKunjungan">Tanggal Kunjungan:</label>
        <input type="date" id="txtTglKunjungan" name="txtTglKunjungan" value="<?= htmlspecialchars($d['tanggal']) ?>" required>

        <label for="txtHobi">Hobi:</label>
        <input type="text" id="txtHobi" name="txtHobi" value="<?= htmlspecialchars($d['hobi']) ?>">

        <label for="txtAsalSMA">Asal SLTA:</label>
        <input type="text" id="txtAsalSMA" name="txtAsalSMA" value="<?= htmlspecialchars($d['asal_sma']) ?>">

        <label for="txtKerja">Pekerjaan:</label>
        <input type="text" id="txtKerja" name="txtKerja" value="<?= htmlspecialchars($d['pekerjaan']) ?>">

        <label for="txtNmOrtu">Nama Orang Tua:</label>
        <input type="text" id="txtNmOrtu" name="txtNmOrtu" value="<?= htmlspecialchars($d['ortu']) ?>">

        <label for="txtNmPacar">Nama Pacar:</label>
        <input type="text" id="txtNmPacar" name="txtNmPacar" value="<?= htmlspecialchars($d['pacar']) ?>">

        <label for="txtNmMantan">Nama Mantan:</label>
        <input type="text" id="txtNmMantan" name="txtNmMantan" value="<?= htmlspecialchars($d['mantan']) ?>">
        
        <br>
        <button type="submit">Simpan Perubahan</button>
        <a href="read.php">Batal</a>
      </form>
    </section>
  </main>
</body>
</html>