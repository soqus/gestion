-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-05-2023 a las 03:53:20
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `podoclear`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horas`
--

CREATE TABLE `horas` (
  `ID` int(100) NOT NULL,
  `NOMBRE` varchar(20) NOT NULL,
  `APELLIDO` varchar(20) NOT NULL,
  `ENFERMEDAD` varchar(20) NOT NULL,
  `CELULAR` varchar(12) NOT NULL,
  `DIRECCION` varchar(60) NOT NULL,
  `FECHA` date NOT NULL,
  `MOTIVO` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `horas`
--

INSERT INTO `horas` (`ID`, `NOMBRE`, `APELLIDO`, `ENFERMEDAD`, `CELULAR`, `DIRECCION`, `FECHA`, `MOTIVO`) VALUES
(11, 'Daniel', 'Caro', 'ninguna', '988780611', 'viña del mar', '1996-10-14', 'Tengo uñas encarnadas en el pie y necesito cortarlas'),
(12, 'Jose', 'Torrres', 'Diabetes', '956845545', 'su casa', '2003-07-09', 'Al tener diabetes se me hace muy difícil atender los pies'),
(13, 'Maria', 'Cardenales', 'ninguna', '654589856', 'viña del mar, su casa', '2023-05-02', 'Tengo juanetes y necesito sacarlos por que me duelen mucho '),
(14, 'Daniel', 'Torres', 'diabetes', '987856455', 'viña de mar', '2023-05-09', 'Necesito cortarme las uñas\r\n'),
(15, 'javier', 'Faundes', 'nada', '985658565', 'viña de mar', '2023-05-12', 'NEcesito atencion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `RUT` varchar(10) NOT NULL,
  `NOMBRE` varchar(10) NOT NULL,
  `APELLIDO` varchar(15) NOT NULL,
  `EDAD` int(2) NOT NULL,
  `ENF_BASE` varchar(20) NOT NULL,
  `TELEFONO` int(9) NOT NULL,
  `DIRECCION` varchar(60) NOT NULL,
  `EMAIL` varchar(40) NOT NULL,
  `PRO_REAL` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`RUT`, `NOMBRE`, `APELLIDO`, `EDAD`, `ENF_BASE`, `TELEFONO`, `DIRECCION`, `EMAIL`, `PRO_REAL`) VALUES
('12521212-9', 'JAviii', 'Torres', 45, 'NO tiene', 985632545, 'aqui', 'asd@asd.cl', 'Le hice varias cosas'),
('15965304-9', 'JAviii', 'Torres', 45, 'NO tiene', 985632545, 'aqui', 'asd@asd.cl', 'Le hice varias cosas'),
('15965424-9', 'JAviii', 'Torres', 45, 'NO tiene', 985632545, 'aqui', 'asd@asd.cl', 'Le hice varias cosas'),
('15965444-9', 'JAviii', 'Torres', 45, 'NO tiene', 985632545, 'aqui', 'asd@asd.cl', 'Le hice varias cosas'),
('15965504-9', 'JAviii', 'Torres', 45, 'NO tiene', 985632545, 'aqui', 'asd@asd.cl', 'Le hice varias cosas'),
('15965524-9', 'JAviii', 'Torres', 45, 'NO tiene', 985632545, 'aqui', 'asd@asd.cl', 'Le hice varias cosas'),
('15965554-9', 'JAviii', 'Torres', 45, 'NO tiene', 985632545, 'aqui', 'asd@asd.cl', 'Le hice varias cosas'),
('15965764-9', 'JAviii', 'Torres', 45, 'NO tiene', 985632545, 'aqui', 'asd@asd.cl', 'Le hice varias cosas'),
('15965874-9', 'JAviii', 'Torres', 45, 'NO tiene', 985632545, 'aqui', 'asd@asd.cl', 'Le hice varias cosas'),
('15965964-9', 'JAviii', 'Torres', 45, 'NO tiene', 985632545, 'aqui', 'asd@asd.cl', 'Le hice varias cosas'),
('19514456-3', 'Javier', 'caro', 23, 'niuna mi rey', 988780611, 'mi casa', 'aaa@aaa.com', 'se le cortaron las uñas al paciente'),
('19514976-3', 'Daniel', 'caro', 29, 'niuna mi rey', 988780611, 'mi casa', 'aaa@aaa.com', 'se le cortaron las uñas al paciente'),
('19515896-3', 'Laura', 'caro', 26, 'niuna mi rey', 988780611, 'mi casa', 'aaa@aaa.com', 'se le cortaron las uñas al paciente'),
('19516346-3', 'Vivi', 'caro', 25, 'niuna mi rey', 988780611, 'mi casa', 'aaa@aaa.com', 'se le cortaron las uñas al paciente'),
('19516546-3', 'Mario', 'caro', 21, 'niuna mi rey', 988780611, 'mi casa', 'aaa@aaa.com', 'se le cortaron las uñas al paciente'),
('19516926-3', 'Felipe', 'caro', 20, 'niuna mi rey', 988780611, 'mi casa', 'aaa@aaa.com', 'se le cortaron las uñas al paciente'),
('19518956-3', 'Frenaciso', 'caro', 29, 'niuna mi rey', 988780611, 'mi casa', 'aaa@aaa.com', 'se le cortaron las uñas al paciente'),
('46593268-9', 'JAviii', 'Torres', 45, 'NO tiene', 985632545, 'aqui', 'asd@asd.cl', 'Le hice varias cosas'),
('63985214-9', 'JAviii', 'Torres', 45, 'NO tiene', 985632545, 'aqui', 'asd@asd.cl', 'Le hice varias cosas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID` int(11) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `PASS` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID`, `EMAIL`, `PASS`) VALUES
(11, 'admin@podoclear.com', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2'),
(14, 'admin@podoclear.cl', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `horas`
--
ALTER TABLE `horas`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`RUT`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `horas`
--
ALTER TABLE `horas`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
