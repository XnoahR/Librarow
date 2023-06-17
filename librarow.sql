-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2023 at 03:52 PM
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
-- Database: `librarow`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `pengarang` varchar(50) NOT NULL,
  `available` int(11) NOT NULL,
  `sampul` varchar(100) DEFAULT NULL,
  `kategori` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `nama`, `pengarang`, `available`, `sampul`, `kategori`) VALUES
(6, 'December', 'Neck Deep', 5, '648908c086017.jpg', 'Biograph'),
(7, 'Wake Me Up When September Ends', 'Green Day', 10, '6489086b46d89.png', 'Biograph'),
(8, 'Bored to Death', 'blink', 7, '6489083003283.jpg', 'Horror'),
(9, 'Together for the Kids', 'blink', 5, '6489083629f7b.jpg', 'Drama'),
(10, 'Yellow', 'Gawr Gura', 4, '64890530e550a.jpg', 'Sociology'),
(11, 'Lost Kitten', 'Ryou', 1, '6489091b38e0b.png', 'Romance'),
(18, 'Naruto V72', 'Masashi Kishimoto', 4, 'naruto.jpg', 'Comic'),
(19, 'NarutoL', 'Masashi Kishimoto', 5, '6488fd8b70b2e.jpg', 'Comic'),
(21, 'Waifu', 'Ray', 4, '64890f2b6bda0.jpg', 'Romance');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_pinjam` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pustakawan` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `tgl_pinjam` date DEFAULT NULL,
  `tgl_kembalian` date DEFAULT NULL,
  `status_peminjaman` enum('pending','disetujui','ditolak','dipinjam','dikembalikan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_pinjam`, `id_user`, `id_pustakawan`, `id_buku`, `tgl_pinjam`, `tgl_kembalian`, `status_peminjaman`) VALUES
(11, 3, 1, 8, '0000-00-00', '0000-00-00', 'pending'),
(12, 3, 1, 9, '0000-00-00', '0000-00-00', 'dipinjam');

-- --------------------------------------------------------

--
-- Table structure for table `pustakawan`
--

CREATE TABLE `pustakawan` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pustakawan`
--

INSERT INTO `pustakawan` (`id`, `username`, `password`, `nama`, `email`, `nohp`, `foto`) VALUES
(1, 'admin', 'admin', 'admin', 'admin@email.co.id', '081234567890', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `nohp` varchar(15) DEFAULT NULL,
  `nim` varchar(10) DEFAULT NULL,
  `status` enum('aktif','suspend','inactive') NOT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`, `email`, `nohp`, `nim`, `status`, `foto`) VALUES
(3, 'ray', 'chi', 'Rio', 'rio.ae23@gmail.com', '', '', 'aktif', '64890530e550a.jpg'),
(4, 'zzz', 'kkk', 'xyz', '', '', '', 'aktif', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_pinjam`),
  ADD KEY `userFK` (`id_user`),
  ADD KEY `bookFK` (`id_buku`),
  ADD KEY `adminFK` (`id_pustakawan`);

--
-- Indexes for table `pustakawan`
--
ALTER TABLE `pustakawan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_pustakawan` (`username`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pustakawan`
--
ALTER TABLE `pustakawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `adminFK` FOREIGN KEY (`id_pustakawan`) REFERENCES `pustakawan` (`id`),
  ADD CONSTRAINT `bookFK` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id`),
  ADD CONSTRAINT `userFK` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
