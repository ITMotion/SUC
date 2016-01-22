-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-01-2016 a las 06:09:36
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `escuela`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE IF NOT EXISTS `alumnos` (
  `matricula` varchar(8) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `paterno` varchar(50) NOT NULL,
  `materno` varchar(50) NOT NULL,
  `grupo` varchar(4) NOT NULL,
  PRIMARY KEY (`matricula`),
  KEY `grupo` (`grupo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`matricula`, `nombres`, `paterno`, `materno`, `grupo`) VALUES
('14391001', 'JUAN PACO', 'PEDRO', 'DE LA MAR', 'SI51'),
('14391002', 'FULANITO', 'DE TAL', 'DE TAL', 'SI51'),
('14391003', 'PAQUITO', 'LA DEL BARRIO', 'LADEN', 'SI51'),
('14391005', 'MICHAEL', 'JORDAN', 'JORDAN', 'SI51'),
('14391020', 'ANGEL', 'PEREZ', 'JUAN', 'SI52'),
('14391021', 'RUBÉN', 'LOPEZ', 'HERNANDEZ', 'SI52'),
('14391023', 'LUIS RODRIGO SEBASTIÁN', 'HUANTE', 'PAREDES', 'SI52'),
('14391046', 'GUSTAVO ALEJANDRO', 'VALDERRAMA', 'PALOMARES', 'SI52'),
('14391047', 'SERGIO ANDRÉS', 'MEZA', 'MARTINEZ', 'SI52'),
('14391065', 'ANGEL', 'PEREZ', 'ANOTA', 'SI52'),
('14391090', 'EMMANUEL', 'ORTIZ', 'BLANCO', 'SI51'),
('14391099', 'JAVIER', 'MENDEZ', 'MONTALVÁN', 'SI51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE IF NOT EXISTS `asistencia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alumno` varchar(50) NOT NULL,
  `materia` varchar(4) NOT NULL,
  `grupo` varchar(4) NOT NULL,
  `fecha` date NOT NULL,
  `asistencia` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `materia` (`materia`),
  KEY `alumno` (`alumno`),
  KEY `materia_2` (`materia`),
  KEY `alumno_2` (`alumno`),
  KEY `fecha` (`fecha`),
  KEY `grupo` (`grupo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calendario`
--

CREATE TABLE IF NOT EXISTS `calendario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dia-semana` varchar(20) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Volcado de datos para la tabla `calendario`
--

INSERT INTO `calendario` (`id`, `dia-semana`, `fecha`) VALUES
(1, 'miércoles', '2016-01-06'),
(2, 'jueves', '2016-01-07'),
(3, 'viernes', '2016-01-08'),
(4, 'sábado', '2016-01-09'),
(5, 'domingo', '2016-01-10'),
(6, 'lunes', '2016-01-11'),
(7, 'martes', '2016-01-12'),
(8, 'miércoles', '2016-01-13'),
(9, 'jueves', '2016-01-14'),
(10, 'viernes', '2016-01-15'),
(11, 'sábado', '2016-01-16'),
(12, 'domingo', '2016-01-17'),
(13, 'lunes', '2016-01-18'),
(14, 'martes', '2016-01-19'),
(15, 'miércoles', '2016-01-20'),
(16, 'jueves', '2016-01-21'),
(17, 'viernes', '2016-01-22'),
(18, 'sábado', '2016-01-23'),
(19, 'domingo', '2016-01-24'),
(20, 'lunes', '2016-01-25'),
(21, 'martes', '2016-01-26'),
(22, 'miércoles', '2016-01-27'),
(23, 'jueves', '2016-01-28'),
(24, 'viernes', '2016-01-29'),
(25, 'sábado', '2016-01-30'),
(26, 'domingo', '2016-01-31'),
(27, 'lunes', '2016-02-01'),
(28, 'martes', '2016-02-02'),
(29, 'miércoles', '2016-02-03'),
(30, 'jueves', '2016-02-04'),
(31, 'viernes', '2016-02-05'),
(32, 'sábado', '2016-02-06'),
(33, 'domingo', '2016-02-07'),
(34, 'lunes', '2016-02-08'),
(35, 'martes', '2016-02-09'),
(36, 'miércoles', '2016-02-10'),
(37, 'jueves', '2016-02-11'),
(38, 'viernes', '2016-02-12'),
(39, 'sábado', '2016-02-13'),
(40, 'domingo', '2016-02-14'),
(41, 'lunes', '2016-02-15'),
(42, 'martes', '2016-02-16'),
(43, 'miércoles', '2016-02-17'),
(44, 'jueves', '2016-02-18'),
(45, 'viernes', '2016-02-19'),
(46, 'sábado', '2016-02-20'),
(47, 'domingo', '2016-02-21'),
(48, 'lunes', '2016-02-22'),
(49, 'martes', '2016-02-23'),
(50, 'miércoles', '2016-02-24'),
(51, 'jueves', '2016-02-25'),
(52, 'viernes', '2016-02-26'),
(53, 'sábado', '2016-02-27'),
(54, 'domingo', '2016-02-28'),
(55, 'lunes', '2016-02-29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--

CREATE TABLE IF NOT EXISTS `calificaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alumno` varchar(8) NOT NULL,
  `materia` varchar(4) NOT NULL,
  `unidad` int(11) NOT NULL,
  `saber` double NOT NULL,
  `saberhacer` double NOT NULL,
  `ser` double NOT NULL,
  `asistencia` double NOT NULL,
  `calificacionfinal` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `alumno` (`alumno`,`materia`,`unidad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE IF NOT EXISTS `carreras` (
  `codigo` int(8) NOT NULL AUTO_INCREMENT,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`codigo`, `descripcion`) VALUES
(1, 'TSU en Tecnologías de la Información y Comunicación - Sistemas Informáticos'),
(2, 'TSU en Tecnologías de la Información y Comunicación - Redes y Telecomunicaciones');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configcalificaciones`
--

CREATE TABLE IF NOT EXISTS `configcalificaciones` (
  `id` int(11) NOT NULL,
  `saber` double NOT NULL,
  `saberHacer` double NOT NULL,
  `ser` double NOT NULL,
  `unidad` int(11) NOT NULL,
  `materia` varchar(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `unidad` (`unidad`,`materia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diasmaterias`
--

CREATE TABLE IF NOT EXISTS `diasmaterias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `materia` varchar(4) NOT NULL,
  `dia` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `materia` (`materia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `diasmaterias`
--

INSERT INTO `diasmaterias` (`id`, `materia`, `dia`) VALUES
(1, '1000', 'lunes'),
(2, '1000', 'miércoles'),
(3, '1000', 'jueves'),
(4, '1000', 'viernes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupomateria`
--

CREATE TABLE IF NOT EXISTS `grupomateria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idgrupo` varchar(4) NOT NULL,
  `idmateria` varchar(4) NOT NULL,
  `idprofesor` varchar(8) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idgrupo` (`idgrupo`),
  KEY `idmateria` (`idmateria`),
  KEY `idprofesor` (`idprofesor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `grupomateria`
--

INSERT INTO `grupomateria` (`id`, `idgrupo`, `idmateria`, `idprofesor`) VALUES
(1, 'SI51', '1000', '12345678');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE IF NOT EXISTS `grupos` (
  `grupo` varchar(6) NOT NULL,
  `salon` varchar(4) NOT NULL,
  `horario` varchar(10) NOT NULL,
  `carrera` int(8) NOT NULL,
  PRIMARY KEY (`grupo`),
  KEY `carrera` (`carrera`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`grupo`, `salon`, `horario`, `carrera`) VALUES
('SI51', 'H125', 'matutino', 1),
('SI52', 'H126', 'matutino', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE IF NOT EXISTS `materias` (
  `clave` varchar(4) NOT NULL,
  `descripcion` varchar(30) NOT NULL,
  `grado` int(11) NOT NULL,
  `carrera` int(8) NOT NULL,
  `unidades` int(11) NOT NULL,
  PRIMARY KEY (`clave`),
  KEY `carrera` (`carrera`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`clave`, `descripcion`, `grado`, `carrera`, `unidades`) VALUES
('1000', 'Desarrollo de Aplicaciones III', 5, 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE IF NOT EXISTS `profesores` (
  `matricula` varchar(8) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `paterno` varchar(50) NOT NULL,
  `materno` varchar(50) NOT NULL,
  `tipo` varchar(3) NOT NULL,
  `carrera` int(8) NOT NULL,
  PRIMARY KEY (`matricula`),
  KEY `carrera` (`carrera`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`matricula`, `nombres`, `paterno`, `materno`, `tipo`, `carrera`) VALUES
('12345678', 'Rafael', 'Villegas', 'Velasco', 'PA', 1),
('48571524', 'Liliana', 'Avila', 'Galicia', 'PTC', 1),
('84712348', 'Mayra', 'Fuentes', 'Sosa', 'PTC', 1),
('87654321', 'Sandra', 'Hernandez', 'Chacón', 'PTC', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidades`
--

CREATE TABLE IF NOT EXISTS `unidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(20) NOT NULL,
  `fechainicio` date NOT NULL,
  `fechafin` date NOT NULL,
  `materia` varchar(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `materia` (`materia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `username` varchar(20) NOT NULL,
  `contraseña` varchar(20) NOT NULL,
  `profesor` varchar(8) NOT NULL,
  PRIMARY KEY (`username`),
  KEY `profesor` (`profesor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `alumno-grupo` FOREIGN KEY (`grupo`) REFERENCES `grupos` (`grupo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD CONSTRAINT `asistencia-grupo` FOREIGN KEY (`grupo`) REFERENCES `grupos` (`grupo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alumo-asistencia` FOREIGN KEY (`alumno`) REFERENCES `alumnos` (`matricula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `materias-asistencia` FOREIGN KEY (`materia`) REFERENCES `materias` (`clave`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `diasmaterias`
--
ALTER TABLE `diasmaterias`
  ADD CONSTRAINT `materias-dias` FOREIGN KEY (`materia`) REFERENCES `materias` (`clave`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `grupomateria`
--
ALTER TABLE `grupomateria`
  ADD CONSTRAINT `grupo-materia` FOREIGN KEY (`idgrupo`) REFERENCES `grupos` (`grupo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `materias-grupo` FOREIGN KEY (`idmateria`) REFERENCES `materias` (`clave`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `profesor-grupo` FOREIGN KEY (`idprofesor`) REFERENCES `profesores` (`matricula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD CONSTRAINT `grupo-carrera` FOREIGN KEY (`carrera`) REFERENCES `carreras` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `materias`
--
ALTER TABLE `materias`
  ADD CONSTRAINT `materia-carrera` FOREIGN KEY (`carrera`) REFERENCES `carreras` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `unidades`
--
ALTER TABLE `unidades`
  ADD CONSTRAINT `materias-unidades` FOREIGN KEY (`materia`) REFERENCES `materias` (`clave`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
