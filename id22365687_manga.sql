-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 26, 2024 at 03:02 PM
-- Server version: 10.5.20-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id22365687_manga`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `idbuku` int(10) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `penulis` varchar(45) NOT NULL,
  `cover` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`idbuku`, `judul`, `penulis`, `cover`) VALUES
(17, 'Divine', 'Add', 'https://cover.komiku.id/wp-content/uploads/2024/04/A2-I-Scared-the-Divine-Lord-as-I-handed-over-the-Ancient-Immortal-Pill.jpg?w=225&quality=60'),
(20, 'Naruto Vol. 54', 'Riski', 'https://comicvine.gamespot.com/a/uploads/scale_large/6/67663/3232134-54.jpg'),
(21, 'Doraemon Vol. undefined', 'Fujiko', 'https://static.mangafire.to/i/4/47/47450db8eac78ef73f88c24fa50d847b.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `idmember` int(10) UNSIGNED ZEROFILL NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(20) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`idmember`, `email`, `password`, `username`, `role`) VALUES
(0000000030, 'test@example.com', 'test@example.com', 'test@example.com', 'member'),
(0000000031, 'admin@gmail.com', 'admin@gmail.com', 'admin', 'admin'),
(0000000032, 'member@member.com', 'member', 'member', 'member'),
(0000000033, 'furina@example.com', 'furina', 'Furina', 'member'),
(0000000034, 'abdul@abdul.com', 'abdul', 'abdul', 'member'),
(0000000035, 'abdul@ayam.com', 'YWJkdWwxMzMxa2xkcwo=', 'abdul', 'member'),
(0000000036, 'roger@gmail.com', 'roger', 'roger', 'member'),
(0000000037, 'miaw@gmail.com', '123', 'miaw', 'member'),
(0000000038, 'fadfad@gmail.com', 'aaaaa', 'FadQ', 'member'),
(0000000039, 'coba@gmail.com', 'coba@gmail.com', 'FadQ', 'member'),
(0000000040, 'zeuz@gmail.com', '123', 'zeuzgacor', 'member'),
(0000000041, 'fadfad@gmail.com', 'aaaaa', 'fad', 'member'),
(0000000042, 'admin@ums.ac.id', 'admin', 'Admin', 'member');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `member_idmember` int(10) UNSIGNED ZEROFILL NOT NULL,
  `buku_idbuku` int(10) UNSIGNED NOT NULL,
  `waktumeminjam` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`member_idmember`, `buku_idbuku`, `waktumeminjam`) VALUES
(0000000031, 17, '2024-06-26 14:52:58'),
(0000000031, 21, '2024-06-26 02:39:43');

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `member_idmember` int(10) UNSIGNED ZEROFILL NOT NULL,
  `buku_idbuku` int(10) UNSIGNED NOT NULL,
  `tanggalpengembalian` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pengembalian`
--

INSERT INTO `pengembalian` (`member_idmember`, `buku_idbuku`, `tanggalpengembalian`) VALUES
(0000000031, 17, '2024-06-26 00:15:59'),
(0000000031, 20, '2024-06-26 14:53:42'),
(0000000036, 17, '2024-06-25 21:18:51'),
(0000000038, 17, '2024-06-26 02:21:50'),
(0000000038, 21, '2024-06-26 02:20:34'),
(0000000040, 17, '2024-06-26 02:13:27'),
(0000000040, 20, '2024-06-26 02:21:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`idbuku`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`idmember`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`member_idmember`,`buku_idbuku`),
  ADD KEY `member_has_buku_FKIndex1` (`member_idmember`),
  ADD KEY `member_has_buku_FKIndex2` (`buku_idbuku`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`member_idmember`,`buku_idbuku`),
  ADD KEY `member_has_buku_FKIndex1` (`member_idmember`),
  ADD KEY `member_has_buku_FKIndex2` (`buku_idbuku`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `idbuku` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `idmember` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`member_idmember`) REFERENCES `member` (`idmember`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`buku_idbuku`) REFERENCES `buku` (`idbuku`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD CONSTRAINT `pengembalian_ibfk_1` FOREIGN KEY (`member_idmember`) REFERENCES `member` (`idmember`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengembalian_ibfk_2` FOREIGN KEY (`buku_idbuku`) REFERENCES `buku` (`idbuku`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
