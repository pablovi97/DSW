-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 24, 2019 at 08:54 PM
-- Server version: 5.7.27-0ubuntu0.18.04.1
-- PHP Version: 7.2.19-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Carrito`
--

-- --------------------------------------------------------

--
-- Table structure for table `detalle_pedido`
--

CREATE TABLE `detalle_pedido` (
  `id_pedido` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precioProducto` int(11) NOT NULL,
  `id_detallepedido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detalle_pedido`
--

INSERT INTO `detalle_pedido` (`id_pedido`, `id_producto`, `cantidad`, `precioProducto`, `id_detallepedido`) VALUES
(4, 3, 4, 0, 1),
(40, 3, 1, 100, 2),
(40, 7, 2, 800, 3),
(41, 3, 1, 100, 4),
(41, 9, 1, 450, 5),
(43, 3, 1, 100, 6),
(43, 9, 1, 450, 7),
(44, 3, 1, 100, 8),
(44, 9, 2, 450, 9);

-- --------------------------------------------------------

--
-- Table structure for table `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedido` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fechaPedido` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pedidos`
--

INSERT INTO `pedidos` (`id_pedido`, `id_usuario`, `fechaPedido`) VALUES
(4, 4, '2019-10-11'),
(5, 4, '2019-11-21'),
(6, 4, '2019-11-22'),
(11, 4, '2019-11-23'),
(12, 4, '2019-11-23'),
(13, 4, '2019-11-23'),
(14, 6, '2019-11-23'),
(26, 4, '2019-11-24'),
(29, 4, '2019-11-24'),
(30, 4, '2019-11-24'),
(31, 4, '2019-11-24'),
(34, 4, '2019-11-24'),
(35, 4, '2019-11-24'),
(38, 4, '2019-11-24'),
(39, 4, '2019-11-24'),
(40, 4, '2019-11-24'),
(41, 6, '2019-11-24'),
(42, 4, '2019-11-24'),
(43, 5, '2019-11-24'),
(44, 5, '2019-11-24'),
(45, 6, '2019-11-24'),
(46, 4, '2019-11-24');

-- --------------------------------------------------------

--
-- Table structure for table `producto`
--

CREATE TABLE `producto` (
  `idProducto` int(11) NOT NULL,
  `nombreProducto` varchar(20) NOT NULL,
  `stock` int(11) NOT NULL,
  `url` varchar(100) DEFAULT NULL,
  `Precio` int(100) DEFAULT NULL,
  `comentarioID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `producto`
--

INSERT INTO `producto` (`idProducto`, `nombreProducto`, `stock`, `url`, `Precio`, `comentarioID`) VALUES
(3, 'televisores', 57, '', 100, NULL),
(7, 'ordenadores', 93, '/home/alumno/NetBeansProjects/Carrito/src/main/webapp/Imagenes/img1.jpeg', 800, NULL),
(8, 'portatiles', 94, '/home/alumno/NetBeansProjects/Carrito/src/main/webapp/Imagenes/img1.jpeg', 600, NULL),
(9, 'graficas', 86, '/home/alumno/NetBeansProjects/Carrito/src/main/webapp/Imagenes/img3.jpeg', 450, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nick` varchar(20) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `rol` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nick`, `passwd`, `rol`) VALUES
(4, 'pepe', '1234', 'admin'),
(5, 'juan', '12345', 'usuario'),
(6, 'pablo', '$2a$10$kZiB7anu1j3dbsv3lrHHfOrIUInWpzXsDVyGk0nA.C05G/H/FQUBW', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD PRIMARY KEY (`id_detallepedido`),
  ADD KEY `FK_detalle_pedido` (`id_pedido`),
  ADD KEY `FK_detalle_producto` (`id_producto`);

--
-- Indexes for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `FK_pedido_usuario` (`id_usuario`);

--
-- Indexes for table `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idProducto`),
  ADD KEY `comentarioID` (`comentarioID`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `nick` (`nick`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  MODIFY `id_detallepedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `producto`
--
ALTER TABLE `producto`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD CONSTRAINT `FK_detalle_pedido` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`id_pedido`),
  ADD CONSTRAINT `FK_detalle_producto` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`idProducto`);

--
-- Constraints for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `FK_pedido_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Constraints for table `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`comentarioID`) REFERENCES `comentarios` (`comentarioID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
