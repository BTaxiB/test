-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2021 at 12:48 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) DEFAULT NULL,
  `content` varchar(500) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `email`, `content`, `product_id`, `status`, `created_at`) VALUES
(2, 'testname', 'testemail', 'testcontenttestcontenttestcontenttestcontenttestcontent', 2, 1, '2021-01-12 08:51:07'),
(3, 'sadsadsa', 'asdasdasdas@sadsadsadas', 'sadsadasdasdsadsadas', NULL, 0, '2021-01-12 09:03:52'),
(4, 'testnameasdasdsadsadsadsadsa', 'testemail@asdsadsadsaas', 'testcontsaddsasadstestcontenttdsadsadsa', 2, 1, '2021-01-12 08:51:07'),
(5, '', NULL, '', NULL, 0, '2021-01-12 10:58:14'),
(6, '', NULL, '', NULL, 0, '2021-01-12 10:58:14'),
(7, 'sadsdasdasda', '', 'dasasddsa', 0, 0, '2021-01-12 11:01:25'),
(8, 'sadasdsadsa', '', 'sadsadas', 0, 0, '2021-01-12 11:01:57'),
(9, 'dasasdasdasdsa', '', 'sadasdsadsa', 2, 0, '2021-01-12 11:02:51'),
(10, 'sdasadas', '', 'sadasdsa', 2, 0, '2021-01-12 11:05:36'),
(11, 'sadsadasdas', '', 'asdasdas', 2, 0, '2021-01-12 11:08:27');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `image`, `description`) VALUES
(2, 'sadsadsa', 'saddsadsa', 'dsadsa'),
(5, 'sadsadsa', 'saddsadsa', 'dsadsa'),
(215, 'sadsadsa', 'saddsadsa', 'dsadsa'),
(543, 'sadsadsa', 'saddsadsa', 'dsadsa'),
(12124, 'sadsadsa', 'saddsadsa', 'dsadsa'),
(21521, 'sadsadsa', 'saddsadsa', 'dsadsa'),
(234234, 'sadsadsa', 'saddsadsa', 'dsadsa'),
(654745, 'sadsadsa', 'saddsadsa', 'dsadsa'),
(21321321, 'sadsadsa', 'saddsadsa', 'dsadsa');

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `admin`) VALUES
(3, 'testusername', 'testpassword', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21321322;

--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
