-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2023 at 03:43 AM
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
  `Email` varchar(255) NOT NULL,
  `Katasandi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Id`, `Pengguna`, `Email`, `Katasandi`) VALUES
(1, 'Ubaidillah', 'ubayd2947@gmail.com', '$2y$10$gfLk2ywm/BPhAtuz7N1S9e0pXBlB.iqSA19jZUDDpEyGlxId5oL.a');

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
(1, 'Ubaidillah', 'U001', '2023-01-09', '08:00:00', '15:00:00', 0, 'Hadir', '52.520007', '13.404954'),
(2, 'Alfian Fitriadi', 'U002', '2023-01-31', '07:45:00', '16:57:33', 0, 'Hadir', '52.520007', '13.404954'),
(3, 'Pramudiah', 'U004', '2023-01-31', '08:04:00', '15:40:00', 0, 'Hadir', '-7.1665656', '112.606062'),
(4, 'Misbahul Munir', 'U003', '2023-01-31', '07:45:00', '16:57:42', 0, 'Hadir', '-7.1665839', '112.6060763'),
(5, 'Ubaidillah', 'U001', '2023-01-10', '08:03:00', '15:10:00', 0, 'Hadir', '52.520007', '13.404954'),
(6, 'Ubaidillah', 'U001', '2023-01-11', '07:50:00', '15:39:00', 0, 'Hadir', '52.520007', '13.404954'),
(7, 'Ubaidillah', 'U001', '2023-01-12', '07:55:00', '15:18:00', 0, 'Hadir', '52.520007', '13.404954'),
(8, 'Ubaidillah', 'U001', '2023-01-13', '08:08:00', '15:00:00', 0, 'Hadir', '52.520007', '13.404954'),
(9, 'Ubaidillah', 'U001', '2023-01-16', '08:04:00', '15:06:00', 0, 'Hadir', '52.520007', '13.404954'),
(10, 'Ubaidillah', 'U001', '2023-01-17', '07:53:00', '15:03:00', 0, 'Hadir', '52.520007', '13.404954'),
(11, 'Ubaidillah', 'U001', '2023-01-18', '07:50:00', '15:10:00', 0, 'Hadir', '52.520007', '13.404954'),
(12, 'Ubaidillah', 'U001', '2023-01-19', '07:57:00', '15:05:00', 0, 'Hadir', '52.520007', '13.404954'),
(13, 'Ubaidillah', 'U001', '2023-01-20', '07:59:00', '15:20:00', 0, 'Hadir', '52.520007', '13.404954'),
(14, 'Ubaidillah', 'U001', '2023-01-24', '07:52:00', '15:02:00', 0, 'Hadir', '52.520007', '13.404954'),
(15, 'Ubaidillah', 'U001', '2023-01-25', '08:00:00', '15:30:00', 0, 'Hadir', '52.520007', '13.404954'),
(16, 'Ubaidillah', 'U001', '2023-01-26', '07:50:00', '16:32:00', 0, 'Hadir', '52.520007', '13.404954'),
(17, 'Ubaidillah', 'U001', '2023-01-27', '07:43:00', '15:45:00', 0, 'Hadir', '52.520007', '13.404954'),
(18, 'Ubaidillah', 'U001', '2023-01-30', '07:22:00', '15:52:00', 0, 'Hadir', '52.520007', '13.404954'),
(20, 'Pramudiah', 'U004', '2023-01-09', '08:00:00', '15:00:00', 0, 'Hadir', '-7.1665656', '112.606062'),
(21, 'Pramudiah', 'U004', '2023-01-10', '08:03:00', '16:03:00', 0, 'Hadir', '-7.1665656', '112.606062'),
(22, 'Pramudiah', 'U004', '2023-01-11', '08:10:00', '15:40:00', 0, 'Hadir', '-7.1665656', '112.606062'),
(23, 'Pramudiah', 'U004', '2023-01-12', '08:15:00', '15:18:00', 0, 'Hadir', '-7.1665656', '112.606062'),
(24, 'Pramudiah', 'U004', '2023-01-13', '07:55:00', '15:00:00', 0, 'Hadir', '-7.1665656', '112.606062'),
(25, 'Pramudiah', 'U004', '2023-01-16', '08:00:00', '15:06:00', 0, 'Hadir', '-7.1665656', '112.606062'),
(26, 'Ubaidillah', 'U001', '2023-01-31', '07:45:00', '17:02:28', 0, 'Hadir', '-7.1527929', '112.6118202'),
(27, 'Misbahul Munir', 'U003', '2023-02-01', '07:45:20', '00:00:00', 1, 'Hadir', '-7.1665999', '112.6060839'),
(28, 'Alfian Fitriadi', 'U002', '2023-02-01', '07:45:00', '00:00:00', 1, 'Hadir', '-7.1665865', '112.606068'),
(29, 'Ubaidillah', 'U001', '2023-02-01', '07:45:00', '00:00:00', 1, 'Hadir', '51.507351', '-0.127758'),
(30, 'Pramudiah', 'U004', '2023-02-01', '08:15:00', '00:00:00', 1, 'Hadir', '51.507351', '-0.127758'),
(31, 'Pramudiah', 'U004', '2023-01-17', '08:03:00', '15:03:00', 0, 'Hadir', '-7.1665656', '112.606062'),
(32, 'Pramudiah', 'U004', '2023-01-18', '08:00:00', '15:10:00', 0, 'Hadir', '-7.1665656', '112.606062'),
(33, 'Pramudiah', 'U004', '2023-01-19', '07:52:00', '15:52:00', 0, 'Hadir', '-7.1665656', '112.606062'),
(34, 'Pramudiah', 'U004', '2023-01-20', '08:04:00', '15:20:00', 0, 'Hadir', '-7.1665656', '112.606062'),
(35, 'Pramudiah', 'U004', '2023-01-24', '07:58:00', '15:02:00', 0, 'Hadir', '-7.1665656', '112.606062'),
(36, 'Pramudiah', 'U004', '2023-01-25', '08:00:00', '15:30:00', 0, 'Hadir', '-7.1665656', '112.606062'),
(37, 'Pramudiah', 'U004', '2023-01-26', '00:00:00', '00:00:00', 0, 'Sakit', '-7.1665656', '112.606062'),
(38, 'Pramudiah', 'U004', '2023-01-27', '00:00:00', '00:00:00', 0, 'Sakit', '-7.1665656', '112.606062'),
(39, 'Pramudiah', 'U004', '2023-01-30', '08:01:00', '15:52:00', 0, 'Hadir', '-7.1665656', '112.606062'),
(40, 'Alfian Fitriadi', 'U002', '2023-01-09', '08:00:00', '15:00:00', 0, 'Hadir', '52.520007', '13.404954'),
(41, 'Alfian Fitriadi', 'U002', '2023-01-10', '08:03:00', '15:10:00', 0, 'Hadir', '52.520007', '13.404954'),
(42, 'Alfian Fitriadi', 'U002', '2023-01-11', '07:50:00', '15:39:00', 0, 'Hadir', '52.520007', '13.404954'),
(43, 'Alfian Fitriadi', 'U002', '2023-01-12', '07:55:00', '15:18:00', 0, 'Hadir', '52.520007', '13.404954'),
(44, 'Alfian Fitriadi', 'U002', '2023-01-13', '08:08:00', '15:00:00', 0, 'Hadir', '52.520007', '13.404954'),
(45, 'Alfian Fitriadi', 'U002', '2023-01-16', '08:04:00', '15:06:00', 0, 'Hadir', '52.520007', '13.404954'),
(46, 'Alfian Fitriadi', 'U001', '2023-01-17', '07:53:00', '15:03:00', 0, 'Hadir', '52.520007', '13.404954'),
(47, 'Alfian Fitriadi', 'U002', '2023-01-18', '07:50:00', '15:10:00', 0, 'Hadir', '52.520007', '13.404954'),
(48, 'Alfian Fitriadi', 'U002', '2023-01-19', '07:57:00', '15:05:00', 0, 'Hadir', '52.520007', '13.404954'),
(49, 'Alfian Fitriadi', 'U002', '2023-01-20', '07:59:00', '15:20:00', 0, 'Hadir', '52.520007', '13.404954'),
(50, 'Alfian Fitriadi', 'U002', '2023-01-24', '07:52:00', '15:02:00', 0, 'Hadir', '52.520007', '13.404954'),
(51, 'Alfian Fitriadi', 'U002', '2023-01-24', '07:52:00', '15:02:00', 0, 'Hadir', '52.520007', '13.404954'),
(52, 'Alfian Fitriadi', 'U002', '2023-01-25', '08:00:00', '15:30:00', 0, 'Hadir', '52.520007', '13.404954'),
(53, 'Alfian Fitriadi', 'U002', '2023-01-26', '07:50:00', '16:32:00', 0, 'Hadir', '52.520007', '13.404954'),
(54, 'Alfian Fitriadi', 'U002', '2023-01-27', '07:43:00', '15:45:00', 0, 'Hadir', '52.520007', '13.404954'),
(55, 'Alfian Fitriadi', 'U002', '2023-01-30', '07:22:00', '15:52:00', 0, 'Hadir', '52.520007', '13.404954'),
(56, 'Misbahul Munir', 'U003', '2023-01-09', '08:00:00', '15:00:00', 0, 'Hadir', '52.520007', '13.404954'),
(57, 'Misbahul Munir', 'U003', '2023-01-10', '08:03:00', '15:10:00', 0, 'Hadir', '52.520007', '13.404954'),
(58, 'Misbahul Munir', 'U003', '2023-01-11', '07:50:00', '15:39:00', 0, 'Hadir', '52.520007', '13.404954'),
(59, 'Misbahul Munir', 'U003', '2023-01-12', '07:55:00', '15:18:00', 0, 'Hadir', '52.520007', '13.404954'),
(60, 'Misbahul Munir', 'U003', '2023-01-13', '08:08:00', '15:00:00', 0, 'Hadir', '52.520007', '13.404954'),
(61, 'Misbahul Munir', 'U003', '2023-01-16', '00:00:00', '00:00:00', 0, 'Sakit', '52.520007', '13.404954'),
(62, 'Misbahul Munir', 'U003', '2023-01-17', '07:53:00', '15:03:00', 0, 'Hadir', '52.520007', '13.404954'),
(63, 'Misbahul Munir', 'U003', '2023-01-18', '07:50:00', '15:10:00', 0, 'Hadir', '52.520007', '13.404954'),
(64, 'Misbahul Munir', 'U003', '2023-01-19', '07:57:00', '15:05:00', 0, 'Hadir', '52.520007', '13.404954'),
(65, 'Misbahul Munir', 'U003', '2023-01-20', '07:59:00', '15:20:00', 0, 'Hadir', '52.520007', '13.404954'),
(66, 'Alfian Fitriadi', 'U003', '2023-01-24', '07:52:00', '15:02:00', 0, 'Hadir', '52.520007', '13.404954'),
(67, 'Misbahul Munir', 'U003', '2023-01-25', '08:00:00', '15:30:00', 0, 'Hadir', '52.520007', '13.404954'),
(68, 'Misbahul Munir', 'U003', '2023-01-26', '07:50:00', '16:32:00', 0, 'Hadir', '52.520007', '13.404954'),
(69, 'Misbahul Munir', 'U003', '2023-01-27', '07:43:00', '15:45:00', 0, 'Hadir', '52.520007', '13.404954'),
(70, 'Misbahul Munir', 'U003', '2023-01-30', '07:22:00', '15:52:00', 0, 'Hadir', '52.520007', '13.404954');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `Id` int(11) NOT NULL,
  `Pengguna` varchar(50) NOT NULL,
  `Kode` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`Id`, `Pengguna`, `Kode`, `Email`) VALUES
(1, 'Ubaidillah', 'U001', 'ubayd2947@gmail.com'),
(2, 'Alfian Fitriadi', 'U002', 'alfianftrd@gmail.com'),
(3, 'Misbahul Munir', 'U003', 'mmisbahul233@gmail.com'),
(4, 'Pramudiah', 'U004', 'pramudiahrosanti@gmail.com');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
