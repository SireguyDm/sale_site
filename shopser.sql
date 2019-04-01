-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Апр 01 2019 г., 05:41
-- Версия сервера: 10.1.36-MariaDB
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shopser`
--

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `basket_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_count` int(11) NOT NULL DEFAULT '1',
  `product_summ` int(32) NOT NULL,
  `all_summ` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `basket`
--

INSERT INTO `basket` (`basket_id`, `order_id`, `product_id`, `product_count`, `product_summ`, `all_summ`) VALUES
(1, 1, 6, 1, 3500, 3500),
(2, 1, 1, 2, 7000, 7000),
(3, 2, 3, 2, 0, 6000),
(4, 2, 6, 1, 0, 6000),
(5, 1, 3, 2, 6500, 12000),
(6, 10, 3, 1, 0, 6500),
(7, 10, 1, 1, 0, 6500),
(8, 11, 3, 1, 0, 3500),
(9, 11, 6, 1, 0, 3200),
(10, 12, 3, 1, 0, 9400),
(11, 12, 6, 2, 0, 9400),
(12, 13, 3, 1, 0, 9400),
(13, 13, 6, 2, 0, 9400),
(16, 15, 3, 1, 0, 9400),
(17, 15, 6, 2, 0, 9400),
(18, 16, 3, 1, 0, 0),
(19, 16, 6, 2, 0, 0),
(20, 3, 6, 2, 0, 7000),
(21, 3, 6, 2, 7000, 12000),
(22, 3, 6, 2, 7000, 12000),
(23, 3, 6, 2, 7000, 12000),
(24, 3, 6, 2, 7000, 12000),
(25, 3, 6, 2, 7000, 12000),
(26, 3, 6, 2, 7000, 12000),
(27, 3, 6, 2, 7000, 12000),
(28, 19, 3, 1, 0, 9500),
(29, 19, 6, 2, 0, 9500),
(30, 20, 3, 1, 0, 9500),
(31, 20, 6, 2, 0, 9500),
(32, 21, 6, 3, 10500, 15000),
(33, 21, 3, 2, 4000, 15000),
(34, 22, 6, 3, 10500, 15000),
(35, 22, 3, 2, 4000, 15000),
(36, 23, 6, 2, 7000, 11000),
(37, 23, 3, 2, 4000, 11000);

-- --------------------------------------------------------

--
-- Структура таблицы `call_back`
--

CREATE TABLE `call_back` (
  `call_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_tel` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `call_back`
--

INSERT INTO `call_back` (`call_id`, `user_name`, `user_tel`, `date`) VALUES
(5, 'Сергей', '71241241124', '2019-03-31 16:37:12'),
(6, 'Михаил', '71241241241', '2019-03-31 16:37:21'),
(7, 'Михаил2', '71241241241', '2019-03-31 16:37:24'),
(8, 'Михаил3', '71241241241', '2019-03-31 16:37:26'),
(9, 'Михаил4', '71241241241', '2019-03-31 16:37:27'),
(10, 'Михаил5', '71241241241', '2019-03-31 16:37:29'),
(11, 'Михаил6', '71241241241', '2019-03-31 16:37:30'),
(12, 'Михаил7', '71241241241', '2019-03-31 16:37:32'),
(13, 'Михаил8', '71241241241', '2019-03-31 16:37:34'),
(14, 'Михаил8', '71241241241', '2019-03-31 16:37:37'),
(15, 'Михаил8', '71241241241', '2019-03-31 16:37:37'),
(16, 'Михаил8', '71241241241', '2019-03-31 16:37:37'),
(17, 'Михаил8', '71241241241', '2019-03-31 16:37:38'),
(18, 'Михаил8', '71241241241', '2019-03-31 16:37:38'),
(19, 'Михаил8', '71241241241', '2019-03-31 16:37:38'),
(20, 'Михаил8', '71241241241', '2019-03-31 16:37:38');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `title` varchar(64) NOT NULL,
  `status` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`category_id`, `title`, `status`) VALUES
(1, 'Часы', 'active'),
(2, 'Наушники', 'active'),
(3, 'Рюкзаки', 'active'),
(4, 'Без категории', 'none');

-- --------------------------------------------------------

--
-- Структура таблицы `description`
--

CREATE TABLE `description` (
  `description_id` int(11) NOT NULL,
  `description_zag` varchar(128) DEFAULT NULL,
  `description_p1` varchar(512) DEFAULT NULL,
  `description_p2` varchar(512) DEFAULT NULL,
  `color` varchar(128) DEFAULT NULL,
  `size` varchar(128) DEFAULT NULL,
  `material` varchar(128) DEFAULT NULL,
  `country` varchar(32) DEFAULT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `description`
--

INSERT INTO `description` (`description_id`, `description_zag`, `description_p1`, `description_p2`, `color`, `size`, `material`, `country`, `product_id`) VALUES
(1, 'Женский голографический рюкзак геометрический', 'Он выделит Вас из толпы людей и подчеркнет Вашу индивидуальность. Рюкзак-сумка геометрической формы с голограммой и пластинами-отражателями, меняет цвет в темноте при отражении света от фар, вспышек, на дискотеке.', 'Он выделит Вас из толпы людей и подчеркнет Вашу индивидуальность.', '3D эффект', '42 (ширина) x 32 (высота) x 14 (глубина).', 'Хлопок', 'Китай', 1),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3),
(3, 'sss', NULL, NULL, NULL, NULL, NULL, NULL, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL DEFAULT '1',
  `first_name` varchar(128) NOT NULL,
  `second_name` varchar(128) NOT NULL,
  `tel` varchar(16) NOT NULL,
  `email` varchar(64) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `city` varchar(64) NOT NULL,
  `domofon` varchar(32) NOT NULL,
  `indificator` varchar(11) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`order_id`, `status_id`, `first_name`, `second_name`, `tel`, `email`, `adress`, `city`, `domofon`, `indificator`, `date_created`) VALUES
(1, 2, 'Sergey', 'Dmitrenko', '89104466651', 'privet@yandex.ru', 'Ул. Рязанский проспект, 85к2 , кв.47', 'Москва', '47к8910', '', '2019-03-19 18:28:33'),
(2, 3, 'Иван', 'Аносов', '89167642909', 'ivanos@yandex.ru', 'Метро пролетраский проспект', 'Москва', '89к0990', '', '2019-03-11 10:18:14'),
(3, 4, 'Sergey', 'Proba', '', '', '', '', '', '', '0000-00-00 00:00:00'),
(4, 1, 'Сергей', 'false', '71241241241', 'false', 'аываы', 'фваыв', 'false', '', '0000-00-00 00:00:00'),
(5, 1, 'Сергей', 'false', '71241241241', 'false', 'аываы', 'фваыв', 'false', '', '0000-00-00 00:00:00'),
(6, 1, 'Сергй', 'false', '71241241241', 'false', 'аываы', 'фваыв', 'false', '123', '0000-00-00 00:00:00'),
(7, 1, 'Сергей', 'ПРобный', '891999249129', 'Какой-то', 'МОсква', 'MOscow', '84k9189', '', '0000-00-00 00:00:00'),
(8, 1, 'Сергей', 'ПРобный', '891999249129', 'Какой-то', 'МОсква', 'MOscow', '84k9189', '', '0000-00-00 00:00:00'),
(9, 1, 'Сергей', 'Дмитренко', '79104466651', 'proba@yandex.ru', 'sdfsdf', 'dsfsdfs', 'false', '29vapf3n4c', '0000-00-00 00:00:00'),
(10, 1, 'Мария', 'Ивановна', '74872929847', 'proba@yandex.ru', 'Ул пушкина дом колотушкина', 'Москва', '47к9298', 'l6ei3kzdxv', '2019-03-13 11:22:13'),
(11, 1, 'ccd', 'false', '74124124124', 'false', '124', 'MOsc', 'false', '6g47a1pb3s', '2019-03-21 13:17:11'),
(12, 2, 'ывфыв', 'false', '74124124124', 'false', '2412', '412', '4124ку2312', 'gq23vohcy1', '2019-03-04 06:10:52'),
(13, 1, 'ывфыв', 'false', '74124124124', 'false', '2412', '412', '4124ку2312', '02bp65wlun', '2019-03-16 18:22:46'),
(15, 1, 'Сергей', 'false', '72341241414', 'false', 'random', 'random', 'false', '9pd5avb8l1', '2019-03-19 17:36:16'),
(16, 1, 'Сергей', 'Серго', '71249448484', 'privet@ggig.ru', 'Ул. ПРолетарская, дом. пролетарская', 'Киев', '48к9104', '48b16vd7zp', '2019-03-24 18:22:44'),
(17, 1, 'Сергей', 'Серго', '71249448484', 'privet@ggig.ru', 'Ул. ПРолетарская, дом. пролетарская', 'Киев', '48к9104', 'tszuk9ei0n', '2019-03-24 18:23:55'),
(18, 1, 'sfasf', 'false', '74214214124', 'false', 'asfas', 'fasfasfa', 'false', 'k81wnz349f', '2019-03-24 18:24:26'),
(19, 1, 'sfasf', 'false', '74214214124', 'false', 'asfas', 'fasfasfa', 'false', 'kzelpuhbgf', '2019-03-24 18:26:49'),
(20, 1, 'sfasf', 'false', '74214214124', 'false', 'asfas', 'fasfasfa', 'false', '93qp2lrkui', '2019-03-24 18:29:20'),
(21, 3, 'Владислав', 'Миронов', '72412412412', 'devil@mail.ru', 'Кузьминки', 'Москва', '90к1231', 'a3rcqkbowp', '2019-03-24 18:39:24'),
(22, 3, 'Владислав', 'Миронов', '72412412412', 'devil@mail.ru', 'Кузьминки', 'Москва', '90к1231', 'd30tfwn0e1', '2019-03-24 18:52:43'),
(23, 1, 'asdas', 'false', '72412412412', 'false', 'dasdasdas', 'sdasd', 'false', 'lzdi8s91ah', '2019-03-24 18:53:00');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `cost` int(11) NOT NULL,
  `old_cost` int(11) DEFAULT NULL,
  `img` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`product_id`, `title`, `cost`, `old_cost`, `img`, `category_id`) VALUES
(1, 'Голографический рюкзак', 3500, 4500, 'golo', 3),
(3, 'Avei-7', 2000, 2500, 'avei7', 2),
(6, 'Avei85', 3500, 4500, 'avei7', 1),
(53, 'Новый товар', 0, 0, 'default', 4),
(54, 'Новый товар', 0, 0, 'default', 4),
(55, 'Новый товар', 0, 0, 'default', 4),
(56, 'Новый товар', 0, 0, 'default', 4),
(57, 'Новый товар', 0, 0, 'default', 4),
(58, 'Новый товар', 0, 0, 'default', 4),
(59, 'Новый товар', 0, 0, 'default', 4),
(60, 'Новый товар', 0, 0, 'default', 4),
(61, 'Новый товар', 0, 0, 'default', 4),
(74, 'Новый товар', 0, 0, 'default', 4),
(75, 'Новый товар', 0, 0, 'default', 4),
(76, 'Новый товар', 0, 0, 'default', 4),
(77, 'Новый товар', 0, 0, 'default', 4),
(78, 'Новый товар', 0, 0, 'default', 4),
(79, 'Новый товар', 0, 0, 'default', 4),
(80, 'Новый товар', 0, 0, 'default', 4),
(81, 'Новый товар', 0, 0, 'default', 4),
(82, 'Новый товар', 0, 0, 'default', 4),
(83, 'Новый товар', 0, 0, 'default', 4),
(84, 'Новый товар', 0, 0, 'default', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `status`
--

CREATE TABLE `status` (
  `status_id` int(11) NOT NULL,
  `status_title` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `status`
--

INSERT INTO `status` (`status_id`, `status_title`) VALUES
(1, 'Ожидает'),
(2, 'В пути'),
(3, 'Доставлен'),
(4, 'Отмена'),
(9, 'Потерян');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `login` varchar(64) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `name` varchar(64) NOT NULL,
  `role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `login`, `pass`, `name`, `role`) VALUES
(11, 'admin', '123', 'Сергей', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`basket_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Индексы таблицы `call_back`
--
ALTER TABLE `call_back`
  ADD PRIMARY KEY (`call_id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Индексы таблицы `description`
--
ALTER TABLE `description`
  ADD PRIMARY KEY (`description_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `status_id` (`status_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Индексы таблицы `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `basket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT для таблицы `call_back`
--
ALTER TABLE `call_back`
  MODIFY `call_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `description`
--
ALTER TABLE `description`
  MODIFY `description_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT для таблицы `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `basket`
--
ALTER TABLE `basket`
  ADD CONSTRAINT `basket_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `basket_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Ограничения внешнего ключа таблицы `description`
--
ALTER TABLE `description`
  ADD CONSTRAINT `description_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`);

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
