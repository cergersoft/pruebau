-- phpMyAdmin SQL Dump
-- version 4.4.13.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 20-02-2017 a las 10:23:27
-- Versión del servidor: 5.6.31-0ubuntu0.15.10.1
-- Versión de PHP: 5.6.11-1ubuntu3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `taller_uni`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_herramienta`
--

CREATE TABLE IF NOT EXISTS `estado_herramienta` (
  `cod_estaherra` int(100) NOT NULL,
  `estado_herramienta` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_arl`
--

CREATE TABLE IF NOT EXISTS `tabla_arl` (
  `cod_arl` int(100) NOT NULL,
  `nombre_arl` varchar(70) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1002 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tabla_arl`
--

INSERT INTO `tabla_arl` (`cod_arl`, `nombre_arl`) VALUES
(1001, 'ninguna');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_cargo`
--

CREATE TABLE IF NOT EXISTS `tabla_cargo` (
  `cod_cargo` int(100) NOT NULL,
  `nombre_cargo` varchar(70) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10016 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tabla_cargo`
--

INSERT INTO `tabla_cargo` (`cod_cargo`, `nombre_cargo`) VALUES
(1001, 'Gerente General'),
(1002, 'Jefe Administrativo'),
(1003, 'Jefe Taller'),
(1004, 'Supervisor Logistica'),
(1005, 'Contador'),
(1006, 'Revisor Fiscal'),
(1007, 'Oficial Obra'),
(1008, 'Oficial Taller'),
(1009, 'Auxiliar Externo'),
(10010, 'Auxiliar Administrativo'),
(10011, 'Secretaria'),
(10012, 'Mensajero'),
(10013, 'Conductor'),
(10014, 'Ayudante Obra'),
(10015, 'Ayudante Taller');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_cursos`
--

CREATE TABLE IF NOT EXISTS `tabla_cursos` (
  `cod_cursos` int(100) NOT NULL,
  `nombre_curso` varchar(80) NOT NULL,
  `entidad_curso` varchar(70) NOT NULL,
  `cod_personal` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_dotacion`
--

CREATE TABLE IF NOT EXISTS `tabla_dotacion` (
  `cod_dotacion` int(100) NOT NULL,
  `talla_camisa` varchar(5) NOT NULL,
  `talla_pantalon` varchar(5) NOT NULL,
  `talla_calzado` varchar(5) NOT NULL,
  `cod_personal` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tabla_dotacion`
--

INSERT INTO `tabla_dotacion` (`cod_dotacion`, `talla_camisa`, `talla_pantalon`, `talla_calzado`, `cod_personal`) VALUES
(2, 'M', '30', '40', '9887734');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_eps`
--

CREATE TABLE IF NOT EXISTS `tabla_eps` (
  `cod_eps` int(100) NOT NULL,
  `nombre_eps` varchar(100) NOT NULL,
  `regimen_eps` set('subsidiado','contributivo','','') NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=10013 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tabla_eps`
--

INSERT INTO `tabla_eps` (`cod_eps`, `nombre_eps`, `regimen_eps`) VALUES
(10002, 'asmetsalud', 'contributivo'),
(10001, 'asmetsalud', 'subsidiado'),
(10003, 'nueva eps', 'subsidiado'),
(10004, 'nueva eps', 'contributivo'),
(10005, 'cafesalud', 'subsidiado'),
(10006, 'cafesalud', 'contributivo'),
(10007, 'sura', 'subsidiado'),
(10008, 'sura', 'contributivo'),
(10009, 'sanitas', 'subsidiado'),
(10010, 'sanitas', 'contributivo'),
(10011, 'policia nacional', ''),
(10012, 'sanidad militar', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_estado`
--

CREATE TABLE IF NOT EXISTS `tabla_estado` (
  `cod_estado` int(100) NOT NULL,
  `ubicacion_estado` int(11) NOT NULL,
  `observaciones` varchar(250) NOT NULL,
  `cod_estaherra` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_factura`
--

CREATE TABLE IF NOT EXISTS `tabla_factura` (
  `cod_factura` int(11) NOT NULL,
  `concepto_factura` varchar(150) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `valor_unifactu` float NOT NULL,
  `valor_totalfactu` float NOT NULL,
  `iva_factura` int(11) NOT NULL,
  `cod_obra` varchar(15) NOT NULL,
  `cod_personal` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_herramientas`
--

CREATE TABLE IF NOT EXISTS `tabla_herramientas` (
  `cod_herramienta` varchar(25) NOT NULL,
  `nombre_herramienta` varchar(50) NOT NULL,
  `descripcion_herramienta` varchar(100) NOT NULL,
  `color_herramienta` varchar(20) NOT NULL,
  `marca_herramienta` varchar(20) NOT NULL,
  `cod_personal` varchar(10) NOT NULL,
  `cod_estado` int(100) NOT NULL,
  `cod_precios` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_nomina`
--

CREATE TABLE IF NOT EXISTS `tabla_nomina` (
  `cod_nomina` varchar(15) NOT NULL,
  `salario_bmlv` float NOT NULL,
  `valor_horadiaria` float NOT NULL,
  `valor_horaex` float NOT NULL,
  `valor_horades` float NOT NULL,
  `descuentos` float NOT NULL,
  `cant_hext` int(11) NOT NULL,
  `cant_hdes` int(11) NOT NULL,
  `valor_totalmeshext` float NOT NULL,
  `valor_totalmeshdes` float NOT NULL,
  `salario_bmestotal` float NOT NULL,
  `fecha_ingresopersonal` date NOT NULL,
  `fecha_retiropersonal` date NOT NULL,
  `cod_personal` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_obra`
--

CREATE TABLE IF NOT EXISTS `tabla_obra` (
  `cod_obra` varchar(15) NOT NULL,
  `nombre_obra` varchar(50) NOT NULL,
  `fecha_inicio_obra` date NOT NULL,
  `fecha_fin_obra` date NOT NULL,
  `direccion_obra` varchar(100) NOT NULL,
  `cod_personal` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_pensi_cesan`
--

CREATE TABLE IF NOT EXISTS `tabla_pensi_cesan` (
  `cod_pension` int(100) NOT NULL,
  `nombre_pension` varchar(150) NOT NULL,
  `entidad_pension` varchar(70) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10014 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tabla_pensi_cesan`
--

INSERT INTO `tabla_pensi_cesan` (`cod_pension`, `nombre_pension`, `entidad_pension`) VALUES
(1001, 'Proteccion S.A.', 'Suramericana de Seguros'),
(1002, 'Fondos de Pensiones y Cesantias Skandia', 'Askandia S.A'),
(1003, 'Cesantias de Colombia S.A.', 'Banco de Colombia'),
(1004, 'Sociedad Administradora de Fondos de Cesantia y Pensiones ', 'Colpatria'),
(1005, 'Compania Colombiana Administradora de Fondos de Pensiones y de Cesantias S.A.', 'Colfondos'),
(1006, 'Sociedad Administradora de Fondos de Cesantia y Pensiones Colmena', 'Colmena'),
(1007, 'Fondos de Pensiones y Cesantias Granahorrar', 'Granfondo S.A.'),
(1008, 'Fondos de Pensiones y Cesantias, Porvenir S.A.', 'Porvenir S.A.'),
(1009, 'Sociedad Administradora de Fondos de Cesantias, Invertir ', 'entidad cooperativa'),
(10010, 'Fondos de Pensiones y Cesantias de Santander S.A., Corfinansa', 'Corporacion Financiera de Santander'),
(10011, 'Fondo de Pensiones y Cesantia, Davivir S.A.', 'Seguros Bolivar'),
(10012, 'Fondos de Pensiones y Cesantias Diners S.A.', 'Fondo Diners Club de Colombia S.A'),
(10013, 'Fondos de Pensiones y Cesantias, Invermanana', 'Inversora S.A.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_personal`
--

CREATE TABLE IF NOT EXISTS `tabla_personal` (
  `cod_personal` varchar(10) NOT NULL,
  `nombre_personal` varchar(70) NOT NULL,
  `apellido_personal` varchar(70) NOT NULL,
  `fecha_nacimiento` varchar(10) NOT NULL,
  `celular_personal` varchar(10) NOT NULL,
  `direccion_personal` varchar(120) NOT NULL,
  `correo_personal` varchar(70) NOT NULL,
  `img_personal` varchar(250) NOT NULL,
  `cod_cargo` int(100) NOT NULL,
  `cod_Rh` int(100) NOT NULL,
  `cod_eps` int(100) NOT NULL,
  `cod_arl` int(100) NOT NULL,
  `cod_pension` int(100) NOT NULL,
  `cod_empresa` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tabla_personal`
--

INSERT INTO `tabla_personal` (`cod_personal`, `nombre_personal`, `apellido_personal`, `fecha_nacimiento`, `celular_personal`, `direccion_personal`, `correo_personal`, `img_personal`, `cod_cargo`, `cod_Rh`, `cod_eps`, `cod_arl`, `cod_pension`, `cod_empresa`) VALUES
('9887734', 'daniel', 'merchan', '18/09/1985', '3225729433', 'la fachada', 'merchussoft@gmail.com', '1.jpg', 10014, 1005, 10001, 1001, 1008, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_precios`
--

CREATE TABLE IF NOT EXISTS `tabla_precios` (
  `cod_precios` int(100) NOT NULL,
  `precio_unitario` float NOT NULL,
  `fecha_iniobra` date NOT NULL,
  `fecha_terobra` date NOT NULL,
  `cod_herramientas` varchar(25) NOT NULL,
  `cod_obra` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_Rh`
--

CREATE TABLE IF NOT EXISTS `tabla_Rh` (
  `cod_Rh` int(100) NOT NULL,
  `Rh` varchar(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1009 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tabla_Rh`
--

INSERT INTO `tabla_Rh` (`cod_Rh`, `Rh`) VALUES
(1001, '0+'),
(1002, '0-'),
(1003, 'A+'),
(1004, 'A-'),
(1005, 'AB+'),
(1006, 'AB-'),
(1007, 'B+'),
(1008, 'B-');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `estado_herramienta`
--
ALTER TABLE `estado_herramienta`
  ADD PRIMARY KEY (`cod_estaherra`);

--
-- Indices de la tabla `tabla_arl`
--
ALTER TABLE `tabla_arl`
  ADD PRIMARY KEY (`cod_arl`);

--
-- Indices de la tabla `tabla_cargo`
--
ALTER TABLE `tabla_cargo`
  ADD PRIMARY KEY (`cod_cargo`);

--
-- Indices de la tabla `tabla_cursos`
--
ALTER TABLE `tabla_cursos`
  ADD PRIMARY KEY (`cod_cursos`,`cod_personal`),
  ADD KEY `cod_personal` (`cod_personal`);

--
-- Indices de la tabla `tabla_dotacion`
--
ALTER TABLE `tabla_dotacion`
  ADD PRIMARY KEY (`cod_dotacion`,`cod_personal`),
  ADD KEY `cod_personal` (`cod_personal`);

--
-- Indices de la tabla `tabla_eps`
--
ALTER TABLE `tabla_eps`
  ADD PRIMARY KEY (`cod_eps`);

--
-- Indices de la tabla `tabla_estado`
--
ALTER TABLE `tabla_estado`
  ADD PRIMARY KEY (`cod_estado`,`cod_estaherra`),
  ADD KEY `cod_estaherra` (`cod_estaherra`);

--
-- Indices de la tabla `tabla_factura`
--
ALTER TABLE `tabla_factura`
  ADD PRIMARY KEY (`cod_factura`,`cod_obra`,`cod_personal`),
  ADD KEY `cod_obra` (`cod_obra`),
  ADD KEY `cod_personal` (`cod_personal`);

--
-- Indices de la tabla `tabla_herramientas`
--
ALTER TABLE `tabla_herramientas`
  ADD PRIMARY KEY (`cod_herramienta`,`cod_personal`,`cod_estado`,`cod_precios`),
  ADD KEY `cod_estado` (`cod_estado`),
  ADD KEY `cod_precios` (`cod_precios`),
  ADD KEY `cod_personal` (`cod_personal`);

--
-- Indices de la tabla `tabla_nomina`
--
ALTER TABLE `tabla_nomina`
  ADD PRIMARY KEY (`cod_nomina`,`cod_personal`),
  ADD KEY `cod_personal` (`cod_personal`);

--
-- Indices de la tabla `tabla_obra`
--
ALTER TABLE `tabla_obra`
  ADD PRIMARY KEY (`cod_obra`,`cod_personal`),
  ADD KEY `cod_personal` (`cod_personal`);

--
-- Indices de la tabla `tabla_pensi_cesan`
--
ALTER TABLE `tabla_pensi_cesan`
  ADD PRIMARY KEY (`cod_pension`);

--
-- Indices de la tabla `tabla_personal`
--
ALTER TABLE `tabla_personal`
  ADD PRIMARY KEY (`cod_personal`,`cod_cargo`,`cod_Rh`,`cod_eps`,`cod_arl`,`cod_pension`,`cod_empresa`),
  ADD KEY `cod_pension` (`cod_pension`),
  ADD KEY `cod_Rh` (`cod_Rh`),
  ADD KEY `cod_arl` (`cod_arl`),
  ADD KEY `cod_cargo` (`cod_cargo`);

--
-- Indices de la tabla `tabla_precios`
--
ALTER TABLE `tabla_precios`
  ADD PRIMARY KEY (`cod_precios`,`cod_herramientas`,`cod_obra`),
  ADD KEY `cod_obra` (`cod_obra`);

--
-- Indices de la tabla `tabla_Rh`
--
ALTER TABLE `tabla_Rh`
  ADD PRIMARY KEY (`cod_Rh`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `estado_herramienta`
--
ALTER TABLE `estado_herramienta`
  MODIFY `cod_estaherra` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tabla_arl`
--
ALTER TABLE `tabla_arl`
  MODIFY `cod_arl` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1002;
--
-- AUTO_INCREMENT de la tabla `tabla_cargo`
--
ALTER TABLE `tabla_cargo`
  MODIFY `cod_cargo` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10016;
--
-- AUTO_INCREMENT de la tabla `tabla_cursos`
--
ALTER TABLE `tabla_cursos`
  MODIFY `cod_cursos` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tabla_dotacion`
--
ALTER TABLE `tabla_dotacion`
  MODIFY `cod_dotacion` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tabla_eps`
--
ALTER TABLE `tabla_eps`
  MODIFY `cod_eps` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10013;
--
-- AUTO_INCREMENT de la tabla `tabla_estado`
--
ALTER TABLE `tabla_estado`
  MODIFY `cod_estado` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tabla_factura`
--
ALTER TABLE `tabla_factura`
  MODIFY `cod_factura` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tabla_pensi_cesan`
--
ALTER TABLE `tabla_pensi_cesan`
  MODIFY `cod_pension` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10014;
--
-- AUTO_INCREMENT de la tabla `tabla_precios`
--
ALTER TABLE `tabla_precios`
  MODIFY `cod_precios` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tabla_Rh`
--
ALTER TABLE `tabla_Rh`
  MODIFY `cod_Rh` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1009;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tabla_cursos`
--
ALTER TABLE `tabla_cursos`
  ADD CONSTRAINT `tabla_cursos_ibfk_1` FOREIGN KEY (`cod_personal`) REFERENCES `tabla_personal` (`cod_personal`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tabla_dotacion`
--
ALTER TABLE `tabla_dotacion`
  ADD CONSTRAINT `tabla_dotacion_ibfk_1` FOREIGN KEY (`cod_personal`) REFERENCES `tabla_personal` (`cod_personal`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tabla_estado`
--
ALTER TABLE `tabla_estado`
  ADD CONSTRAINT `tabla_estado_ibfk_1` FOREIGN KEY (`cod_estaherra`) REFERENCES `estado_herramienta` (`cod_estaherra`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tabla_factura`
--
ALTER TABLE `tabla_factura`
  ADD CONSTRAINT `tabla_factura_ibfk_1` FOREIGN KEY (`cod_obra`) REFERENCES `tabla_obra` (`cod_obra`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tabla_factura_ibfk_2` FOREIGN KEY (`cod_personal`) REFERENCES `tabla_personal` (`cod_personal`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tabla_herramientas`
--
ALTER TABLE `tabla_herramientas`
  ADD CONSTRAINT `tabla_herramientas_ibfk_1` FOREIGN KEY (`cod_estado`) REFERENCES `tabla_estado` (`cod_estado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tabla_herramientas_ibfk_2` FOREIGN KEY (`cod_precios`) REFERENCES `tabla_precios` (`cod_precios`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tabla_herramientas_ibfk_3` FOREIGN KEY (`cod_personal`) REFERENCES `tabla_personal` (`cod_personal`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tabla_nomina`
--
ALTER TABLE `tabla_nomina`
  ADD CONSTRAINT `tabla_nomina_ibfk_1` FOREIGN KEY (`cod_personal`) REFERENCES `tabla_personal` (`cod_personal`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tabla_obra`
--
ALTER TABLE `tabla_obra`
  ADD CONSTRAINT `tabla_obra_ibfk_1` FOREIGN KEY (`cod_personal`) REFERENCES `tabla_personal` (`cod_personal`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tabla_personal`
--
ALTER TABLE `tabla_personal`
  ADD CONSTRAINT `tabla_personal_ibfk_1` FOREIGN KEY (`cod_pension`) REFERENCES `tabla_pensi_cesan` (`cod_pension`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tabla_personal_ibfk_2` FOREIGN KEY (`cod_Rh`) REFERENCES `tabla_Rh` (`cod_Rh`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tabla_personal_ibfk_3` FOREIGN KEY (`cod_arl`) REFERENCES `tabla_arl` (`cod_arl`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tabla_personal_ibfk_4` FOREIGN KEY (`cod_cargo`) REFERENCES `tabla_cargo` (`cod_cargo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tabla_precios`
--
ALTER TABLE `tabla_precios`
  ADD CONSTRAINT `tabla_precios_ibfk_1` FOREIGN KEY (`cod_obra`) REFERENCES `tabla_obra` (`cod_obra`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
