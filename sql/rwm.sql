-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 11, 2013 at 05:19 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `username`, `ride_id`, `comment_text`) VALUES
(1, 'Beirepoot', 21, 'daazsqfzersfc'),
(37, 'Beirepoot', 22, 'hello dear'),
(38, 'Beirepoot', 22, 'hello dear'),
(39, 'Beirepoot', 22, 'e'),
(40, 'Beirepoot', 22, 'e'),
(41, 'Beirepoot', 22, 'e'),
(42, 'Beirepoot', 22, 'e'),
(43, 'Beirepoot', 22, 'd'),
(44, 'Beirepoot', 22, 'd'),
(45, 'Beirepoot', 45, 'e'),
(46, 'Beirepoot', 45, 'e'),
(47, 'Beirepoot', 21, 'ed'),
(48, 'Beirepoot', 21, 'ed');

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE IF NOT EXISTS `friends` (
  `friend_id` int(11) NOT NULL AUTO_INCREMENT,
  `friend_applicant` varchar(255) NOT NULL,
  `friend_recipient` varchar(255) NOT NULL,
  `friend_status` varchar(255) NOT NULL,
  `friend_recipient_id` int(11) NOT NULL,
  `friend_applicant_id` int(11) NOT NULL,
  PRIMARY KEY (`friend_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`friend_id`, `friend_applicant`, `friend_recipient`, `friend_status`, `friend_recipient_id`, `friend_applicant_id`) VALUES
(3, 'edede', 'Beirepoot', 'Pending', 53, 67),
(15, 'Beirepoot', 'Seb', 'Accepted', 54, 53),
(17, 'Beirepoot', 'Patat', 'Pending', 6, 53);

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
  `ride_seats` int(2) NOT NULL,
  `ride_creator_id` int(11) NOT NULL,
  PRIMARY KEY (`ride_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=62 ;

--
-- Dumping data for table `rides`
--

INSERT INTO `rides` (`ride_id`, `ride_date`, `ride_time`, `username`, `ride_country`, `ride_state`, `ride_city`, `ride_street`, `ride_streetnumber`, `ride_countryto`, `ride_stateto`, `ride_cityto`, `ride_streetto`, `ride_streetnumberto`, `ride_description`, `ride_seats`, `ride_creator_id`) VALUES
(1, '0000-00-00', '00:00:00', '0', 'Belgium', 'East-Flanders', 'Dendermonde', '1', 0, '', '', '', '', 0, '', 0, 0),
(2, '0000-00-00', '00:00:00', '0', 'Belgium', 'East-Flanders', 'Dendermonde', '1', 0, '', '', '', '', 0, '', 0, 0),
(3, '0000-00-00', '00:00:00', '0', 'Belgium', 'East-Flanders', 'Dendermonde', '1', 0, '', '', '', '', 0, '', 0, 0),
(4, '0000-00-00', '00:00:00', '0', 'Belgium', 'East-Flanders', 'Dendermonde', '1', 0, '', '', '', '', 0, '', 0, 0),
(5, '0000-00-00', '00:00:00', '0', 'Belgium', 'East-Flanders', 'Dendermonde', '1', 0, '', '', '', '', 0, '', 0, 0),
(6, '0000-00-00', '00:00:00', '0', 'Belgium', 'East-Flanders', 'Dendermonde', 'Leeuwerikenlaan', 1, '', '', '', '', 0, '', 0, 0),
(7, '0000-00-00', '00:00:00', '0', 'Belgium', 'East-Flanders', 'Dendermonde', 'Leeuwerikenlaan', 1, '', '', '', '', 0, '', 0, 0),
(8, '0000-00-00', '00:00:00', '0', 'Belgium', 'East-Flanders', 'Dendermonde', 'Leeuwerikenlaan', 1, '', '', '', '', 0, '', 0, 0),
(9, '0000-00-00', '00:00:00', '', 'Belgium', 'East-Flanders', 'Dendermonde', 'Leeuwerikenlaan', 0, '', '', '', '', 0, '', 0, 0),
(10, '0000-00-00', '00:00:00', 'beirepoot', 'Belgium', 'East-Flanders', 'Dendermonde', 'Leeuwerikenlaan', 0, '', '', '', '', 0, '', 0, 0),
(11, '0000-00-00', '00:00:00', 'beirepoot', 'Belgium', 'East-Flanders', 'Dendermonde', 'Leeuwerikenlaan', 0, '', '', '', '', 0, '', 0, 0),
(12, '0000-00-00', '00:00:00', '', 'Belgium', 'East-Flanders', 'Dendermonde', 'Leeuwerikenlaan', 0, '', '', '', '', 0, '', 0, 0),
(13, '0000-00-00', '00:00:00', 'King', 'Belgium', 'East-Flanders', 'Dendermonde', 'Leeuwerikenlaan', 0, '', '', '', '', 0, '', 0, 0),
(14, '0000-00-00', '00:00:00', 'King', 'Belgium', 'East-Flanders', 'Dendermonde', 'Leeuwerikenlaan', 0, '', '', '', '', 0, '', 0, 0),
(15, '0000-00-00', '00:00:00', 'King', 'Belgium', 'East-Flanders', 'Dendermonde', 'Leeuwerikenlaan', 1, '', '', '', '', 0, '', 0, 0),
(16, '0000-00-00', '00:00:00', 'King', 'Belgium', 'East-Flanders', 'Dendermonde', 'Leeuwerikenlaan', 1, '', '', '', '', 0, '', 0, 0),
(17, '0000-00-00', '00:00:00', 'King', 'Belgium', 'East-Flanders', 'Dendermonde', 'Leeuwerikenlaan', 1, '', '', '', '', 0, '', 0, 0),
(18, '0000-00-00', '00:00:00', 'King', 'Belgium', 'East-Flanders', 'Dendermonde', 'Leeuwerikenlaan', 1, '', '', '', '', 0, '', 0, 0),
(19, '0000-00-00', '00:00:00', 'King', 'Belgium', 'East-Flanders', 'Dendermonde', 'Leeuwerikenlaan', 87, 'Brazilië', 'Rio de Janeiro', 'Rio de Janeiro', 'Rua de Cuba Libre', 137, '', 0, 0),
(20, '0000-00-00', '00:00:00', 'Beirepoot', 'Belgium', 'East-Flanders', 'Dendermonde', 'Leeuwerikenlaan', 1, 'Belgium', 'East-Flanders', 'Dendermonde', 'Leeuwerikenlaan', 1, '', 0, 0),
(21, '2013-04-09', '22:03:00', 'Beirepoot', 'Belgium', 'East-Flanders', 'Dendermonde', 'Leeuwerikenlaan', 31, 'Belgium', 'East-Flanders', 'Dendermonde', 'Burgemeester Potiaulaan', 32, 'Enjoy me and take a ride, we take a stap at Cristal Palace for 15 minutes and then we drive further to Dendermonde.', 3, 53),
(22, '0000-00-00', '00:00:00', 'Beirepoot', '', '', 'Dendermonde', '', 0, 'Belgium', 'East-Flanders', 'Dendermonde', '', 0, '', 0, 0),
(23, '0000-00-00', '00:00:00', 'Beirepoot', '', '', 'Dendermonde', '', 0, 'Belgium', 'East-Flanders', 'Lille', '', 0, '', 0, 0),
(24, '0000-00-00', '00:00:00', 'Beirepoot', '', '', 'Lille', '', 0, 'France', 'East-Flanders', 'Dendermonde', '', 0, '', 0, 0),
(25, '0000-00-00', '00:00:00', 'Beirepoot', 'Belgium', 'East-Flanders', 'Dendermonde', '', 0, 'Belgium', 'East-Flanders', 'Dendermonde', '', 0, '', 0, 0),
(26, '0000-00-00', '00:00:00', 'Beirepoot', 'Belgium', 'Provence', 'Lille', 'dsdfsd', 32, 'Belgium', 'East-Flanders', 'Dendermonde', '', 32, '', 0, 0),
(27, '0000-00-00', '00:00:00', 'Beirepoot', 'Belgium', 'East-Flanders', 'Dendermonde', 'dsdf', 32, '-------------', 'East-Flanders', 'Dendermonde', '', 32, '', 0, 0),
(28, '0000-00-00', '00:00:00', 'Beirepoot', 'Select Country', 'Select State', 'Select City', 'ddd', 13, 'Select Country', 'Select State', 'Select City', '', 13, '', 0, 0),
(29, '0000-00-00', '00:00:00', 'Beirepoot', 'Belgium', 'Provence', 'Lille', 'ddd', 322, 'Belgium', 'Provence', 'Lille', '', 322, '', 0, 0),
(30, '0000-00-00', '00:00:00', 'Beirepoot', 'Belgium', 'Provence', 'Dendermonde', 'dd', 32, 'Belgium', 'East-Flanders', 'Dendermonde', '', 32, '', 0, 0),
(31, '0000-00-00', '00:00:00', 'Beirepoot', 'Select Country', 'Select State', 'Select City', 'd', 0, 'Select Country', 'Select State', 'Select City', 'd', 0, '', 0, 0),
(32, '2013-06-09', '00:00:00', 'Beirepoot', 'Select Country', 'Select State', 'Select City', 'dd', 23, 'Select Country', 'Select State', 'Select City', 'd', 23, '', 0, 0),
(33, '2013-06-09', '00:00:00', 'Beirepoot', 'Select Country', 'Select State', 'Select City', 'd', 43, 'Select Country', 'Select State', 'Select City', 'd', 43, '', 0, 0),
(34, '0000-00-00', '00:00:00', 'Beirepoot', 'Select Country', 'Select State', 'Select City', 'fd', 32, 'Select Country', 'Select State', 'Select City', 'd', 32, '', 0, 0),
(35, '2013-06-09', '17:45:00', 'Beirepoot', 'Select Country', 'Select State', 'Select City', 'dd', 32, 'Select Country', 'Select State', 'Select City', 'd', 32, '', 0, 0),
(36, '2013-06-09', '17:46:00', 'Beirepoot', 'Select Country', 'Select State', 'Select City', 'd', 21, 'Select Country', 'Select State', 'Select City', 'ddd', 21, '', 0, 0),
(37, '2013-06-09', '17:47:00', 'Beirepoot', 'Select Country', 'Select State', 'Select City', 'hallo', 1, 'Select Country', 'Select State', 'Select City', 'hallo', 1, '', 0, 0),
(38, '2013-06-09', '17:50:00', 'Beirepoot', 'Select Country', 'Select State', 'Select City', 'dd', 3, 'Select Country', 'Select State', 'Select City', 'dd', 3, '', 0, 0),
(39, '2013-06-09', '18:00:00', 'Beirepoot', 'Select Country', 'Select State', 'Select City', 'dd', 2, 'Select Country', 'Select State', 'Select City', 'dd', 2, '', 0, 0),
(40, '2013-06-09', '19:30:00', 'Beirepoot', 'Select Country', 'Select State', 'Select City', 'd', 0, 'Select Country', 'Select State', 'Select City', 'd', 0, '', 0, 0),
(41, '0000-00-00', '00:00:00', 'Beirepoot', 'Select Country', 'Select State', 'Select City', '', 0, 'Select Country', 'Select State', 'Select City', '', 0, 'd', 0, 0),
(42, '0000-00-00', '00:00:00', 'Beirepoot', 'Select Country', 'Select State', 'Select City', '', 0, 'Select Country', 'Select State', 'Select City', '', 0, '', 0, 0),
(43, '0000-00-00', '00:00:00', 'Beirepoot', 'Select Country', 'Select State', 'Select City', '', 0, 'Select Country', 'Select State', 'Select City', '', 0, 'edzde', 0, 0),
(44, '0000-00-00', '00:00:00', 'Beirepoot', 'Select Country', 'Select State', 'Select City', '', 0, 'Select Country', 'Select State', 'Select City', '', 0, 'eddzdzade', 0, 0),
(45, '2013-06-09', '20:30:00', 'Beirepoot', 'Select Country', 'Select State', 'Select City', 'ed', 32, 'Select Country', 'Select State', 'Select City', 'dddd', 32, '', 0, 0),
(46, '2013-06-10', '22:17:00', 'ron', 'Select Country', 'Select State', 'Select City', 'ed', 0, 'Select Country', 'Select State', 'Select City', 'ed', 0, '', 0, 0),
(47, '2013-06-10', '22:19:00', 'ron', 'Select Country', 'Select State', 'Select City', 'ed', 0, 'Select Country', 'Select State', 'Select City', 'de', 0, '', 0, 0),
(48, '2013-06-10', '22:20:00', 'ron', 'Select Country', 'Select State', 'Select City', 'e', 0, 'Select Country', 'Select State', 'Select City', 'ed', 0, '', 2, 0),
(49, '2013-06-10', '22:21:00', 'ron', 'Belgium', 'East-Flanders', 'Lille', 'rfrfrf', 32, 'Belgium', 'East-Flanders', 'Dendermonde', 'ezd', 32, '', 2, 0),
(50, '2013-06-10', '22:22:00', 'ron', 'Belgium', 'East-Flanders', 'Dendermonde', 'ef', 2, 'Belgium', 'East-Flanders', 'Dendermonde', 'efef', 2, 'szfd', 2, 0),
(51, '2013-06-10', '23:14:00', 'ron', '', 'East-Flanders', 'Dendermonde', 'zd', 0, '', 'East-Flanders', 'Dendermonde', 'ez', 0, 'zd', 0, 0),
(52, '2013-06-10', '23:20:00', 'ron', '', 'East-Flanders', 'Dendermonde', 'eded', 0, '', 'East-Flanders', 'Dendermonde', 'ed', 0, 'ed', 0, 0),
(53, '2013-06-10', '23:23:00', 'ron', '', 'East-Flanders', 'Dendermonde', 'ds', 0, '', 'East-Flanders', 'Dendermonde', 'sd', 0, 'dc', 0, 0),
(54, '2013-06-10', '23:24:00', 'ron', '', 'East-Flanders', 'Dendermonde', 'ed', 0, '', 'East-Flanders', 'Dendermonde', 'z', 0, 'zx', 0, 0),
(55, '2013-06-10', '23:26:00', 'ron', '', 'Provence', 'Lille', 'd', 0, '', 'East-Flanders', 'Dendermonde', 'e', 0, 'ecd', 0, 0),
(56, '2013-06-10', '23:27:00', 'ron', '', 'East-Flanders', 'Dendermonde', 'edz', 0, '', 'East-Flanders', 'Dendermonde', 'dez', 0, 'zed', 0, 0),
(57, '2013-06-10', '23:31:00', 'edede', '', 'East-Flanders', 'Lille', 'ed', 0, '', 'East-Flanders', 'Dendermonde', 'ed', 0, 'ed', 0, 0),
(58, '2013-06-10', '23:32:00', 'edede', '', 'East-Flanders', 'Dendermonde', 'de', 0, '', 'East-Flanders', 'Dendermonde', 'ed', 0, 'ed', 0, 0),
(59, '2013-06-11', '00:23:00', 'edede', '', 'East-Flanders', 'Dendermonde', 'eeeeeeeeeeeeeee', 0, '', 'East-Flanders', 'Dendermonde', 'eee', 0, 'eeeeeeeeeeeeeeeeee', 3, 0),
(60, '2013-06-11', '16:53:00', 'Beirepoot', 'Belgium', 'East-Flanders', 'Dendermonde', 'dez', 30, 'Belgium', 'East-Flanders', 'Dendermonde', '', 0, 'dd', 5, 0),
(61, '2013-06-11', '16:55:00', 'Beirepoot', 'Belgium', 'East-Flanders', 'Dendermonde', 'ed', 3, 'Belgium', 'East-Flanders', 'Dendermonde', '', 0, 'd', 3, 53);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=68 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `fullname`, `phone`, `country`, `state`, `city`, `street`, `avatar`, `bio`) VALUES
(6, 'Patat', 'jef@hotmail.com', '383283abbd8f26a231dcbfb3af85c710', 'Jef Vermeulen', '04839303939', 'Belgium', 'Vlaams-Brabant', 'Baal', 'Balenstraat', '', 'Ik ben Jef patat, bekend van Urbanus'),
(52, 'King', 'marnix.verhulst@gmail.com', '2a57b44131ce9133bff0fb0bd6b30700', 'Marnix Verhulst', '0393939', 'Belgium', 'East Flanders', 'Dendermonde', 'King street', '1370646906', 'King'),
(53, 'Beirepoot', 'marnix.verhulst@gmail.com', '2a893ad87ccae0892ec11fa054eac76c', 'Marnix Verhulst', 'ddddd', 'Belgium', 'East Flanders', 'Dendermonde', 'd', '1370683198', 'd'),
(54, 'Seb', 'mijn@email.adres', '701c7f806bb5f5d35c39766c7f64e764', 'Seb Seb', 'Sebofoon', 'Belgium', 'East Flanders', 'Dendermonde', 'Sint Annalaan 38', '1370699827582086_10150760098344674_609939673_9303929_995040044_n.jpg', 'Ik ben Seb'),
(55, 'm', 'm', 'b0c60553c5bf0f6226acef220823eb8b', 'm', 'm', 'Belgium', 'East Flanders', 'Dendermonde', 'm', '1370815317', 'm'),
(56, 'eded', 'edz@hot.com', 'c4e041275919253c63cde8f55b9b15e1', 'ed', 'ed', 'Belgium', 'East Flanders', 'Dendermonde', 'd', '1370872324', 'd'),
(57, 'erf', 'edz@hot.com', 'c4e041275919253c63cde8f55b9b15e1', 'erf', 'er', 'Belgium', 'East Flanders', 'Dendermonde', 'e', '1370872357', 'e'),
(58, 'ededed', 'edz@hot.comeded', 'c4e041275919253c63cde8f55b9b15e1', 'e', 'e', 'Belgium', 'East Flanders', 'Dendermonde', 'e', '1370872459', 'e'),
(59, 'Beirepoo', 'edz@hot.comeded', '62c9a33bb5ad5980b94d6f3e5ec54141', 'ed', 'e', 'Belgium', 'East Flanders', 'Dendermonde', 'ed', '1370872810', 'ed'),
(60, 'zed', 'edz@hot.com', 'c4e041275919253c63cde8f55b9b15e1', 'ed', 'ed', 'Belgium', 'East Flanders', 'Dendermonde', 'e', '1370872897', 'e'),
(61, 'dedde', 'edz@hot.com', '1e2249070b6af587dbd7c149fbdc3b42', 'edede', 'e', 'Belgium', 'East Flanders', 'Dendermonde', 'e', '1370872964', 'ee'),
(62, 'ede', 'edz@hot.com', 'c4e041275919253c63cde8f55b9b15e1', 'e', 'ed', 'Belgium', 'East Flanders', 'Dendermonde', 'e', '1370873033', 'e'),
(63, 'edeed', 'edz@hot.comeded', 'b5199fc8111116b871fb2d394ec9f5a5', 'eded', 'edz', 'Belgium', 'East Flanders', 'Dendermonde', 'e', '1370874241', 'e'),
(64, 'ron', 'ron@ron.be', 'ca302c435f7adeb416b7b04e89c0e882', 'Ronny Van Damme', '4903039393', 'Belgium', 'East Flanders', 'Dendermonde', 'Leeuwerikenlaan 31', '1370889696320369_2382304848000_288830264_n.jpg', 'Ikb ben den dikke ronny'),
(65, 'e', 'edz@hot.comededed', 'b5199fc8111116b871fb2d394ec9f5a5', 'de', 'ed', 'Belgium', 'East Flanders', 'Dendermonde', 'ed', '1370899773', 'ed'),
(66, 'ed', 'edz@hot.com', '62c9a33bb5ad5980b94d6f3e5ec54141', 'de', 'edde', 'Belgium', 'East Flanders', 'Dendermonde', 'de', '1370899838', 'ed'),
(67, 'edede', 'marnix.verhulst@gmail.com', 'b5199fc8111116b871fb2d394ec9f5a5', 'ed', 'e', 'Belgium', 'East Flanders', 'Dendermonde', 'ed', '1370899873', 'de');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
