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
$nim    = bersihkan($_POST['txtNim'] ?? '');
$nama   = bersihkan($_POST['txtNmLengkap'] ?? '');
$tempat = bersihkan($_POST['txtTmpLhr'] ?? '');
$tanggal= bersihkan($_POST['txtTglLhr'] ?? '');
$hobi   = bersihkan($_POST['txtHobi'] ?? '');
$pasangan = bersihkan($_POST['txtPasangan'] ?? '');
$pekerjaan= bersihkan($_POST['txtKerja'] ?? '');
$ortu   = bersihkan($_POST['txtNmOrtu'] ?? '');
$kakak  = bersihkan($_POST['txtNmKakak'] ?? '');
$adik   = bersihkan($_POST['txtNmAdik'] ?? '');

if (empty($nim) || empty($nama)) {
    $_SESSION['flash_error'] = 'NIM dan Nama wajib diisi.';
    $_SESSION['old_bio'] = [
        'nim' => $nim, 'nama' => $nama, 'tempat' => $tempat, 
        'tanggal' => $tanggal, 'hobi' => $hobi, 'pasangan' => $pasangan,
        'pekerjaan' => $pekerjaan, 'ortu' => $ortu, 'kakak' => $kakak, 'adik' => $adik
    ];
    redirect_ke('edit_biodata.php?bid=' . $bid);
}

$sql = "UPDATE tbl_biodata SET 
        cnim=?, cnama=?, ctempat_lahir=?, dtanggal_lahir=?, 
        chobi=?, cpasangan=?, cpekerjaan=?, cnama_ortu=?, cnama_kakak=?, cnama_adik=?
        WHERE bid=?";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ssssssssssi", 
    $nim, $nama, $tempat, $tanggal, 
    $hobi, $pasangan, $pekerjaan, $ortu, $kakak, $adik, $bid);

if (mysqli_stmt_execute($stmt)) {
    $_SESSION['flash_sukses'] = 'Biodata berhasil diperbarui.';
    redirect_ke('read.php');
} else {
    $_SESSION['flash_error'] = 'Gagal update data.';
    redirect_ke('edit_biodata.php?bid=' . $bid);
}
mysqli_stmt_close($stmt);