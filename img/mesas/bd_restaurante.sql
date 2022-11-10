-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-11-2022 a las 16:59:38
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
  `fecha_incidencia` datetime NOT NULL,
  `motivo_incidencia` varchar(100) NOT NULL,
  `id_usuarios` int(11) NOT NULL,
  `id_mobiliario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_mobiliario`
--

CREATE TABLE `tbl_mobiliario` (
  `id` int(11) NOT NULL,
  `numero_mobiliario` char(3) NOT NULL,
  `tipo_mobiliario` enum('mesa','silla') NOT NULL,
  `estado_mobiliario` enum('libre','ocupado','mantenimento') NOT NULL,
  `capacidad_mesa` char(2) NOT NULL,
  `img_mobiliario` varchar(30) NOT NULL,
  `id_sala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_mobiliario`
--

INSERT INTO `tbl_mobiliario` (`id`, `numero_mobiliario`, `tipo_mobiliario`, `estado_mobiliario`, `capacidad_mesa`, `img_mobiliario`, `id_sala`) VALUES
(1, '1', 'mesa', 'libre', '2', 'mesa_2.svg', 15),
(2, '2', 'mesa', 'libre', '2', 'mesa_2.svg', 15),
(3, '1', 'mesa', 'libre', '4', 'mesa_4.svg', 18),
(4, '2', 'mesa', 'libre', '4', 'mesa_4.svg', 18),
(5, '1', 'mesa', 'libre', '4', 'mesa_4.svg', 13);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_mobiliario`
--
ALTER TABLE `tbl_mobiliario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tbl_reserva`
--
ALTER TABLE `tbl_reserva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

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
