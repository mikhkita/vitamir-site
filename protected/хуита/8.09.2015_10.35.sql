-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 08 2015 г., 07:35
-- Версия сервера: 5.5.45
-- Версия PHP: 5.5.28

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
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

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
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=124 ;

--
-- Дамп данных таблицы `daytime`
--

INSERT INTO `daytime` (`id`, `name`) VALUES
(1, 'утро'),
(2, 'день'),
(3, 'вечер'),
(12, 'утро, день'),
(13, 'утро, вечер'),
(23, 'день, вечер'),
(123, 'утро, день, вечер');

-- --------------------------------------------------------

--
-- Структура таблицы `dish`
--

CREATE TABLE IF NOT EXISTS `dish` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `m_1` float NOT NULL,
  `m_2` float NOT NULL,
  `m_3` float NOT NULL,
  `w_1` float NOT NULL,
  `w_2` float NOT NULL,
  `w_3` float NOT NULL,
  `fat` float NOT NULL,
  `protein` float NOT NULL,
  `carbohydrate` float NOT NULL,
  `calories` float NOT NULL,
  `price` float NOT NULL,
  `action` float DEFAULT '0',
  `category_id` int(11) unsigned NOT NULL,
  `daytime_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Дамп данных таблицы `dish`
--

INSERT INTO `dish` (`id`, `name`, `image`, `description`, `m_1`, `m_2`, `m_3`, `w_1`, `w_2`, `w_3`, `fat`, `protein`, `carbohydrate`, `calories`, `price`, `action`, `category_id`, `daytime_id`) VALUES
(9, 'Омлет', 'upload/images/default.jpg', 'Омлет', 0.8, 1.1, 1, 0.6, 0.9, 0.8, 20, 15, 50, 500, 100, 90, 3, 1),
(10, 'Рисовая каша', 'upload/images/default.jpg', 'Рисовая каша', 0.7, 1.2, 0.9, 0.5, 0.8, 0.7, 20, 10, 70, 600, 50, 0, 3, 1),
(11, 'Куриные отбивные', 'upload/images/default.jpg', 'Борщ', 0.8, 1.5, 1, 0.6, 1, 0.8, 15, 20, 60, 450, 150, 0, 2, 2),
(12, 'Рис отварной', 'upload/images/default.jpg', 'Рис отварной', 0.8, 1.1, 1, 0.7, 1, 0.9, 20, 10, 70, 300, 60, 0, 3, 2),
(13, 'Салат из овощей', 'upload/images/default.jpg', 'Салат из овощей', 0.8, 1.3, 1, 0.7, 0.9, 0.8, 15, 10, 80, 200, 75, 0, 3, 3),
(14, 'Семга слабосоленая', 'upload/images/default.jpg', 'Семга слабосоленая', 0.8, 1.2, 1, 0.6, 0.8, 0.7, 20, 50, 40, 650, 250, 0, 1, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `dish_set`
--

CREATE TABLE IF NOT EXISTS `dish_set` (
  `set_id` int(10) unsigned NOT NULL,
  `dish_id` int(10) unsigned NOT NULL,
  `daytime_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`set_id`,`dish_id`,`daytime_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `dish_set`
--

INSERT INTO `dish_set` (`set_id`, `dish_id`, `daytime_id`) VALUES
(3, 9, 1),
(3, 11, 2),
(3, 13, 3),
(4, 10, 1),
(4, 12, 2),
(4, 14, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `model_names`
--

CREATE TABLE IF NOT EXISTS `model_names` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  `vin_name` varchar(128) NOT NULL,
  `rod_name` varchar(128) NOT NULL,
  `admin_menu` tinyint(1) NOT NULL DEFAULT '0',
  `sort` smallint(6) DEFAULT '9999',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

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
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(10) unsigned DEFAULT NULL,
  `delivery` tinyint(4) DEFAULT NULL,
  `payment` tinyint(4) DEFAULT NULL,
  `location` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

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
  `day` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`order_id`,`dish_id`,`daytime_id`,`day`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order_dish`
--

INSERT INTO `order_dish` (`order_id`, `dish_id`, `daytime_id`, `count`, `day`) VALUES
(9, 10, 1, 1, 1),
(9, 12, 2, 1, 1),
(9, 14, 3, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

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
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `set`
--

INSERT INTO `set` (`id`, `name`, `sort`) VALUES
(3, 'Первый набор', 100),
(4, 'Второй набор', 110);

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `value` text,
  `code` varchar(50) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '9999',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

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
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

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
  `usr_id` int(11) NOT NULL AUTO_INCREMENT,
  `usr_login` varchar(128) NOT NULL,
  `usr_password` varchar(128) NOT NULL,
  `usr_name` varchar(255) NOT NULL,
  `usr_email` varchar(128) NOT NULL,
  `usr_rol_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`usr_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`usr_id`, `usr_login`, `usr_password`, `usr_name`, `usr_email`, `usr_rol_id`) VALUES
(1, 'root', '85676905d35fb12da70e8cb8bc8cebb0', 'Иванов И. И.', 'beatbox787@gmail.com', 1),
(3, 'admin', 'eaaba36a95aedcfd1c21a0d011e12ecd', 'Петров П. П.', 'asdas@asdasd.ru', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
