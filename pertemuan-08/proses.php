<?php
session_start();
$sesnama = $_POST["txtNama"];
$sesemail = $_POST["txtEmail"];
$sespesan = $_POST["txtPesan"];
$sesnim =  $_POST["txtNIM"];
$sestempat = $_POST["txtTempat"];
$sestanggal = $_POST["txtTanggal"];
$seshobi = $_POST["txtHobi"];
$sespasangan = $_POST["txtPasangan"];
$sespekerjaan = $_POST["txtPekerjaan"];
$sesortu = $_POST["txtOrtu"];
$seskakak = $_POST["txtKakak"];
$sesadik = $_POST["txtAdik"];
$_SESSION["seshobi"] = $seshobi;
$_SESSION["sesnama"] = $sesnama;
$_SESSION["sesemail"] = $sesemail;
$_SESSION["sespesan"] = $sespesan;
$_SESSION["sesnim"] = $sesnim;
$_SESSION["sestempat"] = $sestempat;
$_SESSION["sestanggal"] = $sestanggal;
$_SESSION["sespasangan"] = $sespasangan;
$_SESSION["sespekerjaan"] = $sespekerjaan;
$_SESSION["sesortu"] = $sesortu;
$_SESSION["seskakak"] = $seskakak;
$_SESSION["sesadik"] = $sesadik;
header("location: index.php");
?>