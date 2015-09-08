-- phpMyAdmin SQL Dump
-- version 4.3.0
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Сен 08 2015 г., 00:13
-- Версия сервера: 5.6.22
-- Версия PHP: 5.5.27

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
-- Структура таблицы `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Рыба и морепродукты'),
(2, 'Курица и мясо'),
(3, 'Вегитарианское');

-- --------------------------------------------------------

--
-- Структура таблицы `daytime`
--

CREATE TABLE IF NOT EXISTS `daytime` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `daytime`
--

INSERT INTO `daytime` (`id`, `name`) VALUES
(1, 'На утро'),
(2, 'На день'),
(3, 'На вечер');

-- --------------------------------------------------------

--
-- Структура таблицы `dish`
--

CREATE TABLE IF NOT EXISTS `dish` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `m_1` int(11) NOT NULL,
  `m_2` int(11) NOT NULL,
  `m_3` int(11) NOT NULL,
  `w_1` int(11) NOT NULL,
  `w_2` int(11) NOT NULL,
  `w_3` int(11) NOT NULL,
  `fat` int(11) NOT NULL,
  `protein` int(11) NOT NULL,
  `carbohydrate` int(11) NOT NULL,
  `calories` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `action` int(11) DEFAULT '0',
  `category_id` int(11) unsigned NOT NULL,
  `daytime_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `dish`
--

INSERT INTO `dish` (`id`, `name`, `image`, `description`, `m_1`, `m_2`, `m_3`, `w_1`, `w_2`, `w_3`, `fat`, `protein`, `carbohydrate`, `calories`, `price`, `action`, `category_id`, `daytime_id`) VALUES
(1, 'Омлет с хреновиной', 'upload/images/p19r3h6ff56piupu1s0u1i9pjkc4.jpg', 'Описание омлета с хреновиной', 123, 123, 123, 123, 123, 123, 123, 123, 123, 123, 123, 0, 3, 2),
(2, 'Яйца в смятку', 'upload/images/p19r3h8d9i1cra13joe7c94p1pek4.jpg', 'sadfsafsaf', 123, 123, 123, 12313, 312323, 3123123, 123123, 123, 123, 123, 123, 0, 3, 1),
(3, 'Компотик', '', 'safsdf', 3123123, 3123123, 312313, 33123, 312313, 31231, 1323123, 12123, 3123123, 123, 123, 0, 3, 1),
(4, 'Картофель фри', '', 'фывфывфыв', 123, 123, 123, 123, 123, 123, 123, 123, 123, 123, 123, 0, 3, 2),
(5, 'Винегрет', '', 'фывфывфы', 123, 123, 123, 123, 123, 123, 123, 123, 123, 123, 123, 0, 3, 3),
(6, 'Свинина в каучуке', '', 'фывфыв', 123, 123, 123, 123, 123, 123, 123, 123, 123, 123, 123, 0, 2, 3),
(7, 'Баранина с овощами', '', 'фывфывфыв', 123, 123, 123, 123, 123, 123, 123, 123, 123, 123, 123, 0, 2, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `dish_set`
--

CREATE TABLE IF NOT EXISTS `dish_set` (
  `set_id` int(10) unsigned NOT NULL,
  `dish_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `dish_set`
--

INSERT INTO `dish_set` (`set_id`, `dish_id`) VALUES
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(3, 5),
(3, 6);

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `model_names`
--

INSERT INTO `model_names` (`id`, `code`, `name`, `vin_name`, `rod_name`, `admin_menu`, `sort`) VALUES
(1, 'set', 'Наборы', 'Набор', 'Набора', 1, 100),
(8, 'text', 'Тексты', 'Текст', 'Текста', 0, NULL),
(9, 'settings', 'Настройки', 'Параметр', 'Параметра', 1, 200),
(10, 'user', 'Пользователи', 'Пользователя', 'Пользователя', 0, NULL),
(11, 'import', 'Импорт', 'Импорт', 'Импорта', 1, 300),
(12, 'dish', 'Блюда', 'Блюдо', 'Блюда', 1, 150),
(13, 'order', 'Заказы', 'Заказ', 'Заказа', 1, 50);

-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

CREATE TABLE IF NOT EXISTS `order` (
`id` int(10) unsigned NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(10) unsigned DEFAULT NULL,
  `delivery` tinyint(4) DEFAULT NULL,
  `payment` tinyint(4) DEFAULT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order`
--

INSERT INTO `order` (`id`, `date`, `user_id`, `delivery`, `payment`, `location`) VALUES
(2, '2015-09-08 00:06:11', NULL, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Структура таблицы `order_dish`
--

CREATE TABLE IF NOT EXISTS `order_dish` (
  `order_id` int(10) unsigned NOT NULL,
  `dish_id` int(11) NOT NULL,
  `daytime_id` tinyint(4) NOT NULL,
  `count` tinyint(4) NOT NULL,
  `day` tinyint(3) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Структура таблицы `set`
--

CREATE TABLE IF NOT EXISTS `set` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `sort` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `set`
--

INSERT INTO `set` (`id`, `name`, `sort`) VALUES
(3, 'Первый набор', 100),
(4, 'asdasd', 12);

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
-- Структура таблицы `tmp_192d6a2d8d7a8baf1b51eaa51794d776`
--

CREATE TABLE IF NOT EXISTS `tmp_192d6a2d8d7a8baf1b51eaa51794d776` (
  `set_id` int(11) NOT NULL,
  `dish_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tmp_192d6a2d8d7a8baf1b51eaa51794d776`
--

INSERT INTO `tmp_192d6a2d8d7a8baf1b51eaa51794d776` (`set_id`, `dish_id`) VALUES
(3, 1),
(3, 2),
(3, 3);

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
-- Индексы таблицы `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `daytime`
--
ALTER TABLE `daytime`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `dish`
--
ALTER TABLE `dish`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `dish_set`
--
ALTER TABLE `dish_set`
 ADD PRIMARY KEY (`set_id`,`dish_id`);

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
-- Индексы таблицы `order`
--
ALTER TABLE `order`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order_dish`
--
ALTER TABLE `order_dish`
 ADD PRIMARY KEY (`order_id`,`dish_id`,`daytime_id`);

--
-- Индексы таблицы `role`
--
ALTER TABLE `role`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `set`
--
ALTER TABLE `set`
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
-- Индексы таблицы `tmp_192d6a2d8d7a8baf1b51eaa51794d776`
--
ALTER TABLE `tmp_192d6a2d8d7a8baf1b51eaa51794d776`
 ADD PRIMARY KEY (`set_id`,`dish_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`usr_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `daytime`
--
ALTER TABLE `daytime`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `dish`
--
ALTER TABLE `dish`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `mark`
--
ALTER TABLE `mark`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `model_names`
--
ALTER TABLE `model_names`
MODIFY `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT для таблицы `order`
--
ALTER TABLE `order`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `role`
--
ALTER TABLE `role`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `set`
--
ALTER TABLE `set`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
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
