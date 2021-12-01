-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3308
-- Tiempo de generación: 01-12-2021 a las 10:32:57
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `studium_dws_p2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juguetes`
--

DROP TABLE IF EXISTS `juguetes`;
CREATE TABLE IF NOT EXISTS `juguetes` (
  `id_juguete` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(65) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `precio` decimal(5,2) NOT NULL,
  `id_reymago` int(11) NOT NULL,
  PRIMARY KEY (`id_juguete`),
  KEY `id_rey_magoFK` (`id_reymago`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `juguetes`
--

INSERT INTO `juguetes` (`id_juguete`, `nombre`, `precio`, `id_reymago`) VALUES
(1, 'Aula de ciencia: Robot Mini ERP', '159.95', 1),
(2, 'Carbón', '0.00', 2),
(3, 'Cochecito Classic', '99.95', 3),
(4, 'Consola PS4 1 TB', '349.90', 1),
(5, 'Lego Villa familiar modular', '64.99', 2),
(6, 'Magia Borrás Clásica 150 trucos con luz', '32.95', 3),
(7, 'Meccano Excavadora construcción', '30.99', 1),
(8, 'Nenuco Hace pompas', '29.95', 2),
(9, 'Peluche delfín rosa', '34.00', 3),
(10, 'Pequeordenador', '22.95', 1),
(11, 'Robot Coji', '69.95', 2),
(12, 'Telescopio astronómico terrestre', '72.00', 3),
(14, 'Twister', '17.95', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ninos`
--

DROP TABLE IF EXISTS `ninos`;
CREATE TABLE IF NOT EXISTS `ninos` (
  `id_nino` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(65) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `apellido` varchar(65) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `bueno_malo` varchar(2) COLLATE utf8mb4_spanish2_ci NOT NULL,
  PRIMARY KEY (`id_nino`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `ninos`
--

INSERT INTO `ninos` (`id_nino`, `nombre`, `apellido`, `fecha_nacimiento`, `bueno_malo`) VALUES
(1, 'Alberto', 'Alcántara', '1994-10-13', 'No'),
(2, 'Beatriz', 'Bueno', '1982-04-18', 'Sí'),
(3, 'Carlos', 'Crepo', '1998-12-01', 'No'),
(4, 'Diana', 'Domínguez', '1987-09-02', 'No'),
(5, 'Emilio', 'Enamorado', '1996-08-12', 'Sí'),
(7, 'Francisca', 'Fernández', '1990-07-28', 'Sí');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedir`
--

DROP TABLE IF EXISTS `pedir`;
CREATE TABLE IF NOT EXISTS `pedir` (
  `id_recibir` int(11) NOT NULL AUTO_INCREMENT,
  `id_juguete` int(11) NOT NULL,
  `id_nino` int(11) NOT NULL,
  PRIMARY KEY (`id_recibir`),
  UNIQUE KEY `UNSOLOJUGUETE` (`id_juguete`,`id_nino`),
  KEY `id_juguete` (`id_juguete`,`id_nino`) USING BTREE,
  KEY `id_nino` (`id_nino`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `pedir`
--

INSERT INTO `pedir` (`id_recibir`, `id_juguete`, `id_nino`) VALUES
(1, 1, 1),
(31, 1, 2),
(25, 1, 4),
(59, 1, 7),
(38, 2, 1),
(3, 2, 7),
(7, 3, 1),
(51, 3, 2),
(30, 3, 3),
(6, 3, 5),
(60, 3, 7),
(22, 4, 1),
(54, 4, 2),
(5, 4, 4),
(26, 4, 5),
(61, 4, 7),
(49, 5, 1),
(55, 5, 2),
(16, 6, 1),
(56, 6, 2),
(12, 7, 1),
(57, 7, 2),
(50, 8, 1),
(58, 8, 2),
(27, 8, 4),
(52, 9, 1),
(43, 9, 3),
(53, 10, 1),
(8, 11, 1),
(28, 11, 4),
(13, 12, 1),
(2, 12, 2),
(10, 14, 1),
(4, 14, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reyesmagos`
--

DROP TABLE IF EXISTS `reyesmagos`;
CREATE TABLE IF NOT EXISTS `reyesmagos` (
  `id_reymago` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8mb4_spanish2_ci NOT NULL,
  PRIMARY KEY (`id_reymago`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `reyesmagos`
--

INSERT INTO `reyesmagos` (`id_reymago`, `nombre`) VALUES
(1, 'Melchor'),
(2, 'Gaspar'),
(3, 'Baltasar');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `juguetes`
--
ALTER TABLE `juguetes`
  ADD CONSTRAINT `juguetes_ibfk_1` FOREIGN KEY (`id_reymago`) REFERENCES `reyesmagos` (`id_reymago`);

--
-- Filtros para la tabla `pedir`
--
ALTER TABLE `pedir`
  ADD CONSTRAINT `pedir_ibfk_1` FOREIGN KEY (`id_juguete`) REFERENCES `juguetes` (`id_juguete`),
  ADD CONSTRAINT `pedir_ibfk_2` FOREIGN KEY (`id_nino`) REFERENCES `ninos` (`id_nino`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
