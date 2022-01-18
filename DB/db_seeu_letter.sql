-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 18, 2022 at 11:39 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `SeeU Letter`
--

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `id` bigint(10) NOT NULL,
  `material` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `jenis_service` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`id`, `material`, `size`, `price`, `jenis_service`) VALUES
(1, 'Art Paper', '21 x 30 cm', '5000', 'Wedding'),
(2, 'Art Paper', '22 x 22 cm', '7000', 'Wedding'),
(3, 'Samson Craft', '21 x 30 cm', '8000', 'Wedding'),
(4, 'Art Paper Ultah', '22 x 22 cm', '10000', 'Birthday'),
(5, 'Samson Craft Ultah', '21 x 30 cm', '8000', 'Birthday');

-- --------------------------------------------------------

--
-- Table structure for table `service_order`
--

CREATE TABLE `service_order` (
  `id` int(11) NOT NULL,
  `user_id` bigint(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `kontak` varchar(255) NOT NULL,
  `service_detail` varchar(255) NOT NULL,
  `progress` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `total_harga` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `admin`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$bnr4giNsmiMrz1MfX7C2D.Cy9PxXQHgmGifiTS.1c68sG/98.GCDy', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_order`
--
ALTER TABLE `service_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `service_order`
--
ALTER TABLE `service_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
