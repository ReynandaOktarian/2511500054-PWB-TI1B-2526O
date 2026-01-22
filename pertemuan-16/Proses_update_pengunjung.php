<?php
session_start();
require 'koneksi.php';
require 'fungsi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect_ke('read.php');
}

$bid = filter_input(INPUT_POST, 'bid', FILTER_VALIDATE_INT);
if (!$bid) {
    $_SESSION['flash_error'] = 'ID Biodata Invalid.';
    redirect_ke('read.php');
}

// Ambil Data Form
$nama  = bersihkan($_POST['txtNmPengunjung'] ?? '');
$alamat = bersihkan($_POST['txtAlRmh'] ?? '');
$tanggal= bersihkan($_POST['txtTglKunjungan'] ?? '');
$hobi   = bersihkan($_POST['txtHobi'] ?? '');
$asal_sma = bersihkan($_POST['txtAsalSMA'] ?? '');
$pekerjaan= bersihkan($_POST['txtKerja'] ?? '');
$ortu   = bersihkan($_POST['txtNmOrtu'] ?? '');
$pacar  = bersihkan($_POST['txtNmPacar'] ?? '');
$mantan = bersihkan($_POST['txtNmMantan'] ?? '');


if (empty($nama) || empty($alamat)) {
    $_SESSION['flash_error'] = 'Nama dan Alamat wajib diisi.';
    $_SESSION['old_bio'] = [
        'nama' => $nama, 'alamat' => $alamat, 'tanggal' => $tanggal,
        'hobi' => $hobi, 'asal_sma' => $asal_sma, 'pekerjaan' => $pekerjaan,
        'ortu' => $ortu, 'pacar' => $pacar, 'mantan' => $mantan
    ];
    redirect_ke('edit_Pengunjung.php?bid=' . $bid);
}

$sql = "UPDATE tbl_biodata SET 
        cnim=?, cnama=?, ctempat_lahir=?, dtanggal_lahir=?, 
        chobi=?, cpasangan=?, cpekerjaan=?, cnama_ortu=?, cnama_kakak=?, cnama_adik=?
        WHERE bid=?";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ssssssssssi", 
    $nama, $alamat, $tanggal, 
    $hobi, $asal_sma, $pekerjaan, $ortu, $pacar, $mantan, $bid);

if (mysqli_stmt_execute($stmt)) {
    $_SESSION['flash_sukses'] = 'Biodata berhasil diperbarui.';
    redirect_ke('read.php');
} else {
    $_SESSION['flash_error'] = 'Gagal update data.';
    redirect_ke('edit_Pengunjung.php?bid=' . $bid);
}
mysqli_stmt_close($stmt);