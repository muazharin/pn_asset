-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2021 at 02:00 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pn_asset`
--

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `id_asset` int(11) NOT NULL,
  `nama_asset` varchar(100) NOT NULL,
  `merk` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `jml` int(11) NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`id_asset`, `nama_asset`, `merk`, `type`, `jml`, `id_satuan`, `deskripsi`) VALUES
(2, 'Komputer Set (RAM 32 GB, SSD 500GB, RTX2800)', 'Acer', '-', 8, 2, 'Baru dibeli pekan lalu'),
(3, 'Mouse', 'Logitech', '-', 1, 1, 'Baru juga'),
(4, 'RAM', 'Kingston', 'DDR3L', 0, 1, 'SODIMM 12800s/1600MHz');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruangan` int(11) NOT NULL,
  `nama_ruangan` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id_ruangan`, `nama_ruangan`, `deskripsi`) VALUES
(2, 'ruangan 1', 'Deskripsi ruangan 1'),
(3, 'ruangan 2', 'Deskripsi ruangan 2'),
(4, 'ruangan 3', 'Deskripsi ruangan 3'),
(5, 'Ruang Ketua', '');

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id_satuan` int(11) NOT NULL,
  `nama_satuan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`id_satuan`, `nama_satuan`) VALUES
(1, 'pcs'),
(2, 'set'),
(3, 'pack'),
(4, 'kg'),
(5, 'gram'),
(6, 'lembar'),
(7, 'rim'),
(8, 'buah'),
(9, 'liter'),
(10, 'slot'),
(11, 'bungkus');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_asset` int(11) NOT NULL,
  `id_ruangan` int(11) NOT NULL,
  `id_user_request` int(11) NOT NULL,
  `jml_pengajuan` int(11) NOT NULL,
  `jml_disetujui` int(11) NOT NULL,
  `date_request` datetime NOT NULL,
  `date_confirm` datetime NOT NULL,
  `status` enum('Menunggu','Disetujui','Ditolak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_asset`, `id_ruangan`, `id_user_request`, `jml_pengajuan`, `jml_disetujui`, `date_request`, `date_confirm`, `status`) VALUES
(1, 2, 2, 5, 1, 1, '2021-09-07 19:13:56', '2021-09-08 15:33:57', 'Disetujui'),
(2, 3, 2, 5, 1, 1, '2021-09-07 19:14:50', '2021-09-08 18:52:04', 'Disetujui'),
(4, 3, 2, 6, 1, 1, '2021-09-08 19:13:59', '2021-09-08 19:14:38', 'Disetujui'),
(5, 4, 2, 6, 1, 0, '2021-09-08 19:22:34', '0000-00-00 00:00:00', 'Menunggu'),
(6, 4, 3, 5, 1, 1, '2021-09-08 19:24:07', '2021-09-08 19:24:52', 'Disetujui'),
(7, 3, 2, 6, 1, 0, '2021-09-08 20:07:12', '2021-09-08 20:11:19', 'Ditolak'),
(8, 2, 5, 7, 1, 1, '2021-09-10 18:25:44', '2021-09-10 18:31:08', 'Disetujui');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `role` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `name`, `email`, `nohp`, `username`, `password`, `gender`, `role`) VALUES
(1, 'Administrator', 'admin@gmail.com', '082243309590', 'admin', '$2y$10$6FXODvwG8.C5hEVffHXOWe.3cyPBmB.HQFpN3HTYVeMvJgq5jj8ue', 'L', '0'),
(5, 'User 1', 'user1@gmail.com', '082243309590', 'user1', '$2y$10$tHWP.hvM56jIV7uS8d4uZeKsPeFLC6E1XRzSPfJC7XFjyxRoG1bHy', 'L', '1'),
(6, 'User 2', 'user2@gmail.com', '082243309590', 'user2', '$2y$10$Y.xslzoSfGp2SJ8i1HynU.dj/kb71gEY2AKR0cemtwhourfYKJyn.', 'P', '1'),
(7, 'Muazharin Alfan', 'alfanmuazharin@gmail.com', '082243309590', 'muazharin', '$2y$10$/pMc5UNfba9xUg8K/8AeFOCQIjOSMHnMqhSjcjGHaPZrZPYQ1NNbu', 'L', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id_asset`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id_asset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id_ruangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
