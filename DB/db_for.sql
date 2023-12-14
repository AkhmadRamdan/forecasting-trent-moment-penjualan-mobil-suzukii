-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2023 at 11:58 PM
-- Server version: 10.7.3-MariaDB
-- PHP Version: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_for`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id_data` int(5) NOT NULL,
  `bulan` varchar(10) NOT NULL,
  `tahun` varchar(30) NOT NULL,
  `i_harga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id_data`, `bulan`, `tahun`, `i_harga`) VALUES
(1, 'Januari', '2020', 10120),
(2, 'Februari', '2020', 8144),
(3, 'Maret', '2020', 7161),
(4, 'April', '2020', 2700),
(5, 'Mei', '2020', 2205),
(6, 'Juni', '2020', 4206),
(7, 'Juli', '2020', 5432),
(8, 'Agustus', '2020', 5259),
(9, 'September', '2020', 5710),
(10, 'Oktober', '2020', 5715),
(11, 'November', '2020', 7232),
(12, 'Desember', '2020', 8505),
(13, 'Januari', '2021', 6192),
(14, 'Februari', '2021', 5132),
(15, 'Maret', '2021', 8179),
(16, 'April', '2021', 7575),
(17, 'Mei', '2021', 6578),
(18, 'Juni', '2021', 7244),
(19, 'Juli', '2021', 6508),
(20, 'Agustus', '2021', 9013),
(21, 'September', '2021', 7355),
(22, 'Oktober', '2021', 6819),
(23, 'November', '2021', 8714),
(24, 'Desember', '2021', 10287),
(25, 'Januari', '2022', 7465),
(26, 'Februari', '2022', 6000),
(27, 'Maret', '2022', 7765),
(28, 'April', '2022', 6500),
(29, 'Mei', '2022', 6316),
(30, 'Juni', '2022', 7006),
(31, 'Juli', '2022', 6771),
(32, 'Agustus', '2022', 7816),
(33, 'September', '2022', 7902),
(34, 'Oktober', '2022', 7605),
(35, 'November', '2022', 8226),
(36, 'Desember', '2022', 9695);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`) VALUES
(1, 'admin', 'admin', 'Anu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id_data`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id_data` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
