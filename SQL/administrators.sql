-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2017 at 10:53 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schooldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

CREATE TABLE `administrators` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `email` varchar(320) DEFAULT NULL,
  `password` varchar(128) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`id`, `name`, `phone`, `email`, `password`, `image`, `role`) VALUES
(1, 'Elvis', 123456789, 'Elvis@gmail.com', '$2y$10$bMDXlKllUNPze3eeA9lfwe0aYv9D97jsqYCgTwHE0QvVLlsGM5As6', 'Elvis.jpg', 1),
(2, 'janis Joplin', 234567890, 'Joplin@gmail.com', '$2y$10$gyQS61D4fpA57bsIObmfWeIO9ZDFTjVyGWomN.gYx04MXky775FYm', 'Joplin.jpg', 2),
(3, 'Bob Marley', 549998887, 'Marley@gmail.com', '$2y$10$yUTuJisr3uMek3TtDNhacOIcltuVSrx8DqMcgoNjacqFs/nhZ/JZG', 'Msarley.jpg', 3),
(4, 'BB King', 501111111, 'BB_King@gmail.com', '$2y$10$I1OOrfwNRxL3VH3FfNrzJOBfoCRhd1tCClhVk9DCoaXkZjoLDY8nG', 'BB_King.jpg', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrators`
--
ALTER TABLE `administrators`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrators`
--
ALTER TABLE `administrators`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
