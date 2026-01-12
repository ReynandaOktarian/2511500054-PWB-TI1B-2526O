<?php
require 'koneksi.php';

$fieldContact = [
  "nim" => ["label" => "NIM:", "suffix" => ""],
  "nm_lengkap" => ["label" => "Nama Lengkap:", "suffix" => ""],
  "tempat_lahir" => ["label" => "Tempat Lahir:", "suffix" => ""]
  "tgl_lahir" => ["label" => "Tanggal Lahir:", "suffix" => ""],
  "hobi" => ["label" => "Hobi:", "suffix" => ""],
  "pasangan" => ["label" => "Pasangan:", "suffix" => ""],
  "pekerjaan" => ["label" => "Pekerjaan:", "suffix" => ""],
  "nm_ortu" => ["label" => "Nama Orang Tua:", "suffix" => ""]
  "nm_kakak" => ["label" => "Nama Kakak:", "suffix" => ""],
  "nm_adik" => ["label" => "Nama Adik:", "suffix" => ""],
];

$sql = "SELECT * FROM tbl_mhs ORDER BY cid DESC";
$q = mysqli_query($conn, $sql);
if (!$q) {
  echo "<p>Gagal membaca data mahasiswa: " . htmlspecialchars(mysqli_error($conn)) . "</p>";
} elseif (mysqli_num_rows($q) === 0) {
  echo "<p>Belum ada data mahasiswa yang tersimpan.</p>";
} else {
  while ($row = mysqli_fetch_assoc($q)) {
    $arrContact = [
      "nim"  => $row["nim"]  ?? "",
      "nama" => $row["nm_lengkap"] ?? "",
      " tempat lahir" => $row["tempat_lahir"] ?? "",
      "tanggal lahir" => $row["tgl_lahir"] ?? "",
      "hobi" => $row["hobi"] ?? "",
      "pasangan" => $row["pasangan"] ?? "",
      "pekerjaan" => $row["pekerjaan"] ?? "",
      "ortu" => $row["nm_ortu"] ?? "",
       "kakak" => $row["nm_kakak"] ?? "",
      "adik" => $row["nm_adik"] ?? "",
    ];
    echo tampilkanBiodata($fieldContact, $arrContact);
  }
}
?>
