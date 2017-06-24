-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-06-2017 a las 21:50:15
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pruebau`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banner`
--

CREATE TABLE `banner` (
  `banner_id` int(11) NOT NULL,
  `banner_titulo` varchar(50) NOT NULL,
  `banner_descripcion` varchar(250) NOT NULL,
  `banner_precio` float NOT NULL,
  `banner_active` set('activo','pendiente','','') NOT NULL,
  `banner_status` set('anuncio','banner','ambos','pendiente') NOT NULL DEFAULT 'pendiente',
  `banner_img` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `banner`
--

INSERT INTO `banner` (`banner_id`, `banner_titulo`, `banner_descripcion`, `banner_precio`, `banner_active`, `banner_status`, `banner_img`) VALUES
(32, 'maquinaria pesada', 'lksdksdlkjfkljfdsklfjsd', 350000, 'activo', 'ambos', '1470064058_451.jpg'),
(34, 'DiseÃ±o Estructural', 'dfgdfgd', 250000, 'activo', 'anuncio', 'Civil.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `service`
--

CREATE TABLE `service` (
  `service_id` int(11) NOT NULL,
  `service_titulo` varchar(70) NOT NULL,
  `service_descripcion` varchar(150) NOT NULL,
  `service_icon` varchar(30) NOT NULL,
  `service_active` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `service`
--

INSERT INTO `service` (`service_id`, `service_titulo`, `service_descripcion`, `service_icon`, `service_active`) VALUES
(1, 'Cloud', 'brindamos servicio de almacenamiento en la nube con gran respaldo apra sus datos ', 'cloud', 1);

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
  `user_telefono` varchar(10) NOT NULL,
  `password` varchar(1200) NOT NULL,
  `user_entidad` set('empresa','cliente','pendiente','') NOT NULL DEFAULT 'pendiente',
  `user_createat` date NOT NULL,
  `user_active` tinyint(1) NOT NULL,
  `user_role` set('ROLE_USER','ROLE_ADMIN','ROLE_SUADMIN','') NOT NULL DEFAULT 'ROLE_USER',
  `user_ip` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`user_id`, `user_nombre`, `user_apellido`, `user_cedula`, `user_correo`, `user_usuario`, `user_telefono`, `password`, `user_entidad`, `user_createat`, `user_active`, `user_role`, `user_ip`) VALUES
(18, 'daniel', 'merchan', '9773713', 'merchusmix@gmail.com', 'merchusmix', '', '137f6448f32dfd7a2d50c3f2746e5384', 'cliente', '2017-06-14', 1, 'ROLE_SUADMIN', '190.144.67.46'),
(22, 'diana', 'rojas', '1094876223', 'djrojas@hotmail.com', 'drojas', '', '827ccb0eea8a706c4c34a16891f84e7b', 'cliente', '2017-06-17', 1, 'ROLE_USER', '191.102.114.44'),
(23, 'andres', 'rojas', '3998467', 'rojasq@hotmail.com', 'arojas', '', '827ccb0eea8a706c4c34a16891f84e7b', 'cliente', '2017-06-23', 1, 'ROLE_USER', '190.144.67.46'),
(24, 'lorena', 'rojas', '3998467-1', 'lorojas@hotmail.com', 'lore22', '', '827ccb0eea8a706c4c34a16891f84e7b', 'empresa', '2017-06-23', 1, 'ROLE_ADMIN', '190.144.67.46');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indices de la tabla `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`service_id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `banner`
--
ALTER TABLE `banner`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT de la tabla `service`
--
ALTER TABLE `service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
