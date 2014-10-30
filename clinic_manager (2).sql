-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2014 at 10:58 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `clinic_manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE IF NOT EXISTS `appointment` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `doctorId` int(9) NOT NULL,
  `userID` int(9) NOT NULL,
  `appointmentdate` date NOT NULL,
  KEY `doctorId` (`doctorId`),
  KEY `userID` (`userID`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `doctorId`, `userID`, `appointmentdate`) VALUES
(1, 13, 4, '2014-09-18'),
(2, 13, 6, '2014-09-22'),
(3, 13, 5, '2014-09-20'),
(4, 4, 1, '2014-09-19'),
(5, 13, 1, '2014-09-20'),
(6, 13, 2, '2014-09-20'),
(8, 13, 3, '2014-09-20'),
(9, 13, 4, '2014-09-20'),
(10, 13, 5, '2014-09-20'),
(11, 13, 6, '2014-09-20'),
(12, 13, 7, '2014-09-20'),
(13, 13, 8, '2014-09-20'),
(14, 13, 9, '2014-09-20'),
(15, 13, 10, '2014-09-20'),
(16, 13, 11, '2014-09-21'),
(17, 13, 1, '2014-09-25');

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE IF NOT EXISTS `area` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dept` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`id`, `dept`) VALUES
(1, 'Surgeon'),
(2, 'Pediatrics'),
(3, 'Nurse'),
(4, 'Optisian'),
(5, 'Dentist'),
(7, 'None');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE IF NOT EXISTS `doctor` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(40) NOT NULL,
  `password` varchar(20) NOT NULL,
  `gender` varchar(9) NOT NULL,
  `verified` varchar(9) NOT NULL,
  `released` varchar(9) NOT NULL,
  `userName` varchar(20) NOT NULL,
  `speciality` int(11) NOT NULL DEFAULT '7',
  `profilepic` varchar(200) NOT NULL DEFAULT 'doctor\\images\\boss.jpg',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`,`phone`),
  KEY `speciality` (`speciality`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Table for all the doctors in the Hospital' AUTO_INCREMENT=14 ;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `fname`, `lname`, `email`, `phone`, `password`, `gender`, `verified`, `released`, `userName`, `speciality`, `profilepic`) VALUES
(1, 'Hood', 'grand', 'bet@wer.com', 'tell:87736442222. ', 'ber', 'male', 'true', 'false', 'Badfreek', 5, 'doctor/images/boss.jpg'),
(4, 'uewhf', 'kmsjhcvf', 'kidsbc@jd.cc', 'tell:87667673676. ', 'you', 'female', 'false', 'false', 'Kalubb', 7, 'doctor/images/boss.jpg'),
(5, 'dhjdj', 'ydyushdsh', 'yuefiu@ghdsm.ds', 'tell:66666666777. ', 'nnn', 'female', 'false', 'false', 'Kalut', 3, 'doctor/images/boss.jpg'),
(6, 'dhjdj', 'ydyushdsh', 'yuefiu@ghdsm.dshy', 'tell:66666666777. ', 'jjj', 'female', 'false', 'true', 'Kalup', 2, 'doctor/images/boss.jpg'),
(12, 'Venumn', 'bbbb', 'bkebb@iii.ccc', 'tell:08133232455. ', 'vex', 'female', 'true', 'false', 'Kaluvbg', 4, 'doctor/images/boss.jpg'),
(13, 'Ndubuisi', 'George', 'ndu4george@dogel.exmed.com', '081429924666', 'tryagain', 'male', 'true', 'false', 'Badoo', 1, 'propic/IMG_20140718_162755.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `meetup`
--

CREATE TABLE IF NOT EXISTS `meetup` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `docid` int(9) NOT NULL,
  `userid` int(9) NOT NULL,
  `date` date NOT NULL,
  `delete` varchar(10) NOT NULL DEFAULT 'false',
  PRIMARY KEY (`id`),
  KEY `docid` (`docid`,`userid`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `meetup`
--

INSERT INTO `meetup` (`id`, `docid`, `userid`, `date`, `delete`) VALUES
(1, 13, 7, '2014-09-17', 'false'),
(2, 13, 4, '2014-09-23', 'false'),
(3, 13, 5, '2014-09-17', 'false'),
(4, 13, 6, '2014-09-29', 'false'),
(5, 13, 3, '2014-09-26', 'false'),
(6, 13, 2, '2014-09-14', 'false'),
(7, 13, 3, '2014-09-17', 'false'),
(8, 13, 4, '2014-09-22', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `messagesfromstaff`
--

CREATE TABLE IF NOT EXISTS `messagesfromstaff` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `staffId` int(9) NOT NULL,
  `docid` int(9) NOT NULL,
  `message` text NOT NULL,
  `date` date NOT NULL,
  `deleated` varchar(10) NOT NULL DEFAULT 'false',
  PRIMARY KEY (`id`),
  KEY `docId` (`staffId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `messagesfromstaff`
--

INSERT INTO `messagesfromstaff` (`id`, `staffId`, `docid`, `message`, `date`, `deleated`) VALUES
(1, 12, 1, 'ujv  nyufsnnmgv kdfnv vsn dfsvn dfs Aliquatjusto quisque nam consequat doloreet vest orna partur scetur portortis nam. Metadipiscing eget facilis elit sagittis felisi eger id justo maurisus convallicitur.\r\n\r\nDapiensociis temper donec auctortortis cumsan et curabitur condis lorem loborttis leo. Ipsumcommodo libero nunc at in velis tincidunt pellentum tincidunt vel lorem. ', '2014-09-17', 'false'),
(2, 1, 1, 'Aliquatjusto quisque nam consequat doloreet vest orna partur scetur portortis nam. Metadipiscing eget facilis elit sagittis felisi eger id justo maurisus convallicitur.\r\n\r\nDapiensociis temper donec auctortortis cumsan et curabitur condis lorem loborttis leo. Ipsumcommodo libero nunc at in velis tincidunt pellentum tincidunt vel lorem.Aliquatjusto quisque nam consequat doloreet vest orna partur scetur portortis nam. Metadipiscing eget facilis elit sagittis felisi eger id justo maurisus convallicitur.\r\n\r\nDapiensociis temper donec auctortortis cumsan et curabitur condis lorem loborttis leo. Ipsumcommodo libero nunc at in velis tincidunt pellentum tincidunt vel lorem.', '2014-09-17', 'false'),
(3, 1, 1, 'sdh', '2014-09-17', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `messagesfromusers`
--

CREATE TABLE IF NOT EXISTS `messagesfromusers` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `docId` int(9) NOT NULL,
  `userid` int(9) NOT NULL,
  `message` text NOT NULL,
  `date` date NOT NULL,
  `deleated` varchar(10) NOT NULL DEFAULT 'false',
  PRIMARY KEY (`id`),
  KEY `docId` (`docId`,`userid`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `messagesfromusers`
--

INSERT INTO `messagesfromusers` (`id`, `docId`, `userid`, `message`, `date`, `deleated`) VALUES
(1, 13, 2, 'ujv  nyufsnnmgv kdfnv vsn dfsvn dfs Aliquatjusto quisque nam consequat doloreet vest orna partur scetur portortis nam. Metadipiscing eget facilis elit sagittis felisi eger id justo maurisus convallicitur.\r\n\r\nDapiensociis temper donec auctortortis cumsan et curabitur condis lorem loborttis leo. Ipsumcommodo libero nunc at in velis tincidunt pellentum tincidunt vel lorem.', '2014-09-17', 'false'),
(2, 13, 6, 'Aliquatjusto quisque nam consequat doloreet vest orna partur scetur portortis nam. Metadipiscing eget facilis elit sagittis felisi eger id justo maurisus convallicitur.\r\n\r\nDapiensociis temper donec auctortortis cumsan et curabitur condis lorem loborttis leo. Ipsumcommodo libero nunc at in velis tincidunt pellentum tincidunt vel lorem.Aliquatjusto quisque nam consequat doloreet vest orna partur scetur portortis nam. Metadipiscing eget facilis elit sagittis felisi eger id justo maurisus convallicitur.\r\n\r\nDapiensociis temper donec auctortortis cumsan et curabitur condis lorem loborttis leo. Ipsumcommodo libero nunc at in velis tincidunt pellentum tincidunt vel lorem.', '2014-09-17', 'false'),
(3, 13, 9, 'sdh', '2014-09-17', 'false'),
(4, 13, 5, 'usxj h iu g kyugy kc uch yuk', '2014-09-19', 'false'),
(5, 13, 1, ' Pls i have ebolaphobia', '2014-09-19', 'false'),
(6, 5, 1, 'Bross abeg halla me na', '2014-09-19', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `pharm`
--

CREATE TABLE IF NOT EXISTS `pharm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `drugname` varchar(200) NOT NULL,
  `available` varchar(6) NOT NULL DEFAULT 'true',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Drugs in the store' AUTO_INCREMENT=16 ;

--
-- Dumping data for table `pharm`
--

INSERT INTO `pharm` (`id`, `drugname`, `available`) VALUES
(1, 'Valium 5', 'true'),
(2, 'Amala', 'true'),
(3, 'Nivaquine', 'true'),
(4, 'Chloroquine', 'true'),
(5, 'Kachika', 'false'),
(6, 'Belitone', 'true'),
(7, 'Godison', 'true'),
(8, 'Paracetamol', 'true'),
(9, 'Panadol', 'true'),
(10, 'Methodex', 'true'),
(11, 'Nivaquine', 'true'),
(12, 'Booster', 'true'),
(13, 'Felvin', 'true'),
(14, 'MistMag', 'true'),
(15, ' Qinin', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `superadmain`
--

CREATE TABLE IF NOT EXISTS `superadmain` (
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(30) NOT NULL,
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `userName` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `superadmain`
--

INSERT INTO `superadmain` (`fname`, `lname`, `email`, `password`, `id`, `userName`) VALUES
('George', 'Onwuasoanya', 'ndu4george@gmail.com', 'ndu4life', 1, 'theBoss');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `phone` varchar(40) NOT NULL,
  `gender` varchar(9) NOT NULL,
  `userName` varchar(20) NOT NULL,
  `profilepic` varchar(500) NOT NULL DEFAULT 'user/images/boss.jpg',
  `released` varchar(10) NOT NULL DEFAULT 'false',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`,`phone`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `password`, `phone`, `gender`, `userName`, `profilepic`, `released`) VALUES
(1, 'newMan', 'Kai', 'bbd@hhw.cds', 'deking', 'tell:08433223233. ', 'male', 'Kalu', 'propic/=_=D ({}) Ennyhorlar=) ;);;) @_--.jpg', 'false'),
(2, 'Mike', 'Adeniyi', 'vet@ewr.vrt', 'user1', 'tell:08122776445. ', 'female', 'user1', 'user/images/boss.jpg', 'false'),
(3, 'Dorobel', 'Benson', 'nduttt@ddd.com', 'tryagain2', 'tell:73664533322. ', 'male', 'Badoo2', 'user/images/boss.jpg', 'false'),
(4, 'Dorobel', 'Benson', 'nduttt@ddd.coms', 'vex', 'tell:73664533322. ', 'male', 'Badoo22', 'user/images/boss.jpg', 'false'),
(5, 'Dorobel', 'Benson', 'nduttt@ddd.comse', 'ver', 'tell:73664533322. ', 'male', 'Badoo222', 'user/images/boss.jpg', 'false'),
(6, 'Hood', 'grand', 'bet@wer.com', 'vex', 'tell:87736442222. ', 'male', 'Badfreek', 'user/images/boss.jpg', 'false'),
(7, 'hjdbsc', 'dsjdshbhj', 'hjdsb@hjnmdc.com', '419', 'tell:76644433444. ', 'male', 'Kaluk', 'user/images/boss.jpg', 'false'),
(8, 'shjds', 'dskjd', 'bbasn@udsm.ds', 'vvv', 'tell:54556787899. ', 'female', 'Kaluh', 'user/images/boss.jpg', 'false'),
(9, 'Vic', 'vitus', 'vvv@vvv.vvv', 'vvv', 'tell:08163228833. ', 'female', 'Kaluv', 'user/images/boss.jpg', 'false'),
(10, 'Brow', ' Mizzy', 'batboy@czt.ff', 'life', 'tell:08163222222', 'Male', 'Lifee', 'user/images/boss.jpg', 'false'),
(11, 'Bater', 'Comba', 'bsido@get.vom', 'bleat', 'Tel: 9838893238', 'female', 'Goal', 'user/images/boss.jpg', 'false'),
(12, 'siughjas', 'aschakjs', 'asas@ydsys.as', 'ggg', 'tell:99999999999. ', 'female', 'Khh', 'user/images/boss.jpg', 'false');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`doctorId`) REFERENCES `doctor` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `doctor_ibfk_1` FOREIGN KEY (`speciality`) REFERENCES `area` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `meetup`
--
ALTER TABLE `meetup`
  ADD CONSTRAINT `meetup_ibfk_1` FOREIGN KEY (`docid`) REFERENCES `doctor` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `meetup_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `messagesfromstaff`
--
ALTER TABLE `messagesfromstaff`
  ADD CONSTRAINT `messagesfromstaff_ibfk_1` FOREIGN KEY (`staffId`) REFERENCES `doctor` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `messagesfromusers`
--
ALTER TABLE `messagesfromusers`
  ADD CONSTRAINT `messagesfromusers_ibfk_1` FOREIGN KEY (`docId`) REFERENCES `doctor` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `messagesfromusers_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
