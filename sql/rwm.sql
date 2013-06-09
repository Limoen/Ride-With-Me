-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 09, 2013 at 09:22 PM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rwm`
--

-- --------------------------------------------------------

--
-- Table structure for table `checkin`
--

CREATE TABLE IF NOT EXISTS `checkin` (
  `checkin_id` int(11) NOT NULL AUTO_INCREMENT,
  `ride_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  PRIMARY KEY (`checkin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `ride_id` int(11) NOT NULL,
  `comment_text` varchar(500) NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `username`, `ride_id`, `comment_text`) VALUES
(1, 'Beirepoot', 21, 'daazsqfzersfc'),
(21, 'Beirepoot', 22, 'edeeded'),
(22, 'Beirepoot', 22, 'edeeded'),
(23, 'Beirepoot', 22, 'eeded'),
(24, 'Beirepoot', 22, 'eeded'),
(25, 'Beirepoot', 22, 'edde'),
(26, 'Beirepoot', 22, 'edde');

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE IF NOT EXISTS `friends` (
  `friend_id` int(11) NOT NULL AUTO_INCREMENT,
  `friend_applicant` varchar(255) NOT NULL,
  `friend_recipient` varchar(255) NOT NULL,
  `friend_status` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`friend_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`friend_id`, `friend_applicant`, `friend_recipient`, `friend_status`, `user_id`) VALUES
(1, 'd', 'Beirepoot', 'Accepted', 43),
(3, 'ee', 'Beirepoot', 'Pending', 0),
(4, 'dfd', 'Beirepoot', 'Pending', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rides`
--

CREATE TABLE IF NOT EXISTS `rides` (
  `ride_id` int(11) NOT NULL AUTO_INCREMENT,
  `ride_date` date NOT NULL,
  `ride_time` time NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ride_country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ride_state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ride_city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ride_street` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ride_streetnumber` int(11) NOT NULL,
  `ride_countryto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ride_stateto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ride_cityto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ride_streetto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ride_streetnumberto` int(11) NOT NULL,
  `ride_description` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ride_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=46 ;

--
-- Dumping data for table `rides`
--

INSERT INTO `rides` (`ride_id`, `ride_date`, `ride_time`, `username`, `ride_country`, `ride_state`, `ride_city`, `ride_street`, `ride_streetnumber`, `ride_countryto`, `ride_stateto`, `ride_cityto`, `ride_streetto`, `ride_streetnumberto`, `ride_description`) VALUES
(1, '0000-00-00', '00:00:00', '0', 'Belgium', 'East-Flanders', 'Dendermonde', '1', 0, '', '', '', '', 0, ''),
(2, '0000-00-00', '00:00:00', '0', 'Belgium', 'East-Flanders', 'Dendermonde', '1', 0, '', '', '', '', 0, ''),
(3, '0000-00-00', '00:00:00', '0', 'Belgium', 'East-Flanders', 'Dendermonde', '1', 0, '', '', '', '', 0, ''),
(4, '0000-00-00', '00:00:00', '0', 'Belgium', 'East-Flanders', 'Dendermonde', '1', 0, '', '', '', '', 0, ''),
(5, '0000-00-00', '00:00:00', '0', 'Belgium', 'East-Flanders', 'Dendermonde', '1', 0, '', '', '', '', 0, ''),
(6, '0000-00-00', '00:00:00', '0', 'Belgium', 'East-Flanders', 'Dendermonde', 'Leeuwerikenlaan', 1, '', '', '', '', 0, ''),
(7, '0000-00-00', '00:00:00', '0', 'Belgium', 'East-Flanders', 'Dendermonde', 'Leeuwerikenlaan', 1, '', '', '', '', 0, ''),
(8, '0000-00-00', '00:00:00', '0', 'Belgium', 'East-Flanders', 'Dendermonde', 'Leeuwerikenlaan', 1, '', '', '', '', 0, ''),
(9, '0000-00-00', '00:00:00', '', 'Belgium', 'East-Flanders', 'Dendermonde', 'Leeuwerikenlaan', 0, '', '', '', '', 0, ''),
(10, '0000-00-00', '00:00:00', 'beirepoot', 'Belgium', 'East-Flanders', 'Dendermonde', 'Leeuwerikenlaan', 0, '', '', '', '', 0, ''),
(11, '0000-00-00', '00:00:00', 'beirepoot', 'Belgium', 'East-Flanders', 'Dendermonde', 'Leeuwerikenlaan', 0, '', '', '', '', 0, ''),
(12, '0000-00-00', '00:00:00', '', 'Belgium', 'East-Flanders', 'Dendermonde', 'Leeuwerikenlaan', 0, '', '', '', '', 0, ''),
(13, '0000-00-00', '00:00:00', 'King', 'Belgium', 'East-Flanders', 'Dendermonde', 'Leeuwerikenlaan', 0, '', '', '', '', 0, ''),
(14, '0000-00-00', '00:00:00', 'King', 'Belgium', 'East-Flanders', 'Dendermonde', 'Leeuwerikenlaan', 0, '', '', '', '', 0, ''),
(15, '0000-00-00', '00:00:00', 'King', 'Belgium', 'East-Flanders', 'Dendermonde', 'Leeuwerikenlaan', 1, '', '', '', '', 0, ''),
(16, '0000-00-00', '00:00:00', 'King', 'Belgium', 'East-Flanders', 'Dendermonde', 'Leeuwerikenlaan', 1, '', '', '', '', 0, ''),
(17, '0000-00-00', '00:00:00', 'King', 'Belgium', 'East-Flanders', 'Dendermonde', 'Leeuwerikenlaan', 1, '', '', '', '', 0, ''),
(18, '0000-00-00', '00:00:00', 'King', 'Belgium', 'East-Flanders', 'Dendermonde', 'Leeuwerikenlaan', 1, '', '', '', '', 0, ''),
(19, '0000-00-00', '00:00:00', 'King', 'Belgium', 'East-Flanders', 'Dendermonde', 'Leeuwerikenlaan', 87, 'Brazilië', 'Rio de Janeiro', 'Rio de Janeiro', 'Rua de Cuba Libre', 137, ''),
(20, '0000-00-00', '00:00:00', 'Beirepoot', 'Belgium', 'East-Flanders', 'Dendermonde', 'Leeuwerikenlaan', 1, 'Belgium', 'East-Flanders', 'Dendermonde', 'Leeuwerikenlaan', 1, ''),
(21, '0000-00-00', '00:00:00', 'Beirepoot', 'Belgium', 'East-Flanders', 'Dendermonde', 'Leeuwerikenlaan', 1, 'Belgium', 'East-Flanders', 'Dendermonde', 'Burgemeester Potiaulaan', 31, ''),
(22, '0000-00-00', '00:00:00', 'Beirepoot', '', '', 'Dendermonde', '', 0, 'Belgium', 'East-Flanders', 'Dendermonde', '', 0, ''),
(23, '0000-00-00', '00:00:00', 'Beirepoot', '', '', 'Dendermonde', '', 0, 'Belgium', 'East-Flanders', 'Lille', '', 0, ''),
(24, '0000-00-00', '00:00:00', 'Beirepoot', '', '', 'Lille', '', 0, 'France', 'East-Flanders', 'Dendermonde', '', 0, ''),
(25, '0000-00-00', '00:00:00', 'Beirepoot', 'Belgium', 'East-Flanders', 'Dendermonde', '', 0, 'Belgium', 'East-Flanders', 'Dendermonde', '', 0, ''),
(26, '0000-00-00', '00:00:00', 'Beirepoot', 'Belgium', 'Provence', 'Lille', 'dsdfsd', 32, 'Belgium', 'East-Flanders', 'Dendermonde', '', 32, ''),
(27, '0000-00-00', '00:00:00', 'Beirepoot', 'Belgium', 'East-Flanders', 'Dendermonde', 'dsdf', 32, '-------------', 'East-Flanders', 'Dendermonde', '', 32, ''),
(28, '0000-00-00', '00:00:00', 'Beirepoot', 'Select Country', 'Select State', 'Select City', 'ddd', 13, 'Select Country', 'Select State', 'Select City', '', 13, ''),
(29, '0000-00-00', '00:00:00', 'Beirepoot', 'Belgium', 'Provence', 'Lille', 'ddd', 322, 'Belgium', 'Provence', 'Lille', '', 322, ''),
(30, '0000-00-00', '00:00:00', 'Beirepoot', 'Belgium', 'Provence', 'Dendermonde', 'dd', 32, 'Belgium', 'East-Flanders', 'Dendermonde', '', 32, ''),
(31, '0000-00-00', '00:00:00', 'Beirepoot', 'Select Country', 'Select State', 'Select City', 'd', 0, 'Select Country', 'Select State', 'Select City', 'd', 0, ''),
(32, '2013-06-09', '00:00:00', 'Beirepoot', 'Select Country', 'Select State', 'Select City', 'dd', 23, 'Select Country', 'Select State', 'Select City', 'd', 23, ''),
(33, '2013-06-09', '00:00:00', 'Beirepoot', 'Select Country', 'Select State', 'Select City', 'd', 43, 'Select Country', 'Select State', 'Select City', 'd', 43, ''),
(34, '0000-00-00', '00:00:00', 'Beirepoot', 'Select Country', 'Select State', 'Select City', 'fd', 32, 'Select Country', 'Select State', 'Select City', 'd', 32, ''),
(35, '2013-06-09', '17:45:00', 'Beirepoot', 'Select Country', 'Select State', 'Select City', 'dd', 32, 'Select Country', 'Select State', 'Select City', 'd', 32, ''),
(36, '2013-06-09', '17:46:00', 'Beirepoot', 'Select Country', 'Select State', 'Select City', 'd', 21, 'Select Country', 'Select State', 'Select City', 'ddd', 21, ''),
(37, '2013-06-09', '17:47:00', 'Beirepoot', 'Select Country', 'Select State', 'Select City', 'hallo', 1, 'Select Country', 'Select State', 'Select City', 'hallo', 1, ''),
(38, '2013-06-09', '17:50:00', 'Beirepoot', 'Select Country', 'Select State', 'Select City', 'dd', 3, 'Select Country', 'Select State', 'Select City', 'dd', 3, ''),
(39, '2013-06-09', '18:00:00', 'Beirepoot', 'Select Country', 'Select State', 'Select City', 'dd', 2, 'Select Country', 'Select State', 'Select City', 'dd', 2, ''),
(40, '2013-06-09', '19:30:00', 'Beirepoot', 'Select Country', 'Select State', 'Select City', 'd', 0, 'Select Country', 'Select State', 'Select City', 'd', 0, ''),
(41, '0000-00-00', '00:00:00', 'Beirepoot', 'Select Country', 'Select State', 'Select City', '', 0, 'Select Country', 'Select State', 'Select City', '', 0, 'd'),
(42, '0000-00-00', '00:00:00', 'Beirepoot', 'Select Country', 'Select State', 'Select City', '', 0, 'Select Country', 'Select State', 'Select City', '', 0, ''),
(43, '0000-00-00', '00:00:00', 'Beirepoot', 'Select Country', 'Select State', 'Select City', '', 0, 'Select Country', 'Select State', 'Select City', '', 0, 'edzde'),
(44, '0000-00-00', '00:00:00', 'Beirepoot', 'Select Country', 'Select State', 'Select City', '', 0, 'Select Country', 'Select State', 'Select City', '', 0, 'eddzdzade'),
(45, '2013-06-09', '20:30:00', 'Beirepoot', 'Select Country', 'Select State', 'Select City', 'ed', 32, 'Select Country', 'Select State', 'Select City', 'dddd', 32, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `fullname` varchar(255) COLLATE utf8_bin NOT NULL,
  `phone` varchar(255) COLLATE utf8_bin NOT NULL,
  `country` varchar(255) COLLATE utf8_bin NOT NULL,
  `state` varchar(255) COLLATE utf8_bin NOT NULL,
  `city` varchar(255) COLLATE utf8_bin NOT NULL,
  `street` varchar(255) COLLATE utf8_bin NOT NULL,
  `avatar` varchar(255) COLLATE utf8_bin NOT NULL,
  `bio` varchar(500) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=55 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `fullname`, `phone`, `country`, `state`, `city`, `street`, `avatar`, `bio`) VALUES
(6, 'jef', 'jef@hotmail.com', '383283abbd8f26a231dcbfb3af85c710', '', '', '', '', '', '', '', ''),
(33, 'ee', 'marnix.verhulst@gmail.com', 'c4e041275919253c63cde8f55b9b15e1', 'e', 'e', 'Belgium', 'Belgium', 'Belgium', 'e', '1369562448', ''),
(34, 'dfd', 'marnix.verhulst@gmail.com', '56d01eb675ff3b3229ebc0ff2d3969fa', 'd', 'd', 'Belgium', 'Belgium', 'Belgium', 'd', '1369563270', ''),
(35, 'e', 'marnix.verhulst@gmail.com', 'c4e041275919253c63cde8f55b9b15e1', 'e', 'e', 'Belgium', 'Belgium', 'Belgium', 'e', '1369563476', ''),
(38, 'Verhulst', 'marnix.verhulst@gmail.com', 'b39c1d8e0b6cb2d2f67822e5d86a320d', 'Marnix', '0479776122', 'Belgium', 'East Flanders', 'Dendermonde', 'Leeuwerikenlaan 31', '136957084629b0ad94af6911e281cb22000a1f9a0a_7.jpg', ''),
(39, 'fred', 'marnix.verhulst@gmail.com', '90cb57005eb88b26f4fe678806cd4552', 'v', 'v', 'Belgium', 'East Flanders', 'Dendermonde', 'ddd', '1369571778320369_2382304848000_288830264_n.jpg', ''),
(40, 'Jef', 'jef@hotmail.com', 'b39c1d8e0b6cb2d2f67822e5d86a320d', 'Van Acker', '0489389030', 'Belgium', 'East Flanders', 'Dendermonde', 'dd', '1369579818669ec304cfe16dcf15bea690c558949d.jpg', ''),
(41, 'ronny', 'marnix.verhulst@gmail.com', '56d01eb675ff3b3229ebc0ff2d3969fa', 'd', 'd', 'Belgium', 'East Flanders', 'Dendermonde', 'dd', '136958272729b0ad94af6911e281cb22000a1f9a0a_7.jpg', ''),
(42, 'verhulstje', 'marnix.verhulst@gmail.com', '56d01eb675ff3b3229ebc0ff2d3969fa', 'van ackoleyende merde', 'd', 'Belgium', 'East Flanders', 'Dendermonde', 'ddd', '136958536729b0ad94af6911e281cb22000a1f9a0a_7.jpg', ''),
(43, 'Verhulst', 'marnix.verhulst@gmail.com', 'c768ac5a7885b3fc998f1ca74ff8f286', 'Marnixke', '0479776122', 'Belgium', 'East Flanders', '9200 Dendermonde', 'Leeuwerikenlaan 31', '136967416029b0ad94af6911e281cb22000a1f9a0a_7.jpg', 'Hi! My name is Marnix! I''d look to meet new people who are nearby. With this app, it''s my chance!'),
(44, 'mama', 'mama@hotmail.com', 'f8792837c40c20cd0935c76fc6035928', 'maka', 'mama', 'Belgium', 'East Flanders', 'Dendermonde', '', '1369824446320369_2382304848000_288830264_n.jpg', ''),
(45, 'd', 'mama@hotmail.com', 'b0c60553c5bf0f6226acef220823eb8b', 'zeda', 'zead', 'Belgium', 'East Flanders', 'Dendermonde', '', '1369839951', ''),
(46, 'de', 'marnix.verhulst@gmail.com', 'e26c65f44fe6c227125319123e3ce79c', 'ed', 'ed', 'Belgium', 'East Flanders', 'Dendermonde', 'c', '1369839972669ec304cfe16dcf15bea690c558949d.jpg', ''),
(47, 'ed', 'marnix.verhulst@gmail.com', '56d01eb675ff3b3229ebc0ff2d3969fa', 'ed', 'ed', 'Belgium', 'East Flanders', 'Dendermonde', 'd', '1369840914320369_2382304848000_288830264_n.jpg', 'd'),
(48, 'deezd', 'marnix.verhulst@gmail.com', '62c9a33bb5ad5980b94d6f3e5ec54141', 'e', 'edz', 'Select Country', 'Select State', 'Select City', 'ed', '1370456100', 'ed'),
(49, 'sdfze', 'd@d.com', '56d01eb675ff3b3229ebc0ff2d3969fa', 'Marnix Verhulst', 'dd', 'Belgium', 'East Flanders', 'Dendermonde', 'ddd', '1370618930', 'd'),
(50, 'beirepoot', 'd@d.com', '56d01eb675ff3b3229ebc0ff2d3969fa', 'Marnix Verhulst', 'dddd', 'Belgium', 'East Flanders', 'Dendermonde', 'd', '136967416029b0ad94af6911e281cb22000a1f9a0a_7.jpg', 'Hello i''m dickhead'),
(51, 'e', 'edz@hot.com', 'c4e041275919253c63cde8f55b9b15e1', 'e', 'ee', 'Belgium', 'East Flanders', 'Dendermonde', 'e', '1370646687', 'e'),
(52, 'King', 'marnix.verhulst@gmail.com', '2a57b44131ce9133bff0fb0bd6b30700', 'Marnix Verhulst', '0393939', 'Belgium', 'East Flanders', 'Dendermonde', 'King street', '1370646906', 'King'),
(53, 'Beirepoot', 'marnix.verhulst@gmail.com', '2a893ad87ccae0892ec11fa054eac76c', 'Marnix Verhulst', 'ddddd', 'Belgium', 'East Flanders', 'Dendermonde', 'd', '1370683198', 'd'),
(54, 'Seb', 'mijn@email.adres', '701c7f806bb5f5d35c39766c7f64e764', 'Seb Seb', 'Sebofoon', 'Belgium', 'East Flanders', 'Dendermonde', 'Sint Annalaan 38', '1370699827582086_10150760098344674_609939673_9303929_995040044_n.jpg', 'Ik ben Seb');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
