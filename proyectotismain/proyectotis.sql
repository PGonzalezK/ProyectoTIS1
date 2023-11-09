-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-11-2023 a las 01:34:40
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectotis`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dirmunicipales`
--

CREATE TABLE `dirmunicipales` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `director` text NOT NULL,
  `telefono` int(20) NOT NULL,
  `email` varchar(60) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `funciones` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `dirmunicipales`
--

INSERT INTO `dirmunicipales` (`id`, `nombre`, `descripcion`, `director`, `telefono`, `email`, `direccion`, `funciones`) VALUES
(2, 'DIRECCIÓN DE DESARROLLO COMUNITARIO', 'La Dirección de Desarrollo Comunitario tiene como objetivo la promoción del desarrollo comunitario, el fortalecimiento de las organizaciones comunitarias, la proposición de medidas relacionadas con asistencia social y contingencia, la salud pública, la protección del medio ambiente, educación y cultura, capacitación laboral, deporte y recreación, promoción del empleo, fomento productivo local y turismo.', 'Paula Concha Constanzo', 2147483647, 'pconcha@concepcion.com', 'O’Higgins 525, 2° piso, Concepción', 'Asesorar al Alcalde y también al Concejo Municipal en la promoción del desarrollo comunitario.\r\nPrestar asesoría técnica a las organizaciones comunitarias, fomentar su desarrollo y legalización, y promover su efectiva participación en el municipio.\r\nProponer y ejecutar, dentro de su ámbito y cuando corresponda, medidas tendientes a materializar acciones relacionadas con la salud pública- protección del medio ambiente, educación y cultura, capacitación laboral, deportes y recreación, promoción del empleo, fomento productivo local y turismo.\r\nPrestar el servicio diseñado por el Sistema de información Social según la normativa que lo regula y proporcionar datos estadísticos y/o diagnósticos sociales para necesidades generales de la Dideco o de la Municipalidad.\r\nRealizar los procesos pertinentes en la gestión de abastecimiento, según las normas de la Plataforma Mercado Público y Reglamentos de Adquisiciones vigentes en el municipio.');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `dirmunicipales`
--
ALTER TABLE `dirmunicipales`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `dirmunicipales`
--
ALTER TABLE `dirmunicipales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
