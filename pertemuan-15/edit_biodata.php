<?php
  session_start();
  require 'koneksi.php';
  require 'fungsi.php';

  $bid = filter_input(INPUT_GET, 'bid', FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);

  if (!$bid) {
    $_SESSION['flash_error'] = 'ID Biodata tidak valid.';
    redirect_ke('read.php');
  }

  $stmt = mysqli_prepare($conn, "SELECT * FROM tbl_biodata WHERE bid = ? LIMIT 1");
  mysqli_stmt_bind_param($stmt, "i", $bid);
  mysqli_stmt_execute($stmt);
  $res = mysqli_stmt_get_result($stmt);
  $row = mysqli_fetch_assoc($res);
  mysqli_stmt_close($stmt);

  if (!$row) {
    $_SESSION['flash_error'] = 'Data tidak ditemukan.';
    redirect_ke('read.php');
  }

  $flash_error = $_SESSION['flash_error'] ?? '';
  $old = $_SESSION['old_bio'] ?? []; 
  unset($_SESSION['flash_error'], $_SESSION['old_bio']);

  $d = [
    'nim' => $old['nim'] ?? $row['cnim'],
    'nama' => $old['nama'] ?? $row['cnama'],
    'tempat' => $old['tempat'] ?? $row['ctempat_lahir'],
    'tanggal' => $old['tanggal'] ?? $row['dtanggal_lahir'],
    'hobi' => $old['hobi'] ?? $row['chobi'],
    'pasangan' => $old['pasangan'] ?? $row['cpasangan'],
    'pekerjaan' => $old['pekerjaan'] ?? $row['cpekerjaan'],
    'ortu' => $old['ortu'] ?? $row['cnama_ortu'],
    'kakak' => $old['kakak'] ?? $row['cnama_kakak'],
    'adik' => $old['adik'] ?? $row['cnama_adik'],
  ];
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Biodata</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <main>
    <section>
      <h2>Edit Biodata</h2>
      
      <?php if (!empty($flash_error)): ?>
        <div style="background:#f8d7da; color:#721c24; padding:10px; margin-bottom:10px;">
          <?= $flash_error; ?>
        </div>
      <?php endif; ?>

      <form action="proses_update_biodata.php" method="POST">
        <input type="hidden" name="bid" value="<?= $bid ?>">

       <label>NIM: 
       <input type="text" name="txtNim" value="<?= htmlspecialchars($d['nim']) ?>" 
        readonly style="background-color: #e9ecef; cursor: not-allowed;">
         </label><br>
        <label>Nama: <input type="text" name="txtNmLengkap" value="<?= htmlspecialchars($d['nama']) ?>" required></label><br>
        <label>Tempat Lahir: <input type="text" name="txtTmpLhr" value="<?= htmlspecialchars($d['tempat']) ?>" required></label><br>
        <label>Tgl Lahir: <input type="date" name="txtTglLhr" value="<?= htmlspecialchars($d['tanggal']) ?>" required></label><br>
        <label>Hobi: <input type="text" name="txtHobi" value="<?= htmlspecialchars($d['hobi']) ?>"></label><br>
        <label>Pasangan: <input type="text" name="txtPasangan" value="<?= htmlspecialchars($d['pasangan']) ?>"></label><br>
        <label>Pekerjaan: <input type="text" name="txtKerja" value="<?= htmlspecialchars($d['pekerjaan']) ?>"></label><br>
        <label>Nama Ortu: <input type="text" name="txtNmOrtu" value="<?= htmlspecialchars($d['ortu']) ?>"></label><br>
        <label>Nama Kakak: <input type="text" name="txtNmKakak" value="<?= htmlspecialchars($d['kakak']) ?>"></label><br>
        <label>Nama Adik: <input type="text" name="txtNmAdik" value="<?= htmlspecialchars($d['adik']) ?>"></label><br>
        
        <br>
        <button type="submit">Update Biodata</button>
        <a href="read.php">Batal</a>
      </form>
    </section>
  </main>
</body>
</html>