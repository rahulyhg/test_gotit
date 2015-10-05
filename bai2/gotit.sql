-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2015 at 01:46 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gotit`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `_qid` int(11) NOT NULL AUTO_INCREMENT,
  `_uid` int(11) NOT NULL,
  `_title` varchar(250) NOT NULL,
  `_content` varchar(500) NOT NULL,
  `_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `_subject` int(2) NOT NULL,
  PRIMARY KEY (`_qid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`_qid`, `_uid`, `_title`, `_content`, `_created`, `_subject`) VALUES
(1, 1, 'why 1?', '.....', '2015-10-05 10:26:00', 3),
(2, 1, 'why 2?', '.....', '2015-10-05 10:26:00', 3),
(3, 1, 'why 3?', '...', '2015-10-05 10:26:35', 1),
(4, 1, 'why 4?', '...', '2015-10-05 10:26:35', 3),
(5, 1, 'why 5?', '...', '2015-10-05 10:27:03', 3),
(6, 1, 'why 6?', '...', '2015-10-05 10:27:03', 3),
(7, 1, 'why 7?', '...', '2015-10-05 10:27:21', 3),
(8, 1, 'why 8?', '...', '2015-10-05 10:27:21', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `_uid` int(11) NOT NULL AUTO_INCREMENT,
  `_email` varchar(100) NOT NULL,
  `_password` varchar(32) NOT NULL,
  PRIMARY KEY (`_uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`_uid`, `_email`, `_password`) VALUES
(1, 'dungna@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(2, 'tun@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
