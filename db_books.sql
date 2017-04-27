-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 27 2017 г., 15:41
-- Версия сервера: 5.6.34
-- Версия PHP: 5.6.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `db_books`
--

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `author_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `book_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `book_year` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`id`, `author_name`, `book_name`, `book_year`) VALUES
(1, 'First Teacher', 'Букварик', 1998),
(2, 'Жуль Верн', 'Пятнадцятирічний капітан', 1988),
(3, 'Антон Шевчук', 'jQuery\r\nучебник для начинающих', 2016),
(4, 'Бретт Маклафлин', 'PHP and\r\nMySQL', 2013),
(5, 'Шевченко Т.Г.', 'Заповіт', 1878),
(7, 'Питер Лабберс', 'HTML5', 2011),
(9, 'Mark L. Murphy', 'The Busy Coder\'s Guide to Andr', 2017),
(10, 'SQL', 'Бил Карвин', 2012),
(12, 'Мэтт Зандстра', 'PHP ООП Патерны', 2015),
(13, 'Я', 'АБВ-гедейка', 1987),
(14, 'Костюкова Н.И.', 'Алгоритмы', 2016),
(15, 'Бретт Маклафлин', 'PHP и MySQL', 2013),
(16, 'Род Стивенс', 'Алгоритмы и их применение', 2016);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
