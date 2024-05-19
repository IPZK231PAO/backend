-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Час створення: Трв 19 2024 р., 17:01
-- Версія сервера: 8.2.0
-- Версія PHP: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `lab5`
--

-- --------------------------------------------------------

--
-- Структура таблиці `tov`
--

DROP TABLE IF EXISTS `tov`;
CREATE TABLE IF NOT EXISTS `tov` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп даних таблиці `tov`
--

INSERT INTO `tov` (`id`, `name`, `description`, `price`, `quantity`) VALUES
(1, 'Товар 1', 'Опис товару 1', 100.00, 10),
(2, 'Товар 2', 'Опис товару 2', 150.00, 5),
(3, 'Товар 3', 'Опис товару 3', 200.00, 20),
(4, 'Товар 4', 'Опис товару 4', 50.00, 15),
(5, 'Товар 5', 'Опис товару 5', 75.00, 25),
(6, 'Товар 6', 'Опис товару 6', 120.00, 8),
(7, 'Товар 7', 'Опис товару 7', 80.00, 12),
(8, 'Товар 8', 'Опис товару 8', 170.00, 6),
(9, 'Товар 9', 'Опис товару 9', 130.00, 11),
(10, 'Товар 10', 'Опис товару 10', 90.00, 7);

-- --------------------------------------------------------

--
-- Структура таблиці `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `gender` enum('male','female','other') DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп даних таблиці `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `first_name`, `last_name`, `birthdate`, `gender`, `phone`, `address`, `created_at`) VALUES
(1, '1', '$2y$10$ifYA9bsmO1YUZJmcr7wKyuuDoNTYmyj5jlV5pewTD6n2sDBPxTNYi', 'testuser@mail.com', '1', '1', '2024-05-08', 'male', '123', '123', '2024-05-19 16:40:14'),
(2, 'homeuser', '123', '123@mail.com', '2', '2', '2024-05-09', 'male', '1254151', '123', '2024-05-19 16:50:14');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
