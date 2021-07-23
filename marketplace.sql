-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2021 at 01:56 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marketplace`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `price` decimal(13,2) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `description`, `price`, `stock`, `discount`, `user_id`) VALUES
(1, 'MacBook Pro M1', '../storage/products/instruction.1626857406.PNG', 'M1 chip with 16GB RAM & 16GB GPU & 8 core CPU', '2999.00', 5, 10, 1),
(3, 'GSP 101 Textbooooooook', '../storage/products/Capture.1626859779.PNG', 'University of Nigeria, Nsukka General studies Textbook for Use of English studies', '1500.00', 105, 1, 2),
(5, 'Indomie Noodles', '../storage/products/marketplace-dashboard.1626865067.PNG', 'M1 chip with 16GB RAM & 16GB GPU & 8 core CPU', '3500.00', 10, 1, 3),
(6, 'Not Evidence Chukwuma', '../storage/products/Capture.1626933474.PNG', 'This is product 2', '1000000.00', 1, 1, 5),
(8, 'Product 1', '../storage/products/ecommerce.1626937741.png', 'This is product 1', '5000.00', 25, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`) VALUES
(1, 'Daniel', 'Okoronkwo', 'danielokoronkwo90@gmail.com', '$2y$10$9y6.wON3gEoax.F0qoP84.vdq2l1ZCyMU1QuwAzgtYJnRu7viN8Fe'),
(2, 'Goodluck', 'Onyegbosi', 'goodluckonyegbosi@gmail.com', '$2y$10$Xl44jlm/JschqmnwHIuHj.FUgyw/hp20ooasVQkXDfpxyJIGpDyky'),
(3, 'Test', 'User', 'testuser@gmail.com', '$2y$10$cN/lTAT1nW8dx1uMQ0altOI4yUm9Z1i8Gqu5zx8Re81cfHR9pKXey'),
(4, 'Tony', 'Robbins', 'tonyrobbins@yahoo.com', '$2y$10$FgnTPhuW/PjjzVcPmdR49ubukT5xnA7dwOANJj5oZ46N0azSuZ4Ga'),
(5, 'Evidence', 'Chukwuma', 'evidencechukwuma@gmail.com', '$2y$10$vZtsf8C9AvFRw11LfkC4AOYKWbPgOKAhiQbJa/f9Ao.1c2ljH4YtO'),
(6, 'Herbert', 'Ezema', 'herbertezema@gmail.com', '$2y$10$nrlSOOAeRSrj62depCj1reLe53SdwQ13gMWGTkuIe.cgD1vrYspp.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
