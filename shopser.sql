-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Мар 19 2019 г., 11:49
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
  `basket_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_count` int(11) NOT NULL DEFAULT '1',
  `all_summ` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `basket`
--

INSERT INTO `basket` (`basket_id`, `order_id`, `product_id`, `product_count`, `all_summ`) VALUES
(1, 1, 6, 1, 10000),
(2, 1, 1, 2, 10000),
(3, 2, 3, 2, 6000),
(4, 2, 6, 1, 6000),
(5, 1, 3, 2, 12000),
(6, 10, 3, 1, 6500),
(7, 10, 1, 1, 6500);

-- --------------------------------------------------------

--
-- Структура таблицы `call_back`
--

CREATE TABLE `call_back` (
  `call_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_tel` varchar(255) NOT NULL,
  `date` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `call_back`
--

INSERT INTO `call_back` (`call_id`, `user_name`, `user_tel`, `date`) VALUES
(1, 'asdadf', '3523523523523', '16:50 / 22.02.2019');

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
(3, 'sss', NULL, NULL, NULL, NULL, NULL, NULL, 6),
(16, 'null', 'null', 'null', 'null', 'null', 'null', 'null', 29);

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
  `indificator` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`order_id`, `status_id`, `first_name`, `second_name`, `tel`, `email`, `adress`, `city`, `domofon`, `indificator`) VALUES
(1, 2, 'Sergey', 'Dmitrenko', '89104466651', 'privet@yandex.ru', 'Ул. Рязанский проспект, 85к2 , кв.47', 'Москва', '47к8910', ''),
(2, 1, 'Иван', 'Аносов', '89167642909', 'ivanos@yandex.ru', 'Метро пролетраский проспект', 'Москва', '89к0990', ''),
(3, 1, 'Sergey', 'Proba', '', '', '', '', '', ''),
(4, 1, 'Сергей', 'false', '71241241241', 'false', 'аываы', 'фваыв', 'false', ''),
(5, 1, 'Сергей', 'false', '71241241241', 'false', 'аываы', 'фваыв', 'false', ''),
(6, 1, 'Сергй', 'false', '71241241241', 'false', 'аываы', 'фваыв', 'false', '123'),
(7, 1, 'Сергей', 'ПРобный', '891999249129', 'Какой-то', 'МОсква', 'MOscow', '84k9189', ''),
(8, 1, 'Сергей', 'ПРобный', '891999249129', 'Какой-то', 'МОсква', 'MOscow', '84k9189', ''),
(9, 1, 'Сергей', 'Дмитренко', '79104466651', 'proba@yandex.ru', 'sdfsdf', 'dsfsdfs', 'false', '29vapf3n4c'),
(10, 1, 'Мария', 'Ивановна', '74872929847', 'proba@yandex.ru', 'Ул пушкина дом колотушкина', 'Москва', '47к9298', 'l6ei3kzdxv');

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
(29, 'Новый товар', 0, 0, 'default', 4);

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
  MODIFY `basket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `call_back`
--
ALTER TABLE `call_back`
  MODIFY `call_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `description`
--
ALTER TABLE `description`
  MODIFY `description_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

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
