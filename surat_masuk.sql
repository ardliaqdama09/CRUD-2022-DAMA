-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2022 at 05:08 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rri_malang`
--

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id_pengirim` int(20) NOT NULL,
  `Pengirim` varchar(30) CHARACTER SET latin1 NOT NULL,
  `Tanggal surat` varchar(30) CHARACTER SET latin1 NOT NULL,
  `Tanggal Diterima` varchar(30) CHARACTER SET latin1 NOT NULL,
  `Perihal Surat` varchar(30) CHARACTER SET latin1 NOT NULL,
  `No_surat` varchar(30) CHARACTER SET latin1 NOT NULL,
  `Penyimpanan fisik` varchar(30) CHARACTER SET latin1 NOT NULL,
  `Distribusi surat` varchar(30) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surat_masuk`
--

INSERT INTO `surat_masuk` (`id_pengirim`, `Pengirim`, `Tanggal surat`, `Tanggal Diterima`, `Perihal Surat`, `No_surat`, `Penyimpanan fisik`, `Distribusi surat`) VALUES
(2, 'tony stark', '9 juli', '10 agustus', 'iron man', '654322326', 'direktur umum', 'umum');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id_pengirim`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id_pengirim` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
