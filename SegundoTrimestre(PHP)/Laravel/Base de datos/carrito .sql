-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-02-2020 a las 17:23:01
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `carrito`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `comentarioID` int(11) NOT NULL,
  `contenido` longtext DEFAULT NULL,
  `productoID` int(11) DEFAULT NULL,
  `usuarioID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`comentarioID`, `contenido`, `productoID`, `usuarioID`) VALUES
(1, 'este producto es muy bueno!', 3, 6),
(2, 'es genial!', 3, 6),
(3, 'woooow', 9, 6),
(4, 'este producto es muy bueno!', 7, 6),
(5, 'ahora puedo comentar!', 3, 11),
(6, 'me gustó mucho', 3, 6),
(7, 'que bacaneria', 8, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedido`
--

CREATE TABLE `detalle_pedido` (
  `id_pedido` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precioProducto` int(11) NOT NULL,
  `id_detallepedido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_pedido`
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
(44, 9, 2, 450, 9),
(47, 3, 4, 100, 10),
(48, 3, 5, 100, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedido` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fechaPedido` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedidos`
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
(46, 4, '2019-11-24'),
(47, 6, '2020-02-08 13:02:37'),
(48, 11, '2020-02-09 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
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
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idProducto`, `nombreProducto`, `stock`, `url`, `Precio`, `comentarioID`) VALUES
(3, 'Televisores', 57, '/img/television.jpg', 100, NULL),
(7, 'Ordenadores', 93, '/img/índice.jpeg', 800, NULL),
(8, 'Portatiles', 94, '/img/portatiles.jpeg', 600, NULL),
(9, 'Graficas', 86, '/img/grafica.jpeg', 450, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nick` varchar(20) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `rol` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nick`, `passwd`, `rol`) VALUES
(4, 'pepe', '1234', 'admin'),
(5, 'juan', '12345', 'usuario'),
(6, 'pablo', '$2a$10$kZiB7anu1j3dbsv3lrHHfOrIUInWpzXsDVyGk0nA.C05G/H/FQUBW', 'admin'),
(7, 'pepito', '$2y$10$8H.Udhds00EeswJrXQCUEuNX7rs1Y0OUR7RLmVXrUIZKZ1DF2PWtq', NULL),
(8, 'juanito', '$2y$10$7vaVjF.HqdQmTVrQUKi2deNZn6lfeXi2QOysu4PiSEpsQrZGQeMaG', NULL),
(9, 'peoeoe', '$2y$10$V1LHYJIwUqx4k//HIkmRKetmD3p4shQ7jtCw4fsYx9GmWuwGuH5fC', NULL),
(10, 'popeye', '$2y$10$EfBzju.5AcooIzj7Y90LHe1YKGi1ENxc/gMHJdJT1O/MHlGoDNlBK', NULL),
(11, 'anna', '$2y$10$3vt77596l7cwGCcGMGaJ9uUGB.K89pwYif/kY4d8QLybHXJy21KeS', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`comentarioID`),
  ADD KEY `FK_comentarios_usuarioID` (`usuarioID`),
  ADD KEY `FK_comentarios_productoID` (`productoID`);

--
-- Indices de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD PRIMARY KEY (`id_detallepedido`),
  ADD KEY `FK_detalle_pedido` (`id_pedido`),
  ADD KEY `FK_detalle_producto` (`id_producto`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `FK_pedido_usuario` (`id_usuario`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idProducto`),
  ADD KEY `comentarioID` (`comentarioID`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `nick` (`nick`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `comentarioID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  MODIFY `id_detallepedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `FK_comentarios_productoID` FOREIGN KEY (`productoID`) REFERENCES `producto` (`idProducto`),
  ADD CONSTRAINT `FK_comentarios_usuarioID` FOREIGN KEY (`usuarioID`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD CONSTRAINT `FK_detalle_pedido` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`id_pedido`),
  ADD CONSTRAINT `FK_detalle_producto` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`idProducto`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `FK_pedido_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
