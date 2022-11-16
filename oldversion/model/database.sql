-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 22, 2021 at 03:22 PM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u790594714_loans`
--

-- --------------------------------------------------------

--
-- Table structure for table `calendarypay`
--

DROP TABLE IF EXISTS `calendarypay`;
CREATE TABLE IF NOT EXISTS `calendarypay` (
  `id` int NOT NULL AUTO_INCREMENT,
  `client_id` int NOT NULL,
  `datePay` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `client_id` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `lname` varchar(80) NOT NULL,
  `numberPhone` varchar(20) NOT NULL,
  `id_doc` varchar(20) NOT NULL,
  `direction` varchar(75) NOT NULL,
  `thumbnail` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `reg_date` varchar(20) NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `fname`, `lname`, `numberPhone`, `id_doc`, `direction`, `thumbnail`, `reg_date`, `user_id`) VALUES
(1, 'Juana', 'Diaz', '441-515-1151', 'CCC', 'CCC', '', 'Wed 22/09/2021', 1),
(2, 'Miguelina', 'Alvarez', '829-974-4445', 'BBB', 'BBB', '', 'Wed 22/09/2021', 1),
(3, 'Ana', 'Perez', '811-661-6125', 'AAAA', 'AAAA', '', 'Wed 22/09/2021', 1),
(4, 'Juana', 'Diaz', '441-515-1151', '4zzzxxxx', 'ASDADSAD', '', 'Wed 22/09/2021', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pagos`
--

DROP TABLE IF EXISTS `pagos`;
CREATE TABLE IF NOT EXISTS `pagos` (
  `paid_id` int NOT NULL AUTO_INCREMENT,
  `client_id` int NOT NULL,
  `prest_id` int NOT NULL,
  `amount` int NOT NULL,
  `payment` int NOT NULL,
  `dues` int NOT NULL,
  `paid_dues` int NOT NULL,
  `arriers` int NOT NULL,
  `payType` tinytext NOT NULL,
  `payMethod` varchar(20) NOT NULL,
  `date_paid` tinytext NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`paid_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `pagos`
--

INSERT INTO `pagos` (`paid_id`, `client_id`, `prest_id`, `amount`, `payment`, `dues`, `paid_dues`, `arriers`, `payType`, `payMethod`, `date_paid`, `user_id`) VALUES
(1, 3, 1, 4131, 0, 1, 1, 0, '1', 'Efectivo', '22/09/2021', 1);

-- --------------------------------------------------------

--
-- Table structure for table `prestamos`
--

DROP TABLE IF EXISTS `prestamos`;
CREATE TABLE IF NOT EXISTS `prestamos` (
  `prest_id` int NOT NULL AUTO_INCREMENT,
  `amount` int NOT NULL,
  `interest` int NOT NULL,
  `month` int NOT NULL,
  `paymode` int NOT NULL,
  `int_generated` int NOT NULL,
  `sumatory` int NOT NULL,
  `dues` int NOT NULL,
  `total` int NOT NULL,
  `payment` int NOT NULL,
  `amount_paid` int NOT NULL,
  `paid_dues` int NOT NULL,
  `arriers` int NOT NULL,
  `date_p` tinytext NOT NULL,
  `hour` int NOT NULL,
  `day` varchar(3) NOT NULL,
  `pmonth` varchar(3) NOT NULL,
  `year` tinytext NOT NULL,
  `lastPayDate` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `lastPayDay` int NOT NULL,
  `nextPay` int NOT NULL,
  `nextTime` tinytext NOT NULL,
  `pay_status` int NOT NULL,
  `client_id` int NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`prest_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `prestamos`
--

INSERT INTO `prestamos` (`prest_id`, `amount`, `interest`, `month`, `paymode`, `int_generated`, `sumatory`, `dues`, `total`, `payment`, `amount_paid`, `paid_dues`, `arriers`, `date_p`, `hour`, `day`, `pmonth`, `year`, `lastPayDate`, `lastPayDay`, `nextPay`, `nextTime`, `pay_status`, `client_id`, `user_id`) VALUES
(1, 15000, 15, 1, 4, 2250, 17250, 4, 4313, 0, 4131, 1, 0, '22/09/2021', 0, '22', '09', '', '22/09/2021', 264, 271, '29/09/2021', 1, 3, 1),
(2, 10000, 15, 1, 0, 1500, 11500, 30, 383, 0, 0, 0, 0, '22/09/2021', 0, '22', '09', '', '', 0, 0, '', 0, 3, 1),
(3, 8000, 15, 1, 4, 1200, 9200, 4, 2300, 0, 0, 0, 0, '22/09/2021', 0, '22', '09', '', '', 0, 0, '', 0, 2, 1),
(4, 5000, 15, 1, 1, 750, 5750, 1, 5750, 0, 0, 0, 0, '22/09/2021', 0, '22', '09', '', '', 0, 0, '', 0, 1, 1),
(5, 10000, 15, 1, 4, 1500, 11500, 4, 2875, 0, 0, 0, 0, '22/09/2021', 0, '22', '09', '', '', 0, 0, '', 0, 4, 2),
(6, 8000, 15, 1, 0, 1200, 9200, 30, 307, 0, 0, 0, 0, '22/09/2021', 0, '22', '09', '', '', 0, 0, '', 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `uName` varchar(75) NOT NULL,
  `lName` varchar(75) NOT NULL,
  `userName` varchar(16) NOT NULL,
  `uMail` varchar(75) NOT NULL,
  `uNumber` varchar(13) NOT NULL,
  `uPass` tinytext NOT NULL,
  `rDate` varchar(30) NOT NULL,
  `days` int NOT NULL,
  `uDb` int NOT NULL,
  `amount_arriers` int NOT NULL,
  `daysToArriers` int NOT NULL,
  `logo` tinytext NOT NULL,
  `notification` int NOT NULL,
  `payAmount` varchar(10) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`user_id`, `uName`, `lName`, `userName`, `uMail`, `uNumber`, `uPass`, `rDate`, `days`, `uDb`, `amount_arriers`, `daysToArriers`, `logo`, `notification`, `payAmount`, `status`) VALUES
(1, 'Michael', 'Encarnacion', 'mc13', 'michaelenc.personal@gmail.com', '8493445432', '$2y$10$gSoeehueLdMAhZYXnDa6m.w9soGyvyeORue1bWPtOVmiAj4dKcD0q', 'Wed 22/09/2021', 22, 0, 0, 0, '', 0, '', 1),
(2, 'test', 'test', 'test01', 'a@d.c', '2111', '$2y$10$OiP4yW8UQ8zAJqFlrY3CM.vw.rHRe8bXKFnfA79Tuosl/ekNwElU.', 'Wed 22/09/2021', 22, 0, 0, 0, '', 0, '', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
