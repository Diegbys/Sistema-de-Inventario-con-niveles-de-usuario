-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-03-2020 a las 11:42:25
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `programacionphp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ajuste_det_inventario`
--

CREATE TABLE `ajuste_det_inventario` (
  `id` int(11) NOT NULL,
  `ajuste_enc_inventario_id` int(11) NOT NULL,
  `concepto_id` int(11) NOT NULL,
  `deposito_id` int(11) NOT NULL,
  `existencia` int(11) NOT NULL,
  `ajuste` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ajuste_det_precio`
--

CREATE TABLE `ajuste_det_precio` (
  `id` int(11) NOT NULL,
  `ajuste_enc_precio_id` int(11) NOT NULL,
  `concepto_id` int(11) NOT NULL,
  `precio` double(18,3) NOT NULL,
  `ultimo_costo` double(18,3) NOT NULL,
  `nuevo_costo` double(18,3) NOT NULL,
  `nuevo_precio` double(18,3) NOT NULL,
  `aumento` double(18,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ajuste_enc_inventario`
--

CREATE TABLE `ajuste_enc_inventario` (
  `id` int(11) NOT NULL,
  `fecha_At` date NOT NULL,
  `observacion` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ajuste_enc_inventario`
--

INSERT INTO `ajuste_enc_inventario` (`id`, `fecha_At`, `observacion`) VALUES
(4, '2020-03-29', 'a'),
(5, '2020-03-29', 'a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ajuste_enc_precio`
--

CREATE TABLE `ajuste_enc_precio` (
  `id` int(11) NOT NULL,
  `fecha_At` date NOT NULL,
  `observacion` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ajuste_enc_precio`
--

INSERT INTO `ajuste_enc_precio` (`id`, `fecha_At`, `observacion`) VALUES
(1, '2020-03-29', 'a'),
(2, '2020-03-29', 'a'),
(3, '2020-03-29', 'a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE `cargos` (
  `id` int(11) NOT NULL,
  `fecha_At` date NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `concepto_id` int(11) NOT NULL,
  `deposito_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conceptos`
--

CREATE TABLE `conceptos` (
  `id` int(11) NOT NULL,
  `sku` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `codigo` int(15) NOT NULL,
  `referencia` text COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `precio` double(18,3) NOT NULL,
  `costo` double(18,3) NOT NULL,
  `ultimo_Costo` double(18,3) NOT NULL,
  `utilidad` double(18,3) NOT NULL,
  `grupo_id` int(11) NOT NULL,
  `subgrupo_id` int(11) NOT NULL,
  `marca_id` int(11) NOT NULL,
  `unidad_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `conceptos`
--

INSERT INTO `conceptos` (`id`, `sku`, `nombre`, `codigo`, `referencia`, `descripcion`, `precio`, `costo`, `ultimo_Costo`, `utilidad`, `grupo_id`, `subgrupo_id`, `marca_id`, `unidad_id`) VALUES
(1, 'arela /arela Faber Castell Connector 125029 E/24 u', 'Acuarela ', 12348759, 'Acuarela Faber Castell Connector 125029 E/24 uds.+ Pincel.', 'Innovador diseño a bases de pastillas combinables. Ideal para trabajar cromatismo y la mezcla de colores. Colores brillantes, fáciles de mezclar. Gran efecto cubriente. 00% made in Germany. Tapa transparente que se puede lavar en el lavavajillas. Incluye Color Blanco y Pincel Clic & Go. En Estuche de 12 o 24 uds.\r\n', 18.256, 14.043, 14.043, 4.213, 1, 1, 1, 1),
(2, 'a Carbón /a Carbón Faber Pitt 2899-H No Grasa Dura', 'Tiza Carbón ', 8463047, 'Tiza Carbón Faber Pitt 2899-H No Grasa Dura 129913. Tiza carbón PITT para artistas. No grasa.', 'Negro intenso con un trazo súper suave. Graduación: dura Distintas presentaciones. Las barras de carbón natural son el más antiguo material del mundo para dibujar y realizar bocetos. La sombra gris-azulada se desliza suavemente por el papel, se emborrona y difumina con facilidad, se borra sin dificultad y admite superposiciones. Su tono azulado siempre ha causado admiración, incluso entre los maestros de la vieja escuela. Los lápices carbón permiten trazar líneas mucho más negras. El carbón mezclado con hollín y arcilla otorga a los lápices carbón su color negro intenso pudiendo fabricarse en distintas graduaciones.', 1.462, 1.125, 1.125, 0.338, 1, 2, 1, 1),
(3, 'avoces negros/itech Z130 Speaker 5 Vatios RMS 980-', 'Altavoces negros', 8374659, 'Logitech Z130 Speaker 5 Vatios RMS 980-000418', 'Los altavoces Logitech Z130 ofrecen sonido estéreo pleno en un tamaño reducido. Con configuración y control sencillos, estos altavoces facilitan el disfrute de música, películas y juegos. Altavoces multimedios para PC. Dimensiones (Ancho x Profundidad x Altura) 10.1cm x 11cm x 14.2cmPeso 0.59 kg. Potencia nominal de salida: 5 vatios.Amplificador de sonido Integrado.2 años de garantía.', 32.799, 25.230, 25.230, 7.569, 2, 3, 2, 1),
(4, 'badora Digital/badora Digital Sony ICD-BX140 4GB. ', 'Grabadora Digital', 9867856, 'Grabadora Digital Sony ICD-BX140 4GB. Tamaño y peso:DIMENSIONES (AN. X AL. X PR.), 38,5 x 115,2 x 21,3 mm, PESO 72 gr.', 'Características generales MEMORIA INCORPORADA 4 GB. MICRÓFONO INCORPORADO. Monoaural. FORMATO DE GRABACIÓN HVXC/mp3 FORMATO DE REPRODUCCIÓN HVXC/mp3. NÚMERO MÁXIMO DE ARCHIVOS 495. NÚM. MÁX. ARCHIVOS EN UNA CARPETA. 99. TIPO DE BATERÍA (INCLUIDA). Pila seca (alcalina, tamaño AAA). Grabación FILTRO DE CORTE BAJO Sí. AÑADIR/SOBRESCRIBIR GRABACIÓN. Sí. GRABACIÓN ACTIVADA POR VOZ (VOR). Sí MONITOR DE GRABACIÓN Sí. TIEMPO MÁXIMO DE GRABACIÓN DE MP3 A 8 KBPS (MONOAURAL). 1.043 horas 0 min. TIEMPO MÁX. DE GRABACIÓN DE MP3 A 128 KBPS 65 horas 10 min. TIEMPO MÁX. DE GRABACIÓN DE MP3 A 192 KBPS. 43 horas 25 minutos.', 40.693, 31.302, 31.302, 9.391, 2, 4, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `depositos`
--

CREATE TABLE `depositos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `depositos`
--

INSERT INTO `depositos` (`id`, `nombre`) VALUES
(1, 'Porlamar'),
(2, 'Cuatro de mayo'),
(3, 'La Asuncion'),
(4, 'Villa Rosa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE `grupos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`id`, `nombre`) VALUES
(1, 'Material Escolar y Manualidades'),
(2, 'Entorno Informatico'),
(3, 'Alimentos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id`, `nombre`) VALUES
(1, 'Faber Castell'),
(2, 'Logitech'),
(3, 'SONY');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos_deposito`
--

CREATE TABLE `movimientos_deposito` (
  `id` int(11) NOT NULL,
  `concepto_id` int(11) NOT NULL,
  `deposito_id` int(11) NOT NULL,
  `existencia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `ajuste` text COLLATE utf8_unicode_ci NOT NULL,
  `producto_id` int(11) NOT NULL,
  `antes` int(11) NOT NULL,
  `ahora` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'Operador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'Operador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `status`
--

INSERT INTO `status` (`id`, `nombre`) VALUES
(1, 'Activo'),
(2, 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subgrupos`
--

CREATE TABLE `subgrupos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `grupo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `subgrupos`
--

INSERT INTO `subgrupos` (`id`, `nombre`, `grupo_id`) VALUES
(1, 'Acuarelas y pinceles', 1),
(2, 'Tizas', 1),
(3, 'Altavoces', 2),
(4, 'Grabadoras', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad`
--

CREATE TABLE `unidad` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `unidad`
--

INSERT INTO `unidad` (`id`, `nombre`) VALUES
(1, 'Unidad'),
(2, 'KG'),
(3, 'LT');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `contraseña` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `rol_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `contraseña`, `rol_id`, `status_id`) VALUES
(1, 'Wilson', '123456', 1, 1),
(2, 'Admin', 'admin', 1, 1),
(3, 'DiegbysMudarra', '123456', 1, 1),
(4, 'FreddyOrta', '123456', 2, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ajuste_det_inventario`
--
ALTER TABLE `ajuste_det_inventario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ajuste_enc_inventario_id` (`ajuste_enc_inventario_id`),
  ADD KEY `concepto_id` (`concepto_id`),
  ADD KEY `deposito_id` (`deposito_id`);

--
-- Indices de la tabla `ajuste_det_precio`
--
ALTER TABLE `ajuste_det_precio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ajuste_enc_precio_id` (`ajuste_enc_precio_id`),
  ADD KEY `concepto_id` (`concepto_id`);

--
-- Indices de la tabla `ajuste_enc_inventario`
--
ALTER TABLE `ajuste_enc_inventario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ajuste_enc_precio`
--
ALTER TABLE `ajuste_enc_precio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `concepto_id` (`concepto_id`),
  ADD KEY `deposito_id` (`deposito_id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `conceptos`
--
ALTER TABLE `conceptos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grupo_id` (`grupo_id`),
  ADD KEY `marca_id` (`marca_id`),
  ADD KEY `subgrupo_id` (`subgrupo_id`),
  ADD KEY `unidad_id` (`unidad_id`);

--
-- Indices de la tabla `depositos`
--
ALTER TABLE `depositos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `movimientos_deposito`
--
ALTER TABLE `movimientos_deposito`
  ADD PRIMARY KEY (`id`),
  ADD KEY `concepto_id` (`concepto_id`),
  ADD KEY `deposito_id` (`deposito_id`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `subgrupos`
--
ALTER TABLE `subgrupos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grupo_id` (`grupo_id`);

--
-- Indices de la tabla `unidad`
--
ALTER TABLE `unidad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rol_id` (`rol_id`),
  ADD KEY `status_id` (`status_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ajuste_det_inventario`
--
ALTER TABLE `ajuste_det_inventario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `ajuste_det_precio`
--
ALTER TABLE `ajuste_det_precio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ajuste_enc_inventario`
--
ALTER TABLE `ajuste_enc_inventario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `ajuste_enc_precio`
--
ALTER TABLE `ajuste_enc_precio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `conceptos`
--
ALTER TABLE `conceptos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `depositos`
--
ALTER TABLE `depositos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `grupos`
--
ALTER TABLE `grupos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `movimientos_deposito`
--
ALTER TABLE `movimientos_deposito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `subgrupos`
--
ALTER TABLE `subgrupos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `unidad`
--
ALTER TABLE `unidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ajuste_det_inventario`
--
ALTER TABLE `ajuste_det_inventario`
  ADD CONSTRAINT `ajuste_det_inventario_ibfk_1` FOREIGN KEY (`ajuste_enc_inventario_id`) REFERENCES `ajuste_enc_inventario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ajuste_det_inventario_ibfk_2` FOREIGN KEY (`concepto_id`) REFERENCES `conceptos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ajuste_det_inventario_ibfk_3` FOREIGN KEY (`deposito_id`) REFERENCES `depositos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ajuste_det_precio`
--
ALTER TABLE `ajuste_det_precio`
  ADD CONSTRAINT `ajuste_det_precio_ibfk_1` FOREIGN KEY (`ajuste_enc_precio_id`) REFERENCES `ajuste_enc_precio` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ajuste_det_precio_ibfk_2` FOREIGN KEY (`concepto_id`) REFERENCES `conceptos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD CONSTRAINT `cargos_ibfk_1` FOREIGN KEY (`concepto_id`) REFERENCES `conceptos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cargos_ibfk_2` FOREIGN KEY (`deposito_id`) REFERENCES `depositos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cargos_ibfk_3` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `conceptos`
--
ALTER TABLE `conceptos`
  ADD CONSTRAINT `conceptos_ibfk_1` FOREIGN KEY (`grupo_id`) REFERENCES `grupos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `conceptos_ibfk_2` FOREIGN KEY (`marca_id`) REFERENCES `marcas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `conceptos_ibfk_3` FOREIGN KEY (`subgrupo_id`) REFERENCES `subgrupos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `conceptos_ibfk_4` FOREIGN KEY (`unidad_id`) REFERENCES `unidad` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `movimientos_deposito`
--
ALTER TABLE `movimientos_deposito`
  ADD CONSTRAINT `movimientos_deposito_ibfk_1` FOREIGN KEY (`concepto_id`) REFERENCES `conceptos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `movimientos_deposito_ibfk_2` FOREIGN KEY (`deposito_id`) REFERENCES `depositos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `subgrupos`
--
ALTER TABLE `subgrupos`
  ADD CONSTRAINT `subgrupos_ibfk_1` FOREIGN KEY (`grupo_id`) REFERENCES `grupos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
