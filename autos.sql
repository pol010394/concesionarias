-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 18-04-2017 a las 17:46:43
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `autos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `id_cliente` tinyint(2) NOT NULL AUTO_INCREMENT,
  `cedula_cliente` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_cliente` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellido_cliente` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `cedula_cliente`, `nombre_cliente`, `apellido_cliente`, `telefono`) VALUES
(1, '1500713488', 'maria', 'basantes', '0988247119');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `concesionarias`
--

CREATE TABLE IF NOT EXISTS `concesionarias` (
  `id_concesionarias` tinyint(2) NOT NULL AUTO_INCREMENT,
  `nombre_concesionarias` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `direccion_concesionaria` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `ciudad` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_concesionarias`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `concesionarias`
--

INSERT INTO `concesionarias` (`id_concesionarias`, `nombre_concesionarias`, `direccion_concesionaria`, `ciudad`) VALUES
(1, 'chevrolet', 'Lizarzaburu y Río Guayas', 'Riobamba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE IF NOT EXISTS `factura` (
  `id_factura` tinyint(2) NOT NULL AUTO_INCREMENT,
  `id_usuario` tinyint(2) NOT NULL,
  `id_cliente` tinyint(2) NOT NULL,
  `fecha` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_factura`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_cliente` (`id_cliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`id_factura`, `id_usuario`, `id_cliente`, `fecha`) VALUES
(4, 2, 1, '2017-1-1'),
(7, 2, 1, '2017-04-12'),
(8, 2, 1, '2017-04-9');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_detalle`
--

CREATE TABLE IF NOT EXISTS `orden_detalle` (
  `id_factura` tinyint(2) NOT NULL,
  `id_producto` tinyint(2) NOT NULL,
  `cantidad` int(2) NOT NULL,
  `precio_unitario` float(3,3) NOT NULL,
  PRIMARY KEY (`id_factura`,`id_producto`),
  KEY `id_factura` (`id_factura`),
  KEY `id_producto` (`id_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
  `id_producto` tinyint(2) NOT NULL AUTO_INCREMENT,
  `nombre_producto` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `categoria` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `precio` float NOT NULL,
  PRIMARY KEY (`id_producto`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=32 ;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre_producto`, `categoria`, `precio`) VALUES
(28, 'spark', '1', 13.49),
(29, 'tracker', '2', 30.59),
(31, 'chevrolte', '2', 12.333);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` tinyint(2) NOT NULL AUTO_INCREMENT,
  `cedula_usuario` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_usuario` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellido_usuario` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `nivel` int(2) NOT NULL,
  `id_consecionarias` tinyint(2) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `id_consecionarias` (`id_consecionarias`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `cedula_usuario`, `nombre_usuario`, `apellido_usuario`, `password`, `nivel`, `id_consecionarias`) VALUES
(1, '1500713449', 'pablo', 'calapucha', '12345', 1, 1),
(2, '0603485761', 'Jhon', 'Pacheco', '11111', 2, 1),
(4, '1234567898', 'poli', 'dolo', '12345', 2, 1),
(5, '0987654321', 'toli', 'ror', '12345', 1, 1),
(6, '0000000000', 'pol', 'cala', '12345', 1, 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `factura_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `orden_detalle`
--
ALTER TABLE `orden_detalle`
  ADD CONSTRAINT `orden_detalle_ibfk_1` FOREIGN KEY (`id_factura`) REFERENCES `factura` (`id_factura`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orden_detalle_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_consecionarias`) REFERENCES `concesionarias` (`id_concesionarias`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
