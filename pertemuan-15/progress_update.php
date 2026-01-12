<?php
  session_start();
  require __DIR__ . '/koneksi.php';
  require_once __DIR__ . '/fungsi.php';

  #cek method form, hanya izinkan POST
  if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['flash_error'] = 'Akses tidak valid.';
    redirect_ke('baca.php');
  }

  #validasi cid wajib angka dan > 0
  $cid = filter_input(INPUT_POST, 'cid', FILTER_VALIDATE_INT, [
    'options' => ['min_range' => 1]
  ]);

  if (!$cid) {
    $_SESSION['flash_error'] = 'CID Tidak Valid.';
    redirect_ke('ubah.php?cid='. (int)$cid);
  }

  #ambil dan bersihkan (sanitasi) nilai dari form
  $nim = bersihkan($_POST['txtNim']  ?? '');
  $nama  = bersihkan($_POST['txtNmLengkap']  ?? '');
  $tempat = bersihkan($_POST['txtTmpLhr'] ?? '');
  $tanggal = bersihkan($_POST['txtTglLhr'] ?? '');
  $hobi = bersihkan($_POST['txthobi'] ?? '');
  $pasangan = bersihkan($_POST['txtPasangan'] ?? '');
  $pekerjaan = bersihkan($_POST['txtKerja'] ?? '');
  $ortu = bersihkan($_POST['txtNmOrtu'] ?? '');
  $kakak = bersihkan($_POST['txtNmKakak'] ?? ''); 
  $adik = bersihkan($_POST['txtNmAdik'] ?? '');

  #Validasi sederhana
  $errors = []; #ini array untuk menampung semua error yang ada

  if ($nim === '') {
    $errors[] = 'NIM wajib diisi.';
  }

  if ($nama === '') {
    $errors[] = 'Nama wajib diisi.';
  }

  if ($tempat === '') {
    $errors[] = 'Tempat lahir wajib diisi.';
  }

  if ($tanggal === '') {
    $errors[] = 'Tanggal lahir wajib diisi.';
  }

  if ($hobi === '') {
    $errors[] = 'Hobi wajib diisi.';
  }

  if ($pasangan === '') {
    $errors[] = 'Pasangan wajib diisi.';
  }

  if ($pekerjaan === '') {
    $errors[] = 'Pekerjaan wajib diisi.';
  }

  if ($ortu === '') {
    $errors[] = 'Nama orang tua wajib diisi.';
  }

  if ($kakak === '') {
    $errors[] = 'Nama kakak wajib diisi.';
  }

  if ($adik === '') {
    $errors[] = 'Nama adik wajib diisi.';
  }

  if (mb_strlen($nim) < 3) {
    $errors[] = 'Nim minimal 3 karakter.';
  }

  if (mb_strlen($nama) < 10) {
    $errors[] = 'Nama minimal 3 karakter.';
  }

  /*
  kondisi di bawah ini hanya dikerjakan jika ada error, 
  simpan nilai lama dan pesan error, lalu redirect (konsep PRG)
  */
  if (!empty($errors)) {
    $_SESSION['old'] = [
      'nim'  => $nim,
      'nama' => $nama,
      'tempat' => $tempat,
      'tanggal' => $tanggal,
      'hobi' => $hobi,
      'pasangan' => $pasangan,
      'pekerjaan' => $pekerjaan,
      'ortu' => $ortu,
      'kakak' => $kakak,
      'adik' => $adik
    ];

    $_SESSION['flash_error'] = implode('<br>', $errors);
    redirect_ke('ubah.php?cid='. (int)$cid);
  }

  /*
    Prepared statement untuk anti SQL injection.
    menyiapkan query UPDATE dengan prepared statement 
    (WAJIB WHERE cid = ?)
  */
  $stmt = mysqli_prepare($conn, "UPDATE tbl_mhs 
                                SET nim = ?, nm_lengkap = ?, tempat_lahir = ?, tgl_lahir = ?, hobi = ?, pasangan = ?, pekerjaan = ?, nm_ortu = ?, nm_kakak = ?, nm_adik = ?
                                WHERE cid = ?");
  if (!$stmt) {
    #jika gagal prepare, kirim pesan error (tanpa detail sensitif)
    $_SESSION['flash_error'] = 'Terjadi kesalahan sistem (prepare gagal).';
    redirect_ke('ubah.php?cid='. (int)$cid);
  }

  #bind parameter dan eksekusi (s = string, i = integer)
  mysqli_stmt_bind_param($stmt, "ssssi", $nim, $nama, $tempat, $tanggal, $hobi, $pasangan, $pekerjaan, $ortu, $kakak, $adik, $cid);

  if (mysqli_stmt_execute($stmt)) { #jika berhasil, kosongkan old value
    unset($_SESSION['old']);
    /*
      Redirect balik ke baca.php dan tampilkan info sukses.
    */
    $_SESSION['flash_sukses'] = 'Terima kasih, data Anda sudah diperbaharui.';
    redirect_ke('baca.php'); #pola PRG: kembali ke data dan exit()
  } else { #jika gagal, simpan kembali old value dan tampilkan error umum
    $_SESSION['old'] = [
      'nim'  => $nim,
      'nama' => $nama,
      'tempat' => $tempat,
      'tanggal' => $tanggal,
      'hobi' => $hobi,
      'pasangan' => $pasangan,
      'pekerjaan' => $pekerjaan,
      'ortu' => $ortu,
      'kakak' => $kakak,
      'adik' => $adik
    ];
    $_SESSION['flash_error'] = 'Data gagal diperbaharui. Silakan coba lagi.';
    redirect_ke('ubah.php?cid='. (int)$cid);
  }
  #tutup statement
  mysqli_stmt_close($stmt);

  redirect_ke('ubah.php?cid='. (int)$cid);