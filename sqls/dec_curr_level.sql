-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Час створення: Січ 21 2025 р., 20:54
-- Версія сервера: 8.0.39-0ubuntu0.24.04.2
-- Версія PHP: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `VNTU`
--

-- --------------------------------------------------------

--
-- Структура таблиці `dec_curr_level`
--

CREATE TABLE `dec_curr_level` (
  `id` int NOT NULL,
  `l_name` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `l_prg` tinyint NOT NULL DEFAULT '1',
  `l_h_name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Дамп даних таблиці `dec_curr_level`
--

INSERT INTO `dec_curr_level` (`id`, `l_name`, `l_prg`, `l_h_name`) VALUES
(1, '0_(короткий)\r\n', 0, 'Молодший бакалавр'),
(2, 'I_(бакалаврський)', 1, 'Бакалавр'),
(3, 'II_(магістерський)', 2, 'Магістр'),
(4, 'III_(освітньо-науковий)', 3, 'Доктор філософії');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `dec_curr_level`
--
ALTER TABLE `dec_curr_level`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `dec_curr_level`
--
ALTER TABLE `dec_curr_level`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
