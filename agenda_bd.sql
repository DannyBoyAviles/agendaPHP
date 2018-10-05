-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 05-10-2018 a las 04:27:58
-- Versión del servidor: 10.1.34-MariaDB
-- Versión de PHP: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `agenda_bd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date DEFAULT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_fin` time DEFAULT NULL,
  `dia_completo` tinyint(1) NOT NULL,
  `fk_usuarios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `titulo`, `fecha_inicio`, `fecha_fin`, `hora_inicio`, `hora_fin`, `dia_completo`, `fk_usuarios`) VALUES
(1, 'Examen', '2018-08-06', '2018-08-06', '12:00:00', '13:00:00', 0, 8),
(5, 'Dentista', '2018-08-31', '2018-08-31', '05:30:00', '06:30:00', 0, 9),
(9, 'Dali', '2018-08-22', '2018-08-22', '12:00:00', '22:00:00', 0, 8),
(15, 'Prueba', '2018-08-23', '0000-00-00', '00:00:00', '00:00:00', 1, 7),
(16, 'cumpleaÃ±os', '2018-08-14', '0000-00-00', '00:00:00', '00:00:00', 1, 8),
(17, 'Actualizacion exitosa', '2018-09-11', '0000-00-00', '00:00:00', '00:00:00', 1, 8),
(21, 'Examen Psicologico', '2018-08-22', '2018-08-22', '12:00:00', '13:00:00', 0, 9),
(22, 'Junta Escolar', '2018-08-24', '0000-00-00', '00:00:00', '00:00:00', 1, 9),
(23, 'Prueba Manejo', '2018-08-27', '0000-00-00', '00:00:00', '00:00:00', 1, 9),
(24, 'Gimnasio', '2018-08-13', '2018-08-17', '06:00:00', '08:00:00', 0, 9),
(25, 'ensayo', '2018-08-10', '2018-08-10', '15:00:00', '17:00:00', 0, 9),
(26, 'Ensayo', '2018-10-04', '0000-00-00', '00:00:00', '00:00:00', 1, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `password`, `email`, `fecha_nacimiento`) VALUES
(7, 'Edgar Isidro Bolanos Rodrigues', '$2y$10$aZxCsJpegd1hbrIe02w2lO2qEF74nYdzkiu6AxRk2kj5XGPG2LITe', 'edgar@email.com', '2018-08-24'),
(8, 'Julio Cesar Aviles Cruz', '$2y$10$5JTEJ22xCZSTyA.PlXUOKufPeCo8D/FjqJExazG1ryaxygjhBOR4y', 'julio@email.com', '1988-02-29'),
(9, 'Perla Joselin Aviles Cruz', '$2y$10$gvQZW8XceEwYEEhiWqjnBujNA9cyjK1l.MeWqxTyNLleBo3v5mUJa', 'perla@email.com', '1992-05-30');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usuarios` (`fk_usuarios`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`fk_usuarios`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
