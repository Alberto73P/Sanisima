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
  `userID` varchar(300) PRIMARY KEY,
  `password` varchar(300) DEFAULT NULL,
  `nombre` varchar(300) DEFAULT NULL,
  `apellido` varchar(300) DEFAULT NULL,
  `telefono` varchar(300) DEFAULT NULL,
  `colonia` varchar(100) DEFAULT NULL,
  `calle` varchar(300) DEFAULT NULL,
  `num_ext` varchar(300) DEFAULT NULL,
  `CP` int(10) DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  `fecha_reg` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE `metodos_pago` (
  `cuenta` varchar(300) PRIMARY KEY,
  `fecha_caducidad` date NOT NULL,
  `codigo_seguridad` varchar(300) NOT NULL,
  `usuario` varchar(300) NOT NULL,
  CONSTRAINT `fk_usuario_metodo_pago` 
    FOREIGN KEY (`usuario`) REFERENCES `usuarios`(`userID`) 
    ON DELETE CASCADE 
    ON UPDATE CASCADE 
);
--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`userID`, `password`, `nombre`, `apellido`, `telefono`, `colonia`, `calle`, `num_ext`, `CP`, `fecha_nac`, `fecha_reg`) VALUES
('usuario1@example.com', 'contrasena1', 'Juan', 'Pérez', '1234567890', 'Colonia A', 'Calle 1', '123', 12345, '2000-01-15', CURDATE()),
('usuario10@example.com', 'contrasena10', 'Sofía', 'Gómez', '2147483647', 'Colonia J', 'Calle 10', '777', 44444, '1993-04-18', CURDATE()),
('usuario2@example.com', 'contrasena2', 'María', 'López', '2147483647', 'Colonia B', 'Calle 2', '456', 54321, '1995-08-25', CURDATE()),
('usuario3@example.com', 'contrasena3', 'Carlos', 'González', '2147483647', 'Colonia C', 'Calle 3', '789', 67890, '1987-03-10', CURDATE()),
('usuario4@example.com', 'contrasena4', 'Ana', 'Rodríguez', '1112223333', 'Colonia D', 'Calle 4', '101', 11111, '1999-11-05', CURDATE()),
('usuario5@example.com', 'contrasena5', 'Luis', 'Martínez', '2147483647', 'Colonia E', 'Calle 5', '222', 54321, '1990-02-20', CURDATE()),
('usuario6@example.com', 'contrasena6', 'Laura', 'Sánchez', '2147483647', 'Colonia F', 'Calle 6', '333', 77777, '1985-07-30', CURDATE()),
('usuario7@example.com', 'contrasena7', 'Pedro', 'Díaz', '2147483647', 'Colonia G', 'Calle 7', '444', 88888, '2002-12-03', CURDATE()),
('usuario8@example.com', 'contrasena8', 'Marta', 'Fernández', '2147483647', 'Colonia H', 'Calle 8', '555', 99999, '1997-06-15', CURDATE()),
('usuario9@example.com', 'contrasena9', 'Ricardo', 'Lara', '2147483647', 'Colonia I', 'Calle 9', '666', 33333, '1980-09-12', CURDATE());
