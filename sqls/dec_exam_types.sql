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
-- Структура таблиці `dec_exam_types`
--

CREATE TABLE `dec_exam_types` (
  `id` int NOT NULL,
  `e_name` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `e_short` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Дамп даних таблиці `dec_exam_types`
--

INSERT INTO `dec_exam_types` (`id`, `e_name`, `e_short`) VALUES
(0, 'Іспит', 'Е'),
(2, 'Диф. залік', 'ДЗ'),
(3, 'Модулі', 'М'),
(4, 'Курсовий проект', 'КП'),
(5, 'Курсова робота', 'КР'),
(7, 'Навчальна практика', 'НП'),
(8, 'Виробнича практика', 'ВП'),
(9, 'Переддипломна практика', 'ПП'),
(10, 'Ознайомча практика', 'ОП'),
(11, 'Академічна різниця', 'АР'),
(12, 'Ректорська контрольна робота', 'РК'),
(1, 'Залік', 'З'),
(13, 'Державний іспит', 'ДІ'),
(14, 'немає', '-');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `dec_exam_types`
--
ALTER TABLE `dec_exam_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `dec_exam_types`
--
ALTER TABLE `dec_exam_types`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
