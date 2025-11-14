-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-11-2025 a las 06:26:02
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
-- Base de datos: `beta_tecnologias`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dispositivos`
--

CREATE TABLE `dispositivos` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `dispositivos`
--

INSERT INTO `dispositivos` (`id`, `descripcion`) VALUES
(1, 'impresoras'),
(2, 'laptops'),
(3, 'pc escritotio'),
(4, 'robot'),
(5, 'camara'),
(6, 'robot');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros`
--

CREATE TABLE `registros` (
  `id` int(11) NOT NULL,
  `id_dispositivo` int(11) DEFAULT NULL,
  `id_definido` int(11) DEFAULT NULL,
  `marca` varchar(255) DEFAULT NULL,
  `modelo` varchar(255) DEFAULT NULL,
  `caracteristicas` varchar(255) DEFAULT NULL,
  `estatus` int(1) DEFAULT NULL,
  `imagen` longblob NOT NULL,
  `fecha_registro` datetime DEFAULT NULL,
  `fecha_edit` datetime DEFAULT NULL,
  `persona_registra` varchar(255) DEFAULT NULL,
  `persona_edit` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registros`
--

INSERT INTO `registros` (`id`, `id_dispositivo`, `id_definido`, `marca`, `modelo`, `caracteristicas`, `estatus`, `imagen`, `fecha_registro`, `fecha_edit`, `persona_registra`, `persona_edit`) VALUES
(1, 1, 52365, 'HP', 'J565', 'jiwebfuinoiwbncuiwbcuiwecbuiwcb', 1, '', '2024-07-18 11:59:22', '0000-00-00 00:00:00', 'Saul de Jesus San Martin Martinez', 'Saul de Jesus San Martin Martinez'),
(2, 1, 52365, 'HP', 'J565', 'jiwebfuinoiwbncuiwbcuiwecbuiwcb', 1, '', '2024-07-18 11:59:22', '0000-00-00 00:00:00', 'Saul de Jesus San Martin Martinez', 'Saul de Jesus San Martin Martinez'),
(3, 1, 52365, 'HP', 'J565', 'jiwebfuinoiwbncuiwbcuiwecbuiwcb', 1, '', '2024-07-18 11:59:22', '0000-00-00 00:00:00', 'Saul de Jesus San Martin Martinez', 'Saul de Jesus San Martin Martinez'),
(4, 2, 46955, 'ASUS', 'LK45K', 'Equipo con una RAM de 16GB procesador Intel Core i3\nTodo esta perfecto ya que es un equipo nuevo', 1, '', '2024-07-19 00:30:40', '0000-00-00 00:00:00', 'Saul de Jesus San Martin Martinez', 'Saul de Jesus San Martin Martinez'),
(5, 1, 65856, 'JLaser', 'k5d4', 'l;kfmkefnjoncoincocniwvn', 1, '', '2024-07-19 17:53:26', '0000-00-00 00:00:00', 'Saul de Jesus San Martin Martinez', 'Saul de Jesus San Martin Martinez'),
(6, 2, 56855, 'djndjnd', 'djkwqb', 'ajkfb', 1, '', '2024-07-19 17:56:16', '0000-00-00 00:00:00', 'Saul de Jesus San Martin Martinez', 'Saul de Jesus San Martin Martinez'),
(7, 2, 625615, 'jkdvwu', 'djckb', 'jcwoihcn', 1, '', '2024-07-19 18:08:35', '0000-00-00 00:00:00', 'Saul de Jesus San Martin Martinez', 'Saul de Jesus San Martin Martinez'),
(8, 1, 51561, 'uivyf', 'vgy', 'yugf', 1, '', '2024-07-20 15:26:07', '0000-00-00 00:00:00', 'Saul de Jesus San Martin Martinez', 'Saul de Jesus San Martin Martinez'),
(9, 1, 56545, 'fwjnfh', 'cdwjkwnf', 'oiewhf', 1, '', '2024-07-20 15:29:44', '0000-00-00 00:00:00', 'Saul de Jesus San Martin Martinez', 'Saul de Jesus San Martin Martinez'),
(10, 1, 456156, 'frwge3rg', 'grerg', 'grheth', 1, '', '2024-07-20 15:36:36', '0000-00-00 00:00:00', 'Saul de Jesus San Martin Martinez', 'Saul de Jesus San Martin Martinez'),
(11, 2, 56156156, '.lfu', 'tyk', 'ftu', 1, '', '2024-07-21 14:19:19', '0000-00-00 00:00:00', 'Saul de Jesus San Martin Martinez', 'Saul de Jesus San Martin Martinez'),
(12, 1, 55615156, 'khvyh', 'yufkty', 'yuf', 1, '', '2024-07-21 15:22:04', '0000-00-00 00:00:00', 'Saul de Jesus San Martin Martinez', 'Saul de Jesus San Martin Martinez'),
(13, 1, 52782, 'ge35g', 'gferg', 'vergt', 1, '', '2024-07-21 15:24:57', '0000-00-00 00:00:00', 'Saul de Jesus San Martin Martinez', 'Saul de Jesus San Martin Martinez'),
(14, 3, 621, 'agaetzb', 'evserg', 'vrvea<', 1, '', '2024-07-21 15:26:24', '0000-00-00 00:00:00', 'Saul de Jesus San Martin Martinez', 'Saul de Jesus San Martin Martinez'),
(15, 1, 23587, 'ers45', 'afr', 'ewf', 1, '', '2024-07-21 15:29:19', '0000-00-00 00:00:00', 'Saul de Jesus San Martin Martinez', 'Saul de Jesus San Martin Martinez'),
(16, 2, 6251, 'guy', 'hjgyu', 'gyu', 1, '', '2024-07-22 14:29:12', '0000-00-00 00:00:00', 'Saul de Jesus San Martin Martinez', 'Saul de Jesus San Martin Martinez'),
(17, 2, 61561, 'hjbvhy', 'fdve', 'ferfrwf', 1, '', '2024-07-22 14:36:54', '0000-00-00 00:00:00', 'Saul de Jesus San Martin Martinez', 'Saul de Jesus San Martin Martinez'),
(18, 2, 6556156, 'jkbuyhvhjv', 'yuvybhy', 'jhhfvybhu', 1, '', '2024-07-22 14:39:54', '0000-00-00 00:00:00', 'Saul de Jesus San Martin Martinez', 'Saul de Jesus San Martin Martinez'),
(19, 1, 66521, 'jkgyuhb', 'hugyuh', 'hjvbhjvb', 1, '', '2024-07-22 14:46:42', '0000-00-00 00:00:00', 'Saul de Jesus San Martin Martinez', 'Saul de Jesus San Martin Martinez'),
(20, 2, 5566, 'nefionwh', 'oi', 'nj', 1, '', '2024-08-16 17:25:10', '0000-00-00 00:00:00', 'Saul de Jesus San Martin Martinez', 'Saul de Jesus San Martin Martinez'),
(21, 5, 55656, 'HP', 'KL54S', 'Azul, con carcasa de plastico, lente de 45 megapixeles', 1, '', '2024-08-26 01:53:19', '0000-00-00 00:00:00', 'Saul de Jesus San Martin Martinez', 'Saul de Jesus San Martin Martinez'),
(22, 2, 52355, 'HP', 'K564', 'Ayuda porfa', 1, '', '2025-06-28 12:48:18', '0000-00-00 00:00:00', 'Kevin Narciso', 'Kevin Narciso'),
(23, 2, 555, 'cdsc', 'xsxc', 'csc', 1, '', '2025-06-28 14:30:40', '0000-00-00 00:00:00', 'Kevin Narciso', 'Kevin Narciso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `rol` varchar(30) NOT NULL,
  `estatus` int(11) NOT NULL,
  `nombre_usuario` varchar(255) NOT NULL,
  `password_user` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `rol`, `estatus`, `nombre_usuario`, `password_user`) VALUES
(3, 'Saul de Jesus San Martin Martinez', 'superadmin', 1, 'saulMart009', '$2y$10$18UKn7tl9OuSC4zRljgOMuPau0hRNhe/fbCUJVcn.FQct/bcbQZkO'),
(22, 'UsuarioDeprueba2', 'admin', 0, 'user2', '$2y$10$.9dYpNdsZxZt3NJAnZiQFu4V8C193G907sgwGm1eW9Dj59YuCUwn6'),
(23, 'UsuarioDePrueba3', 'subadmin', 1, 'user3', '$2y$10$QkR9/gCcZA4Mene9AZWkge554sCJgQnmCeRpInfQCAR1bJtELDEIq'),
(24, 'UsuarioDePrueba4', 'visualizador', 1, 'user4', '$2y$10$Z3E36SBToT1xC7MrQ/QvIebc85W.06yEI98wM7Jbwq.soA5lkHGu.'),
(26, 'Kevin', 'subadmin', 1, 'kevin', '$2y$10$vkPrU2qQffGpo5yRXIaL5OmNLfT0um.qlA2/xKH4KT.RJzUFdXTTe'),
(27, 'Kevin Narciso', 'superadmin', 1, 'user5', '$2y$10$BLJ3twKIMA3FVKcyFk5YwOVqhIxyCSUDu1jz3tjhIRuH/GDDZXe36'),
(28, '[saul]', '[superadmin]', 1, '[saul01]', '[123]'),
(29, 'saul', 'superadmin', 1, 'saul001', '123'),
(30, 'saul002', 'superadmin', 1, 'saul002', '$2y$10$Q6mZf0Q8Xa1HxzEB8gL4Ruv7yQ4uD1N5WxqIMp9RY99VoYcQGZ28C\n');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `dispositivos`
--
ALTER TABLE `dispositivos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registros`
--
ALTER TABLE `registros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_dispositivo` (`id_dispositivo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `registros`
--
ALTER TABLE `registros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `registros`
--
ALTER TABLE `registros`
  ADD CONSTRAINT `registros_ibfk_1` FOREIGN KEY (`id_dispositivo`) REFERENCES `dispositivos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
