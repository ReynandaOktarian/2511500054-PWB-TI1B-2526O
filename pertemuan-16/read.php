<?php
  session_start();
  require 'koneksi.php';
  require 'fungsi.php';

  $sql = "SELECT * FROM tbl_tamu ORDER BY cid DESC";
  $q = mysqli_query($conn, $sql);
  if (!$q) {
    die("Query error: " . mysqli_error($conn));
  }
  
  $sqlBio = "SELECT * FROM biodata_pengunjung ORDER BY bid DESC";
  $qBio = mysqli_query($conn, $sqlBio);
  if (!$qBio) die("Query Biodata error: " . mysqli_error($conn));
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Halaman Admin Data</title>
  <style>
    table { width: 100%; border-collapse: collapse; margin-bottom: 30px; }
    th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
    th { background-color: #f2f2f2; }
    h2 { border-bottom: 2px solid #333; padding-bottom: 10px; margin-top: 30px;}
    .alert { padding:10px; margin-bottom:10px; border-radius:6px; }
    .alert-success { background:#d4edda; color:#155724; }
    .alert-danger { background:#f8d7da; color:#721c24; }
  </style>
</head>
<body>

<h1>Halaman Administrator</h1>
<a href="index.php">Ke Halaman Depan</a>


<?php
  $flash_sukses = $_SESSION['flash_sukses'] ?? ''; #jika query sukses
  $flash_error  = $_SESSION['flash_error'] ?? ''; #jika ada error
  #bersihkan session ini
  unset($_SESSION['flash_sukses'], $_SESSION['flash_error']); 
?>

<?php if (!empty($flash_sukses)): ?>
        <div style="padding:10px; margin-bottom:10px; 
          background:#d4edda; color:#155724; border-radius:6px;">
          <?= $flash_sukses; ?>
        </div>
<?php endif; ?>

<?php if (!empty($flash_error)): ?>
        <div style="padding:10px; margin-bottom:10px; 
          background:#f8d7da; color:#721c24; border-radius:6px;">
          <?= $flash_error; ?>
        </div>
<?php endif; ?>

<table border="1" cellpadding="8" cellspacing="0">
  <tr>
    <th>No</th>
    <th>Aksi</th>
    <th>ID</th>
    <th>Nama</th>
    <th>Email</th>
    <th>Pesan</th>
    <th>Created At</th>
  </tr>
  <?php $i = 1; ?>
  <?php while ($row = mysqli_fetch_assoc($q)): ?>
    <tr>
      <td><?= $i++ ?></td>
      <td>
        <a href="edit.php?cid=<?= (int)$row['cid']; ?>">Edit</a>
        <a onclick="return confirm('Hapus <?= htmlspecialchars($row['cnama']); ?>?')" href="proses_delete.php?cid=<?= (int)$row['cid']; ?>">Delete</a>
      </td>
      <td><?= $row['cid']; ?></td>
      <td><?= htmlspecialchars($row['cnama']); ?></td>
      <td><?= htmlspecialchars($row['cemail']); ?></td>
      <td><?= nl2br(htmlspecialchars($row['cpesan'])); ?></td>
      <td><?= formatTanggal(htmlspecialchars($row['dcreated_at'])); ?></td>
    </tr>
  <?php endwhile; ?>
</table>

<h2>Data Biodata Pengunjung</h2>
<table border="1" cellpadding="8" cellspacing="0">
  <thead>
    <tr>
      <th>No</th>
      <th>Aksi</th>
      <th>Kode</th>
      <th>Nama Pengunjung</th>
      <th>Alamat</th>
      <th>Tanggal</th>
      <th>Hobi</th>
      <th>Asal SLTA</th>
      <th>Pekerjaan</th>
      <th>Orang Tua</th>
      <th>Pacar</th>
      <th>Mantan</th>
    </tr>
  </thead>
  <tbody>
    <?php $j = 1; ?>
    <?php while ($bio = mysqli_fetch_assoc($qBio)): ?>
      <tr>
        <td><?= $j++ ?></td>
        <td style="white-space: nowrap;">
           <a class="btn-edit" href="edit_biodata.php?kode=<?= urlencode($bio['kode_pengunjung']); ?>">Edit</a> |
           <a class="btn-del" onclick="return confirm('Hapus Biodata <?= htmlspecialchars($bio['nama_pengunjung']); ?>?')" href="hapus_biodata.php?kode=<?= urlencode($bio['kode_pengunjung']); ?>">Hapus</a>
        </td>
        <td><?= htmlspecialchars($bio['kode_pengunjung']); ?></td>
        <td><?= htmlspecialchars($bio['nama_pengunjung']); ?></td>
        <td><?= htmlspecialchars($bio['alamat_rumah']); ?></td>
        <td><?= htmlspecialchars($bio['tgl_kunjungan']); ?></td>
        <td><?= htmlspecialchars($bio['hobi']); ?></td>
        <td><?= htmlspecialchars($bio['asal_slta']); ?></td>
        <td><?= htmlspecialchars($bio['pekerjaan']); ?></td>
        <td><?= htmlspecialchars($bio['nama_ortu']); ?></td>
        <td><?= htmlspecialchars($bio['nama_pacar']); ?></td>
        <td><?= htmlspecialchars($bio['nama_mantan']); ?></td>
      </tr>
    <?php endwhile; ?>

    <?php if (mysqli_num_rows($qBio) == 0): ?>
      <tr>
        <td colspan="12" style="text-align:center; color:red;">Belum ada data pengunjung.</td>
      </tr>
    <?php endif; ?>
  </tbody>
</table>