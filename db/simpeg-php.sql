-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2022 at 02:25 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simpeg-php`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `password` varchar(150) NOT NULL,
  `role` varchar(1) NOT NULL COMMENT 'hak akses akun'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_akun`, `nama`, `no_telepon`, `password`, `role`) VALUES
(6, 'admin', '123123123', '$2y$10$mwGN03oeaOiStuHt5VjPOepkVDm6nk9lyI8hgCLicTTH3VoQF80ia', '1'),
(7, 'operator', '12345', '$2y$10$0EQTIdXP86YHuvSSbVQbzeII3j/zpLQ0h51dRpGvpzHFqUVCPArC6', '2');

-- --------------------------------------------------------

--
-- Table structure for table `bidang`
--

CREATE TABLE `bidang` (
  `id_bidang` int(11) NOT NULL,
  `nama_bidang` varchar(25) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bidang`
--

INSERT INTO `bidang` (`id_bidang`, `nama_bidang`, `tanggal`) VALUES
(1, 'Teknologi Informasi', '2022-01-08 15:50:37'),
(2, 'Humas', '2022-01-09 10:17:55'),
(10, 'SDM', '2022-01-23 10:38:29');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `id_bidang` int(11) NOT NULL,
  `nip` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `jk` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telepon` varchar(25) NOT NULL,
  `golongan` varchar(20) NOT NULL,
  `gaji` varchar(50) NOT NULL,
  `status` varchar(15) NOT NULL,
  `tmk` date NOT NULL COMMENT 'terhitung masa kerja (tmk)',
  `foto` varchar(150) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `id_bidang`, `nip`, `nama`, `jk`, `alamat`, `email`, `no_telepon`, `golongan`, `gaji`, `status`, `tmk`, `foto`, `id_user`, `tanggal`) VALUES
(4, 2, 123123213, 'Lutfi Ilham', 'Laki-Laki', 'Sekayu, Musi Banyuasin', 'ilham.lutfyparker@gmail.com', '0812312312312', 'Kontrak', '1500000', 'Belum Menikah', '2021-12-01', '61e3e307c7d87.png', 0, '2022-01-16 11:02:13'),
(6, 1, 1231231, 'Lutfi', 'Laki-Laki', 'Sekayu, Musi Banyuasin', 'ilham.lutfyparker@gmail.com', '0823645464', 'CPNS', '650000', 'Belum Menikah', '2021-12-07', '61eb9e0300053.jpg', 0, '2022-01-22 13:02:43'),
(7, 10, 1231, 'sad', 'Laki-Laki', 'Sekayu, Musi Banyuasin', 'efran@gmail.com', '123123', 'PHL', '850000', 'Menikah', '2021-12-01', '61ecd40b00064.jpg', 0, '2022-01-23 11:05:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `bidang`
--
ALTER TABLE `bidang`
  ADD PRIMARY KEY (`id_bidang`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bidang`
--
ALTER TABLE `bidang`
  MODIFY `id_bidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
