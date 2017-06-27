-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-06-2017 a las 21:40:46
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
-- Estructura de tabla para la tabla `addcart`
--

CREATE TABLE `addcart` (
  `addcart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `banner_id` int(11) NOT NULL,
  `addcart_cant` int(11) NOT NULL,
  `addcart_valor` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `addcart`
--

INSERT INTO `addcart` (`addcart_id`, `user_id`, `banner_id`, `addcart_cant`, `addcart_valor`) VALUES
(4, 23, 32, 3, 1050000),
(5, 23, 34, 2, 500000),
(6, 28, 32, 2, 700000),
(7, 23, 34, 4, 1000000),
(8, 23, 32, 3, 1050000);

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
(32, 'maquinaria pesada', 'contamos con una amplia variedad de maquinaria para hacer su labor mas agradable ', 350000, 'activo', 'ambos', '1470064058_451.jpg'),
(34, 'DiseÃ±o Estructural', 'contamos con una amplia variedad de ingenieros especializados en diseÃ±o arquitectonico para hacer de sus ideas algo fanntastico', 250000, 'activo', 'ambos', 'Civil.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `message`
--

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `message_nombre` varchar(100) NOT NULL,
  `message_correo` varchar(70) NOT NULL,
  `message_asunto` varchar(50) NOT NULL,
  `message_descripcion` varchar(500) NOT NULL,
  `message_date` date NOT NULL,
  `message_status` set('noleido','leido') NOT NULL DEFAULT 'noleido',
  `message_ip` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `message`
--

INSERT INTO `message` (`message_id`, `message_nombre`, `message_correo`, `message_asunto`, `message_descripcion`, `message_date`, `message_status`, `message_ip`) VALUES
(2, 'daniel merchan', 'merchusmix@hotmail.com', 'prueba', 'este es  un envio de prueba de correo interno buscando dejar ya listo todo esto ', '2017-06-27', 'leido', '::1');

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
(22, 'diana marcela', 'rojas', '1094876223-3', 'djrojas@hotmail.com', 'drojas', '3025568976', '827ccb0eea8a706c4c34a16891f84e7b', 'empresa', '2017-05-17', 1, 'ROLE_USER', '191.102.114.44'),
(23, 'hugo mario', 'rojas cardona', '3998467', 'rojasq@hotmail.com', 'arojas', '3195043590', '181943ca842e0c54e6a8d1535810a761', 'cliente', '2017-06-23', 1, 'ROLE_USER', '190.144.67.46'),
(28, 'andrea', 'merchan', '9773713-2', 'andrea@hotmail.com', 'andrea', '3225729433', '827ccb0eea8a706c4c34a16891f84e7b', 'empresa', '2017-06-26', 1, 'ROLE_USER', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `addcart`
--
ALTER TABLE `addcart`
  ADD PRIMARY KEY (`addcart_id`,`user_id`,`banner_id`);

--
-- Indices de la tabla `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indices de la tabla `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`);

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
-- AUTO_INCREMENT de la tabla `addcart`
--
ALTER TABLE `addcart`
  MODIFY `addcart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `banner`
--
ALTER TABLE `banner`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT de la tabla `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `service`
--
ALTER TABLE `service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
