<?php
  session_start();
  require 'koneksi.php';
  require 'fungsi.php';

  $sql = "SELECT * FROM tbl_mhs ORDER BY nim DESC";
  $q = mysqli_query($conn, $sql);
  if (!$q) {
    die("Query error: " . mysqli_error($conn));
  }
?>

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
    <th>nim</th>
    <th>nm_lengkap</th>
    <th>tempat_lahir</th>
    <th>tgl_lahir</th>
    <th>hobi</th>
    <th>Pasangan</th>
    <th>pekerjaan</th>
    <th>nm_ortu</th>
    <th>nm_kakak</th>
    <th>nm_adik</th>
    <th>Created At</th>
  </tr>

  <?php $i = 1; ?>
  <?php while ($row = mysqli_fetch_assoc($q)): ?>
    <tr>
      <td><?= $i++ ?></td>
      <td>
        <a href="edit.php?nim=<?= (int)$row['nim']; ?>">Edit</a>
        <a onclick="return confirm('Hapus <?= htmlspecialchars($row['cnama']); ?>?')" href="proses_delete.php?nim=<?= (int)$row['nim']; ?>">Delete</a>
      </td>
      <td><?= $row['nim']; ?></td>
      <td><?= htmlspecialchars($row['nm_lengkap']); ?></td>
      <td><?= htmlspecialchars($row['tempat_lahir']); ?></td>
      <td><?= htmlspecialchars($row['tgl_lahir']); ?></td>
      <td><?= htmlspecialchars($row['hobi']); ?></td>
      <td><?= htmlspecialchars($row['pasangan']); ?></td>
      <td><?= htmlspecialchars($row['pekerjaan']); ?></td>
      <td><?= htmlspecialchars($row['nm_ortu']); ?></td>
      <td><?= htmlspecialchars($row['nm_kakak']); ?></td>
      <td><?= htmlspecialchars($row['nm_adik']); ?></td>
      <td><?= formatTanggal(htmlspecialchars($row['dcreated_at'])); ?></td>
    </tr>
  <?php endwhile; ?>
</table>