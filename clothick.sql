-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-02-2023 a las 11:41:22
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `clothick`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `category`) VALUES
(1, 'headset'),
(2, 'keyboard'),
(3, 'mouse'),
(4, 'clothes'),
(5, 'accessory'),
(6, 'digital products');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos`
--

CREATE TABLE `datos` (
  `idUser` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `sex` enum('hombre','mujer','otro') NOT NULL,
  `dateBirth` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `creditCard` varchar(24) DEFAULT NULL,
  `notifications` tinyint(1) NOT NULL DEFAULT 0,
  `newsletter` tinyint(1) NOT NULL DEFAULT 0,
  `profilePic` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password`
--

CREATE TABLE `password` (
  `id_usr` int(11) NOT NULL,
  `password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `password`
--

INSERT INTO `password` (`id_usr`, `password`) VALUES
(3, 'contraseña');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `image` varchar(255) NOT NULL,
  `category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `quantity`, `price`, `image`, `category`) VALUES
(3, 'STREAK65 LP - Black', 'Low Profile Gaming Keyboard', 0, 129.99, 'https://cf-img.fnatic.com/cdn-cgi/image/dpr=1,fit=contain,format=auto,height=1700,width=1536,trim=0;294;0;294/https://cdn.sanity.io/images/5gii1snx/production/1cdacef05dcb659be5b770e4e1e940a21148ee79-2000x1500.png', 2),
(4, 'STREAK65 LP - White', 'Low Profile Gaming Keyboard', 0, 129.99, 'https://cf-img.fnatic.com/cdn-cgi/image/dpr=1,fit=contain,format=auto,height=1700,width=1536,trim=0;294;0;294/https://cdn.sanity.io/images/5gii1snx/production/8ec6a0c5ecd5825d7471f67ec9b9ab871ecc1b30-2000x1500.png', 2),
(5, 'STREAK65', 'Ultra Compact Esports Keyboard', 0, 99.99, 'https://cf-img.fnatic.com/cdn-cgi/image/dpr=1,fit=contain,format=auto,height=1700,width=1536,trim=0;294;0;294/https://cdn.sanity.io/images/5gii1snx/production/a49fd09072402c9b4ff52589b14849916fc3583c-2000x1500.png', 2),
(6, 'MiniStreak Speed', 'TKL Speed Silver Switches', 0, 98.99, 'https://cf-img.fnatic.com/cdn-cgi/image/dpr=1,fit=contain,format=auto,height=1700,width=1536,trim=0;294;0;294/https://cdn.sanity.io/images/5gii1snx/production/2547fff456fbb7615b0afe0e266c63c2e2905469-2000x1500.png', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`id`, `descripcion`) VALUES
(1, 'usuario'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nick` varchar(20) NOT NULL,
  `tipo` int(11) NOT NULL DEFAULT 1,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nick`, `tipo`, `email`) VALUES
(3, 'miguel', 1, '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `datos`
--
ALTER TABLE `datos`
  ADD PRIMARY KEY (`idUser`);

--
-- Indices de la tabla `password`
--
ALTER TABLE `password`
  ADD PRIMARY KEY (`id_usr`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Category` (`category`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nick` (`nick`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `tipo` (`tipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `datos`
--
ALTER TABLE `datos`
  ADD CONSTRAINT `datos_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `password`
--
ALTER TABLE `password`
  ADD CONSTRAINT `password_ibfk_1` FOREIGN KEY (`id_usr`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `password_ibfk_2` FOREIGN KEY (`id_usr`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_Category` FOREIGN KEY (`category`) REFERENCES `categories` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`tipo`) REFERENCES `tipo` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
