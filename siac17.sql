-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 02, 2017 at 07:55 PM
-- Server version: 5.7.19-0ubuntu0.16.04.1
-- PHP Version: 7.1.6-1~ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siac17`
--

-- --------------------------------------------------------

--
-- Table structure for table `creds`
--

CREATE TABLE `creds` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(20) NOT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `creds`
--

INSERT INTO `creds` (`id`, `name`, `email`, `password`, `mobile`, `address`, `created_on`) VALUES
(1, 'test', 'test@mail.com', 'Test@1', NULL, NULL, '2017-11-15 06:36:36'),
(2, 'test1', 'test1@mail.com', 'Test@1', NULL, NULL, '2017-11-15 06:39:15'),
(3, 'test3', 'test3@mail.com', 'Test@3', NULL, NULL, '2017-11-15 06:41:23'),
(4, 'shonak', 'shonakmarkan20@gmail.com', 'liverpools', NULL, NULL, '2017-11-15 12:38:51'),
(10, 'Chinmaya Pati', 'chinmaya.cp@gmail.com', 'Chiku@1', NULL, NULL, '2017-11-16 12:30:34'),
(11, 'Aditya', 'aditya199619@gmail.com', 'ADI!@#642aks', NULL, NULL, '2017-11-17 16:55:50'),
(12, 'Shonak Markhan', 'shonak@gmail.com', 'Shonak@123', NULL, NULL, '2017-11-28 06:08:41'),
(13, 'Dinesh Ch', 'dinesh@gmail.com', 'Dinesh@123', '1231231231', 'abcd abcd ab', '2017-12-01 16:33:59'),
(14, 'Dinesh Ch', 'dineshc@gmail.com', 'Dinesh@123', '1231231231', 'abcd abcd ab', '2017-12-01 16:34:53');

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `daydream` int(11) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`id`, `user_id`, `daydream`, `time`) VALUES
(29, 1, 10, 12),
(30, 1, 1221, 13),
(31, 1, 211, 13),
(32, 1, 322211, 13),
(33, 2, 122, 12),
(34, 1, 122, 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `creds`
--
ALTER TABLE `creds`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uk_email` (`email`);

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_userid` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `creds`
--
ALTER TABLE `creds`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `records`
--
ALTER TABLE `records`
  ADD CONSTRAINT `fk_userid` FOREIGN KEY (`user_id`) REFERENCES `creds` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
