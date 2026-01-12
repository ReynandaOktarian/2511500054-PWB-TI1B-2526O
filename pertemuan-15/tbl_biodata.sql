-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 12, 2026 at 07:39 AM
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
-- Table structure for table `tbl_biodata`
--

CREATE TABLE `tbl_biodata` (
  `bid` int(11) NOT NULL,
  `cnim` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  `cnama` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `ctempat_lahir` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `dtanggal_lahir` date DEFAULT NULL,
  `chobi` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `cpasangan` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `cpekerjaan` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `cnama_ortu` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `cnama_kakak` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `cnama_adik` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `dcreated_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `tbl_biodata`
--

INSERT INTO `tbl_biodata` (`bid`, `cnim`, `cnama`, `ctempat_lahir`, `dtanggal_lahir`, `chobi`, `cpasangan`, `cpekerjaan`, `cnama_ortu`, `cnama_kakak`, `cnama_adik`, `dcreated_at`) VALUES
(1, '25115000111', 'Reynn', 'wda', '2007-10-29', 'Menambahkan section entry data mahasiswa', 'awdaa', 'wada', 'wada', '9', 'awda', '2026-01-12 14:19:31'),
(2, '25115000010019', 'Reynn', 'wade', '2007-10-29', 'Menambahkan section entry data mahasiswa', 'awdaa', 'wada', 'wada', '9', 'awda', '2026-01-12 14:28:06'),
(3, '2511500054', 'Reynanda Oktarian', 'Tanjung Pandan', '2007-10-29', 'Geming', 'SOLO', 'MAHASIGMA', '8', 'DEEERRRRYYYY AAANNNDDDEEEKKKAA', '-', '2026-01-12 14:35:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_biodata`
--
ALTER TABLE `tbl_biodata`
  ADD PRIMARY KEY (`bid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_biodata`
--
ALTER TABLE `tbl_biodata`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
