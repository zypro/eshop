-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Июл 06 2015 г., 19:50
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `db_eshop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `cart_id_products` int(11) NOT NULL,
  `cart_price` int(11) NOT NULL,
  `cart_count` int(11) NOT NULL,
  `cart_datetime` datetime NOT NULL,
  `cart_ip` varchar(100) NOT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(100) NOT NULL,
  `brand` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `type`, `brand`) VALUES
(1, 'mobile', 'Apple'),
(2, 'mobile', 'Samsung'),
(3, 'notebook', 'Asus'),
(4, 'notebook', 'Acer'),
(5, 'mobile', 'HTC'),
(6, 'mobile', 'Sony');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `datetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `text`, `datetime`) VALUES
(1, 'News 1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti in eius, numquam quae expedita, ipsam vel eveniet id porro dignissimos, ipsa animi dolore tempora pariatur repellendus quaerat quisquam facilis esse.', '2015-07-06 03:12:34'),
(2, 'News 2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti in eius, numquam quae expedita, ipsam vel eveniet id porro dignissimos, ipsa animi dolore tempora pariatur repellendus quaerat quisquam facilis esse.', '2015-07-06 03:07:03'),
(3, 'News 3', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti in eius, numquam quae expedita, ipsam vel eveniet id porro dignissimos, ipsa animi dolore tempora pariatur repellendus quaerat quisquam facilis esse.', '2015-07-06 02:23:16'),
(4, 'News 4', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti in eius, numquam quae expedita, ipsam vel eveniet id porro dignissimos, ipsa animi dolore tempora pariatur repellendus quaerat quisquam facilis esse.', '2015-07-06 04:19:21'),
(5, 'News 5', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti in eius, numquam quae expedita, ipsam vel eveniet id porro dignissimos, ipsa animi dolore tempora pariatur repellendus quaerat quisquam facilis esse.', '2015-07-06 05:16:12');

-- --------------------------------------------------------

--
-- Структура таблицы `table_products`
--

CREATE TABLE IF NOT EXISTS `table_products` (
  `products_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `seo_words` text NOT NULL,
  `seo_description` text NOT NULL,
  `mini_description` text NOT NULL,
  `mini_features` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `features` text NOT NULL,
  `datetime` datetime NOT NULL,
  `new` int(11) NOT NULL DEFAULT '0',
  `leader` int(11) NOT NULL DEFAULT '0',
  `sale` int(11) NOT NULL DEFAULT '0',
  `visible` int(11) NOT NULL DEFAULT '0',
  `count` int(11) NOT NULL DEFAULT '0',
  `type_tovara` varchar(255) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `vote` int(11) NOT NULL,
  `votes` float NOT NULL,
  PRIMARY KEY (`products_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `table_products`
--

INSERT INTO `table_products` (`products_id`, `title`, `price`, `brand`, `seo_words`, `seo_description`, `mini_description`, `mini_features`, `image`, `description`, `features`, `datetime`, `new`, `leader`, `sale`, `visible`, `count`, `type_tovara`, `brand_id`, `vote`, `votes`) VALUES
(1, 'Мобильный телефон Samsung Galaxy S6 32Gb (черно-синий)', 399, 'Samsung', '', '', 'Производитель : Samsung Датчики : G-сенсор , датчик освещенности , датчик приближения , цифровой компас Сканер отпечатков пальцев : да Срок ', 'Производитель : Samsung\nДатчики   : G-сенсор   , датчик освещенности   , датчик приближения   , цифровой компас  \nСканер отпечатков пальцев : да\nСрок гарантии : 1 год\nДополнительно : Быстрая зарядка (десять ', 'img1.jpg', '', '0', '2015-07-03 03:16:32', 0, 0, 0, 1, 0, 'mobile', 2, 1, 1),
(2, 'Мобильный телефон Apple iPhone 4S 8Gb (черный) ', 355, 'Apple', '', '', 'lorem ipsum Производитель : Apple Датчики : G-сенсор , датчик освещенности , датчик приближения , цифровой компас', 'Производитель : Apple\nДатчики   : G-сенсор   , датчик освещенности   , датчик приближения   , цифровой компас  \n', 'img2.jpg', '', '', '2015-07-03 04:09:12', 1, 0, 0, 1, 0, 'mobile', 1, 1, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
