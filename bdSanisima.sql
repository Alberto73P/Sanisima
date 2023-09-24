-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-09-2023 a las 09:32:00
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
-- Base de datos: `sanisima`
--
CREATE DATABASE IF NOT EXISTS `sanisima` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `sanisima`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `userID` varchar(55) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `telefono` int(15) DEFAULT NULL,
  `colonia` varchar(100) DEFAULT NULL,
  `calle` varchar(100) DEFAULT NULL,
  `num_ext` int(10) DEFAULT NULL,
  `CP` int(10) DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`userID`, `password`, `nombre`, `apellido`, `telefono`, `colonia`, `calle`, `num_ext`, `CP`, `fecha_nac`) VALUES
('usuario1@example.com', 'contrasena1', 'Juan', 'Pérez', 1234567890, 'Colonia A', 'Calle 1', 123, 12345, '2000-01-15'),
('usuario10@example.com', 'contrasena10', 'Sofía', 'Gómez', 2147483647, 'Colonia J', 'Calle 10', 777, 44444, '1993-04-18'),
('usuario2@example.com', 'contrasena2', 'María', 'López', 2147483647, 'Colonia B', 'Calle 2', 456, 54321, '1995-08-25'),
('usuario3@example.com', 'contrasena3', 'Carlos', 'González', 2147483647, 'Colonia C', 'Calle 3', 789, 67890, '1987-03-10'),
('usuario4@example.com', 'contrasena4', 'Ana', 'Rodríguez', 1112223333, 'Colonia D', 'Calle 4', 101, 11111, '1999-11-05'),
('usuario5@example.com', 'contrasena5', 'Luis', 'Martínez', 2147483647, 'Colonia E', 'Calle 5', 222, 54321, '1990-02-20'),
('usuario6@example.com', 'contrasena6', 'Laura', 'Sánchez', 2147483647, 'Colonia F', 'Calle 6', 333, 77777, '1985-07-30'),
('usuario7@example.com', 'contrasena7', 'Pedro', 'Díaz', 2147483647, 'Colonia G', 'Calle 7', 444, 88888, '2002-12-03'),
('usuario8@example.com', 'contrasena8', 'Marta', 'Fernández', 2147483647, 'Colonia H', 'Calle 8', 555, 99999, '1997-06-15'),
('usuario9@example.com', 'contrasena9', 'Ricardo', 'Lara', 2147483647, 'Colonia I', 'Calle 9', 666, 33333, '1980-09-12');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
