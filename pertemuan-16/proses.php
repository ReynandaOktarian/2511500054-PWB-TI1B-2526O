<?php
session_start();
require __DIR__ . '/koneksi.php'; // Hapus ./ yang berlebihan
require_once __DIR__ . '/fungsi.php';

// Cek Method
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect_ke('index.php');
}

// ==========================================================
// BAGIAN 1: PROSES FORM BIODATA
// (Dideteksi jika ada input 'txtKodePen')
// ==========================================================
if (isset($_POST['txtKodePen'])) {
    
    // Ambil data
    $kode       = bersihkan($_POST['txtKodePen'] ?? '');
    $nama       = bersihkan($_POST['txtNmPengunjung'] ?? '');
    $alamat     = bersihkan($_POST['txtAlRmh'] ?? '');
    $tgl        = bersihkan($_POST['txtTglKunjungan'] ?? '');
    $hobi       = bersihkan($_POST['txtHobi'] ?? '');
    $asal_sma   = bersihkan($_POST['txtAsalSMA'] ?? '');
    $pekerjaan  = bersihkan($_POST['txtKerja'] ?? '');
    $ortu       = bersihkan($_POST['txtNmOrtu'] ?? '');
    $pacar      = bersihkan($_POST['txtNmPacar'] ?? '');
    $mantan     = bersihkan($_POST['txtNmMantan'] ?? '');

    $errors = [];
    
    // [PERBAIKAN ERROR SCREENSHOT DI SINI]
    // Menambahkan kurung buka '(' dan tutup ')'
    if (empty($kode) || empty($nama) || empty($alamat) || empty($tgl)) {
        $errors[] = 'Kode, Nama, Alamat, dan Tanggal Kunjungan wajib diisi.';
    }

    // Jika ada error, kembalikan data lama dan redirect
    if (!empty($errors)) {
        $_SESSION['old_bio'] = $_POST;
        $_SESSION['flash_error_bio'] = implode('<br>', $errors);
        redirect_ke('index.php#biodata');
    }

    // Query Insert 
    // PERBAIKAN: Mengubah kolom 'bid' menjadi 'kode_pengunjung' sesuai tabel database
    $sql = "INSERT INTO biodata_pengunjung 
            (kode_pengunjung, nama_pengunjung, alamat_rumah, tgl_kunjungan, hobi, asal_slta, pekerjaan, nama_ortu, nama_pacar, nama_mantan) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssssssssss", 
            $kode, $nama, $alamat, $tgl, $hobi, $asal_sma, $pekerjaan, $ortu, $pacar, $mantan
        );

        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['flash_sukses_bio'] = 'Biodata Pengunjung berhasil disimpan!';
            unset($_SESSION['old_bio']); 
            
            // Opsional: Simpan ke session biodata untuk ditampilkan di About
            $_SESSION["biodata"] = [
                "kodepen" => $kode, "nama" => $nama, "alamat" => $alamat,
                "tanggal" => $tgl, "hobi" => $hobi, "slta" => $asal_sma,
                "pekerjaan" => $pekerjaan, "ortu" => $ortu, "pacar" => $pacar, "mantan" => $mantan
            ];
            
        } else {
            // Cek duplikat primary key
            if (mysqli_errno($conn) == 1062) {
                $_SESSION['flash_error_bio'] = 'Gagal: Kode Pengunjung sudah terdaftar.';
            } else {
                $_SESSION['flash_error_bio'] = 'Gagal menyimpan data ke database.';
            }
            $_SESSION['old_bio'] = $_POST; 
        }
        mysqli_stmt_close($stmt);
    } else {
        $_SESSION['flash_error_bio'] = 'Terjadi kesalahan sistem (Statement Error).';
    }

    redirect_ke('index.php#biodata');

// ==========================================================
// BAGIAN 2: PROSES FORM KONTAK / BUKU TAMU
// (Dideteksi jika ada input 'txtEmail' atau tombol submit kontak)
// ==========================================================
} elseif (isset($_POST['txtEmail']) || isset($_POST['txtPesan'])) {

    $nama    = bersihkan($_POST['txtNama']  ?? '');
    $email   = bersihkan($_POST['txtEmail'] ?? '');
    $pesan   = bersihkan($_POST['txtPesan'] ?? '');
    $captcha = bersihkan($_POST['txtCaptcha'] ?? '');

    $errors = [];

    if ($nama === '') { $errors[] = 'Nama wajib diisi.'; }
    if ($email === '') { $errors[] = 'Email wajib diisi.'; }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) { $errors[] = 'Format e-mail tidak valid.'; }
    
    if ($pesan === '') { $errors[] = 'Pesan wajib diisi.'; }
    if ($captcha === '') { $errors[] = 'Pertanyaan wajib diisi.'; }
    
    if (mb_strlen($nama) < 3) { $errors[] = 'Nama minimal 3 karakter.'; }
    if (mb_strlen($pesan) < 10) { $errors[] = 'Pesan minimal 10 karakter.'; }
    if ($captcha !== "5") { $errors[] = 'Jawaban captcha salah.'; }

    if (!empty($errors)) {
        $_SESSION['old'] = ['nama' => $nama, 'email' => $email, 'pesan' => $pesan, 'captcha' => $captcha];
        $_SESSION['flash_error'] = implode('<br>', $errors);
        redirect_ke('index.php#contact');
    }

    $sql = "INSERT INTO tbl_tamu (cnama, cemail, cpesan) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sss", $nama, $email, $pesan);
        if (mysqli_stmt_execute($stmt)) {
            unset($_