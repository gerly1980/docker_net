-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2020-07-30 16:46:30
-- 服务器版本： 5.5.62-log
-- PHP Version: 7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `net`
--

-- --------------------------------------------------------

--
-- 表的结构 `container`
--

CREATE TABLE IF NOT EXISTS `container` (
  `id` int(11) NOT NULL,
  `container_name` varchar(255) DEFAULT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `homework_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `need_create` varchar(255) DEFAULT NULL,
  `need_commit` varchar(255) DEFAULT NULL,
  `port` int(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `homework_student`
--

CREATE TABLE IF NOT EXISTS `homework_student` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `homework_id` int(11) DEFAULT NULL,
  `statu` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `homework_student`
--

INSERT INTO `homework_student` (`id`, `student_id`, `homework_id`, `statu`) VALUES
(35, 12, 1, '待完成'),
(36, 12, 3, '待完成'),
(37, 12, 5, '待完成');

-- --------------------------------------------------------

--
-- 表的结构 `homework_teacher`
--

CREATE TABLE IF NOT EXISTS `homework_teacher` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `des` varchar(255) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `image_id` int(11) DEFAULT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `homework_teacher`
--

INSERT INTO `homework_teacher` (`id`, `title`, `des`, `teacher_id`, `image_id`, `start_time`, `end_time`) VALUES
(1, '测试exp1', '描述12', 14, -1, '2020-07-29 10:44:17', '2020-07-30 10:44:19'),
(3, '测试exp2', '描述2', 14, -1, '2020-07-28 10:44:25', '2020-07-31 10:44:27'),
(5, '测试exp3', 'ceshi3', 14, -1, '2020-07-29 11:42:58', '2020-07-30 00:00:00'),
(8, '4', '4', 14, -1, '2020-07-30 12:57:07', '2020-07-31 00:00:00'),
(9, '5', '5', 14, -1, '2020-07-30 14:49:35', '2020-07-31 00:00:00'),
(10, '6', '6', 14, -1, '2020-07-30 15:35:11', '2020-07-31 00:00:00');

-- --------------------------------------------------------

--
-- 表的结构 `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `id` int(11) NOT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `homework_id` int(11) DEFAULT NULL,
  `need_del` int(255) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `port`
--

CREATE TABLE IF NOT EXISTS `port` (
  `port` int(255) NOT NULL,
  `flag` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `port`
--

INSERT INTO `port` (`port`, `flag`) VALUES
(1050, '0'),
(1051, '0'),
(1052, '0'),
(1053, '0'),
(1054, '0'),
(1055, '0'),
(1056, '0'),
(1057, '0'),
(1058, '0'),
(1059, '0'),
(1060, '0');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `passwd` varchar(255) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `passwd`, `teacher_id`, `time`, `type`) VALUES
(12, 'stu', '63ee451939ed580ef3c4b6f0109d1fd0', 14, '2020-07-25 16:05:59', 'student'),
(14, 'tea', '63ee451939ed580ef3c4b6f0109d1fd0', -1, '2020-07-27 17:38:40', 'teacher'),
(16, 'admin', '63ee451939ed580ef3c4b6f0109d1fd0', -1, '2020-07-30 11:09:23', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `container`
--
ALTER TABLE `container`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homework_student`
--
ALTER TABLE `homework_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homework_teacher`
--
ALTER TABLE `homework_teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `port`
--
ALTER TABLE `port`
  ADD PRIMARY KEY (`port`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `container`
--
ALTER TABLE `container`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `homework_student`
--
ALTER TABLE `homework_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `homework_teacher`
--
ALTER TABLE `homework_teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
