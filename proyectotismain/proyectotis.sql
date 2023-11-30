-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-11-2023 a las 21:31:38
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

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
-- Estructura de tabla para la tabla `acciones_usuarios`
--

CREATE TABLE `acciones_usuarios` (
  `email_usuario` varchar(255) NOT NULL,
  `id_noticia` int(11) NOT NULL,
  `accion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `acciones_usuarios`
--

INSERT INTO `acciones_usuarios` (`email_usuario`, `id_noticia`, `accion`) VALUES
('pmonjes@ing.ucsc.cl', 6, 'like'),
('pmonjes@ing.ucsc.cl', 7, 'like');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asuntos`
--

CREATE TABLE `asuntos` (
  `id` int(11) NOT NULL,
  `asunto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `asuntos`
--

INSERT INTO `asuntos` (`id`, `asunto`) VALUES
(1, 'Acera en mal estado'),
(2, 'Calle en mal estado'),
(3, 'Auto abandonado');

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
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `comentario` text NOT NULL,
  `id_users` int(11) NOT NULL,
  `reply` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `id_noticia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id`, `comentario`, `id_users`, `reply`, `fecha`, `id_noticia`) VALUES
(19, 'aaaa', 15, 0, '2023-11-26 16:17:49', 7),
(20, 'a', 15, 0, '2023-11-26 16:18:12', 7),
(21, 'a', 15, 0, '2023-11-26 16:18:14', 7),
(22, 'asdasd', 15, 0, '2023-11-26 16:19:21', 7),
(23, 'aaaaac', 15, 0, '2023-11-26 16:19:25', 6),
(24, 'aaaa21', 15, 0, '2023-11-26 16:20:14', 6),
(25, 'aaaa21', 15, 0, '2023-11-26 16:22:17', 7),
(26, 'aaaa21', 15, 0, '2023-11-26 16:22:34', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario_usuario_enlace`
--

CREATE TABLE `comentario_usuario_enlace` (
  `id` int(11) NOT NULL,
  `id_comentario` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comentario_usuario_enlace`
--

INSERT INTO `comentario_usuario_enlace` (`id`, `id_comentario`, `id_user`) VALUES
(16, 19, 15),
(17, 20, 15),
(18, 21, 15),
(19, 22, 15),
(20, 23, 15),
(21, 24, 15),
(22, 25, 15),
(23, 26, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `denuncias`
--

CREATE TABLE `denuncias` (
  `id` int(11) NOT NULL,
  `id_comentario` int(11) DEFAULT NULL,
  `id_usuario_reporta` int(11) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `denuncias`
--

INSERT INTO `denuncias` (`id`, `id_comentario`, `id_usuario_reporta`, `fecha`) VALUES
(2, 24, 15, '2023-11-28 02:19:29');

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
(2, 'Dirección de Desarrollo Comunitario', 'La Dirección de Desarrollo Comunitario tiene como objetivo la promoción del desarrollo comunitario, el fortalecimiento de las organizaciones comunitarias, la proposición de medidas relacionadas con asistencia social y contingencia, la salud pública, la protección del medio ambiente, educación y cultura, capacitación laboral, deporte y recreación, promoción del empleo, fomento productivo local y turismo.', 'Paula Concha Constanzo', 2147483647, 'pconcha@concepcion.com', 'O’Higgins 525, 2° piso, Concepción', 'Asesorar al Alcalde y también al Concejo Municipal en la promoción del desarrollo comunitario.\r\nPrestar asesoría técnica a las organizaciones comunitarias, fomentar su desarrollo y legalización, y promover su efectiva participación en el municipio.\r\nProponer y ejecutar, dentro de su ámbito y cuando corresponda, medidas tendientes a materializar acciones relacionadas con la salud pública- protección del medio ambiente, educación y cultura, capacitación laboral, deportes y recreación, promoción del empleo, fomento productivo local y turismo.\r\nPrestar el servicio diseñado por el Sistema de información Social según la normativa que lo regula y proporcionar datos estadísticos y/o diagnósticos sociales para necesidades generales de la Dideco o de la Municipalidad.\r\nRealizar los procesos pertinentes en la gestión de abastecimiento, según las normas de la Plataforma Mercado Público y Reglamentos de Adquisiciones vigentes en el municipio.'),
(3, 'Dirección de Administración de Salud', 'La Dirección de Desarrollo Comunitario tiene como objetivo la promoción del desarrollo comunitario, el fortalecimiento de las organizaciones comunitarias, la proposición de medidas relacionadas con asistencia social y contingencia, la salud pública, la protección del medio ambiente, educación y cultura, capacitación laboral, deporte y recreación, promoción del empleo, fomento productivo local y turismo.', 'Director: Aldo Mardones Alarcón', 41, 'amardones@concepcion.cl', 'O´Higgins 525, 2° piso', 'Asesorar al Alcalde y también al Concejo Municipal en la promoción del desarrollo comunitario.\r\nPrestar asesoría técnica a las organizaciones comunitarias, fomentar su desarrollo y legalización, y promover su efectiva participación en el municipio.\r\nProponer y ejecutar, dentro de su ámbito y cuando corresponda, medidas tendientes a materializar acciones relacionadas con la salud pública- protección del medio ambiente, educación y cultura, capacitación laboral, deportes y recreación, promoción del empleo, fomento productivo local y turismo.\r\nPrestar el servicio diseñado por el Sistema de información Social según la normativa que lo regula y proporcionar datos estadísticos y/o diagnósticos sociales para necesidades generales de la Dideco o de la Municipalidad.\r\nRealizar los procesos pertinentes en la gestión de abastecimiento, según las normas de la Plataforma Mercado Público y Reglamentos de Adquisiciones vigentes en el municipio.'),
(4, 'Dirección de Obras municipales', 'Es una unidad de línea, de dependencia administrativa directa del Alcalde, y dependencia técnica del MINVU a través de la O.G.U. y C, Ley Gral. De Urbanismo y Construcciones. Es una unidad de línea, de dependencia administrativa directa del Alcalde, y dependencia técnica del MINVU a través de la O.G.U. y C, Ley Gral. De Urbanismo y Construcciones. Tiene como objetivo La Dirección de Obras Municipales, tendrá como objetivo procurar el desarrollo urbano de la comuna y velar por el cumplimiento de las disposiciones de la Ley General de Urbanismo y Construcciones, del Plan Regulador Comunal y de las ordenanzas correspondientes. Es una unidad de línea, de dependencia administrativa directa del Alcalde, y dependencia técnica del MINVU a través de la O.G.U. y C, Ley Gral. De Urbanismo y Construcciones. Tiene como objetivo La Dirección de Obras Municipales, tendrá como objetivo procurar el desarrollo urbano de la comuna y velar por el cumplimiento de las disposiciones de la Ley General de Urbanismo y Construcciones, del Plan Regulador Comunal y de las ordenanzas correspondientes. Es una unidad de línea, de dependencia administrativa directa del Alcalde, y dependencia técnica del MINVU a través de la O.G.U. y C, Ley Gral. De Urbanismo y Construcciones. Tiene como objetivo La Dirección de Obras Municipales, tendrá como objetivo procurar el desarrollo urbano de la comuna y velar por el cumplimiento de las disposiciones de la Ley General de Urbanismo y Construcciones, del Plan Regulador Comunal y de las ordenanzas correspondientes. Es una unidad de línea, de dependencia administrativa directa del Alcalde, y dependencia técnica del MINVU a través de la O.G.U. y C, Ley Gral. De Urbanismo y Construcciones. Tiene como objetivo La Dirección de Obras Municipales, tendrá como objetivo procurar el desarrollo urbano de la comuna y velar por el cumplimiento de las disposiciones de la Ley General de Urbanismo y Construcciones, del Plan Regulador Comunal y de las ordenanzas correspondientes. Tiene como objetivo La Dirección de Obras Municipales, tendrá como objetivo procurar el desarrollo urbano de la comuna y velar por el cumplimiento de las disposiciones de la Ley General de Urbanismo y Construcciones, del Plan Regulador Comunal y de las ordenanzas correspondientes. Es una unidad de línea, de dependencia administrativa directa del Alcalde, y dependencia técnica del MINVU a través de la O.G.U. y C, Ley Gral. De Urbanismo y Construcciones. Tiene como objetivo La Dirección de Obras Municipales, tendrá como objetivo procurar el desarrollo urbano de la comuna y velar por el cumplimiento de las disposiciones de la Ley General de Urbanismo y Construcciones, del Plan Regulador Comunal y de las ordenanzas correspondientes. Es una unidad de línea, de dependencia administrativa directa del Alcalde, y dependencia técnica del MINVU a través de la O.G.U. y C, Ley Gral. De Urbanismo y Construcciones. Tiene como objetivo La Dirección de Obras Municipales, tendrá como objetivo procurar el desarrollo urbano de la comuna y velar por el cumplimiento de las disposiciones de la Ley General de Urbanismo y Construcciones, del Plan Regulador Comunal y de las ordenanzas correspondientes.', 'Juan Andreoli González', 2147483647, 'jandreoli@concepcion.cl', 'Barros Arana 544, Tercer piso.', 'Velar por el cumplimiento de las disposiciones de la Ley General de Urbanismo y Construcciones, del plan regulador comunal y de las Ordenanzas correspondientes.\r\nFiscalizar las obras en ejecución, a fin de verificar el cumplimiento de las disposiciones legales y técnicas que las rijan.\r\nVelar por el cumplimiento de la normativa ambiental vigente.\r\nConfeccionar y mantener actualizado el catastro de las obras de urbanización y edificación realizadas en la comuna.\r\nVelar por el cumplimiento de la normativa vigente sobre vialidad establecida por el Plan Regulador Comunal.\r\nEn general, aplicar las normas generales sobre construcción y urbanización en la comuna.\r\nVelar por el cumplimiento del Plan Regulador Comunal y de las ordenanzas correspondientes, en sus aspectos territoriales y las normas legales sobre la materia a través de las siguientes medidas:\r\nAprobar las subdivisiones de predios urbanos y expansión urbana.\r\nAprobar los proyectos de obras de urbanización que se efectúen en las zonas urbanas y de expansión urbana, previo informe de la Asesoría Urbana, y de construcción en general, que se efectúen en las áreas urbanas y urbano-rurales.\r\nAprobar los proyectos de construcción de obras nuevas de ampliación, reparación transformación, demolición, etc., de las obras existentes, y otorgar los permisos de edificación de las construcciones antes señaladas.\r\nFiscalizar las obras de urbanización y construcción en ejecución hasta el momento de su recepción, y\r\nOtorgar la recepción de las obras ya citadas y autorizar su uso.\r\nConfeccionar, implementar y mantener actualizado el catastro de las obras de urbanización y edificación realizadas en la comuna.'),
(5, 'Dirección de Aseo y Ornato', 'La Dirección de Aseo, Ornato y Medio Ambiente tiene como objetivo, velar por el aseo y orden de los espacios públicos de la comuna, proporcionando una adecuada y eficiente extracción y disposición de los residuos domiciliarios, así como también la administración, ornamentación y mantención de las áreas verdes, todo lo anterior en contribución al mejoramiento del medio ambiente, haciendo de Concepción una comuna sustentable.', 'Mauricio Talpen Sanhueza', 2147483647, 'mtalpen@concepcion.cl', 'Ejército 1058, Concepción', 'Diseñar programas para la disposición final de la basura.\r\nOrganizar el aseo de vías públicas, la mantención de parques, jardines y en general, el aseo de los bienes nacionales de uso público existentes en la comuna.\r\nAdministrar las áreas verdes de la comuna y proponer programas de construcción, reparación, mantención y cuidado de éstas.\r\nEvaluar permanentemente los procedimientos empleados en su unidad, de manera tal, que éstos se encuentren actualizados y estén acordes con una buena gestión.\r\nControlar el rendimiento y la eficiencia en las labores del personal de su dependencia.\r\nControlar la correcta disposición final de la basura inerte que se deposite en el vertedero.\r\nColaborar en la protección y defensa de las áreas verdes públicas de la comuna y en la elaboración de proyectos de ornamentación.\r\nApoyar a la solución de problemas medioambientales de la Comuna\r\nControlar el retiro oportuno de escombros y micro basurales, denunciando ante la autoridad sanitaria correspondiente para la iniciación de los procesos que fuesen pertinentes.\r\nDisponer el control y correcto funcionamiento del equipo rodante que efectúa labores de aseo y recolección de basuras.\r\nOtras funciones que impliquen desarrollar acciones tendientes a la solución de problemas que afecten a la comunidad en el área de su competencia.\r\nRecepcionar áreas verdes producto de loteos habitacionales.\r\nRecepcionar áreas verdes construidas por otros organismos públicos.'),
(6, 'Dirección de Seguridad Pública', 'Contribuir a incrementar los niveles de seguridad de la ciudad, previniendo actos de violencia e incivilidades, en particular respecto de los grupos más vulnerables. La Dirección de Seguridad Pública depende directamente del Alcalde y tiene a su cargo:  Sección de Seguridad Pública Sección de Seguridad Ciudadana Central de llamadas y cámaras de televigilancia', 'Daisy Cardenas', 412263055, 'dcardenas@concepcion.cl', 'Ejército #1020, Concepción', 'Colaborar directamente con el alcalde en las tareas de implementación, evaluación, promoción, capacitación y apoyo de acciones de prevención social y situacional, la celebración de convenios con otras entidades públicas para la aplicación de planes de reinserción social y de asistencia a víctimas, así como también la adopción de medidas en el ámbito de la seguridad pública a nivel comunal.\r\n\r\nColaborar directamente con el alcalde en la elaboración, aprobación, ejecución y evaluación del Plan Comunal de Seguridad Pública.\r\n\r\nPreparar información y proponer políticas, estudios, proyectos y programas en materia de seguridad pública.\r\n\r\nEstablecer mesas de trabajo vinculadas a la seguridad pública y seguridad ciudadana.\r\n\r\nAdministrar los contratos relacionados con servicios de seguridad pública y seguridad ciudadana.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emprendedores`
--

CREATE TABLE `emprendedores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `ano_creacion` varchar(255) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `direccion` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `aprobado` tinyint(1) NOT NULL,
  `fecha` datetime NOT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `emprendedores`
--

INSERT INTO `emprendedores` (`id`, `nombre`, `ano_creacion`, `descripcion`, `direccion`, `foto`, `aprobado`, `fecha`, `email`) VALUES
(6, 'Venta de juegos', '1 de enero 2015', 'Vendo juegos de Steam ', 'Via internet', '1be0c432ddc64a9243f5fd0c77319868.jpg', 0, '2023-11-30 06:30:26', 'pmonjes@ing.ucsc.cl'),
(7, 'Vendo entradas', '22 de noviembre del 2023', 'Vendo entradas para concierto', 'Calle siempre viva #2247', 'ddcdd598257d5563e6a2ed6a8bbe07ee.jpg', 1, '2023-11-30 06:31:04', 'pmonjes@ing.ucsc.cl');

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
  `id_editor` int(11) NOT NULL,
  `visitas` int(11) NOT NULL DEFAULT 0,
  `likes` int(11) DEFAULT 0,
  `dislikes` int(11) DEFAULT 0,
  `valorizacion` int(11) DEFAULT NULL,
  `num_valorizaciones` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`idNoticia`, `titulo`, `descripcion`, `imagen`, `creado`, `id_editor`, `visitas`, `likes`, `dislikes`, `valorizacion`, `num_valorizaciones`) VALUES
(6, 'aaaaa', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '51731b9122b22500e906db278f4c82cf.jpg', '2023-11-24 02:24:41', 9, 40, 4, 1, 4, 1),
(7, 'acsssss', '123456789101112131415161718192021222324252627282930', '07504b00c23aeabc9329d52f5a8a8596.jpg', '2023-11-24 02:31:29', 9, 30, 2, 0, 4, 1),
(8, 'Metro', 'metrometrometrometrometrometrometrometrometrometrometrometrometrometrometrometrometrometrometrometrometrometrometrometrometrometrometrometrometrometro', '1cdea6084b17f934e5746a421d166d6e.jpg', '2023-11-29 21:43:51', 9, 3, 0, 0, 4, 1),
(9, 'Nueva biblioteca municipal', 'Una noticia Una noticia Una noticia Una noticia Una noticia Una noticia Una noticia Una noticia Una noticia Una noticia ', 'f3b42cfeeec9dbef20dd6e2bcb0d7254.jpg', '2023-11-30 01:48:00', 9, 3, 0, 0, NULL, 0);

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
  `id_departamento` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `otro_dpto_text` text NOT NULL,
  `fecha` datetime NOT NULL,
  `estado_revision` varchar(255) DEFAULT 'Sin leer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(15, 20514299, 'Pablo', 'Monjes', 'pmonjes@ing.ucsc.cl', '$2y$10$6zW1ggOd8jqIArJXmZike.1MwcoxAeUyGcWmZiC99pFmINADXhPnS', 2, '0', 1, 'bc8fc6bc01b21fce0a8d54beeb8b3ebcc0552a47ae091fac8f1f6f3ec74ac1a4', NULL, '2023-11-16 03:35:19', '2023-11-16 01:02:18'),
(37, 22222222, 'a', 'b', 'asdas@asdas.com', '$2y$10$ftkKAiTvsXY97W9OOAcmv.C9a8wVDfLPjJKGmaw18rgOn.8W4y0g6', 2, 'c06daddd851f4c5cf8739be8c6923f3514d8743b607d1b6b99feaee68e62abce', 0, '', '2023-11-26 22:58:24', NULL, '2023-11-26 21:58:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valorizaciones`
--

CREATE TABLE `valorizaciones` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_noticia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `valorizaciones`
--

INSERT INTO `valorizaciones` (`id`, `id_usuario`, `id_noticia`) VALUES
(5, 15, 6),
(3, 15, 7),
(4, 15, 8);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acciones_usuarios`
--
ALTER TABLE `acciones_usuarios`
  ADD PRIMARY KEY (`email_usuario`,`id_noticia`);

--
-- Indices de la tabla `asuntos`
--
ALTER TABLE `asuntos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `backgrounds`
--
ALTER TABLE `backgrounds`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_users` (`id_users`),
  ADD KEY `id_noticia` (`id_noticia`);

--
-- Indices de la tabla `comentario_usuario_enlace`
--
ALTER TABLE `comentario_usuario_enlace`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_comentario` (`id_comentario`);

--
-- Indices de la tabla `denuncias`
--
ALTER TABLE `denuncias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_comentario` (`id_comentario`),
  ADD KEY `id_usuario_reporta` (`id_usuario_reporta`);

--
-- Indices de la tabla `dirmunicipales`
--
ALTER TABLE `dirmunicipales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `emprendedores`
--
ALTER TABLE `emprendedores`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_departamento` (`id_departamento`);

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
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `FK_id_rol` (`id_rol`);

--
-- Indices de la tabla `valorizaciones`
--
ALTER TABLE `valorizaciones`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_user_noticia` (`id_usuario`,`id_noticia`),
  ADD KEY `id_noticia` (`id_noticia`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `backgrounds`
--
ALTER TABLE `backgrounds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `comentario_usuario_enlace`
--
ALTER TABLE `comentario_usuario_enlace`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `denuncias`
--
ALTER TABLE `denuncias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `dirmunicipales`
--
ALTER TABLE `dirmunicipales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `emprendedores`
--
ALTER TABLE `emprendedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `idNoticia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `valorizaciones`
--
ALTER TABLE `valorizaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `acciones_usuarios`
--
ALTER TABLE `acciones_usuarios`
  ADD CONSTRAINT `acciones_usuarios_ibfk_1` FOREIGN KEY (`email_usuario`) REFERENCES `users` (`email`);

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`id_noticia`) REFERENCES `noticias` (`idNoticia`) ON DELETE CASCADE;

--
-- Filtros para la tabla `comentario_usuario_enlace`
--
ALTER TABLE `comentario_usuario_enlace`
  ADD CONSTRAINT `comentario_usuario_enlace_ibfk_1` FOREIGN KEY (`id_comentario`) REFERENCES `comentarios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comentario_usuario_enlace_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `denuncias`
--
ALTER TABLE `denuncias`
  ADD CONSTRAINT `denuncias_ibfk_1` FOREIGN KEY (`id_comentario`) REFERENCES `comentarios` (`id`),
  ADD CONSTRAINT `denuncias_ibfk_2` FOREIGN KEY (`id_usuario_reporta`) REFERENCES `users` (`id`);

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
-- Filtros para la tabla `participacion`
--
ALTER TABLE `participacion`
  ADD CONSTRAINT `fk_departamento` FOREIGN KEY (`id_departamento`) REFERENCES `dirmunicipales` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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

--
-- Filtros para la tabla `valorizaciones`
--
ALTER TABLE `valorizaciones`
  ADD CONSTRAINT `valorizaciones_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `valorizaciones_ibfk_2` FOREIGN KEY (`id_noticia`) REFERENCES `noticias` (`idNoticia`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
