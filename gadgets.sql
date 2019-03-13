-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 13 2019 г., 11:13
-- Версия сервера: 5.6.38
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `gadgets`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Category`
--

CREATE TABLE `Category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Category`
--

INSERT INTO `Category` (`id`, `name`) VALUES
(1, 'phone'),
(2, 'notebook');

-- --------------------------------------------------------

--
-- Структура таблицы `Color`
--

CREATE TABLE `Color` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Color`
--

INSERT INTO `Color` (`id`, `name`) VALUES
(1, 'black'),
(2, 'white'),
(3, 'blue'),
(4, 'red'),
(5, 'grey'),
(6, 'gold');

-- --------------------------------------------------------

--
-- Структура таблицы `Image`
--

CREATE TABLE `Image` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Image`
--

INSERT INTO `Image` (`id`, `name`, `product_id`) VALUES
(1, 'Xiaomi_Redmi_Note_4_1.png', 1),
(2, 'Xiaomi_Redmi_Note_4_2.png', 2),
(3, 'Xiaomi_Redmi_Note_4_3.png', 3),
(4, 'Xiaomi_Redmi_Note_4_4.png', 4),
(5, 'Xiaomi_Redmi_Note_4_5.png', 5),
(6, 'Xiaomi_Mi_7_1.png', 1),
(7, 'Xiaomi_Mi_7_2.png', 2),
(8, 'Xiaomi_Mi_7_3.png', 3),
(9, 'Xiaomi_Mi_7_4.png', 4),
(10, 'Xiaomi_Mi_7_5.png', 5),
(11, 'Huawei_Honor_8_1.png', 1),
(12, 'Huawei_Honor_8_2.png', 2),
(13, 'Huawei_Honor_8_3.png', 3),
(14, 'Huawei_Honor_8_4.png', 4),
(15, 'Huawei_Honor_8_5.png', 5),
(16, 'Xiaomi_Mi_Notebook_Pro_15.6_1.png', 1),
(17, 'Xiaomi_Mi_Notebook_Pro_15.6_2.png', 2),
(18, 'Xiaomi_Mi_Notebook_Pro_15.6_3.png', 3),
(19, 'Xiaomi_Mi_Notebook_Pro_15.6_4.png', 4),
(20, 'Xiaomi_Mi_Notebook_Pro_15.6_5.png', 5),
(21, 'Xiaomi_Mi_Notebook_Air_13.3_1.png', 1),
(22, 'Xiaomi_Mi_Notebook_Air_13.3_2.png', 2),
(23, 'Xiaomi_Mi_Notebook_Air_13.3_3.png', 3),
(24, 'Xiaomi_Mi_Notebook_Air_13.3_4.png', 4),
(25, 'Xiaomi_Mi_Notebook_Air_13.3_5.png', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `Product`
--

CREATE TABLE `Product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `brand` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Product`
--

INSERT INTO `Product` (`id`, `name`, `brand`, `category_id`) VALUES
(1, 'Xiaomi Redmi Note 4', 0, 1),
(2, 'Xiaomi Mi 7', 0, 1),
(3, 'Huawei Honor 8', 1, 1),
(4, 'Xiaomi 15.6 pro', 0, 2),
(5, 'Xiaomi air 13.3', 0, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `ProductToColor`
--

CREATE TABLE `ProductToColor` (
  `product_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ProductToColor`
--

INSERT INTO `ProductToColor` (`product_id`, `color_id`, `quantity`, `price`) VALUES
(1, 1, 1, '14000'),
(1, 3, 3, '15000'),
(1, 2, 3, '13999'),
(1, 4, 4, '14999'),
(1, 5, 1, '15499'),
(1, 6, 5, '12999'),
(2, 1, 1, '13499'),
(2, 5, 3, '19999'),
(2, 6, 5, '11999'),
(3, 1, 1, '10499'),
(3, 2, 3, '31999'),
(3, 3, 2, '23599'),
(3, 4, 4, '24999'),
(4, 1, 3, '124999'),
(5, 1, 4, '89999');

-- --------------------------------------------------------

--
-- Структура таблицы `ProductToSpecification`
--

CREATE TABLE `ProductToSpecification` (
  `product_id` int(11) NOT NULL,
  `specification_id` int(11) NOT NULL,
  `value` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ProductToSpecification`
--

INSERT INTO `ProductToSpecification` (`product_id`, `specification_id`, `value`) VALUES
(1, 1, '2018'),
(1, 2, '15.6 дюйм'),
(1, 1, '2018'),
(1, 2, '7.1'),
(1, 3, '1920*1080'),
(1, 4, '432 ppi'),
(1, 5, 'IPS'),
(1, 6, '16.7 млн'),
(1, 7, 'HiSilicon Kirin 970'),
(1, 8, '8'),
(1, 9, '1.8 ГГц, 2.36 ГГц'),
(1, 10, '10 нм'),
(1, 11, '4'),
(1, 12, '64'),
(1, 13, 'нет'),
(1, 14, '-'),
(1, 15, '-'),
(1, 16, '2'),
(1, 17, '24+16'),
(1, 18, '3840x2160'),
(1, 19, 'Ultra HD 4K'),
(1, 20, '3840x2160/60 кадр/сек.'),
(1, 21, 'есть'),
(1, 22, '24'),
(1, 23, 'GSM 850, GSM 1900, GSM 1800, GSM 900'),
(1, 24, 'WCDMA 800, WCDMA 1900, WCDMA 850'),
(1, 25, 'есть'),
(1, 26, 'Nano-SIM (12.3x8.8x0.67 мм)'),
(1, 27, '2'),
(1, 28, 'USB Type-C'),
(1, 29, 'Mini Jack 3.5 мм'),
(1, 30, 'силиконовый чехол, адаптер питания, USB-кабель, скрепка для извлечения слота SIM-карты, защитная пленка для экрана, документация'),
(1, 31, 'сканер лица, сканер отпечатков пальцев'),
(1, 32, '3400 мАч'),
(1, 33, 'нет'),
(1, 34, '71.2 мм'),
(1, 35, '149.6 мм'),
(1, 36, '7.7 мм'),
(1, 37, '180 г'),
(2, 1, '2016'),
(2, 2, '5.5'),
(2, 3, '1280*720'),
(2, 4, '233 ppi'),
(2, 5, 'TN+film'),
(2, 6, '12.3 млн'),
(2, 7, 'Intel CoffeLake'),
(2, 8, '4'),
(2, 9, '1.2 ГГц, 1.6 ГГц'),
(2, 10, '14 нм'),
(2, 11, '2'),
(2, 12, '32'),
(2, 13, 'есть (универсальный слот SIM + SIM / SIM + microSD)'),
(2, 14, 'microSD'),
(2, 15, '128 ГБ'),
(2, 16, '1'),
(2, 17, '16'),
(2, 18, '2560*1440'),
(2, 19, 'Full HD'),
(2, 20, '1920*1080/30 кадр/сек.'),
(2, 21, 'есть'),
(2, 22, '8'),
(2, 23, 'GSM 850, GSM 1900'),
(2, 24, 'WCDMA 850'),
(2, 25, 'нет'),
(2, 26, 'SIM (23.3x8.10x0.67 мм)'),
(2, 27, '2'),
(2, 28, 'USB Type-C'),
(2, 29, 'Mini Jack 3.5 мм'),
(2, 30, 'USB-кабель, скрепка для извлечения слота SIM-карты, документация'),
(2, 31, 'сканер отпечатков пальцев'),
(2, 32, '4500 мАч'),
(2, 33, 'Есть'),
(2, 34, '75.5 мм'),
(2, 35, '153.6 мм'),
(2, 36, '7.9 мм'),
(2, 37, '168 г'),
(3, 1, '1488'),
(3, 2, '22.8'),
(3, 3, '1920*1080'),
(3, 4, '666 ppi'),
(3, 5, 'Del'),
(3, 6, '6.7 млн'),
(3, 7, 'Snapdragon 632'),
(3, 8, '16'),
(3, 9, '2.8 ГГц, 3.21 ГГц'),
(3, 10, '7 нм'),
(3, 11, '8'),
(3, 12, '128'),
(3, 13, 'нет'),
(3, 14, '-'),
(3, 15, '-'),
(3, 16, '4'),
(3, 17, '24+16+8+4'),
(3, 18, '8000x6400'),
(3, 19, 'Mega Ultra HD 8K'),
(3, 20, '6400*4900/144 кадр/сек.'),
(3, 21, 'нет'),
(3, 22, '-'),
(3, 23, 'GSM 850, GSM 1900, GSM 900'),
(3, 24, 'WCDMA 800, WCDMA 850'),
(3, 25, 'нет'),
(3, 26, 'Nano-SIM (12.3x8.8x0.67 мм)'),
(3, 27, '1'),
(3, 28, 'USB Type-C'),
(3, 29, 'Jack 5.5 мм'),
(3, 30, 'силиконовый чехол'),
(3, 31, 'сканер лица, сканер отпечатков пальцев'),
(3, 32, '2100 мАч'),
(3, 33, 'Есть'),
(3, 34, '171.2 мм'),
(3, 35, '189.6 мм'),
(3, 36, '13.2 мм'),
(3, 37, '2280 г'),
(4, 38, '2017'),
(4, 39, 'Windows 10'),
(4, 40, 'Asus VivoBook D540MB-GQ080T'),
(4, 41, '90NB0IQ1-M01120'),
(4, 42, 'Нет'),
(4, 43, 'Пластик'),
(4, 44, 'Классический'),
(4, 45, 'Есть'),
(4, 46, 'Нет'),
(4, 47, 'TN+film'),
(4, 48, '15.6\"'),
(4, 49, '1366*768'),
(4, 50, 'HD'),
(4, 51, '101 PPI'),
(4, 52, '144 Гц'),
(4, 53, 'NVIDIA G-SYNC'),
(4, 54, 'Матовое'),
(4, 55, 'Да'),
(4, 56, 'Intel'),
(4, 57, 'Intel Core i9'),
(4, 58, 'Core i9 8950HK'),
(4, 59, '6'),
(4, 60, '2.9 ГГц'),
(4, 61, '4.8 ГГц'),
(4, 62, '1.5 Мб'),
(4, 63, '12 Мб'),
(4, 64, 'Coffee Lake H'),
(4, 65, '14 нм'),
(4, 66, 'DDR4'),
(4, 67, '2400 МГц'),
(4, 68, '32 ГБ'),
(4, 69, '4'),
(4, 70, '512 Гб'),
(4, 71, 'дискретный и встроенный'),
(4, 72, 'Intel'),
(4, 73, 'GeForce GTX 1080'),
(4, 74, 'GDDR5'),
(4, 75, '8 Гб'),
(4, 76, 'Intel UHD Graphics 630'),
(4, 77, 'нет'),
(4, 78, '1000 Гб'),
(4, 79, '512 Гб'),
(4, 80, 'нет'),
(4, 81, 'один HDD + один SSD'),
(4, 82, 'нет'),
(4, 83, 'есть'),
(4, 84, 'есть'),
(4, 85, 'нет'),
(4, 86, 'есть'),
(4, 87, 'SD, SDHC, SDXC'),
(4, 88, 'нет'),
(4, 89, 'Wi-fi'),
(4, 90, '802.11ac/a/b/g/n'),
(4, 91, 'нет'),
(4, 92, 'Bluetooth 4.2'),
(4, 93, 'нет'),
(4, 94, 'нет'),
(4, 95, '4'),
(4, 96, 'Thunderbolt 3 x4'),
(4, 97, '3.5 мм jack (наушники)'),
(4, 98, 'нет'),
(4, 99, 'Li-Pol'),
(4, 100, '10 ч'),
(4, 101, 'документация, адаптер питания USB-C, кабель USB-C для зарядки (2 м)'),
(4, 102, 'нет'),
(4, 103, 'нет'),
(4, 104, '240.7 мм'),
(4, 105, '349.3 мм'),
(4, 106, '15.5 мм'),
(4, 107, '1.83 кг'),
(5, 38, '2019'),
(5, 39, 'Windows 7'),
(5, 40, 'ASUS ROG Strix SCAR II GL504GW-ES057T'),
(5, 41, '90NR01C1-M01320'),
(5, 42, 'Да'),
(5, 43, 'Металл/пластик'),
(5, 44, 'Классический'),
(5, 45, 'Есть'),
(5, 46, 'Нет'),
(5, 47, 'IPS'),
(5, 48, '17.7\"'),
(5, 49, '1920*1080'),
(5, 50, 'Full HD'),
(5, 51, '141 PPI'),
(5, 52, '60 Гц'),
(5, 53, 'NVIDIA G-SYNC'),
(5, 54, 'Матовое'),
(5, 55, 'Нет'),
(5, 56, 'Intel'),
(5, 57, 'Intel Core i7'),
(5, 58, 'Core i7 8750H'),
(5, 59, '8'),
(5, 60, '2.2 ГГц'),
(5, 61, '4.1 ГГц'),
(5, 62, '1.5 Мб'),
(5, 63, '9 Мб'),
(5, 64, 'Coffee Lake H'),
(5, 65, '7 нм'),
(5, 66, 'DDR3'),
(5, 67, '2666 МГц'),
(5, 68, '16 ГБ'),
(5, 69, '2'),
(5, 70, '256 Гб'),
(5, 71, 'дискретный и встроенный'),
(5, 72, 'nVidia'),
(5, 73, 'GeForce GTX 2070'),
(5, 74, 'GDDR6'),
(5, 75, '8 Гб'),
(5, 76, 'Intel UHD Graphics 630'),
(5, 77, 'да'),
(5, 78, 'нет'),
(5, 79, '1024 Гб'),
(5, 80, 'нет'),
(5, 81, 'только SSD'),
(5, 82, 'нет'),
(5, 83, 'есть'),
(5, 84, 'есть'),
(5, 85, 'нет'),
(5, 86, 'есть'),
(5, 87, 'SD, SDHC, SDXC'),
(5, 88, 'нет'),
(5, 89, 'Wi-fi'),
(5, 90, '802.11ac'),
(5, 91, 'встроенный'),
(5, 92, 'Bluetooth'),
(5, 93, 'нет'),
(5, 94, '3'),
(5, 95, '1'),
(5, 96, 'mini DisplayPort, HDMI'),
(5, 97, '3.5 мм jack (микрофон/аудио'),
(5, 98, 'нет'),
(5, 99, 'Li-Ion'),
(5, 100, '8 ч'),
(5, 101, 'документация, блок питания, мышь'),
(5, 102, 'нет'),
(5, 103, 'есть'),
(5, 104, '262 мм'),
(5, 105, '361 мм'),
(5, 106, '26.1 мм'),
(5, 107, '2.4 кг');

-- --------------------------------------------------------

--
-- Структура таблицы `Specification`
--

CREATE TABLE `Specification` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Specification`
--

INSERT INTO `Specification` (`id`, `name`, `category_id`) VALUES
(1, 'year_of_issue', 1),
(2, 'screen_diagonal', 1),
(3, 'screen resolution', 1),
(4, 'pixel density', 1),
(5, 'screen manufacturing technology', 1),
(6, 'number of screen colors', 1),
(7, 'processor model', 1),
(8, 'number of cores', 1),
(9, 'cpu frequency', 1),
(10, 'technical process', 1),
(11, 'ram size', 1),
(12, 'amount of internal memory', 1),
(13, 'expansion slot', 1),
(14, 'types of supported memory cards', 1),
(15, 'maximum memory card capacity', 1),
(16, 'number of main cameras', 1),
(17, 'number of megapixels of the main', 1),
(18, 'resolution of images', 1),
(19, 'video format', 1),
(20, 'video resolution and frame rate', 1),
(21, 'front camera', 1),
(22, 'number of megapixels of the front', 1),
(23, '2g network support', 1),
(24, '3g network support', 1),
(25, '4g network support', 1),
(26, 'sim card format', 1),
(27, 'number of sim cards', 1),
(28, 'interface', 1),
(29, 'headphone jack', 1),
(30, 'completion', 1),
(31, 'biometric protection', 1),
(32, 'battery capacity', 1),
(33, 'wireless charging support', 1),
(34, 'width', 1),
(35, 'height', 1),
(36, 'thickness', 1),
(37, 'weight', 1),
(38, 'year of issue', 2),
(39, 'operating system', 2),
(40, 'model', 2),
(41, 'manufacturer code', 2),
(42, 'gaming laptop', 2),
(43, 'body material', 2),
(44, 'design', 2),
(45, 'numeric keypad block', 2),
(46, 'key illumination', 2),
(47, 'screen type', 2),
(48, 'screen diagonal', 2),
(49, 'screen resolution', 2),
(50, 'format name', 2),
(51, 'pixel density', 2),
(52, 'maximum screen refresh rate', 2),
(53, 'screen dynamic update technology', 2),
(54, 'screen cover', 2),
(55, 'touch screen', 2),
(56, 'processor manufacturer', 2),
(57, 'processor line', 2),
(58, 'processor model', 2),
(59, 'the number of processor cores', 2),
(60, 'frequency', 2),
(61, 'automatic frequency increase', 2),
(62, 'l2 cache', 2),
(63, 'l3 cache', 2),
(64, 'processor architecture', 2),
(65, 'technological process', 2),
(66, 'type of ram', 2),
(67, 'ram frequency', 2),
(68, 'ram size', 2),
(69, 'the number of slots for memory modules', 2),
(70, 'maximum memory capacity', 2),
(71, 'view graphics accelerator', 2),
(72, 'video chip manufacturer', 2),
(73, 'model of a discrete video card', 2),
(74, 'type of video memory', 2),
(75, 'video memory capacity', 2),
(76, 'built-in video card model', 2),
(77, 'crossfire / sli array', 2),
(78, 'total hard disk drive (hdd)', 2),
(79, 'total solid state drives (ssd)', 2),
(80, 'sshd drive (ssd buffer size)', 2),
(81, 'drive configuration', 2),
(82, 'intel optane storage size', 2),
(83, 'connector m.2', 2),
(84, 'webcam', 2),
(85, 'extended speaker system', 2),
(86, 'built-in microphone', 2),
(87, 'memory card support by card reader', 2),
(88, 'optical drive', 2),
(89, 'wireless internet access', 2),
(90, 'wi-fi standard', 2),
(91, 'network adapter view (ethernet)', 2),
(92, 'support for additional data types', 2),
(93, 'usb 2.0 ports', 2),
(94, 'usb ports 3.x', 2),
(95, 'usb type-c ports', 2),
(96, 'video interfaces', 2),
(97, 'audio interfaces', 2),
(98, 'additional interfaces', 2),
(99, 'battery type', 2),
(100, 'approximate battery life', 2),
(101, 'equipment', 2),
(102, 'fingerprint scanner', 2),
(103, 'kensington castle', 2),
(104, 'depth', 2),
(105, 'width', 2),
(106, 'thickness', 2),
(107, 'weight', 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Category`
--
ALTER TABLE `Category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `Color`
--
ALTER TABLE `Color`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `Image`
--
ALTER TABLE `Image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Индексы таблицы `Product`
--
ALTER TABLE `Product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Индексы таблицы `ProductToColor`
--
ALTER TABLE `ProductToColor`
  ADD KEY `producttocolor_ibfk_1` (`color_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Индексы таблицы `ProductToSpecification`
--
ALTER TABLE `ProductToSpecification`
  ADD KEY `product_id` (`product_id`),
  ADD KEY `specification_id` (`specification_id`);

--
-- Индексы таблицы `Specification`
--
ALTER TABLE `Specification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Category`
--
ALTER TABLE `Category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `Color`
--
ALTER TABLE `Color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `Image`
--
ALTER TABLE `Image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `Product`
--
ALTER TABLE `Product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `Specification`
--
ALTER TABLE `Specification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `Image`
--
ALTER TABLE `Image`
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `Product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `Product`
--
ALTER TABLE `Product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `Category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `ProductToColor`
--
ALTER TABLE `ProductToColor`
  ADD CONSTRAINT `producttocolor_ibfk_1` FOREIGN KEY (`color_id`) REFERENCES `Color` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `producttocolor_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `Product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `ProductToSpecification`
--
ALTER TABLE `ProductToSpecification`
  ADD CONSTRAINT `producttospecification_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `Product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `producttospecification_ibfk_2` FOREIGN KEY (`specification_id`) REFERENCES `Specification` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `Specification`
--
ALTER TABLE `Specification`
  ADD CONSTRAINT `specification_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `Category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
