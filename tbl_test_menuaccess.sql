-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2018 at 05:38 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `tbl_test_menuaccess`
--

CREATE TABLE `tbl_test_menuaccess` (
  `id` int(11) NOT NULL,
  `groupname` varchar(150) DEFAULT NULL,
  `role` varchar(150) DEFAULT NULL,
  `menulist` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_test_menuaccess`
--

INSERT INTO `tbl_test_menuaccess` (`id`, `groupname`, `role`, `menulist`) VALUES
(1, 'MIS', 'Admin', '1,2,23,24,3,4,6,7,5,8,9,10,11,12,13,14,15,16,17,18'),
(2, 'check', 'Super Admin', '1,2,23,24,3,4,6,7,5,8,9,10'),
(3, 'check', 'Super Admin', '1,2,23,24,3,4,6,7,5,8,9,10'),
(4, 'MIS', 'Admin', '1,2,23,24,3,4,6,7'),
(5, 'Test', 'User', '1,2,23,24,3,4,6,7,5,8'),
(6, 'Murali', 'User', '1,2,23,24,3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_test_menuaccess`
--
ALTER TABLE `tbl_test_menuaccess`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_test_menuaccess`
--
ALTER TABLE `tbl_test_menuaccess`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
