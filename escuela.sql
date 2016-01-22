-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-01-2016 a las 01:06:12
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
  PRIMARY KEY (`matricula`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`matricula`, `nombres`, `paterno`, `materno`, `grupo`) VALUES
('14391023', 'LUIS RODRIGO SEBASTIÁN', 'HUANTE', 'PAREDES', 'SI52'),
('14391047', 'SERGIO ANDRÉS', 'MEZA', 'MARTINEZ', 'SI52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calendario`
--

CREATE TABLE IF NOT EXISTS `calendario` (
  `id` int(11) NOT NULL,
  `dia` varchar(20) NOT NULL,
  `dia-semana` varchar(20) NOT NULL,
  `mes` varchar(20) NOT NULL,
  PRIMARY KEY (`dia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `calendario`
--

INSERT INTO `calendario` (`id`, `dia`, `dia-semana`, `mes`) VALUES
(0, '1', 'viernes', 'enero'),
(0, '10', 'domingo', 'enero'),
(0, '11', 'lunes', 'enero'),
(0, '12', 'martes', 'enero'),
(0, '13', 'miércoles', 'enero'),
(0, '14', 'jueves', 'enero'),
(0, '15', 'viernes', 'enero'),
(0, '16', 'sábado', 'enero'),
(0, '17', 'domingo', 'enero'),
(0, '18', 'lunes', 'enero'),
(0, '19', 'martes', 'enero'),
(0, '2', 'sábado', 'enero'),
(0, '20', 'miércoles', 'enero'),
(0, '21', 'jueves', 'enero'),
(0, '22', 'viernes', 'enero'),
(0, '23', 'sábado', 'enero'),
(0, '24', 'domingo', 'enero'),
(0, '25', 'lunes', 'enero'),
(0, '26', 'martes', 'enero'),
(0, '27', 'miércoles', 'enero'),
(0, '28', 'jueves', 'enero'),
(0, '29', 'viernes', 'enero'),
(0, '3', 'domingo', 'enero'),
(0, '30', 'sábado', 'enero'),
(0, '4', 'lunes', 'enero'),
(0, '5', 'martes', 'enero'),
(0, '6', 'miércoles', 'enero'),
(0, '7', 'jueves', 'enero'),
(0, '8', 'viernes', 'enero'),
(0, '9', 'sábado', 'enero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo-materia`
--

CREATE TABLE IF NOT EXISTS `grupo-materia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idgrupo` varchar(4) NOT NULL,
  `idmateria` varchar(4) NOT NULL,
  `idprofesor` varchar(8) NOT NULL,
  `dia1` varchar(20) NOT NULL,
  `dia2` varchar(20) NOT NULL,
  `dia3` varchar(20) NOT NULL,
  `dia4` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idgrupo` (`idgrupo`),
  KEY `idmateria` (`idmateria`),
  KEY `idprofesor` (`idprofesor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `grupo-materia`
--

INSERT INTO `grupo-materia` (`id`, `idgrupo`, `idmateria`, `idprofesor`, `dia1`, `dia2`, `dia3`, `dia4`) VALUES
(1, 'SI52', '0001', '12345678', 'martes', 'miércoles', 'jueves', 'viernes'),
(2, 'SI52', '0002', '87654321', 'lunes', 'miércoles', 'jueves', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE IF NOT EXISTS `grupos` (
  `clave` varchar(4) NOT NULL,
  `salon` varchar(4) NOT NULL,
  `horario` varchar(10) NOT NULL,
  PRIMARY KEY (`clave`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`clave`, `salon`, `horario`) VALUES
('SI51', 'H125', 'matutino'),
('SI52', 'H126', 'matutino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE IF NOT EXISTS `materias` (
  `clave` varchar(4) NOT NULL,
  `descripcion` varchar(30) NOT NULL,
  PRIMARY KEY (`clave`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`clave`, `descripcion`) VALUES
('0001', 'Desarrollo de Aplicaciones III'),
('0002', 'Ingeniería de Software II');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE IF NOT EXISTS `profesores` (
  `matricula` varchar(8) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `paterno` varchar(50) NOT NULL,
  `materno` varchar(50) NOT NULL,
  PRIMARY KEY (`matricula`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`matricula`, `nombres`, `paterno`, `materno`) VALUES
('12345678', 'Rafael', 'Villegas', 'Velasco'),
('87654321', 'Sandra', 'Hernandez', 'Chacón');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `grupo-materia`
--
ALTER TABLE `grupo-materia`
  ADD CONSTRAINT `grupo-materias` FOREIGN KEY (`idgrupo`) REFERENCES `grupos` (`clave`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `materias-grupo` FOREIGN KEY (`idmateria`) REFERENCES `materias` (`clave`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `profesor-grupo` FOREIGN KEY (`idprofesor`) REFERENCES `profesores` (`matricula`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
