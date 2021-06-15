-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2021 at 07:49 AM
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
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user` varchar(100) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user`, `password`) VALUES
(1, 'suav', '123');

-- --------------------------------------------------------

--
-- Table structure for table `amout`
--

CREATE TABLE `amout` (
  `a_id` int(11) NOT NULL,
  `a_name` varchar(100) NOT NULL,
  `st_id` int(5) NOT NULL,
  `in_id` int(5) NOT NULL,
  `t_id` int(5) NOT NULL,
  `h_id` int(5) NOT NULL,
  `c_id` int(5) NOT NULL,
  `b_id` int(5) NOT NULL,
  `y_id` int(5) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `amout`
--

INSERT INTO `amout` (`a_id`, `a_name`, `st_id`, `in_id`, `t_id`, `h_id`, `c_id`, `b_id`, `y_id`, `date`) VALUES
(1, '290000\r\n', 0, 1, 2, 2, 3, 12, 7, '0000-00-00'),
(2, '200000', 2, 0, 0, 0, 0, 0, 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `bed_number`
--

CREATE TABLE `bed_number` (
  `b_id` int(11) NOT NULL,
  `b_name` varchar(100) NOT NULL,
  `h_id` int(8) NOT NULL,
  `c_id` int(8) NOT NULL,
  `b_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bed_number`
--

INSERT INTO `bed_number` (`b_id`, `b_name`, `h_id`, `c_id`, `b_date`) VALUES
(12, '101', 3, 3, '2021-04-04 13:46:54'),
(13, '001', 4, 6, '2021-04-06 01:29:45'),
(14, '0012', 4, 5, '2021-04-06 01:29:53');

-- --------------------------------------------------------

--
-- Table structure for table `catalog`
--

CREATE TABLE `catalog` (
  `ta_id` int(11) NOT NULL,
  `talog_name` varchar(255) NOT NULL,
  `h_id` int(8) NOT NULL,
  `c_id` int(8) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `catalog`
--

INSERT INTO `catalog` (`ta_id`, `talog_name`, `h_id`, `c_id`, `date`) VALUES
(4, 'ພັດ', 0, 0, '2021-04-04 17:29:56'),
(14, 'ພັດລົມ', 3, 4, '2021-04-04 17:53:20'),
(15, 'ດອກໄຟຟ້າ', 3, 4, '2021-04-04 17:55:58'),
(16, 'ພັດລົມ', 2, 3, '2021-04-10 13:29:02'),
(18, 'ພັດລົມ', 2, 7, '2021-04-10 13:30:02');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `c_id` int(11) NOT NULL,
  `h_id` int(10) NOT NULL,
  `c_name` varchar(100) NOT NULL,
  `c_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`c_id`, `h_id`, `c_name`, `c_date`) VALUES
(3, 5, '301', '0000-00-00 00:00:00'),
(5, 2, '102', '0000-00-00 00:00:00'),
(6, 3, '101', '0000-00-00 00:00:00'),
(7, 4, '204', '0000-00-00 00:00:00'),
(20, 13, '105', '0000-00-00 00:00:00'),
(24, 2, '208', '0000-00-00 00:00:00'),
(28, 2, '202', '0000-00-00 00:00:00'),
(30, 2, '301', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `em_id` int(11) NOT NULL,
  `em_name` varchar(100) NOT NULL,
  `em_sex` varchar(10) NOT NULL,
  `em_age` int(8) NOT NULL,
  `em_b` varchar(100) NOT NULL,
  `em_v` varchar(100) NOT NULL,
  `em_d` varchar(100) NOT NULL,
  `em_p` varchar(100) NOT NULL,
  `em_tel` int(10) NOT NULL,
  `em_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`em_id`, `em_name`, `em_sex`, `em_age`, `em_b`, `em_v`, `em_d`, `em_p`, `em_tel`, `em_date`) VALUES
(2, 'apao', 'ຍີງ', 25, '2021-04-21', 'nalao', 'Vientiane', 'Vientiane', 22222222, '2021-04-04 00:35:46');

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `h_id` int(11) NOT NULL,
  `h_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`h_id`, `h_name`) VALUES
(2, 'E2'),
(3, 'E3'),
(4, 'E4'),
(13, 'E1'),
(19, 'E5');

-- --------------------------------------------------------

--
-- Table structure for table `inclass`
--

CREATE TABLE `inclass` (
  `in_id` int(11) NOT NULL,
  `in_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inclass`
--

INSERT INTO `inclass` (`in_id`, `in_name`) VALUES
(1, 'ໃນແຜນ'),
(2, 'ນອກແຜນ');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `tem_id` int(11) NOT NULL,
  `iterm` varchar(200) NOT NULL,
  `money` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`tem_id`, `iterm`, `money`) VALUES
(1, 'Information', 290000),
(2, 'computer\r\n', 0),
(14, 'Electronic', 0);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(20) NOT NULL,
  `st_id` int(10) NOT NULL,
  `t_id` int(8) NOT NULL,
  `h_id` int(8) NOT NULL,
  `c_id` int(8) NOT NULL,
  `b_id` int(8) NOT NULL,
  `y_id` int(5) NOT NULL,
  `in_id` int(5) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`p_id`, `p_name`, `st_id`, `t_id`, `h_id`, `c_id`, `b_id`, `y_id`, `in_id`, `date`) VALUES
(88, '290000', 3, 1, 3, 28, 12, 1, 1, '2021-04-17'),
(90, '290000', 7, 1, 13, 7, 13, 7, 1, '2021-04-17'),
(91, '290000', 19, 2, 2, 28, 12, 8, 2, '2021-04-17'),
(92, '290000', 18, 2, 4, 30, 14, 8, 2, '2021-04-17'),
(93, '290000', 21, 1, 19, 7, 12, 8, 1, '2021-04-17'),
(94, '', 15, 1, 3, 30, 13, 1, 1, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `st_id` int(11) NOT NULL,
  `st_code` varchar(20) NOT NULL,
  `st_name` varchar(100) NOT NULL,
  `st_sex` varchar(10) NOT NULL,
  `st_age` int(8) NOT NULL,
  `st_b` varchar(100) NOT NULL,
  `st_v` varchar(100) NOT NULL,
  `st_d` varchar(100) NOT NULL,
  `st_p` varchar(100) NOT NULL,
  `tell` varchar(15) NOT NULL,
  `st_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`st_id`, `st_code`, `st_name`, `st_sex`, `st_age`, `st_b`, `st_v`, `st_d`, `st_p`, `tell`, `st_date`) VALUES
(3, 'QFEN19218', 'suavlaus', 'ຊາຍ', 25, '2021-04-15', 'Vientiane', 'sisatanak', 'Phonsaly', '222222222', '2021-04-08 13:14:50'),
(7, 'FEN19210', 'thongphet', 'ຊາຍ', 25, '2021-04-30', 'Namnyuan', 'samphan', 'Phonsaly', '02091851435', '2021-04-10 14:31:35'),
(15, '8220', 'apao', 'ຊາຍ', 25, '2021-04-20', 'Vientiane', 'Lao', 'Phonsaly', '020123741', '2021-04-06 22:21:34'),
(18, 'FEN-180', 'say', 'ຊາຍ', 25, '2021-04-21', 'Namnyuan', 'Samphan', 'Phonsaly', '0207797398', '2021-04-10 14:31:22'),
(19, 'QFEN00519', 'Mr. Yang mua', 'ຊາຍ', 21, '2021-04-30', 'Nounhai', 'Nounhai', 'Vientiane', '20202', '2021-04-07 22:28:19'),
(21, 'QFEN28204', 'kuaopao', 'ຊາຍ', 25, '2021-04-21', 'anouvong', 'anouvong', 'saisomboun', '020947562771', '2021-04-10 14:35:56');

-- --------------------------------------------------------

--
-- Table structure for table `year`
--

CREATE TABLE `year` (
  `y_id` int(11) NOT NULL,
  `y_name` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `year`
--

INSERT INTO `year` (`y_id`, `y_name`) VALUES
(1, 1),
(7, 2),
(8, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `amout`
--
ALTER TABLE `amout`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `bed_number`
--
ALTER TABLE `bed_number`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`ta_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`em_id`);

--
-- Indexes for table `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`h_id`);

--
-- Indexes for table `inclass`
--
ALTER TABLE `inclass`
  ADD PRIMARY KEY (`in_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`tem_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`st_id`);

--
-- Indexes for table `year`
--
ALTER TABLE `year`
  ADD PRIMARY KEY (`y_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `amout`
--
ALTER TABLE `amout`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bed_number`
--
ALTER TABLE `bed_number`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `catalog`
--
ALTER TABLE `catalog`
  MODIFY `ta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `em_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `home`
--
ALTER TABLE `home`
  MODIFY `h_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `inclass`
--
ALTER TABLE `inclass`
  MODIFY `in_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `tem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `st_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `year`
--
ALTER TABLE `year`
  MODIFY `y_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
