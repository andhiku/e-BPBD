-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 29, 2019 at 12:57 AM
-- Server version: 5.6.13
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bpbd`
--
CREATE DATABASE IF NOT EXISTS `bpbd` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bpbd`;

-- --------------------------------------------------------

--
-- Table structure for table `tb_bencana`
--

CREATE TABLE IF NOT EXISTS `tb_bencana` (
  `id_bencana` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `waktu` time NOT NULL,
  `tanggal` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `id_desa` int(11) NOT NULL,
  `luas` text NOT NULL,
  `sebab` varchar(50) NOT NULL,
  `kk` int(5) NOT NULL,
  `jiwa` int(5) NOT NULL,
  `rusak_ringan` int(5) NOT NULL,
  `rusak_sedang` int(5) NOT NULL,
  `rusak_berat` int(5) NOT NULL,
  `f_pendidikan` int(5) NOT NULL,
  `f_peribadatan` int(5) NOT NULL,
  `f_kesehatan` int(5) NOT NULL,
  `kerugian` varchar(50) NOT NULL DEFAULT '0',
  `id_tim` varchar(50) NOT NULL,
  `ket` text,
  PRIMARY KEY (`id_bencana`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_bencana`
--

INSERT INTO `tb_bencana` (`id_bencana`, `id_jenis`, `waktu`, `tanggal`, `alamat`, `id_kecamatan`, `id_desa`, `luas`, `sebab`, `kk`, `jiwa`, `rusak_ringan`, `rusak_sedang`, `rusak_berat`, `f_pendidikan`, `f_peribadatan`, `f_kesehatan`, `kerugian`, `id_tim`, `ket`) VALUES
(1, 3, '14:59:00', '2018-01-06', 'Jl. danau cermin', 2, 6, '1.2', 'Angin Puting Beliung', 1, 0, 0, 0, 0, 0, 0, 0, '1400000000', '1,2,5', ''),
(2, 1, '15:55:00', '2018-12-28', 'Jl. Purnawirawan', 3, 11, '5', 'Pembakaran Lahan', 0, 2, 0, 0, 0, 0, 0, 0, '1000000', '1,4', ''),
(3, 2, '01:01:00', '2019-01-06', 'Jl. A. Yani', 2, 5, '6', 'Kebakaran', 0, 0, 3, 0, 0, 0, 0, 0, '1100000000000000', '1,6,7', ''),
(4, 1, '01:01:00', '2019-01-07', 'Jl. Agus Salim', 1, 3, '1.5', 'Pembakaran Lahan', 0, 0, 0, 4, 0, 0, 0, 1, '11000000000', '1,2,3,4', ''),
(5, 2, '11:11:00', '2019-01-08', 'Jl. Imam Bonjol', 2, 6, '1.2', 'Kebakaran', 0, 0, 5, 0, 0, 0, 9, 0, '100000000', '1,2,3,5', ''),
(6, 6, '11:11:00', '2019-01-09', 'Jl. Bahari', 3, 12, '15', 'Kejadian Alam', 0, 0, 0, 6, 0, 0, 0, 0, '10000000000', '1,2,3', ''),
(7, 7, '02:01:00', '2019-01-09', 'Jl. Ulin Utara 3', 1, 2, '124', 'Kejadian Alam', 0, 0, 0, 0, 0, 7, 0, 0, '1234', '2,3,7', ''),
(8, 7, '01:03:00', '2019-01-09', 'Jl. Ulin Utara 1', 2, 5, '123', 'Kejadian Alam', 0, 0, 0, 0, 3, 0, 8, 0, '10000000000000', '1,2,3', ''),
(9, 1, '01:01:00', '2019-01-14', 'Jl. Banjarbaru', 1, 4, '15', 'Membakar Sampah', 0, 0, 0, 0, 0, 0, 0, 0, '150000000', '1,2,6', ''),
(10, 1, '01:01:00', '2019-01-14', 'Jl. Banjarbaru Selatan', 1, 4, '15', 'Membakar Sampah', 0, 0, 0, 0, 0, 0, 0, 0, '150000000', '1,2', ''),
(11, 4, '01:00:00', '2019-02-28', 'BANJARBARU UTARA', 2, 6, '12', 'DREINASE BUNTU', 0, 0, 12, 2, 14, 2, 1, 0, '12000000000', '1,3', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_desa`
--

CREATE TABLE IF NOT EXISTS `tb_desa` (
  `id_desa` int(11) NOT NULL AUTO_INCREMENT,
  `id_kecamatan` int(11) DEFAULT NULL,
  `nama_desa` varchar(300) DEFAULT NULL,
  `slug_desa` varchar(300) NOT NULL,
  PRIMARY KEY (`id_desa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

--
-- Dumping data for table `tb_desa`
--

INSERT INTO `tb_desa` (`id_desa`, `id_kecamatan`, `nama_desa`, `slug_desa`) VALUES
(1, 1, 'Guntung Paikat', 'guntung-paikat'),
(2, 1, 'Kemuning', 'kemuning'),
(3, 1, 'Loktabat Selatan', 'loktabat-selatan'),
(4, 1, 'Sungai Besar', 'sungai-besar'),
(5, 2, 'Komet', 'komet'),
(6, 2, 'Loktabat Utara', 'loktabat-utara'),
(7, 2, 'Mentaos', 'mentaos'),
(8, 2, 'Sungai Ulin', 'sungai-ulin'),
(9, 3, 'Palam', 'palam'),
(10, 3, 'Bangkal', 'bangkal'),
(11, 3, 'Cempaka', 'cempaka'),
(12, 3, 'Sungai Tiung', 'sungai-tiung'),
(13, 4, 'Guntung Payung', 'guntung-payung'),
(14, 4, 'Guntung Manggis', 'guntung-manggis'),
(15, 4, 'Landasan Ulin Timur', 'landasan-ulin-timur'),
(16, 4, 'Syamsudin Noor', 'syamsudin-noor'),
(17, 5, 'Landasan Ulin Barat', 'landasan-ulin-barat'),
(18, 5, 'Landasan Ulin Tengah', 'landasan-ulin-tengah'),
(19, 5, 'Landasan Ulin Selatan', 'landasan-ulin-selatan'),
(20, 5, 'Landasan Ulin Utara', 'landasan-ulin-utara'),
(60, 7, 'Kota Banjarbaru', 'kota-banjarbaru');

-- --------------------------------------------------------

--
-- Table structure for table `tb_foto`
--

CREATE TABLE IF NOT EXISTS `tb_foto` (
  `id_foto` int(11) NOT NULL AUTO_INCREMENT,
  `id_bencana` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  PRIMARY KEY (`id_foto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tb_foto`
--

INSERT INTO `tb_foto` (`id_foto`, `id_bencana`, `foto`) VALUES
(1, '1', 'bg.jpg'),
(2, '2', 'iphone.jpg'),
(3, '2', 'nominal.jpg'),
(4, '11', 'Chrysanthemum.jpg'),
(5, '11', 'Desert.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenisbencana`
--

CREATE TABLE IF NOT EXISTS `tb_jenisbencana` (
  `id_jenis` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_bencana` varchar(300) NOT NULL,
  `slug_jenis_bencana` varchar(300) NOT NULL,
  PRIMARY KEY (`id_jenis`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tb_jenisbencana`
--

INSERT INTO `tb_jenisbencana` (`id_jenis`, `jenis_bencana`, `slug_jenis_bencana`) VALUES
(1, 'KEBAKARAN LAHAN', 'kebakaran-lahan'),
(2, 'KEBAKARAN', 'kebakaran'),
(3, 'PUTING BELIUNG', 'puting-beliung'),
(4, 'BANJIR', 'banjir'),
(5, 'TANAH LONGSOR', 'tanah-longsor'),
(6, 'GEMPA BUMI', 'gempa-bumi'),
(7, 'TSUNAMI', 'tsunami'),
(9, 'BANJIR BANDANG', 'banjir-bandang'),
(10, 'GUNUNG MELETUS', 'gunung-meletus'),
(11, 'KEKERINGAN AIR', 'kekeringan-air'),
(12, 'BADAI', 'badai');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kecamatan`
--

CREATE TABLE IF NOT EXISTS `tb_kecamatan` (
  `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kecamatan` varchar(300) DEFAULT NULL,
  `slug_kecamatan` varchar(300) NOT NULL,
  PRIMARY KEY (`id_kecamatan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tb_kecamatan`
--

INSERT INTO `tb_kecamatan` (`id_kecamatan`, `nama_kecamatan`, `slug_kecamatan`) VALUES
(1, 'Banjarbaru Selatan', 'banjarbaru-selatan'),
(2, 'Banjarbaru Utara', 'banjarbaru-utara'),
(3, 'Cempaka', 'cempaka'),
(4, 'Landasan Ulin', 'landasan-ulin'),
(5, 'Liang Anggang', 'liang-anggang'),
(7, 'Prop. Kalimantan Selatan', 'prop-kalimantan-selatan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tim`
--

CREATE TABLE IF NOT EXISTS `tb_tim` (
  `id_tim` int(11) NOT NULL AUTO_INCREMENT,
  `nama_tim` varchar(30) NOT NULL,
  PRIMARY KEY (`id_tim`),
  UNIQUE KEY `nama_tim` (`nama_tim`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tb_tim`
--

INSERT INTO `tb_tim` (`id_tim`, `nama_tim`) VALUES
(1, 'BPBD KOTA BANJARBARU'),
(3, 'BPBD PROV. KALSEL'),
(8, 'BPK INSAR21'),
(7, 'EKT'),
(6, 'EMERGENCY KASTURI TEAM'),
(10, 'LANDU'),
(9, 'PMK BAUNTUNG'),
(5, 'POLRI'),
(4, 'TNI'),
(2, 'UPT DAMKAR');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE IF NOT EXISTS `tb_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `nama_lengkap` varchar(200) DEFAULT NULL,
  `pass_login` varchar(200) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `login_terakhir` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `level_akses` enum('super_admin','operator','admin','viewer') DEFAULT NULL,
  `status_user` enum('valid','not') DEFAULT NULL,
  `status` enum('online','offline') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id`, `username`, `nama_lengkap`, `pass_login`, `foto`, `login_terakhir`, `level_akses`, `status_user`, `status`) VALUES
(1, 'andhiku', 'root', '', '7bae227f2471fdb8e3348dc9fec7573d.png', '2019-06-17 14:46:42', 'super_admin', 'valid', 'offline'),
(2, 'admin', 'Administrator', '', '194626bf488f5634568a5c65496c631c.jpg', '2019-02-20 08:56:53', 'viewer', 'valid', 'offline');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
