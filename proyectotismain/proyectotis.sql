-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-11-2023 a las 03:54:02
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
  `register_background` varchar(255) NOT NULL,
  `inicio_background` varchar(255) NOT NULL,
  `mapa_background` varchar(255) NOT NULL,
  `noticias_background` varchar(255) NOT NULL,
  `eventos_background` varchar(255) NOT NULL,
  `misionyvision_background` varchar(255) NOT NULL,
  `participacion_background` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `comentario_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `noticia_id` int(11) NOT NULL,
  `contenido` text NOT NULL,
  `fecha_publicacion` datetime NOT NULL,
  `likes` int(11) NOT NULL,
  `dislikes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento_participacion`
--

CREATE TABLE `departamento_participacion` (
  `id` int(11) NOT NULL,
  `nombre_departamento` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `departamento_participacion`
--

INSERT INTO `departamento_participacion` (`id`, `nombre_departamento`) VALUES
(1, 'Acera en mal estado'),
(2, 'Calle en mal estado'),
(3, 'Auto abandonado');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `dirmunicipales`
--

INSERT INTO `dirmunicipales` (`id`, `nombre`, `descripcion`, `director`, `telefono`, `email`, `direccion`, `funciones`) VALUES
(2, 'DIRECCIÓN DE DESARROLLO COMUNITARIO', 'La Dirección de Desarrollo Comunitario tiene como objetivo la promoción del desarrollo comunitario, el fortalecimiento de las organizaciones comunitarias, la proposición de medidas relacionadas con asistencia social y contingencia, la salud pública, la protección del medio ambiente, educación y cultura, capacitación laboral, deporte y recreación, promoción del empleo, fomento productivo local y turismo.', 'Paula Concha Constanzo', 2147483647, 'pconcha@concepcion.com', 'O’Higgins 525, 2° piso, Concepción', 'Asesorar al Alcalde y también al Concejo Municipal en la promoción del desarrollo comunitario.\r\nPrestar asesoría técnica a las organizaciones comunitarias, fomentar su desarrollo y legalización, y promover su efectiva participación en el municipio.\r\nProponer y ejecutar, dentro de su ámbito y cuando corresponda, medidas tendientes a materializar acciones relacionadas con la salud pública- protección del medio ambiente, educación y cultura, capacitación laboral, deportes y recreación, promoción del empleo, fomento productivo local y turismo.\r\nPrestar el servicio diseñado por el Sistema de información Social según la normativa que lo regula y proporcionar datos estadísticos y/o diagnósticos sociales para necesidades generales de la Dideco o de la Municipalidad.\r\nRealizar los procesos pertinentes en la gestión de abastecimiento, según las normas de la Plataforma Mercado Público y Reglamentos de Adquisiciones vigentes en el municipio.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dislike`
--

CREATE TABLE `dislike` (
  `dislike_id` int(11) NOT NULL,
  `comentario_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `fecha_dislike` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`idEvento`, `titulo`, `direccion`, `imagen`, `descripcion`, `creado`, `id_editor`) VALUES
(7, 'Evento en la playa', 'Parque Isidora Cousiño, Lota', '458ce8b6dd8b1802abba58f2423e3b71.jpg', 'aqui va una descripcion de un evento aqui va una descripcion de un evento aqui va una descripcion de un evento aqui va una descripcion de un evento ', '2023-11-07 00:00:00', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `likes`
--

CREATE TABLE `likes` (
  `like_id` int(11) NOT NULL,
  `comentario_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `fecha_like` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, 'mision', 'Loraaaaaaem ipsum dolor sit amet, consectetur adipiscing elit. Mauris malesuada sodales posuere. Sed dignissim sed nisi nec luctus. Ut eget varius ipsum. Vestibulum porta tortor sed est lauctus, quis blandit magna condimentum. Praesent convallis lacus quis augue feugiat, eu viverra erat pretium. Aenean faucibus fermentum nulla, non bibendum sem consequat.', '0000-00-00 00:00:00'),
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`idNoticia`, `titulo`, `descripcion`, `imagen`, `creado`, `id_editor`) VALUES
(6, 'aaaaa', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '4716b520bc470b193d25c3363ca50244.jpg', '2023-11-24 02:24:41', 9),
(7, 'acsssss', '123456789101112131415161718192021222324252627282930', 'bfd2457810416306db3389ff38477cbf.jpg', '2023-11-24 02:31:29', 9);

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
(2, 'Bienvenidos a Concepción', 'Desdea el municipio estamos trabajando para convertirnos en la Capital del Sur de Chile, teniendo en el centro de nuestras acciones, programas y proyectos a las personas que aquí viven, estudian, trabajan y a quienes vienen a visitarnos o llegaron para comenzar aquí una nueva vida. Somos la tercera ciudad más importante de Chile. Promovemos un desarrollo a escala humana, de los barrios y del centro, que respete y rescate nuestro patrimonio histórico, cultural, natural y turístico como Ciudad de la Independencia, del Rock, Universitaria, del río Biobío, de las Cinco Lagunas y Cerro Caracol, con toda una infraestructura pública y privada de conectividad, hotelería, comercio, salud, educación y negocios de alto nivel. Desde nuestra gestión queremos seguir creciendo consolidando la inclusión y la participación ciudadana, manteniendo la transparencia en nuestro quehacer y articulando sueños y compromisos para grandes y necesarios proyectos.\r\nLes invitamos a cuidar y disfrutar de nuestra ciudad.\r\nUn afectuoso abrazo.', 'Álvaro Ortiz Vera', 'pages/admin/palabras_alcalde/imagen//alcalde-foto.jpg', '2023-11-08 00:00:00');

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
  `fecha` datetime NOT NULL,
  `estado_revision` varchar(255) DEFAULT 'Sin leer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `participacion`
--

INSERT INTO `participacion` (`id`, `email`, `tipo_contribucion`, `departamento`, `descripcion`, `otro_dpto_text`, `fecha`, `estado_revision`) VALUES
(1, 'pmonjes@ing.ucsc.cl', 'denuncia', 'paradero', 'aaaa', '', '2023-11-19 02:24:48', 'Sin leer'),
(2, 'pmonjes@ing.ucsc.cl', 'felicitacion', 'vial', '1', '', '2023-11-19 02:28:24', 'Sin leer'),
(3, 'pmonjes@ing.ucsc.cl', 'denuncia', 'parque', 'a', '', '2023-11-19 02:29:55', 'Sin leer'),
(4, 'pmonjes@ing.ucsc.cl', 'felicitacion', 'parque', 'a', '', '2023-11-19 02:29:59', 'Sin leer'),
(5, 'pmonjes@ing.ucsc.cl', 'sugerencia', 'parque', 'a', '', '2023-11-19 02:31:25', 'Sin leer'),
(6, 'pmonjes@ing.ucsc.cl', 'denuncia', 'parque', 'a', '', '2023-11-19 02:32:39', 'Sin leer'),
(7, 'pmonjes@ing.ucsc.cl', 'denuncia', 'vial', '2', '', '2023-11-19 02:36:09', 'Sin leer'),
(8, 'pmonjes@ing.ucsc.cl', 'denuncia', 'parque', '3', '', '2023-11-19 02:40:25', 'Sin leer'),
(9, 'pmonjes@ing.ucsc.cl', 'felicitacion', 'parque', 'a', '', '2023-11-19 02:45:53', 'Sin leer'),
(10, 'pmonjes@ing.ucsc.cl', 'felicitacion', 'paradero', '123', '', '2023-11-19 02:52:22', 'Sin leer'),
(11, 'pmonjes@ing.ucsc.cl', 'felicitacion', 'vial', '111', '', '2023-11-19 03:02:21', 'Sin leer'),
(12, 'pmonjes@ing.ucsc.cl', 'denuncia', 'parque', '11', '', '2023-11-19 03:03:02', 'Sin leer'),
(13, 'pmonjes@ing.ucsc.cl', 'denuncia', 'parque', '111', '', '2023-11-19 03:04:34', 'Sin leer'),
(14, 'pmonjes@ing.ucsc.cl', 'denuncia', 'paradero', 'aaaaaaav', '', '2023-11-19 03:05:31', 'Sin leer'),
(15, 'pmonjes@ing.ucsc.cl', 'felicitacion', 'parque', 'prueba1', '', '2023-11-19 03:09:34', 'Sin leer'),
(16, 'pmonjes@ing.ucsc.cl', 'sugerencia', 'parque', 'prueba 2', '', '2023-11-19 03:10:21', 'Sin leer'),
(17, 'pmonjes@ing.ucsc.cl', 'felicitacion', 'parque', 'prueba3', '', '2023-11-19 03:13:46', 'Sin leer'),
(18, 'pmonjes@ing.ucsc.cl', 'denuncia', 'vial', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '', '2023-11-19 03:33:55', 'En proceso'),
(19, 'pmonjes@ing.ucsc.cl', 'denuncia', 'vial', 'aa', '', '2023-11-20 03:08:45', 'Sin leer'),
(20, 'pmonjes@ing.ucsc.cl', 'denuncia', 'parque', 'aaaaaa', '', '2023-11-20 03:18:53', 'Sin leer');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restrablecer_password`
--

CREATE TABLE `restrablecer_password` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `expiracion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `idRol` int(11) NOT NULL,
  `nombreRol` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `verification_token` varchar(255) NOT NULL,
  `activado` tinyint(1) NOT NULL,
  `reset_token` varchar(255) NOT NULL,
  `token_expiration_verification` datetime DEFAULT NULL,
  `token_expiracion` datetime DEFAULT NULL,
  `trn_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `rut`, `nombre`, `apellido`, `email`, `password`, `id_rol`, `verification_token`, `activado`, `reset_token`, `token_expiration_verification`, `token_expiracion`, `trn_date`) VALUES
(6, 21212121, 'admin sdsd', 'adminapellido', 'admin@correo.com', '$2y$10$.SYuE129.BukxB/njNtIQOIJiFWSAH92zkLPZr6zWONQ43lGvWSvK', 1, '0', 1, '', NULL, NULL, '2023-11-07 17:22:50'),
(9, 20202020, 'editor1', 'editorApellido', 'editor@editor.com', '$2y$10$/loG1rrC9XG1sc/YIRUtsOubUjhwNoiOheawYJU7N7ouQBvbblqvu', 3, '0', 1, '', NULL, NULL, '2023-11-07 21:09:28'),
(11, 78592131, 'usuario', 'usuarioapellido', 'usuario@usuario.com', '$2y$10$NheB6jZ9S4nm0dnomaG0QupHW2WdZQ0hcxGdD8xM1FbHfpzRn4elW', 2, '0', 1, '', NULL, NULL, '2023-11-07 22:11:10'),
(15, 20514299, 'pablo', 'monjes', 'pmonjes@ing.ucsc.cl', '$2y$10$6zW1ggOd8jqIArJXmZike.1MwcoxAeUyGcWmZiC99pFmINADXhPnS', 2, '0', 1, 'bc8fc6bc01b21fce0a8d54beeb8b3ebcc0552a47ae091fac8f1f6f3ec74ac1a4', NULL, '2023-11-16 03:35:19', '2023-11-16 01:02:18');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `backgrounds`
--
ALTER TABLE `backgrounds`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`comentario_id`),
  ADD KEY `noticia_id` (`noticia_id`),
  ADD KEY `fk_usuario` (`usuario_id`);

--
-- Indices de la tabla `departamento_participacion`
--
ALTER TABLE `departamento_participacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `dirmunicipales`
--
ALTER TABLE `dirmunicipales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `dislike`
--
ALTER TABLE `dislike`
  ADD PRIMARY KEY (`dislike_id`),
  ADD KEY `dislike_ibfk_1` (`comentario_id`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`idEvento`),
  ADD KEY `FK_id_editor` (`id_editor`);

--
-- Indices de la tabla `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`like_id`),
  ADD KEY `likes_ibfk_1` (`comentario_id`);

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
-- Indices de la tabla `restrablecer_password`
--
ALTER TABLE `restrablecer_password`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

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
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `comentario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `dirmunicipales`
--
ALTER TABLE `dirmunicipales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `dislike`
--
ALTER TABLE `dislike`
  MODIFY `dislike_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `idEvento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `likes`
--
ALTER TABLE `likes`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `misionvision`
--
ALTER TABLE `misionvision`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `idNoticia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `palabrasalcalde`
--
ALTER TABLE `palabrasalcalde`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `participacion`
--
ALTER TABLE `participacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `restrablecer_password`
--
ALTER TABLE `restrablecer_password`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`noticia_id`) REFERENCES `noticias` (`idNoticia`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `dislike`
--
ALTER TABLE `dislike`
  ADD CONSTRAINT `dislike_ibfk_1` FOREIGN KEY (`comentario_id`) REFERENCES `comentario` (`comentario_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`id_editor`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`comentario_id`) REFERENCES `comentario` (`comentario_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD CONSTRAINT `noticias_ibfk_1` FOREIGN KEY (`id_editor`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `restrablecer_password`
--
ALTER TABLE `restrablecer_password`
  ADD CONSTRAINT `restrablecer_password_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`idRol`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
