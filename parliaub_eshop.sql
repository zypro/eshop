-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Июл 20 2015 г., 15:56
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `parliaub_eshop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `buy_products`
--

CREATE TABLE IF NOT EXISTS `buy_products` (
  `buy_id` int(11) NOT NULL AUTO_INCREMENT,
  `buy_id_order` int(11) NOT NULL,
  `buy_id_product` int(11) NOT NULL,
  `buy_count_product` int(11) NOT NULL,
  PRIMARY KEY (`buy_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `buy_products`
--

INSERT INTO `buy_products` (`buy_id`, `buy_id_order`, `buy_id_product`, `buy_count_product`) VALUES
(3, 3, 16, 1),
(4, 3, 15, 1),
(5, 4, 16, 1),
(6, 4, 15, 1),
(7, 5, 16, 2),
(8, 5, 15, 1),
(9, 6, 11, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `cart_id_product` int(11) NOT NULL,
  `cart_price` int(11) NOT NULL,
  `cart_count` int(11) NOT NULL DEFAULT '1',
  `cart_datetime` datetime NOT NULL,
  `cart_ip` varchar(100) NOT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=67 ;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`cart_id`, `cart_id_product`, `cart_price`, `cart_count`, `cart_datetime`, `cart_ip`) VALUES
(54, 12, 566, 5, '2015-07-12 23:03:10', '91.231.255.246');

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(100) NOT NULL,
  `brand` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=87 ;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `type`, `brand`) VALUES
(8, 'makeup', 'Тушь для ресниц'),
(9, 'makeup', 'Карандаши, подводка'),
(10, 'makeup', 'Тени для век'),
(11, 'makeup', 'Для губ'),
(12, 'makeup', 'Помады'),
(13, 'makeup', 'Карандаши'),
(14, 'makeup', 'Блески'),
(16, 'makeup', 'Бальзамы'),
(17, 'makeup', 'Для лица'),
(18, 'makeup', 'Пудра'),
(19, 'makeup', 'Румяна'),
(20, 'makeup', 'Тональные кремы'),
(21, 'makeup', 'Корректор'),
(22, 'makeup', 'База для макияжа'),
(23, 'makeup', 'Для ногтей'),
(24, 'makeup', 'Лак для ногтей'),
(25, 'makeup', 'База, сушка, корректор'),
(26, 'makeup', 'Средства для снятия лака'),
(27, 'makeup', 'Средства для ухода'),
(28, 'makeup', 'Пилки для ногтей'),
(29, 'care', 'Кремы дневные'),
(30, 'care', 'Кремы ночные'),
(31, 'care', 'Средства для век и ресниц'),
(32, 'care', 'Бальзамы для губ'),
(33, 'care', 'Очищение, тоники'),
(34, 'care', 'Скрабы, пилинги'),
(35, 'care', 'Маски для лица'),
(36, 'care', 'Сыворотки, концентраты'),
(37, 'care', 'Аксессуары'),
(38, 'care', 'Уход за волосами'),
(39, 'care', 'Шампуни'),
(40, 'care', 'Бальзамы, маски'),
(41, 'care', 'Краска для волос'),
(42, 'care', 'Специальны уход'),
(43, 'care', 'Средства для укладки'),
(44, 'care', 'Уход за телом'),
(45, 'care', 'Гели для душа'),
(46, 'care', 'Пенна для ванны'),
(47, 'care', 'Кремы, молочко'),
(48, 'care', 'Спреи для тела'),
(49, 'care', 'Скрабы'),
(50, 'care', 'Коррекция фигуры'),
(51, 'care', 'Мыло '),
(52, 'care', 'Дезодаранты'),
(53, 'care', 'Уход за руками'),
(54, 'care', 'Кремы для рук'),
(55, 'care', 'Уход за ногтями'),
(56, 'care', 'Кремы, гели, спреи'),
(57, 'hygiene', 'Зубные пасты'),
(58, 'hygiene', 'Ополаскиватели, спреи'),
(59, 'hygiene', 'Зубные щетки'),
(60, 'hygiene', 'Для душа и ванны'),
(61, 'hygiene', 'Гели для душа'),
(62, 'hygiene', 'Пена для ванны'),
(63, 'hygiene', 'Мыло'),
(64, 'hygiene', 'Дезодаранты'),
(65, 'hygiene', 'Шариковые'),
(66, 'hygiene', 'Спреи'),
(67, 'hygiene', 'Интимная гигиена'),
(68, 'hygiene', 'Гели, лубриканты'),
(69, 'hygiene', 'Салфетки, прокладки'),
(70, 'mans', 'Шариковые'),
(71, 'mans', 'Спреи'),
(72, 'mans', 'Для и после бритья'),
(73, 'mans', 'Пена для бритья'),
(74, 'mans', 'Средства после бритья'),
(75, 'mans', 'Уход за лицом'),
(76, 'mans', 'Очищение'),
(77, 'mans', 'Уход за телом и волосами'),
(78, 'mans', 'Шампуни, бальзамы'),
(79, 'mans', 'Гели для душа'),
(80, 'kids', 'Для губ'),
(81, 'kids', 'Для кожи'),
(82, 'kids', 'Защита от солнца'),
(83, 'kids', 'Салфетки'),
(84, 'kids', 'Для ванны и душа'),
(85, 'kids', 'Для зубов'),
(86, 'kids', 'Для ногтей');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `text`, `date`) VALUES
(1, 'News 1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti in eius, numquam quae expedita, ipsam vel eveniet id porro dignissimos, ipsa animi dolore tempora pariatur repellendus quaerat quisquam facilis esse.', '2015-07-06 03:12:34'),
(2, 'News 2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti in eius, numquam quae expedita, ipsam vel eveniet id porro dignissimos, ipsa animi dolore tempora pariatur repellendus quaerat quisquam facilis esse.', '2015-07-06 03:07:03'),
(3, 'News 3', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti in eius, numquam quae expedita, ipsam vel eveniet id porro dignissimos, ipsa animi dolore tempora pariatur repellendus quaerat quisquam facilis esse.', '2015-07-06 02:23:16'),
(4, 'News 4', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti in eius, numquam quae expedita, ipsam vel eveniet id porro dignissimos, ipsa animi dolore tempora pariatur repellendus quaerat quisquam facilis esse.', '2015-07-06 04:19:21');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_datetime` datetime NOT NULL,
  `order_confirmed` varchar(10) NOT NULL DEFAULT 'no',
  `order_dostavka` varchar(255) NOT NULL,
  `order_pay` varchar(50) NOT NULL,
  `order_type_pay` varchar(100) NOT NULL,
  `order_fio` text NOT NULL,
  `order_address` text NOT NULL,
  `order_phone` varchar(50) NOT NULL,
  `order_note` text NOT NULL,
  `order_email` varchar(50) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Структура таблицы `reg_admin`
--

CREATE TABLE IF NOT EXISTS `reg_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `fio` text NOT NULL,
  `role` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `view_orders` int(11) NOT NULL DEFAULT '0',
  `accept_orders` int(11) NOT NULL DEFAULT '0',
  `delete_orders` int(11) NOT NULL DEFAULT '0',
  `add_tovar` int(11) NOT NULL DEFAULT '0',
  `edit_tovar` int(11) NOT NULL DEFAULT '0',
  `delete_tovar` int(11) NOT NULL DEFAULT '0',
  `accept_reviews` int(11) NOT NULL DEFAULT '0',
  `delete_reviews` int(11) NOT NULL DEFAULT '0',
  `view_clients` int(11) NOT NULL DEFAULT '0',
  `delete_clients` int(11) NOT NULL DEFAULT '0',
  `add_news` int(11) NOT NULL DEFAULT '0',
  `delete_news` int(11) NOT NULL DEFAULT '0',
  `add_category` int(11) NOT NULL DEFAULT '0',
  `delete_category` int(11) NOT NULL DEFAULT '0',
  `view_admin` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `reg_admin`
--

INSERT INTO `reg_admin` (`id`, `login`, `pass`, `fio`, `role`, `email`, `phone`, `view_orders`, `accept_orders`, `delete_orders`, `add_tovar`, `edit_tovar`, `delete_tovar`, `accept_reviews`, `delete_reviews`, `view_clients`, `delete_clients`, `add_news`, `delete_news`, `add_category`, `delete_category`, `view_admin`) VALUES
(6, 'pwnz22', '8md7udyd2994a44277b1de81ba8d4bc0de3614f42ui6z', 'Rahimov Valijon Begovich', 'Администратор', 'v-rahimov@mail.ru', '+992908990121', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `reg_user`
--

CREATE TABLE IF NOT EXISTS `reg_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `datetime` datetime NOT NULL,
  `ip` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `reg_user`
--

INSERT INTO `reg_user` (`id`, `login`, `pass`, `surname`, `name`, `email`, `phone`, `address`, `datetime`, `ip`) VALUES
(1, 'pwnz22', '8md7udyd2994a44277b1de81ba8d4bc0de3614f42ui6z', 'Rahimov', 'Valijon', 'v-rahimov@Mail.ru', '3423423', 'wefkwofpw', '2015-07-15 14:48:48', '127.0.0.1');

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
  `yes_like` int(11) NOT NULL DEFAULT '1',
  `short_title` varchar(50) NOT NULL,
  PRIMARY KEY (`products_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Дамп данных таблицы `table_products`
--

INSERT INTO `table_products` (`products_id`, `title`, `price`, `brand`, `seo_words`, `seo_description`, `mini_description`, `mini_features`, `image`, `description`, `features`, `datetime`, `new`, `leader`, `sale`, `visible`, `count`, `type_tovara`, `brand_id`, `yes_like`, `short_title`) VALUES
(24, 'ewfwf', 45, 'Помады', 'wefwfe', 'wfwfwfewfewew', '<p>wfwefwfwfw1</p>\r\n', '<p>fwefw fwf ewf wfw fwfwfwfw fwf wfwfwfwfewfwefw fwf ewf wfw fwfwfwfw fwf wfwfwfwfewfwefw fwf ewf wfw fwfwfwfw fwf wfwfwfwfewfwefw fwf ewf wfw fwfwfwfw fwf wfwfwfwfew</p>\r\n\r\n<p>fwefw fwf ewf wfw fwfwfwfw fwf wfwfwfwfew</p>\r\n', 'makeup-2453.jpg', '<p>fwfwfwfwfwfw 2</p>\r\n', '<p>wefwefwfwefwe4</p>\r\n', '0000-00-00 00:00:00', 0, 0, 0, 1, 1, 'makeup', 12, 1, 'wfwfwfw'),
(25, 'Кайал «Ультрамодерн»', 455, 'Карандаши, подводка', 'Кайал «Ультрамодерн»', 'Кайал «Ультрамодерн»', '<p>Придать особую глубину взгляду поможет&nbsp;<strong>кайал &laquo;Ультрамодерн&raquo;</strong>:</p>\r\n', '<p>Придать особую глубину взгляду поможет&nbsp;<strong>кайал &laquo;Ультрамодерн&raquo;</strong>:</p>\r\n\r\n<ul>\r\n	<li>Водостойкая текстура держится более 4 часов.</li>\r\n	<li>Отлично подходит для всех типов кожи.</li>\r\n	<li>Восковая основа без консервантов и минеральных масел, содержит натуральные антиоксиданты.</li>\r\n	<li>Мягкая текстура не раздражает слизистую оболочку глаз, а насыщенные оттенки подойдут к любому макияжу.</li>\r\n</ul>\r\n', 'makeup-2548.png', '', '', '0000-00-00 00:00:00', 0, 0, 0, 1, 1, 'makeup', 9, 2, 'Кайал «Ультрамодерн»'),
(26, 'цацуац', 45454, 'Очищение', 'цуац', 'ацуацууаццу', '', '', 'mans-2673.png', '', '', '0000-00-00 00:00:00', 0, 0, 0, 1, 0, 'mans', 76, 1, 'ацауца');

-- --------------------------------------------------------

--
-- Структура таблицы `table_reviews`
--

CREATE TABLE IF NOT EXISTS `table_reviews` (
  `reviews_id` int(11) NOT NULL AUTO_INCREMENT,
  `products_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `good_reviews` text NOT NULL,
  `bad_reviews` text NOT NULL,
  `comment` text NOT NULL,
  `date` date NOT NULL,
  `moderate` int(11) NOT NULL,
  PRIMARY KEY (`reviews_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Структура таблицы `upload_images`
--

CREATE TABLE IF NOT EXISTS `upload_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `products_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Дамп данных таблицы `upload_images`
--

INSERT INTO `upload_images` (`id`, `products_id`, `image`) VALUES
(1, 12, 'img4.jpg'),
(2, 12, 'img5.jpg'),
(3, 14, 'mobile-325.jpg'),
(4, 14, 'mobile-130.jpg'),
(5, 14, 'mobile-112.jpg'),
(6, 15, 'mobile-330.jpg'),
(7, 15, 'mobile-485.jpg'),
(8, 16, 'mobile-207.jpg'),
(9, 16, 'mobile-171.jpg'),
(10, 25, 'makeup-300.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
