-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Июл 13 2015 г., 16:57
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=75 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `type`, `brand`) VALUES
(1, 'mobile', 'Apple'),
(2, 'mobile', 'Samsung'),
(3, 'notebook', 'Asus'),
(4, 'notebook', 'Acer'),
(5, 'mobile', 'HTC'),
(6, 'mobile', 'Sony'),
(7, 'mobile', 'LG'),
(8, '', '');

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
-- Структура таблицы `reg_admin`
--

CREATE TABLE IF NOT EXISTS `reg_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `reg_admin`
--

INSERT INTO `reg_admin` (`id`, `login`, `pass`) VALUES
(1, 'admin', 'ayh63tmf');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Дамп данных таблицы `table_products`
--

INSERT INTO `table_products` (`products_id`, `title`, `price`, `brand`, `seo_words`, `seo_description`, `mini_description`, `mini_features`, `image`, `description`, `features`, `datetime`, `new`, `leader`, `sale`, `visible`, `count`, `type_tovara`, `brand_id`, `yes_like`, `short_title`) VALUES
(1, 'Мобильный телефон Samsung Galaxy S6 32Gb (черно-синий)', 39934, 'Samsung', '', '', 'Производитель : Samsung Датчики : G-сенсор , датчик освещенности , датчик приближения , цифровой компас Сканер отпечатков пальцев : да Срок ', 'Производитель : Samsung\nДатчики   : G-сенсор   , датчик освещенности   , датчик приближения   , цифровой компас  \nСканер отпечатков пальцев : да\nСрок гарантии : 1 год\nДополнительно : Быстрая зарядка (десять ', 'img1.jpg', '', '0', '2015-07-03 03:16:32', 0, 0, 0, 1, 1, 'mobile', 2, 1, 'Samsung Galaxy S6 32Gb '),
(2, 'Мобильный телефон Apple iPhone 4S 8Gb (черный) ', 3551, 'Apple', '', '', 'lorem ipsum Производитель : Apple Датчики : G-сенсор , датчик освещенности , датчик приближения , цифровой компас', 'Производитель : Apple\nДатчики   : G-сенсор   , датчик освещенности   , датчик приближения   , цифровой компас  \n', 'img2.jpg', '', '', '2015-07-03 04:09:12', 1, 0, 0, 1, 2, 'mobile', 1, 1, 'Apple iPhone 4S 8Gb'),
(3, 'Мобильный телефон LG Leon (титан) ', 7991, 'LG', '', '', '4-ЯДЕРНЫЙ ПРОЦЕССОР 1,3 ГГЦ \r\n\r\nВозможности 4-ядерного процессора помогут вам решить все необходимые задачи в течение дня. Испытайте его скорость работы в многофункциональном режиме. ', 'Wi-Fi (802.11)   : b, g   , n  \r\nE-mail клиент   : да\r\nСинхронизация с ПК   : да\r\nРазъем для синхронизации : microUSB', 'img3.jpg', 'lorem ipsum Производитель : Apple Датчики : G-сенсор , датчик освещенности , датчик приближения , цифровой компас', '', '2015-07-07 07:00:00', 0, 0, 0, 1, 1, 'mobile', 7, 1, ' LG Leon (титан) '),
(4, 'Мобильный телефон Apple iPhone 5s 16Gb как новый (золотистый)', 788, 'Apple', '', '', 'Это ранее использованные изделия Apple, которые проходят заводскую процедуру восстановления, замены корпуса и экрана, прежде чем обрести нового владельца. Все изделия проходят строжайшую процедуру реставрации компанией Apple, упакованы в новую коробку с новым зарядным устройством и наушниками. Вы можете ожидать значительную экономию, полностью функциональное устройство с полным комплектом документации, гарантию производителя 1 год. ', 'Bluetooth   : 4.0  \r\nWi-Fi (802.11)   : a, b, g   , n  \r\nE-mail клиент   : да\r\nСинхронизация с ПК   : да\r\nРазъем для синхронизации : Apple Lightning\r\nБеспроводная синхронизация : Да', 'img5.jpg', '', '', '2015-07-07 06:00:00', 0, 0, 0, 1, 1, 'mobile', 1, 1, 'Apple iPhone 5s 16Gb '),
(5, 'Мобильный телефон Sony Xperia Z1 Compact (черный)', 988, 'Sony', '', '', 'Sony Xperia Z1 Compact сочетает в себе функциональность смартфона премиум-класса с красотой исполнения, идеально умещаясь в ладони. При условии, что все порты и крышки закрыты, устройство целых полчаса без проблем может снимать первоклассные фото и видео на глубине до 1,5 метра. ', 'Модем   : да\r\nBluetooth   : 4.0  \r\nWi-Fi (802.11)   : a, b, g   , n   , ac\r\nE-mail клиент   : да\r\nСинхронизация с ПК   : да\r\nРазъем для синхронизации : microUSB\r\nNFC   : да', 'img4.jpg', '', '', '2015-07-07 04:11:52', 0, 0, 0, 1, 0, 'mobile', 6, 1, ''),
(6, 'Мобильный телефон Sony Xperia Z3 Compact (зеленый)', 566, 'Sony', '', '', 'Sony Xperia Z3 Compact – смартфон, который делает вашу жизнь лучше. Ведь она очень непредсказуема: никогда не знаешь, когда попадешь, скажем, под проливной дождь. Однако благодаря высокому классу защиты от проникновения влаги вода для Xperia Z3 Compact не помеха: вы можете делать снимки в бассейне, использовать его в ливень и даже мыть под проточной водой. Учитывая тонкий и компактный корпус, который легко держать в одной руке, Xperia Z3 Compact – это Android-смартфон, в котором одновременно воплощены прочность и красота. ', 'Модем   : да\r\nBluetooth   : 4.0  \r\nWi-Fi (802.11)   : a, b, g   , n   , ac\r\nE-mail клиент   : да\r\nСинхронизация с ПК   : да\r\nUSB-хост   : да\r\nРазъем для синхронизации : microUSB\r\nNFC   : да', 'img6.jpg', '', '', '2015-07-07 05:12:13', 0, 0, 0, 1, 0, 'mobile', 6, 1, ''),
(7, 'Мобильный телефон Sony Xperia E4g LTE (черный) ', 899, 'Sony', '', '', 'Благодаря тонкому и продуманному до мелочей дизайну Sony Xperia E4g удобен в использовании и комфортно лежит в ладони. А высокое качество исполнения, которым отличаются все продукты Sony, делают этот 4G-смартфон неподвластным времени. ', 'Wi-Fi (802.11)   : да\r\nE-mail клиент   : да\r\nСинхронизация с ПК   : да\r\nРазъем для синхронизации : microUSB\r\nNFC   : да', 'img7.jpg', '', '', '2015-07-07 07:19:20', 0, 0, 0, 1, 1, 'mobile', 6, 1, ''),
(8, 'Мобильный телефон Sony Xperia Z2 (черный)', 988, 'Sony', '', '', 'Водонепроницаемый смартфон Sony Xperia Z2 выполнен в цельном корпусе из алюминия со стеклянными панелями. Благодаря идеально сбалансированному дизайну изображение на Full HD дисплее с диагональю 5,2 дюйма отлично выглядит под любым углом. Основная камера с 20,7 Мп матрицей, которая на 30% крупнее использующихся в смартфонах, по качеству съемки выходит на уровень компактных цифровых камер Sony и, более того, способна снимать видео в формате 4К, то есть в четыре раза четче, чем Full HD. ', 'Модем   : да\r\nBluetooth   : 4.0  \r\nWi-Fi (802.11)   : a, b, g   , n   , ac\r\nE-mail клиент   : да\r\nСинхронизация с ПК   : да\r\nUSB-хост   : да\r\nРазъем для синхронизации : microUSB\r\nNFC   : да', 'img8.jpg', '', '', '2015-07-07 04:14:17', 0, 0, 0, 1, 1, 'mobile', 6, 1, 'Sony Xperia Z2 '),
(9, 'Мобильный телефон Sony Xperia Z3 Dual (белый)', 545, 'Sony', '', '', 'Водонепроницаемый двухсимочный смартфон Sony Xperia Z3 Dual воплотил в себе изящество дизайна и мощь высоких технологий. Новое творение Sony доказывает: красота долговечна. Ведь ультратонкий алюминиевый каркас с закругленными краями, панели из прочного закаленного стекла и эксклюзивный дизайн кнопки питания придают новому премиум-смартфону престижный элегантный вид. Но внешний вид – это еще не все, не так ли? Именно поэтому в Sony позаботились о сбалансированном симметричном дизайне, чтобы устройство идеально ложилось в руку. А благодаря простому и удобному интерфейсу пользоваться этим смартфоном удивительно комфортно. ', 'Bluetooth   : 4.0  \r\nWi-Fi (802.11)   : a, b, g   , n   , ac\r\nE-mail клиент   : да\r\nСинхронизация с ПК   : да\r\nUSB-хост   : да\r\nРазъем для синхронизации : microUSB\r\nNFC   : да', 'img9.jpg', '', '', '2015-07-07 04:11:14', 0, 0, 0, 1, 6, 'mobile', 6, 0, 'Sony Xperia Z3 Dual'),
(10, 'Мобильный телефон Apple iPhone 6 16GB (темно-серый)', 899, 'Apple', '', '', 'Смартфон Apple iPhone 6 с диагональю дисплея 4,7 дюйма стал не просто больше. Он стал лучше во всех отношениях. Больше, но при этом значительно тоньше (6,9 мм против 7,6 мм у iPhone 5s). Мощнее, но при этом исключительно экономичный. Его гладкая металлическая поверхность плавно переходит в стекло, из которого создан самый передовой среди iPhone дисплей Retina HD. iPhone 6 – это новое поколение iPhone, улучшенное во всех смыслах. ', 'Доступ в Интернет   : GPRS   , EDGE   , 3G   , 4G\r\nBluetooth   : 4.0  \r\nWi-Fi (802.11)   : a, b, g   , n   , ac\r\nE-mail клиент   : да\r\nСинхронизация с ПК   : да\r\nРазъем для синхронизации : Apple Lightning\r\nБеспроводная синхронизация : Да\r\nNFC   : да', 'img10.jpg', '', '', '2015-07-07 07:21:35', 0, 0, 0, 1, 2, 'mobile', 1, 1, ''),
(11, 'Мобильный телефон Apple iPhone 6 64GB (золотистый) ', 988, 'Apple', '', '', 'Смартфон Apple iPhone 6 с диагональю дисплея 4,7 дюйма стал не просто больше. Он стал лучше во всех отношениях. Больше, но при этом значительно тоньше (6,9 мм против 7,6 мм у iPhone 5s). Мощнее, но при этом исключительно экономичный. Его гладкая металлическая поверхность плавно переходит в стекло, из которого создан самый передовой среди iPhone дисплей Retina HD. iPhone 6 – это новое поколение iPhone, улучшенное во всех смыслах. ', 'Доступ в Интернет   : GPRS   , EDGE   , 3G   , 4G\r\nBluetooth   : 4.0  \r\nWi-Fi (802.11)   : a, b, g   , n   , ac\r\nE-mail клиент   : да\r\nСинхронизация с ПК   : да\r\nРазъем для синхронизации : Apple Lightning\r\nБеспроводная синхронизация : Да\r\nNFC   : да', 'img11.jpg', '', '', '0000-00-00 00:00:00', 0, 0, 0, 1, 7, 'mobile', 1, 4, ''),
(12, 'Мобильный телефон Apple iPhone 6 128GB (темно-серый)', 566, 'Apple', '', '', 'Смартфон Apple iPhone 6 с диагональю дисплея 4,7 дюйма стал не просто больше. Он стал лучше во всех отношениях. Больше, но при этом значительно тоньше (6,9 мм против 7,6 мм у iPhone 5s). Мощнее, но при этом исключительно экономичный. Его гладкая металлическая поверхность плавно переходит в стекло, из которого создан самый передовой среди iPhone дисплей Retina HD. iPhone 6 – это новое поколение iPhone, улучшенное во всех смыслах. ', 'Смартфон Apple iPhone 6 с диагональю дисплея 4,7 дюйма стал не просто больше. Он стал лучше во всех отношениях. Больше, но при этом значительно тоньше (6,9 мм против 7,6 мм у iPhone 5s). Мощнее, но при этом ', 'img12.jpg', 'lorem ipsum Производитель : Apple Датчики : G-сенсор , датчик освещенности , датчик приближения , цифровой компас', 'lorem ipsum Производитель : Apple Датчики : G-сенсор , датчик освещенности , датчик приближения , цифровой компас', '2015-07-07 10:30:33', 0, 0, 0, 1, 15, 'mobile', 1, 3, '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `table_reviews`
--

INSERT INTO `table_reviews` (`reviews_id`, `products_id`, `name`, `good_reviews`, `bad_reviews`, `comment`, `date`, `moderate`) VALUES
(1, 12, 'Vasa', 'wfwefwfwf w fwef wf wf wf wefwfwefw\r\nfwfwfwfw\r\nfwfwfwfwfwfw\r\nfwfwfwfwfwfw\r\nfwfwfwfwfwfw\r\nfwfwfwfwfwfw\r\nfwfw', 'wfwefwfwf w fwef wf wf wf wefwfwefw\r\nfwfwfwfw\r\nfwfwfwfwfwfw\r\nfwfwfwfwfwfw\r\nfwfwfwfwfwfw\r\nfwfwfwfwfwfw\r\nfwfw', 'wefwfew wefwfew wefwfew wefwfew wefwfew wefwfew wefwfew wefwfew wefwfew wefwfew wefwfew wefwfew wefwfew wefwfew ', '2015-07-07', 1),
(2, 12, 'uvasa', 'wefew', 'fwfwf', 'wfwfw', '2015-07-12', 1),
(3, 12, 'ацац', 'цауаца', 'ацац', '', '2015-07-12', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `upload_images`
--

CREATE TABLE IF NOT EXISTS `upload_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `products_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `upload_images`
--

INSERT INTO `upload_images` (`id`, `products_id`, `image`) VALUES
(1, 12, 'img4.jpg'),
(2, 12, 'img5.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
