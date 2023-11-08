-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-11-2023 a las 04:09:19
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
-- Estructura de tabla para la tabla `backgrounds`
--

CREATE TABLE `backgrounds` (
  `id` int(11) NOT NULL,
  `login_background` varchar(255) NOT NULL,
  `register_background` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `idEvento` int(11) NOT NULL,
  `titulo` varchar(40) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `descripcion` text NOT NULL,
  `creado` datetime NOT NULL,
  `id_editor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`idEvento`, `titulo`, `direccion`, `imagen`, `descripcion`, `creado`, `id_editor`) VALUES
(5, 'Evento 1', 'Parque Isidora Cousiño, Lota', 'f11a99cfad07d596786d9a1f4ac6299b.jpg', 'aqui va una descripcion de un evento aqui va una descripcion de un evento aqui va una descripcion de un evento aqui va una descripcion de un evento ', '2023-11-07 00:00:00', 10),
(7, 'Evento en la playa', 'Parque Isidora Cousiño, Lota', '458ce8b6dd8b1802abba58f2423e3b71.jpg', 'aqui va una descripcion de un evento aqui va una descripcion de un evento aqui va una descripcion de un evento aqui va una descripcion de un evento ', '2023-11-07 00:00:00', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `misionvision`
--

CREATE TABLE `misionvision` (
  `id` int(11) NOT NULL,
  `tipo` enum('mision','vision','','') NOT NULL,
  `contenido` text NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `misionvision`
--

INSERT INTO `misionvision` (`id`, `tipo`, `contenido`, `fecha`) VALUES
(1, 'mision', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris malesuada sodales posuere. Sed dignissim sed nisi nec luctus. Ut eget varius ipsum. Vestibulum porta tortor sed est luctus, quis blandit magna condimentum. Praesent convallis lacus quis augue feugiat, eu viverra erat pretium. Aenean faucibus fermentum nulla, non bibendum sem consequat.', '0000-00-00 00:00:00'),
(2, 'vision', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris malesuada sodales posuere. Sed dignissim sed nisi nec luctus. Ut eget varius ipsum. Vestibulum porta tortor sed est luctus, quis blandit magna condimentum. Praesent convallis lacus quis augue feugiat, eu viverra erat pretium. Aenean faucibus fermentum nulla, non bibendum sem consequat.', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `idNoticia` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `imagen` varchar(60) NOT NULL,
  `creado` datetime NOT NULL,
  `id_editor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`idNoticia`, `titulo`, `descripcion`, `imagen`, `creado`, `id_editor`) VALUES
(1, 'Municipio de Puqueldón entrega 50 Becas a estudiantes destacados de la comuna.', 'Durante la mañana del 20 de julio, en el salón principal del Edificio Polifuncional, se realizó...', 'e519ec937dcbd5682d4afddcd53afdb3.jpg', '2023-11-07 23:00:11', 10),
(3, 'Egresan los primeros miembros del centro diurno del adulto mayor', 'Este centro, que abrió sus puertas a la comunidad en diciembre del 2021 ...', 'ea937e44ef731f49d9bf84bb6fc158d7.jpg', '2023-11-07 23:26:09', 9),
(4, 'Día Mundial del Medioambiente: Un llamado a la protección de los ecosistemas locales', 'En un esfuerzo conjunto por concientizar sobre la importancia de preservar el medio...', 'abffb014ec4aaac8f30494c21b648033.jpg', '2023-11-07 23:40:47', 10);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `palabrasalcalde`
--

INSERT INTO `palabrasalcalde` (`id`, `titulo`, `contenido`, `nombre_alcalde`, `imagen`, `fecha`) VALUES
(2, 'Bienvenidos a Concepción', 'Desde el municipio estamos trabajando para convertirnos en la Capital del Sur de Chile, teniendo en el centro de nuestras acciones, programas y proyectos a las personas que aquí viven, estudian, trabajan y a quienes vienen a visitarnos o llegaron para comenzar aquí una nueva vida. Somos la tercera ciudad más importante de Chile. Promovemos un desarrollo a escala humana, de los barrios y del centro, que respete y rescate nuestro patrimonio histórico, cultural, natural y turístico como Ciudad de la Independencia, del Rock, Universitaria, del río Biobío, de las Cinco Lagunas y Cerro Caracol, con toda una infraestructura pública y privada de conectividad, hotelería, comercio, salud, educación y negocios de alto nivel. Desde nuestra gestión queremos seguir creciendo consolidando la inclusión y la participación ciudadana, manteniendo la transparencia en nuestro quehacer y articulando sueños y compromisos para grandes y necesarios proyectos.\r\nLes invitamos a cuidar y disfrutar de nuestra ciudad.\r\nUn afectuoso abrazo.', 'Álvaro Ortiz Vera', 'pages/admin/palabras_alcalde/imagen//alcalde-foto.jpg', '2023-11-08 00:00:00');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `idRol` int(11) NOT NULL,
  `nombreRol` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`idRol`, `nombreRol`) VALUES
(1, 'administrador'),
(2, 'usuario'),
(3, 'editor'),
(4, 'emprendedor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `rut` int(8) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` char(60) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `trn_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `rut`, `nombre`, `apellido`, `email`, `password`, `id_rol`, `trn_date`) VALUES
(6, 21212121, 'admin', 'adminapellido', 'admin@correo.com', '$2y$10$.SYuE129.BukxB/njNtIQOIJiFWSAH92zkLPZr6zWONQ43lGvWSvK', 1, '2023-11-07 17:22:50'),
(9, 20202020, 'editor1', 'editorApellido', 'editor@editor.com', '$2y$10$/loG1rrC9XG1sc/YIRUtsOubUjhwNoiOheawYJU7N7ouQBvbblqvu', 3, '2023-11-07 21:09:28'),
(10, 65151215, 'editor2', 'editorApellido', 'editor2@editor.com', '$2y$10$wnw9pltAHQWpHfVPdJwfZ.flEcqDyuPuURDyzHCiXD0G9XmA4EAyC', 3, '2023-11-07 21:09:53'),
(11, 78592131, 'usuario', 'usuarioapellido', 'usuario@usuario.com', '$2y$10$NheB6jZ9S4nm0dnomaG0QupHW2WdZQ0hcxGdD8xM1FbHfpzRn4elW', 2, '2023-11-07 22:11:10');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `backgrounds`
--
ALTER TABLE `backgrounds`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`idEvento`),
  ADD KEY `FK_id_editor` (`id_editor`);

--
-- Indices de la tabla `misionvision`
--
ALTER TABLE `misionvision`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`idNoticia`),
  ADD KEY `FK_id_editor` (`id_editor`);

--
-- Indices de la tabla `palabrasalcalde`
--
ALTER TABLE `palabrasalcalde`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `participacion`
--
ALTER TABLE `participacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `backgrounds`
--
ALTER TABLE `backgrounds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `idEvento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `misionvision`
--
ALTER TABLE `misionvision`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `idNoticia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `palabrasalcalde`
--
ALTER TABLE `palabrasalcalde`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `participacion`
--
ALTER TABLE `participacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`id_editor`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD CONSTRAINT `noticias_ibfk_1` FOREIGN KEY (`id_editor`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`idRol`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
