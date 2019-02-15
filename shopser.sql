-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Фев 15 2019 г., 14:40
-- Версия сервера: 10.1.37-MariaDB
-- Версия PHP: 7.3.0

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
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_count` int(11) NOT NULL DEFAULT '1',
  `all_summ` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `basket`
--

INSERT INTO `basket` (`order_id`, `product_id`, `product_count`, `all_summ`) VALUES
(1, 6, 1, 10000),
(1, 1, 2, 10000);

-- --------------------------------------------------------

--
-- Структура таблицы `call_back`
--

CREATE TABLE `call_back` (
  `call_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_tel` varchar(255) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `call_back`
--

INSERT INTO `call_back` (`call_id`, `user_name`, `user_tel`, `date_created`) VALUES
(1, 'Сергей', '89104466651', '0000-00-00'),
(2, 'Сергей', '89104466651', '0000-00-00'),
(3, 'вфыф', '34323423', '0000-00-00'),
(4, 'da', '31231241', '0000-00-00'),
(6, '', '', '0000-00-00'),
(7, 'Сергей', '89999999999', '0000-00-00');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `title` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`category_id`, `title`) VALUES
(1, 'Часы'),
(2, 'Наушники'),
(3, 'Рюкзаки');

-- --------------------------------------------------------

--
-- Структура таблицы `description`
--

CREATE TABLE `description` (
  `description_id` int(11) NOT NULL,
  `description_zag` varchar(128) NOT NULL,
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
(1, 'Женский голографический рюкзак геометрический', 'Он выделит Вас из толпы людей и подчеркнет Вашу индивидуальность. Рюкзак-сумка геометрической формы с голограммой и пластинами-отражателями, меняет цвет в темноте при отражении света от фар, вспышек, на дискотеке.', 'Он выделит Вас из толпы людей и подчеркнет Вашу индивидуальность.', 'темный, с эффектом 3D.', '42 (ширина) x 32 (высота) x 14 (глубина).', 'Хлопок', 'Китай.', 1);

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
  `city` varchar(64) NOT NULL,
  `domofon` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`order_id`, `status_id`, `first_name`, `second_name`, `tel`, `email`, `city`, `domofon`) VALUES
(1, 1, 'Sergey', 'Dmitrenko', '89104466651', 'privet@yandex.ru', 'Москва', '47к8910');

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
(1, 'Голо-рюкзак', 1650, 0, 'golo', 3),
(3, 'Avei-7', 2000, 2500, 'avei7', 2),
(6, 'Avei85', 3500, 4500, 'avei7', 1);

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
(5, 'Возврат');

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
(1, 'admin', '123', 'Sireguy', 1),
(2, 'valadmin', '123', 'Валентина', 1),
(3, 'sergeyadmin', '321', 'Сергей', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
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
-- AUTO_INCREMENT для таблицы `call_back`
--
ALTER TABLE `call_back`
  MODIFY `call_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `description`
--
ALTER TABLE `description`
  MODIFY `description_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
