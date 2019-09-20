-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2019 at 09:11 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pkl`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(5) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idadmin`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'guru', 'gurualmunar');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `idguru` int(5) NOT NULL,
  `namaguru` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`idguru`, `namaguru`) VALUES
(1, 'Widya'),
(2, 'Sarah');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kelas` varchar(10) NOT NULL,
  `idguru` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kelas`, `idguru`) VALUES
('Reguler', 1),
('Terpadu', 2);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `idsiswa` int(11) NOT NULL,
  `nds` varchar(8) DEFAULT NULL,
  `namasiswa` varchar(30) DEFAULT NULL,
  `jeniskelamin` varchar(10) NOT NULL,
  `kelas` varchar(10) DEFAULT NULL,
  `tahunajaran` varchar(10) NOT NULL,
  `biaya` int(20) DEFAULT NULL,
  `sumbangan` int(20) NOT NULL,
  `tempat` varchar(20) NOT NULL,
  `ttl` date NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`idsiswa`, `nds`, `namasiswa`, `jeniskelamin`, `kelas`, `tahunajaran`, `biaya`, `sumbangan`, `tempat`, `ttl`, `alamat`) VALUES
(1, '20190001', 'Amelia sri', 'perempuan', 'Terpadu', '2019', 110000, 0, 'Bandung', '2015-01-13', 'Gedebage'),
(2, '20190002', 'Bingah', 'laki-laki', 'Terpadu', '2019', 110000, 0, 'Bandung', '2015-12-10', 'Margahayu'),
(3, '20190003', 'Indri', 'perempuan', 'Reguler', '2019', 75000, 0, 'Bandung', '2015-11-09', 'Gedebage'),
(4, '20190004', 'ade', 'laki-laki', 'Reguler', '2019', 110000, 0, 'Bandung', '2015-02-03', 'Margahayu'),
(5, '20190005', 'dolas', 'laki-laki', 'Reguler', '2019', 190, 0, 'Bantar Gebang', '2019-09-05', 'Bantar Gebang'),
(6, '20190006', 'sejati', 'laki-laki', 'Reguler', '2019', 75000, 100000, 'Bantar Gebang', '1990-12-12', 'bandung'),
(7, '20190007', 'Andre Janah', 'laki-laki', 'Terpadu', '2019', 110000, 100000, 'New York', '1991-11-11', 'autralia'),
(8, '20190008', 'opangkers', 'laki-laki', 'Reguler', '2019', 75000, 100000, 'Cilacap', '1998-01-15', 'Jawa Timur'),
(9, '20190009', 'Devina', 'perempuan', 'Reguler', '2019', 110000, 20000, 'Asia', '2019-09-09', 'Cipacing'),
(10, '20190010', 'Sopian', 'laki-laki', 'Reguler', '2019', 75000, 100000, 'Turki', '1912-12-12', 'Dimana Wae'),
(11, '20190011', 'opangkers', 'laki-laki', 'Terpadu', '2019', 110000, 10000, 'Bandung', '1998-05-15', 'Bandung'),
(12, '20190012', 'Suju', 'perempuan', 'Terpadu', '2019', 110000, 500000, 'Asia', '2019-06-16', 'Uptown'),
(13, '20190013', 'codet', 'laki-laki', 'Reguler', '2019', 75000, 30000, 'Cimahi', '2017-07-17', 'Lembang'),
(14, '20190014', 'Hery dwi pryono', 'laki-laki', 'Reguler', '2019', 75000, 10000, 'Cilacap', '1998-05-15', 'Pusdai');

-- --------------------------------------------------------

--
-- Table structure for table `spp`
--

CREATE TABLE `spp` (
  `idspp` int(11) NOT NULL,
  `idsiswa` int(10) DEFAULT NULL,
  `jatuhtempo` date DEFAULT NULL,
  `bulan` varchar(20) DEFAULT NULL,
  `nobayar` varchar(6) DEFAULT NULL,
  `tglbayar` date DEFAULT NULL,
  `jumlah` int(20) DEFAULT NULL,
  `ket` varchar(20) DEFAULT NULL,
  `idadmin` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spp`
--

INSERT INTO `spp` (`idspp`, `idsiswa`, `jatuhtempo`, `bulan`, `nobayar`, `tglbayar`, `jumlah`, `ket`, `idadmin`) VALUES
(1, 1, '2018-07-10', 'Juli', NULL, NULL, 110000, NULL, NULL),
(2, 1, '2018-08-10', 'Agustus', NULL, NULL, 110000, NULL, NULL),
(3, 1, '2018-09-10', 'September', NULL, NULL, 110000, NULL, NULL),
(4, 1, '2018-10-10', 'Oktober', NULL, NULL, 110000, NULL, NULL),
(5, 1, '2018-11-10', 'November', NULL, NULL, 110000, NULL, NULL),
(6, 1, '2018-12-10', 'Desember', NULL, NULL, 110000, NULL, NULL),
(7, 1, '2019-01-10', 'Januari', NULL, NULL, 110000, NULL, NULL),
(8, 1, '2019-02-10', 'Februari', NULL, NULL, 110000, NULL, NULL),
(9, 1, '2019-03-10', 'Maret', NULL, NULL, 110000, NULL, NULL),
(10, 1, '2019-04-10', 'April', NULL, NULL, 110000, NULL, NULL),
(11, 1, '2019-05-10', 'Mei', NULL, NULL, 110000, NULL, NULL),
(12, 1, '2019-06-10', 'Juni', NULL, NULL, 110000, NULL, NULL),
(13, 2, '2018-07-10', 'Juli', NULL, NULL, 110000, 'BELUM LUNAS', NULL),
(14, 2, '2018-08-10', 'Agustus', NULL, NULL, 110000, 'BELUM LUNAS', NULL),
(15, 2, '2018-09-10', 'September', NULL, NULL, 110000, 'BELUM LUNAS', NULL),
(16, 2, '2018-10-10', 'Oktober', NULL, NULL, 110000, 'BELUM LUNAS', NULL),
(17, 2, '2018-11-10', 'November', NULL, NULL, 110000, 'BELUM LUNAS', NULL),
(18, 2, '2018-12-10', 'Desember', NULL, NULL, 110000, 'BELUM LUNAS', NULL),
(19, 2, '2019-01-10', 'Januari', NULL, NULL, 110000, 'BELUM LUNAS', NULL),
(20, 2, '2019-02-10', 'Februari', NULL, NULL, 110000, 'BELUM LUNAS', NULL),
(21, 2, '2019-03-10', 'Maret', NULL, NULL, 110000, 'BELUM LUNAS', NULL),
(22, 2, '2019-04-10', 'April', NULL, NULL, 110000, 'BELUM LUNAS', NULL),
(23, 2, '2019-05-10', 'Mei', NULL, NULL, 110000, 'BELUM LUNAS', NULL),
(24, 2, '2019-06-10', 'Juni', NULL, NULL, 110000, 'BELUM LUNAS', NULL),
(25, 3, '2018-07-10', 'Juli', '300253', '2019-01-13', 75000, 'LUNAS', 1),
(26, 3, '2018-08-10', 'Agustus', NULL, NULL, 75000, NULL, NULL),
(27, 3, '2018-09-10', 'September', NULL, NULL, 75000, NULL, NULL),
(28, 3, '2018-10-10', 'Oktober', '071796', '2019-01-13', 75000, 'LUNAS', 1),
(29, 3, '2018-11-10', 'November', NULL, NULL, 75000, NULL, NULL),
(30, 3, '2018-12-10', 'Desember', NULL, NULL, 75000, NULL, NULL),
(31, 3, '2019-01-10', 'Januari', NULL, NULL, 75000, NULL, NULL),
(32, 3, '2019-02-10', 'Februari', NULL, NULL, 75000, NULL, NULL),
(33, 3, '2019-03-10', 'Maret', NULL, NULL, 75000, NULL, NULL),
(34, 3, '2019-04-10', 'April', NULL, NULL, 75000, NULL, NULL),
(35, 3, '2019-05-10', 'Mei', NULL, NULL, 75000, NULL, NULL),
(36, 3, '2019-06-10', 'Juni', '323737', '2019-01-13', 75000, 'LUNAS', 1),
(37, 4, '2018-07-10', 'Juli', '599982', '2019-01-14', 110000, 'LUNAS', 1),
(38, 4, '2018-08-10', 'Agustus', NULL, NULL, 110000, NULL, NULL),
(39, 4, '2018-09-10', 'September', NULL, NULL, 110000, NULL, NULL),
(40, 4, '2018-10-10', 'Oktober', NULL, NULL, 110000, NULL, NULL),
(41, 4, '2018-11-10', 'November', NULL, NULL, 110000, NULL, NULL),
(42, 4, '2018-12-10', 'Desember', NULL, NULL, 110000, NULL, NULL),
(43, 4, '2019-01-10', 'Januari', NULL, NULL, 110000, NULL, NULL),
(44, 4, '2019-02-10', 'Februari', NULL, NULL, 110000, NULL, NULL),
(45, 4, '2019-03-10', 'Maret', NULL, NULL, 110000, NULL, NULL),
(46, 4, '2019-04-10', 'April', NULL, NULL, 110000, NULL, NULL),
(47, 4, '2019-05-10', 'Mei', NULL, NULL, 110000, NULL, NULL),
(48, 4, '2019-06-10', 'Juni', NULL, NULL, 110000, NULL, NULL),
(49, 5, '2018-07-10', 'Juli', NULL, NULL, 190, NULL, NULL),
(50, 5, '2018-08-10', 'Agustus', NULL, NULL, 190, NULL, NULL),
(51, 5, '2018-09-10', 'September', NULL, NULL, 190, NULL, NULL),
(52, 5, '2018-10-10', 'Oktober', NULL, NULL, 190, NULL, NULL),
(53, 5, '2018-11-10', 'November', NULL, NULL, 190, NULL, NULL),
(54, 5, '2018-12-10', 'Desember', NULL, NULL, 190, NULL, NULL),
(55, 5, '2019-01-10', 'Januari', NULL, NULL, 190, NULL, NULL),
(56, 5, '2019-02-10', 'Februari', NULL, NULL, 190, NULL, NULL),
(57, 5, '2019-03-10', 'Maret', NULL, NULL, 190, NULL, NULL),
(58, 5, '2019-04-10', 'April', NULL, NULL, 190, NULL, NULL),
(59, 5, '2019-05-10', 'Mei', NULL, NULL, 190, NULL, NULL),
(60, 5, '2019-06-10', 'Juni', NULL, NULL, 190, NULL, NULL),
(61, 6, '2018-07-10', 'Juli', NULL, NULL, 75000, NULL, NULL),
(62, 6, '2018-08-10', 'Agustus', NULL, NULL, 75000, NULL, NULL),
(63, 6, '2018-09-10', 'September', NULL, NULL, 75000, NULL, NULL),
(64, 6, '2018-10-10', 'Oktober', NULL, NULL, 75000, NULL, NULL),
(65, 6, '2018-11-10', 'November', NULL, NULL, 75000, NULL, NULL),
(66, 6, '2018-12-10', 'Desember', NULL, NULL, 75000, NULL, NULL),
(67, 6, '2019-01-10', 'Januari', NULL, NULL, 75000, NULL, NULL),
(68, 6, '2019-02-10', 'Februari', NULL, NULL, 75000, NULL, NULL),
(69, 6, '2019-03-10', 'Maret', NULL, NULL, 75000, NULL, NULL),
(70, 6, '2019-04-10', 'April', NULL, NULL, 75000, NULL, NULL),
(71, 6, '2019-05-10', 'Mei', NULL, NULL, 75000, NULL, NULL),
(72, 6, '2019-06-10', 'Juni', NULL, NULL, 75000, NULL, NULL),
(73, 7, '2019-07-10', 'Juli', NULL, NULL, 110000, 'BELUM LUNAS', NULL),
(74, 7, '2019-08-10', 'Agustus', NULL, NULL, 110000, 'BELUM LUNAS', NULL),
(75, 7, '2019-09-10', 'September', NULL, NULL, 110000, NULL, NULL),
(76, 7, '2019-10-10', 'Oktober', NULL, NULL, 110000, NULL, NULL),
(77, 7, '2019-11-10', 'November', NULL, NULL, 110000, NULL, NULL),
(78, 7, '2019-12-10', 'Desember', NULL, NULL, 110000, NULL, NULL),
(79, 7, '2020-01-10', 'Januari', NULL, NULL, 110000, NULL, NULL),
(80, 7, '2020-02-10', 'Februari', NULL, NULL, 110000, NULL, NULL),
(81, 7, '2020-03-10', 'Maret', NULL, NULL, 110000, NULL, NULL),
(82, 7, '2020-04-10', 'April', NULL, NULL, 110000, NULL, NULL),
(83, 7, '2020-05-10', 'Mei', NULL, NULL, 110000, NULL, NULL),
(84, 7, '2020-06-10', 'Juni', NULL, NULL, 110000, NULL, NULL),
(85, 8, '2019-07-10', 'Juli', '846037', '2019-09-19', 75000, 'LUNAS', 1),
(86, 8, '2019-08-10', 'Agustus', NULL, NULL, 75000, 'BELUM LUNAS', NULL),
(87, 8, '2019-09-10', 'September', NULL, NULL, 75000, 'BELUM LUNAS', NULL),
(88, 8, '2019-10-10', 'Oktober', NULL, NULL, 75000, 'BELUM LUNAS', NULL),
(89, 8, '2019-11-10', 'November', NULL, NULL, 75000, 'BELUM LUNAS', NULL),
(90, 8, '2019-12-10', 'Desember', NULL, NULL, 75000, 'BELUM LUNAS', NULL),
(91, 8, '2020-01-10', 'Januari', NULL, NULL, 75000, 'BELUM LUNAS', NULL),
(92, 8, '2020-02-10', 'Februari', NULL, NULL, 75000, 'BELUM LUNAS', NULL),
(93, 8, '2020-03-10', 'Maret', NULL, NULL, 75000, 'BELUM LUNAS', NULL),
(94, 8, '2020-04-10', 'April', NULL, NULL, 75000, 'BELUM LUNAS', NULL),
(95, 8, '2020-05-10', 'Mei', NULL, NULL, 75000, 'BELUM LUNAS', NULL),
(96, 8, '2020-06-10', 'Juni', NULL, NULL, 75000, 'BELUM LUNAS', NULL),
(97, 9, '2019-07-10', 'Juli', NULL, NULL, 110000, NULL, NULL),
(98, 9, '2019-08-10', 'Agustus', NULL, NULL, 110000, NULL, NULL),
(99, 9, '2019-09-10', 'September', NULL, NULL, 110000, NULL, NULL),
(100, 9, '2019-10-10', 'Oktober', NULL, NULL, 110000, NULL, NULL),
(101, 9, '2019-11-10', 'November', NULL, NULL, 110000, NULL, NULL),
(102, 9, '2019-12-10', 'Desember', NULL, NULL, 110000, NULL, NULL),
(103, 9, '2020-01-10', 'Januari', NULL, NULL, 110000, NULL, NULL),
(104, 9, '2020-02-10', 'Februari', NULL, NULL, 110000, NULL, NULL),
(105, 9, '2020-03-10', 'Maret', NULL, NULL, 110000, NULL, NULL),
(106, 9, '2020-04-10', 'April', NULL, NULL, 110000, NULL, NULL),
(107, 9, '2020-05-10', 'Mei', NULL, NULL, 110000, NULL, NULL),
(108, 9, '2020-06-10', 'Juni', NULL, NULL, 110000, NULL, NULL),
(109, 10, '2019-07-10', 'Juli', NULL, NULL, 75000, NULL, NULL),
(110, 10, '2019-08-10', 'Agustus', NULL, NULL, 75000, NULL, NULL),
(111, 10, '2019-09-10', 'September', NULL, NULL, 75000, NULL, NULL),
(112, 10, '2019-10-10', 'Oktober', NULL, NULL, 75000, NULL, NULL),
(113, 10, '2019-11-10', 'November', NULL, NULL, 75000, NULL, NULL),
(114, 10, '2019-12-10', 'Desember', NULL, NULL, 75000, NULL, NULL),
(115, 10, '2020-01-10', 'Januari', NULL, NULL, 75000, NULL, NULL),
(116, 10, '2020-02-10', 'Februari', NULL, NULL, 75000, NULL, NULL),
(117, 10, '2020-03-10', 'Maret', NULL, NULL, 75000, NULL, NULL),
(118, 10, '2020-04-10', 'April', NULL, NULL, 75000, NULL, NULL),
(119, 10, '2020-05-10', 'Mei', NULL, NULL, 75000, NULL, NULL),
(120, 10, '2020-06-10', 'Juni', NULL, NULL, 75000, NULL, NULL),
(121, 11, '2019-07-10', 'Juli', NULL, NULL, 110000, 'BELUM LUNAS', NULL),
(122, 11, '2019-08-10', 'Agustus', NULL, NULL, 110000, 'BELUM LUNAS', NULL),
(123, 11, '2019-09-10', 'September', NULL, NULL, 110000, 'BELUM LUNAS', NULL),
(124, 11, '2019-10-10', 'Oktober', NULL, NULL, 110000, 'BELUM LUNAS', NULL),
(125, 11, '2019-11-10', 'November', NULL, NULL, 110000, NULL, NULL),
(126, 11, '2019-12-10', 'Desember', NULL, NULL, 110000, NULL, NULL),
(127, 11, '2020-01-10', 'Januari', NULL, NULL, 110000, NULL, NULL),
(128, 11, '2020-02-10', 'Februari', NULL, NULL, 110000, NULL, NULL),
(129, 11, '2020-03-10', 'Maret', NULL, NULL, 110000, NULL, NULL),
(130, 11, '2020-04-10', 'April', NULL, NULL, 110000, NULL, NULL),
(131, 11, '2020-05-10', 'Mei', NULL, NULL, 110000, NULL, NULL),
(132, 11, '2020-06-10', 'Juni', NULL, NULL, 110000, NULL, NULL),
(133, 12, '2019-07-10', 'Juli', NULL, NULL, 110000, 'BELUM LUNAS', NULL),
(134, 12, '2019-08-10', 'Agustus', NULL, NULL, 110000, 'BELUM LUNAS', NULL),
(135, 12, '2019-09-10', 'September', NULL, NULL, 110000, 'BELUM LUNAS', NULL),
(136, 12, '2019-10-10', 'Oktober', NULL, NULL, 110000, 'BELUM LUNAS', NULL),
(137, 12, '2019-11-10', 'November', NULL, NULL, 110000, NULL, NULL),
(138, 12, '2019-12-10', 'Desember', NULL, NULL, 110000, NULL, NULL),
(139, 12, '2020-01-10', 'Januari', NULL, NULL, 110000, NULL, NULL),
(140, 12, '2020-02-10', 'Februari', NULL, NULL, 110000, NULL, NULL),
(141, 12, '2020-03-10', 'Maret', NULL, NULL, 110000, NULL, NULL),
(142, 12, '2020-04-10', 'April', NULL, NULL, 110000, NULL, NULL),
(143, 12, '2020-05-10', 'Mei', NULL, NULL, 110000, NULL, NULL),
(144, 12, '2020-06-10', 'Juni', NULL, NULL, 110000, NULL, NULL),
(145, 13, '2019-07-10', 'Juli', NULL, NULL, 75000, NULL, NULL),
(146, 13, '2019-08-10', 'Agustus', NULL, NULL, 75000, NULL, NULL),
(147, 13, '2019-09-10', 'September', '000740', '2019-09-20', 75000, 'LUNAS', 1),
(148, 13, '2019-10-10', 'Oktober', NULL, NULL, 75000, NULL, NULL),
(149, 13, '2019-11-10', 'November', NULL, NULL, 75000, NULL, NULL),
(150, 13, '2019-12-10', 'Desember', NULL, NULL, 75000, NULL, NULL),
(151, 13, '2020-01-10', 'Januari', NULL, NULL, 75000, NULL, NULL),
(152, 13, '2020-02-10', 'Februari', NULL, NULL, 75000, NULL, NULL),
(153, 13, '2020-03-10', 'Maret', NULL, NULL, 75000, NULL, NULL),
(154, 13, '2020-04-10', 'April', NULL, NULL, 75000, NULL, NULL),
(155, 13, '2020-05-10', 'Mei', NULL, NULL, 75000, NULL, NULL),
(156, 13, '2020-06-10', 'Juni', NULL, NULL, 75000, NULL, NULL),
(157, 14, '2019-07-10', 'Juli', '207056', '2019-09-20', 75000, 'LUNAS', 1),
(158, 14, '2019-08-10', 'Agustus', NULL, NULL, 75000, 'BELUM LUNAS', NULL),
(159, 14, '2019-09-10', 'September', NULL, NULL, 75000, 'BELUM LUNAS', NULL),
(160, 14, '2019-10-10', 'Oktober', NULL, NULL, 75000, 'BELUM LUNAS', NULL),
(161, 14, '2019-11-10', 'November', NULL, NULL, 75000, 'BELUM LUNAS', NULL),
(162, 14, '2019-12-10', 'Desember', NULL, NULL, 75000, 'BELUM LUNAS', NULL),
(163, 14, '2020-01-10', 'Januari', NULL, NULL, 75000, 'BELUM LUNAS', NULL),
(164, 14, '2020-02-10', 'Februari', NULL, NULL, 75000, 'BELUM LUNAS', NULL),
(165, 14, '2020-03-10', 'Maret', NULL, NULL, 75000, 'BELUM LUNAS', NULL),
(166, 14, '2020-04-10', 'April', NULL, NULL, 75000, 'BELUM LUNAS', NULL),
(167, 14, '2020-05-10', 'Mei', NULL, NULL, 75000, 'BELUM LUNAS', NULL),
(168, 14, '2020-06-10', 'Juni', NULL, NULL, 75000, 'BELUM LUNAS', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`idguru`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kelas`),
  ADD KEY `fk_guru` (`idguru`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`idsiswa`),
  ADD UNIQUE KEY `nds` (`nds`),
  ADD KEY `fk_kelas` (`kelas`);

--
-- Indexes for table `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`idspp`),
  ADD KEY `fk_admin` (`idadmin`),
  ADD KEY `fk_siswa` (`idsiswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `idguru` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `idsiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `spp`
--
ALTER TABLE `spp`
  MODIFY `idspp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `fk_guru` FOREIGN KEY (`idguru`) REFERENCES `guru` (`idguru`) ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `fk_kelas` FOREIGN KEY (`kelas`) REFERENCES `kelas` (`kelas`) ON UPDATE CASCADE;

--
-- Constraints for table `spp`
--
ALTER TABLE `spp`
  ADD CONSTRAINT `fk_admin` FOREIGN KEY (`idadmin`) REFERENCES `admin` (`idadmin`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_siswa` FOREIGN KEY (`idsiswa`) REFERENCES `siswa` (`idsiswa`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
