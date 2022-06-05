-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 05 2022 г., 16:16
-- Версия сервера: 5.7.33-log
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `regpol`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cabinet`
--

CREATE TABLE `cabinet` (
  `cab` int(11) NOT NULL,
  `Name_Cab` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_Doctor` int(11) DEFAULT NULL,
  `ID_MED_USL` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `cabinet`
--

INSERT INTO `cabinet` (`cab`, `Name_Cab`, `ID_Doctor`, `ID_MED_USL`) VALUES
(1, 'fdsfdsfds', 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `doctor`
--

CREATE TABLE `doctor` (
  `ID_DOCTOR` int(11) NOT NULL,
  `FName_Doc` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Name_Doc` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `OtchName_Doc` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_RASP` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `doctor`
--

INSERT INTO `doctor` (`ID_DOCTOR`, `FName_Doc`, `Name_Doc`, `OtchName_Doc`, `ID_RASP`) VALUES
(1, 'мисми', 'иваиваи', 'авпвап', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `pacient`
--

CREATE TABLE `pacient` (
  `ID_PACIENT` int(11) NOT NULL,
  `FName` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `OtchName` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Date_Born` date NOT NULL,
  `ID_Cart` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `EMail` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Tel` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `OMS` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Street` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Building` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Pol` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Apart` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `pacient`
--

INSERT INTO `pacient` (`ID_PACIENT`, `FName`, `Name`, `OtchName`, `Date_Born`, `ID_Cart`, `EMail`, `Tel`, `OMS`, `Street`, `Building`, `Pol`, `Apart`) VALUES
(1, 'Сосков', 'Андрей', 'Питонович', '2012-06-04', '22345', NULL, '89999999991', '1123456789000098', 'Питонова', '1', 'М', '2'),
(3, 'павпв', 'авапва', 'ппарпар', '2013-06-09', '34343', 'Adasdas@mail.ru', '34234234233', '4342342342342342', 'Беброва', '2', 'Ж', '2');

-- --------------------------------------------------------

--
-- Структура таблицы `rasp`
--

CREATE TABLE `rasp` (
  `ID_RASP` int(11) NOT NULL,
  `DAYS_START` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DAYS_END` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `HOURS_START` time NOT NULL,
  `HOURS_END` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `rasp`
--

INSERT INTO `rasp` (`ID_RASP`, `DAYS_START`, `DAYS_END`, `HOURS_START`, `HOURS_END`) VALUES
(1, 'fff', 'dasdsasd', '12:10:00', '23:10:00');

-- --------------------------------------------------------

--
-- Структура таблицы `talon`
--

CREATE TABLE `talon` (
  `ID_Talon` int(11) NOT NULL,
  `DateZap` date NOT NULL,
  `TimeZap` time NOT NULL,
  `DATATALON` timestamp NOT NULL,
  `Cab` int(11) DEFAULT NULL,
  `ID_PACIENT` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `talon`
--

INSERT INTO `talon` (`ID_Talon`, `DateZap`, `TimeZap`, `DATATALON`, `Cab`, `ID_PACIENT`) VALUES
(1, '2009-09-09', '12:00:00', '2009-09-08 22:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `ID_USERS` int(11) NOT NULL,
  `Login` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Password` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Cool_Boy` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`ID_USERS`, `Login`, `Password`, `Cool_Boy`) VALUES
(1, 'Admin', 'Admin', 1),
(2, 'Lalka', '12345', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `usluga`
--

CREATE TABLE `usluga` (
  `ID_Med_Usl` int(11) NOT NULL,
  `Med_Usl` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `usluga`
--

INSERT INTO `usluga` (`ID_Med_Usl`, `Med_Usl`) VALUES
(1, 'Скорая медицинская помощь'),
(2, 'BRUUH'),
(3, 'gfbdfgfdfdf');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cabinet`
--
ALTER TABLE `cabinet`
  ADD PRIMARY KEY (`cab`),
  ADD KEY `ID_Doctor` (`ID_Doctor`),
  ADD KEY `ID_MED_USL` (`ID_MED_USL`);

--
-- Индексы таблицы `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`ID_DOCTOR`),
  ADD KEY `ID_RASP` (`ID_RASP`);

--
-- Индексы таблицы `pacient`
--
ALTER TABLE `pacient`
  ADD PRIMARY KEY (`ID_PACIENT`),
  ADD UNIQUE KEY `ID_PACIENT` (`ID_PACIENT`);

--
-- Индексы таблицы `rasp`
--
ALTER TABLE `rasp`
  ADD PRIMARY KEY (`ID_RASP`);

--
-- Индексы таблицы `talon`
--
ALTER TABLE `talon`
  ADD PRIMARY KEY (`ID_Talon`),
  ADD KEY `Cab` (`Cab`),
  ADD KEY `ID_PACIENT` (`ID_PACIENT`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID_USERS`),
  ADD UNIQUE KEY `Login` (`Login`);

--
-- Индексы таблицы `usluga`
--
ALTER TABLE `usluga`
  ADD PRIMARY KEY (`ID_Med_Usl`),
  ADD UNIQUE KEY `ID_Med_Usl` (`ID_Med_Usl`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cabinet`
--
ALTER TABLE `cabinet`
  MODIFY `cab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `doctor`
--
ALTER TABLE `doctor`
  MODIFY `ID_DOCTOR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `pacient`
--
ALTER TABLE `pacient`
  MODIFY `ID_PACIENT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `rasp`
--
ALTER TABLE `rasp`
  MODIFY `ID_RASP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `talon`
--
ALTER TABLE `talon`
  MODIFY `ID_Talon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `ID_USERS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `usluga`
--
ALTER TABLE `usluga`
  MODIFY `ID_Med_Usl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `cabinet`
--
ALTER TABLE `cabinet`
  ADD CONSTRAINT `cabinet_ibfk_1` FOREIGN KEY (`ID_Doctor`) REFERENCES `doctor` (`ID_DOCTOR`) ON DELETE SET NULL,
  ADD CONSTRAINT `cabinet_ibfk_2` FOREIGN KEY (`ID_MED_USL`) REFERENCES `usluga` (`ID_Med_Usl`) ON DELETE SET NULL;

--
-- Ограничения внешнего ключа таблицы `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `doctor_ibfk_1` FOREIGN KEY (`ID_RASP`) REFERENCES `rasp` (`ID_RASP`) ON DELETE SET NULL;

--
-- Ограничения внешнего ключа таблицы `talon`
--
ALTER TABLE `talon`
  ADD CONSTRAINT `talon_ibfk_1` FOREIGN KEY (`Cab`) REFERENCES `cabinet` (`cab`) ON DELETE SET NULL,
  ADD CONSTRAINT `talon_ibfk_2` FOREIGN KEY (`ID_PACIENT`) REFERENCES `pacient` (`ID_PACIENT`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
