-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-05-2018 a las 08:40:07
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_final`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `ID_SERVICIO` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `TITULO` varchar(20) NOT NULL,
  `TIPO_DE_SERVICIO` varchar(40) NOT NULL,
  `DIRECCION` varchar(30) NOT NULL,
  `NUMERO` varchar(15) NOT NULL,
  `DESCRIPCION` varchar(240) NOT NULL,
  `FOTO` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`ID_SERVICIO`, `ID`, `TITULO`, `TIPO_DE_SERVICIO`, `DIRECCION`, `NUMERO`, `DESCRIPCION`, `FOTO`) VALUES
(1, 9, 'wfrtg', 'lavanderia', 'dsfghfsgh', 'fghfgh', 'dfhgjkulukytjhgfdhfyuk', 'servidores.jpg'),
(2, 10, 'NO LO SE', 'lavanderia', 'calle 40', '9999223344', 'quiero vender', 'servidores.jpg'),
(3, 10, 'NO dssa', 'lavanderia', 'calle 30', '9999223344', 'quiero vender', 'servidores.jpg'),
(4, 13, 'NO LO SE', 'lavanderia', 'calle 90', '9999223355', 'quiero vender mucho', 'servidores.jpg'),
(5, 16, 'savage', 'lavanderia', 'calle 12 del amanecer', '9999548627', 'quiero ganar dinero', 'servidores.jpg'),
(6, 9, 'Cuidare A sus Hijos', 'niniera', 'calle 21', '9911005588', 'Ofresco Servicio de ni&ntilde;era para sus hijos y usted pueda tener la seguridad de hacer lo que necesita', 'cellphone.png'),
(7, 9, 'no se', 'lavanderia', 'ksoasm', 'jnjsnsj', 'gvbhnjmk,l,', 'iconGift.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_pass`
--

CREATE TABLE `usuarios_pass` (
  `ID` int(11) NOT NULL,
  `USUARIO` varchar(20) NOT NULL,
  `PASSWORD` varchar(20) NOT NULL,
  `NOMBRE` varchar(20) NOT NULL,
  `APELLIDO` varchar(20) NOT NULL,
  `EMAIL` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios_pass`
--

INSERT INTO `usuarios_pass` (`ID`, `USUARIO`, `PASSWORD`, `NOMBRE`, `APELLIDO`, `EMAIL`) VALUES
(9, 'Israel', '12345', 'israel', 'Pool', 'isan_09725@gmail.com'),
(10, 'humberto', 'vivi', 'Humberto', 'Ruz', 'huruz@gmail.com'),
(11, 'Melissa', 'gatos', 'Melisa', 'Rejon', 'melissaRejon@gmail.com'),
(12, 'pedro', 'hola', 'pedro', 'pech', 'pedro@gmail.com'),
(13, 'serch', '09876', 'sergio', 'canul', 'serch@gmail.com'),
(14, 'armando', 'uncastillo', 'Armando', 'carvajal', 'armando@gmail.com'),
(15, 'chino', 'comidachina', 'chino', 'Gcanton', 'Gcanton@gmail.com'),
(16, 'kill', 'savage', 'Natalia', 'Asassin', 'Nati@gmail.com'),
(17, 'cobo', 'tobito', 'Jacob', 'Pool', 'jacob@gmail.com'),
(18, 'ange', 'jacobito', 'Angelina', 'Cabrera', 'cabrera@gmail.com'),
(19, 'hady', 'hermanita', 'Hadasa', 'Pool', 'hady@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`ID_SERVICIO`),
  ADD KEY `ID` (`ID`);

--
-- Indices de la tabla `usuarios_pass`
--
ALTER TABLE `usuarios_pass`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `ID_SERVICIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuarios_pass`
--
ALTER TABLE `usuarios_pass`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD CONSTRAINT `servicios_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `usuarios_pass` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
