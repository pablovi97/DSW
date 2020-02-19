-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 05, 2020 at 05:50 PM
-- Server version: 5.7.28
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sitios`
--

-- --------------------------------------------------------

--
-- Table structure for table `asientos`
--

CREATE TABLE `asientos` (
  `nombreSitio` varchar(255) DEFAULT NULL,
  `nota` int(255) DEFAULT NULL,
  `fechaActual` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `asientos`
--

INSERT INTO `asientos` (`nombreSitio`, `nota`, `fechaActual`) VALUES
('tierra 4', 0, '2020-02-05'),
('tierra 18', 1, '2020-02-05'),
('tierra 6', 2, '2020-02-05'),
('tierra 15', 3, '2020-02-05'),
('tierra 8', 4, '2020-02-05'),
('tierra 20', 5, '2020-02-05');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
