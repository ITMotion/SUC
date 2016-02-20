-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-02-2016 a las 00:40:53
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

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `login`(IN user INT(8), IN pass VARCHAR(20))
BEGIN
SELECT tipo
FROM usuarios
WHERE username = user AND contraseña = pass;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE IF NOT EXISTS `alumnos` (
  `matricula` int(8) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(50) NOT NULL,
  `paterno` varchar(50) NOT NULL,
  `materno` varchar(50) NOT NULL,
  `grupo` varchar(4) NOT NULL,
  PRIMARY KEY (`matricula`),
  KEY `grupo` (`grupo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14391091 ;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`matricula`, `nombres`, `paterno`, `materno`, `grupo`) VALUES
(11391747, 'FERNANDO ALBERTO', 'VASQUEZ', 'CANCHE', 'SI52'),
(13391122, 'JESUS ALBERTO', 'MARTINEZ', 'RODRIGUEZ', 'SI52'),
(13391130, 'JESUS ABRAHAM', 'TAMAYO', 'GUZMAN', 'SI52'),
(13391133, 'CARLOS JOHANNY', 'RUIZ', 'DE LA LUZ', 'SI52'),
(13391623, 'ALEXIS', 'AVILA', 'PEÑA', 'SI52'),
(14391006, 'ORLANDO', 'VAZQUEZ', 'CHAN', 'SI52'),
(14391011, 'ELIEZER', 'TORRES', 'MAZARIEGOS', 'SI52'),
(14391014, 'TEYLA JAZMIN', 'ALOR', 'JIMENEZ', 'SI52'),
(14391018, 'ROBERTO', 'RUVALCABA', 'ROMERO', 'SI52'),
(14391023, 'SEBASTIÁN', 'HUANTE', 'PAREDES', 'SI52'),
(14391025, 'FELIZ ABRAHAM', 'CATZIN', 'HUH', 'SI52'),
(14391032, 'RUBÉN WOSBELY', 'HERNÁNDEZ', 'LOPEZ', 'SI52'),
(14391037, 'SERGIO', 'MEZA', 'MARTÍNEZ', 'SI52'),
(14391046, 'GUSTAVO', 'VALDERRAMA', 'PALOMARES', 'SI52'),
(14391050, 'ANGEL', 'PEREZ', 'ANOTA', 'SI52'),
(14391065, 'ROBERTO', 'GONZALES', 'DELGADO', 'SI52'),
(14391071, 'FRANCISCO JAVIER', 'YTZINCAB', 'KANTUN', 'SI52'),
(14391078, 'DAVID', 'VILLAFRANCA', 'RODRIGUEZ', 'SI52'),
(14391087, 'DAVID RAFAEL', 'SANCHEZ', 'CIME', 'SI52'),
(14391090, 'JOSE ANGEL', 'PEREZ', 'JUAN', 'SI52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE IF NOT EXISTS `asistencia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alumno` int(8) NOT NULL,
  `materia` int(4) NOT NULL,
  `fecha` date NOT NULL,
  `asistencia` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `materia` (`materia`),
  KEY `alumno` (`alumno`),
  KEY `materia_2` (`materia`),
  KEY `alumno_2` (`alumno`),
  KEY `fecha` (`fecha`)
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
  `alumno` int(8) NOT NULL,
  `materia` int(11) NOT NULL,
  `unidad` int(11) NOT NULL,
  `saber` double NOT NULL,
  `hacer` double NOT NULL,
  `ser` double NOT NULL,
  `final` double NOT NULL,
  `accionMejora` bit(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `alumno` (`alumno`,`materia`,`unidad`),
  KEY `materia` (`materia`),
  KEY `unidad` (`unidad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE IF NOT EXISTS `carreras` (
  `codigo` int(8) NOT NULL AUTO_INCREMENT,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`codigo`, `descripcion`) VALUES
(5, 'Ingeniería en Tecnologías de la Información y Comunicación Área Sistemas Informáticos'),
(6, 'Ingeniería en Tecnologías de la Información y Comunicación  Área Redes y Telecomunicaciones');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configcalificaciones`
--

CREATE TABLE IF NOT EXISTS `configcalificaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `saber` double NOT NULL,
  `saberHacer` double NOT NULL,
  `ser` double NOT NULL,
  `asignatura` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `unidad` (`asignatura`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diasmaterias`
--

CREATE TABLE IF NOT EXISTS `diasmaterias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `materia` int(11) NOT NULL,
  `dia` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `materia` (`materia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupomateria`
--

CREATE TABLE IF NOT EXISTS `grupomateria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idgrupo` varchar(4) NOT NULL,
  `idmateria` int(4) NOT NULL,
  `idprofesor` int(8) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idgrupo` (`idgrupo`),
  KEY `idmateria` (`idmateria`),
  KEY `idprofesor` (`idprofesor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Disparadores `grupomateria`
--
DROP TRIGGER IF EXISTS `configCalif`;
DELIMITER //
CREATE TRIGGER `configCalif` AFTER INSERT ON `grupomateria`
 FOR EACH ROW BEGIN
INSERT INTO configcalificaciones VALUES (null, 40, 60, 10, NEW.id);
END
//
DELIMITER ;

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
('SI52', 'H126', 'matutino', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE IF NOT EXISTS `materias` (
  `clave` int(4) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(30) NOT NULL,
  `grado` int(11) NOT NULL,
  `carrera` int(8) NOT NULL,
  PRIMARY KEY (`clave`),
  KEY `carrera` (`carrera`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE IF NOT EXISTS `profesores` (
  `matricula` int(8) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(50) NOT NULL,
  `paterno` varchar(50) NOT NULL,
  `materno` varchar(50) NOT NULL,
  `tipo` varchar(3) NOT NULL,
  PRIMARY KEY (`matricula`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=87654322 ;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`matricula`, `nombres`, `paterno`, `materno`, `tipo`) VALUES
(12345678, 'Rafael', 'Villegas', 'Velasco', 'PA'),
(48571524, 'Liliana', 'Avila', 'Galicia', 'PTC'),
(84712348, 'Mayra', 'Fuentes', 'Sosa', 'PTC'),
(87654321, 'Sandra', 'Hernandez', 'Chacón', 'PTC');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidades`
--

CREATE TABLE IF NOT EXISTS `unidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` int(2) NOT NULL,
  `fechainicio` date NOT NULL,
  `fechafin` date NOT NULL,
  `materia` int(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `materia` (`materia`),
  KEY `materia_2` (`materia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `username` int(8) NOT NULL,
  `contraseña` varchar(20) NOT NULL,
  `tipo` int(1) NOT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`username`, `contraseña`, `tipo`) VALUES
(1, 'admin01', 1),
(12345678, 'profesor1', 2);

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
  ADD CONSTRAINT `asistencia-alumno` FOREIGN KEY (`alumno`) REFERENCES `alumnos` (`matricula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `asistencia-materias` FOREIGN KEY (`materia`) REFERENCES `materias` (`clave`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD CONSTRAINT `calificaciones-alumnos` FOREIGN KEY (`alumno`) REFERENCES `alumnos` (`matricula`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `calificaciones-materia` FOREIGN KEY (`materia`) REFERENCES `materias` (`clave`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `calificaciones-unidad` FOREIGN KEY (`unidad`) REFERENCES `unidades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `configcalificaciones`
--
ALTER TABLE `configcalificaciones`
  ADD CONSTRAINT `configCalificacionesAsignatura` FOREIGN KEY (`asignatura`) REFERENCES `grupomateria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `diasmaterias`
--
ALTER TABLE `diasmaterias`
  ADD CONSTRAINT `dias-materia` FOREIGN KEY (`materia`) REFERENCES `grupomateria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `grupomateria`
--
ALTER TABLE `grupomateria`
  ADD CONSTRAINT `grupo-materia` FOREIGN KEY (`idgrupo`) REFERENCES `grupos` (`grupo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `grupomateria-materia` FOREIGN KEY (`idmateria`) REFERENCES `materias` (`clave`) ON DELETE CASCADE ON UPDATE CASCADE,
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
  ADD CONSTRAINT `unidades-materias` FOREIGN KEY (`materia`) REFERENCES `materias` (`clave`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
