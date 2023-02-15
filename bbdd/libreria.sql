-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-12-2022 a las 21:13:22
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de datos: `libreria`
--
CREATE DATABASE IF NOT EXISTS `libreria` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `libreria`;

-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `libros`
--

DROP TABLE IF EXISTS `libros`;
CREATE TABLE `libros` (
  `id` int(11) NOT NULL,
  `titulo` VARCHAR(255) NOT NULL,
  `autor` VARCHAR(255) NOT NULL,
  `editorial` VARCHAR(255) NOT NULL,
  `isbn` bigint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id`, `titulo`, `autor`, `editorial`, `isbn`) VALUES
(1, 'Las Mentiras de Pinocho', 'Hood Carpenter', 'La Nariz Molesta', 6823100542023),
(2, 'La Busqueda', 'Web Maker', 'La Página Perfecta ', 4561237891 ),
(3, 'Detrás del Último No Hay Nadie', 'Patufet Little', 'Nadie Nos Mira', 0005304761953),
(4, 'La Fuerza', 'Obi-Va Kenové', 'La Compañia', 333888111);

-- --------------------------------------------------------
--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `titulo` (`titulo`,`autor`);

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
