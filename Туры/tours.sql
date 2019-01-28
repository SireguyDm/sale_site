-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Окт 19 2018 г., 08:12
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
-- База данных: `tours`
--

-- --------------------------------------------------------

--
-- Структура таблицы `hotels`
--

CREATE TABLE `hotels` (
  `hotel_id` int(4) NOT NULL,
  `hotel_name` varchar(128) CHARACTER SET utf8 NOT NULL,
  `hotel_country` varchar(32) CHARACTER SET utf8 NOT NULL,
  `hotel_city` varchar(32) CHARACTER SET utf8 NOT NULL,
  `description` varchar(164) CHARACTER SET utf8mb4 NOT NULL COMMENT '<164',
  `stars` int(1) NOT NULL,
  `rating` float NOT NULL,
  `cost` int(16) NOT NULL,
  `img` varchar(64) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `hotels`
--

INSERT INTO `hotels` (`hotel_id`, `hotel_name`, `hotel_country`, `hotel_city`, `description`, `stars`, `rating`, `cost`, `img`) VALUES
(1, 'Elegance East Hotel', 'Turkey', 'Antalya', '', 3, 3.9, 6795, '1.jpg'),
(2, 'Prime Boutique Hotel', 'Turkey', 'Antalya', '', 3, 3.7, 5995, '2.jpg'),
(3, 'Akra Hotel', 'Turkey', 'Antalya', '', 4, 4.2, 8395, '3.jpg'),
(4, 'White Garden Hotel', 'Turkey', 'Bodrum', '', 5, 4.4, 9493, '4.jpg'),
(5, 'Queen Boutique Hotel', 'Turkey', 'Bodrum', '', 4, 3.8, 11195, '5.jpg'),
(6, 'Novotel Phuket Surin Beach Resort', 'Thailand', 'Phuket', '', 4, 4.6, 4195, '6.jpg'),
(7, 'Katathani Phuket Beach Resort', 'Thailand', 'Phuket', '', 5, 4.1, 10145, '7.jpg'),
(8, 'Swissotel Resort Phuket Kamala Beach', 'Thailand', 'Phuket', '', 4, 4.3, 6145, '8.jpg'),
(9, 'HI YHA Thewet', 'Thailand', 'Bangkok', '', 3, 3.3, 1845, '9.jpg'),
(10, 'Bangkok Story', 'Thailand', 'Bangkok', '', 2, 3.6, 2237, '10.jpg'),
(11, 'Palazzo Paruta', 'Italy', 'Venezia', '', 4, 4.6, 22577, '11.jpg'),
(12, 'NH Collection Venezia Palazzo Barocci', 'Italy', 'Venezia', '', 4, 4.3, 37277, '12.jpg'),
(13, 'Hotel Ai Reali - Small Luxury Hotels of the World', 'Italy', 'Venezia', '', 4, 4.8, 32277, '13.jpg'),
(14, 'Hotel Ai Reali - Small Luxury Hotels of the World', 'Italy', 'Roma', '', 5, 4.7, 25236, '14.jpg'),
(15, 'Grand Hotel de La Minerve', 'Italy', 'Roma', '', 5, 4.3, 31224, '15.jpg'),
(16, 'Dorada Palace', 'Spain', 'Salou', '', 4, 4.7, 4164, '16.jpg'),
(17, 'Hotel Portaventura - Theme Park Tickets Included', 'Spain', 'Salou', '', 4, 4.2, 10234, '17.jpg'),
(18, 'Magnolia Hotel Salou - Adults Only', 'Spain', 'Salou', '', 2, 3.2, 3025, '18.jpg'),
(19, 'Blaumar Hotel Salou', 'Spain', 'Salou', '', 4, 4.1, 6845, '19.jpg'),
(20, 'Estival Park Hotel', 'Spain', 'Salou', '', 5, 4.3, 14363, '20.jpg'),
(21, 'Hilton Hurghada Resort', 'Egypt', 'Hurghada', '', 5, 4.7, 7363, '21.jpg'),
(22, 'Mercure Hurghada Hotel', 'Egypt', 'Hurghada', '', 4, 4.2, 6563, '22.jpg'),
(23, 'Hurghada Marriott Beach Resort', 'Egypt', 'Hurghada', '', 5, 4.5, 12513, '23.jpg'),
(24, 'Jaz Aquaviva', 'Egypt', 'Hurghada', '', 5, 4.5, 12453, '24.jpg'),
(25, 'Minamark Resort & Spa', 'Egypt', 'Hurghada', '', 4, 2.9, 3453, '25.jpg'),
(26, 'Apollonia Beach Resort & Spa', 'Greece', 'Heraklion', '', 5, 4.9, 17359, '26.jpg'),
(27, 'Hotel Georgia', 'Greece', 'Heraklion', '', 3, 3.6, 3312, '27.jpg'),
(28, 'Agapi Beach Resort', 'Greece', 'Heraklion', '', 4, 4.1, 8247, '28.jpg'),
(29, 'Galaxy Hotel Iraklio', 'Greece', 'Heraklion', '', 5, 3.7, 10321, '29.jpg'),
(30, 'Capsis Astoria Heraklion Hotel', 'Greece', 'Heraklion', '', 4, 4.4, 7241, '30.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`hotel_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `hotels`
--
ALTER TABLE `hotels`
  MODIFY `hotel_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
