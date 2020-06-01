-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2020 at 05:10 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pertamina`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `id_lokasi_pom` int(11) NOT NULL,
  `id_jadwal_shift` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `foto` varchar(300) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `hak_akses` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `id_lokasi_pom`, `id_jadwal_shift`, `nama`, `foto`, `email`, `password`, `hak_akses`, `status`) VALUES
(2, 0, 0, 'Administrator', NULL, 'admin@pertaminasumbawa.com', '25ed1bcb423b0b7200f485fc5ff71c8e', 0, '1'),
(8, 2, 1, 'Fajar', NULL, 'fajar@gmail.com', '4124bc0a9335c27f086f24ba207a4912', 2, '1'),
(9, 2, 2, 'Erwin Mardinata', NULL, '537.mardinata@gmail.com', '25ed1bcb423b0b7200f485fc5ff71c8e', 2, '1'),
(10, 2, 3, 'Redy', NULL, 'redy@gmail.com', '25ed1bcb423b0b7200f485fc5ff71c8e', 2, '1');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_shift`
--

CREATE TABLE `jadwal_shift` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_shift`
--

INSERT INTO `jadwal_shift` (`id`, `nama`) VALUES
(1, '08.00-15.00'),
(2, '15.00-21.00'),
(3, '21.00-08.00');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_bbm`
--

CREATE TABLE `jenis_bbm` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_bbm`
--

INSERT INTO `jenis_bbm` (`id`, `nama`) VALUES
(2, 'Premium'),
(3, 'Pertalite'),
(4, 'Pertamax'),
(5, 'Solar');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi_pom`
--

CREATE TABLE `lokasi_pom` (
  `id` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `alamat` text NOT NULL,
  `kontak` varchar(20) NOT NULL,
  `lat` varchar(50) NOT NULL,
  `long` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lokasi_pom`
--

INSERT INTO `lokasi_pom` (`id`, `nama`, `alamat`, `kontak`, `lat`, `long`) VALUES
(2, 'POM Atas', '-', '087863577415', '1234567890', '0987654321');

-- --------------------------------------------------------

--
-- Table structure for table `nozzel`
--

CREATE TABLE `nozzel` (
  `id` int(11) NOT NULL,
  `id_tangki` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nozzel`
--

INSERT INTO `nozzel` (`id`, `id_tangki`, `nama`) VALUES
(1, 3, 'Nozzel 1'),
(2, 3, 'Nozzel 2'),
(3, 4, 'Nozzel 1'),
(4, 5, 'Nozzel 1'),
(5, 6, 'Nozzel 1'),
(6, 7, 'Nozzel 1'),
(7, 8, 'Nozzel 1');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(11) NOT NULL,
  `id_jenis_bbm` int(11) NOT NULL,
  `id_tangki` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `id_nozzel` int(11) NOT NULL,
  `teller_akhir` int(11) NOT NULL,
  `teller_awal` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id`, `id_jenis_bbm`, `id_tangki`, `id_admin`, `id_nozzel`, `teller_akhir`, `teller_awal`, `tanggal`) VALUES
(14, 2, 3, 8, 1, 12345, 0, '2020-05-27');

-- --------------------------------------------------------

--
-- Table structure for table `tangki`
--

CREATE TABLE `tangki` (
  `id` int(11) NOT NULL,
  `id_jenis_bbm` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tangki`
--

INSERT INTO `tangki` (`id`, `id_jenis_bbm`, `nama`) VALUES
(3, 2, 'Premium 1'),
(4, 2, 'Premium 2'),
(5, 2, 'Premium 3'),
(6, 3, 'Pertalite 1'),
(7, 4, 'Pertamax 1'),
(8, 5, 'Solar 1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal_shift`
--
ALTER TABLE `jadwal_shift`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_bbm`
--
ALTER TABLE `jenis_bbm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lokasi_pom`
--
ALTER TABLE `lokasi_pom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nozzel`
--
ALTER TABLE `nozzel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tangki`
--
ALTER TABLE `tangki`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `jadwal_shift`
--
ALTER TABLE `jadwal_shift`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jenis_bbm`
--
ALTER TABLE `jenis_bbm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lokasi_pom`
--
ALTER TABLE `lokasi_pom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nozzel`
--
ALTER TABLE `nozzel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tangki`
--
ALTER TABLE `tangki`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
