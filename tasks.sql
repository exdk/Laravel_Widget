-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: mysql-174554.srv.hoster.ru
-- Время создания: Май 09 2022 г., 13:16
-- Версия сервера: 5.6.40
-- Версия PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `srv174554_b63cb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `tasks`
--

INSERT INTO `tasks` (`id`, `description`, `description2`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 'Болгария, София', 'Португалия, Порту', 2, '2022-05-04 11:01:00', '2022-05-04 12:09:29'),
(6, 'Самара', 'Хабаровск', 2, '2022-05-04 12:53:34', '2022-05-04 12:53:34'),
(7, 'Париж', 'Пятигорск', 1, '2022-05-04 14:45:47', '2022-05-04 14:45:47'),
(8, 'Рим', 'Новосибирск', 1, '2022-05-04 14:45:59', '2022-05-04 14:45:59'),
(9, 'Старое аделяково', 'Бикин', 3, '2022-05-04 14:51:17', '2022-05-04 14:51:17'),
(10, 'Бразилиа', 'Сызрань', 1, '2022-05-04 15:21:46', '2022-05-04 15:21:46'),
(11, 'Старое аделяково', 'Макеевка', 1, '2022-05-04 15:28:38', '2022-05-04 15:28:38'),
(12, 'Москва', 'ТВерь', 4, '2022-05-04 16:33:14', '2022-05-04 16:33:14'),
(13, 'Москва', 'ТВерь', 1, '2022-05-05 04:04:46', '2022-05-05 04:04:46'),
(14, 'Италия', 'Россия', 1, '2022-05-08 17:53:58', '2022-05-08 17:53:58');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tasks_user_id_index` (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
