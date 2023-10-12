-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2021 at 12:32 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `privat`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE `absen` (
  `id_absen` int(11) NOT NULL,
  `tanggal_absen` date DEFAULT NULL,
  `waktu_absen` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`id_absen`, `tanggal_absen`, `waktu_absen`) VALUES
(1, NULL, NULL),
(2, '2021-01-15', '20:00'),
(3, '2021-01-17', NULL),
(4, '2021-01-19', NULL),
(5, '2021-01-21', NULL),
(6, '2021-01-13', NULL),
(7, '2021-01-15', NULL),
(8, '2021-01-17', NULL),
(9, '2021-01-19', NULL),
(10, '2021-01-21', NULL),
(15, '2021-01-18', NULL),
(16, '2021-01-25', NULL),
(17, '2021-02-01', NULL),
(18, '2021-02-08', NULL),
(19, '2021-04-16', NULL),
(20, '2021-04-23', NULL),
(21, '2021-04-30', NULL),
(22, '2021-05-07', NULL),
(23, '2021-01-18', NULL),
(24, '2021-01-25', NULL),
(25, '2021-02-01', NULL),
(26, '2021-02-08', NULL),
(27, '2021-08-09', NULL),
(28, '2021-08-16', NULL),
(29, '2021-08-23', NULL),
(30, '2021-08-30', NULL),
(31, '2021-09-06', NULL),
(32, '2021-08-09', NULL),
(33, '2021-08-16', NULL),
(34, '2021-08-23', NULL),
(35, '2021-08-30', NULL),
(36, '2021-09-06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `email`, `userid`) VALUES
(1, 'admin les', 'admin@privat.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `agama`
--

CREATE TABLE `agama` (
  `id_agama` int(11) NOT NULL,
  `agama` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agama`
--

INSERT INTO `agama` (`id_agama`, `agama`) VALUES
(1, 'Islam'),
(2, 'Kristen Protestan'),
(3, 'Kristen Katolik'),
(4, 'Budha'),
(5, 'Hindu'),
(6, 'Konghucu');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id_bank` int(11) NOT NULL,
  `bank` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id_bank`, `bank`) VALUES
(1, 'BCA'),
(2, 'BNI'),
(3, 'BRI'),
(4, 'BTPN'),
(5, 'Mandiri'),
(6, 'Mandiri Syariah');

-- --------------------------------------------------------

--
-- Table structure for table `bidang`
--

CREATE TABLE `bidang` (
  `id_bidang` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_matpel` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bidang`
--

INSERT INTO `bidang` (`id_bidang`, `id_guru`, `id_matpel`, `created_at`, `status`) VALUES
(1, 3, 2, '2021-07-20 23:21:42', NULL),
(2, 3, 1, '2021-07-20 23:21:42', NULL),
(3, 3, 5, '2021-07-20 23:21:42', NULL),
(4, 4, 2, '2021-07-20 23:24:14', NULL),
(5, 4, 1, '2021-07-20 23:24:14', NULL),
(6, 5, 5, '2021-07-20 23:24:14', NULL),
(24, 5, 2, '2021-07-21 20:59:10', NULL),
(25, 5, 1, '2021-07-21 20:59:10', NULL),
(26, 5, 4, '2021-07-21 20:59:10', NULL),
(27, 6, 1, '2021-07-21 21:03:43', NULL),
(28, 6, 3, '2021-07-21 21:03:43', NULL),
(29, 7, 1, '2021-08-07 21:48:34', NULL),
(30, 7, 2, '2021-08-07 21:48:34', NULL),
(31, 8, 11, '2021-08-11 22:19:06', NULL),
(32, 8, 17, '2021-08-11 22:19:06', NULL),
(33, 8, 19, '2021-08-11 22:19:06', NULL),
(34, 8, 18, '2021-08-11 22:19:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `daftar_harga`
--

CREATE TABLE `daftar_harga` (
  `id_harga` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `id_mp` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `daftar_harga`
--

INSERT INTO `daftar_harga` (`id_harga`, `harga`, `id_mp`, `id_kelas`) VALUES
(1, 30000, 1, 1),
(2, 80000, 1, 2),
(3, 110000, 1, 3),
(4, 110000, 1, 4),
(5, 60000, 1, 5),
(6, 190000, 1, 6),
(7, 60000, 1, 7),
(8, 150000, 1, 8),
(9, 130000, 1, 9),
(10, 20000, 1, 10),
(11, 100000, 1, 11),
(12, 110000, 1, 12),
(13, 90000, 2, 1),
(14, 190000, 2, 2),
(15, 150000, 2, 3),
(16, 120000, 2, 4),
(17, 50000, 2, 5),
(18, 60000, 2, 6),
(19, 60000, 2, 7),
(20, 30000, 2, 8),
(21, 10000, 2, 9),
(22, 50000, 2, 10),
(23, 10000, 2, 11),
(24, 70000, 2, 12),
(25, 80000, 3, 1),
(26, 30000, 3, 2),
(27, 120000, 3, 3),
(28, 110000, 3, 4),
(29, 130000, 3, 5),
(30, 170000, 3, 6),
(31, 110000, 3, 7),
(32, 150000, 3, 8),
(33, 90000, 3, 9),
(34, 200000, 3, 10),
(35, 80000, 3, 11),
(36, 170000, 3, 12),
(37, 80000, 4, 1),
(38, 150000, 4, 2),
(39, 140000, 4, 3),
(40, 80000, 4, 4),
(41, 50000, 4, 5),
(42, 200000, 4, 6),
(43, 140000, 4, 7),
(44, 20000, 4, 8),
(45, 160000, 4, 9),
(46, 100000, 4, 10),
(47, 60000, 4, 11),
(48, 170000, 4, 12),
(49, 190000, 5, 1),
(50, 140000, 5, 2),
(51, 30000, 5, 3),
(52, 120000, 5, 4),
(53, 40000, 5, 5),
(54, 160000, 5, 6),
(55, 10000, 5, 7),
(56, 90000, 5, 8),
(57, 60000, 5, 9),
(58, 10000, 5, 10),
(59, 90000, 5, 11),
(60, 20000, 5, 12),
(61, 110000, 6, 1),
(62, 120000, 6, 2),
(63, 60000, 6, 3),
(64, 110000, 6, 4),
(65, 170000, 6, 5),
(66, 140000, 6, 6),
(67, 150000, 6, 7),
(68, 30000, 6, 8),
(69, 70000, 6, 9),
(70, 60000, 6, 10),
(71, 140000, 6, 11),
(72, 90000, 6, 12),
(73, 20000, 7, 1),
(74, 110000, 7, 2),
(75, 70000, 7, 3),
(76, 190000, 7, 4),
(77, 170000, 7, 5),
(78, 50000, 7, 6),
(79, 170000, 7, 7),
(80, 70000, 7, 8),
(81, 110000, 7, 9),
(82, 110000, 7, 10),
(83, 120000, 7, 11),
(84, 70000, 7, 12),
(85, 120000, 8, 1),
(86, 70000, 8, 2),
(87, 120000, 8, 3),
(88, 40000, 8, 4),
(89, 90000, 8, 5),
(90, 200000, 8, 6),
(91, 60000, 8, 7),
(92, 140000, 8, 8),
(93, 10000, 8, 9),
(94, 180000, 8, 10),
(95, 50000, 8, 11),
(96, 180000, 8, 12),
(97, 40000, 9, 1),
(98, 160000, 9, 2),
(99, 10000, 9, 3),
(100, 140000, 9, 4),
(101, 180000, 9, 5),
(102, 20000, 9, 6),
(103, 120000, 9, 7),
(104, 40000, 9, 8),
(105, 50000, 9, 9),
(106, 160000, 9, 10),
(107, 20000, 9, 11),
(108, 70000, 9, 12),
(109, 30000, 10, 1),
(110, 60000, 10, 2),
(111, 170000, 10, 3),
(112, 170000, 10, 4),
(113, 190000, 10, 5),
(114, 20000, 10, 6),
(115, 90000, 10, 7),
(116, 20000, 10, 8),
(117, 170000, 10, 9),
(118, 20000, 10, 10),
(119, 150000, 10, 11),
(120, 160000, 10, 12),
(121, 110000, 11, 1),
(122, 130000, 11, 2),
(123, 90000, 11, 3),
(124, 130000, 11, 4),
(125, 120000, 11, 5),
(126, 40000, 11, 6),
(127, 190000, 11, 7),
(128, 160000, 11, 8),
(129, 170000, 11, 9),
(130, 20000, 11, 10),
(131, 110000, 11, 11),
(132, 100000, 11, 12),
(133, 100000, 12, 1),
(134, 140000, 12, 2),
(135, 130000, 12, 3),
(136, 50000, 12, 4),
(137, 110000, 12, 5),
(138, 50000, 12, 6),
(139, 80000, 12, 7),
(140, 180000, 12, 8),
(141, 160000, 12, 9),
(142, 130000, 12, 10),
(143, 100000, 12, 11),
(144, 80000, 12, 12),
(145, 40000, 13, 1),
(146, 30000, 13, 2),
(147, 150000, 13, 3),
(148, 110000, 13, 4),
(149, 140000, 13, 5),
(150, 110000, 13, 6),
(151, 80000, 13, 7),
(152, 30000, 13, 8),
(153, 170000, 13, 9),
(154, 110000, 13, 10),
(155, 10000, 13, 11),
(156, 170000, 13, 12),
(157, 10000, 14, 1),
(158, 60000, 14, 2),
(159, 160000, 14, 3),
(160, 40000, 14, 4),
(161, 180000, 14, 5),
(162, 190000, 14, 6),
(163, 150000, 14, 7),
(164, 10000, 14, 8),
(165, 110000, 14, 9),
(166, 60000, 14, 10),
(167, 30000, 14, 11),
(168, 80000, 14, 12),
(169, 190000, 15, 1),
(170, 40000, 15, 2),
(171, 10000, 15, 3),
(172, 80000, 15, 4),
(173, 120000, 15, 5),
(174, 180000, 15, 6),
(175, 180000, 15, 7),
(176, 90000, 15, 8),
(177, 200000, 15, 9),
(178, 160000, 15, 10),
(179, 180000, 15, 11),
(180, 110000, 15, 12),
(181, 140000, 16, 1),
(182, 150000, 16, 2),
(183, 90000, 16, 3),
(184, 10000, 16, 4),
(185, 150000, 16, 5),
(186, 110000, 16, 6),
(187, 90000, 16, 7),
(188, 160000, 16, 8),
(189, 70000, 16, 9),
(190, 110000, 16, 10),
(191, 170000, 16, 11),
(192, 130000, 16, 12),
(193, 40000, 17, 1),
(194, 140000, 17, 2),
(195, 20000, 17, 3),
(196, 100000, 17, 4),
(197, 150000, 17, 5),
(198, 110000, 17, 6),
(199, 180000, 17, 7),
(200, 140000, 17, 8),
(201, 70000, 17, 9),
(202, 80000, 17, 10),
(203, 200000, 17, 11),
(204, 30000, 17, 12),
(205, 130000, 18, 1),
(206, 40000, 18, 2),
(207, 70000, 18, 3),
(208, 150000, 18, 4),
(209, 200000, 18, 5),
(210, 130000, 18, 6),
(211, 180000, 18, 7),
(212, 110000, 18, 8),
(213, 10000, 18, 9),
(214, 10000, 18, 10),
(215, 20000, 18, 11),
(216, 30000, 18, 12),
(217, 70000, 19, 1),
(218, 200000, 19, 2),
(219, 180000, 19, 3),
(220, 90000, 19, 4),
(221, 60000, 19, 5),
(222, 10000, 19, 6),
(223, 60000, 19, 7),
(224, 100000, 19, 8),
(225, 20000, 19, 9),
(226, 100000, 19, 10),
(227, 130000, 19, 11),
(228, 60000, 19, 12),
(229, 130000, 20, 1),
(230, 170000, 20, 2),
(231, 10000, 20, 3),
(232, 40000, 20, 4),
(233, 30000, 20, 5),
(234, 40000, 20, 6),
(235, 100000, 20, 7),
(236, 150000, 20, 8),
(237, 160000, 20, 9),
(238, 130000, 20, 10),
(239, 100000, 20, 11),
(240, 10000, 20, 12),
(241, 150000, 21, 1),
(242, 170000, 21, 2),
(243, 50000, 21, 3),
(244, 40000, 21, 4),
(245, 190000, 21, 5),
(246, 70000, 21, 6),
(247, 150000, 21, 7),
(248, 140000, 21, 8),
(249, 60000, 21, 9),
(250, 100000, 21, 10),
(251, 80000, 21, 11),
(252, 90000, 21, 12),
(253, 110000, 22, 1),
(254, 80000, 22, 2),
(255, 120000, 22, 3),
(256, 160000, 22, 4),
(257, 50000, 22, 5),
(258, 30000, 22, 6),
(259, 20000, 22, 7),
(260, 200000, 22, 8),
(261, 120000, 22, 9),
(262, 150000, 22, 10),
(263, 30000, 22, 11),
(264, 160000, 22, 12),
(265, 100000, 23, 1),
(266, 190000, 23, 2),
(267, 120000, 23, 3),
(268, 180000, 23, 4),
(269, 10000, 23, 5),
(270, 10000, 23, 6),
(271, 180000, 23, 7),
(272, 120000, 23, 8),
(273, 10000, 23, 9),
(274, 60000, 23, 10),
(275, 130000, 23, 11),
(276, 30000, 23, 12),
(277, 40000, 24, 1),
(278, 110000, 24, 2),
(279, 150000, 24, 3),
(280, 140000, 24, 4),
(281, 110000, 24, 5),
(282, 30000, 24, 6),
(283, 90000, 24, 7),
(284, 60000, 24, 8),
(285, 170000, 24, 9),
(286, 10000, 24, 10),
(287, 80000, 24, 11),
(288, 170000, 24, 12),
(289, 60000, 25, 1),
(290, 90000, 25, 2),
(291, 10000, 25, 3),
(292, 140000, 25, 4),
(293, 100000, 25, 5),
(294, 170000, 25, 6),
(295, 160000, 25, 7),
(296, 50000, 25, 8),
(297, 160000, 25, 9),
(298, 160000, 25, 10),
(299, 140000, 25, 11),
(300, 80000, 25, 12);

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `guru` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `foto` varchar(100) DEFAULT 'user.jpeg',
  `alamat` text NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(100) NOT NULL,
  `pendidikan_terakhir` int(11) DEFAULT NULL,
  `institusi` varchar(100) NOT NULL,
  `program_studi` varchar(100) NOT NULL,
  `ipk` float NOT NULL,
  `bidang_yang_dikuasai` int(11) DEFAULT NULL,
  `bidang_yang_dikuasai_2` int(11) DEFAULT NULL,
  `ktp` text DEFAULT NULL,
  `ijazah` text DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `bank` int(11) NOT NULL,
  `rekening` varchar(255) DEFAULT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `guru`, `no_hp`, `email`, `foto`, `alamat`, `tanggal_lahir`, `jenis_kelamin`, `pendidikan_terakhir`, `institusi`, `program_studi`, `ipk`, `bidang_yang_dikuasai`, `bidang_yang_dikuasai_2`, `ktp`, `ijazah`, `status`, `bank`, `rekening`, `userid`) VALUES
(1, 'Oliver', '082137244888', 'jmhdoaoe@gmail.com', 'asis1.png', 'asdas asd asdas d', '0000-00-00', 'Laki-laki', 6, 'Univ Telkom', 'Sistem Informasi', 3.55, 2, 1, NULL, NULL, NULL, 1, NULL, 4),
(2, 'Olober Sykes', '082137244888', 'adas@gmail.com', 'buleeet1.png', 'aaa', '2021-02-19', 'Laki-laki', 7, 'aaa', 'aaa', 3.55, 2, 2, NULL, NULL, NULL, 1, NULL, 7),
(5, 'Bahari Nusantara', '082137244805', 'mangkato2021@gmail.com', 'Screen_Shot_2021-06-13_at_2_41_22_PM3.png', 'Jalan Komplek Permata Buah Batu D 22', '0000-00-00', 'Laki-laki', 5, 'Univ Telkom', 'Sistem Informasi', 3.55, NULL, NULL, 'Screen_Shot_2021-06-13_at_10_45_53_AM.png', 'Screen_Shot_2021-06-19_at_2_18_47_PM1.png', 'Aprroved', 1, NULL, 12),
(6, 'Budi', '082137244805', 'default@gmail.com', 'Screen_Shot_2021-05-15_at_1_05_10_PM.png', 'Jalan Komplek Permata Buah Batu D 22', '1993-09-24', 'Laki-laki', 6, 'Univ Telkom', 'Sistem Informasi', 3.55, NULL, NULL, 'Screen_Shot_2021-06-13_at_10_45_53_AM1.png', 'Screen_Shot_2021-06-13_at_10_45_53_AM2.png', 'Approved', 1, NULL, 13),
(7, 'Juda Pratama', '085312127191', 'judapratama@gmail.com', 'resize-pas_1.jpg', 'Riau', '2000-07-28', 'Laki-laki', 6, 'ITB', 'FITB', 3.8, NULL, NULL, 'resize-pas_11.jpg', 'resize-pas_12.jpg', 'Approved', 1, '062182192093333', 14),
(8, 'Muhammad Haitsam', '082117503125', 'haitsam03@gmail.com', 'resize-pas_13.jpg', 'Jl. Raya Cilamaya', '1999-02-18', 'Laki-laki', 7, 'Universitas Padjadjaran', 'Agroteknologi', 3.8, NULL, NULL, 'DSC_0499_2.JPG', 'Belakang.jpg', 'Approved', 2, '062182192093333', 15);

-- --------------------------------------------------------

--
-- Table structure for table `hari`
--

CREATE TABLE `hari` (
  `id_hari` int(11) NOT NULL,
  `hari` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hari`
--

INSERT INTO `hari` (`id_hari`, `hari`) VALUES
(1, 'Senin'),
(2, 'Selasa'),
(3, 'Rabu'),
(4, 'Kamis'),
(5, 'Jumat'),
(6, 'Sabtu'),
(7, 'Minggu');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `pertemuan` int(11) NOT NULL,
  `tanggal_belajar` date NOT NULL,
  `waktu_belajar` varchar(10) NOT NULL,
  `tanggal_belajar_asli` date DEFAULT NULL,
  `waktu_asli` varchar(10) DEFAULT NULL,
  `status_jadwal` enum('Sesuai','Usulan Ganti','Ganti','Tidak Ganti') NOT NULL,
  `id_hari` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `id_absen` int(11) NOT NULL,
  `id_privat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `pertemuan`, `tanggal_belajar`, `waktu_belajar`, `tanggal_belajar_asli`, `waktu_asli`, `status_jadwal`, `id_hari`, `id_pesanan`, `id_absen`, `id_privat`) VALUES
(1, 1, '2021-08-23', '13:30', '2021-08-20', '13:30', 'Usulan Ganti', 1, 1, 1, 1),
(2, 2, '2021-01-15', '16:00', NULL, NULL, 'Sesuai', 1, 1, 2, 1),
(3, 3, '2021-01-17', '16:00', NULL, NULL, 'Sesuai', 1, 1, 3, 1),
(4, 4, '2021-01-19', '16:00', NULL, NULL, 'Sesuai', 1, 1, 4, 1),
(5, 5, '2021-01-21', '16:00', NULL, NULL, 'Sesuai', 1, 1, 5, 1),
(10, 1, '2021-08-20', '15:30', '2021-08-20', '15:30', 'Usulan Ganti', 1, 2, 15, 1),
(11, 2, '2021-01-15', '16:00', NULL, NULL, 'Sesuai', 1, 2, 16, 1),
(12, 3, '2021-01-17', '16:00', NULL, NULL, 'Sesuai', 1, 2, 17, 1),
(13, 4, '2021-01-21', '16:00', NULL, NULL, 'Sesuai', 1, 2, 18, 1),
(14, 1, '2021-04-16', '16:00', NULL, NULL, 'Sesuai', 2, 3, 19, 0),
(15, 2, '2021-04-23', '16:00', NULL, NULL, 'Sesuai', 2, 3, 20, 0),
(16, 3, '2021-04-30', '16:00', NULL, NULL, 'Sesuai', 2, 3, 21, 0),
(17, 4, '2021-05-07', '16:00', NULL, NULL, 'Sesuai', 2, 3, 22, 0),
(18, 1, '2021-08-09', '16:00', NULL, NULL, 'Sesuai', 2, 4, 27, 0),
(19, 2, '2021-08-16', '16:00', NULL, NULL, 'Sesuai', 2, 4, 28, 0),
(20, 3, '2021-08-23', '16:00', NULL, NULL, 'Sesuai', 2, 4, 29, 0),
(21, 4, '2021-08-30', '16:00', NULL, NULL, 'Sesuai', 2, 4, 30, 0),
(22, 5, '2021-09-06', '16:00', NULL, NULL, 'Sesuai', 2, 4, 31, 0),
(23, 1, '2021-08-09', '16:00', NULL, NULL, 'Sesuai', 2, 4, 32, 0),
(24, 2, '2021-08-16', '16:00', NULL, NULL, 'Sesuai', 2, 4, 33, 0),
(25, 3, '2021-08-23', '16:00', NULL, NULL, 'Sesuai', 2, 4, 34, 0),
(26, 4, '2021-08-30', '16:00', NULL, NULL, 'Sesuai', 2, 4, 35, 0),
(27, 5, '2021-09-06', '16:00', NULL, NULL, 'Sesuai', 2, 4, 36, 0);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `kelas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kelas`) VALUES
(1, 'I'),
(2, 'II'),
(3, 'III'),
(4, 'IV'),
(5, 'V'),
(6, 'VI'),
(7, 'VII'),
(8, 'VIII'),
(9, 'IX'),
(10, 'X'),
(11, 'XI'),
(12, 'XII');

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `id_mp` int(11) NOT NULL,
  `mata_pelajaran` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`id_mp`, `mata_pelajaran`) VALUES
(1, 'Bahasa Indonesia'),
(2, 'IPA'),
(3, 'IPS'),
(4, 'Bahasa Inggris'),
(5, 'Bahsa Daerah'),
(6, 'Bahasa Peminatan (Arab)'),
(7, 'Bahasa Peminatan (Jerman)'),
(8, 'Bahasa Peminatan (Jepang)'),
(9, 'Bahasa Peminatan (Mandarin)'),
(10, 'Pendidikan Pancasila dan Kewarganegaraan'),
(11, 'Matematika Wajib'),
(12, 'Prakarya dan Kewirausahaan'),
(13, 'Pendidikan Jasmani, Olahraga dan Keseharan'),
(14, 'Pendidikan Agama'),
(15, 'Sejarah Indonesia'),
(16, 'Seni Budaya dan Keterampilan'),
(17, 'Matematika (IPA)'),
(18, 'Teknologi Informasi dan Komunikasi'),
(19, 'Fisika (IPA)'),
(20, 'Kimia (IPA)'),
(21, 'Biologi (IPA)'),
(22, 'Sejarah (IPS)'),
(23, 'Sosiologi (IPS)'),
(24, 'Ekonomi (IPS)'),
(25, 'Geografi (IPS)'),
(26, 'Bahasa Peminatan (Spanyol)');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `nominal` float(14,2) NOT NULL,
  `bukti_transfer` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `status` varchar(128) NOT NULL,
  `status_keuangan` varchar(128) NOT NULL,
  `tanggal_upload` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pesanan`, `nominal`, `bukti_transfer`, `keterangan`, `status`, `status_keuangan`, `tanggal_upload`) VALUES
(1, 1, 650000.00, 'users_(1)1.png', 'Makasih', 'Valid', 'Belum diberikan', '2021-09-02 00:04:20');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id_pendidikan` int(11) NOT NULL,
  `pendidikan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`id_pendidikan`, `pendidikan`) VALUES
(1, 'Tidak/Belum Tamat SD'),
(2, 'Tamat SD/Sederajat'),
(3, 'Tamat SLTP/Sederajat'),
(4, 'Tamat SLTA/Sederajat'),
(5, 'Tamat D1/D2'),
(6, 'Tamat Akademi/D3'),
(7, 'Tamat D4/S1'),
(8, 'Tamat S2'),
(9, 'Tamat S3');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `kode_pesanan` varchar(100) NOT NULL,
  `tanggal_pesanan` timestamp NOT NULL DEFAULT current_timestamp(),
  `waktu` varchar(100) DEFAULT NULL,
  `tanggal_mulai_belajar` date NOT NULL,
  `jumlah_siswa` int(11) NOT NULL,
  `jumlah_pertemuan` int(11) NOT NULL,
  `foto_pembayaran` varchar(255) DEFAULT NULL,
  `deskripsi` text NOT NULL,
  `metode_pembayaran` enum('Transfer','Cash') NOT NULL,
  `status_pesanan` enum('Guru Belum Konfirmasi','Terima','Tolak','') NOT NULL,
  `status_pembayaran` varchar(128) NOT NULL,
  `id_mp` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_hari` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_harga` int(11) NOT NULL,
  `is_created` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `kode_pesanan`, `tanggal_pesanan`, `waktu`, `tanggal_mulai_belajar`, `jumlah_siswa`, `jumlah_pertemuan`, `foto_pembayaran`, `deskripsi`, `metode_pembayaran`, `status_pesanan`, `status_pembayaran`, `id_mp`, `id_kelas`, `id_hari`, `id_siswa`, `id_guru`, `id_harga`, `is_created`) VALUES
(1, '20210103031351', '2021-01-02 20:13:51', NULL, '2021-01-11', 2, 5, 'Logo.jpg', 'sadasd asdas', 'Transfer', 'Terima', 'Belum konfirmasi', 1, 6, 1, 1, 1, 9, 1),
(2, '20210131070158', '2021-01-31 12:01:58', NULL, '2021-01-11', 2, 4, NULL, 'oi', 'Cash', 'Terima', 'Sudah konfirmasi', 1, 6, 1, 2, 1, 9, 1),
(3, '20210401111800', '2021-04-01 04:18:00', NULL, '2021-04-09', 1, 4, 'Picture1.png', 'asdasdsd', 'Transfer', 'Terima', 'Sudah konfirmasi', 1, 5, 2, 1, 1, 8, 1),
(4, '20210726095819', '2021-07-26 14:58:19', NULL, '2021-08-02', 2, 5, '1623550172_pengumumansbmptnutama.jpeg', 'asdasdasd asd asd', 'Transfer', 'Terima', 'Sudah konfirmasi', 1, 4, 2, 1, 5, 13, 1),
(5, '20210815093451', '2021-08-15 14:34:51', NULL, '2021-08-28', 2, 7, NULL, 'OKE', 'Cash', 'Guru Belum Konfirmasi', 'Belum bayar', 2, 6, 2, 1, 5, 19, 1),
(6, '20210830011629', '2021-08-30 06:16:29', NULL, '2021-08-20', 1, 4, NULL, 'ok', 'Cash', 'Guru Belum Konfirmasi', 'Belum bayar', 2, 3, 2, 1, 5, 16, 0),
(7, '20210901041447', '2021-09-01 09:14:47', NULL, '2021-09-11', 2, 7, NULL, 'Makasih', 'Transfer', 'Guru Belum Konfirmasi', 'Belum bayar', 3, 9, 5, 1, 6, 201, 0),
(8, '20210903051910', '2021-09-02 22:19:10', NULL, '2021-09-25', 3, 11, NULL, 'tq', 'Transfer', 'Guru Belum Konfirmasi', 'Belum bayar', 3, 9, 3, 1, 6, 21, 0);

-- --------------------------------------------------------

--
-- Table structure for table `privat`
--

CREATE TABLE `privat` (
  `id_privat` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_mp` int(11) NOT NULL,
  `kapasitas` int(11) NOT NULL,
  `is_full` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `privat`
--

INSERT INTO `privat` (`id_privat`, `id_kelas`, `id_guru`, `id_mp`, `kapasitas`, `is_full`) VALUES
(1, 6, 1, 1, 2, 1),
(2, 4, 5, 1, 2, 0),
(3, 5, 1, 1, 1, 1),
(4, 6, 5, 2, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `privat_pesanan`
--

CREATE TABLE `privat_pesanan` (
  `id_privat_pesanan` int(11) NOT NULL,
  `id_privat` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `privat_pesanan`
--

INSERT INTO `privat_pesanan` (`id_privat_pesanan`, `id_privat`, `id_pesanan`) VALUES
(2, 1, 1),
(5, 1, 2),
(6, 2, 4),
(7, 3, 3),
(8, 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `siswa` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `kode_pos` varchar(10) DEFAULT NULL,
  `foto` varchar(100) DEFAULT 'user.jpeg',
  `alamat` text DEFAULT NULL,
  `jenis_kelamin` varchar(100) DEFAULT NULL,
  `tingkat` varchar(100) NOT NULL,
  `asal_sekolah` varchar(100) DEFAULT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `siswa`, `no_hp`, `email`, `kode_pos`, `foto`, `alamat`, `jenis_kelamin`, `tingkat`, `asal_sekolah`, `userid`) VALUES
(1, 'Jumahid Habib', '082137244888', 'jumahid@gmail.com', NULL, 'sign-up.png', NULL, 'Laki-laki', 'SMA', 'SMAN 2 Wonosari', 5),
(2, 'Frank Robert', '082137244888', 'jmhd@gmail.com', NULL, 'sign-up.png', NULL, 'Laki-laki', 'SMA', 'SMAN 2 Wonosari', 8);

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

CREATE TABLE `testimoni` (
  `id_testimoni` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `testimoni` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `testimoni`
--

INSERT INTO `testimoni` (`id_testimoni`, `id_siswa`, `id_pesanan`, `rating`, `testimoni`, `date`) VALUES
(1, 1, 1, 4, 'Bagus sangat membantu saya dalam belajar', '2021-04-22 17:10:22');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` enum('1','2','3','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '1'),
(4, 'oliver@gmail.com', '86dd55229128fd39981a8e19d2026386', '2'),
(5, 'jordan@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '3'),
(7, 'adas@gmail.com', '86dd55229128fd39981a8e19d2026386', '2'),
(8, 'jmhd@gmail.com', '86dd55229128fd39981a8e19d2026386', '3'),
(12, 'mangkato2021@gmail.com', '9b9809a858f0ee0ce3b613a58bf7fa50', '2'),
(13, 'default@gmail.com', '91f376c4b36912e5075b6170d312eab5', '2'),
(14, 'judapratama@gmail.com', 'd6e05d620e3645915b80431ca7f4f18c', '2'),
(15, 'haitsam03@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`id_agama`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `bidang`
--
ALTER TABLE `bidang`
  ADD PRIMARY KEY (`id_bidang`);

--
-- Indexes for table `daftar_harga`
--
ALTER TABLE `daftar_harga`
  ADD PRIMARY KEY (`id_harga`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `hari`
--
ALTER TABLE `hari`
  ADD PRIMARY KEY (`id_hari`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`id_mp`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id_pendidikan`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `privat`
--
ALTER TABLE `privat`
  ADD PRIMARY KEY (`id_privat`);

--
-- Indexes for table `privat_pesanan`
--
ALTER TABLE `privat_pesanan`
  ADD PRIMARY KEY (`id_privat_pesanan`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id_testimoni`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen`
--
ALTER TABLE `absen`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `agama`
--
ALTER TABLE `agama`
  MODIFY `id_agama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id_bank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bidang`
--
ALTER TABLE `bidang`
  MODIFY `id_bidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `daftar_harga`
--
ALTER TABLE `daftar_harga`
  MODIFY `id_harga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=301;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `hari`
--
ALTER TABLE `hari`
  MODIFY `id_hari` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `id_mp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `privat`
--
ALTER TABLE `privat`
  MODIFY `id_privat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `privat_pesanan`
--
ALTER TABLE `privat_pesanan`
  MODIFY `id_privat_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id_testimoni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
