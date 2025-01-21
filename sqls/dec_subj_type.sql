-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Час створення: Січ 21 2025 р., 20:55
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
-- Структура таблиці `dec_subj_type`
--

CREATE TABLE `dec_subj_type` (
  `id` int NOT NULL,
  `subj_type` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Дамп даних таблиці `dec_subj_type`
--

INSERT INTO `dec_subj_type` (`id`, `subj_type`) VALUES
(1, 'Обов\'язкові'),
(2, 'Вибіркові'),
(3, 'За вибором студента'),
(4, 'Інші види');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `dec_subj_type`
--
ALTER TABLE `dec_subj_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `dec_subj_type`
--
ALTER TABLE `dec_subj_type`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
