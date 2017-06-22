-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 22-06-2017 a las 04:52:32
-- Versión del servidor: 5.6.35
-- Versión de PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sgnc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `idCliente` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `documento` varchar(30) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `registro` int(11) DEFAULT NULL,
  `correo` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `telefono` varchar(30) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fkTipoCliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `delegaciones`
--

CREATE TABLE `delegaciones` (
  `idDelegacion` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `ubicacion` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `observacion` varchar(300) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallesventas`
--

CREATE TABLE `detallesventas` (
  `fkVenta` int(11) NOT NULL,
  `fkTramite` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadostramites`
--

CREATE TABLE `estadostramites` (
  `idEstadoTramite` int(11) NOT NULL,
  `descripcion` varchar(15) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposclientes`
--

CREATE TABLE `tiposclientes` (
  `idTipoCliente` int(11) NOT NULL,
  `descripcion` varchar(30) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tiposclientes`
--

INSERT INTO `tiposclientes` (`idTipoCliente`, `descripcion`) VALUES
(1, 'Particular'),
(2, 'Escribano');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipostramites`
--

CREATE TABLE `tipostramites` (
  `idTipoTramite` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `costo` int(11) NOT NULL,
  `fkDelegacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tramites`
--

CREATE TABLE `tramites` (
  `idTramite` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `observacion` varchar(500) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `recargo` int(11) DEFAULT NULL,
  `fkCliente` int(11) NOT NULL,
  `fkTipoTramite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `nombreUsuario` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `clave` varchar(32) COLLATE utf8_spanish2_ci NOT NULL,
  `fkRol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nombreUsuario`, `clave`, `fkRol`) VALUES
(1, 'matias', '090c36e3bb39377468363197afb3e91b', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `idVenta` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idCliente`),
  ADD KEY `fkTipoCliente` (`fkTipoCliente`);

--
-- Indices de la tabla `delegaciones`
--
ALTER TABLE `delegaciones`
  ADD PRIMARY KEY (`idDelegacion`);

--
-- Indices de la tabla `detallesventas`
--
ALTER TABLE `detallesventas`
  ADD PRIMARY KEY (`fkVenta`,`fkTramite`),
  ADD KEY `fkTramite` (`fkTramite`);

--
-- Indices de la tabla `estadostramites`
--
ALTER TABLE `estadostramites`
  ADD PRIMARY KEY (`idEstadoTramite`);

--
-- Indices de la tabla `tiposclientes`
--
ALTER TABLE `tiposclientes`
  ADD PRIMARY KEY (`idTipoCliente`);

--
-- Indices de la tabla `tipostramites`
--
ALTER TABLE `tipostramites`
  ADD PRIMARY KEY (`idTipoTramite`),
  ADD KEY `fkDelegacion` (`fkDelegacion`);

--
-- Indices de la tabla `tramites`
--
ALTER TABLE `tramites`
  ADD PRIMARY KEY (`idTramite`),
  ADD KEY `fkCliente` (`fkCliente`),
  ADD KEY `fkTipoTramite` (`fkTipoTramite`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`idVenta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `delegaciones`
--
ALTER TABLE `delegaciones`
  MODIFY `idDelegacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `estadostramites`
--
ALTER TABLE `estadostramites`
  MODIFY `idEstadoTramite` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tiposclientes`
--
ALTER TABLE `tiposclientes`
  MODIFY `idTipoCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tipostramites`
--
ALTER TABLE `tipostramites`
  MODIFY `idTipoTramite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `tramites`
--
ALTER TABLE `tramites`
  MODIFY `idTramite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `idVenta` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`fkTipoCliente`) REFERENCES `tiposclientes` (`idTipoCliente`);

--
-- Filtros para la tabla `detallesventas`
--
ALTER TABLE `detallesventas`
  ADD CONSTRAINT `detallesventas_ibfk_1` FOREIGN KEY (`fkVenta`) REFERENCES `ventas` (`idVenta`),
  ADD CONSTRAINT `detallesventas_ibfk_2` FOREIGN KEY (`fkTramite`) REFERENCES `tramites` (`idTramite`);

--
-- Filtros para la tabla `tipostramites`
--
ALTER TABLE `tipostramites`
  ADD CONSTRAINT `tipostramites_ibfk_1` FOREIGN KEY (`fkDelegacion`) REFERENCES `delegaciones` (`idDelegacion`);

--
-- Filtros para la tabla `tramites`
--
ALTER TABLE `tramites`
  ADD CONSTRAINT `tramites_ibfk_1` FOREIGN KEY (`fkCliente`) REFERENCES `clientes` (`idCliente`),
  ADD CONSTRAINT `tramites_ibfk_2` FOREIGN KEY (`fkTipoTramite`) REFERENCES `tipostramites` (`idTipoTramite`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
