-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 22, 2026 at 04:31 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pwd2025`
--

-- --------------------------------------------------------

--
-- Table structure for table `biodata_pengunjung`
--

CREATE TABLE `biodata_pengunjung` (
  `bid` int(20) NOT NULL,
  `nama_pengunjung` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `alamat_rumah` text COLLATE utf8mb4_bin NOT NULL,
  `tgl_kunjungan` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `hobi` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `asal_slta` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `pekerjaan` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `nama_ortu` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `nama_pacar` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `nama_mantan` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biodata_pengunjung`
--
ALTER TABLE `biodata_pengunjung`
  ADD PRIMARY KEY (`bid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `biodata_pengunjung`
--
ALTER TABLE `biodata_pengunjung`
  MODIFY `bid` int(20) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
