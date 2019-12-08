-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 05-12-2019 a las 13:55:47
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

/*creamos la base de datos*/
create database residencia;

use residencia;

--
-- Base de datos: `residencia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auxiliar`
--

DROP TABLE IF EXISTS `auxiliar`;
CREATE TABLE IF NOT EXISTS `auxiliar` (
  `id_auxiliar` int(11) NOT NULL,
  `planta` varchar(40) NOT NULL,
  PRIMARY KEY (`id_auxiliar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitaciones`
--

DROP TABLE IF EXISTS `habitaciones`;
CREATE TABLE IF NOT EXISTS `habitaciones` (
  `id_habitacion` int(11) NOT NULL AUTO_INCREMENT,
  `num_camas` int(11) NOT NULL,
  PRIMARY KEY (`id_habitacion`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `habitaciones`
--

INSERT INTO `habitaciones` (`id_habitacion`, `num_camas`) VALUES
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 2),
(12, 2),
(13, 2),
(14, 2),
(15, 2),
(16, 2),
(17, 2),
(18, 2),
(19, 2),
(20, 2),
(21, 2),
(22, 2),
(23, 2),
(24, 2),
(25, 2),
(26, 2),
(27, 2),
(28, 2),
(29, 2),
(30, 2),
(31, 2),
(32, 2),
(33, 2),
(34, 2),
(35, 2),
(36, 2),
(37, 2),
(38, 2),
(39, 2),
(40, 2),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historico_aux_res`
--

DROP TABLE IF EXISTS `historico_aux_res`;
CREATE TABLE IF NOT EXISTS `historico_aux_res` (
  `id_personal` int(11) NOT NULL,
  `id_residente` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `diario` longtext NOT NULL,
  PRIMARY KEY (`id_personal`,`id_residente`,`fecha`),
  KEY `fk_historico_aux_res` (`id_residente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historico_hab_lim`
--

DROP TABLE IF EXISTS `historico_hab_lim`;
CREATE TABLE IF NOT EXISTS `historico_hab_lim` (
  `id_habitacion` int(11) NOT NULL,
  `id_limpieza` int(11) NOT NULL,
  `observaciones` longtext NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_habitacion`,`id_limpieza`,`fecha`),
  KEY `fk_historico_hab_lim` (`id_limpieza`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historico_res_hab`
--

DROP TABLE IF EXISTS `historico_res_hab`;
CREATE TABLE IF NOT EXISTS `historico_res_hab` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_residente` int(11) NOT NULL,
  `id_habitacion` int(11) NOT NULL,
  `fecha_inicio` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_fin` datetime DEFAULT NULL,
  PRIMARY KEY (`id`,`id_residente`,`id_habitacion`) USING BTREE,
  KEY `id_residente` (`id_residente`),
  KEY `id_habitacion` (`id_habitacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historico_res_med`
--

DROP TABLE IF EXISTS `historico_res_med`;
CREATE TABLE IF NOT EXISTS `historico_res_med` (
  `id_residente` int(11) NOT NULL,
  `id_medico` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `receta` longtext NOT NULL,
  PRIMARY KEY (`id_residente`,`id_medico`,`fecha`),
  KEY `fk_historico_res_med` (`id_medico`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `limpieza`
--

DROP TABLE IF EXISTS `limpieza`;
CREATE TABLE IF NOT EXISTS `limpieza` (
  `id_limpieza` int(11) NOT NULL,
  PRIMARY KEY (`id_limpieza`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `limpieza`
--

INSERT INTO `limpieza` (`id_limpieza`) VALUES
(1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico`
--

DROP TABLE IF EXISTS `medico`;
CREATE TABLE IF NOT EXISTS `medico` (
  `id_medico` int(11) NOT NULL,
  `especialidad` varchar(40) NOT NULL,
  PRIMARY KEY (`id_medico`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pai`
--

DROP TABLE IF EXISTS `pai`;
CREATE TABLE IF NOT EXISTS `pai` (
  `id_residente` int(11) NOT NULL,
  `area_social` longtext COLLATE utf8_spanish_ci NOT NULL,
  `tratamiento` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `nutricional` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `sueno` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `dolor` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `seguridad` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `movilidad` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `vcognitiva` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `vafectiva` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `conducta` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `ducha` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `aseo` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `deambulacion` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `alimentacion` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `aficiones` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `tiempo_libre` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `actividades` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `fecha_elaboracion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_evaluacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id_residente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

DROP TABLE IF EXISTS `personal`;
CREATE TABLE IF NOT EXISTS `personal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dni_personal` varchar(40) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apellido1` varchar(40) NOT NULL,
  `apellido2` varchar(40) NOT NULL,
  `cargo` varchar(40) NOT NULL,
  `tipo` varchar(40) NOT NULL,
  `usuario` varchar(40) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `fecha_inicio` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_fin` datetime DEFAULT NULL,
  `horario` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`id`, `dni_personal`, `nombre`, `apellido1`, `apellido2`, `cargo`, `tipo`, `usuario`, `contrasena`, `fecha_inicio`, `fecha_fin`, `horario`) VALUES
(1, '00000000A', 'Miriam', 'Diaz', 'Hortal', 'jefe', 'admin', 'admin', '$2y$10$yFqoKb1RnexGdW8fPJgMresG59mKJtYa7/LkmLKOEdE328iGvlTza', '2019-11-13 20:31:48', NULL, 'diurno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `residentes`
--

DROP TABLE IF EXISTS `residentes`;
CREATE TABLE IF NOT EXISTS `residentes` (
  `id_residente` int(11) NOT NULL AUTO_INCREMENT,
  `dni_residente` varchar(255) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apellido1` varchar(40) NOT NULL,
  `apellido2` varchar(40) NOT NULL,
  `edad` varchar(10) NOT NULL,
  `discapacidad` varchar(40) NOT NULL,
  `situacion` varchar(40) NOT NULL,
  `nombre_contacto` varchar(255) NOT NULL,
  `apellido_contacto` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fecha_inicio` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_fin` datetime DEFAULT NULL,
  PRIMARY KEY (`id_residente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `auxiliar`
--
ALTER TABLE `auxiliar`
  ADD CONSTRAINT `fk_auxiliar_personal` FOREIGN KEY (`id_auxiliar`) REFERENCES `personal` (`id`);

--
-- Filtros para la tabla `historico_aux_res`
--
ALTER TABLE `historico_aux_res`
  ADD CONSTRAINT `fk_historico_aux_res2` FOREIGN KEY (`id_residente`) REFERENCES `residentes` (`id_residente`),
  ADD CONSTRAINT `historico_aux_res_ibfk_1` FOREIGN KEY (`id_personal`) REFERENCES `personal` (`id`);

--
-- Filtros para la tabla `historico_hab_lim`
--
ALTER TABLE `historico_hab_lim`
  ADD CONSTRAINT `fk_historico_hab_lim1` FOREIGN KEY (`id_habitacion`) REFERENCES `habitaciones` (`id_habitacion`),
  ADD CONSTRAINT `fk_historico_hab_lim2` FOREIGN KEY (`id_limpieza`) REFERENCES `limpieza` (`id_limpieza`);

--
-- Filtros para la tabla `historico_res_hab`
--
ALTER TABLE `historico_res_hab`
  ADD CONSTRAINT `historico_res_hab_ibfk_1` FOREIGN KEY (`id_residente`) REFERENCES `residentes` (`id_residente`),
  ADD CONSTRAINT `historico_res_hab_ibfk_2` FOREIGN KEY (`id_habitacion`) REFERENCES `habitaciones` (`id_habitacion`);

--
-- Filtros para la tabla `historico_res_med`
--
ALTER TABLE `historico_res_med`
  ADD CONSTRAINT `fk_historico_res_med1` FOREIGN KEY (`id_residente`) REFERENCES `residentes` (`id_residente`),
  ADD CONSTRAINT `fk_historico_res_med2` FOREIGN KEY (`id_medico`) REFERENCES `medico` (`id_medico`);

--
-- Filtros para la tabla `limpieza`
--
ALTER TABLE `limpieza`
  ADD CONSTRAINT `fk_limpieza_personal` FOREIGN KEY (`id_limpieza`) REFERENCES `personal` (`id`);

--
-- Filtros para la tabla `medico`
--
ALTER TABLE `medico`
  ADD CONSTRAINT `fk_medico_personal` FOREIGN KEY (`id_medico`) REFERENCES `personal` (`id`);

--
-- Filtros para la tabla `pai`
--
ALTER TABLE `pai`
  ADD CONSTRAINT `pai_ibfk_1` FOREIGN KEY (`id_residente`) REFERENCES `residentes` (`id_residente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
