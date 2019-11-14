-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-11-2019 a las 03:21:08
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `nomade`
--
CREATE DATABASE IF NOT EXISTS `nomade` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `nomade`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favoritos`
--

CREATE TABLE IF NOT EXISTS `favoritos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favorito_inmueble`
--

CREATE TABLE IF NOT EXISTS `favorito_inmueble` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `favorito_id` int(11) NOT NULL,
  `inmueble_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inmuebles`
--

CREATE TABLE IF NOT EXISTS `inmuebles` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `dimensiones` int(11) NOT NULL,
  `capacidad` int(11) NOT NULL,
  `camas` int(11) NOT NULL,
  `ubicacion` varchar(100) NOT NULL,
  `disponibilidad` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inmueble_usuario`
--

CREATE TABLE IF NOT EXISTS `inmueble_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `inmueble_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precio_por_fecha`
--

CREATE TABLE IF NOT EXISTS `precio_por_fecha` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_inmueble` int(11) NOT NULL,
  `desde` date NOT NULL,
  `hasta` date NOT NULL,
  `precio` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE IF NOT EXISTS `reservas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `desde` date NOT NULL,
  `hasta` date NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `inmueble_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva_usuario`
--

CREATE TABLE IF NOT EXISTS `reserva_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `reserva_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `moneda` varchar(50) NOT NULL DEFAULT 'ARS',
  `idioma` varchar(50) NOT NULL DEFAULT 'ES',
  `theme` tinyint(1) NOT NULL DEFAULT 0,
  `ubicacion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario` (`usuario`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `email`, `contrasena`, `foto`, `moneda`, `idioma`, `theme`, `ubicacion`) VALUES
(4, 'ajjj', 'sdiufhdsiu@qodwij.com', '$2y$10$FagMua90eMpe7RSu1.L9M.U7D9iqt5AdRp86uWNfLcDQ/0yM3LZ9i', NULL, 'ARS', 'ES', 0, NULL),
(8, 'jajsdadsoij', 'sdfklj@qwe.com', '$2y$10$rfqNpOIUF6.PGtU1tpBaK.S1HBvJ1/ovSd0.6mWddL13VdeMQkdIW', NULL, 'ARS', 'ES', 0, NULL),
(10, 'julian', 'julian@la.com', '$2y$10$1KHHbUYHTxQ91GVBdmuuW.nxsV2dNuLPw61Lky2g4QAxj27HgonhW', NULL, 'ARS', 'ES', 0, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
