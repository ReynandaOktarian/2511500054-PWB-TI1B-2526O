<?php
  session_start();
  require 'koneksi.php';
  require 'fungsi.php';

  $sqlTamu = "SELECT * FROM tbl_tamu ORDER BY cid DESC";
  $qTamu = mysqli_query($conn, $sqlTamu);
  if (!$qTamu) die("Query Tamu error: " . mysqli_error($conn));

  $sqlBio = "SELECT * FROM tbl_biodata ORDER BY bid DESC";
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
  $flash_sukses = $_SESSION['flash_sukses'] ?? ''; 
  $flash_error  = $_SESSION['flash_error'] ?? ''; 
  unset($_SESSION['flash_sukses'], $_SESSION['flash_error']); 
?>

<?php if (!empty($flash_sukses)): ?>
  <div class="alert alert-success"><?= $flash_sukses; ?></div>
<?php endif; ?>

<?php if (!empty($flash_error)): ?>
  <div class="alert alert-danger"><?= $flash_error; ?></div>
<?php endif; ?>

<h2>Data Buku Tamu</h2>
<table>
  <tr>
    <th>No</th>
    <th>Aksi</th>
    <th>ID</th>
    <th>Nama</th>
    <th>Email</th>
    <th>Pesan</th>
    <th>Created At</th>
  </tr>
  <?php $i = 1; while ($row = mysqli_fetch_assoc($qTamu)): ?>
    <tr>
      <td><?= $i++ ?></td>
      <td>
        <a href="edit.php?cid=<?= $row['cid']; ?>">Edit</a> | 
        <a onclick="return confirm('Hapus Tamu?')" href="proses_delete.php?cid=<?= $row['cid']; ?>">Hapus</a>
      </td>
      <td><?= $row['cid']; ?></td>
      <td><?= htmlspecialchars($row['cnama']); ?></td>
      <td><?= htmlspecialchars($row['cemail']); ?></td>
      <td><?= nl2br(htmlspecialchars($row['cpesan'])); ?></td>
      <td><?= formatTanggal(htmlspecialchars($row['dcreated_at'])); ?></td>
    </tr>
  <?php endwhile; ?>
</table>

<h2>Data Biodata Mahasiswa</h2>
<table>
  <tr>
    <th>No</th>
    <th>Aksi</th>
    <th>ID</th>
    <th>NIM</th>
    <th>Nama Lengkap</th>
    <th>TTL</th>
    <th>Hobi</th>
    <th>Pasangan</th>
    <th>Pekerjaan</th>
    <th>Ortu</th>
    <th>Kakak</th>
    <th>Adik</th>
    <th>Create At</th>
  </tr>
  <?php $j = 1; while ($bio = mysqli_fetch_assoc($qBio)): ?>
    <tr>
      <td><?= $j++ ?></td>
      <td>
        <a href="edit_biodata.php?bid=<?= $bio['bid']; ?>">Edit</a> | 
        <a onclick="return confirm('Hapus Biodata <?= htmlspecialchars($bio['cnama']); ?>?')" href="proses_delete_biodata.php?bid=<?= $bio['bid']; ?>">Hapus</a>
      </td>
      <td><?= $bio['bid']; ?></td>
      <td><?= htmlspecialchars($bio['cnim']); ?></td>
      <td><?= htmlspecialchars($bio['cnama']); ?></td>
      <td>
        <?= htmlspecialchars($bio['ctempat_lahir']); ?>, 
        <?= date('d-m-Y', strtotime($bio['dtanggal_lahir'])); ?>
      </td>
      <td><?= htmlspecialchars($bio['chobi']); ?></td>
      <td><?= htmlspecialchars($bio['cpasangan']); ?></td>
      <td><?= htmlspecialchars($bio['cpekerjaan']); ?></td>
      <td><?= htmlspecialchars($bio['cnama_ortu']); ?></td>
      <td><?= htmlspecialchars($bio['cnama_kakak']); ?></td>
      <td><?= htmlspecialchars($bio['cnama_adik']); ?></td>
      <td><?= formatTanggal(htmlspecialchars($bio['dcreated_at'])); ?></td>
    </tr>
  <?php endwhile; ?>
</table>

</body>
</html>