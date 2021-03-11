-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-02-2021 a las 21:27:18
-- Versión del servidor: 5.7.14
-- Versión de PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `consultorio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citamedica`
--

CREATE TABLE `citamedica` (
  `CODIGOCITAMEDICA` int(11) NOT NULL,
  `MED_CODIGOUSUARIO` int(11) NOT NULL,
  `CODIGOUSUARIO` int(11) NOT NULL,
  `TIPOCONSULTA` char(16) NOT NULL,
  `FECHACONSULTA` date NOT NULL,
  `HORACONSULTA` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion`
--

CREATE TABLE `direccion` (
  `CODIGODIRECCION` int(11) NOT NULL,
  `CODIGOUSUARIO` int(11) NOT NULL,
  `CIUDADDIRECCION` char(16) NOT NULL,
  `CALLEDIRECCION` varchar(32) DEFAULT NULL,
  `NUMERODIRECCION` char(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarioatencion`
--

CREATE TABLE `horarioatencion` (
  `CODIGOHORARIO` int(11) NOT NULL,
  `CODIGOUSUARIO` int(11) NOT NULL,
  `HORAINICIO` time NOT NULL,
  `HORAFIN` time NOT NULL,
  `DIAATENCIONHORARIO` char(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico`
--

CREATE TABLE `medico` (
  `CODIGOUSUARIO` int(11) NOT NULL,
  `NOMBREMEDICO` char(16) NOT NULL,
  `APELLIDOMEDICO` varchar(16) NOT NULL,
  `ESPECIALIDADMEDICO` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `medico`
--

INSERT INTO `medico` (`CODIGOUSUARIO`, `NOMBREMEDICO`, `APELLIDOMEDICO`, `ESPECIALIDADMEDICO`) VALUES
(7, 'Mafer', 'Galarraga', 'general');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `CODIGOUSUARIO` int(11) NOT NULL,
  `NOMBREPACIENTE` char(16) NOT NULL,
  `APELLIDOPATERNO` char(16) NOT NULL,
  `APELLIDOMATERNO` char(16) NOT NULL,
  `FECHANACIMIENTOPACIENTE` date NOT NULL,
  `TELEFONOPACIENTE` char(12) DEFAULT NULL,
  `GENEROPACIENTE` char(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`CODIGOUSUARIO`, `NOMBREPACIENTE`, `APELLIDOPATERNO`, `APELLIDOMATERNO`, `FECHANACIMIENTOPACIENTE`, `TELEFONOPACIENTE`, `GENEROPACIENTE`) VALUES
(4, 'Luis', 'Lochamin', 'Tipan', '2021-02-18', '09881273', 'masculino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `CODIGOUSUARIO` int(11) NOT NULL,
  `NOMBREUSUARIO` varchar(32) NOT NULL,
  `PASSWORDUSUARIO` varchar(32) NOT NULL,
  `TIPOUSUARIO` char(16) NOT NULL COMMENT 'Medico\\r\\n            Paciente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`CODIGOUSUARIO`, `NOMBREUSUARIO`, `PASSWORDUSUARIO`, `TIPOUSUARIO`) VALUES
(4, 'lrloachamin', '123', 'Paciente'),
(5, 'adm', 'adm', 'Administrador'),
(7, 'mafer', '123', 'Medico');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citamedica`
--
ALTER TABLE `citamedica`
  ADD PRIMARY KEY (`CODIGOCITAMEDICA`,`MED_CODIGOUSUARIO`,`CODIGOUSUARIO`),
  ADD KEY `FK_CITAMEDICA2` (`CODIGOUSUARIO`),
  ADD KEY `FK_CITAMEDICA` (`MED_CODIGOUSUARIO`);

--
-- Indices de la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD PRIMARY KEY (`CODIGODIRECCION`,`CODIGOUSUARIO`),
  ADD KEY `FK_PACIENTEDIRECCION` (`CODIGOUSUARIO`);

--
-- Indices de la tabla `horarioatencion`
--
ALTER TABLE `horarioatencion`
  ADD PRIMARY KEY (`CODIGOHORARIO`,`CODIGOUSUARIO`),
  ADD KEY `FK_TIENE` (`CODIGOUSUARIO`);

--
-- Indices de la tabla `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`CODIGOUSUARIO`),
  ADD UNIQUE KEY `CODIGOUSUARIO_UNIQUE` (`CODIGOUSUARIO`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`CODIGOUSUARIO`),
  ADD UNIQUE KEY `CODIGOUSUARIO_UNIQUE` (`CODIGOUSUARIO`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`CODIGOUSUARIO`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citamedica`
--
ALTER TABLE `citamedica`
  MODIFY `CODIGOCITAMEDICA` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `direccion`
--
ALTER TABLE `direccion`
  MODIFY `CODIGODIRECCION` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `horarioatencion`
--
ALTER TABLE `horarioatencion`
  MODIFY `CODIGOHORARIO` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `CODIGOUSUARIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citamedica`
--
ALTER TABLE `citamedica`
  ADD CONSTRAINT `FK_CITAMEDICA` FOREIGN KEY (`MED_CODIGOUSUARIO`) REFERENCES `medico` (`CODIGOUSUARIO`),
  ADD CONSTRAINT `FK_CITAMEDICA2` FOREIGN KEY (`CODIGOUSUARIO`) REFERENCES `paciente` (`CODIGOUSUARIO`);

--
-- Filtros para la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD CONSTRAINT `FK_PACIENTEDIRECCION` FOREIGN KEY (`CODIGOUSUARIO`) REFERENCES `paciente` (`CODIGOUSUARIO`);

--
-- Filtros para la tabla `horarioatencion`
--
ALTER TABLE `horarioatencion`
  ADD CONSTRAINT `FK_TIENE` FOREIGN KEY (`CODIGOUSUARIO`) REFERENCES `medico` (`CODIGOUSUARIO`);

--
-- Filtros para la tabla `medico`
--
ALTER TABLE `medico`
  ADD CONSTRAINT `FK_ES` FOREIGN KEY (`CODIGOUSUARIO`) REFERENCES `usuario` (`CODIGOUSUARIO`);

--
-- Filtros para la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD CONSTRAINT `FK_ES2` FOREIGN KEY (`CODIGOUSUARIO`) REFERENCES `usuario` (`CODIGOUSUARIO`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
