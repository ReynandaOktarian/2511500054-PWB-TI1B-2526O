<?php
session_start();
require 'koneksi.php';
require 'fungsi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect_ke('read.php');
}

// 1. Ambil ID/Kode Lama (Hidden Input) untuk WHERE clause
$kode_lama = $_POST['kode_lama'] ?? '';

if (empty($kode_lama)) {
    $_SESSION['flash_error'] = 'Data tidak ditemukan (ID Invalid).';
    redirect_ke('read.php');
}

// 2. Ambil Data Baru dari Form
$kode_baru  = bersihkan($_POST['txtKodePen'] ?? $kode_lama);
$nama       = bersihkan($_POST['txtNmPengunjung'] ?? '');
$alamat     = bersihkan($_POST['txtAlRmh'] ?? '');
$tanggal    = bersihkan($_POST['txtTglKunjungan'] ?? '');
$hobi       = bersihkan($_POST['txtHobi'] ?? '');
$asal_sma   = bersihkan($_POST['txtAsalSMA'] ?? '');
$pekerjaan  = bersihkan($_POST['txtKerja'] ?? '');
$ortu       = bersihkan($_POST['txtNmOrtu'] ?? '');
$pacar      = bersihkan($_POST['txtNmPacar'] ?? '');
$mantan     = bersihkan($_POST['txtNmMantan'] ?? '');

// 3. Validasi
if (empty($nama) || empty($alamat) || empty($tanggal)) {
    $_SESSION['flash_error'] = 'Nama, Alamat, dan Tanggal wajib diisi.';
    // Simpan input user agar tidak hilang
    $_SESSION['old_bio'] = $_POST;
    redirect_ke('edit_pengunjung.php?bid=' . urlencode($kode_lama));
}

// 4. Update Database
// PERBAIKAN: Nama kolom disesuaikan dengan tabel biodata_pengunjung
$sql = "UPDATE biodata_pengunjung SET 
        kode_pengunjung=?, 
        nama_pengunjung=?, 
        alamat_rumah=?, 
        tgl_kunjungan=?, 
        hobi=?, 
        asal_slta=?, 
        pekerjaan=?, 
        nama_ortu=?, 
        nama_pacar=?, 
        nama_mantan=?
        WHERE kode_pengunjung=?";

$stmt = mysqli_prepare($conn, $sql);

// Binding: 11 parameter string (10 data baru + 1 kode lama untuk WHERE)
mysqli_stmt_bind_param($stmt, "sssssssssss", 
    $kode_baru, $nama, $alamat, $tanggal, 
    $hobi, $asal_sma, $pekerjaan, $ortu, $pacar, $mantan, 
    $kode_lama
);

if (mysqli_stmt_execute($stmt)) {
    $_SESSION['flash_sukses'] = 'Biodata berhasil diperbarui.';
    unset($_SESSION['old_bio']);
    redirect_ke('read.php');
} else {
    $_SESSION['flash_error'] = 'Gagal update data. Kode Pengunjung mungkin duplikat.';
    $_SESSION['old_bio'] = $_POST;
    redirect_ke('edit_pengunjung.php?bid=' . urlencode($kode_lama));
}
mysqli_stmt_close($stmt);
?>