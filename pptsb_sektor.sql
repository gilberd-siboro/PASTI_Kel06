-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 12, 2024 at 11:49 AM
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
-- Database: `pptsb_sektor`
--

-- --------------------------------------------------------

--
-- Table structure for table `sektors`
--

CREATE TABLE `sektors` (
  `id` int NOT NULL,
  `kode_sektor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_sektor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alamat_sektor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_kepala_sektor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sektors`
--

INSERT INTO `sektors` (`id`, `kode_sektor`, `nama_sektor`, `alamat_sektor`, `nama_kepala_sektor`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1232', 'Lestari Indah', 'Makadame Raya sekitarnya', 'Prabowo Subianto', '2024-05-06 14:16:07', '2024-05-07 09:44:24', '2024-05-07 09:44:24'),
(2, '4523', 'Nusa Harapan', 'Angasana Raya sekitarnya', 'Susilo Bambang Yudhoyono', '2024-05-07 01:25:46', '2024-05-07 01:25:46', NULL),
(3, '4523f', 'Dolok Saribu', 'Koramil', 'JR Saragih', '2024-05-07 01:37:53', '2024-05-07 01:37:53', NULL),
(4, '4524', 'Tiga Dolok', 'Perumnas', 'JR Saragih', '2024-05-07 01:38:52', '2024-05-07 01:38:52', NULL),
(5, '45245', 'Tapian Dolok', 'Hosana', 'Marihot', '2024-05-07 01:48:14', '2024-05-07 01:48:14', NULL),
(7, '451245', 'Serbelawan', 'Merdeka sekitarnya', 'Dr Wahidin', '2024-05-07 09:16:15', '2024-05-07 09:16:15', NULL),
(8, '451245', 'Serbelawan', 'Merdeka sekitarnya', 'Dr Wahidin', '2024-05-07 09:16:47', '2024-05-07 09:16:47', NULL),
(9, '451245', 'Serbelawan', 'Merdeka sekitarnya', 'Dr Wahidin', '2024-05-07 09:17:00', '2024-05-07 09:17:00', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sektors`
--
ALTER TABLE `sektors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sektors`
--
ALTER TABLE `sektors`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
