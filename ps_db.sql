-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-10-2024 a las 21:20:06
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
-- Base de datos: `ps_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Username` text NOT NULL,
  `Password` varchar(255) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `is_admin` int(1) DEFAULT 0,
  `last_login` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`ID`, `Username`, `Password`, `first_name`, `last_name`, `email`, `is_admin`, `last_login`) VALUES
(17, 'admin', '$2y$10$2/FEmfzarh9WpYP2o7n4a.F3ALQYdRUbUzhQ1QKBsxcfvAofeMOJm', 'Admin', 'Admin', 'admin@correo.com', 1, '2024-10-29 20:18:47'),
(18, 'Usuario1', '$2y$10$Vh624wv146kfxK9alL9mguzowG.U4lAiXpLNfBfIrc5ke86FRpek.', 'Usuario1', 'Uno', 'usuario1@correo.com', 0, '2024-10-13 11:57:46'),
(19, 'Usuario2', '$2y$10$Zw6lv.4vPVKQt92JsUeMSeGlhHRZ0v4enjlW2NQ5ohP4QCkom4/CG', 'Usuario2', 'Dos', 'usuario2@correo.com', 0, '2024-10-13 12:09:54'),
(20, 'admin1', '$2y$10$MruDiVxnobP4e3NjQXsMce2FZoikoWUvRKM3VUc2XkF9ZqRUXG9Jy', 'Admin1', 'DevOps', 'admin1@mail.com', 1, '2024-10-29 20:16:55');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
