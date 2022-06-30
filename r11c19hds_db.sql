-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 30, 2022 at 01:04 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `r11c19hds_db`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_covidencounter` ()   SELECT COUNT(users.userID) as covidencounter_count FROM users WHERE users.covid_encounter = 1$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_fevercount` ()   SELECT COUNT(users.userID) as fever_count FROM users
WHERE users.body_temp > 37.5$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_foreignercount` ()   SELECT COUNT(users.userID) as foreignercount FROM users
WHERE users.nationality NOT IN("FILIPINO","Filipino","filipino")$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getrecordbyid` (IN `userid` INT(20))   SELECT * FROM users WHERE users.userID = userid$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getrecords` ()   SELECT * FROM users ORDER BY users.userID DESC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_minorcount` ()   SELECT COUNT(users.userID) as minor_count FROM users
WHERE users.age <= 17$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_numberofadult` ()   SELECT COUNT(users.userID) as adult_count FROM users
WHERE users.age > 17$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_searchbyname` (IN `keyword` VARCHAR(250))   SELECT * FROM users 
WHERE users.name LIKE CONCAT('%',keyword,'%')
ORDER BY users.userID DESC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_vaccinated` ()   SELECT COUNT(users.userID) as vaccinated_count FROM users WHERE users.vaccinated = 1$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `gender` varchar(45) NOT NULL,
  `age` int(11) NOT NULL,
  `mobile` varchar(45) NOT NULL,
  `body_temp` decimal(7,2) NOT NULL,
  `covid_diagnosed` tinyint(1) NOT NULL,
  `covid_encounter` tinyint(1) NOT NULL,
  `vaccinated` tinyint(1) NOT NULL,
  `nationality` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `name`, `gender`, `age`, `mobile`, `body_temp`, `covid_diagnosed`, `covid_encounter`, `vaccinated`, `nationality`) VALUES
(1, 'Juan Dela Cruz', 'Male', 31, '09163557623', '37.80', 0, 1, 1, 'Filipino'),
(2, 'Pedro Santos', 'Male', 67, '09123547622', '36.70', 1, 1, 1, 'Filipino'),
(3, 'Julia Abad', 'Female', 38, '09109987655', '38.00', 0, 0, 0, 'Filipino'),
(4, 'Kauro Takashi', 'Female', 30, '09554123788', '36.20', 1, 1, 1, 'Japanese'),
(5, 'Lucas Bravo', 'Male', 34, '0911875321', '36.70', 0, 0, 1, 'French'),
(14, 'Ryan David Pillerin', 'Male', 37, '+63 916 570 8823', '36.40', 1, 1, 1, 'FILIPINO'),
(15, 'Ryan David Pillerin', 'Male', 17, '+63 916 570 8823', '37.00', 0, 1, 1, 'FILIPINO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
