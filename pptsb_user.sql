-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 15, 2024 at 03:19 PM
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
-- Database: `pptsb_user`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint NOT NULL,
  `nama_lengkap` longtext,
  `username` longtext,
  `password` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama_lengkap`, `username`, `password`) VALUES
(1, 'Gilberd Siboro', 'gilberd', '$2a$10$0Vcho2px8ELfcACIvRQPP.3usRtxJ65wj4NCBxZtq1.Nn6oU4cfzy'),
(2, '', 'anjay', '$2a$10$dTmfcFXgSLumWMgTfST7jOyTkHxEoZc1phvXWtW4pO7oMl23NCM5u'),
(3, 'gilberdddddd', 'gilberds', '$2a$10$/4j4O3rLkCziYAP6w1s1u.T7vqYk5bmfR3WCuR8btTvWVmhSxeKSa'),
(4, 'gilberd ganteng', 'ganteng', '$2a$10$eFhTHRtcIXef2UBdAETzoexiu1rlakcIl08wf.ltM0zinX0GC1Xui'),
(5, 'dapot', 'dapot', '$2a$10$5wRISA8xXm.MirstxrPWZOdzJS4IIp3cvIhq8TA3lFUNps6GNiGnu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
