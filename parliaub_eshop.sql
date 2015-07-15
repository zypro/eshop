-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Июл 15 2015 г., 18:48
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `buy_products`
--

INSERT INTO `buy_products` (`buy_id`, `buy_id_order`, `buy_id_product`, `buy_count_product`) VALUES
(3, 3, 16, 1),
(4, 3, 15, 1),
(5, 4, 16, 1),
(6, 4, 15, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=63 ;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`cart_id`, `cart_id_product`, `cart_price`, `cart_count`, `cart_datetime`, `cart_ip`) VALUES
(54, 12, 566, 5, '2015-07-12 23:03:10', '91.231.255.246'),
(61, 16, 3242, 1, '2015-07-15 18:10:20', '127.0.0.1'),
(62, 15, 3242, 1, '2015-07-15 18:10:21', '127.0.0.1');

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(100) NOT NULL,
  `brand` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `type`, `brand`) VALUES
(1, 'mobile', 'Apple'),
(2, 'mobile', 'Samsung'),
(3, 'notebook', 'Asus'),
(4, 'notebook', 'Acer'),
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
(4, 'News 4', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti in eius, numquam quae expedita, ipsam vel eveniet id porro dignissimos, ipsa animi dolore tempora pariatur repellendus quaerat quisquam facilis esse.', '2015-07-06 04:19:21'),
(6, 'цуаца', 'цацацац', '2015-07-15 15:33:01'),
(7, 'ацацац', 'цацацуацауц цу\r\n цу\r\nа ц\r\nауц\r\nа\r\n \r\nца \r\nцуа', '2015-07-15 15:33:07'),
(8, 'ацацац', 'цацацуацауц цу\r\n цу\r\nа ц\r\nауц\r\nа\r\n \r\nца \r\nцуа', '2015-07-15 15:33:42');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_datetime` datetime NOT NULL,
  `order_confirmed` varchar(10) NOT NULL,
  `order_dostavka` varchar(255) NOT NULL,
  `order_pay` varchar(50) NOT NULL,
  `order_type_pay` varchar(100) NOT NULL,
  `order_fio` text NOT NULL,
  `order_address` text NOT NULL,
  `order_phone` varchar(50) NOT NULL,
  `order_note` text NOT NULL,
  `order_email` varchar(50) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`order_id`, `order_datetime`, `order_confirmed`, `order_dostavka`, `order_pay`, `order_type_pay`, `order_fio`, `order_address`, `order_phone`, `order_note`, `order_email`) VALUES
(4, '2015-07-15 18:16:55', 'yes', 'Самовывоз', '', '', 'fewfwf', 'wf', 'wfwfw', 'wfwfwfwfewfw', 'fewf@mail.ru');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `reg_admin`
--

INSERT INTO `reg_admin` (`id`, `login`, `pass`, `fio`, `role`, `email`, `phone`, `view_orders`, `accept_orders`, `delete_orders`, `add_tovar`, `edit_tovar`, `delete_tovar`, `accept_reviews`, `delete_reviews`, `view_clients`, `delete_clients`, `add_news`, `delete_news`, `add_category`, `delete_category`, `view_admin`) VALUES
(4, 'admin', '55tteerr07b432d25170b469b57095ca269bc202fw423fe', 'Rahimov Valijon Begovich', 'Vali', 'v-rahimov@mail.ru', '+992908990121', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(5, 'pwnz222', '55tteerr550de3138dbd63002cd40d25bdb9cd18fw423fe', 'Rahimov Valijon Begovich', 'Administrator', 'v-rahimov@mail.ru22', '+99290899012122', 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

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
(9, 'Мобильный телефон Sony Xperia Z3 Dual (белый)', 545, 'Sony', '', '', 'Водонепроницаемый двухсимочный смартфон Sony Xperia Z3 Dual воплотил в себе изящество дизайна и мощь высоких технологий. Новое творение Sony доказывает: красота долговечна. Ведь ультратонкий алюминиевый каркас с закругленными краями, панели из прочного закаленного стекла и эксклюзивный дизайн кнопки питания придают новому премиум-смартфону престижный элегантный вид. Но внешний вид – это еще не все, не так ли? Именно поэтому в Sony позаботились о сбалансированном симметричном дизайне, чтобы устройство идеально ложилось в руку. А благодаря простому и удобному интерфейсу пользоваться этим смартфоном удивительно комфортно. ', 'Bluetooth   : 4.0  \r\nWi-Fi (802.11)   : a, b, g   , n   , ac\r\nE-mail клиент   : да\r\nСинхронизация с ПК   : да\r\nUSB-хост   : да\r\nРазъем для синхронизации : microUSB\r\nNFC   : да', 'img9.jpg', '', '', '2015-07-07 04:11:14', 0, 0, 0, 1, 7, 'mobile', 6, 1, 'Sony Xperia Z3 Dual'),
(10, 'Мобильный телефон Apple iPhone 6 16GB (темно-серый)', 899, 'Apple', '', '', 'Смартфон Apple iPhone 6 с диагональю дисплея 4,7 дюйма стал не просто больше. Он стал лучше во всех отношениях. Больше, но при этом значительно тоньше (6,9 мм против 7,6 мм у iPhone 5s). Мощнее, но при этом исключительно экономичный. Его гладкая металлическая поверхность плавно переходит в стекло, из которого создан самый передовой среди iPhone дисплей Retina HD. iPhone 6 – это новое поколение iPhone, улучшенное во всех смыслах. ', 'Доступ в Интернет   : GPRS   , EDGE   , 3G   , 4G\r\nBluetooth   : 4.0  \r\nWi-Fi (802.11)   : a, b, g   , n   , ac\r\nE-mail клиент   : да\r\nСинхронизация с ПК   : да\r\nРазъем для синхронизации : Apple Lightning\r\nБеспроводная синхронизация : Да\r\nNFC   : да', 'img10.jpg', '', '', '2015-07-07 07:21:35', 0, 0, 0, 1, 2, 'mobile', 1, 1, ''),
(11, 'Мобильный телефон Apple iPhone 6 64GB (золотистый) ', 988, 'Apple', '', '', 'Смартфон Apple iPhone 6 с диагональю дисплея 4,7 дюйма стал не просто больше. Он стал лучше во всех отношениях. Больше, но при этом значительно тоньше (6,9 мм против 7,6 мм у iPhone 5s). Мощнее, но при этом исключительно экономичный. Его гладкая металлическая поверхность плавно переходит в стекло, из которого создан самый передовой среди iPhone дисплей Retina HD. iPhone 6 – это новое поколение iPhone, улучшенное во всех смыслах. ', 'Доступ в Интернет   : GPRS   , EDGE   , 3G   , 4G\r\nBluetooth   : 4.0  \r\nWi-Fi (802.11)   : a, b, g   , n   , ac\r\nE-mail клиент   : да\r\nСинхронизация с ПК   : да\r\nРазъем для синхронизации : Apple Lightning\r\nБеспроводная синхронизация : Да\r\nNFC   : да', 'img11.jpg', '', '', '0000-00-00 00:00:00', 0, 0, 0, 1, 9, 'mobile', 1, 4, ''),
(12, 'Мобильный телефон Apple iPhone 6 128GB (темно-серый)', 566, 'Apple', '', '', 'Смартфон Apple iPhone 6 с диагональю дисплея 4,7 дюйма стал не просто больше. Он стал лучше во всех отношениях. Больше, но при этом значительно тоньше (6,9 мм против 7,6 мм у iPhone 5s). Мощнее, но при этом исключительно экономичный. Его гладкая металлическая поверхность плавно переходит в стекло, из которого создан самый передовой среди iPhone дисплей Retina HD. iPhone 6 – это новое поколение iPhone, улучшенное во всех смыслах. ', 'Смартфон Apple iPhone 6 с диагональю дисплея 4,7 дюйма стал не просто больше. Он стал лучше во всех отношениях. Больше, но при этом значительно тоньше (6,9 мм против 7,6 мм у iPhone 5s). Мощнее, но при этом ', 'img12.jpg', 'lorem ipsum Производитель : Apple Датчики : G-сенсор , датчик освещенности , датчик приближения , цифровой компас', 'lorem ipsum Производитель : Apple Датчики : G-сенсор , датчик освещенности , датчик приближения , цифровой компас', '2015-07-07 10:30:33', 0, 0, 0, 1, 17, 'mobile', 1, 3, ''),
(13, 'wfwefwfw', 34242, 'Apple', 'wefwfw', 'fewfwfw', '<p>fwefwfwfew</p>\r\n', '<p>fwefwfwfew</p>\r\n', '', '<p>fwefwfwfew</p>\r\n', '<p>fwefwfwfew</p>\r\n', '0000-00-00 00:00:00', 1, 1, 1, 1, 0, 'mobile', 1, 1, ''),
(14, 'APPLE 4s', 544, 'Apple', '', '', '<p>wefw ewf wfwf wef wf ewfwfw f wef wf ewf&nbsp;wefw ewf wfwf wef wf ewfwfw f wef wf ewf&nbsp;wefw ewf wfwf wef wf ewfwfw f wef wf ewf&nbsp;</p>\r\n', '<p>wefw ewf wfwf wef wf ewfwfw f wef wf ewf&nbsp;wefw ewf wfwf wef wf ewfwfw f wef wf ewf&nbsp;wefw ewf wfwf wef wf ewfwfw f wef wf ewf&nbsp;</p>\r\n', 'mobile-1434.jpg', '<p>wefw ewf wfwf wef wf ewfwfw f wef wf ewf&nbsp;wefw ewf wfwf wef wf ewfwfw f wef wf ewf&nbsp;wefw ewf wfwf wef wf ewfwfw f wef wf ewf&nbsp;</p>\r\n', '<p>wefw ewf wfwf wef wf ewfwfw f wef wf ewf&nbsp;wefw ewf wfwf wef wf ewfwfw f wef wf ewf&nbsp;wefw ewf wfwf wef wf ewfwfw f wef wf ewf&nbsp;</p>\r\n', '0000-00-00 00:00:00', 1, 1, 1, 1, 1, 'mobile', 1, 1, ''),
(15, 'fwefwfew', 3242, 'Apple', '', '', '<p>wfwefwfw wef wef wefw</p>\r\n', '<p>wfwefwfw wef wef wefw</p>\r\n', 'mobile-1537.jpg', '<p>wfwefwfw wef wef wefw</p>\r\n', '<p>wfwefwfw wef wef wefw</p>\r\n', '0000-00-00 00:00:00', 1, 1, 1, 1, 0, 'mobile', 1, 1, 'wefwfwfwe'),
(16, 'fwefwfew', 3242, 'Apple', '', '', '<p>wfwefwfw wef wef wefw</p>\r\n', '<p>wfwefwfw wef wef wefw</p>\r\n', 'mobile-1680.jpg', '<p>wfwefwfw wef wef wefw</p>\r\n', '<p>wfwefwfw wef wef wefw</p>\r\n', '0000-00-00 00:00:00', 1, 1, 1, 1, 0, 'mobile', 1, 1, 'wefwfwfwe');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `table_reviews`
--

INSERT INTO `table_reviews` (`reviews_id`, `products_id`, `name`, `good_reviews`, `bad_reviews`, `comment`, `date`, `moderate`) VALUES
(4, 12, 'fwfewf', 'wfwfw', 'fwfwf', 'wfwffewwf', '2015-07-15', 1),
(5, 9, 'wefewfwe', 'fwfwfwfwf', 'wfwfwfwwfw', 'fwfwfwfwfwfw', '2015-07-15', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `upload_images`
--

CREATE TABLE IF NOT EXISTS `upload_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `products_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

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
(9, 16, 'mobile-171.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
