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
-- Структура таблиці `educationalDisciplineWorkingProgram`
--

CREATE TABLE `educationalDisciplineWorkingProgram` (
  `id` int NOT NULL,
  `createdAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `regularYear` int DEFAULT NULL,
  `academicYear` int DEFAULT NULL,
  `facultyId` int DEFAULT NULL,
  `departmentId` int DEFAULT NULL,
  `stydingLevelId` int DEFAULT NULL,
  `subjectTypeId` int DEFAULT NUll,
  `fieldsOfStudyIds` varchar(255) DEFAULT NULL,
  `specialtyIds` text,
  `educationalProgramIds` varchar(255) DEFAULT NULL,
  `notes` text,
  `prerequisites` text,
  `goal` text,
  `tasks` text,
  `competences` text,
  `programResults` text,
  `controlMeasures` text,
  `disciplineName` varchar(255) DEFAULT NULL,
  `studingMethods` text,
  `examingMethods` text,
  `code` varchar(100) DEFAULT NULL,
  `methodologicalSupport` text,
  `individualTaskNotes` text,
  `creditsAmount` int DEFAULT NULL,
  `wpCreatorId` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `educationalDisciplineWorkingProgram`
--
ALTER TABLE `educationalDisciplineWorkingProgram`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `educationalDisciplineWorkingProgram`
--
ALTER TABLE `educationalDisciplineWorkingProgram`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
