-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 05 2016 г., 22:18
-- Версия сервера: 5.5.41-log
-- Версия PHP: 5.4.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `minicms`
--

-- --------------------------------------------------------

--
-- Структура таблицы `blogs`
--

CREATE TABLE IF NOT EXISTS `blogs` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `id_user` int(6) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `img` varchar(255) NOT NULL,
  `title` varchar(150) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `blogs`
--

INSERT INTO `blogs` (`id`, `id_user`, `description`, `date`, `img`, `title`, `text`) VALUES
(1, 1, 'Просто для теста', '2016-03-26', 'images/blog/Badacsony.jpg', 'Мой первый блог', 'Это мой первый блог. Все спасибо кто смотрит мой канал ))\r\n\r\nThis is my first blog. Thank you all who watch my channel ))'),
(2, 1, 'Это второй тема', '2016-03-26', 'images/blog/Beautiful.jpg', 'Вторая тема', 'Всем привент');

-- --------------------------------------------------------

--
-- Структура таблицы `contents`
--

CREATE TABLE IF NOT EXISTS `contents` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `key` varchar(200) NOT NULL,
  `description` varchar(255) NOT NULL,
  `title` varchar(150) NOT NULL,
  `text` text NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `contents`
--

INSERT INTO `contents` (`id`, `key`, `description`, `title`, `text`, `date`) VALUES
(1, 'Главная, страница', 'Это измененый текст описание', 'Главная', 'Тестовый изменение текста\r\n                           ', '2016-04-01');

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `id_name` int(6) NOT NULL,
  `title` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`id`, `id_name`, `title`) VALUES
(1, 1, 'Главная'),
(2, 2, 'Тест');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
