-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Час створення: Січ 11 2025 р., 21:43
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
-- Структура таблиці `educationalDisciplineSemesterEducationForm`
--

CREATE TABLE `educationalDisciplineSemesterEducationForm` (
  `id` int NOT NULL,
  `educationalDisciplineSemesterId` int DEFAULT NULL,
  `educationalFormId` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `educationalDisciplineSemesterEducationForm`
--
ALTER TABLE `educationalDisciplineSemesterEducationForm`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_EducationalDisciplineSemesterEducationFormToSemester` (`educationalDisciplineSemesterId`),
  ADD KEY `FK_EducationalDisciplineSemesterEducationFormToEducationalForm` (`educationalFormId`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `educationalDisciplineSemesterEducationForm`
--
ALTER TABLE `educationalDisciplineSemesterEducationForm`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Обмеження зовнішнього ключа збережених таблиць
--

--
-- Обмеження зовнішнього ключа таблиці `educationalDisciplineSemesterEducationForm`
--
ALTER TABLE `educationalDisciplineSemesterEducationForm`
  ADD CONSTRAINT `FK_EducationalDisciplineSemesterEducationForm` FOREIGN KEY (`educationalDisciplineSemesterId`) REFERENCES `educationalDisciplineSemester` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_EducationalDisciplineSemesterEducationFormToEducationalForm` FOREIGN KEY (`educationalFormId`) REFERENCES `educationalForm` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
