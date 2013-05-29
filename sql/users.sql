-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 15 mrt 2013 om 13:46
-- Serverversie: 5.5.20
-- PHP-Versie: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `marnixverhulst2013`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=11 ;

--
-- Gegevens worden uitgevoerd voor tabel `users`
--

INSERT INTO `users` (`pk_id`, `name`, `email`, `password`) VALUES
(6, 'jef', 'jef@hotmail.com', '383283abbd8f26a231dcbfb3af85c710'),
(7, 'ron', 'ronny@hot.com', 'ca302c435f7adeb416b7b04e89c0e882'),
(8, 'e', 'e@d.com', 'c4e041275919253c63cde8f55b9b15e1'),
(9, 'ee', 'depaus@hotmail.com', '1e2249070b6af587dbd7c149fbdc3b42'),
(10, 'eee', 'e@d.com', '2d5d5c75a9c8d56554ab8e74046ca8dc');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
