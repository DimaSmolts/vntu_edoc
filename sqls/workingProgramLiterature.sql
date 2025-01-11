-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Час створення: Січ 11 2025 р., 21:52
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
-- Структура таблиці `workingProgramLiterature`
--

CREATE TABLE `workingProgramLiterature` (
  `id` int NOT NULL,
  `educationalDisciplineWorkingProgramId` int DEFAULT NULL,
  `main` text,
  `supporting` text,
  `additional` text,
  `informationResources` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `workingProgramLiterature`
--
ALTER TABLE `workingProgramLiterature`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_literatureToWorkingProgram` (`educationalDisciplineWorkingProgramId`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `workingProgramLiterature`
--
ALTER TABLE `workingProgramLiterature`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Обмеження зовнішнього ключа збережених таблиць
--

--
-- Обмеження зовнішнього ключа таблиці `workingProgramLiterature`
--
ALTER TABLE `workingProgramLiterature`
  ADD CONSTRAINT `FK_literatureToWorkingProgram` FOREIGN KEY (`educationalDisciplineWorkingProgramId`) REFERENCES `educationalDisciplineWorkingProgram` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
