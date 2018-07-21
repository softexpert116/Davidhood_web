-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2018 at 02:48 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_detector`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_history`
--

CREATE TABLE `tbl_history` (
  `id` int(10) UNSIGNED NOT NULL,
  `path` varchar(256) CHARACTER SET utf8 NOT NULL,
  `time` varchar(256) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_history`
--

INSERT INTO `tbl_history` (`id`, `path`, `time`) VALUES
(315, './uploads/1532139259.webm', '07/21/2018 10:14 am'),
(316, './uploads/1532140682.webm', '07/21/2018 10:38 am'),
(317, './uploads/1532140738.webm', '07/21/2018 10:38 am'),
(318, './uploads/1532141327.webm', '07/21/2018 10:48 am'),
(319, './uploads/1532141875.webm', '07/21/2018 10:57 am'),
(320, './uploads/1532142487.webm', '07/21/2018 11:08 am'),
(321, './uploads/1532142671.webm', '07/21/2018 11:11 am'),
(322, './uploads/1532142830.webm', '07/21/2018 11:13 am'),
(323, './uploads/1532142835.webm', '07/21/2018 11:13 am'),
(324, './uploads/1532142943.webm', '07/21/2018 11:15 am'),
(325, './uploads/1532143109.webm', '07/21/2018 11:18 am'),
(326, './uploads/1532143252.webm', '07/21/2018 11:20 am'),
(327, './uploads/1532143472.webm', '07/21/2018 11:24 am'),
(328, './uploads/1532143685.webm', '07/21/2018 11:28 am'),
(329, './uploads/1532144079.webm', '07/21/2018 11:34 am'),
(330, './uploads/1532145052.webm', '07/21/2018 11:50 am'),
(331, './uploads/1532145967.webm', '07/21/2018 12:06 pm'),
(332, './uploads/1532148542.webm', '07/21/2018 12:49 pm'),
(333, './uploads/1532148990.webm', '07/21/2018 12:56 pm'),
(334, './uploads/1532149709.webm', '07/21/2018 01:08 pm'),
(335, './uploads/1532149937.webm', '07/21/2018 01:12 pm'),
(336, './uploads/1532150222.webm', '07/21/2018 01:17 pm'),
(337, './uploads/1532150292.webm', '07/21/2018 01:18 pm'),
(338, './uploads/1532151215.webm', '07/21/2018 01:33 pm'),
(339, './uploads/1532151284.webm', '07/21/2018 01:34 pm'),
(340, './uploads/1532151325.webm', '07/21/2018 01:35 pm'),
(341, './uploads/1532152122.webm', '07/21/2018 01:48 pm'),
(342, './uploads/1532152270.webm', '07/21/2018 01:51 pm'),
(343, './uploads/1532153083.webm', '07/21/2018 02:04 pm'),
(344, './uploads/1532153616.webm', '07/21/2018 02:13 pm'),
(345, './uploads/1532155865.webm', '07/21/2018 02:51 pm'),
(346, './uploads/1532155899.webm', '07/21/2018 02:51 pm'),
(347, './uploads/1532155930.webm', '07/21/2018 02:52 pm'),
(348, './uploads/1532155947.webm', '07/21/2018 02:52 pm'),
(349, './uploads/1532156730.webm', '07/21/2018 03:05 pm'),
(350, './uploads/1532157446.webm', '07/21/2018 03:17 pm'),
(351, './uploads/1532157491.webm', '07/21/2018 03:18 pm'),
(352, './uploads/1532157588.webm', '07/21/2018 03:19 pm'),
(353, './uploads/1532157615.webm', '07/21/2018 03:20 pm'),
(354, './uploads/1532158255.webm', '07/21/2018 03:30 pm'),
(355, './uploads/1532158465.webm', '07/21/2018 03:34 pm'),
(356, './uploads/1532158726.webm', '07/21/2018 03:38 pm'),
(357, './uploads/1532158919.webm', '07/21/2018 03:41 pm'),
(358, './uploads/1532159028.webm', '07/21/2018 03:43 pm'),
(359, './uploads/1532159059.webm', '07/21/2018 03:44 pm'),
(360, './uploads/1532159063.webm', '07/21/2018 03:44 pm'),
(361, './uploads/1532159098.webm', '07/21/2018 03:44 pm'),
(362, './uploads/1532168227.webm', '07/21/2018 06:17 pm'),
(363, './uploads/1532168256.webm', '07/21/2018 06:17 pm'),
(364, './uploads/1532168286.webm', '07/21/2018 06:18 pm'),
(365, './uploads/1532168421.webm', '07/21/2018 06:20 pm'),
(366, './uploads/1532168438.webm', '07/21/2018 06:20 pm'),
(367, './uploads/1532168487.webm', '07/21/2018 06:21 pm'),
(368, './uploads/1532170489.webm', '07/21/2018 06:54 pm'),
(369, './uploads/1532170511.webm', '07/21/2018 06:55 pm'),
(370, './uploads/1532170566.webm', '07/21/2018 06:56 pm'),
(371, './uploads/1532170657.webm', '07/21/2018 06:57 pm'),
(372, './uploads/1532170690.webm', '07/21/2018 06:58 pm'),
(373, './uploads/1532170703.webm', '07/21/2018 06:58 pm'),
(374, './uploads/1532170786.webm', '07/21/2018 06:59 pm'),
(375, './uploads/1532170916.webm', '07/21/2018 07:01 pm'),
(376, './uploads/1532170993.webm', '07/21/2018 07:03 pm'),
(377, './uploads/1532171637.webm', '07/21/2018 07:13 pm'),
(378, './uploads/1532171689.webm', '07/21/2018 07:14 pm'),
(379, './uploads/1532171829.webm', '07/21/2018 07:17 pm'),
(380, './uploads/1532172614.webm', '07/21/2018 07:30 pm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_history`
--
ALTER TABLE `tbl_history`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_history`
--
ALTER TABLE `tbl_history`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=381;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
