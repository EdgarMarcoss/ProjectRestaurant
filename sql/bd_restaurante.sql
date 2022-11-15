-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-11-2022 a las 06:27:21
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
-- Base de datos: `bd_restaurante`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_incidencia`
--

CREATE TABLE `tbl_incidencia` (
  `id` int(11) NOT NULL,
  `fecha_incidencia` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_final_incidencia` varchar(30) NOT NULL,
  `motivo_incidencia` varchar(100) NOT NULL,
  `id_usuarios` int(11) NOT NULL,
  `id_mobiliario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_incidencia`
--

INSERT INTO `tbl_incidencia` (`id`, `fecha_incidencia`, `fecha_final_incidencia`, `motivo_incidencia`, `id_usuarios`, `id_mobiliario`) VALUES
(1, '2022-11-14 19:40:43', '2022-11-14 20:53:56', 'qwe;', 1, 31),
(2, '2022-11-14 19:42:43', '2022-11-14 22:24:49', 'sad;', 1, 30),
(3, '2022-11-14 19:43:59', '2022-11-14 22:24:55', 'cxlnkcka', 1, 29),
(4, '2022-11-15 05:13:16', '', 'muerte', 1, 43),
(5, '2022-11-15 06:09:40', '', 'Reemplazar', 1, 27),
(6, '2022-11-15 06:11:50', '', 'Revisar patas y asientp', 1, 22),
(7, '2022-11-15 06:13:02', '', 'Mesa coja', 1, 37);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_mobiliario`
--

CREATE TABLE `tbl_mobiliario` (
  `id` int(11) NOT NULL,
  `numero_mobiliario` char(3) NOT NULL,
  `tipo_mobiliario` enum('mesa','silla') NOT NULL,
  `estado_mobiliario` enum('libre','ocupado','mantenimiento') NOT NULL,
  `capacidad_mesa` char(2) NOT NULL,
  `img_mobiliario` varchar(30) NOT NULL,
  `id_sala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_mobiliario`
--

INSERT INTO `tbl_mobiliario` (`id`, `numero_mobiliario`, `tipo_mobiliario`, `estado_mobiliario`, `capacidad_mesa`, `img_mobiliario`, `id_sala`) VALUES
(11, '1', 'mesa', 'libre', '4', 'mesa_4.svg', 13),
(12, '2', 'mesa', 'libre', '2', 'mesa_2.svg', 13),
(13, '3', 'mesa', 'libre', '2', 'mesa_2.svg', 13),
(14, '4', 'mesa', 'libre', '4', 'mesa_4.svg', 13),
(15, '1', 'mesa', 'ocupado', '12', 'mesa_12.svg', 15),
(16, '2', 'mesa', 'libre', '2', 'mesa_2.svg', 15),
(17, '3', 'mesa', 'libre', '4', 'mesa_4.svg', 15),
(18, '4', 'mesa', 'ocupado', '4', 'mesa_4.svg', 15),
(19, '5', 'mesa', 'ocupado', '4', 'mesa_4.svg', 15),
(20, '6', 'mesa', 'libre', '4', 'mesa_4.svg', 15),
(21, '7', 'mesa', 'libre', '2', 'mesa_2.svg', 15),
(22, '8', 'mesa', 'mantenimiento', '12', 'mesa_12.svg', 15),
(23, '1', 'mesa', 'libre', '12', 'mesa_12.svg', 17),
(24, '2', 'mesa', 'libre', '2', 'mesa_2.svg', 17),
(25, '3', 'mesa', 'ocupado', '4', 'mesa_4.svg', 17),
(26, '4', 'mesa', 'libre', '2', 'mesa_2.svg', 17),
(27, '5', 'mesa', 'mantenimiento', '4', 'mesa_4.svg', 17),
(28, '6', 'mesa', 'libre', '2', 'mesa_2.svg', 17),
(29, '1', 'mesa', 'ocupado', '4', 'mesa_4.svg', 14),
(30, '2', 'mesa', 'libre', '2', 'mesa_2.svg', 14),
(31, '3', 'mesa', 'ocupado', '2', 'mesa_2.svg', 14),
(32, '4', 'mesa', 'libre', '4', 'mesa_4.svg', 14),
(33, '1', 'mesa', 'ocupado', '12', 'mesa_12.svg', 16),
(34, '2', 'mesa', 'ocupado', '2', 'mesa_2.svg', 16),
(35, '3', 'mesa', 'libre', '4', 'mesa_4.svg', 16),
(36, '4', 'mesa', 'libre', '4', 'mesa_4.svg', 16),
(37, '5', 'mesa', 'mantenimiento', '4', 'mesa_4.svg', 16),
(38, '6', 'mesa', 'libre', '4', 'mesa_4.svg', 16),
(39, '7', 'mesa', 'libre', '2', 'mesa_2.svg', 16),
(40, '8', 'mesa', 'libre', '12', 'mesa_12.svg', 16),
(41, '1', 'mesa', 'ocupado', '12', 'mesa_12.svg', 18),
(42, '2', 'mesa', 'libre', '2', 'mesa_2.svg', 18),
(43, '3', 'mesa', 'mantenimiento', '4', 'mesa_4.svg', 18),
(44, '4', 'mesa', 'libre', '2', 'mesa_2.svg', 18),
(45, '5', 'mesa', 'libre', '4', 'mesa_4.svg', 18),
(46, '6', 'mesa', 'ocupado', '2', 'mesa_2.svg', 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_reserva`
--

CREATE TABLE `tbl_reserva` (
  `id` int(11) NOT NULL,
  `fecha_reserva` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_desocupacion` varchar(30) NOT NULL,
  `nombre_reserva` varchar(30) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_mobiliario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_reserva`
--

INSERT INTO `tbl_reserva` (`id`, `fecha_reserva`, `fecha_desocupacion`, `nombre_reserva`, `id_usuario`, `id_mobiliario`) VALUES
(37, '2022-11-11 18:19:51', '2022-11-11 18:20:22', 'Fabri', 1, 11),
(38, '2022-11-11 18:32:10', '2022-11-15 06:24:49', 'Fabri', 1, 11),
(39, '2022-11-13 16:02:42', '', 'hola', 1, 18),
(40, '2022-11-14 03:26:17', '2022-11-14 03:28:41', 'r1', 1, 30),
(41, '2022-11-14 03:26:23', '2022-11-14 19:52:23', 'r2', 1, 32),
(42, '2022-11-14 03:26:34', '2022-11-14 03:28:35', 'r3', 1, 40),
(43, '2022-11-14 03:26:42', '', 'r4', 1, 34),
(44, '2022-11-14 03:26:52', '2022-11-14 03:28:16', 'r5', 1, 45),
(45, '2022-11-14 03:27:06', '2022-11-14 03:28:28', 'r6', 1, 23),
(46, '2022-11-14 03:28:13', '2022-11-15 05:13:02', 'r7', 1, 42),
(47, '2022-11-14 03:28:26', '2022-11-15 06:26:16', 'r8', 1, 26),
(48, '2022-11-14 17:57:44', '2022-11-14 17:58:33', 'jol', 1, 35),
(50, '2022-11-15 06:09:19', '2022-11-15 06:17:37', 'mario', 1, 24),
(51, '2022-11-15 06:09:29', '2022-11-15 06:17:41', 'family jey', 1, 23),
(52, '2022-11-15 06:10:01', '', 'Agüero', 1, 41),
(53, '2022-11-15 06:10:08', '', 'Lokito', 1, 46),
(54, '2022-11-15 06:10:36', '2022-11-15 06:17:28', 'Cassidy', 1, 14),
(55, '2022-11-15 06:11:00', '2022-11-15 06:16:47', 'Ross', 1, 20),
(56, '2022-11-15 06:11:28', '2022-11-15 06:19:13', 'Campaña Ruiz', 1, 15),
(57, '2022-11-15 06:12:12', '2022-11-15 06:15:52', 'Biktor', 1, 39),
(58, '2022-11-15 06:12:24', '2022-11-15 06:16:35', 'Pol', 1, 35),
(59, '2022-11-15 06:13:19', '2022-11-15 06:13:49', 'Vanesa', 1, 31),
(60, '2022-11-15 06:13:26', '', 'Laura', 1, 29),
(61, '2022-11-15 06:13:41', '2022-11-15 06:17:25', 'Lara', 1, 12),
(62, '2022-11-15 06:13:57', '2022-11-15 06:16:21', 'Martin', 1, 32),
(63, '2022-11-15 06:16:02', '', 'American Family', 1, 33),
(64, '2022-11-15 06:16:17', '', 'Jorge', 1, 31),
(65, '2022-11-15 06:19:26', '', 'Jaime birth', 1, 15),
(66, '2022-11-15 06:21:19', '2022-11-15 06:23:09', 'family jey', 1, 19),
(67, '2022-11-15 06:22:38', '2022-11-15 06:22:43', 'kayo', 1, 20),
(68, '2022-11-15 06:23:03', '2022-11-15 06:23:24', 'Phoenix', 1, 20),
(69, '2022-11-15 06:23:18', '', 'reina', 1, 19),
(70, '2022-11-15 06:23:30', '2022-11-15 06:23:36', 'Sova', 1, 20),
(71, '2022-11-15 06:24:21', '2022-11-15 06:24:45', 'Max', 1, 12),
(72, '2022-11-15 06:24:32', '2022-11-15 06:24:57', 'Noir', 1, 14),
(73, '2022-11-15 06:24:40', '2022-11-15 06:24:52', 'Keisy', 1, 13),
(74, '2022-11-15 06:25:06', '2022-11-15 06:25:10', 'Viper', 1, 13),
(75, '2022-11-15 06:25:20', '2022-11-15 06:25:25', 'Leonard', 1, 13),
(76, '2022-11-15 06:25:31', '2022-11-15 06:25:35', 'Sheldon', 1, 13),
(77, '2022-11-15 06:26:53', '', 'Valeria', 1, 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_salas`
--

CREATE TABLE `tbl_salas` (
  `id` int(11) NOT NULL,
  `nombre_sala` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_salas`
--

INSERT INTO `tbl_salas` (`id`, `nombre_sala`) VALUES
(13, 'Terraza_1'),
(14, 'Terraza_2'),
(15, 'Comedor_1'),
(16, 'Comedor_2'),
(17, 'Privada_1'),
(18, 'Privada_2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

CREATE TABLE `tbl_usuarios` (
  `id` int(11) NOT NULL,
  `personal_usuario` enum('camarero','mantenimiento') NOT NULL,
  `nombre_usuario` varchar(20) NOT NULL,
  `apellido_usuario` varchar(30) NOT NULL,
  `email_usuario` varchar(30) NOT NULL,
  `password_usuario` varchar(300) NOT NULL,
  `telefono_usuario` char(9) NOT NULL,
  `dni_usuario` char(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`id`, `personal_usuario`, `nombre_usuario`, `apellido_usuario`, `email_usuario`, `password_usuario`, `telefono_usuario`, `dni_usuario`) VALUES
(1, 'camarero', 'Arnaldo', 'Poblado', 'Apoblado@gmail.com', 'dc96fe03acc04c194649640d9bc1447b2e7334a5feb73333321323e06648ad2f', '685412579', '04262235J'),
(2, 'mantenimiento', 'Orestes', 'Abello', 'Obello@gmail.com', '758449d9e0542b5f286b40b8d82768b58269f208ea8d4ed8a11c98e8df1e6097', '687452136', '59722723A');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_incidencia`
--
ALTER TABLE `tbl_incidencia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuarios` (`id_usuarios`),
  ADD KEY `id_mobiliario` (`id_mobiliario`);

--
-- Indices de la tabla `tbl_mobiliario`
--
ALTER TABLE `tbl_mobiliario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sala` (`id_sala`);

--
-- Indices de la tabla `tbl_reserva`
--
ALTER TABLE `tbl_reserva`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_mobiliario` (`id_mobiliario`);

--
-- Indices de la tabla `tbl_salas`
--
ALTER TABLE `tbl_salas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_incidencia`
--
ALTER TABLE `tbl_incidencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tbl_mobiliario`
--
ALTER TABLE `tbl_mobiliario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de la tabla `tbl_reserva`
--
ALTER TABLE `tbl_reserva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT de la tabla `tbl_salas`
--
ALTER TABLE `tbl_salas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_incidencia`
--
ALTER TABLE `tbl_incidencia`
  ADD CONSTRAINT `tbl_incidencia_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `tbl_usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_incidencia_ibfk_2` FOREIGN KEY (`id_mobiliario`) REFERENCES `tbl_mobiliario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_mobiliario`
--
ALTER TABLE `tbl_mobiliario`
  ADD CONSTRAINT `tbl_mobiliario_ibfk_1` FOREIGN KEY (`id_sala`) REFERENCES `tbl_salas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_reserva`
--
ALTER TABLE `tbl_reserva`
  ADD CONSTRAINT `tbl_reserva_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `tbl_usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_reserva_ibfk_2` FOREIGN KEY (`id_mobiliario`) REFERENCES `tbl_mobiliario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
