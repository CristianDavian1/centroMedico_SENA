-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-07-2022 a las 18:45:38
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `centromedico`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `countSexo` ()   BEGIN
     SELECT COUNT(*) FROM paciente WHERE pacSexo != 'femenino';
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `inputPaciente` (IN `id` INT(11), IN `apellido` VARCHAR(30), IN `fechaNa` DATE, IN `identificacion` INT(11), IN `nombre` VARCHAR(30), IN `sexo` ENUM('Hombre','Mujer'))   BEGIN
     INSERT INTO paciente(idPaciente, pacApellidos, pacFechaNacimiento, pacIdentificacion, pacNombres, pacSexo) VALUES (id, apellido, fechaNa,    identificacion, nombre, sexo);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `lastUserRegister` ()   BEGIN
     SELECT * FROM usuario ORDER BY idUsuario DESC LIMIT 2;
END$$

--
-- Funciones
--
CREATE DEFINER=`root`@`localhost` FUNCTION `buscarDato` (`Letras` VARCHAR(50), `dato` VARCHAR(50)) RETURNS VARCHAR(50) CHARSET utf8mb4  BEGIN 
     DECLARE buscar VARCHAR (50);
     SET buscar = (SELECT Letras WHERE Letras LIKE dato);
     RETURN buscar;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `concatenarChar` (`dato1` VARCHAR(50), `dato2` VARCHAR(50)) RETURNS VARCHAR(50) CHARSET utf8mb4  BEGIN 
     DECLARE concatenar VARCHAR (50);
     SET concatenar = CONCAT(dato1,' ',dato2);
     RETURN concatenar;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `suma` (`suma1` INT(11), `suma2` INT(11)) RETURNS INT(11)  BEGIN
     DECLARE sumador INT (11);
     SET sumador = suma1 + suma2;
     RETURN sumador;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE `cita` (
  `idCita` int(11) NOT NULL,
  `citFecha` date DEFAULT NULL,
  `citHora` time DEFAULT NULL,
  `citPaciente` int(11) DEFAULT NULL,
  `citMedico` int(11) DEFAULT NULL,
  `citConsultorio` int(11) DEFAULT NULL,
  `citEstado` enum('asignado','atendido') DEFAULT NULL,
  `citObservaciones` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cita`
--

INSERT INTO `cita` (`idCita`, `citFecha`, `citHora`, `citPaciente`, `citMedico`, `citConsultorio`, `citEstado`, `citObservaciones`) VALUES
(1, '2022-06-02', '14:44:04', 1, 1, 1, 'asignado', 'el paciente presenta dolor de cabeza fuerte'),
(2, '2023-05-02', '12:24:17', 4, 2, 1, 'asignado', 'El paciente presenta sintomas de abstinencia severa, y un fuerte dolor de estomago.'),
(3, '2022-07-30', '13:22:17', 2, 1, 6, 'asignado', 'Es una cita de urgencia por cuestiones familiares '),
(4, '2022-06-02', '14:44:04', 5, 3, 7, 'atendido', 'Se pasa el paciente al area de cirugia plastica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultorio`
--

CREATE TABLE `consultorio` (
  `idConsultorio` int(11) NOT NULL,
  `conNombre` char(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `consultorio`
--

INSERT INTO `consultorio` (`idConsultorio`, `conNombre`) VALUES
(1, 'SUR SOACHA -101'),
(2, ' 34 SUR-102'),
(3, 'SUR 34-103'),
(4, 'CLL#56-104'),
(5, 'LAS VILLAS-105'),
(6, 'CENTRO #19-106'),
(7, 'NORTE #127-107');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico`
--

CREATE TABLE `medico` (
  `idMedico` int(11) NOT NULL,
  `medIdentificacion` char(15) DEFAULT NULL,
  `medNombres` varchar(50) DEFAULT NULL,
  `medApellidos` varchar(50) DEFAULT NULL,
  `medEspecialidad` varchar(50) DEFAULT NULL,
  `medTelefono` char(15) DEFAULT NULL,
  `medCorreo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `medico`
--

INSERT INTO `medico` (`idMedico`, `medIdentificacion`, `medNombres`, `medApellidos`, `medEspecialidad`, `medTelefono`, `medCorreo`) VALUES
(1, '809567821', 'CARLOS ALBERTO', 'CLAROS', 'Cirujano', '3143561617', 'claros145@gmail.com'),
(2, '1007157333', 'JUAN CARLOS', 'PINZON', 'CIRUJANO ESPECIALIZADO', '3118355050', 'juan_346@gmail.com'),
(3, '56889293', 'GUSTAVO ', 'PETRO URREGO', 'NEURO CIRUJANO', '3107994922', 'gustavo-12@hotmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `idPaciente` int(11) NOT NULL,
  `pacIdentificacion` char(15) DEFAULT NULL,
  `pacNombres` varchar(50) DEFAULT NULL,
  `pacApellidos` varchar(50) DEFAULT NULL,
  `pacFechaNacimiento` date DEFAULT NULL,
  `pacSexo` enum('femenino','masculino') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`idPaciente`, `pacIdentificacion`, `pacNombres`, `pacApellidos`, `pacFechaNacimiento`, `pacSexo`) VALUES
(1, '1073706006', 'CRISTIAN', 'SANCHEZ ROJAS', '2022-10-10', 'masculino'),
(2, '1073706900', 'CAMILO', 'SANCHEZ REYES', '2022-10-15', 'masculino'),
(3, '1078906900', 'CARLOS', 'SAENZ REYES', '2021-10-15', 'masculino'),
(4, '55207412', 'JUAN', 'CEBALLOS ROJAS', '1995-02-15', 'masculino'),
(5, '78567190', 'CARLOS ALBERTO', 'VALENZUELA', '2012-06-19', 'masculino'),
(6, '85790178', 'SAMUEL CAMILO', 'DUARTE', '2012-06-15', 'masculino'),
(7, '1033567398', 'JUAN CARLOS', 'ROMERO INTRIAGO', '2000-01-09', 'masculino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `nombre_rol` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `nombre_rol`) VALUES
(1, 'desarrollar procesos de inversion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `usuLogin` char(15) DEFAULT NULL,
  `usuPassword` varchar(60) DEFAULT NULL,
  `usuEstado` enum('activo','inactivo') DEFAULT NULL,
  `usuRol` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `usuLogin`, `usuPassword`, `usuEstado`, `usuRol`) VALUES
(1, 'Suhermano123', '789456123', 'activo', 'Cotizante de gran valor'),
(2, 'juancho18', 'juan12', 'activo', 'Usuario veneficiario '),
(3, 'camilo49', 'cami123', 'activo', 'Cotizante '),
(4, 'camilo065', 'camilo123', 'inactivo', 'Cotizante');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cita`
--
ALTER TABLE `cita`
  ADD PRIMARY KEY (`idCita`),
  ADD KEY `citPaciente` (`citPaciente`),
  ADD KEY `citMedico` (`citMedico`),
  ADD KEY `citConsultorio` (`citConsultorio`);

--
-- Indices de la tabla `consultorio`
--
ALTER TABLE `consultorio`
  ADD PRIMARY KEY (`idConsultorio`);

--
-- Indices de la tabla `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`idMedico`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`idPaciente`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cita`
--
ALTER TABLE `cita`
  MODIFY `idCita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `consultorio`
--
ALTER TABLE `consultorio`
  MODIFY `idConsultorio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `medico`
--
ALTER TABLE `medico`
  MODIFY `idMedico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `idPaciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cita`
--
ALTER TABLE `cita`
  ADD CONSTRAINT `cita_ibfk_1` FOREIGN KEY (`citPaciente`) REFERENCES `paciente` (`idPaciente`),
  ADD CONSTRAINT `cita_ibfk_2` FOREIGN KEY (`citMedico`) REFERENCES `medico` (`idMedico`),
  ADD CONSTRAINT `cita_ibfk_3` FOREIGN KEY (`citConsultorio`) REFERENCES `consultorio` (`idConsultorio`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
