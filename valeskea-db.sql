-- phpMyAdmin SQL Dump
-- version 2.11.9.4
-- http://www.phpmyadmin.net
--
-- Host: oniddb
-- Generation Time: Dec 06, 2011 at 03:40 PM
-- Server version: 5.1.49
-- PHP Version: 5.2.6-1+lenny13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `valeskea-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `Address`
--

DROP TABLE IF EXISTS `Address`;
CREATE TABLE IF NOT EXISTS `Address` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `line_1` varchar(90) NOT NULL,
  `line_2` varchar(90) NOT NULL,
  `city` varchar(45) NOT NULL,
  `state` varchar(2) NOT NULL,
  `zip` int(11) NOT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `Address`
--

INSERT INTO `Address` (`aid`, `line_1`, `line_2`, `city`, `state`, `zip`) VALUES
(0, 'stuff', 'more stuff', 'Corvallis', 'OR', 97331),
(1, '2112 Goodall Ct.', ' ', 'Lake Oswego', 'OR', 97034),
(2, '124 NW 7th St. #613', 'Apt. 204', 'Corvallis', 'OR', 97330),
(3, '326 NW 5th', ' ', 'Lake Oswego', 'OR', 97034),
(4, '550 SW Boones Ferry Rd.', 'Apt. 108', 'Lake Oswego', 'OR', 97035),
(5, ' 990 SW Venice St.', ' ', 'Los Angeles', 'CA', 90291),
(18, 'f', 'f', 'f', 'f', 0),
(19, 'u', 'u', 'u', 'u', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Books`
--

DROP TABLE IF EXISTS `Books`;
CREATE TABLE IF NOT EXISTS `Books` (
  `bid` int(11) NOT NULL AUTO_INCREMENT,
  `isbn` varchar(11) NOT NULL,
  `title` varchar(80) NOT NULL,
  `author` varchar(80) NOT NULL,
  `genre` varchar(20) DEFAULT NULL,
  `keywords` varchar(100) DEFAULT NULL,
  `dewey_decimal` double DEFAULT NULL,
  `publisher` varchar(50) DEFAULT NULL,
  `copywrite_date` datetime DEFAULT NULL,
  `due_date` datetime DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  PRIMARY KEY (`bid`),
  KEY `uid` (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `Books`
--

INSERT INTO `Books` (`bid`, `isbn`, `title`, `author`, `genre`, `keywords`, `dewey_decimal`, `publisher`, `copywrite_date`, `due_date`, `uid`) VALUES
(0, '1234567890', 'The Thing', 'Some person', 'science fiction', 'thing, science, fiction, person', 0, NULL, NULL, '2011-12-07 00:50:17', 2),
(1, '1248764987', 'Inheritance', 'Christopher Paolini', 'fantasy', 'dragon, eragon, fantasy', 0, NULL, NULL, NULL, NULL),
(2, '8963765987', 'The Chronicles of Narnia: The Silver Chair', 'CS Lewis', 'fantasy', 'silver, chair, lewis, narnia', 0, NULL, NULL, '2011-12-10 00:50:00', NULL),
(3, '8075873457', 'On the Subjection of Women', 'John Stuart Mill', 'nonfiction', 'women, feminism, Mill, philosophy', 293.33, NULL, NULL, NULL, 1),
(4, '8567094876', 'The Divine Comedy', 'Dante Alighieri', 'fantasy', 'hell, hades, 7, seven, dante, inferno', 0, NULL, NULL, NULL, 4),
(5, '4964722574', 'The Agony and the Ecstasy', 'Irving Stone', 'historical/biographi', 'Michelangelo, Agony, Ecstasy, Stone, Florence', 0, NULL, NULL, NULL, 5),
(6, '2879976488', 'Harry Potter and the Sorcerer''s Stone', 'JK Rowling', 'fantasy', 'potter, rowling, sorcerers, wizard', 0, NULL, NULL, NULL, NULL),
(7, '9908587654', 'The Eye of the World', 'Robert Jordan', 'fantasy', 'wheel, time, world, jordan, eye, robert, james, rigney', 0, NULL, NULL, NULL, 0),
(8, '6953386988', 'Speak', 'Laurie Halse Anderson', 'teen fiction', 'therapy, rape, high-school, alcohol, anderson, speak', 0, NULL, NULL, NULL, 0),
(9, '2147483647', 'The Intelligent Investor', 'Benjamin Graham', 'Business & Finance', 'intelligent investor DJIA common stocks P/E ratio preferred stocks bull market index fund Earned per', 123.456, NULL, NULL, '2011-12-22 00:50:34', 2),
(11, '0439023483', 'The Hunger Games', 'Suzanne Collins', 'Science Fiction', 'hunger, games, suzanne, science, fiction, distopia, future', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Requested`
--

DROP TABLE IF EXISTS `Requested`;
CREATE TABLE IF NOT EXISTS `Requested` (
  `rbid` int(11) NOT NULL AUTO_INCREMENT,
  `isbn` varchar(45) NOT NULL,
  `title` varchar(80) DEFAULT NULL,
  `author` varchar(80) DEFAULT NULL,
  `uid` int(11) NOT NULL,
  `date_requested` date DEFAULT NULL,
  PRIMARY KEY (`rbid`),
  KEY `uid` (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `Requested`
--

INSERT INTO `Requested` (`rbid`, `isbn`, `title`, `author`, `uid`, `date_requested`) VALUES
(1, '2147483647', 'Inheritance', 'Christopher Paolini', 0, '2011-11-27'),
(5, '9780439023498', 'Catching Fire', 'Suzanne Collins', 1, NULL),
(8, '8675309', 'How to Get More Sleep', 'Albert', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Reviews`
--

DROP TABLE IF EXISTS `Reviews`;
CREATE TABLE IF NOT EXISTS `Reviews` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `review_title` varchar(45) NOT NULL,
  `text` varchar(1000) NOT NULL,
  `star_rating` int(11) NOT NULL,
  `r_date` datetime NOT NULL,
  `bid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  PRIMARY KEY (`rid`),
  KEY `bid` (`bid`),
  KEY `uid` (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `Reviews`
--

INSERT INTO `Reviews` (`rid`, `review_title`, `text`, `star_rating`, `r_date`, `bid`, `uid`) VALUES
(1, 'hello_world', 'Dragons are awesome, and so is Paolini. That is all.', 2, '2011-11-21 20:15:34', 1, 1),
(2, 'Praise for Inheritance', 'I will now use big words to sounds intellectual. Microcosm! Multifarious! Expeditious! Pontificate! Oh, and Inheritance is a pretty killer book. Yay! Austin is still wrestling with the css. Perhaps we will not sleep tonight...? But how is that different from any other night?!', 5, '2010-05-10 03:45:55', 1, 2),
(3, 'Praise for JS Mill', 'This is actually an argument supporting the inclusion of women on basic rights. Yay! An early, male feminist.', 1, '2002-07-12 20:14:50', 3, 3),
(6, 'sfsdsdf', 'sdafsd', 2, '0000-00-00 00:00:00', 2, 1),
(8, 'fasdlkjf;ldsjaflkj', 'asdfkjsd;jfklsdj', 3, '0000-00-00 00:00:00', 1, 2),
(9, 'sdf', 'Review Textaf', 5, '0000-00-00 00:00:00', 2, 2),
(10, 'The Best Book Ever', 'This book started me on a fantastic journey that lasted throughout my childhood.', 4, '0000-00-00 00:00:00', 6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

DROP TABLE IF EXISTS `Users`;
CREATE TABLE IF NOT EXISTS `Users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(90) NOT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `aid` int(11) NOT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`username`),
  KEY `aid` (`aid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`uid`, `username`, `password`, `email`, `phone`, `admin`, `aid`) VALUES
(0, 'iwantabook', 'istillwantabook', 'iwantabook@yahoo.com', 5555555555, 1, 0),
(1, 'Maackk', 'KTMisAwesome', 'maackk@email.edu', 5555555555, 1, 2),
(2, 'Valeskea', 'Ada!L', 'valeskea@.edu', 5555555555, 1, 1),
(3, 'McGuinessE', 'NotTheBeer', 'mcguinesse@email.edu', 5555555555, 0, 3),
(4, 'UnrathM', 'IsAsian', 'unrathm@email.edu', 5555555555, 0, 4),
(5, 'BurnsChri', 'dayandnight', 'burnschri@email.edu', 5555555555, 0, 5);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Books`
--
ALTER TABLE `Books`
  ADD CONSTRAINT `Books_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `Users` (`uid`);

--
-- Constraints for table `Requested`
--
ALTER TABLE `Requested`
  ADD CONSTRAINT `Requested_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `Users` (`uid`);

--
-- Constraints for table `Reviews`
--
ALTER TABLE `Reviews`
  ADD CONSTRAINT `Reviews_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `Users` (`uid`),
  ADD CONSTRAINT `Reviews_ibfk_1` FOREIGN KEY (`bid`) REFERENCES `Books` (`bid`);

--
-- Constraints for table `Users`
--
ALTER TABLE `Users`
  ADD CONSTRAINT `Users_ibfk_1` FOREIGN KEY (`aid`) REFERENCES `Address` (`aid`) ON DELETE CASCADE;
