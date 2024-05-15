-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 15, 2024 at 03:18 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pptsb_cabang`
--

-- --------------------------------------------------------

--
-- Table structure for table `cabangs`
--

CREATE TABLE `cabangs` (
  `id` int UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `kode_cabang` varchar(255) DEFAULT NULL,
  `nama_cabang` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `nama_kepala_cabang` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cabangs`
--

INSERT INTO `cabangs` (`id`, `created_at`, `updated_at`, `deleted_at`, `kode_cabang`, `nama_cabang`, `alamat`, `nama_kepala_cabang`) VALUES
(1, '2024-05-03 14:20:01', '2024-05-10 16:13:32', '2024-05-15 21:28:31', '21151', 'Parluasan', 'Asahan', 'DR JR Saragih'),
(2, '2024-05-05 16:49:18', '2024-05-05 20:17:31', NULL, '21152', 'Medan', 'Pajak USU', 'Dr Wahidin'),
(3, '2024-05-09 13:13:13', '2024-05-09 13:13:13', NULL, '123sa', 'Laguboti', 'PI Del', 'Luhut Binsar Panjaitan'),
(4, '2024-05-09 13:18:16', '2024-05-09 13:18:16', NULL, '123qw', 'asda', 'asdsa', 'asdsad'),
(5, '2024-05-09 21:02:09', '2024-05-09 21:02:09', NULL, '123asd', 'asdsa', 'asdasd', 'asdsad'),
(6, '2024-05-09 21:03:59', '2024-05-09 21:03:59', '2024-05-10 15:56:54', '123qw', 'asd', 'ads', 'asdas'),
(7, '2024-05-09 21:06:32', '2024-05-09 21:06:32', '2024-05-10 15:23:23', 'asd12', 'asd', 'ads', 'asdasd'),
(8, '2024-05-10 08:22:27', '2024-05-10 08:22:27', '2024-05-10 15:22:57', 'asd', 'asd', 'ads', 'asd'),
(9, '2024-05-10 16:17:30', '2024-05-10 16:17:30', NULL, '1142', 'asd', 'asd', 'asda'),
(10, '2024-05-13 16:24:59', '2024-05-13 16:25:10', '2024-05-13 16:25:15', '123asd', 'adsasdas', 'asdsa', 'asdsad');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cabangs`
--
ALTER TABLE `cabangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_cabangs_deleted_at` (`deleted_at`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cabangs`
--
ALTER TABLE `cabangs`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
