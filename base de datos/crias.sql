-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-08-2022 a las 02:31:06
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `crias`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `crias`
--

CREATE TABLE `crias` (
  `id` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `NoRegistro` varchar(100) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `marmoleo` int(5) NOT NULL,
  `colorMusculo` int(5) NOT NULL,
  `peso` decimal(10,2) NOT NULL,
  `costo` decimal(10,2) NOT NULL,
  `descripcion` text NOT NULL,
  `status_revision` enum('sin datos','revisado','saludable','cuarentena') DEFAULT 'sin datos',
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `crias`
--

INSERT INTO `crias` (`id`, `id_proveedor`, `NoRegistro`, `nombre`, `marmoleo`, `colorMusculo`, `peso`, `costo`, `descripcion`, `status_revision`, `fecha`) VALUES
(1, 1, 'REG-0001', 'nuevo', 4, 4, '20.00', '38000.00', 'nuevo registro', 'saludable', '2022-08-01 15:55:43'),
(2, 1, 'REG-0002', 'jdasda', 4, 3, '45.00', '8500.00', 'sadddadadasdadda', 'cuarentena', '2022-08-01 17:47:06'),
(3, 1, 'REG-0003', 'NAAS', 4, 4, '40.00', '14800.00', 'ADDJASDSD ASDJDAD DSADJDSA SDDJADASDDJDSAJDASD ADASDJDD SADJDADDA', 'saludable', '2022-08-01 18:30:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datossensores`
--

CREATE TABLE `datossensores` (
  `id` int(11) NOT NULL,
  `id_crias` int(11) NOT NULL,
  `tempertura` decimal(8,2) NOT NULL,
  `frecuencia_c` int(11) NOT NULL,
  `frecuencia_r` int(11) NOT NULL,
  `frecuencia_s` int(11) NOT NULL,
  `fecha_revision` datetime DEFAULT NULL,
  `status_rev` enum('enviado','revisado') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `datossensores`
--

INSERT INTO `datossensores` (`id`, `id_crias`, `tempertura`, `frecuencia_c`, `frecuencia_r`, `frecuencia_s`, `fecha_revision`, `status_rev`) VALUES
(1, 1, '39.00', 75, 15, 10, '2022-08-01 16:11:11', 'revisado'),
(2, 1, '40.00', 90, 10, 8, '2022-08-01 16:47:11', 'revisado'),
(3, 1, '38.00', 75, 18, 10, '2022-08-01 17:19:59', 'revisado'),
(4, 1, '40.00', 80, 25, 14, '2022-08-01 17:31:10', 'revisado'),
(5, 2, '38.00', 78, 25, 10, '2022-08-01 17:47:42', 'revisado'),
(6, 1, '39.00', 75, 15, 10, '2022-08-01 18:15:17', 'revisado'),
(7, 2, '38.00', 74, 18, 8, '2022-08-01 18:18:38', 'revisado'),
(8, 2, '39.00', 74, 18, 8, '2022-08-01 18:19:38', 'revisado'),
(9, 2, '38.00', 70, 20, 15, '2022-08-01 18:22:22', 'revisado'),
(10, 1, '39.00', 75, 18, 10, '2022-08-01 18:23:10', 'revisado'),
(11, 1, '39.00', 74, 18, 8, '2022-08-01 18:25:40', 'enviado'),
(12, 3, '39.50', 75, 18, 10, '2022-08-01 18:31:12', 'revisado'),
(13, 2, '37.00', 75, 18, 8, '2022-08-01 18:32:09', 'enviado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `empresa` varchar(50) NOT NULL,
  `tel` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `crias`
--
ALTER TABLE `crias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `datossensores`
--
ALTER TABLE `datossensores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `crias`
--
ALTER TABLE `crias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `datossensores`
--
ALTER TABLE `datossensores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
