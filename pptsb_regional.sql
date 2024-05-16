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
-- Database: `pptsb_regional`
--

-- --------------------------------------------------------

--
-- Table structure for table `regionals`
--

CREATE TABLE `regionals` (
  `id` int UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `kode_regional` varchar(255) DEFAULT NULL,
  `nama_regional` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `nama_kepala_regional` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `regionals`
--

INSERT INTO `regionals` (`id`, `created_at`, `updated_at`, `deleted_at`, `kode_regional`, `nama_regional`, `alamat`, `nama_kepala_regional`) VALUES
(1, '2024-05-03 10:44:45', '2024-05-03 10:44:45', '2024-05-03 10:46:45', '3122', 'asdsa', 'asdas', 'asdas'),
(2, '2024-05-03 10:48:27', '2024-05-12 11:27:07', '2024-05-12 15:40:29', '12312', 'Pematang siantar', 'siantarman', 'Mak eva'),
(3, '2024-05-05 16:48:36', '2024-05-05 16:48:36', '2024-05-10 16:51:30', '12351', 'asdsaasd', 'asdascs', 'asdasqwe'),
(4, '2024-05-12 15:34:20', '2024-05-13 10:34:12', '2024-05-13 10:34:19', 'asdjony', 'asd', 'ads', 'asd'),
(5, '2024-05-12 15:34:57', '2024-05-16 11:25:19', NULL, '3122', 'Siantar', 'Jl. Asahan', 'P. Manik'),
(6, '2024-05-12 15:43:45', '2024-05-12 15:43:45', '2024-05-12 16:02:39', 'asd', 'asd', 'asdasd', 'asd'),
(7, '2024-05-12 15:45:38', '2024-05-12 15:45:38', '2024-05-12 16:02:37', 'asdsa', 'asdasqa', 'asdsa', 'asdasda'),
(8, '2024-05-12 15:46:10', '2024-05-12 15:46:10', '2024-05-12 16:02:36', 'asdsa', 'asd', 'asd', 'asdasd'),
(9, '2024-05-12 15:57:45', '2024-05-12 15:57:45', '2024-05-12 16:02:35', 'asd', 'asd', 'asdads', 'asd'),
(10, '2024-05-15 20:59:59', '2024-05-15 20:59:59', '2024-05-15 21:01:25', '123', 'Del', 'asahan', 'pak luhut');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `regionals`
--
ALTER TABLE `regionals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_regionals_deleted_at` (`deleted_at`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `regionals`
--
ALTER TABLE `regionals`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
