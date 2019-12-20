-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 24, 2019 at 08:55 PM
-- Server version: 5.7.27-0ubuntu0.18.04.1
-- PHP Version: 7.2.19-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Foro`
--

-- --------------------------------------------------------

--
-- Table structure for table `foro`
--

CREATE TABLE `foro` (
  `idforo` int(8) NOT NULL,
  `nombreForo` tinytext NOT NULL,
  `idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foro`
--

INSERT INTO `foro` (`idforo`, `nombreForo`, `idusuario`) VALUES
(1, 'cabballos blancos', 1),
(2, 'motos voladoras', 1),
(3, 'espaguetis', 1),
(4, 'api rest de mierda', 4);

-- --------------------------------------------------------

--
-- Table structure for table `mensaje`
--

CREATE TABLE `mensaje` (
  `idmensaje` int(11) NOT NULL,
  `titulo` tinytext,
  `fecha` tinytext NOT NULL,
  `contenido` tinytext NOT NULL,
  `idforo` int(8) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `respuesta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mensaje`
--

INSERT INTO `mensaje` (`idmensaje`, `titulo`, `fecha`, `contenido`, `idforo`, `idusuario`, `respuesta`) VALUES
(16, 'mensaje 1', '2019-11-02', 'contenido ...', 1, 1, NULL),
(21, 'mensaje 2', '2019-11-02', 'contenido del mensaje 2', 1, 1, NULL),
(31, NULL, '2019-11-02', 'prueba', 1, 1, 16),
(32, NULL, '2019-11-02', 'hola', 1, 1, 16),
(33, NULL, '2019-11-02', 'prueba', 1, 1, 21),
(34, 'mensaje 3', '2019-11-02', 'contenido del mensaje 4', 1, 1, NULL),
(35, NULL, '2019-11-02', 'hola', 1, 1, 34),
(36, 'espaguetis del mercadona', '2019-11-02', 'estan buenos', 3, 1, NULL),
(37, NULL, '2019-11-02', 'no lo creo!', 3, 1, 36),
(38, 'las motos voladoras  valen la pena?', '2019-11-02', 'lo valen', 2, 1, NULL),
(39, NULL, '2019-11-03', 'pos si bro xd', 3, 1, 36),
(40, NULL, '2019-11-24', 'xd', 1, 1, 16),
(41, 'fgnjfjh', '2019-11-24', 'fghfghjfghjfg', 4, 4, NULL),
(42, NULL, '2019-11-24', 'xbdffd', 4, 4, 41);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre`, `password`, `rol`) VALUES
(1, 'pepe', '1234', 'admin'),
(3, 'juan', '1q2w3e4r', 'usuario'),
(4, 'pablo', '$2a$10$wxEt8s9D2obm/k6fsuwdN.Wtu8CrIaEqJuZaVauIcKCwacLCAlxjq', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `foro`
--
ALTER TABLE `foro`
  ADD PRIMARY KEY (`idforo`),
  ADD KEY `fk_usuario` (`idusuario`);

--
-- Indexes for table `mensaje`
--
ALTER TABLE `mensaje`
  ADD PRIMARY KEY (`idmensaje`),
  ADD KEY `fk_foro_mensaje` (`idforo`),
  ADD KEY `fk_usuario_mensaje` (`idusuario`),
  ADD KEY `fk_respuesta_mensaje` (`respuesta`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `foro`
--
ALTER TABLE `foro`
  MODIFY `idforo` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `mensaje`
--
ALTER TABLE `mensaje`
  MODIFY `idmensaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `foro`
--
ALTER TABLE `foro`
  ADD CONSTRAINT `fk_usuario` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`);

--
-- Constraints for table `mensaje`
--
ALTER TABLE `mensaje`
  ADD CONSTRAINT `fk_foro_mensaje` FOREIGN KEY (`idforo`) REFERENCES `foro` (`idforo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_respuesta_mensaje` FOREIGN KEY (`respuesta`) REFERENCES `mensaje` (`idmensaje`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_usuario_mensaje` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
