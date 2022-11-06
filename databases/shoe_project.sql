-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2022 at 06:41 PM
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
-- Database: `shoe_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_item`
--

CREATE TABLE `add_item` (
  `id` int(11) NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `image3` varchar(255) NOT NULL,
  `fname` varchar(120) NOT NULL,
  `price` int(120) NOT NULL,
  `catagory` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `oder`
--

CREATE TABLE `oder` (
  `id` int(10) NOT NULL,
  `qty` int(255) NOT NULL,
  `phone_number` int(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `size` int(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(10) NOT NULL,
  `frist_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` int(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_item`
--
ALTER TABLE `add_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oder`
--
ALTER TABLE `oder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_item`
--
ALTER TABLE `add_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `oder`
--
ALTER TABLE `oder`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
