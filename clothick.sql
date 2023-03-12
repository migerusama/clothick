-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-03-2023 a las 21:56:45
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
-- Estructura de tabla para la tabla `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `contact`
--

INSERT INTO `contact` (`id`, `fullname`, `email`, `description`) VALUES
(1, 'Mamahuevo', 'qowejoqw@oqwiekqo.com', 'LLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLL'),
(2, 'qweqw', 'qweqweqw@qweqw.com', 'qwoeqwoejqweoqw'),
(3, 'qweqweqw', 'qweqw|@qweqw.com', 'qwoeoqweqw'),
(4, 'qweqweqw', 'qweqweqw@qwoejqwo.com', 'qwoekjqwopeqw'),
(5, 'qeqweqqw', 'aweqwe@qweqw.com', 'qwekqoekqwopekopqweqwe'),
(6, 'qweqwe', 'qqweqw@qwoekqw.com', 'qowkeoqweqw'),
(7, 'qweqw', 'qweqw@qwokeqwe.com', 'qowkeoqwe'),
(8, 'qweqw', 'qweqw@qweqw.com', 'qwekqoweq');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password`
--

CREATE TABLE `password` (
  `idUser` int(11) NOT NULL,
  `password` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `password`
--

INSERT INTO `password` (`idUser`, `password`) VALUES
(1, 'admin'),
(3, 'contraseña'),
(4, 'xd'),
(5, '1'),
(6, '2'),
(7, '3'),
(8, '4');

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
-- Estructura de tabla para la tabla `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `description` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `type`
--

INSERT INTO `type` (`id`, `description`) VALUES
(1, 'usuario'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `userdata`
--

CREATE TABLE `userdata` (
  `idUser` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `dateBirth` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `profilePic` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `userdata`
--

INSERT INTO `userdata` (`idUser`, `name`, `gender`, `dateBirth`, `address`, `country`) VALUES
(1, 'admin', 'male', '2010-03-18', 'False Street 123123', 'portugal');
INSERT INTO `userdata` (`idUser`, `name`, `gender`, `dateBirth`, `address`, `country`) VALUES
(5, '122', '', '0000-00-00', '', NULL);
INSERT INTO `userdata` (`idUser`, `name`, `gender`, `dateBirth`, `address`, `country`) VALUES
(6, '2', 'female', '2023-03-09', 'False Street 12312323', 'italy');
INSERT INTO `userdata` (`idUser`, `name`, `gender`, `dateBirth`, `address`, `country`) VALUES
(7, '333', 'other', '0000-00-00', '', NULL),
(8, '4', '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nick` varchar(20) NOT NULL,
  `type` int(11) NOT NULL DEFAULT 1,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nick`, `type`, `email`) VALUES
(1, 'admin', 2, 'admin@admin.com'),
(3, 'miguel', 1, ''),
(4, 'elpepe', 1, 'elpepe@gmail.com'),
(5, '1', 1, '1@1.com'),
(6, '2', 1, '2@2.com'),
(7, '3', 1, '3@3.com'),
(8, '4', 1, '4@4.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password`
--
ALTER TABLE `password`
  ADD PRIMARY KEY (`idUser`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Category` (`category`);

--
-- Indices de la tabla `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`idUser`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nick` (`nick`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `tipo` (`type`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT de la tabla `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `password`
--
ALTER TABLE `password`
  ADD CONSTRAINT `password_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `password_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_Category` FOREIGN KEY (`category`) REFERENCES `categories` (`id`);

--
-- Filtros para la tabla `userdata`
--
ALTER TABLE `userdata`
  ADD CONSTRAINT `userdata_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`type`) REFERENCES `type` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
