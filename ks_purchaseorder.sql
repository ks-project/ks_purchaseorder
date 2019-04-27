-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2019 at 07:52 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ks_purchaseorder`
--

-- --------------------------------------------------------

--
-- Table structure for table `harga_barang`
--

CREATE TABLE `harga_barang` (
  `id` int(3) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `harga` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `harga_barang`
--

INSERT INTO `harga_barang` (`id`, `nama_barang`, `harga`) VALUES
(1, 'Tepung', 120000);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(3) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `email`, `nama`, `jenis_kelamin`, `no_telp`, `alamat`, `password`) VALUES
(101, 'admin@admin.com', 'Admin', 'L', '085252363141', 'Bandung', '101');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `harga_barang`
--
ALTER TABLE `harga_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
