-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-08-2024 a las 04:07:55
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ventasfm`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caja`
--

CREATE TABLE `caja` (
  `id` int(11) NOT NULL,
  `caja` varchar(50) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `caja`
--

INSERT INTO `caja` (`id`, `caja`, `estado`) VALUES
(1, 'General', 1),
(2, 'Vendedor', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `estado`) VALUES
(1, 'Tubos', 1),
(2, 'Spray', 1),
(3, 'Codo', 1),
(4, 'Tee', 1),
(5, 'Unión ', 1),
(6, 'Adaptador', 1),
(7, 'Clavos', 1),
(8, 'Soga', 1),
(9, 'Insecticidas ', 1),
(10, 'Esmalte', 1),
(11, 'Barniz ', 1),
(12, 'Latex', 1),
(13, 'Tapón', 1),
(14, 'Pegamento', 1),
(15, 'Adhesivo ', 1),
(16, 'Solventes ', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cierre_caja`
--

CREATE TABLE `cierre_caja` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `monto_inicial` decimal(10,2) DEFAULT NULL,
  `monto_final` decimal(10,2) NOT NULL DEFAULT 0.00,
  `fecha_apertura` date DEFAULT NULL,
  `fecha_cierre` date DEFAULT NULL,
  `total_ventas` int(11) NOT NULL DEFAULT 0,
  `monto_total` decimal(10,2) NOT NULL DEFAULT 0.00,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cierre_caja`
--

INSERT INTO `cierre_caja` (`id`, `id_usuario`, `monto_inicial`, `monto_final`, `fecha_apertura`, `fecha_cierre`, `total_ventas`, `monto_total`, `estado`) VALUES
(1, 1, '5.00', '138.00', '2024-08-19', '2024-08-20', 8, '148.00', 0),
(2, 1, '10.00', '138.00', '2024-08-20', '2024-08-20', 8, '148.00', 0),
(3, 1, '50.00', '0.00', '2024-08-20', NULL, 0, '0.00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `dni` varchar(8) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `direccion` text DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `dni`, `nombre`, `telefono`, `direccion`, `estado`) VALUES
(1, '44862210', 'Juan', '92341434', 'AV Marañon', 1),
(2, '75424151', 'Publico en general', '92341434', 'AV', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` int(11) NOT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `fecha` datetime DEFAULT current_timestamp(),
  `estado` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id`, `total`, `fecha`, `estado`) VALUES
(1, '21.60', '2024-08-18 11:59:00', 1),
(2, '100.00', '2024-08-19 09:13:14', 1),
(3, '9.00', '2024-08-19 09:13:37', 1),
(4, '80.00', '2024-08-19 10:00:16', 1),
(5, '1.80', '2024-08-20 09:19:51', 1),
(6, '3.60', '2024-08-20 10:44:42', 1),
(7, '21.60', '2024-08-20 14:41:54', 1),
(8, '209.00', '2024-08-20 17:57:14', 1),
(9, '2000.00', '2024-08-20 20:20:19', 1),
(10, '12.00', '2024-08-20 20:25:18', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle`
--

CREATE TABLE `detalle` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `sub_total` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_compras`
--

CREATE TABLE `detalle_compras` (
  `id` int(11) NOT NULL,
  `id_compra` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `sub_total` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalle_compras`
--

INSERT INTO `detalle_compras` (`id`, `id_compra`, `id_producto`, `cantidad`, `precio`, `sub_total`) VALUES
(1, 1, 1, 12, '1.80', '21.60'),
(2, 2, 2, 50, '2.00', '100.00'),
(3, 3, 1, 5, '1.80', '9.00'),
(4, 4, 3, 2, '40.00', '80.00'),
(5, 5, 1, 1, '1.80', '1.80'),
(6, 6, 1, 2, '1.80', '3.60'),
(7, 7, 1, 12, '1.80', '21.60'),
(8, 8, 1, 5, '1.80', '9.00'),
(9, 8, 3, 5, '40.00', '200.00'),
(10, 9, 3, 50, '40.00', '2000.00'),
(11, 10, 4, 12, '1.00', '12.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_permisos`
--

CREATE TABLE `detalle_permisos` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_permiso` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalle_permisos`
--

INSERT INTO `detalle_permisos` (`id`, `id_usuario`, `id_permiso`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 8),
(9, 1, 9),
(10, 1, 10),
(11, 1, 11),
(12, 1, 12),
(13, 1, 13),
(14, 1, 14),
(15, 1, 15),
(16, 1, 16),
(17, 1, 17),
(68, 2, 1),
(69, 2, 2),
(70, 2, 3),
(71, 2, 4),
(72, 2, 5),
(73, 2, 6),
(74, 2, 7),
(75, 2, 8),
(76, 2, 9),
(77, 2, 10),
(78, 2, 11),
(79, 2, 12),
(80, 2, 13),
(81, 2, 14),
(82, 2, 15),
(83, 2, 16),
(84, 2, 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_temp`
--

CREATE TABLE `detalle_temp` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `descuento` decimal(10,2) NOT NULL DEFAULT 0.00,
  `sub_total` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_ventas`
--

CREATE TABLE `detalle_ventas` (
  `id` int(11) NOT NULL,
  `id_venta` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `descuento` decimal(10,2) NOT NULL DEFAULT 0.00,
  `sub_total` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalle_ventas`
--

INSERT INTO `detalle_ventas` (`id`, `id_venta`, `id_producto`, `cantidad`, `precio`, `descuento`, `sub_total`) VALUES
(1, 1, 1, 2, '3.00', '0.00', '6.00'),
(2, 2, 1, 2, '3.00', '0.00', '6.00'),
(3, 3, 1, 3, '3.00', '0.00', '9.00'),
(4, 4, 2, 3, '3.50', '0.00', '10.50'),
(5, 5, 1, 1, '3.00', '0.00', '3.00'),
(6, 6, 1, 4, '3.00', '0.00', '12.00'),
(7, 7, 2, 4, '3.50', '0.00', '14.00'),
(8, 8, 1, 3, '3.00', '0.00', '9.00'),
(9, 9, 1, 2, '3.00', '0.00', '6.00'),
(10, 10, 2, 2, '3.50', '0.00', '7.00'),
(11, 11, 2, 5, '3.50', '0.00', '17.50'),
(12, 12, 1, 2, '3.00', '0.00', '6.00'),
(13, 13, 1, 1, '3.00', '0.00', '3.00'),
(14, 14, 1, 2, '3.00', '0.00', '6.00'),
(15, 15, 1, 1, '3.00', '0.00', '3.00'),
(16, 16, 3, 2, '45.00', '0.00', '90.00'),
(17, 17, 2, 4, '3.50', '0.00', '14.00'),
(18, 18, 1, 1, '3.00', '1.00', '2.00'),
(19, 19, 2, 4, '3.50', '0.00', '14.00'),
(20, 20, 1, 5, '3.00', '0.50', '14.50'),
(21, 21, 1, 1, '3.00', '0.00', '3.00'),
(22, 22, 1, 9, '3.00', '0.00', '27.00'),
(23, 22, 2, 1, '3.50', '0.00', '3.50'),
(24, 23, 1, 3, '3.00', '0.00', '9.00'),
(25, 24, 3, 5, '45.00', '25.00', '200.00'),
(26, 25, 4, 5, '2.50', '0.00', '12.50'),
(27, 26, 4, 5, '2.50', '0.00', '12.50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id` int(11) NOT NULL,
  `ruc` varchar(30) DEFAULT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `mensaje` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id`, `ruc`, `nombre`, `telefono`, `direccion`, `mensaje`) VALUES
(1, '1000033424', 'Ferreteria FM', '966089268', 'Los Olivos', 'Buenas vibras!!');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id` int(11) NOT NULL,
  `nombre_marca` varchar(100) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id`, `nombre_marca`, `estado`) VALUES
(1, 'Martell', 1),
(2, 'Nicoll', 1),
(3, 'Pavco', 1),
(4, 'Duracell', 1),
(5, 'Panasonic', 1),
(6, 'Megaman', 1),
(7, 'Sapolio', 1),
(8, 'Metusa', 1),
(9, 'C & A', 1),
(10, 'Oatey', 1),
(11, 'Tolbrin', 1),
(12, 'Jhomeron', 1),
(13, 'Cif', 1),
(14, 'Sonca', 1),
(15, 'Majestad', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medidas`
--

CREATE TABLE `medidas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `nombre_corto` varchar(5) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `medidas`
--

INSERT INTO `medidas` (`id`, `nombre`, `nombre_corto`, `estado`) VALUES
(1, 'Metros', 'm', 1),
(2, 'Centímetros', 'cm', 1),
(3, 'Caja', 'cja', 1),
(4, 'Pulgada', 'plg', 1),
(5, 'Kilo', 'kg', 1),
(6, 'Galones', 'gl', 1),
(7, 'Docena', 'dz', 1),
(8, 'Metro cuadrado', 'M2', 1),
(9, 'Metro', 'M', 1),
(10, 'Unidad', 'und', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id` int(11) NOT NULL,
  `permiso` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id`, `permiso`) VALUES
(1, 'Tablero'),
(2, 'Empresa'),
(3, 'Usuario'),
(4, 'Cajas'),
(5, 'Arqueo_Caja'),
(6, 'Clientes'),
(7, 'Categorias'),
(8, 'Medidas'),
(9, 'Marcas'),
(10, 'Productos'),
(11, 'Nueva_Compra'),
(12, 'Historial_Compra'),
(13, 'Nueva_Venta'),
(14, 'Historial_Venta'),
(15, 'Registrar_Clientes'),
(16, 'Eliminar_Clientes'),
(17, 'Asginar_Roles');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `codigo` varchar(20) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `precio_compra` decimal(10,2) DEFAULT NULL,
  `precio_venta` decimal(10,2) DEFAULT NULL,
  `cantidad` int(11) NOT NULL DEFAULT 0,
  `id_marca` int(11) DEFAULT NULL,
  `id_medida` int(11) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `codigo`, `descripcion`, `precio_compra`, `precio_venta`, `cantidad`, `id_marca`, `id_medida`, `id_categoria`, `foto`, `estado`) VALUES
(1, '001', 'Codo de 1/2 ', '1.80', '3.00', 5, 1, 10, 3, 'default.webp', 1),
(2, '002', 'Tee 1/2 ', '2.00', '3.50', 31, 1, 10, 4, '20240820185221.webp', 1),
(3, '003', 'tubo de 2 pulgadasxd', '2.00', '3.50', 50, 2, 10, 5, '20240820183346.webp', 1),
(4, 'COD07794', 'tapon macho de 1/2', '1.00', '2.50', 2, 2, 10, 13, '20240821032353.webp', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(20) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `clave` varchar(100) DEFAULT NULL,
  `id_caja` int(11) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `nombre`, `clave`, `id_caja`, `estado`) VALUES
(1, 'admin', 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 1, 1),
(2, 'Juan', 'Juan', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `fecha` date DEFAULT curdate(),
  `hora` time NOT NULL DEFAULT curtime(),
  `estado` int(11) NOT NULL DEFAULT 1,
  `apertura` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `id_usuario`, `id_cliente`, `total`, `fecha`, `hora`, `estado`, `apertura`) VALUES
(1, 1, 1, '6.00', '2024-08-14', '08:59:23', 1, 0),
(2, 1, 1, '6.00', '2024-08-17', '08:59:46', 1, 0),
(3, 1, 2, '9.00', '2024-08-18', '09:06:45', 0, 0),
(4, 1, 1, '10.50', '2024-08-16', '09:13:50', 1, 0),
(5, 1, 1, '3.00', '2024-08-14', '09:20:11', 1, 0),
(6, 1, 1, '12.00', '2024-08-19', '00:00:00', 1, 0),
(7, 1, 1, '14.00', '2024-08-15', '09:20:35', 0, 0),
(8, 1, 1, '9.00', '2024-08-15', '09:26:57', 1, 0),
(9, 1, 1, '6.00', '2024-08-14', '09:27:08', 1, 0),
(10, 1, 1, '7.00', '2024-08-15', '09:27:46', 1, 0),
(11, 1, 1, '17.50', '2024-08-13', '09:35:09', 1, 0),
(12, 1, 1, '6.00', '2024-08-20', '09:19:23', 1, 0),
(13, 1, 2, '3.00', '2024-08-20', '09:32:22', 1, 0),
(14, 1, 1, '6.00', '2024-08-20', '09:34:54', 1, 0),
(15, 1, 1, '3.00', '2024-08-20', '09:35:06', 1, 0),
(16, 1, 1, '90.00', '2024-08-20', '10:17:02', 1, 0),
(17, 1, 1, '14.00', '2024-08-20', '10:44:08', 1, 0),
(18, 1, 2, '2.00', '2024-08-20', '11:07:40', 1, 0),
(19, 1, 1, '14.00', '2024-08-20', '11:16:32', 1, 0),
(20, 1, 1, '14.50', '2024-08-20', '14:43:04', 0, 1),
(21, 1, 1, '3.00', '2024-08-20', '16:23:38', 1, 1),
(22, 1, 1, '30.50', '2024-08-20', '17:20:48', 1, 1),
(23, 1, 1, '9.00', '2024-08-20', '17:40:10', 1, 1),
(24, 1, 1, '200.00', '2024-08-20', '17:58:54', 1, 1),
(25, 1, 1, '12.50', '2024-08-20', '20:25:37', 1, 1),
(26, 1, 1, '12.50', '2024-08-20', '20:26:32', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `caja`
--
ALTER TABLE `caja`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cierre_caja`
--
ALTER TABLE `cierre_caja`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_compras`
--
ALTER TABLE `detalle_compras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_permisos`
--
ALTER TABLE `detalle_permisos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_temp`
--
ALTER TABLE `detalle_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_ventas`
--
ALTER TABLE `detalle_ventas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `medidas`
--
ALTER TABLE `medidas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `caja`
--
ALTER TABLE `caja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `cierre_caja`
--
ALTER TABLE `cierre_caja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `detalle`
--
ALTER TABLE `detalle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `detalle_compras`
--
ALTER TABLE `detalle_compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `detalle_permisos`
--
ALTER TABLE `detalle_permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT de la tabla `detalle_temp`
--
ALTER TABLE `detalle_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `detalle_ventas`
--
ALTER TABLE `detalle_ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `medidas`
--
ALTER TABLE `medidas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
