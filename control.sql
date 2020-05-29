-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-05-2019 a las 03:53:26
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `control`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia_entrada`
--

CREATE TABLE `asistencia_entrada` (
  `id` int(11) NOT NULL,
  `cedula` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Fecha_entrada` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `asistencia_entrada`
--

INSERT INTO `asistencia_entrada` (`id`, `cedula`, `Fecha_entrada`) VALUES
(1, 'v-25852952', '2016-04-19 15:04:41'),
(2, 'v-25426980', '2001-05-19 17:48:15'),
(3, 'v-25426980', '2019-05-25 15:43:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia_salida`
--

CREATE TABLE `asistencia_salida` (
  `id` int(255) NOT NULL,
  `cedula` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Fecha_salida` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `asistencia_salida`
--

INSERT INTO `asistencia_salida` (`id`, `cedula`, `Fecha_salida`) VALUES
(1, 'v-25852952', '2021-04-19 20:09:15'),
(2, 'v-25426980', '2001-05-19 17:48:23'),
(3, 'v-25426980', '2001-05-19 17:49:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `Cedula` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Apellido` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Cargo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `FechaIngreso` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`Cedula`, `Nombre`, `Apellido`, `Cargo`, `FechaIngreso`) VALUES
('v-25426980', 'Ramoncitop ', 'Lopez', 'PRESIDENTE', '2016-02-10'),
('v-25456789', 'Yvan', 'Bolivar', 'Profesor', '2017-10-12'),
('v-25852952', 'Jhonathan', 'Berra', 'secretario gay', '2017-06-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_a`
--

CREATE TABLE `usuario_a` (
  `user` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Correo` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario_a`
--

INSERT INTO `usuario_a` (`user`, `password`, `Correo`) VALUES
('AdAdnerys', '$2y$10$RHVu6BKOb4C3Fu5ykPa6n.7z/OijTnbZt.MnS2lAJsgdHEsYMFwJu', 'adnerys@Gmail.com'),
('AdRamon', '$2y$10$es48PwTPbJIfBzGE.HZnOeDd47DLr12Nu/Io3tIDanD396dEsM9Ie', 'Ramonlopez1997@gmail.com'),
('AdYvan', '$2y$10$bKeBOOlzQz64jCBe4HCDCeIKf1adsaCynCWiM6wYINk0IvtyCa44i', 'yvan@Gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_e`
--

CREATE TABLE `usuario_e` (
  `user` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Correo` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario_e`
--

INSERT INTO `usuario_e` (`user`, `password`, `Correo`) VALUES
('EmpRamon', '$2y$10$REG880KuAfTI8sn7gabbSej6ljRYUoNXuy6wJeXxxIG20a2i1JlH6', 'Ramonlopez1997@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asistencia_entrada`
--
ALTER TABLE `asistencia_entrada`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `asistencia_salida`
--
ALTER TABLE `asistencia_salida`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`Cedula`);

--
-- Indices de la tabla `usuario_a`
--
ALTER TABLE `usuario_a`
  ADD PRIMARY KEY (`user`);

--
-- Indices de la tabla `usuario_e`
--
ALTER TABLE `usuario_e`
  ADD PRIMARY KEY (`user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asistencia_entrada`
--
ALTER TABLE `asistencia_entrada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `asistencia_salida`
--
ALTER TABLE `asistencia_salida`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
