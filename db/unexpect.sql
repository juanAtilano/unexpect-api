-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-09-2018 a las 18:42:39
-- Versión del servidor: 10.1.35-MariaDB
-- Versión de PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `unexpect`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `msg`
--

CREATE TABLE `msg` (
  `id` int(11) NOT NULL,
  `msg` text NOT NULL,
  `numero` varchar(20) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `users_id` int(11) NOT NULL,
  `counter` int(11) NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `msg`
--

INSERT INTO `msg` (`id`, `msg`, `numero`, `created_at`, `updated_at`, `users_id`, `counter`, `link`) VALUES
(9, 'mensaje', '5345434435', '2018-09-24', '2018-09-25', 1, 51, 'https://wa.me/5215345434435?text=mensaje'),
(10, 'fsdfsdfs w4rw fwe', '2423423423', '2018-09-24', '2018-09-25', 1, 20, 'https://wa.me/5212423423423?text=fsdfsdfs%20w4rw%20fwe'),
(11, 'fsdfdswefseffe', '4234223434', '2018-09-24', '2018-09-25', 1, 2, 'https://wa.me/5214234223434?text=fsdfdswefseffe'),
(12, 'fsdfs fsdf', '432432424', '2018-09-24', '2018-09-25', 1, 1, 'https://wa.me/521432432424?text=fsdfs%20fsdf'),
(13, 'fsdfverfger ggerg', '45345345435', '2018-09-24', '2018-09-24', 1, 0, 'https://wa.me/52145345345435?text=fsdfverfger%20ggerg'),
(14, 'sdfsdfwf wfwe fwf', '534534434', '2018-09-24', '2018-09-25', 1, 6, 'https://wa.me/521534534434?text=sdfsdfwf%20wfwe%20fwf'),
(15, 'sdfcdssdsf', '234234242', '2018-09-24', '2018-09-24', 1, 0, 'https://wa.me/521234234242?text=sdfcdssdsf'),
(16, '23423234324324fssfs', '4234324324324 ', '2018-09-24', '2018-09-24', 1, 0, 'https://wa.me/5214234324324324 ?text=23423234324324fssfs'),
(17, 'fsdfsdfsd sdfsdfsdf', '423423434234', '2018-09-25', '2018-09-25', 1, 0, 'https://wa.me/521423423434234?text=fsdfsdfsd%20sdfsdfsdf'),
(18, 'fsdfsdfsd sdfsdfsdf', '423423434234', '2018-09-25', '2018-09-25', 1, 0, 'https://wa.me/521423423434234?text=fsdfsdfsd%20sdfsdfsdf'),
(19, 'fksdfkjwsefsefs fwe w', '4234234444', '2018-09-25', '2018-09-25', 1, 0, 'https://wa.me/5214234234444?text=fksdfkjwsefsefs%20fwe%20w'),
(20, 'gfdgdfgdfgfdgg', '54545', '2018-09-25', '2018-09-25', 1, 0, 'https://wa.me/52154545?text=gfdgdfgdfgfdgg'),
(21, ' gdfg', '34534345', '2018-09-25', '2018-09-25', 1, 0, 'https://wa.me/52134534345?text=gdfg'),
(22, 'fsdfs sdfs f', '5435345345', '2018-09-25', '2018-09-25', 1, 0, 'https://wa.me/5215435345345?text=fsdfs%20sdfs%20f'),
(23, '3434343', '3434343434', '2018-09-25', '2018-09-25', 1, 0, 'https://wa.me/5213434343434?text=3434343'),
(24, '', '4242424242', '2018-09-25', '2018-09-25', 1, 1, 'https://wa.me/5214242424242?text='),
(25, 'rwerwer', 'ewee', '2018-09-25', '2018-09-25', 1, 0, 'https://wa.me/521ewee?text=rwerwer'),
(26, 'rererer', '3232323232', '2018-09-25', '2018-09-25', 1, 0, 'https://wa.me/5213232323232?text=rererer'),
(27, 'fred', '1212121212', '2018-09-25', '2018-09-25', 1, 0, 'https://wa.me/5211212121212?text=fred'),
(28, 'rerer', '4545454545', '2018-09-25', '2018-09-25', 1, 0, 'https://wa.me/5214545454545?text=rerer'),
(29, 'frer wwer', '3434343434', '2018-09-25', '2018-09-25', 1, 0, 'https://wa.me/5213434343434?text=frer%20wwer');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(100) NOT NULL,
  `token` varchar(200) DEFAULT NULL,
  `numero_default` int(11) DEFAULT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `token`, `numero_default`, `created_at`, `updated_at`) VALUES
(1, 'usuario@mail.com', '$2y$10$m6v8feG4xctb16nKKsiLYO3UKqgA/Eks1ckcdCY5isDqar4bWCZqS', NULL, 2147483647, '2018-09-22', '2018-09-25');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `msg`
--
ALTER TABLE `msg`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `msg`
--
ALTER TABLE `msg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
