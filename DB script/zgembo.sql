-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2015 at 06:22 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `zgembo`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `newsid` bigint(20) NOT NULL,
  `text` text COLLATE utf32_croatian_ci NOT NULL,
  `mail` text COLLATE utf32_croatian_ci NOT NULL,
  `visitor` text COLLATE utf32_croatian_ci NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 COLLATE=utf32_croatian_ci AUTO_INCREMENT=20 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `newsid`, `text`, `mail`, `visitor`, `time`) VALUES
(1, 3, 'ovo je neki text', 'mail@mail.com', 'visitor', '2015-08-27 15:30:12'),
(2, 3, 'text', 'email', 'visitor', '2015-08-28 08:01:00'),
(3, 4, 'komentar', 'mail@mail.com', 'neko', '2015-08-29 21:29:20'),
(4, 4, 'awdawddawdawadwawdawdawddaw', 'wdadw@bvbnb@sas', 'awdawdwdaawdawd', '2015-08-30 00:00:00'),
(5, 0, 'text', 'email', 'visitor', '2015-08-29 04:30:00'),
(6, 0, 'text', 'email', 'visitor', '2015-08-29 04:32:00'),
(11, 7, 'wdwaawd', 'awdwdadwaa', 'awdwdawad', '2015-08-29 06:50:00'),
(12, 4, 'awdawd', 'awdawd', 'awddawd', '2015-08-29 06:52:00'),
(14, 10, 'aaaa', 'aaa', 'aaa', '2015-08-29 11:42:00'),
(15, 10, 'awdawdawd', 'dawawd', 'awddaw', '2015-08-29 11:55:00'),
(16, 12, 'a', 'a', 'a', '2015-08-30 03:06:00');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `author` text COLLATE utf32_croatian_ci NOT NULL,
  `time` datetime NOT NULL,
  `text` text COLLATE utf32_croatian_ci NOT NULL,
  `moretext` text COLLATE utf32_croatian_ci NOT NULL,
  `image` text COLLATE utf32_croatian_ci NOT NULL,
  `header` text COLLATE utf32_croatian_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 COLLATE=utf32_croatian_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `author`, `time`, `text`, `moretext`, `image`, `header`) VALUES
(9, 'Nihad Ahmetovic', '2015-08-29 08:46:00', 'dwawdawdawd', 'dwawdaawd awd adaw da daw awd awd ad adawd awd awd aa dad wadw ad w', 'Images/5.jpg', 'sss'),
(10, 'Nihad Ahmetovic', '2015-08-29 11:41:00', 'dwaadawdaw', 'wdawaddawdawd', 'Images/1.jpg', 'aaa'),
(11, 'Nihad Ahmetovic', '2015-08-30 03:49:00', 'wadawddawawdadwdaw', 'awdawddawawddwadadadwadwdawdaw', 'Images/5.jpg', 'adada');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(25) COLLATE utf32_croatian_ci NOT NULL,
  `lastname` varchar(25) COLLATE utf32_croatian_ci NOT NULL,
  `password` text COLLATE utf32_croatian_ci NOT NULL,
  `role` int(11) NOT NULL,
  `email` text COLLATE utf32_croatian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 COLLATE=utf32_croatian_ci AUTO_INCREMENT=21 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `password`, `role`, `email`) VALUES
(12, 'Nihad', 'Ahmetovic', 'e10adc3949ba59abbe56e057f20f883e', 1, 'nihad92@gmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
