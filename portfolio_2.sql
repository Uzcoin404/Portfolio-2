-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 29 2021 г., 13:40
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `portfolio_2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `userID` int(11) NOT NULL,
  `comment` varchar(300) NOT NULL,
  `avatar` varchar(200) NOT NULL,
  `date` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `username`, `userID`, `comment`, `avatar`, `date`) VALUES
(1, 'fdgdf', 0, 'gdfgd', '', 'fgsdfgsdfg'),
(2, 'test', 0, 'sdfdsfdsf', '', '2021-12-27 19:56'),
(3, 'test', 0, 'tyt ytr ydt 45645 6rtygf hgfhfghg546456', '', '2021-12-27 21:05'),
(4, 'test', 0, 'fsdfdsfg gdfg df gdfgdfgdfgwe6546y45 5654 dgy r645 g dfg54645645645', '', '2021-12-27 21:10'),
(8, 'test', 0, 'uigt uhgdfugoidgdsfuyg dfoupghosdfighisdofgh86y dfoiuhgodfghoifdg08th gsdfgsdfg', '', '2021-12-28 20:36'),
(9, 'fdgdf', 0, 'gdfgd', '', 'fgsdfgsdfg'),
(10, 'test', 0, 'sdfdsfdsf', '', '2021-12-27 19:56'),
(11, 'test', 0, 'tyt ytr ydt 45645 6rtygf hgfhfghg546456', '', '2021-12-27 21:05'),
(12, 'test', 0, 'tyt ytr ydt 45645 6rtygf hgfhfghg546456', '', '2021-12-27 21:05'),
(13, 'test', 0, 'uigt uhgdfugoidgdsfuyg dfoupghosdfighisdofgh86y dfoiuhgodfghoifdg08th gsdfgsdfg', '', '2021-12-28 20:36'),
(14, 'test', 0, 'dfkgjh dfjghdfjghldfkgjldfsk gdfjjg;l;lsdflgdfg\r\n', '../img/avatar/test.jpg', '2021-12-29 15:11');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `username` varchar(60) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(60) NOT NULL,
  `password` varchar(90) NOT NULL,
  `bio` varchar(300) NOT NULL,
  `avatar` varchar(200) NOT NULL,
  `date` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `phone`, `password`, `bio`, `avatar`, `date`) VALUES
(1, 'shgsh', 'ghfghfg', 'hfdhf@fdgdf.gfh', '43543534', '$2y$10$C6AsnVaoJ/Yd5I5C/t/tzOjD2qi/rGDbfV.BTzLq9kHm5l94QsScq', 'ertretggsf', '../img/avatar/no-photo.jpg', '2021-12-26 14:33:18'),
(2, 'shgsh', 'ghfghfgsdds', 'hfdhf@fdgdf.gfhdsff', '43543534', '$2y$10$cUTWfU0QaOPWReMcUevNLe6UAIXJ2IgDn/zuchbT.aNtxkeeeG2BC', 'ertretggsf', '../img/avatar/no-photo.jpg', '2021-12-26 14:46:39'),
(3, 'shgsh', 'ghfghfgsddsdfg', 'fgsdfgdf@fh.fdgdg', '43543534', '$2y$10$9I/Nl0Qpnx1LgsYfB3kJfOaqPhUroMhAOYbdsHX2GDHfJFRTTXXIy', 'ertretggsf', '../img/avatar/no-photo.jpg', '2021-12-26 14:48:02'),
(4, 'fsdf', 'sdfsd', 'sdfsdf@fsdf.fdgfd', '45345', '$2y$10$YDdeeGPrY0USNX.gMdThLOXTS5OucF8sxeARug7j8m.qpDjoyqRbu', 'sdfgsdfgdsfg', '../img/avatar/no-photo.jpg', '2021-12-26 14:50:12'),
(5, 'fsdf', 'sdfsdsad', 'sdfsdf@fsdf.fdgfdasd', '45345', '$2y$10$GfbC3j4GjFpHsWnYXdHzSuGA0Jvze9IYdnupzK4e0tdokMDp4vFEy', 'sdfgsdfgdsfg', '../img/avatar/sdfsdsad.jpg', '2021-12-26 14:50:59'),
(6, 'gdfgdfg', '653reter', 'dfdssdf@fdgfd.gfh', '5345345', '$2y$10$VNHOhsTYfUmtyvaiiSxSEuMY7UFO5vellvDOQUzKGI2m2CGadS1uO', 'fgfdgfhfgh', '../img/avatar/653reter.png', '2021-12-26 18:57:40'),
(7, 'sgdfgfgfd', 'asd', 'fdgdfg@gh.gh', '56456', '$2y$10$Q2BwUNa2OiAx9J2LOhGBRuchNpSg.8RmYsjXHLS8OJ8.0x8a6xRUa', 'dfgdsfgsd', '../img/avatar/asd.jpg', '2021-12-26 19:24:55'),
(8, 'dfgsdgfa', 'test', 'fd@ffs', '4565465', '$2y$10$qdG/Ft2rOOaqeRCFYMBmPOZMg70fq8u/fc64p0TXzN2keSIlVGUB6', 'hgfhdfgh', '../img/avatar/test.jpg', '2021-12-27 19:50:03');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
