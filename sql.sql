-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 24, 2018 at 06:02 AM
-- Server version: 5.7.15-log
-- PHP Version: 7.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ef`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_groups`
--

CREATE TABLE `admin_groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_groups`
--

INSERT INTO `admin_groups` (`id`, `name`, `description`) VALUES
(1, 'webmaster', 'Webmaster'),
(2, 'admin', 'Administrator'),
(3, 'manager', 'Manager'),
(4, 'staff', 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`) VALUES
(1, '127.0.0.1', 'webmaster', '$2y$08$/X5gzWjesYi78GqeAv5tA.dVGBVP7C1e1PzqnYCVe5s1qhlDIPPES', NULL, NULL, NULL, NULL, NULL, NULL, 1451900190, 1524548374, 1, 'Webmaster', ''),
(2, '127.0.0.1', 'admin', '$2y$08$7Bkco6JXtC3Hu6g9ngLZDuHsFLvT7cyAxiz1FzxlX5vwccvRT7nKW', NULL, NULL, NULL, NULL, NULL, NULL, 1451900228, 1451903990, 1, 'Admin', ''),
(3, '127.0.0.1', 'manager', '$2y$08$snzIJdFXvg/rSHe0SndIAuvZyjktkjUxBXkrrGdkPy1K6r5r/dMLa', NULL, NULL, NULL, NULL, NULL, NULL, 1451900430, NULL, 1, 'Manager', ''),
(4, '127.0.0.1', 'staff', '$2y$08$NigAXjN23CRKllqe3KmjYuWXD5iSRPY812SijlhGeKfkrMKde9da6', NULL, NULL, NULL, NULL, NULL, NULL, 1451900439, NULL, 1, 'Staff', '');

-- --------------------------------------------------------

--
-- Table structure for table `admin_users_groups`
--

CREATE TABLE `admin_users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_users_groups`
--

INSERT INTO `admin_users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `class_id` int(5) NOT NULL,
  `class_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `class_description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`class_id`, `class_name`, `class_description`) VALUES
(1, 'K60cb', 'da'),
(2, 'K60-CC', '<p>\r\n	hehe</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `ef_student`
--

CREATE TABLE `ef_student` (
  `efst_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ef_id` int(11) NOT NULL,
  `efst_status` tinyint(2) NOT NULL DEFAULT '0',
  `efst_comment` text COLLATE utf8_unicode_ci,
  `ef_struct` json DEFAULT NULL,
  `sum` int(3) NOT NULL DEFAULT '70',
  `efst_comment_2` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ef_student`
--

INSERT INTO `ef_student` (`efst_id`, `user_id`, `ef_id`, `efst_status`, `efst_comment`, `ef_struct`, `sum`, `efst_comment_2`) VALUES
(1, 1, 1, 2, '', '{"cb1": [], "cb2": [], "spinner": ["3", "5", "5", "4", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "5", "0", "0", "0", "0"]}', 58, '<p>dfsf</p>'),
(2, 2, 1, 4, '<p>sgsdgsdgdsg</p>', '{"cb1": [], "cb2": [], "spinner": ["0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0"]}', 70, ''),
(3, 3, 1, 4, '<p>Trần Văn tốt</p>', '{"cb1": [], "cb2": [], "spinner": ["0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0"]}', 70, '<p>Oke nh&eacute;</p>'),
(4, 1, 2, 0, '', '{"cb1": [], "cb2": [], "spinner": ["3", "0", "0", "0", "0", "2", "0", "0", "0", "0", "0", "0", "0", "20", "0", "0", "0", "0", "5", "5", "5", "0"]}', 60, ''),
(8, 4, 1, 4, '', '{"cb1": [], "cb2": [], "spinner": ["0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0"]}', 70, ''),
(9, 5, 1, 4, '', '{"cb1": [], "cb2": [], "spinner": ["0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0"]}', 70, ''),
(10, 6, 1, 4, '<p>Camr own bajn</p>', '{"cb1": [], "cb2": ["4", "1"], "spinner": ["0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0"]}', 45, '<p>sdfdf</p>'),
(11, 9, 1, 3, '<p>Thực hiện tốt</p>', '{"cb1": [], "cb2": [], "spinner": ["0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0"]}', 70, '');

-- --------------------------------------------------------

--
-- Table structure for table `evaluation_form`
--

CREATE TABLE `evaluation_form` (
  `ef_id` int(5) NOT NULL,
  `ef_name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ef_description` text COLLATE utf8_unicode_ci,
  `ef_available` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `evaluation_form`
--

INSERT INTO `evaluation_form` (`ef_id`, `ef_name`, `ef_description`, `ef_available`) VALUES
(1, 'Đánh giá rèn luyện học kì 2', '<p>\r\n	Xong trước ng&agrave;y 31/02</p>\r\n', 1),
(2, 'Đánh giá rèn luyện kì 2 - 2018', '<p>\r\n	Trước ng&agrave;y 30/5/2018</p>\r\n', 0);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'sinhvien', 'General User'),
(2, 'loptruong', 'Quyền lớp trưởng'),
(3, 'covan', 'Lam co van'),
(4, 'khoa', 'cntt');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `address`, `phone`) VALUES
(1, '127.0.0.1', 'member', '$2y$08$kkqUE2hrqAJtg.pPnAhvL.1iE7LIujK5LZ61arONLpaBBWh/ek61G', NULL, 'member@member.com', NULL, NULL, NULL, 'SGB6YFz3x7AsS8vi2H94NO', 1451903855, 1524541624, 1, 'Member', 'One', 'dsf', 'a'),
(2, '::1', 'giovotinhv3', '$2y$08$.R8arfpBjF/tTAlRs3cI0OMa8UnXWJ9BjQ9qKoVYvxVoH5ErYBKoi', NULL, 'tdv.dev@gmail.com', NULL, NULL, NULL, NULL, 1523608042, NULL, 1, 'Trinh Dinh', 'Viet', NULL, NULL),
(3, '::1', '15021865', '$2y$08$AxdBu0kojYLRtWSvKU6WNOuEJeI2ETsD.dm0ZUm755JxrPcVPgeUy', NULL, '15021865@vnu.edu.vn', NULL, NULL, NULL, 'h4sTDjGou.8cuxudlLl./O', 1523763905, 1524540278, 1, 'Trần', 'Văn', NULL, NULL),
(4, '::1', '15021867', '$2y$08$iQwhgXVycrGUzbJDVsALPe/2OKeO7lYYe8BQi9pvk2PJ.g1Kywt9W', NULL, '15021867@vnu.edu.vn', NULL, NULL, NULL, 's/Hzd0F9JY4mH1LNRLfMc.', 1524052183, 1524052357, 1, 'Vu', 'Phong', 'ret', 'tte'),
(5, '::1', '15021866', '$2y$08$lVYmo80kgOkbcWdoRjPI0ejIkUi8p3vTc7oAPkie/6BQPcRIGJrQC', NULL, '15021866@vnu.edu.vn', NULL, NULL, NULL, NULL, 1524052615, NULL, 1, 'Trinh Dinh', 'Tuan', NULL, '423'),
(6, '::1', '1235479', '$2y$08$lJwhGF4NYwUF3h34di0hre5ZmJMzxPPYVysbvXwKVzpq8hytU0HpC', NULL, 'covan@gmail.com', NULL, NULL, NULL, NULL, 1524065804, 1524491396, 1, 'sh', 'sfh', NULL, NULL),
(7, '::1', 'covancb', '$2y$08$y8/wu3nLrBdNs2AiW1P6h.T/3LUCsxgG1nz14Pw4Qn5sm6PHsC8O2', NULL, 'covancb@gmail.com', NULL, NULL, NULL, NULL, 1524271304, 1524540301, 1, 'wt', 'tw wtwe', NULL, NULL),
(8, '::1', 'phongdaotao', '$2y$08$N8RfpmBa3NANGeTHTHcPPOyGzChkeH48oEJMT7gK0z3MFDw241xmC', NULL, 'phongdaotao@gmail.com', NULL, NULL, NULL, NULL, 1524493244, 1524541510, 1, 'phongdaotao', 'fsfdsf', NULL, NULL),
(9, '::1', '15021869', '$2y$08$Gl06fBO3EdxEZEgOrrDnl.i3UjEJFnOOvOyw6X5iqeWlg95HzcOCi', NULL, '15021869@vnu.edu.vn', NULL, NULL, NULL, NULL, 1524540094, 1524540252, 1, 'Trịnh Đính', 'Vinh', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 3, 2),
(5, 4, 1),
(6, 5, 1),
(9, 7, 3),
(10, 6, 1),
(11, 8, 4),
(12, 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_class`
--

CREATE TABLE `user_class` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `class_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_class`
--

INSERT INTO `user_class` (`id`, `user_id`, `class_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1),
(7, 7, 1),
(8, 9, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_groups`
--
ALTER TABLE `admin_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_users_groups`
--
ALTER TABLE `admin_users_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`class_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `ef_student`
--
ALTER TABLE `ef_student`
  ADD PRIMARY KEY (`efst_id`),
  ADD KEY `efst_id` (`efst_id`);

--
-- Indexes for table `evaluation_form`
--
ALTER TABLE `evaluation_form`
  ADD PRIMARY KEY (`ef_id`),
  ADD KEY `ef_id` (`ef_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `user_class`
--
ALTER TABLE `user_class`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_groups`
--
ALTER TABLE `admin_groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `admin_users_groups`
--
ALTER TABLE `admin_users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `class_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ef_student`
--
ALTER TABLE `ef_student`
  MODIFY `efst_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `evaluation_form`
--
ALTER TABLE `evaluation_form`
  MODIFY `ef_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `user_class`
--
ALTER TABLE `user_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
