-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2023 at 08:40 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absen`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Id` int(11) NOT NULL,
  `Pengguna` varchar(100) NOT NULL,
  `NIK` varchar(16) NOT NULL,
  `Katasandi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Id`, `Pengguna`, `NIK`, `Katasandi`) VALUES
(1, 'Ubaidillah1', '3526141005020001', '$2y$10$rHcFCKwJdy6q8Ea53Vomk.c8ZbVzlwDpQ5Piinngv6/kDDA7AeVlq'),
(2, 'Ubaidillah2', '3526141005020002', '$2y$10$wYhDy4t9PB24pXUUAUPLhOXYX/8x6RKYdPUnuc8fYrDoC4DWAF/Ye'),
(3, 'Ubaidillah3', '3526141005020003', '$2y$10$wYhDy4t9PB24pXUUAUPLhOXYX/8x6RKYdPUnuc8fYrDoC4DWAF/Ye'),
(4, 'Ubaidillah4', '3526141005020004', '$2y$10$wYhDy4t9PB24pXUUAUPLhOXYX/8x6RKYdPUnuc8fYrDoC4DWAF/Ye'),
(5, 'Ubaidillah5', '3526141005020005', '$2y$10$wYhDy4t9PB24pXUUAUPLhOXYX/8x6RKYdPUnuc8fYrDoC4DWAF/Ye'),
(6, 'Ubaidillah6', '3526141005020006', '$2y$10$wYhDy4t9PB24pXUUAUPLhOXYX/8x6RKYdPUnuc8fYrDoC4DWAF/Ye'),
(7, 'Ubaidillah7', '3526141005020007', '$2y$10$wYhDy4t9PB24pXUUAUPLhOXYX/8x6RKYdPUnuc8fYrDoC4DWAF/Ye'),
(8, 'Ubaidillah8', '3526141005020008', '$2y$10$wYhDy4t9PB24pXUUAUPLhOXYX/8x6RKYdPUnuc8fYrDoC4DWAF/Ye'),
(9, 'Ubaidillah9', '3526141005020009', '$2y$10$wYhDy4t9PB24pXUUAUPLhOXYX/8x6RKYdPUnuc8fYrDoC4DWAF/Ye'),
(10, 'Ubaidillah10', '3526141005020010', '$2y$10$wYhDy4t9PB24pXUUAUPLhOXYX/8x6RKYdPUnuc8fYrDoC4DWAF/Ye'),
(11, 'Ubaidillah11', '3526141005020011', '$2y$10$wYhDy4t9PB24pXUUAUPLhOXYX/8x6RKYdPUnuc8fYrDoC4DWAF/Ye'),
(12, 'Ubaidillah12', '3526141005020012', '$2y$10$wYhDy4t9PB24pXUUAUPLhOXYX/8x6RKYdPUnuc8fYrDoC4DWAF/Ye'),
(13, 'Ubaidillah13', '3526141005020013', '$2y$10$wYhDy4t9PB24pXUUAUPLhOXYX/8x6RKYdPUnuc8fYrDoC4DWAF/Ye'),
(14, 'Ubaidillah14', '3526141005020014', '$2y$10$wYhDy4t9PB24pXUUAUPLhOXYX/8x6RKYdPUnuc8fYrDoC4DWAF/Ye'),
(15, 'Ubaidillah15', '3526141005020015', '$2y$10$wYhDy4t9PB24pXUUAUPLhOXYX/8x6RKYdPUnuc8fYrDoC4DWAF/Ye'),
(16, 'Ubaidillah16', '3526141005020016', '$2y$10$wYhDy4t9PB24pXUUAUPLhOXYX/8x6RKYdPUnuc8fYrDoC4DWAF/Ye'),
(17, 'Ubaidillah17', '3526141005020017', '$2y$10$wYhDy4t9PB24pXUUAUPLhOXYX/8x6RKYdPUnuc8fYrDoC4DWAF/Ye'),
(18, 'Ubaidillah18', '3526141005020018', '$2y$10$wYhDy4t9PB24pXUUAUPLhOXYX/8x6RKYdPUnuc8fYrDoC4DWAF/Ye'),
(19, 'Ubaidillah19', '3526141005020019', '$2y$10$wYhDy4t9PB24pXUUAUPLhOXYX/8x6RKYdPUnuc8fYrDoC4DWAF/Ye'),
(20, 'Ubaidillah20', '3526141005020020', '$2y$10$wYhDy4t9PB24pXUUAUPLhOXYX/8x6RKYdPUnuc8fYrDoC4DWAF/Ye'),
(21, 'Ubaidillah21', '3526141005020021', '$2y$10$wYhDy4t9PB24pXUUAUPLhOXYX/8x6RKYdPUnuc8fYrDoC4DWAF/Ye'),
(22, 'Ubaidillah22', '3526141005020022', '$2y$10$wYhDy4t9PB24pXUUAUPLhOXYX/8x6RKYdPUnuc8fYrDoC4DWAF/Ye'),
(23, 'Ubaidillah23', '3526141005020023', '$2y$10$wYhDy4t9PB24pXUUAUPLhOXYX/8x6RKYdPUnuc8fYrDoC4DWAF/Ye'),
(24, 'Ubaidillah24', '3526141005020024', '$2y$10$wYhDy4t9PB24pXUUAUPLhOXYX/8x6RKYdPUnuc8fYrDoC4DWAF/Ye'),
(25, 'Ubaidillah25', '3526141005020025', '$2y$10$wYhDy4t9PB24pXUUAUPLhOXYX/8x6RKYdPUnuc8fYrDoC4DWAF/Ye'),
(26, 'Ubaidillah26', '3526141005020026', '$2y$10$wYhDy4t9PB24pXUUAUPLhOXYX/8x6RKYdPUnuc8fYrDoC4DWAF/Ye'),
(27, 'Ubaidillah27', '3526141005020027', '$2y$10$wYhDy4t9PB24pXUUAUPLhOXYX/8x6RKYdPUnuc8fYrDoC4DWAF/Ye'),
(28, 'Ubaidillah28', '3526141005020028', '$2y$10$wYhDy4t9PB24pXUUAUPLhOXYX/8x6RKYdPUnuc8fYrDoC4DWAF/Ye'),
(29, 'Ubaidillah29', '3526141005020029', '$2y$10$wYhDy4t9PB24pXUUAUPLhOXYX/8x6RKYdPUnuc8fYrDoC4DWAF/Ye'),
(30, 'Ubaidillah30', '3526141005020030', '$2y$10$wYhDy4t9PB24pXUUAUPLhOXYX/8x6RKYdPUnuc8fYrDoC4DWAF/Ye'),
(31, 'Ubaidillah31', '3526141005020031', '$2y$10$wYhDy4t9PB24pXUUAUPLhOXYX/8x6RKYdPUnuc8fYrDoC4DWAF/Ye'),
(32, 'Ubaidillah32', '3526141005020032', '$2y$10$wYhDy4t9PB24pXUUAUPLhOXYX/8x6RKYdPUnuc8fYrDoC4DWAF/Ye'),
(33, 'Ubaidillah33', '3526141005020033', '$2y$10$wYhDy4t9PB24pXUUAUPLhOXYX/8x6RKYdPUnuc8fYrDoC4DWAF/Ye'),
(34, 'Ubaidillah34', '3526141005020034', '$2y$10$wYhDy4t9PB24pXUUAUPLhOXYX/8x6RKYdPUnuc8fYrDoC4DWAF/Ye'),
(35, 'Ubaidillah35', '3526141005020035', '$2y$10$wYhDy4t9PB24pXUUAUPLhOXYX/8x6RKYdPUnuc8fYrDoC4DWAF/Ye'),
(36, 'Ubaidillah36', '3526141005020036', '$2y$10$wYhDy4t9PB24pXUUAUPLhOXYX/8x6RKYdPUnuc8fYrDoC4DWAF/Ye'),
(37, 'Ubaidillah37', '3526141005020037', '$2y$10$wYhDy4t9PB24pXUUAUPLhOXYX/8x6RKYdPUnuc8fYrDoC4DWAF/Ye'),
(38, 'Ubaidillah38', '3526141005020038', '$2y$10$wYhDy4t9PB24pXUUAUPLhOXYX/8x6RKYdPUnuc8fYrDoC4DWAF/Ye'),
(39, 'Ubaidillah39', '3526141005020039', '$2y$10$wYhDy4t9PB24pXUUAUPLhOXYX/8x6RKYdPUnuc8fYrDoC4DWAF/Ye'),
(40, 'Ubaidillah40', '3526141005020040', '$2y$10$wYhDy4t9PB24pXUUAUPLhOXYX/8x6RKYdPUnuc8fYrDoC4DWAF/Ye'),
(41, 'Ubaidillah41', '3526141005020041', '$2y$10$wYhDy4t9PB24pXUUAUPLhOXYX/8x6RKYdPUnuc8fYrDoC4DWAF/Ye'),
(42, 'Ubaidillah42', '3526141005020042', '$2y$10$wYhDy4t9PB24pXUUAUPLhOXYX/8x6RKYdPUnuc8fYrDoC4DWAF/Ye'),
(43, 'Ubaidillah43', '3526141005020043', '$2y$10$wYhDy4t9PB24pXUUAUPLhOXYX/8x6RKYdPUnuc8fYrDoC4DWAF/Ye'),
(44, 'Ubaidillah44', '3526141005020044', '$2y$10$wYhDy4t9PB24pXUUAUPLhOXYX/8x6RKYdPUnuc8fYrDoC4DWAF/Ye'),
(45, 'Ubaidillah45', '3526141005020045', '$2y$10$wYhDy4t9PB24pXUUAUPLhOXYX/8x6RKYdPUnuc8fYrDoC4DWAF/Ye'),
(46, 'Ubaidillah46', '3526141005020046', '$2y$10$wYhDy4t9PB24pXUUAUPLhOXYX/8x6RKYdPUnuc8fYrDoC4DWAF/Ye'),
(47, 'Ubaidillah47', '3526141005020047', '$2y$10$wYhDy4t9PB24pXUUAUPLhOXYX/8x6RKYdPUnuc8fYrDoC4DWAF/Ye'),
(48, 'Ubaidillah48', '3526141005020048', '$2y$10$wYhDy4t9PB24pXUUAUPLhOXYX/8x6RKYdPUnuc8fYrDoC4DWAF/Ye'),
(49, 'Ubaidillah49', '3526141005020049', '$2y$10$wYhDy4t9PB24pXUUAUPLhOXYX/8x6RKYdPUnuc8fYrDoC4DWAF/Ye'),
(50, 'Ubaidillah50', '3526141005020050', '$2y$10$wYhDy4t9PB24pXUUAUPLhOXYX/8x6RKYdPUnuc8fYrDoC4DWAF/Ye');

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `Id` int(11) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `Kode` varchar(11) NOT NULL,
  `Tanggal` date NOT NULL,
  `Datang` time NOT NULL,
  `Pulang` time NOT NULL,
  `Cek` int(11) NOT NULL,
  `Izin` varchar(255) NOT NULL,
  `Garislintang` varchar(255) NOT NULL,
  `Garisbujur` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`Id`, `Nama`, `Kode`, `Tanggal`, `Datang`, `Pulang`, `Cek`, `Izin`, `Garislintang`, `Garisbujur`) VALUES
(1, 'Ubaidillah1', 'U001', '2023-02-01', '07:55:00', '17:10:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(2, 'Ubaidillah1', 'U001', '2023-02-02', '08:08:00', '17:25:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(3, 'Ubaidillah1', 'U001', '2023-02-03', '07:59:00', '17:01:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(4, 'Ubaidillah1', 'U001', '2023-02-06', '07:40:00', '17:50:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(5, 'Ubaidillah1', 'U001', '2023-02-07', '07:50:00', '16:50:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(6, 'Ubaidillah1', 'U001', '2023-02-08', '08:20:00', '16:50:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(7, 'Ubaidillah1', 'U001', '2023-02-09', '07:41:00', '17:59:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(8, 'Ubaidillah1', 'U001', '2023-02-10', '07:50:00', '17:00:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(9, 'Ubaidillah1', 'U001', '2023-02-11', '08:20:00', '17:20:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(10, 'Ubaidillah1', 'U001', '2023-02-13', '08:00:00', '16:20:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(11, 'Ubaidillah1', 'U001', '2023-02-14', '07:59:00', '17:01:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(12, 'Ubaidillah1', 'U001', '2023-02-15', '07:53:00', '17:20:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(13, 'Ubaidillah1', 'U001', '2023-02-16', '07:41:00', '18:20:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(14, 'Ubaidillah1', 'U001', '2023-02-17', '08:10:00', '16:40:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(15, 'Ubaidillah1', 'U001', '2023-02-20', '07:58:00', '17:00:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(16, 'Ubaidillah1', 'U001', '2023-02-21', '07:53:00', '17:20:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(17, 'Ubaidillah1', 'U001', '2023-02-22', '07:59:00', '17:01:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(18, 'Ubaidillah1', 'U001', '2023-02-23', '08:00:00', '16:20:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(19, 'Ubaidillah1', 'U001', '2023-02-24', '07:50:00', '17:20:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(20, 'Ubaidillah1', 'U001', '2023-02-27', '08:00:00', '16:20:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(21, 'Ubaidillah1', 'U001', '2023-02-28', '08:20:00', '17:20:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(22, 'Ubaidillah1', 'U001', '2023-01-02', '08:20:00', '17:20:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(23, 'Ubaidillah1', 'U001', '2023-01-03', '08:00:00', '16:20:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(24, 'Ubaidillah1', 'U001', '2023-01-04', '07:50:00', '17:20:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(25, 'Ubaidillah1', 'U001', '2023-01-05', '08:00:00', '16:20:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(26, 'Ubaidillah1', 'U001', '2023-01-06', '07:59:00', '17:01:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(27, 'Ubaidillah1', 'U001', '2023-01-09', '07:53:00', '17:20:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(28, 'Ubaidillah1', 'U001', '2023-01-10', '07:58:00', '17:00:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(29, 'Ubaidillah1', 'U001', '2023-01-11', '08:10:00', '16:40:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(30, 'Ubaidillah1', 'U001', '2023-01-12', '07:41:00', '18:20:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(31, 'Ubaidillah1', 'U001', '2023-01-13', '07:53:00', '17:20:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(32, 'Ubaidillah1', 'U001', '2023-01-16', '07:59:00', '17:01:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(33, 'Ubaidillah1', 'U001', '2023-01-17', '08:00:00', '16:20:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(34, 'Ubaidillah1', 'U001', '2023-01-18', '08:20:00', '17:20:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(35, 'Ubaidillah1', 'U001', '2023-01-19', '07:50:00', '17:00:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(36, 'Ubaidillah1', 'U001', '2023-01-20', '07:41:00', '17:59:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(37, 'Ubaidillah1', 'U001', '2023-01-23', '08:20:00', '16:50:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(38, 'Ubaidillah1', 'U001', '2023-01-24', '07:50:00', '16:50:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(39, 'Ubaidillah1', 'U001', '2023-01-25', '07:40:00', '17:50:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(40, 'Ubaidillah1', 'U001', '2023-01-26', '07:59:00', '17:01:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(41, 'Ubaidillah1', 'U001', '2023-01-28', '08:08:00', '17:25:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(42, 'Ubaidillah1', 'U001', '2023-01-30', '07:55:00', '17:10:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(43, 'Ubaidillah1', 'U001', '2023-01-31', '07:50:00', '10:08:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(44, 'Ubaidillah2', 'U002', '2023-01-02', '08:20:00', '17:20:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(45, 'Ubaidillah2', 'U002', '2023-01-03', '08:00:00', '16:20:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(46, 'Ubaidillah2', 'U002', '2023-01-04', '07:50:00', '17:20:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(47, 'Ubaidillah2', 'U002', '2023-01-05', '08:00:00', '16:20:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(48, 'Ubaidillah2', 'U002', '2023-01-06', '07:59:00', '17:01:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(49, 'Ubaidillah2', 'U002', '2023-01-09', '07:53:00', '17:20:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(50, 'Ubaidillah2', 'U002', '2023-01-10', '07:58:00', '17:00:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(51, 'Ubaidillah2', 'U002', '2023-01-11', '08:10:00', '16:40:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(52, 'Ubaidillah2', 'U002', '2023-01-12', '07:41:00', '18:20:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(53, 'Ubaidillah2', 'U002', '2023-01-13', '07:53:00', '17:20:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(54, 'Ubaidillah2', 'U002', '2023-01-11', '08:10:00', '16:40:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(55, 'Ubaidillah2', 'U002', '2023-01-12', '07:41:00', '18:20:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(56, 'Ubaidillah2', 'U002', '2023-01-13', '07:53:00', '17:20:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(57, 'Ubaidillah2', 'U002', '2023-01-16', '07:59:00', '17:01:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(58, 'Ubaidillah2', 'U002', '2023-01-17', '08:00:00', '16:20:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(59, 'Ubaidillah2', 'U002', '2023-01-18', '08:20:00', '17:20:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(60, 'Ubaidillah2', 'U002', '2023-01-19', '07:50:00', '17:00:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(61, 'Ubaidillah2', 'U002', '2023-01-20', '07:41:00', '17:59:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(62, 'Ubaidillah2', 'U002', '2023-01-23', '08:20:00', '16:50:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(63, 'Ubaidillah2', 'U002', '2023-01-24', '07:50:00', '16:50:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(64, 'Ubaidillah2', 'U002', '2023-01-25', '07:40:00', '17:50:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(65, 'Ubaidillah2', 'U002', '2023-01-26', '07:59:00', '17:01:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(66, 'Ubaidillah2', 'U002', '2023-01-28', '08:08:00', '17:25:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(67, 'Ubaidillah2', 'U002', '2023-01-30', '07:55:00', '17:10:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(68, 'Ubaidillah2', 'U002', '2023-01-31', '07:50:00', '10:08:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(69, 'Ubaidillah2', 'U002', '2023-02-01', '07:55:00', '17:10:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(70, 'Ubaidillah2', 'U002', '2023-02-02', '08:08:00', '17:25:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(71, 'Ubaidillah2', 'U002', '2023-02-03', '07:59:00', '17:01:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(72, 'Ubaidillah2', 'U002', '2023-02-06', '07:40:00', '17:50:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(73, 'Ubaidillah2', 'U002', '2023-02-07', '07:50:00', '16:50:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(74, 'Ubaidillah2', 'U002', '2023-02-08', '08:20:00', '16:50:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(75, 'Ubaidillah2', 'U002', '2023-02-09', '07:41:00', '17:59:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(76, 'Ubaidillah2', 'U002', '2023-02-10', '07:50:00', '17:00:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(77, 'Ubaidillah2', 'U002', '2023-02-11', '08:20:00', '17:20:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(78, 'Ubaidillah2', 'U002', '2023-02-13', '08:00:00', '16:20:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(79, 'Ubaidillah2', 'U002', '2023-02-14', '07:59:00', '17:01:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(80, 'Ubaidillah2', 'U002', '2023-02-15', '07:53:00', '17:20:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(81, 'Ubaidillah2', 'U002', '2023-02-16', '07:41:00', '18:20:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(82, 'Ubaidillah2', 'U002', '2023-02-17', '08:10:00', '16:40:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(83, 'Ubaidillah2', 'U002', '2023-02-20', '07:58:00', '17:00:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(84, 'Ubaidillah2', 'U002', '2023-02-21', '07:53:00', '17:20:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(85, 'Ubaidillah2', 'U002', '2023-02-22', '07:59:00', '17:01:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(86, 'Ubaidillah2', 'U002', '2023-02-23', '08:00:00', '16:20:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(87, 'Ubaidillah2', 'U002', '2023-02-24', '07:50:00', '17:20:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(88, 'Ubaidillah2', 'U002', '2023-02-27', '08:00:00', '16:20:00', 0, 'Hadir', '-7.1527752', '112.6119566'),
(89, 'Ubaidillah2', 'U002', '2023-02-28', '08:20:00', '17:20:00', 0, 'Hadir', '-7.1527752', '112.6119566');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `Id` int(11) NOT NULL,
  `Pengguna` varchar(50) NOT NULL,
  `Kode` varchar(50) NOT NULL,
  `NIK` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`Id`, `Pengguna`, `Kode`, `NIK`) VALUES
(1, 'Ubaidillah1', 'U001', '3526141005020001'),
(2, 'Ubaidillah2', 'U002', '3526141005020002'),
(3, 'Ubaidillah3', 'U003', '3526141005020003'),
(4, 'Ubaidillah4', 'U004', '3526141005020004'),
(5, 'Ubaidillah5', 'U005', '3526141005020005'),
(6, 'Ubaidillah6', 'U006', '3526141005020006'),
(7, 'Ubaidillah7', 'U007', '3526141005020007'),
(8, 'Ubaidillah8', 'U008', '3526141005020008'),
(9, 'Ubaidillah9', 'U009', '3526141005020009'),
(10, 'Ubaidillah10', 'U010', '3526141005020010'),
(11, 'Ubaidillah11', 'U011', '3526141005020011'),
(12, 'Ubaidillah12', 'U012', '3526141005020012'),
(13, 'Ubaidillah13', 'U013', '3526141005020013'),
(14, 'Ubaidillah14', 'U014', '3526141005020014'),
(15, 'Ubaidillah15', 'U015', '3526141005020015'),
(16, 'Ubaidillah16', 'U016', '3526141005020016'),
(17, 'Ubaidillah17', 'U017', '3526141005020017'),
(18, 'Ubaidillah18', 'U018', '3526141005020018'),
(19, 'Ubaidillah19', 'U019', '3526141005020019'),
(20, 'Ubaidillah20', 'U020', '3526141005020020'),
(21, 'Ubaidillah21', 'U021', '3526141005020021'),
(22, 'Ubaidillah22', 'U022', '3526141005020022'),
(23, 'Ubaidillah23', 'U023', '3526141005020023'),
(24, 'Ubaidillah24', 'U024', '3526141005020024'),
(25, 'Ubaidillah25', 'U025', '3526141005020025'),
(26, 'Ubaidillah26', 'U026', '3526141005020026'),
(27, 'Ubaidillah27', 'U027', '3526141005020027'),
(28, 'Ubaidillah28', 'U028', '3526141005020028'),
(29, 'Ubaidillah29', 'U029', '3526141005020029'),
(30, 'Ubaidillah30', 'U030', '3526141005020030'),
(31, 'Ubaidillah31', 'U031', '3526141005020031'),
(32, 'Ubaidillah32', 'U032', '3526141005020032'),
(33, 'Ubaidillah33', 'U033', '3526141005020033'),
(34, 'Ubaidillah34', 'U034', '3526141005020034'),
(35, 'Ubaidillah35', 'U035', '3526141005020035'),
(36, 'Ubaidillah36', 'U036', '3526141005020036'),
(37, 'Ubaidillah37', 'U037', '3526141005020037'),
(38, 'Ubaidillah38', 'U038', '3526141005020038'),
(39, 'Ubaidillah39', 'U039', '3526141005020039'),
(40, 'Ubaidillah40', 'U040', '3526141005020040'),
(41, 'Ubaidillah41', 'U041', '3526141005020041'),
(42, 'Ubaidillah42', 'U042', '3526141005020042'),
(43, 'Ubaidillah43', 'U043', '3526141005020043'),
(44, 'Ubaidillah44', 'U044', '3526141005020044'),
(45, 'Ubaidillah45', 'U045', '3526141005020045'),
(46, 'Ubaidillah46', 'U046', '3526141005020046'),
(47, 'Ubaidillah47', 'U047', '3526141005020047'),
(48, 'Ubaidillah48', 'U048', '3526141005020048'),
(49, 'Ubaidillah49', 'U049', '3526141005020049'),
(50, 'Ubaidillah50', 'U050', '3526141005020050');

-- --------------------------------------------------------

--
-- Table structure for table `sadmin`
--

CREATE TABLE `sadmin` (
  `Id` int(11) NOT NULL,
  `Pengguna` varchar(100) NOT NULL,
  `NIK` varchar(16) NOT NULL,
  `Katasandi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sadmin`
--

INSERT INTO `sadmin` (`Id`, `Pengguna`, `NIK`, `Katasandi`) VALUES
(1, 'Ubaidillah', '3526141005020002', '$2y$10$R.ChXAS582YQKD2hjVU.EOTA7BvxFHgOOaRb1q3ujvtCI4kwSIcMe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `sadmin`
--
ALTER TABLE `sadmin`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `sadmin`
--
ALTER TABLE `sadmin`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
