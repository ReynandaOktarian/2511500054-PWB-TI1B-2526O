<?php
session_start();
require __DIR__ . '/koneksi.php';
require_once __DIR__ . '/fungsi.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $_SESSION['flash-error'] = 'akses tidak valid.';
  redirect_ke('index.php#contact');
}

$nama = bersihkan($_POST['txtNama'] ?? '');
$email = bersihkan($_POST['txtEmail'] ?? '');
$pesan = bersihkan($_POST['txtPesan'] ?? '');

