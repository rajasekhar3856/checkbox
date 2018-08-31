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
-- Database: `coretest`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_core_menu`
--

CREATE TABLE `tbl_core_menu` (
  `id` int(11) NOT NULL,
  `label` varchar(50) NOT NULL DEFAULT '',
  `link` varchar(100) NOT NULL DEFAULT '#',
  `parent` int(11) NOT NULL DEFAULT '0',
  `icon` varchar(300) DEFAULT NULL,
  `status` int(150) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_core_menu`
--

INSERT INTO `tbl_core_menu` (`id`, `label`, `link`, `parent`, `icon`, `status`) VALUES
(1, 'Home', 'index.php', 0, 'icon_house_alt', 1),
(2, 'Reports', 'core_reports.php', 0, 'icon_document_alt', 1),
(3, 'Dashboard', 'core_dashboard.php', 0, 'icon_desktop', 1),
(4, 'Data Repository', '', 0, 'icon_genius', 1),
(5, 'Masters', '', 0, 'icon_table', 1),
(6, 'Contract Documents', 'core_dr_contract_documents.php', 4, NULL, 1),
(7, 'Review Meeting', 'core_dr_review_meeting.php', 4, NULL, 1),
(8, 'Employee', 'core_mas_employee.php', 5, NULL, 1),
(9, 'Customer', 'core_mas_customer.php', 5, NULL, 1),
(10, 'Project', 'core_mas_project.php', 5, NULL, 1),
(11, 'Channel', 'core_mas_channel.php', 5, NULL, 0),
(12, 'Language', 'core_mas_language.php', 5, NULL, 0),
(13, 'Location', 'core_mas_location.php', 5, NULL, 0),
(14, 'Metrics', 'core_mas_metrics.php', 5, NULL, 0),
(15, 'Billing', 'core_mas_billing.php', 5, NULL, 1),
(16, 'WBS Structure', 'core_mas_wbs.php', 5, NULL, 1),
(17, 'Role', 'core_mas_role.php', 5, NULL, 1),
(18, 'User Group', 'core_mas_usergroup.php', 5, NULL, 1),
(23, 'WBS Report', 'core_reports_wbsreport.php', 2, NULL, 1),
(24, 'RRF Report', 'core_reports_rrfreport.php', 2, NULL, 1),
(27, 'RRF', 'core_mas_rrf.php', 5, NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_core_menu`
--
ALTER TABLE `tbl_core_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_core_menu`
--
ALTER TABLE `tbl_core_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
