-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 02 2023 г., 17:07
-- Версия сервера: 8.0.30
-- Версия PHP: 7.2.34

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
  `id_cabinet` int NOT NULL,
  `name_cabinet` varchar(65) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fk_rasp` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `cabinet`
--

INSERT INTO `cabinet` (`id_cabinet`, `name_cabinet`, `fk_rasp`) VALUES
(1, 'Кабинет №1. Андролог', 5),
(3, 'Кабинет №3 Скорая помощь', 3),
(4, 'Кабинет №4 терапевт', 5),
(8, 'Кабинет №5 Уролог', 8),
(9, 'Кабинет №6. Психиатр', 4),
(10, 'Кабинет №7. Гинеколог', 6),
(11, 'Кабинет №8. Хирург', 7),
(12, 'Кабинет №9. Эндокринолог ', 3),
(13, 'Кабинет №10. Стоматолог ', 8),
(18, '2113', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `doctor`
--

CREATE TABLE `doctor` (
  `id_doctor` int NOT NULL,
  `name_doctor` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname_doctor` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `otchname_doctor` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fk_cabinet` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `doctor`
--

INSERT INTO `doctor` (`id_doctor`, `name_doctor`, `fname_doctor`, `otchname_doctor`, `fk_cabinet`) VALUES
(1, 'Маргарита', 'Пелипенко', 'Олеговна', 1),
(2, 'Антонина', 'Антипина', 'Владиславовна', 8),
(10, 'Софья', 'Белых', 'Николаевна', 11),
(11, 'Василий', 'Пинчук', 'Олегович', 12),
(12, 'Элина', 'Бикташева', 'Романовна', 13),
(13, 'Любовь', 'Ордина', 'Павловна', 10),
(14, 'Дмитрий', 'Солдатенко', 'Максимович', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id_news` int NOT NULL,
  `title` varchar(150) NOT NULL,
  `text` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `pacient`
--

CREATE TABLE `pacient` (
  `id_pacient` int NOT NULL,
  `fname` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `otchname` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_born` date NOT NULL,
  `email` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `oms` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `building` int NOT NULL,
  `apart` int NOT NULL,
  `pol` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `pacient`
--

INSERT INTO `pacient` (`id_pacient`, `fname`, `name`, `otchname`, `date_born`, `email`, `tel`, `oms`, `street`, `building`, `apart`, `pol`) VALUES
(1, 'Овчинников', 'Александр', 'Владимирович', '1986-04-03', NULL, '89604211231', '3456271893045682', 'Горького', 3, 62, 1),
(2, 'Назарьянц', 'Анна', 'Олеговна', '1997-02-04', NULL, '89021432353', '5789903205034000', 'Черняховского', 6, 5, 0),
(3, 'Зинченко', 'Владислава', 'Петровна', '1998-06-15', NULL, '89284405262', '3298739205492452', 'Ясная', 17, 4, 0),
(4, 'Шагинян', 'Марк', 'Сумбатович', '1993-10-03', NULL, '89324258614', '1389103017824830', 'Комсомольская', 3, 53, 1),
(5, 'Соколова', 'Ирина', 'Андреевна', '1974-04-10', NULL, '89605121400', '3929209138284391', 'Шахматная', 103, 15, 0),
(6, 'Арситов', 'Сергей', 'Александрович', '2003-01-01', NULL, '82729557204', '1482943013852032', 'Полоцкого', 45, 4, 1),
(7, 'Иванов', 'Евгений', 'Васильевич', '1993-06-10', NULL, '82464349815', '2729557202729570', 'Зелёная', 45, 56, 1),
(8, 'Печко', 'Илья', 'Александрович', '1995-02-01', NULL, '82435120804', '2435120802435120', 'Московский проспект', 41, 42, 1),
(9, 'Марычева', 'Людмила', 'Николаевна', '1964-09-03', NULL, '85542468260', '5342468265542468', 'Университетская', 17, 4, 0),
(10, 'Крист', 'Эрик', 'Григорьевич', '2003-07-10', 'pes@mail.ru', '86850368753', '6850368785036875', 'Зеленая', 56, 2, 1),
(11, 'Гордеева', 'Ангелина', 'Владиславовна', '2000-01-01', NULL, '89485878260', '9587826948587826', 'Боткина', 2, 40, 0),
(12, 'Бондаренко', 'Олег', 'Олегович', '1954-10-16', NULL, '86884995000', '6884990688499500', 'Олега Кошевого', 3, 4, 1),
(13, 'ФФФФФФФ', 'ФФФФ', 'ФФФФФ', '2013-03-14', '', '7212121212', '2131232123231213', 'фывыфвфыв', 12, 12, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `rasp`
--

CREATE TABLE `rasp` (
  `id_rasp` int NOT NULL,
  `start_day` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_day` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_hours` time NOT NULL,
  `end_hours` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `rasp`
--

INSERT INTO `rasp` (`id_rasp`, `start_day`, `end_day`, `start_hours`, `end_hours`) VALUES
(3, 'Понедельник', 'Пятница', '10:00:00', '15:00:00'),
(4, 'Понедельник', 'Четверг', '11:00:00', '15:00:00'),
(5, 'Понедельник', 'Суббота', '07:00:00', '21:00:00'),
(6, 'Вторник', 'Четверг', '07:00:00', '15:00:00'),
(7, 'Среда', 'Среда', '08:30:00', '10:00:00'),
(8, 'Суббота', 'Суббота', '08:00:00', '18:00:00'),
(9, 'Суббота', 'Суббота', '12:00:00', '14:00:00'),
(10, 'Суббота', 'Суббота', '20:00:00', '21:00:00'),
(12, 'Суббота', 'Суббота', '23:20:00', '23:59:00');

-- --------------------------------------------------------

--
-- Структура таблицы `role`
--

CREATE TABLE `role` (
  `id_role` int NOT NULL,
  `name_role` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `role`
--

INSERT INTO `role` (`id_role`, `name_role`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Registrator'),
(4, 'Doctor');

-- --------------------------------------------------------

--
-- Структура таблицы `talon`
--

CREATE TABLE `talon` (
  `id_talon` int NOT NULL,
  `fk_pacient` int DEFAULT NULL,
  `fk_doctor` int DEFAULT NULL,
  `date_talon` date NOT NULL,
  `date_time_zap` datetime NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `talon`
--

INSERT INTO `talon` (`id_talon`, `fk_pacient`, `fk_doctor`, `date_talon`, `date_time_zap`, `description`) VALUES
(1, 10, 2, '2023-02-25', '2023-02-26 14:00:00', 'Больной неизлечим\r\n'),
(2, 11, 10, '2022-07-21', '2023-04-19 08:05:00', NULL),
(3, 11, 13, '2023-02-01', '2023-02-26 14:41:18', NULL),
(4, 7, 12, '2023-02-02', '2023-02-26 14:41:18', NULL),
(5, 8, 11, '2023-02-15', '2023-02-26 14:47:41', NULL),
(6, 5, 13, '2023-02-09', '2023-02-22 10:36:00', NULL),
(7, 9, 10, '2022-09-12', '2023-08-30 09:09:00', NULL),
(8, 4, 14, '2023-02-06', '2023-06-20 13:53:20', NULL),
(9, 1, 2, '2023-01-26', '2023-07-22 13:53:20', NULL),
(10, 12, 2, '2023-02-16', '2023-11-10 13:55:10', NULL),
(11, 2, 13, '2023-02-07', '2023-04-11 13:55:10', NULL),
(12, 10, 13, '2023-04-20', '2023-04-21 14:15:00', NULL),
(14, 10, 1, '2023-05-01', '2023-05-05 12:00:00', NULL),
(15, 1, 1, '2023-04-20', '2023-05-05 12:15:00', NULL),
(16, 10, 2, '2023-04-20', '2023-05-13 08:00:00', NULL),
(17, 3, 1, '2023-05-26', '2023-05-30 07:30:00', NULL),
(18, 4, 11, '2023-05-26', '2023-06-02 10:40:00', NULL),
(19, 10, 1, '2023-05-30', '2023-05-30 12:00:00', NULL),
(20, 11, 1, '2023-05-30', '2023-05-30 12:10:00', NULL),
(22, 9, 1, '2023-05-30', '2023-05-30 12:30:00', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `login` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fk_role` int DEFAULT NULL,
  `fk_pacient` int DEFAULT NULL,
  `fk_doctor` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id_user`, `login`, `password`, `fk_role`, `fk_pacient`, `fk_doctor`) VALUES
(3, 'Admin', 'Admin', 1, NULL, NULL),
(6, 'as', 'as', 2, 10, NULL),
(7, 'ad', 'as', 2, NULL, NULL),
(8, 'AAA', '12', 3, NULL, NULL),
(9, 'Rita', '12', 4, NULL, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cabinet`
--
ALTER TABLE `cabinet`
  ADD PRIMARY KEY (`id_cabinet`),
  ADD UNIQUE KEY `id_cabinet` (`id_cabinet`),
  ADD KEY `d2` (`fk_rasp`);

--
-- Индексы таблицы `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id_doctor`),
  ADD UNIQUE KEY `id_doctor` (`id_doctor`),
  ADD KEY `doctor_ibfk_1` (`fk_cabinet`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_news`);

--
-- Индексы таблицы `pacient`
--
ALTER TABLE `pacient`
  ADD PRIMARY KEY (`id_pacient`);

--
-- Индексы таблицы `rasp`
--
ALTER TABLE `rasp`
  ADD PRIMARY KEY (`id_rasp`);

--
-- Индексы таблицы `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Индексы таблицы `talon`
--
ALTER TABLE `talon`
  ADD PRIMARY KEY (`id_talon`),
  ADD KEY `a` (`fk_doctor`),
  ADD KEY `a2` (`fk_pacient`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `LOGIN` (`login`),
  ADD KEY `user_ibfk_1` (`fk_doctor`),
  ADD KEY `user_ibfk_2` (`fk_pacient`),
  ADD KEY `user_ibfk_3` (`fk_role`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cabinet`
--
ALTER TABLE `cabinet`
  MODIFY `id_cabinet` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id_doctor` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id_news` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `pacient`
--
ALTER TABLE `pacient`
  MODIFY `id_pacient` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `rasp`
--
ALTER TABLE `rasp`
  MODIFY `id_rasp` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `talon`
--
ALTER TABLE `talon`
  MODIFY `id_talon` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `cabinet`
--
ALTER TABLE `cabinet`
  ADD CONSTRAINT `d2` FOREIGN KEY (`fk_rasp`) REFERENCES `rasp` (`id_rasp`) ON DELETE SET NULL;

--
-- Ограничения внешнего ключа таблицы `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `doctor_ibfk_1` FOREIGN KEY (`fk_cabinet`) REFERENCES `cabinet` (`id_cabinet`) ON DELETE SET NULL;

--
-- Ограничения внешнего ключа таблицы `talon`
--
ALTER TABLE `talon`
  ADD CONSTRAINT `a` FOREIGN KEY (`fk_doctor`) REFERENCES `doctor` (`id_doctor`) ON DELETE SET NULL,
  ADD CONSTRAINT `a2` FOREIGN KEY (`fk_pacient`) REFERENCES `pacient` (`id_pacient`) ON DELETE SET NULL;

--
-- Ограничения внешнего ключа таблицы `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`fk_doctor`) REFERENCES `doctor` (`id_doctor`) ON DELETE SET NULL,
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`fk_pacient`) REFERENCES `pacient` (`id_pacient`) ON DELETE SET NULL,
  ADD CONSTRAINT `user_ibfk_3` FOREIGN KEY (`fk_role`) REFERENCES `role` (`id_role`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
