-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-11-2024 a las 05:28:33
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `siyeca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios_publicos`
--

CREATE TABLE `servicios_publicos` (
  `hora_entrada` time DEFAULT NULL,
  `hora_salida` time DEFAULT NULL,
  `sueldo_quincenal` decimal(8,2) DEFAULT NULL,
  `fecha_pago` date DEFAULT NULL,
  `forma_pago` varchar(15) DEFAULT NULL,
  `tipo_banco` varchar(15) DEFAULT NULL,
  `dias_laborales` varchar(15) DEFAULT NULL,
  `fecha_ingreso` datetime DEFAULT NULL,
  `Actividades` varchar(45) DEFAULT NULL,
  `identificador_nomina` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `no_empleado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `servicios_publicos`
--

INSERT INTO `servicios_publicos` (`hora_entrada`, `hora_salida`, `sueldo_quincenal`, `fecha_pago`, `forma_pago`, `tipo_banco`, `dias_laborales`, `fecha_ingreso`, `Actividades`, `identificador_nomina`, `nombre`, `no_empleado`) VALUES
('15:33:00', '13:37:00', 5.00, '2024-11-21', NULL, 'American', 'Av. Juárez 707,', '2024-11-26 00:00:00', NULL, 1, NULL, 13);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `servicios_publicos`
--
ALTER TABLE `servicios_publicos`
  ADD PRIMARY KEY (`identificador_nomina`),
  ADD KEY `no_empleado` (`no_empleado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `servicios_publicos`
--
ALTER TABLE `servicios_publicos`
  MODIFY `identificador_nomina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `servicios_publicos`
--
ALTER TABLE `servicios_publicos`
  ADD CONSTRAINT `servicios_publicos_ibfk_1` FOREIGN KEY (`no_empleado`) REFERENCES `alta_empleados` (`no_empleado`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
