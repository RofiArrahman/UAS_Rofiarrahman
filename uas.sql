-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2024 at 09:07 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas`
--

-- --------------------------------------------------------

--
-- Table structure for table `biodata`
--

CREATE TABLE `biodata` (
  `id` int(11) NOT NULL,
  `nim` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `prodi` varchar(30) NOT NULL,
  `fakultas` varchar(30) NOT NULL,
  `universitas` varchar(100) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `waktu_submit` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `biodata`
--

INSERT INTO `biodata` (`id`, `nim`, `nama`, `alamat`, `tanggal_lahir`, `jenis_kelamin`, `prodi`, `fakultas`, `universitas`, `gambar`, `waktu_submit`) VALUES
(2, 220720036, 'Khairunnisa', 'Mendalo Asri', '2003-07-22', 'Perempuan', 'Manajemen', 'Ekonomi dan bisnis', 'Universitas Jambi', 'nisa.jpg', '2023-12-16 18:03:37'),
(4, 701220209, 'Dimas Lindra', 'JL. Daroel', '2004-05-02', 'Laki-laki', 'Sistem Informasi', 'Sains Dan Teknologi', 'Universitas Islam Negeri Sultan Thaha Saifuddin Jambi', 'dims.jpg', '2023-12-16 18:03:37'),
(6, 260720056, 'Opik Boreto', 'JL. Batang Hari', '2005-07-26', 'Laki-laki', 'Information Systems', 'Sceince And Technology', 'Oxford University', 'pick.jpg', '2023-12-16 18:03:37'),
(7, 11223344, 'Arwelis', 'Jaksel', '1997-09-22', 'Perempuan', 'Seni Musik', 'Seni', 'Universitas Padjajaran', 'Anisa.JPG', '2023-12-16 18:10:51'),
(29, 701220005, 'Dzikirullah Al Rahmat', 'Mendalo Asri', '2004-09-11', 'Laki-laki', 'Sistem Informasi', 'Sains Dan Teknologi', 'Universitas Islam Negeri Sultan Thaha Saifuddin Jambi', 'zik.jpg', '2024-01-03 15:48:09'),
(30, 701220208, 'Ahmad Rofi Arrahman', 'Perum Tahfidz', '2005-07-26', 'Laki-laki', 'Sistem Informasi', 'Sains Dan Teknologi', 'Universitas Islam Negeri Sultan Thaha Saifuddin Jambi', '20230623_111544.jpg', '2024-01-03 19:09:36'),
(32, 312201003, 'Nursyifa', 'Mendahara', '2010-12-03', 'Perempuan', 'Dokter Gigi', 'Kedokteran', 'Universitas Jambi', 'cw.jpeg', '2024-01-03 19:21:33');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id` int(11) NOT NULL,
  `nip` int(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `gumapel` varchar(50) NOT NULL,
  `gambar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id`, `nip`, `nama`, `gumapel`, `gambar`) VALUES
(3, 200507261, 'Ahmad Rofi Arrahman', 'fisika', 'pick.jpg'),
(4, 200405031, 'Dimas Lindra', 'kimia', 'dims.jpg'),
(5, 200307222, 'Khairunnisa', 'ekonomi', 'nisa.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `loginn`
--

CREATE TABLE `loginn` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(70) NOT NULL,
  `role` enum('user','admin','kepala') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loginn`
--

INSERT INTO `loginn` (`id`, `username`, `password`, `role`) VALUES
(1, 'user', 'user1', 'user'),
(2, 'admin', 'admin12', 'admin'),
(3, 'kepala', 'kepala123', 'kepala');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biodata`
--
ALTER TABLE `biodata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loginn`
--
ALTER TABLE `loginn`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `biodata`
--
ALTER TABLE `biodata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `loginn`
--
ALTER TABLE `loginn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
