-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 13-06-2017 a las 17:07:52
-- Versión del servidor: 5.7.18-0ubuntu0.16.04.1
-- Versión de PHP: 7.0.19-1+deb.sury.org~xenial+2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pruebataller`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_nombre` varchar(70) NOT NULL,
  `user_apellido` varchar(70) NOT NULL,
  `user_cedula` varchar(15) NOT NULL,
  `user_correo` varchar(100) NOT NULL,
  `user_usuario` varchar(30) NOT NULL,
  `password` varchar(1200) NOT NULL,
  `user_entidad` set('empresa','cliente','pendiente','') NOT NULL DEFAULT 'pendiente',
  `user_createat` date NOT NULL,
  `user_active` tinyint(1) NOT NULL,
  `user_role` set('ROLE_USER','ROLE_ADMIN','ROLE_SUADMIN','') NOT NULL DEFAULT 'ROLE_USER',
  `user_ip` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`user_id`, `user_nombre`, `user_apellido`, `user_cedula`, `user_correo`, `user_usuario`, `password`, `user_entidad`, `user_createat`, `user_active`, `user_role`, `user_ip`) VALUES
(16, 'daniel', 'merchan', '9773713', 'merchusmix@gmail.com', 'merchusmix', '7d392d08ce67396a6e536dbe693919b4', 'cliente', '2017-06-13', 1, 'ROLE_SUADMIN', '127.0.0.1'),
(17, 'diana', 'rojas', '1094902887', 'drojas@htmail.com', 'drojas', 'emily', 'cliente', '2017-06-13', 1, 'ROLE_SUADMIN', '127.0.0.1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
