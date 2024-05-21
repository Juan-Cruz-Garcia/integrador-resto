-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-05-2024 a las 20:04:20
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `restaurant`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dishes`
--

CREATE TABLE `dishes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `precio` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `dishes`
--

INSERT INTO `dishes` (`id`, `nombre`, `descripcion`, `imagen`, `precio`) VALUES
(1, 'Empanadas', 'Empanadas rellenas de carne, cebolla y especias, típicas de Argentina.', 'empanadas.jpg', 1.50),
(2, 'Asado', 'Carne de res asada a la parrilla, un clásico de la cocina argentina.', 'asado.jpg', 15.00),
(3, 'Milanesa', 'Filete de carne empanado y frito, servido con limón.', 'milanesa.jpg', 8.00),
(4, 'Choripán', 'Chorizo a la parrilla servido en un pan, acompañado de chimichurri.', 'choripan.jpg', 3.50),
(5, 'Provoleta', 'Queso provolone a la parrilla, aderezado con orégano y aceite de oliva.', 'provoleta.jpg', 6.00),
(6, 'Locro', 'Guiso espeso de maíz, porotos, zapallo y carne, tradicional en fechas patrias.', 'locro.jpg', 7.50),
(7, 'Humita', 'Puré de maíz con queso, envuelto en chala de maíz y hervido.', 'humita.jpg', 4.50),
(8, 'Pizza Napolitana', 'Pizza con salsa de tomate, mozzarella, rodajas de tomate y ajo.', 'pizza_napolitana.jpg', 10.00),
(9, 'Alfajor', 'Dulce tradicional de dos galletas rellenas de dulce de leche y cubiertas de chocolate.', 'alfajor.jpg', 1.00),
(10, 'Flan con Dulce', 'Postre de flan casero servido con dulce de leche.', 'flan_con_dulce.jpg', 3.00);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `dishes`
--
ALTER TABLE `dishes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
