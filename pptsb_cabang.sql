-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 16, 2024 at 07:44 AM
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
  `nama_kepala_cabang` varchar(255) DEFAULT NULL,
  `kode_regional` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cabangs`
--

INSERT INTO `cabangs` (`id`, `created_at`, `updated_at`, `deleted_at`, `kode_cabang`, `nama_cabang`, `alamat`, `nama_kepala_cabang`, `kode_regional`) VALUES
(1, '2024-05-03 14:20:01', '2024-05-10 16:13:32', '2024-05-15 21:28:31', '1442', 'Parluasan', 'Asahan', 'DR JR Saragih', '3121'),
(2, '2024-05-05 16:49:18', '2024-05-05 20:17:31', NULL, '1442', 'Medan', 'Pajak USU', 'Dr Wahidin', '3121'),
(3, '2024-05-09 13:13:13', '2024-05-09 13:13:13', NULL, '1443', 'Laguboti', 'PI Del', 'Luhut Binsar Panjaitan', '3122'),
(4, '2024-05-09 13:18:16', '2024-05-09 13:18:16', '2024-05-16 11:00:51', '1442', 'asda', 'asdsa', 'asdsad', '3121'),
(5, '2024-05-09 21:02:09', '2024-05-09 21:02:09', '2024-05-16 11:00:54', '1443', 'asdsa', 'asdasd', 'asdsad', '3122'),
(6, '2024-05-09 21:03:59', '2024-05-09 21:03:59', '2024-05-10 15:56:54', '1443', 'asd', 'ads', 'asdas', '3122'),
(7, '2024-05-09 21:06:32', '2024-05-09 21:06:32', '2024-05-10 15:23:23', 'asd12', 'asd', 'ads', 'asdasd', NULL),
(8, '2024-05-10 08:22:27', '2024-05-10 08:22:27', '2024-05-10 15:22:57', 'asd', 'asd', 'ads', 'asd', NULL),
(9, '2024-05-10 16:17:30', '2024-05-10 16:17:30', '2024-05-16 11:00:57', '1142', 'asd', 'asd', 'asda', '3121');

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
