-- phpMyAdmin SQL Dump
-- version 4.3.0
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Июл 26 2015 г., 01:30
-- Версия сервера: 5.6.22
-- Версия PHP: 5.4.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `vitamir`
--

-- --------------------------------------------------------

--
-- Структура таблицы `mark`
--

CREATE TABLE IF NOT EXISTS `mark` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `car` varchar(1024) DEFAULT NULL,
  `logo` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `model_names`
--

CREATE TABLE IF NOT EXISTS `model_names` (
`id` smallint(5) unsigned NOT NULL,
  `code` varchar(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  `vin_name` varchar(128) NOT NULL,
  `rod_name` varchar(128) NOT NULL,
  `admin_menu` tinyint(1) NOT NULL DEFAULT '0',
  `sort` smallint(6) DEFAULT '9999'
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `model_names`
--

INSERT INTO `model_names` (`id`, `code`, `name`, `vin_name`, `rod_name`, `admin_menu`, `sort`) VALUES
(1, 'mark', 'Марки', 'Марку', 'Марки', 1, 100),
(8, 'text', 'Тексты', 'Текст', 'Текста', 0, NULL),
(9, 'settings', 'Настройки', 'Параметр', 'Параметра', 1, 200),
(10, 'user', 'Пользователи', 'Пользователя', 'Пользователя', 0, NULL),
(11, 'import', 'Импорт', 'Импорт', 'Импорта', 1, 300);

-- --------------------------------------------------------

--
-- Структура таблицы `role`
--

CREATE TABLE IF NOT EXISTS `role` (
`id` int(10) unsigned NOT NULL,
  `code` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `role`
--

INSERT INTO `role` (`id`, `code`, `name`) VALUES
(1, 'root', 'Создатель'),
(2, 'admin', 'Администратор'),
(3, 'manager', 'Контент-менеджер');

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` text,
  `code` varchar(50) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '9999'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`, `code`, `sort`) VALUES
(1, 'Заголовок страницы', '', 'TITLE', 10),
(2, 'Описание', '', 'DESCRIPTION', 20),
(3, 'Ключевые фразы', '', 'KEYWORDS', 30);

-- --------------------------------------------------------

--
-- Структура таблицы `text`
--

CREATE TABLE IF NOT EXISTS `text` (
`id` int(10) unsigned NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `text`
--

INSERT INTO `text` (`id`, `text`) VALUES
(1, 'Немецкий чип-тюнинг с гарантией результата в Москве'),
(2, 'Есть вопрос? Звоните - поможем!'),
(3, '+7 (499) 390-63-44'),
(4, 'Сделайте ваш'),
(5, 'мощнее\r\nна 32% за 20 минут'),
(6, 'Вернем деньги, если не почувствуете результат'),
(8, 'Современный немецкий чип-тюнинг блок + усилитель педали газа раскроет заложенные производителем мощности вашего автомобиля.'),
(9, 'Рассчитайте прирост мощности для'),
(10, 'прямо сейчас!'),
(11, 'Сегодня рассчитали уже <b>132</b> варианта чип-тюнинга'),
(12, 'Акция!'),
(13, 'При заявке до 29 мая монтаж - в подарок!'),
(14, 'Для продолжения заполните форму'),
(15, 'С сохранением дилерской гарантии\r\nНикакого вреда автомобилю\r\nБез увеличения расхода топлива'),
(16, '+7 (800) 505-79-53');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`usr_id` int(11) NOT NULL,
  `usr_login` varchar(128) NOT NULL,
  `usr_password` varchar(128) NOT NULL,
  `usr_name` varchar(255) NOT NULL,
  `usr_email` varchar(128) NOT NULL,
  `usr_rol_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`usr_id`, `usr_login`, `usr_password`, `usr_name`, `usr_email`, `usr_rol_id`) VALUES
(1, 'root', '85676905d35fb12da70e8cb8bc8cebb0', 'Иванов И. И.', 'beatbox787@gmail.com', 1),
(3, 'admin', 'eaaba36a95aedcfd1c21a0d011e12ecd', 'Петров П. П.', 'asdas@asdasd.ru', 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `mark`
--
ALTER TABLE `mark`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `model_names`
--
ALTER TABLE `model_names`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `role`
--
ALTER TABLE `role`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `settings`
--
ALTER TABLE `settings`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `text`
--
ALTER TABLE `text`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`usr_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `mark`
--
ALTER TABLE `mark`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `model_names`
--
ALTER TABLE `model_names`
MODIFY `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT для таблицы `role`
--
ALTER TABLE `role`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `settings`
--
ALTER TABLE `settings`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `text`
--
ALTER TABLE `text`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
MODIFY `usr_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
