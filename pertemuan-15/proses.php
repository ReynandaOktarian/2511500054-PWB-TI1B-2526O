<?php
session_start();
require __DIR__ . '/koneksi.php';
require_once __DIR__ . '/fungsi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect_ke('index.php');
}


if (isset($_POST['submit_biodata'])) {
    
    // 1. Ambil & Bersihkan Data
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

    $errors = [];
    if (empty($nim) || empty($nama) || empty($tempat)) {
        $errors[] = 'NIM, Nama, dan Tempat Lahir wajib diisi.';
    }

    if (!empty($errors)) {
        $_SESSION['old_bio'] = [
            'nim' => $nim, 'nama' => $nama, 'tempat' => $tempat, 
            'tanggal' => $tanggal, 'hobi' => $hobi, 'pasangan' => $pasangan,
            'pekerjaan' => $pekerjaan, 'ortu' => $ortu, 'kakak' => $kakak, 'adik' => $adik
        ];
        $_SESSION['flash_error_bio'] = implode('<br>', $errors);
        redirect_ke('index.php#biodata'); 
    }

    $sql = "INSERT INTO tbl_biodata (cnim, cnama, ctempat_lahir, dtanggal_lahir, chobi, cpasangan, cpekerjaan, cnama_ortu, cnama_kakak, cnama_adik) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssssssssss", $nim, $nama, $tempat, $tanggal, $hobi, $pasangan, $pekerjaan, $ortu, $kakak, $adik);
        
        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['flash_sukses_bio'] = 'Biodata berhasil disimpan!';
            $_SESSION["biodata"] = [
                "nim" => $nim, "nama" => $nama, "tempat" => $tempat, 
                "tanggal" => $tanggal, "hobi" => $hobi, "pasangan" => $pasangan,
                "pekerjaan" => $pekerjaan, "ortu" => $ortu, "kakak" => $kakak, "adik" => $adik
            ];
        } else {
            $_SESSION['flash_error_bio'] = 'Gagal menyimpan data ke database.';
            $_SESSION['old_bio'] = $_POST; 
        }
        mysqli_stmt_close($stmt);
    } else {
        $_SESSION['flash_error_bio'] = 'Terjadi kesalahan sistem (Statement Error).';
    }

    redirect_ke('index.php#biodata');

} elseif (isset($_POST['submit_kontak']) || isset($_POST['txtEmail'])) { 

    $nama  = bersihkan($_POST['txtNama']  ?? '');
    $email = bersihkan($_POST['txtEmail'] ?? '');
    $pesan = bersihkan($_POST['txtPesan'] ?? '');
    $captcha = bersihkan($_POST['txtCaptcha'] ?? '');

    $errors = [];
    if ($nama === '') $errors[] = 'Nama wajib diisi.';
    if ($email === '') $errors[] = 'Email wajib diisi.';
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Format e-mail tidak valid.';
    if ($pesan === '') $errors[] = 'Pesan wajib diisi.';
    if ($captcha !== "5") $errors[] = 'Jawaban captcha salah.';

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
            unset($_SESSION['old']);
            $_SESSION['flash_sukses'] = 'Terima kasih, data Anda sudah tersimpan.';
        } else {
            $_SESSION['old'] = ['nama' => $nama, 'email' => $email, 'pesan' => $pesan, 'captcha' => $captcha];
            $_SESSION['flash_error'] = 'Data gagal disimpan. Silakan coba lagi.';
        }
        mysqli_stmt_close($stmt);
    } else {
        $_SESSION['flash_error'] = 'Terjadi kesalahan sistem.';
    }

    redirect_ke('index.php#contact');

} else {
    redirect_ke('index.php');
}
?>