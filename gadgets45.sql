-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 08 2019 г., 11:33
-- Версия сервера: 10.3.13-MariaDB
-- Версия PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `gadgets45`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'smartphones'),
(2, 'notebooks');

-- --------------------------------------------------------

--
-- Структура таблицы `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `color`
--

INSERT INTO `color` (`id`, `name`) VALUES
(1, 'standart'),
(2, 'white'),
(3, 'blue'),
(4, 'red'),
(5, 'grey'),
(6, 'gold'),
(7, 'black');

-- --------------------------------------------------------

--
-- Структура таблицы `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `product_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `is_main` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `image`
--

INSERT INTO `image` (`id`, `name`, `product_id`, `color_id`, `is_main`) VALUES
(1, 'Xiaomi_Redmi_Note_4_1.png', 1, 7, 1),
(2, 'Xiaomi_Redmi_Note_4_2.png', 1, 7, NULL),
(3, 'Xiaomi_Redmi_Note_4_3.png', 1, 2, 1),
(4, 'Xiaomi_Redmi_Note_4_4.png', 1, 2, NULL),
(6, 'Xiaomi_Mi_7_1.png', 2, 6, 1),
(7, 'Xiaomi_Mi_7_2.png', 2, 4, 1),
(8, 'Xiaomi_Mi_7_3.png', 2, 3, 1),
(9, 'Xiaomi_Mi_7_4.png', 2, 3, NULL),
(11, 'Huawei_Honor_8_1.png', 3, 4, 1),
(12, 'Huawei_Honor_8_2.png', 3, 4, NULL),
(13, 'Huawei_Honor_8_3.png', 3, 2, 1),
(14, 'Huawei_Honor_8_4.png', 3, 2, NULL),
(16, 'Xiaomi_Mi_Notebook_Pro_15.6_1.png', 4, 1, 1),
(17, 'Xiaomi_Mi_Notebook_Pro_15.6_2.png', 4, 3, NULL),
(18, 'Xiaomi_Mi_Notebook_Pro_15.6_3.png', 4, 7, 1),
(19, 'Xiaomi_Mi_Notebook_Pro_15.6_4.png', 4, 7, NULL),
(21, 'Xiaomi_Mi_Notebook_Air_13.3_1.png', 5, 1, 1),
(22, 'Xiaomi_Mi_Notebook_Air_13.3_2.png', 5, 1, NULL),
(23, 'Xiaomi_Mi_Notebook_Air_13.3_3.png', 5, 1, NULL),
(24, 'Xiaomi_Mi_Notebook_Air_13.3_4.png', 5, 1, NULL),
(25, 'Xiaomi_Redmi_Note_4_3.png', 1, 7, NULL),
(34, 'Xiaomi_Redmi_Note_4_3.png', 1, 2, NULL),
(35, 'Xiaomi_Redmi_Note_4_1.png', 1, 2, NULL),
(36, 'Xiaomi_Redmi_Note_4_2.png', 1, 2, NULL),
(37, 'Xiaomi_Redmi_Note_4_4.png', 1, 2, NULL),
(38, 'Xiaomi_Redmi_Note_4_2.png', 1, 6, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_street` varchar(100) NOT NULL,
  `customer_home_number` varchar(100) NOT NULL,
  `customer_entrance` int(11) NOT NULL,
  `customer_apartment` varchar(100) NOT NULL,
  `customer_phone` varchar(20) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `customer_comment` text NOT NULL,
  `payment_type` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order`
--

INSERT INTO `order` (`id`, `customer_name`, `customer_street`, `customer_home_number`, `customer_entrance`, `customer_apartment`, `customer_phone`, `customer_email`, `customer_comment`, `payment_type`) VALUES
(1, '1', '1', '1', 1, '1', '1', '1', '1', 1),
(2, '1', '1', '2', 3, '1', '1', '1', '1', 1),
(3, '1', '1', '2', 3, '1', '1', '1', '1', 1),
(4, '1', '1', '2', 3, '1', '1', '1', '1', 1),
(5, '1', '1', '2', 3, '1', '1', '1', '1', 1),
(6, '1', '1', '2', 3, '1', '1', '1', '1', 1),
(7, '1', '1', '2', 3, '1', '1', '1', '1', 1),
(8, '1', '1', '2', 3, '1', '1', '1', '1', 1),
(9, '1', '1', '2', 3, '1', '1', '1', '1', 1),
(10, '1', '1', '2', 3, '1', '1', '1', '1', 1),
(11, '1', '1', '2', 3, '1', '1', '1', '1', 1),
(12, '1', '1', '2', 3, '1', '1', '1', '1', 1),
(13, '1', '1', '2', 3, '1', '1', '1', '1', 1),
(14, '1', '1', '2', 3, '1', '1', '1', '1', 1),
(15, '1', '1', '2', 3, '1', '1', '1', '1', 1),
(16, '1', '1', '2', 3, '1', '1', '1', '1', 1),
(17, '1', '1', '2', 3, '1', '1', '1', '1', 1),
(18, '1', '1', '2', 3, '1', '1', '1', '1', 1),
(19, '1', '1', '2', 3, '1', '1', '1', '1', 1),
(20, '1', '1', '2', 3, '1', '1', '1', '1', 1),
(21, '1', '1', '2', 3, '1', '1', '1', '1', 1),
(22, '1', '1', '2', 3, '1', '1', '1', '1', 1),
(23, '1', '1', '2', 3, '1', '1', '1', '1', 1),
(24, '1', '1', '2', 3, '1', '1', '1', '1', 1),
(25, '1', '1', '2', 3, '1', '1', '1', '1', 1),
(26, '1', '1', '2', 3, '1', '1', '1', '1', 1),
(27, '1', '1', '2', 3, '1', '1', '1', '1', 1),
(28, '1', '1', '2', 3, '1', '1', '1', '1', 1),
(29, '1', '1', '2', 3, '1', '1', '1', '1', 1),
(30, '1', '1', '2', 3, '1', '1', '1', '1', 1),
(31, '1', '1', '2', 3, '1', '1', '1', '1', 1),
(32, '1', '1', '2', 3, '1', '1', '1', '1', 1),
(33, '1', '1', '2', 3, '1', '1', '1', '1', 1),
(34, '1', '1', '2', 3, '1', '1', '1', '1', 1),
(35, '1', '1', '2', 3, '1', '1', '1', '1', 1),
(36, '1', '1', '2', 3, '1', '1', '1', '1', 1),
(37, '1', '1', '2', 3, '1', '1', '1', '1', 1),
(38, '1', '1', '2', 3, '1', '1', '1', '1', 1),
(39, '1', '1', '2', 3, '1', '1', '1', '1', 1),
(40, '1', '1', '2', 3, '1', '1', '1', '1', 1),
(41, '1', '1', '2', 3, '1', '1', '1', '1', 1),
(42, '1', '1', '2', 3, '1', '1', '1', '1', 1),
(43, '1', '1', '2', 3, '1', '1', '1', '1', 1),
(44, '1', '1', '2', 3, '1', '1', '1', '1', 1),
(45, '1', '1', '2', 3, '1', '1', '1', '1', 1),
(46, '1', '1', '2', 3, '1', '1', '1', '1', 1),
(47, '1', '1', '2', 3, '1', '1', '1', '1', 1),
(48, '1', '1', '2', 3, '1', '1', '1', '1', 1),
(49, '1', '1', '2', 3, '1', '1', '1', '1', 1),
(50, '1', '1', '2', 3, '1', '1', '1', '1', 1),
(51, '1', '1', '2', 3, '1', '1', '1', '1', 1),
(52, '1', '1', '2', 3, '1', '1', '1', '1', 1),
(53, '1', '1', '2', 3, '1', '1', '1', '1', 1),
(54, '1', '1', '2', 3, '1', '1', '1', '1', 1),
(55, '1', '1', '2', 3, '1', '1', '1', '1', 1),
(56, '1', '1', '2', 3, '1', '1', '1', '1', 1),
(57, '1', '1', '2', 3, '1', '1', '1', '1', 1),
(58, '1', '1', '2', 3, '1', '1', '1', '1', 1),
(59, '1', '321dsa', '2', 3, '1', '1', '1', '1', 1),
(60, '1', 'dsa', '2', 3, '1', '1', '1', '1', 1),
(61, '1', 'dsa', '2', 3, '1', '1', '1', '1', 1),
(62, '1', 'dsa', '2', 3, '1', '1', '1', '1', 1),
(63, '1', 'gsagagdzs321', '2', 3, '1', '1', '1', '1', 1),
(64, '1', 'dsa', '12', 32, '22', '1', '1', '1', 1),
(65, '32', '321', '321', 2, '23', '32', '32@mail.ru', 'dasdsa dasd as da', 1),
(66, '32', '321', '321', 2, '23', '32', '32@mail.ru', 'dasdsa dasd as da', 1),
(67, 'Василий', 'тестовая улица', '777', 12, '32', '77-77-77', 'hoperoina2016@gmail.com', '', 1),
(68, 'Василий', 'тестовая улица', '777', 12, '32', '77-77-77', 'hoperoina2016@gmail.com', '', 1),
(69, 'Василий', 'тестовая улица', '777', 12, '32', '77-77-77', 'hoperoina2016@gmail.com', '', 1),
(70, 'Василий', 'тестовая улица', '777', 12, '32', '77-77-77', 'hoperoina2016@gmail.com', '', 1),
(71, 'Василий', 'тестовая улица', '777', 12, '32', '77-77-77', 'hoperoina2016@gmail.com', '', 1),
(72, 'Василий', 'тестовая улица', '777', 12, '32', '77-77-77', 'hoperoina2016@gmail.com', '', 1),
(73, 'Василий', 'тестовая улица', '777', 12, '32', '77-77-77', 'hoperoina2016@gmail.com', '321', 1),
(74, 'Василий', 'тестовая улица', '777', 12, '32', '77-77-77', 'hoperoina2016@gmail.com', '', 1),
(75, 'Василий', 'тестовая улица', '777', 12, '32', '77-77-77', 'hoperoina2016@gmail.com', '', 1),
(76, 'Василий', 'тестовая улица', '777', 12, '32', '8(321) 321-3123', 'hoperoina2016@gmail.com', 'dsa das dsa', 1),
(77, 'Олег', 'тестовая улица', '777', 12, '32', '8(111) 111-1111', 'hoperoina2016@gmail.com', '', 1),
(78, 'Олег', 'тестовая улица', '777', 12, '32', '8(111) 111-1111', 'hoperoina2016@gmail.com', '', 1),
(79, 'Олег', 'тестовая улица', '777', 12, '32', '8(111) 111-1111', 'hoperoina2016@gmail.com', '', 1),
(80, 'Олег', 'тестовая улица', '777', 12, '32', '8(111) 111-1111', 'hoperoina2016@gmail.com', '', 1),
(81, 'Василий', 'тестовая улица', '777', 12, '32', '8(111) 111-1111', 'hoperoina2016@gmail.com', '12', 1),
(82, 'rtr', 'тестовая улица', '777', 12, '32', '8(333) 333-3311', 'hoperoina2016@gmail.com', '123', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `ordersproducts`
--

CREATE TABLE `ordersproducts` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `ptc_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ordersproducts`
--

INSERT INTO `ordersproducts` (`id`, `order_id`, `ptc_id`, `product_quantity`) VALUES
(1, 45, 11, 4),
(2, 45, 3, 2),
(3, 45, 1, 1),
(4, 46, 11, 4),
(5, 46, 3, 2),
(6, 46, 1, 1),
(7, 47, 11, 4),
(8, 47, 3, 2),
(9, 47, 1, 1),
(10, 48, 11, 4),
(11, 48, 3, 2),
(12, 48, 1, 1),
(13, 49, 11, 4),
(14, 49, 3, 2),
(15, 49, 1, 1),
(16, 50, 11, 4),
(17, 50, 3, 2),
(18, 50, 1, 1),
(19, 51, 11, 4),
(20, 51, 3, 2),
(21, 51, 1, 1),
(22, 52, 11, 4),
(23, 52, 3, 2),
(24, 52, 1, 1),
(25, 53, 11, 4),
(26, 53, 3, 2),
(27, 53, 1, 1),
(28, 54, 11, 4),
(29, 54, 3, 2),
(30, 54, 1, 1),
(31, 55, 11, 4),
(32, 55, 3, 2),
(33, 55, 1, 1),
(34, 56, 11, 4),
(35, 56, 3, 2),
(36, 56, 1, 1),
(37, 57, 11, 4),
(38, 57, 3, 2),
(39, 57, 1, 1),
(40, 58, 11, 4),
(41, 58, 3, 2),
(42, 58, 1, 1),
(43, 59, 11, 4),
(44, 59, 3, 2),
(45, 59, 1, 1),
(46, 60, 11, 4),
(47, 60, 3, 2),
(48, 60, 1, 1),
(49, 61, 11, 4),
(50, 61, 3, 2),
(51, 61, 1, 1),
(52, 62, 11, 4),
(53, 62, 3, 2),
(54, 62, 1, 1),
(55, 63, 11, 4),
(56, 63, 3, 2),
(57, 63, 1, 1),
(58, 64, 14, 4),
(59, 64, 6, 2),
(60, 65, 14, 4),
(61, 65, 6, 2),
(62, 66, 14, 4),
(63, 66, 6, 2),
(64, 67, 14, 4),
(65, 67, 6, 2),
(66, 68, 14, 4),
(67, 68, 6, 2),
(68, 69, 14, 4),
(69, 69, 6, 2),
(70, 70, 14, 4),
(71, 70, 6, 2),
(72, 71, 14, 4),
(73, 71, 6, 2),
(74, 72, 14, 4),
(75, 72, 6, 2),
(76, 73, 14, 5),
(77, 73, 6, 1),
(78, 73, 11, 2),
(79, 74, 14, 5),
(80, 74, 6, 1),
(81, 74, 11, 2),
(82, 75, 14, 5),
(83, 75, 6, 1),
(84, 75, 11, 2),
(85, 76, 14, 5),
(86, 76, 6, 1),
(87, 76, 11, 2),
(88, 77, 14, 3),
(89, 77, 6, 1),
(90, 78, 14, 3),
(91, 78, 6, 1),
(92, 79, 14, 3),
(93, 79, 6, 1),
(94, 80, 14, 3),
(95, 80, 6, 1),
(96, 81, 14, 3),
(97, 81, 6, 1),
(98, 82, 9, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `url_name` varchar(250) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description_title` varchar(250) NOT NULL,
  `description_text` varchar(1000) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `url_name`, `name`, `description_title`, `description_text`, `category_id`) VALUES
(1, 'xiaomi-redmi-note-4', 'Xiaomi Redmi Note 4', 'Смартфон Xiaomi Redmi Note 4', '					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod 					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 					quis nostrud exercitation ullamco laboris nisi ut  					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse 					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non 					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1),
(2, 'xiaomi-mi-7', 'Xiaomi Mi 7', 'Смартфон Xiaomi Mi7', '					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod 					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 					quis nostrud exercitation ullamco laboris nisi ut  					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse 					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non 					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1),
(3, 'huawei-honor-8', 'Huawei Honor 8', 'Смартфон Huawei Honor 8', '					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod 					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 					quis nostrud exercitation ullamco laboris nisi ut  					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse 					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non 					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1),
(4, 'xiaomi-15-6-pro', 'Xiaomi 15.6 pro', 'Ноутбук Xiaomi 15.6 pro', '					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod 					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 					quis nostrud exercitation ullamco laboris nisi ut  					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse 					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non 					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 2),
(5, 'xiaomi-air-13-3', 'Xiaomi air 13.3', 'Ноутбук Xiaomi air 13.3', '					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod 					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 					quis nostrud exercitation ullamco laboris nisi ut  					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse 					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non 					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `producttocolor`
--

CREATE TABLE `producttocolor` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `discount_price` decimal(10,0) DEFAULT NULL,
  `is_bestseller` tinyint(1) NOT NULL,
  `is_stock` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `producttocolor`
--

INSERT INTO `producttocolor` (`id`, `product_id`, `color_id`, `quantity`, `price`, `discount_price`, `is_bestseller`, `is_stock`) VALUES
(1, 1, 7, 1, '14900', '13900', 1, 0),
(2, 1, 3, 3, '15000', '15000', 0, 0),
(3, 1, 2, 3, '13999', '13999', 1, 0),
(4, 1, 4, 4, '14999', '14999', 0, 0),
(5, 1, 5, 1, '15499', '15499', 0, 0),
(6, 1, 6, 5, '12999', '12999', 1, 1),
(7, 2, 4, 1, '13499', '11490', 0, 0),
(8, 2, 5, 3, '19999', '19999', 0, 0),
(9, 2, 6, 5, '11999', '11999', 1, 0),
(10, 3, 7, 1, '10499', '9900', 0, 0),
(11, 3, 2, 3, '31999', '28990', 0, 1),
(12, 3, 3, 2, '23599', '23599', 1, 0),
(13, 3, 4, 4, '24999', '24999', 1, 0),
(14, 4, 1, 3, '124999', '114999', 1, 1),
(15, 5, 1, 4, '89999', '89999', 0, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `producttospecification`
--

CREATE TABLE `producttospecification` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `specification_id` int(11) NOT NULL,
  `value` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `producttospecification`
--

INSERT INTO `producttospecification` (`id`, `product_id`, `specification_id`, `value`) VALUES
(3, 1, 109, '2018'),
(4, 1, 2, '7.1'),
(5, 1, 3, '1920*1080'),
(6, 1, 4, '432 ppi'),
(7, 1, 5, 'IPS'),
(8, 1, 6, '16.7 млн'),
(9, 1, 7, 'HiSilicon Kirin 970'),
(10, 1, 8, '8'),
(11, 1, 9, '1.8 ГГц, 2.36 ГГц'),
(12, 1, 10, '10 нм'),
(13, 1, 11, '4'),
(14, 1, 12, '64'),
(15, 1, 13, 'нет'),
(16, 1, 14, '-'),
(17, 1, 15, '-'),
(18, 1, 16, '2'),
(19, 1, 17, '24+16'),
(20, 1, 18, '3840x2160'),
(21, 1, 19, 'Ultra HD 4K'),
(22, 1, 20, '3840x2160/60 кадр/сек.'),
(23, 1, 21, 'есть'),
(24, 1, 22, '24'),
(25, 1, 23, 'GSM 850, GSM 1900, GSM 1800, GSM 900'),
(26, 1, 24, 'WCDMA 800, WCDMA 1900, WCDMA 850'),
(27, 1, 25, 'есть'),
(28, 1, 26, 'Nano-SIM (12.3x8.8x0.67 мм)'),
(29, 1, 27, '2'),
(30, 1, 28, 'USB Type-C'),
(31, 1, 29, 'Mini Jack 3.5 мм'),
(32, 1, 30, 'силиконовый чехол, адаптер питания, USB-кабель, скрепка для извлечения слота SIM-карты, защитная пленка для экрана, документация'),
(33, 1, 31, 'сканер лица, сканер отпечатков пальцев'),
(34, 1, 32, '3400 мАч'),
(35, 1, 33, 'нет'),
(36, 1, 34, '71.2 мм'),
(37, 1, 35, '149.6 мм'),
(38, 1, 36, '7.7 мм'),
(39, 1, 37, '180 г'),
(40, 2, 109, '2016'),
(41, 2, 2, '5.5'),
(42, 2, 3, '1280*720'),
(43, 2, 4, '233 ppi'),
(44, 2, 5, 'TN+film'),
(45, 2, 6, '12.3 млн'),
(46, 2, 7, 'Intel CoffeLake'),
(47, 2, 8, '4'),
(48, 2, 9, '1.2 ГГц, 1.6 ГГц'),
(49, 2, 10, '14 нм'),
(50, 2, 11, '2'),
(51, 2, 12, '32'),
(52, 2, 13, 'есть (универсальный слот SIM + SIM / SIM + microSD)'),
(53, 2, 14, 'microSD'),
(54, 2, 15, '128 ГБ'),
(55, 2, 16, '1'),
(56, 2, 17, '16'),
(57, 2, 18, '2560*1440'),
(58, 2, 19, 'Full HD'),
(59, 2, 20, '1920*1080/30 кадр/сек.'),
(60, 2, 21, 'есть'),
(61, 2, 22, '8'),
(62, 2, 23, 'GSM 850, GSM 1900'),
(63, 2, 24, 'WCDMA 850'),
(64, 2, 25, 'нет'),
(65, 2, 26, 'SIM (23.3x8.10x0.67 мм)'),
(66, 2, 27, '2'),
(67, 2, 28, 'USB Type-C'),
(68, 2, 29, 'Mini Jack 3.5 мм'),
(69, 2, 30, 'USB-кабель, скрепка для извлечения слота SIM-карты, документация'),
(70, 2, 31, 'сканер отпечатков пальцев'),
(71, 2, 32, '4500 мАч'),
(72, 2, 33, 'Есть'),
(73, 2, 34, '75.5 мм'),
(74, 2, 35, '153.6 мм'),
(75, 2, 36, '7.9 мм'),
(76, 2, 37, '168 г'),
(77, 3, 109, '1488'),
(78, 3, 2, '22.8'),
(79, 3, 3, '1920*1080'),
(80, 3, 4, '666 ppi'),
(81, 3, 5, 'Del'),
(82, 3, 6, '6.7 млн'),
(83, 3, 7, 'Snapdragon 632'),
(84, 3, 8, '16'),
(85, 3, 9, '2.8 ГГц, 3.21 ГГц'),
(86, 3, 10, '7 нм'),
(87, 3, 11, '8'),
(88, 3, 12, '128'),
(89, 3, 13, 'нет'),
(90, 3, 14, '-'),
(91, 3, 15, '-'),
(92, 3, 16, '4'),
(93, 3, 17, '24+16+8+4'),
(94, 3, 18, '8000x6400'),
(95, 3, 19, 'Mega Ultra HD 8K'),
(96, 3, 20, '6400*4900/144 кадр/сек.'),
(97, 3, 21, 'нет'),
(98, 3, 22, '-'),
(99, 3, 23, 'GSM 850, GSM 1900, GSM 900'),
(100, 3, 24, 'WCDMA 800, WCDMA 850'),
(101, 3, 25, 'нет'),
(102, 3, 26, 'Nano-SIM (12.3x8.8x0.67 мм)'),
(103, 3, 27, '1'),
(104, 3, 28, 'USB Type-C'),
(105, 3, 29, 'Jack 5.5 мм'),
(106, 3, 30, 'силиконовый чехол'),
(107, 3, 31, 'сканер лица, сканер отпечатков пальцев'),
(108, 3, 32, '2100 мАч'),
(109, 3, 33, 'Есть'),
(110, 3, 34, '171.2 мм'),
(111, 3, 35, '189.6 мм'),
(112, 3, 36, '13.2 мм'),
(113, 3, 37, '2280 г'),
(114, 4, 110, '2017'),
(115, 4, 39, 'Windows 10'),
(116, 4, 40, 'Asus VivoBook D540MB-GQ080T'),
(117, 4, 41, '90NB0IQ1-M01120'),
(118, 4, 42, 'Нет'),
(119, 4, 43, 'Пластик'),
(120, 4, 44, 'Классический'),
(121, 4, 45, 'Есть'),
(122, 4, 46, 'Нет'),
(123, 4, 47, 'TN+film'),
(124, 4, 48, '15.6\"'),
(125, 4, 49, '1366*768'),
(126, 4, 50, 'HD'),
(127, 4, 51, '101 PPI'),
(128, 4, 52, '144 Гц'),
(129, 4, 53, 'NVIDIA G-SYNC'),
(130, 4, 54, 'Матовое'),
(131, 4, 55, 'Да'),
(132, 4, 56, 'Intel'),
(133, 4, 57, 'Intel Core i9'),
(134, 4, 58, 'Core i9 8950HK'),
(135, 4, 59, '6'),
(136, 4, 60, '2.9 ГГц'),
(137, 4, 61, '4.8 ГГц'),
(138, 4, 62, '1.5 Мб'),
(139, 4, 63, '12 Мб'),
(140, 4, 64, 'Coffee Lake H'),
(141, 4, 65, '14 нм'),
(142, 4, 66, 'DDR4'),
(143, 4, 67, '2400 МГц'),
(144, 4, 68, '32 ГБ'),
(145, 4, 69, '4'),
(146, 4, 70, '512 Гб'),
(147, 4, 71, 'дискретный и встроенный'),
(148, 4, 72, 'Intel'),
(149, 4, 73, 'GeForce GTX 1080'),
(150, 4, 74, 'GDDR5'),
(151, 4, 75, '8 Гб'),
(152, 4, 76, 'Intel UHD Graphics 630'),
(153, 4, 77, 'нет'),
(154, 4, 78, '1000 Гб'),
(155, 4, 79, '512 Гб'),
(156, 4, 80, 'нет'),
(157, 4, 81, 'один HDD + один SSD'),
(158, 4, 82, 'нет'),
(159, 4, 83, 'есть'),
(160, 4, 84, 'есть'),
(161, 4, 85, 'нет'),
(162, 4, 86, 'есть'),
(163, 4, 87, 'SD, SDHC, SDXC'),
(164, 4, 88, 'нет'),
(165, 4, 89, 'Wi-fi'),
(166, 4, 90, '802.11ac/a/b/g/n'),
(167, 4, 91, 'нет'),
(168, 4, 92, 'Bluetooth 4.2'),
(169, 4, 93, 'нет'),
(170, 4, 94, 'нет'),
(171, 4, 95, '4'),
(172, 4, 96, 'Thunderbolt 3 x4'),
(173, 4, 97, '3.5 мм jack (наушники)'),
(174, 4, 98, 'нет'),
(175, 4, 99, 'Li-Pol'),
(176, 4, 100, '10 ч'),
(177, 4, 101, 'документация, адаптер питания USB-C, кабель USB-C для зарядки (2 м)'),
(178, 4, 102, 'нет'),
(179, 4, 103, 'нет'),
(180, 4, 104, '240.7 мм'),
(181, 4, 105, '349.3 мм'),
(182, 4, 106, '15.5 мм'),
(183, 4, 107, '1.83 кг'),
(184, 5, 110, '2019'),
(185, 5, 39, 'Windows 7'),
(186, 5, 40, 'ASUS ROG Strix SCAR II GL504GW-ES057T'),
(187, 5, 41, '90NR01C1-M01320'),
(188, 5, 42, 'Да'),
(189, 5, 43, 'Металл/пластик'),
(190, 5, 44, 'Классический'),
(191, 5, 45, 'Есть'),
(192, 5, 46, 'Нет'),
(193, 5, 47, 'IPS'),
(194, 5, 48, '17.7\"'),
(195, 5, 49, '1920*1080'),
(196, 5, 50, 'Full HD'),
(197, 5, 51, '141 PPI'),
(198, 5, 52, '60 Гц'),
(199, 5, 53, 'NVIDIA G-SYNC'),
(200, 5, 54, 'Матовое'),
(201, 5, 55, 'Нет'),
(202, 5, 56, 'Intel'),
(203, 5, 57, 'Intel Core i7'),
(204, 5, 58, 'Core i7 8750H'),
(205, 5, 59, '8'),
(206, 5, 60, '2.2 ГГц'),
(207, 5, 61, '4.1 ГГц'),
(208, 5, 62, '1.5 Мб'),
(209, 5, 63, '9 Мб'),
(210, 5, 64, 'Coffee Lake H'),
(211, 5, 65, '7 нм'),
(212, 5, 66, 'DDR3'),
(213, 5, 67, '2666 МГц'),
(214, 5, 68, '16 ГБ'),
(215, 5, 69, '2'),
(216, 5, 70, '256 Гб'),
(217, 5, 71, 'дискретный и встроенный'),
(218, 5, 72, 'nVidia'),
(219, 5, 73, 'GeForce GTX 2070'),
(220, 5, 74, 'GDDR6'),
(221, 5, 75, '8 Гб'),
(222, 5, 76, 'Intel UHD Graphics 630'),
(223, 5, 77, 'да'),
(224, 5, 78, 'нет'),
(225, 5, 79, '1024 Гб'),
(226, 5, 80, 'нет'),
(227, 5, 81, 'только SSD'),
(228, 5, 82, 'нет'),
(229, 5, 83, 'есть'),
(230, 5, 84, 'есть'),
(231, 5, 85, 'нет'),
(232, 5, 86, 'есть'),
(233, 5, 87, 'SD, SDHC, SDXC'),
(234, 5, 88, 'нет'),
(235, 5, 89, 'Wi-fi'),
(236, 5, 90, '802.11ac'),
(237, 5, 91, 'встроенный'),
(238, 5, 92, 'Bluetooth'),
(239, 5, 93, 'нет'),
(240, 5, 94, '3'),
(241, 5, 95, '1'),
(242, 5, 96, 'mini DisplayPort, HDMI'),
(243, 5, 97, '3.5 мм jack (микрофон/аудио'),
(244, 5, 98, 'нет'),
(245, 5, 99, 'Li-Ion'),
(246, 5, 100, '8 ч'),
(247, 5, 101, 'документация, блок питания, мышь'),
(248, 5, 102, 'нет'),
(249, 5, 103, 'есть'),
(250, 5, 104, '262 мм'),
(251, 5, 105, '361 мм'),
(252, 5, 106, '26.1 мм'),
(253, 5, 107, '2.4 кг'),
(254, 3, 108, 'Android 8.0'),
(255, 1, 108, 'Android 7.0'),
(256, 2, 108, 'Android 5.4'),
(257, 3, 108, 'Android 8.0'),
(258, 1, 108, 'Android 7.0'),
(259, 2, 108, 'Android 5.4'),
(260, 3, 1, 'Huawei'),
(261, 4, 38, 'Xiaomi'),
(262, 5, 38, 'Xiaomi'),
(263, 2, 1, 'Xiaomi'),
(264, 1, 1, 'Xiaomi');

-- --------------------------------------------------------

--
-- Структура таблицы `specification`
--

CREATE TABLE `specification` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `name_ru` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `specifiaction_group` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `specification`
--

INSERT INTO `specification` (`id`, `name`, `name_ru`, `category_id`, `specifiaction_group`) VALUES
(1, 'brand', 'Бренд', 1, 'common'),
(2, 'screen_diagonal', 'Диагональ экрана', 1, 'screen'),
(3, 'screen_resolution', 'Разрешение экрана', 1, 'screen'),
(4, 'pixel_density', 'Плотность пикселей', 1, 'screen'),
(5, 'screen_manufacturing_technology', 'Технология изготовления экрана', 1, 'screen'),
(6, 'number_of_screen_colors', 'Количество цветов экрана', 1, 'screen'),
(7, 'processor_model', 'Модель процессора', 1, 'system'),
(8, 'number_of_processor_cores', 'Количество ядер', 1, 'system'),
(9, 'cpu_frequency', 'Частота процессора', 1, 'system'),
(10, 'technical_process', 'Технический процесс', 1, 'system'),
(11, 'ram_size', 'Оперативная память', 1, 'system'),
(12, 'amount_of_internal_memory', 'Объем встроенной памяти', 1, 'system'),
(13, 'expansion_slot', 'Слот для карты памяти', 1, 'system'),
(14, 'types_of_supported_memory_cards', 'Типы поддерживаемых карт памяти', 1, 'system'),
(15, 'maximum_memory_card_capacity', 'Максимальный объем карты памяти', 1, 'system'),
(16, 'number_of_main_cameras', 'Количество основных камер', 1, 'main_and_front_cameras'),
(17, 'number_of_megapixels_of_the_main', 'Количество мегапикселей основной камеры', 1, 'main_and_front_cameras'),
(18, 'resolution_of_images', 'Разрешение снимков', 1, 'main_and_front_cameras'),
(19, 'video_format', 'Формат видеосъемки', 1, 'main_and_front_cameras'),
(20, 'video_resolution_and_frame_rate', 'Разрешение видео и частота кадров ', 1, 'main_and_front_cameras'),
(21, 'front_camera', 'Наличие фронтальной камеры', 1, 'main_and_front_cameras'),
(22, 'number_of_megapixels_of_the_front', 'Количество мегапикселей основной камеры', 1, 'main_and_front_cameras'),
(23, '2g_network_support', 'Поддержка сетей 2G', 1, 'mobile_connection'),
(24, '3g_network_support', 'Поддержка сетей 3G', 1, 'mobile_connection'),
(25, '4g_network_support', 'Поддержка сетей 4G', 1, 'mobile_connection'),
(26, 'sim_card_format', 'Формат сим-карт', 1, 'mobile_connection'),
(27, 'number_of_sim_cards', 'Количество слотов для сим-карт', 1, 'mobile_connection'),
(28, 'interface', 'Интерфейс', 1, 'wired_interfaces'),
(29, 'headphone_jack', 'Разъем под наушники', 1, 'wired_interfaces'),
(30, 'completion', 'Комплектация', 1, 'equipment'),
(31, 'biometric_protection', 'Защита биометрии (х3 потом исправить)', 1, 'additional_information'),
(32, 'battery_capacity', 'Емкость аккумулятора', 1, 'battery'),
(33, 'wireless_charging_support', 'Возможность беспроводной зарядки', 1, 'battery'),
(34, 'width', 'Ширина', 1, 'dimensions_and_weight'),
(35, 'height', 'Высота', 1, 'dimensions_and_weight'),
(36, 'thickness', 'Толщина', 1, 'dimensions_and_weight'),
(37, 'weight', 'Вес', 1, 'dimensions_and_weight'),
(38, 'brand', 'Бренд', 2, 'common'),
(39, 'operating_system', 'Операционная система', 2, 'classification'),
(40, 'model', 'Модель', 2, 'classification'),
(41, 'manufacturer_code', 'Код производителя', 2, 'classification'),
(42, 'gaming_laptop', 'Игровой ноутбук', 2, 'classification'),
(43, 'body_material', 'Материал корпуса', 2, 'housing_and_input_devices'),
(44, 'design', 'Дизайн', 2, 'housing_and_input_devices'),
(45, 'numeric_keypad_block', 'Цифровой блок клавиатуры', 2, 'housing_and_input_devices'),
(46, 'key_illumination', 'Подсветка клавиш', 2, 'housing_and_input_devices'),
(47, 'screen_type', 'Тип экрана', 2, 'screen'),
(48, 'screen_diagonal', 'Диагональ экрана', 2, 'screen'),
(49, 'screen_resolution', 'Разрешение экрана', 2, 'screen'),
(50, 'format name', 'Название формата', 2, 'screen'),
(51, 'pixel density', 'Плотность пикселей', 2, 'screen'),
(52, 'maximum screen refresh rate', 'Максимальная частота обновления экрана', 2, 'screen'),
(53, 'screen dynamic update technology', 'Технология динамического обновления экрана', 2, 'screen'),
(54, 'screen cover', 'Покрытие экрана', 2, 'screen'),
(55, 'touch screen', 'Сенсорный экран', 2, 'screen'),
(56, 'processor manufacturer', 'Производитель процессора', 2, 'processor'),
(57, 'processor_line', 'Линейка процессора', 2, 'processor'),
(58, 'processor_model', 'Модель процессора', 2, 'processor'),
(59, 'number_of_processor_cores', 'Количество ядер процессора', 2, 'processor'),
(60, 'cpu_frequency', 'Частота процессора', 2, 'processor'),
(61, 'automatic frequency increase', 'Автоматическое увеличение частоты', 2, 'processor'),
(62, 'l2 cache', 'Кэш L2', 2, 'processor'),
(63, 'l3 cache', 'Кэш L3', 2, 'processor'),
(64, 'processor architecture', 'Архитектура процессора', 2, 'processor'),
(65, 'technological process', 'Технологический процесс', 2, 'processor'),
(66, 'type_of_ram', 'Тип оперативной памяти', 2, 'ram_info'),
(67, 'ram_frequency', 'Частота оперативной памяти', 2, 'ram_info'),
(68, 'ram_size', 'Размер оперативной памяти', 2, 'ram_info'),
(69, 'number_of_slots_for_memory_modules', 'Количество слотов под оперативную память', 2, 'ram_info'),
(70, 'maximum_memory_capacity', 'Максимальный объем оперативной памяти', 2, 'ram_info'),
(71, 'type_of_graphics_accelerator', 'Вид графического ускорителя ', 2, 'graphic_accelerator'),
(72, 'video chip manufacturer', 'Производитель видеочипа', 2, 'graphic_accelerator'),
(73, 'model of a discrete video card', 'Модель дискретной видеокарты', 2, 'graphic_accelerator'),
(74, 'type of video memory', 'Тип видеопамяти ', 2, 'graphic_accelerator'),
(75, 'video memory capacity', 'Объем видеопамяти', 2, 'graphic_accelerator'),
(76, 'built-in video card model', 'Модель встроенной видеокарты', 2, 'graphic_accelerator'),
(77, 'crossfire / sli array', 'CrossFire/SLI-массив', 2, 'graphic_accelerator'),
(78, 'total hard disk drive (hdd)', 'Общий объём жестких дисков (HDD)', 2, 'data_storages'),
(79, 'total solid state drives (ssd)', 'Общий объем твердотельных накопителей (SSD)', 2, 'data_storages'),
(80, 'sshd drive (ssd buffer size)', 'SSHD накопитель (объем SSD буфера)', 2, 'data_storages'),
(81, 'drive configuration', 'Конфигурация накопителей', 2, 'data_storages'),
(82, 'intel optane storage size', 'Объем накопителя Intel Optane', 2, 'data_storages'),
(83, 'connector_m2', 'Наличие разъема М2', 2, 'data_storages'),
(84, 'webcam', 'Веб-камера', 2, 'built_in_additional_equipment'),
(85, 'extended speaker system', 'Расширенная акустическая система', 2, 'built_in_additional_equipment'),
(86, 'built-in microphone', 'Встроенный микрофон', 2, 'built_in_additional_equipment'),
(87, 'memory card support by card reader', 'Поддержка карт памяти карт-ридером', 2, 'built_in_additional_equipment'),
(88, 'optical drive', 'Оптический привод ', 2, 'built_in_additional_equipment'),
(89, 'wireless internet access', 'Беспроводные виды доступа в Интернет', 2, 'internet_data_transfer'),
(90, 'wi-fi standard', 'Стандарт Wi-Fi', 2, 'internet_data_transfer'),
(91, 'type_of_network_adapter(ethernet)', 'Вид сетевого адаптера (Ethernet)', 2, 'internet_data_transfer'),
(92, 'support for additional data types', 'Поддержка дополнительных видов передачи данных', 2, 'internet_data_transfer'),
(93, 'usb 2.0 ports', 'Порты USB 2.0', 2, 'interfaces_connectors'),
(94, 'usb ports 3.x', 'Порты USB 3.х', 2, 'interfaces_connectors'),
(95, 'usb type-c ports', 'Порты USB Type-C', 2, 'interfaces_connectors'),
(96, 'video interfaces', 'Видео интерфейсы', 2, 'interfaces_connectors'),
(97, 'audio interfaces', 'Аудио интерфейсы', 2, 'interfaces_connectors'),
(98, 'additional interfaces', 'Дополнительные интерфейсы', 2, 'interfaces_connectors'),
(99, 'battery type', 'Тип аккумулятора', 2, 'battery'),
(100, 'approximate_battery_life', 'Емкость аккумулятора', 2, 'battery'),
(101, 'equipment', 'Комплектация ', 2, 'equipment'),
(102, 'fingerprint scanner', 'Сканер отпечатка пальца', 2, 'additional_information'),
(103, 'kensington castle', 'Кенсингтонский замок', 2, 'additional_information'),
(104, 'depth', 'Глубина ', 2, 'dimensions_and_weight'),
(105, 'width', 'Ширина ', 2, 'dimensions_and_weight'),
(106, 'thickness', 'Толщина', 2, 'dimensions_and_weight'),
(107, 'weight', 'Вес', 2, 'dimensions_and_weight'),
(108, 'operating_system_version', 'Версия операционной системы', 1, 'system'),
(109, 'year_of_issue', 'Год выпуска', 1, 'common'),
(110, 'year_of_issue', 'Год выпуска', 2, 'common');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `image_ibfk_1` (`product_id`),
  ADD KEY `fk_color_id` (`color_id`);

--
-- Индексы таблицы `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ordersproducts`
--
ALTER TABLE `ordersproducts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `ptc_id` (`ptc_id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_ibfk_1` (`category_id`);

--
-- Индексы таблицы `producttocolor`
--
ALTER TABLE `producttocolor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `producttocolor_ibfk_1` (`color_id`),
  ADD KEY `producttocolor_ibfk_2` (`product_id`);

--
-- Индексы таблицы `producttospecification`
--
ALTER TABLE `producttospecification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `producttospecification_ibfk_1` (`product_id`),
  ADD KEY `producttospecification_ibfk_2` (`specification_id`);

--
-- Индексы таблицы `specification`
--
ALTER TABLE `specification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `specification_ibfk_1` (`category_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT для таблицы `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT для таблицы `ordersproducts`
--
ALTER TABLE `ordersproducts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `producttocolor`
--
ALTER TABLE `producttocolor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `producttospecification`
--
ALTER TABLE `producttospecification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=265;

--
-- AUTO_INCREMENT для таблицы `specification`
--
ALTER TABLE `specification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `fk_color_id` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `ordersproducts`
--
ALTER TABLE `ordersproducts`
  ADD CONSTRAINT `ordersproducts_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ordersproducts_ibfk_2` FOREIGN KEY (`ptc_id`) REFERENCES `producttocolor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `producttocolor`
--
ALTER TABLE `producttocolor`
  ADD CONSTRAINT `producttocolor_ibfk_1` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `producttocolor_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `producttospecification`
--
ALTER TABLE `producttospecification`
  ADD CONSTRAINT `producttospecification_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `producttospecification_ibfk_2` FOREIGN KEY (`specification_id`) REFERENCES `specification` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `specification`
--
ALTER TABLE `specification`
  ADD CONSTRAINT `specification_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
