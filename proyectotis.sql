-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-11-2023 a las 19:40:22
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

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
-- Estructura de tabla para la tabla `backgrounds`
--

CREATE TABLE `backgrounds` (
  `id` int(11) NOT NULL,
  `login_background` varchar(255) NOT NULL,
  `register_background` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emails`
--

CREATE TABLE `emails` (
  `id` int(11) NOT NULL,
  `to_email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `headers` text DEFAULT NULL,
  `status` enum('enviado','pendiente','fallido') NOT NULL,
  `sent_date` datetime DEFAULT NULL,
  `error_message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `emails`
--

INSERT INTO `emails` (`id`, `to_email`, `subject`, `message`, `headers`, `status`, `sent_date`, `error_message`) VALUES
(1, '', 'Confirmación de registro', 'Gracias por registrarte en nuestro sitio. Por favor, haz clic en el enlace de confirmación.', 'From: tu_direccion_de_correo@tudominio.com\r\n', 'pendiente', NULL, NULL),
(2, 'p.monjesz1@gmail.com', 'Confirmación de registro', 'Gracias por registrarte en nuestro sitio. Por favor, haz clic en el enlace de confirmación.', 'From: tu_direccion_de_correo@tudominio.com\r\n', 'pendiente', NULL, NULL),
(3, 'p.monjesz1@gmail.com', 'Confirmación de registro', 'Gracias por registrarte en nuestro sitio. Por favor, haz clic en el enlace de confirmación.', 'From: tu_direccion_de_correo@tudominio.com\r\n', 'pendiente', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `misionvision`
--

CREATE TABLE `misionvision` (
  `id` int(11) NOT NULL,
  `tipo` enum('mision','vision','','') NOT NULL,
  `contenido` text NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `misionvision`
--

INSERT INTO `misionvision` (`id`, `tipo`, `contenido`, `fecha`) VALUES
(1, 'mision', 'Fortalecer los equipos, tanto en relaciones internas como en condiciones de trabajo, con el fin de propiciar el desarrollo sustentable para sus habitantes y quienes se vinculen con la comuna, formulando proyectos, eventos, programas, y acciones que fortalezcan el vinculo entre si.', '2023-11-02 02:23:58'),
(2, 'vision', 'Consiste en promover el desarrollo inclusivo, sustentable y centrado en las personas que viven en la comunidad para que esten mas familiarizadas con el entorno y actividades, asi tambien permitir que interactuen aun mas con el lugar en el que viven.', '2023-11-02 02:23:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `palabrasalcalde`
--

CREATE TABLE `palabrasalcalde` (
  `id` int(11) NOT NULL,
  `titulo` text NOT NULL,
  `contenido` text NOT NULL,
  `nombre_alcalde` text NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `palabrasalcalde`
--

INSERT INTO `palabrasalcalde` (`id`, `titulo`, `contenido`, `nombre_alcalde`, `imagen`, `fecha`) VALUES
(1, '¡Bienvenidos a Concepción!', 'Desde el municipio estamos trabajando para convertirnos en la Capital del Sur de Chile, teniendo en el centro de nuestras acciones, programas y proyectos a las personas que aquí viven, estudian, trabajan y a quienes vienen a visitarnos o llegaron para comenzar aquí una nueva vida. Somos la tercera ciudad más importante de Chile. Promovemos un desarrollo a escala humana, de los barrios y del centro, que respete y rescate nuestro patrimonio histórico, cultural, natural y turístico como Ciudad de la Independencia, del Rock, Universitaria, del río Biobío, de las Cinco Lagunas y Cerro Caracol, con toda una infraestructura pública y privada de conectividad, hotelería, comercio, salud, educación y negocios de alto nivel. Desde nuestra gestión queremos seguir creciendo consolidando la inclusión y la participación ciudadana, manteniendo la transparencia en nuestro quehacer y articulando sueños y compromisos para grandes y necesarios proyectos.\r\nLes invitamos a cuidar y disfrutar de nuestra ciudad.\r\nUn afectuoso abrazo.', 'Álvaro Ortiz Vera', 'https://upload.wikimedia.org/wikipedia/commons/0/02/Álvaro_Ortiz_Vera.jpg', '2023-11-03 05:40:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participacion`
--

CREATE TABLE `participacion` (
  `id` int(11) NOT NULL,
  `email` varchar(60) NOT NULL,
  `tipo_contribucion` enum('denuncia','felicitacion','sugerencia') NOT NULL,
  `departamento` enum('paradero','parque','vial','alumbrado') NOT NULL,
  `descripcion` text NOT NULL,
  `otro_dpto_text` text NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `descrpcion` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `descrpcion`) VALUES
(0, 'Alcalde'),
(1, 'Administrador'),
(2, 'Usuario'),
(3, 'Periodista'),
(4, 'Editor'),
(5, 'Secretario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `rut` int(8) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(16) NOT NULL,
  `id_rol` int(2) NOT NULL,
  `trn_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`rut`, `nombre`, `apellido`, `email`, `password`, `id_rol`, `trn_date`) VALUES
(205142991, 'Pablo', 'Monjes', 'pmonjes@ing.ucsc.cl', '12', 1, '2023-11-04 17:21:37');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `backgrounds`
--
ALTER TABLE `backgrounds`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `misionvision`
--
ALTER TABLE `misionvision`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `palabrasalcalde`
--
ALTER TABLE `palabrasalcalde`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `participacion`
--
ALTER TABLE `participacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `emails`
--
ALTER TABLE `emails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `misionvision`
--
ALTER TABLE `misionvision`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `palabrasalcalde`
--
ALTER TABLE `palabrasalcalde`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `participacion`
--
ALTER TABLE `participacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `participacion`
--
ALTER TABLE `participacion`
  ADD CONSTRAINT `participacion_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON DELETE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
