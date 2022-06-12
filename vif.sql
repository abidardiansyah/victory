-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2022 at 09:11 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vif`
--

-- --------------------------------------------------------

--
-- Table structure for table `catatan`
--

CREATE TABLE `catatan` (
  `catatan_id` int(11) NOT NULL,
  `marketing_client` varchar(40) NOT NULL,
  `nama_client` varchar(40) NOT NULL,
  `no_client` varchar(20) NOT NULL,
  `pekerjaan_client` varchar(20) NOT NULL,
  `alamatnya` varchar(200) NOT NULL,
  `jk_client` int(1) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `komentar` varchar(100) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `catatan`
--

INSERT INTO `catatan` (`catatan_id`, `marketing_client`, `nama_client`, `no_client`, `pekerjaan_client`, `alamatnya`, `jk_client`, `keterangan`, `komentar`, `created`) VALUES
(31, 'Abid123', 'Rizki Ardiana', '08976254424', 'PNS', 'Banjarnegara, Jawa Tengah Indonesia', 1, 'Belum Contacting', NULL, '2022-05-29 08:31:48'),
(32, 'Rafly123', 'Maulana Zufar', '0876256525', 'Mahasiswa', 'Semarang, Jawa Tengah Indonesia', 1, 'Akan Contacting', 'Seriusin agar cepta closing', '2022-05-29 10:33:54'),
(33, 'Iqbal111', 'Retno Dewi S', '089726256', 'PNS', 'Semarang', 2, 'Belum Prospek', 'Segera diprospek', '2022-05-30 09:31:30');

-- --------------------------------------------------------

--
-- Table structure for table `izin`
--

CREATE TABLE `izin` (
  `izin_id` int(11) NOT NULL,
  `nama_izin` varchar(40) NOT NULL,
  `username_izin` varchar(40) NOT NULL,
  `alasan` varchar(300) NOT NULL,
  `keterangan` enum('Izin','Terlambat','Tanpa Izin','Sakit') NOT NULL,
  `tgl_izin` date NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `approved_izin` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `izin`
--

INSERT INTO `izin` (`izin_id`, `nama_izin`, `username_izin`, `alasan`, `keterangan`, `tgl_izin`, `created`, `approved_izin`) VALUES
(14, 'Mohamad Abid Ardiansyah', 'Abid123', 'Sakit Perut', 'Sakit', '2022-05-30', '2022-05-29 08:28:23', 1),
(15, 'indah', 'Indah123', 'sakit', 'Sakit', '2022-05-31', '2022-05-30 09:36:33', 1),
(16, 'iqbal fikri', 'Iqbal111', 'sakit perut', 'Sakit', '2022-05-31', '2022-05-30 09:14:37', 1);

-- --------------------------------------------------------

--
-- Table structure for table `marketing`
--

CREATE TABLE `marketing` (
  `marketing_id` int(11) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `name` varchar(40) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk_marketing` varchar(20) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL,
  `status` int(1) NOT NULL,
  `approved_marketing` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marketing`
--

INSERT INTO `marketing` (`marketing_id`, `foto`, `username`, `name`, `phone`, `address`, `tgl_lahir`, `jk_marketing`, `agama`, `created`, `updated`, `status`, `approved_marketing`) VALUES
(27, 'bange4.jpeg', 'angga', 'Angga Arian', '0897652554', 'Semarang, Indonesia', '2000-07-12', '1', 'Budha', '2022-05-30 13:04:35', NULL, 0, 1),
(28, '21BF8CEB-127B-4F03-9EF6-F4B0ABF1858D4.jpg', 'indah123', 'Indah Putri', '081542354234', 'Semarang, Jawa Tengah Indonesia', '1999-12-12', '2', 'Kristen', '2022-05-30 13:05:28', NULL, 0, 1),
(30, '21BF8CEB-127B-4F03-9EF6-F4B0ABF1858D6.jpg', 'iqbal111', 'Iqbal Fikri', '08976254245', 'Semarang', '2000-12-12', '1', '1', '2022-05-30 11:13:33', NULL, 0, 1),
(31, '21BF8CEB-127B-4F03-9EF6-F4B0ABF1858D5.jpg', 'iqbal111', 'Iqbal Fikri', '081765252', 'semarang', '2000-07-12', '1', 'Kristen', '2022-05-30 16:11:44', NULL, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `level` int(1) NOT NULL,
  `approved` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `kode`, `name`, `password`, `address`, `level`, `approved`) VALUES
(24, 'admin', '11111', 'admin', 'dd94709528bb1c83d08f3088d4043f4742891f4f', 'Semarang, Indonesia', 1, 1),
(50, 'evan', '', 'evan sanjaya', '178b62e73cc3fab9e30bf27b2372c9ff92401915', 'Semarang', 2, 2),
(59, 'angga', '', 'Angga Arian', '26c352d286df9c08cafd83fa2f36143412aa5e0d', 'Semarang, Indonesia', 2, 0),
(60, 'indah123', '', 'Indah Putri', 'dd784bae5a4de57cdfce22850bfc7e5f229f58c9', 'Semarang, Jawa Tengah Indonesia', 2, 1),
(61, 'iqbal123', '', 'Iqbal Fikri', '9ea6da8306322b100713e7f4aa07767ae534ff54', 'Semarang, Indonesia', 2, 0),
(62, 'iqbal1234', '', 'Iqbal Fikri', '9ea6da8306322b100713e7f4aa07767ae534ff54', 'Semarang', 2, 0),
(63, 'iqbal111', '', 'Iqbal Fikri', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'semarang', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catatan`
--
ALTER TABLE `catatan`
  ADD PRIMARY KEY (`catatan_id`);

--
-- Indexes for table `izin`
--
ALTER TABLE `izin`
  ADD PRIMARY KEY (`izin_id`);

--
-- Indexes for table `marketing`
--
ALTER TABLE `marketing`
  ADD PRIMARY KEY (`marketing_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catatan`
--
ALTER TABLE `catatan`
  MODIFY `catatan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `izin`
--
ALTER TABLE `izin`
  MODIFY `izin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `marketing`
--
ALTER TABLE `marketing`
  MODIFY `marketing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
