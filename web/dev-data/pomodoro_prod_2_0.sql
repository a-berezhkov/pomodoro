-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 14 2022 г., 23:26
-- Версия сервера: 5.7.16
-- Версия PHP: 7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `pomodoro_prod`
--

-- --------------------------------------------------------

--
-- Структура таблицы `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '1', 1519134617);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `id_store` int(11) DEFAULT NULL COMMENT 'Товар',
  `count` int(11) NOT NULL COMMENT 'Количество ящиков',
  `sum` float NOT NULL COMMENT 'Сумма',
  `is_sale` tinyint(1) NOT NULL COMMENT 'По акции? (для аналитики)',
  `profile_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `confirm` tinyint(1) DEFAULT '0' COMMENT 'Подтвержден ли заказ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`id`, `id_store`, `count`, `sum`, `is_sale`, `profile_id`, `created_at`, `updated_at`, `updated_by`, `confirm`) VALUES
(28, 84, 1, 65, 0, 1, '2018-11-16 14:23:06', '2018-11-16 14:23:06', NULL, 0),
(29, 45, 3, 30, 0, 1, '2018-11-16 14:23:06', '2018-11-16 14:23:06', NULL, 0),
(30, 55, 2, 130, 0, 1, '2018-11-16 14:23:06', '2018-11-16 14:23:06', NULL, 0),
(31, 51, 4, 360, 0, 1, '2018-11-16 14:23:06', '2018-11-16 14:23:06', NULL, 0),
(32, 54, 4, 320, 0, 1, '2018-11-16 14:23:06', '2018-11-16 14:23:06', NULL, 0),
(33, 47, 2, 270, 0, 1, '2018-11-16 14:23:06', '2018-11-16 14:23:06', NULL, 0),
(34, 53, 1, 90, 0, 1, '2018-11-16 14:23:06', '2018-11-16 14:23:06', NULL, 0),
(35, 44, 1, 80, 0, 1, '2018-11-16 14:23:06', '2018-11-16 14:23:06', NULL, 0),
(36, 46, 4, 240, 0, 1, '2018-11-16 14:23:06', '2018-11-16 14:23:06', NULL, 0),
(37, 48, 3, 465, 0, 1, '2018-11-16 14:23:06', '2018-11-16 14:23:06', NULL, 0),
(38, 52, 2, 200, 0, 1, '2018-11-16 14:23:06', '2018-11-16 14:23:06', NULL, 0),
(39, 11, 1, 13, 0, 1, '2018-11-19 12:56:48', '2018-11-19 12:56:48', NULL, 0),
(40, 12, 1, 13, 0, 1, '2018-11-19 12:56:48', '2018-11-19 12:56:48', NULL, 0),
(41, 16, 1, 13, 0, 1, '2018-11-19 12:56:48', '2018-11-19 12:56:48', NULL, 0),
(42, 22, 1, 10, 1, 1, '2018-11-19 12:56:48', '2018-11-19 12:56:48', NULL, 0),
(43, 5, 1, 10, 1, 1, '2018-11-19 12:56:48', '2018-11-19 12:56:48', NULL, 0),
(44, 11, 1, 13, 0, 1, '2018-11-19 14:56:52', '2018-11-19 14:56:52', NULL, 0),
(45, 12, 1, 13, 0, 1, '2018-11-19 14:56:52', '2018-11-19 14:56:52', NULL, 0),
(46, 16, 1, 13, 0, 1, '2018-11-19 14:56:52', '2018-11-19 14:56:52', NULL, 0),
(47, 22, 1, 10, 1, 1, '2018-11-19 14:56:52', '2018-11-19 14:56:52', NULL, 0),
(48, 5, 1, 10, 1, 1, '2018-11-19 14:56:52', '2018-11-19 14:56:52', NULL, 0),
(49, 11, 1, 13, 0, 1, '2018-11-19 15:13:01', '2018-11-19 15:13:01', NULL, 0),
(50, 12, 1, 13, 0, 1, '2018-11-19 15:13:01', '2018-11-19 15:13:01', NULL, 0),
(51, 16, 1, 13, 0, 1, '2018-11-19 15:13:01', '2018-11-19 15:13:01', NULL, 0),
(52, 22, 1, 10, 1, 1, '2018-11-19 15:13:01', '2018-11-19 15:13:01', NULL, 0),
(53, 5, 1, 10, 1, 1, '2018-11-19 15:13:01', '2018-11-19 15:13:01', NULL, 0),
(54, 64, 1, 70, 0, 1, '2018-11-20 10:06:59', '2018-11-20 10:06:59', NULL, 0),
(55, 54, 0, 0, 0, 1, '2018-11-20 10:06:59', '2018-11-20 10:06:59', NULL, 0),
(56, 68, 2, 260, 0, 1, '2018-11-20 10:06:59', '2018-11-20 10:06:59', NULL, 0),
(57, 53, 0, 0, 0, 1, '2018-11-20 10:06:59', '2018-11-20 10:06:59', NULL, 0),
(58, 76, 0, 0, 0, 1, '2018-11-20 10:06:59', '2018-11-20 10:06:59', NULL, 0),
(59, 46, 1, 60, 0, 1, '2018-11-20 10:06:59', '2018-11-20 10:06:59', NULL, 0),
(60, 61, 1, 40, 0, 1, '2018-11-20 10:06:59', '2018-11-20 10:06:59', NULL, 0),
(61, 52, 2, 200, 0, 1, '2018-11-20 10:06:59', '2018-11-20 10:06:59', NULL, 0),
(62, 72, 2, 160, 0, 1, '2018-11-20 10:06:59', '2018-11-20 10:06:59', NULL, 0),
(63, 5, 2, 20, 1, 1, '2018-11-20 10:06:59', '2018-11-20 10:06:59', NULL, 0),
(64, 45, 8, 80, 0, 1, '2018-11-20 10:06:59', '2018-11-20 10:06:59', NULL, 0),
(65, 56, 1, 93, 0, 1, '2018-11-20 10:06:59', '2018-11-20 10:06:59', NULL, 0),
(66, 41, 1, 670, 0, 1, '2018-11-20 10:06:59', '2018-11-20 10:06:59', NULL, 0),
(67, 67, 0, 0, 0, 1, '2018-11-20 10:06:59', '2018-11-20 10:06:59', NULL, 0),
(68, 47, 1, 135, 0, 1, '2018-11-20 10:06:59', '2018-11-20 10:06:59', NULL, 0),
(69, 43, 2, 180, 0, 1, '2018-11-20 10:06:59', '2018-11-20 10:06:59', NULL, 0),
(70, 50, 1, 95, 0, 1, '2018-11-20 10:06:59', '2018-11-20 10:06:59', NULL, 0),
(71, 42, 2, 170, 0, 1, '2018-11-20 10:06:59', '2018-11-20 10:06:59', NULL, 0),
(72, 69, 1, 85, 0, 1, '2018-11-20 10:06:59', '2018-11-20 10:06:59', NULL, 0),
(73, 73, 3, 330, 0, 1, '2018-11-20 10:06:59', '2018-11-20 10:06:59', NULL, 0),
(74, 22, 3, 30, 1, 1, '2018-11-20 10:06:59', '2018-11-20 10:06:59', NULL, 0),
(75, 20, 2, 28, 0, 1, '2018-11-21 00:40:59', '2018-11-21 00:40:59', NULL, 0),
(76, 5, 5, 50, 1, 1, '2018-11-21 00:40:59', '2018-11-21 00:40:59', NULL, 0),
(77, 46, 1, 60, 0, 1, '2018-11-22 00:52:32', '2018-11-22 00:52:32', NULL, 0),
(78, 5, 1, 10, 1, 1, '2018-11-22 00:52:32', '2018-11-22 00:52:32', NULL, 0),
(79, 8, 1, 35, 0, 1, '2018-11-22 00:52:32', '2018-11-22 00:52:32', NULL, 0),
(80, 22, 1, 10, 1, 1, '2018-11-22 01:52:03', '2018-11-22 01:52:03', NULL, 0),
(81, 5, 1, 10, 1, 1, '2018-11-22 01:52:03', '2018-11-22 01:52:03', NULL, 0),
(82, 85, 1, 450, 1, 1, '2018-11-22 01:52:03', '2018-11-22 01:52:03', NULL, 0),
(83, 22, 6, 60, 1, 1, '2018-11-22 01:59:15', '2018-11-22 01:59:15', NULL, 0),
(84, 5, 7, 70, 1, 1, '2018-11-22 01:59:15', '2018-11-22 01:59:15', NULL, 0),
(85, 6, 1, 200, 0, 1, '2018-11-22 01:59:15', '2018-11-22 01:59:15', NULL, 0),
(86, 8, 1, 35, 0, 1, '2018-11-22 01:59:15', '2018-11-22 01:59:15', NULL, 0),
(87, 85, 1, 450, 1, 1, '2018-11-22 01:59:15', '2018-11-22 01:59:15', NULL, 0),
(88, 9, 1, 40, 0, 1, '2018-11-22 01:59:15', '2018-11-22 01:59:15', NULL, 0),
(89, 22, 6, 60, 1, 1, '2018-11-22 01:59:23', '2018-11-22 01:59:23', NULL, 0),
(90, 5, 7, 70, 1, 1, '2018-11-22 01:59:23', '2018-11-22 01:59:23', NULL, 0),
(91, 6, 1, 200, 0, 1, '2018-11-22 01:59:23', '2018-11-22 01:59:23', NULL, 0),
(92, 8, 1, 35, 0, 1, '2018-11-22 01:59:23', '2018-11-22 01:59:23', NULL, 0),
(93, 85, 1, 450, 1, 1, '2018-11-22 01:59:23', '2018-11-22 01:59:23', NULL, 0),
(94, 9, 1, 40, 0, 1, '2018-11-22 01:59:23', '2018-11-22 01:59:23', NULL, 0),
(95, 5, 1, 10, 1, 1, '2018-11-22 02:00:45', '2018-11-22 02:00:45', NULL, 0),
(96, 6, 1, 200, 0, 1, '2018-11-22 02:00:45', '2018-11-22 02:00:45', NULL, 0),
(97, 7, 1, 25, 0, 1, '2018-11-22 02:00:45', '2018-11-22 02:00:45', NULL, 0),
(98, 41, 2, 1340, 0, 27, '2018-11-23 15:01:20', '2018-11-23 15:01:20', NULL, 0),
(99, 21, 2, 70, 0, 27, '2018-11-23 15:01:20', '2018-11-23 15:01:20', NULL, 0),
(100, 53, 2, 180, 0, 27, '2018-11-23 15:01:20', '2018-11-23 15:01:20', NULL, 0),
(101, 17, 2, 50, 0, 27, '2018-11-23 15:01:20', '2018-11-23 15:01:20', NULL, 0),
(102, 46, 2, 120, 0, 27, '2018-11-23 15:01:20', '2018-11-23 15:01:20', NULL, 0),
(103, 48, 3, 465, 0, 27, '2018-11-23 15:01:20', '2018-11-23 15:01:20', NULL, 0),
(104, 15, 1, 1300, 0, 27, '2018-11-23 15:01:20', '2018-11-23 15:01:20', NULL, 0),
(105, 18, 3, 600, 0, 27, '2018-11-23 15:01:21', '2018-11-23 15:01:21', NULL, 0),
(106, 41, 1, 670, 0, 29, '2018-11-26 12:50:11', '2018-11-26 12:50:11', NULL, 0),
(107, 42, 4, 340, 0, 29, '2018-11-26 12:50:11', '2018-11-26 12:50:11', NULL, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL COMMENT 'Название категории товаров',
  `image_id` int(11) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Категории товаров';

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `image_id`, `icon`, `position`) VALUES
(1, 'Зелень', 1, 'category-icon-green category-icon-greens', 'bottom'),
(2, 'Орехи', 2, 'category-icon-brown category-icon-nuts', 'bottom'),
(3, 'Овощи заморозка', 3, 'category-icon-blue category-icon-vegetables-froze', 'bottom'),
(4, 'Фрукты заморозка', 4, 'category-icon-blue category-icon-fruits-froze', 'bottom'),
(5, 'Овощи', 6, 'category-icon-red category-icon-vegetables', 'right'),
(6, 'Фрукты', 7, 'category-icon-yellow category-icon-fruits', 'right');

-- --------------------------------------------------------

--
-- Структура таблицы `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL COMMENT 'Название страны'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Страна производства ';

--
-- Дамп данных таблицы `countries`
--

INSERT INTO `countries` (`id`, `name`) VALUES
(1, 'Россия'),
(2, 'Эквадор'),
(3, 'Испания'),
(4, 'Израиль'),
(5, 'Италия'),
(6, 'Израиль'),
(7, 'Турция');

-- --------------------------------------------------------

--
-- Структура таблицы `ImageManager`
--

CREATE TABLE `ImageManager` (
  `id` int(12) NOT NULL,
  `fileName` varchar(128) NOT NULL,
  `fileHash` varchar(32) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  `createdBy` int(10) UNSIGNED DEFAULT NULL,
  `modifiedBy` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ImageManager`
--

INSERT INTO `ImageManager` (`id`, `fileName`, `fileHash`, `created`, `modified`, `createdBy`, `modifiedBy`) VALUES
(1, 'Зелень (l-1).png', 'biXNLefUFqhHTuX8zChcgPJrcPRW0D1d', '2018-03-14 21:33:28', NULL, NULL, NULL),
(2, 'Орехи (l-2).png', '8WXyYQTmQuR4_ABz7S2dJj6vr94io_vC', '2018-03-14 21:33:28', NULL, NULL, NULL),
(3, 'Овощи заморозка (l-3).png', '8kYx8CH8GOfhjX9ugE8JUK1IZaYvMa-B', '2018-03-14 21:33:28', NULL, NULL, NULL),
(4, 'Фрукты заморозка (l-4).png', 'pBzgQ-D-CFUMY64m7jrVW0P54RUDmQ7D', '2018-03-14 21:33:28', NULL, NULL, NULL),
(5, '/web/img/products/m-1.png', '9PaN-ZWJrx-ls2JZhKLPb340aO1ft7lx', '2018-03-14 21:33:28', NULL, NULL, NULL),
(6, 'Овощи m-2.png', 'mQbjj0X3fWogDD8u3lhLK6ZbpNqYHj5J', '2018-03-14 21:33:28', NULL, NULL, NULL),
(7, 'Фрукты m-3.png', '2ck1xz4lYG57mWWXi01bZXousETLBy_n', '2018-03-14 21:33:28', NULL, NULL, NULL),
(8, '/web/img/products/1.png', 'nG5qHDYmL1FKcEB9A9En3bmXwUX6bVF_', '2018-03-14 21:33:28', NULL, NULL, NULL),
(9, '/web/img/products/2.png', '5L0fZ-_CIgrJZcHrPoJ-XqmGwjcrNDDM', '2018-03-14 21:33:28', NULL, NULL, NULL),
(10, 'Томаты_Бакинские.png', '2kQ2F12zHeLf462_Se-cg7fuQm4wBIjp', '2018-03-17 14:51:10', NULL, NULL, NULL),
(11, 'Огурцы Муромские.png', 'DDEeJkzQZhSkyT61ZFS_Us1gdrg7eBTK', '2018-03-17 14:51:10', NULL, NULL, NULL),
(12, 'Баклажан-590x390.jpg', 'TjP_X6FV7UUafFXxHAOsSV13ItDe89yN', '2018-11-16 00:06:46', '2018-11-16 00:06:46', NULL, NULL),
(13, 'Шампиньоны590x390.jpg', 'dnLIqM7OZtm-u293nMtODkFOFB-fSNcm', '2018-11-16 00:08:05', '2018-11-16 00:08:05', NULL, NULL),
(14, 'Кабачки-590x390.jpg', 'vk4vq_iE7zoVLKGckC-_DVlvaGDP2G_7', '2018-11-16 00:09:07', '2018-11-16 00:09:07', NULL, NULL),
(15, 'Капуста-пекинская-590x390.jpg', 'lvXJcNc36CZXZY4EeLj4LLK64EN_04hL', '2018-11-16 00:10:15', '2018-11-16 00:10:15', NULL, NULL),
(16, 'капуста-красная-590x390.jpg', 'Q9UtBlRM4hLES7QVYeWCQbTh55QxxtE8', '2018-11-16 00:11:07', '2018-11-16 00:11:07', NULL, NULL),
(17, 'Капуста-цветная-590x390.jpg', 'KvdRHFWJSPQEM76WVBer-Y8qKwZkdWd2', '2018-11-16 00:12:22', '2018-11-16 00:12:22', NULL, NULL),
(18, 'капуста-бк-590x390.jpg', 'xUK0OxGhI_B25qXA_GX5fIB4XaxAJYLG', '2018-11-16 00:13:30', '2018-11-16 00:13:30', NULL, NULL),
(19, 'картофель-нурожай-590x390.jpg', 'jNGvSEQH5ue4lyDonM1SDHoxLO6ro2oQ', '2018-11-16 00:14:39', '2018-11-16 00:14:39', NULL, NULL),
(20, 'картофель-красный-590x390.jpg', 'rwpOXXHE_TGI5NjejV9-DlSsqrTrTyng', '2018-11-16 00:15:18', '2018-11-16 00:15:18', NULL, NULL),
(21, 'Корень-имбиря-590x390.jpg', 'ljkeINyHGkrJWMBFACbhccdy5o6fUKhC', '2018-11-16 00:16:15', '2018-11-16 00:16:15', NULL, NULL),
(22, 'Корень-сельдерея-590x390.jpg', 'qUS4WTLiXeHQnailiDxG6YrQel1qjB36', '2018-11-16 00:17:15', '2018-11-16 00:17:15', NULL, NULL),
(23, 'лук-репчатый-590x390.jpg', 'h4o6sda0mqP57yiGnBDHA09uoxnPvme8', '2018-11-16 00:18:08', '2018-11-16 00:18:08', NULL, NULL),
(24, 'лук-белый-590x390.jpg', 'mVhBmZ0Q5qtvh6qnSqc1_qSnPsDSp2sb', '2018-11-16 00:18:49', '2018-11-16 00:18:49', NULL, NULL),
(25, 'Лук-порей-590x390.jpg', '-jSE9a8tzUYrDyxXkE1IcdFKQT9IyCig', '2018-11-16 00:19:54', '2018-11-16 00:19:54', NULL, NULL),
(26, 'морковь2-590x390.jpg', 'GvLTRVvROVg4-FBdqxJsu6KT6qfnWvIK', '2018-11-16 00:21:28', '2018-11-16 00:21:28', NULL, NULL),
(28, 'морковь-590x390.jpg', 'j10h4TbjeRszg7iO8hUVAPAe8FRdyfJh', '2018-11-16 00:22:36', '2018-11-16 00:22:36', NULL, NULL),
(29, 'Огурцы-длинноплодные-590x390.jpg', 'VxdmfCBrBs91wNQ0B6S9UvGnEOsL6-PT', '2018-11-16 00:23:30', '2018-11-16 00:23:30', NULL, NULL),
(30, 'Огурцы-короткоплодные-590x390.jpg', 'Su1Cga4PL0hxZu-Iq4Le68nIXODI-8VH', '2018-11-16 00:24:15', '2018-11-16 00:24:15', NULL, NULL),
(31, 'перец-красный-590x390.jpg', '2pdwoJOjXGPWLOU-20wNQlASXY_DjVVV', '2018-11-16 00:25:08', '2018-11-16 00:25:08', NULL, NULL),
(32, 'Перец-Ласточка-590x390.jpg', 'S_CP6zoVn0yrwE1tpoox8qHuljdTfKUh', '2018-11-16 00:25:41', '2018-11-16 00:25:41', NULL, NULL),
(33, 'перец-желтый-590x390.jpg', 'Y6SKqNiC2TyUBkztd1DUYPqJOUFK4vlm', '2018-11-16 00:26:27', '2018-11-16 00:26:27', NULL, NULL),
(34, 'перец-оранжевый-590x390.jpg', '_4ZWNxs5RaP2C1TTvShDIpm9hrhJH1tE', '2018-11-16 00:27:04', '2018-11-16 00:27:04', NULL, NULL),
(35, 'редиска-пакет-590x390.jpg', 'nS937ETJN9p-RUZA03PN5IQQCltYplL2', '2018-11-16 00:27:58', '2018-11-16 00:27:58', NULL, NULL),
(36, 'Редис-Дайкон-590x390.jpg', '6gG5_GRSt5x7MPmNN29OOUV_efK9CkYU', '2018-11-16 00:28:32', '2018-11-16 00:28:32', NULL, NULL),
(37, 'Редька-Маргеланская-590x390.jpg', 'XM2MIS-O6ZwRsoTYbks7RI-rrZ0fTnxM', '2018-11-16 00:29:23', '2018-11-16 00:29:23', NULL, NULL),
(38, 'Редька-Черная-590x390.jpg', 'mVPf-yDCUxRZC-aIFFEnqAzb8UMMhWPn', '2018-11-16 00:30:11', '2018-11-16 00:30:11', NULL, NULL),
(39, 'Репа-590x390.jpg', 'dEDb7EAvGv_jxyybS3iH1xOU7-rVZMWu', '2018-11-16 00:30:58', '2018-11-16 00:30:58', NULL, NULL),
(40, 'свекла-590x390.jpg', 'cdKQGlKpkQxolZC-t0V6nLmW3gmMGXTQ', '2018-11-16 00:31:40', '2018-11-16 00:31:40', NULL, NULL),
(41, 'Томат-Сливка-590x390.jpg', 'bLbHWouhCTemyQViSVZZG8XX6S71LLHv', '2018-11-16 00:32:15', '2018-11-16 00:32:15', NULL, NULL),
(42, 'помидор-590x390.jpg', '0ZknyrJqMVPkQU9DxbiTnoTeUsW6y6ZG', '2018-11-16 00:33:15', '2018-11-16 00:33:15', NULL, NULL),
(43, 'Томаты-на-ветке-590x390.jpg', '1LxvNFiwFEu22p28NRx4LkU5djyW0HFS', '2018-11-16 00:33:59', '2018-11-16 00:33:59', NULL, NULL),
(44, 'томаты-черри-590x390.jpg', 'kAZwEhOQO9FxQVVnjvREtXiYSVbilTVj', '2018-11-16 00:34:54', '2018-11-16 00:34:54', NULL, NULL),
(45, 'Томаты-розовые-590x390.jpg', 'eu1L2lIt1oh72JQjjmB_OVLpSnc5mvJo', '2018-11-16 00:36:30', '2018-11-16 00:36:30', NULL, NULL),
(46, 'Тыква-590x390.jpg', 'iNtuU0mRZAnJx6cL0DV7rTE3-vEanR2-', '2018-11-16 00:41:49', '2018-11-16 00:41:49', NULL, NULL),
(47, 'Чеснок-590x390.jpg', '5yGu-RZ-FQrCBTbUqMpVxCm0mu5mosfV', '2018-11-16 00:43:09', '2018-11-16 00:43:09', NULL, NULL),
(48, 'авокадо-590x390.jpg', 'ci_APDidLQFxF1ZOh3EhRTo41xGyd8V6', '2018-11-16 00:45:05', '2018-11-16 00:45:05', NULL, NULL),
(49, 'абрикосы-590x390.jpg', '1mFWXY-j3Kxbf1mk2LvIxdThtpQ-xgid', '2018-11-16 00:45:52', '2018-11-16 00:45:52', NULL, NULL),
(50, 'ананас-590x390.jpg', 'IERBYF9RCeSB4kgQjmaKFmcI7lWIJks-', '2018-11-16 00:46:29', '2018-11-16 00:46:29', NULL, NULL),
(51, 'апельсин1-590x390.jpg', 'kOo6hgGRYD4aN1wU60lhvfhQD2bg0U50', '2018-11-16 00:47:18', '2018-11-16 00:47:18', NULL, NULL),
(52, 'арбуз-590x390.jpg', '_OA03W0S__IQEkvPFPcFdBxRHKOizS1_', '2018-11-16 00:47:52', '2018-11-16 00:47:52', NULL, NULL),
(53, 'Бананы-590x390.jpg', 'mj9g8QuRzhk6SqG9J3TccUCJ2rekIRRw', '2018-11-16 00:48:40', '2018-11-16 00:48:40', NULL, NULL),
(54, 'виноград1-590x390.jpg', 'aYqybEnICh3rxK0OHbiXArBnBymLUwPb', '2018-11-16 00:49:49', '2018-11-16 00:49:49', NULL, NULL),
(55, 'виноград2-590x390.jpg', 'XohNh1nfS3LOIsYkwKmEbruRa1ME7msI', '2018-11-16 00:49:56', '2018-11-16 00:49:56', NULL, NULL),
(56, 'виноград3-590x390.jpg', 'J0RfB3CJhzb7CRb0miIlfbbns7uRhmjE', '2018-11-16 00:50:14', '2018-11-16 00:50:14', NULL, NULL),
(57, 'Виноград-кишмиш-590x390.jpg', 'o71dciUIP84MMyVVpZZRFtwklWvdqsZW', '2018-11-16 00:50:58', '2018-11-16 00:50:58', NULL, NULL),
(58, 'Виноград-Тайфи-590x390.jpg', '4uGzNZRxA0RSlDsUR3autDZ08Sta0BuM', '2018-11-16 00:52:13', '2018-11-16 00:52:13', NULL, NULL),
(59, 'виноград4-590x390.jpg', '4Ral3pXc76B4eYA29zLNBoQxJaa05cHI', '2018-11-16 00:53:01', '2018-11-16 00:53:01', NULL, NULL),
(60, 'виноград5-590x390.jpg', 'WFx_j7FZSAr8Yiw-KddWIrb7j0zI08bX', '2018-11-16 00:53:06', '2018-11-16 00:53:06', NULL, NULL),
(61, 'Гранаты-590x390.jpg', 'QYWM8Wfej73ZbWdf3m61ymr99PY17B3l', '2018-11-16 00:53:48', '2018-11-16 00:53:48', NULL, NULL),
(62, 'грейпфрут-590x390.jpg', '9R4WTalDrTXa1bNjcSb9QXGFSPYrErRc', '2018-11-16 00:54:31', '2018-11-16 00:54:31', NULL, NULL),
(63, 'груша-аббат-590x390.jpg', 'wwrrKCXpfimS8_ZvY7zaehffShrQhTZt', '2018-11-16 00:55:12', '2018-11-16 00:55:12', NULL, NULL),
(64, 'груша-китайская-590x390.jpg', 'JbcgH4QrG-WpNkc2UML0VO-ahNo4q1Vx', '2018-11-16 00:56:21', '2018-11-16 00:56:21', NULL, NULL),
(65, 'груша-конференц-590x390.jpg', 'iYewMdp2dZXQl8kcCN1Eo1_vBqUiJfRE', '2018-11-16 00:57:40', '2018-11-16 00:57:40', NULL, NULL),
(66, 'Груша-Анжу-590x390.jpg', 'zK-dDaaBhYcKAl3TJjGwgsc3ETeqEOLT', '2018-11-16 00:58:11', '2018-11-16 00:58:11', NULL, NULL),
(67, 'Груша-Вильямс-590x390.jpg', 'Dw6CJUpgMxMi6Oip9XERoWgdUGdGeNk2', '2018-11-16 00:58:44', '2018-11-16 00:58:44', NULL, NULL),
(68, 'груша-пакхам-590x390.jpg', 'ktCINl0WfXw1GMSUHFJAHe1rJAvc9Xt2', '2018-11-16 00:59:17', '2018-11-16 00:59:17', NULL, NULL),
(69, 'Груша-Форель-590x390.jpg', 'efkfMOhkQB2CQ3mXYFiYSPKa4bCFwKeM', '2018-11-16 00:59:57', '2018-11-16 00:59:57', NULL, NULL),
(70, 'дыня-желтая-590x390.jpg', 'TLDPOMMY-qrVzOjt44q2RmUbyiHwkSl4', '2018-11-16 01:06:03', '2018-11-16 01:06:03', NULL, NULL),
(71, 'дыня-зеленая-590x390.jpg', 'mXEGWB0qlZfJlkd9zjK9sQeGThq3L58V', '2018-11-16 01:06:47', '2018-11-16 01:06:47', NULL, NULL),
(72, 'кикиви-590x390.jpg', 'McsyHAS5WumJqK5SYJQVLsPGHfTFF8vF', '2018-11-16 01:07:43', '2018-11-16 01:07:43', NULL, NULL),
(73, 'лайм-590x390.jpg', '8BYU4zSAY7Xqs_Ha4Y-PdMyjnRzGYMCz', '2018-11-16 01:08:26', '2018-11-16 01:08:26', NULL, NULL),
(74, 'лимон-590x390.jpg', 'N7NUjZNzdljB3gyLvrHmHbtSBWkakbeR', '2018-11-16 01:09:17', '2018-11-16 01:09:17', NULL, NULL),
(75, 'мандарины-надоркот-590x390.jpg', 'QG6pqFO-KVTAStNp3k1PJ-5bXYLRV4Aw', '2018-11-16 01:09:57', '2018-11-16 01:09:57', NULL, NULL),
(76, 'нектарины-590x390.jpg', 'gV-ntl_nd3ClkSOR4CysftEeIkESqzRy', '2018-11-16 01:10:36', '2018-11-16 01:10:36', NULL, NULL),
(77, 'нектарин-инжирный-590x390.jpg', 'NYo4l8S_D_BTA6-bu2uMoeUrz3bawYcs', '2018-11-16 01:11:08', '2018-11-16 01:11:08', NULL, NULL),
(78, 'Персики-590x390.jpg', 'GoGpsyy4EPrvFqcI3ATdgvf4zjup8tpj', '2018-11-16 01:11:49', '2018-11-16 01:11:49', NULL, NULL),
(79, 'персик-инжирный590x390.jpg', 'i4SsCssEp3m45OMgBCxloL653WdV2fH0', '2018-11-16 01:12:45', '2018-11-16 01:12:45', NULL, NULL),
(80, 'помело-590x390.jpg', 'N3vdMs9ATERPXYa3xbeCFbg-7j4FTWbp', '2018-11-16 01:13:22', '2018-11-16 01:13:22', NULL, NULL),
(81, 'слива-черная-590x390.jpg', '-l2z4sTWjOjso9KS7hTLbgVZx7AxgT8h', '2018-11-16 01:13:57', '2018-11-16 01:13:57', NULL, NULL),
(82, 'Свити-590x390.jpg', 'x49pqCZ-BgAVb9pfzfmR9RQ0bZuJyLyn', '2018-11-16 01:14:32', '2018-11-16 01:14:32', NULL, NULL),
(83, 'яблоки-айдаред-590x390.jpg', 'F4X37geaNbkilPnBAynYxqQyUefawT9E', '2018-11-16 01:15:11', '2018-11-16 01:15:11', NULL, NULL),
(84, 'яблоки-антоновка-590x390.jpg', 'Jg5vF7FS4IFn8TP8v9WJ77jIAHdrTsY_', '2018-11-16 01:15:55', '2018-11-16 01:15:55', NULL, NULL),
(85, 'яблоки-чемпион-590x390.jpg', 'LW8mGNzA5AjZ2yteYX5KGTQTANr2QnPW', '2018-11-16 01:18:48', '2018-11-16 01:18:48', NULL, NULL),
(86, 'Яблоки-Глостер-590x390.jpg', '4ZC2A_D5Qc_fTqaBD1106pscTwwBHdH_', '2018-11-16 01:24:24', '2018-11-16 01:24:24', NULL, NULL),
(87, 'яблоки-голден-590x390.jpg', '10DCj2Drpzj39aqR_Li544SkzXc_XlVV', '2018-11-16 01:25:06', '2018-11-16 01:25:06', NULL, NULL),
(88, 'яблоки-гренни-смит-590x390.jpg', '-IjTYhHaKQa90nOY32RBeRAkTFo4BCfD', '2018-11-16 01:25:44', '2018-11-16 01:25:44', NULL, NULL),
(89, 'яблоки-лигол-590x390.jpg', 'Zh-1o6G1_iH8SCxeuXMM6aVo9iO7ZTpH', '2018-11-16 01:26:37', '2018-11-16 01:26:37', NULL, NULL),
(90, 'яблоки-джонагоред-590x390.jpg', 'xttUwJhKrkang7_uAdDUEkpSDtpZ1IoT', '2018-11-16 01:27:21', '2018-11-16 01:27:21', NULL, NULL),
(91, 'Яблоки-Ред-Чиф-590x390.jpg', 'XjTuUFE6YDasXVlx_FeIV77bsCSspL_J', '2018-11-16 01:28:21', '2018-11-16 01:28:21', NULL, NULL),
(92, 'Яблоки-Симиренко-590x390.jpg', 'FYKYzZjOgj63JBjSBsYHjHLyGRkeRzzc', '2018-11-16 01:29:13', '2018-11-16 01:29:13', NULL, NULL),
(93, 'Яблоки-Фуджи-590x390.jpg', 'Xfe9KbpMTinlSzw_NTXbVjn8HvDy6k1C', '2018-11-16 01:30:25', '2018-11-16 01:30:25', NULL, NULL),
(94, 'Баклажан-promo-740x400-retina-x2.jpg', 'xtwqJVY3oCFILM_BjHQmYTMRE3dtTR6U', '2018-11-16 01:31:24', '2018-11-16 01:31:24', NULL, NULL),
(95, 'Бананы-promo-740x400-retina-x2.jpg', 'KMWQbHFKpMG6RxeeqKlZLIB5m1XtCMwG', '2018-11-16 01:36:55', '2018-11-16 01:36:55', NULL, NULL),
(96, 'фундук.jpg', 'j5tuY4f8UtdX5GemA-steQxac5rkvZxi', '2018-11-21 05:42:58', '2018-11-21 05:42:58', NULL, NULL),
(97, 'Бананы-promo-740x400-retina-x2.jpg', 'MO8w6kyTmVsE5jK_NPgKBB7x8txIEKti', '2018-11-21 12:58:42', '2018-11-21 12:58:42', NULL, NULL),
(98, 'Огурцы-короткоплодные-promo-740x400-retina-x2.jpg', 'Q9pQaEf6gapoHlk2kKED7BVVg4ul-7BW', '2018-11-21 12:59:44', '2018-11-21 12:59:44', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL COMMENT 'Название файла',
  `alt` varchar(255) DEFAULT NULL COMMENT 'Значение alt',
  `path` varchar(255) NOT NULL COMMENT 'Путь к файлу'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Фотографии и логотипы ';

-- --------------------------------------------------------

--
-- Структура таблицы `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `table` varchar(255) NOT NULL COMMENT 'Название таблицы',
  `old_values` varchar(255) NOT NULL COMMENT 'Массив старых значений',
  `new_values` varchar(255) NOT NULL COMMENT 'Массив новых значений',
  `created_at` datetime NOT NULL,
  `created_by` datetime NOT NULL,
  `row_id` int(11) NOT NULL COMMENT 'Идентификатор записи'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Таблица логгирования действий';

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1516880055),
('m140209_132017_init', 1516880060),
('m140403_174025_create_account_table', 1516880060),
('m140504_113157_update_tables', 1516880062),
('m140504_130429_create_token_table', 1516880062),
('m140506_102106_rbac_init', 1516881083),
('m140830_171933_fix_ip_field', 1516880062),
('m140830_172703_change_account_table_name', 1516880062),
('m141222_110026_update_ip_field', 1516880063),
('m141222_135246_alter_username_length', 1516880063),
('m150614_103145_update_social_account_table', 1516880063),
('m150623_212711_fix_username_notnull', 1516880063),
('m151218_234654_add_timezone_to_profile', 1516880063),
('m160622_085710_create_ImageManager_table', 1519135903),
('m160929_103127_add_last_login_at_to_user_table', 1516880064),
('m170223_113221_addBlameableBehavior', 1519135904),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1516881083),
('m180314_110000_add_position_column_to_categories', 1521052380),
('m180314_110253_insert_demo_data_in_categories', 1521052408),
('m180314_144340_add_discount_box_price_column_to_store', 1521138718),
('m180314_184726_add_position_column_to_profile_table', 1521058252),
('m180315_100001_insert_demo_data_in_countries', 1521138718),
('m180315_100553_insert_demo_data_in_store', 1521287470),
('m180320_120753_create_write_off_table', 1521567299),
('m180320_142332_add_store_id_column_to_slider_table', 1521567299),
('m180323_000504_update_categories_icons_data', 1521765303),
('m180323_102032_create_table_orders_status', 1521803090),
('m180323_102033_create_table_orders', 1521803090),
('m180323_102041_create_table_cart', 1521803090),
('m180323_102103_create_table_orders_has_cart', 1521803090),
('m180323_102107_fix_table_orders', 1522300873),
('m180323_102108_fix_table_profile', 1522300874),
('m180324_120753_update_write_off_table', 1522301782),
('m180324_120755_fix_name_in_orders_status', 1522304492),
('m180324_120756_insert_demo_data_in_orders_status', 1522304492),
('m180324_120760_upd_orders', 1522306339),
('m180406_123736_add_hose_housing_office_field_in_profile', 1523558870),
('m180406_130417_orders_fields_can_be_null', 1523558870),
('m180412_095446_add_payment_field_in_orders_table', 1523558870),
('m180414_094823_add_summa_filed_in_orders_table', 1523781763),
('m180415_133120_add_column_kpp_in_profile', 1523799176);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `address_street` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_house` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_housing` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Корпус',
  `address_office` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `delivery_date` datetime NOT NULL COMMENT 'Дата доставки',
  `delivery_interval` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Интервал доставки',
  `delivery_status` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `dropping` tinyint(1) DEFAULT NULL,
  `dropping_at` datetime DEFAULT NULL,
  `unique_code` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `google_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Метод оплаты (card/cash/bill)',
  `sum_order` bigint(20) DEFAULT NULL COMMENT 'Сумма заказа'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `address_street`, `address_house`, `address_housing`, `address_office`, `address_phone`, `delivery_date`, `delivery_interval`, `delivery_status`, `created_at`, `created_by`, `dropping`, `dropping_at`, `unique_code`, `comment`, `google_id`, `payment`, `sum_order`) VALUES
(16, 'Бассейная ', '85', '', '230', '+7 (911)-997-8653', '2018-11-17 00:00:00', '14-19', 3, '2018-11-16 14:23:06', 1, NULL, NULL, 'pGUY9bGenA', 'Домофон номер Квартиры.\r\nДеньги за товар под ковриком))) \r\nЗадачу оставьте себе))', '', 'Наличная', 2250),
(17, 'Бассейная ', '85', '', '230', '+7 (911)-997-8653', '2018-11-23 00:00:00', '14-19', 5, '2018-11-20 10:06:58', 1, NULL, NULL, 'mZh6r5Ayc1', 'Громко не звонить. Оставить все у соседке в 231 квартире.', NULL, 'Наличная', 2678),
(18, 'Димитрова', '9', '-', '12', '+7 (991)-999-3003', '2018-11-22 00:00:00', '14-19', 1, '2018-11-21 00:40:59', 1, NULL, NULL, 'MfwZj5ZaHz', 'Позвонить за 2 часа', NULL, 'Наличная', 78),
(19, 'ываываыв', '123', '123', '123', '+7 (952)-231-3986', '2018-11-23 00:00:00', '8-13', 1, '2018-11-22 00:54:01', 1, NULL, NULL, 'XoKvp25L73', '', NULL, NULL, 0),
(20, 'ываываыв', '123', '123', '123', '+7 (952)-231-3986', '2018-11-23 00:00:00', '8-13', 1, '2018-11-22 00:55:34', 1, NULL, NULL, 'jNRVBVmumQ', '', NULL, NULL, 0),
(21, 'ываываыв', '123', '123', '123', '+7 (952)-231-3986', '2018-11-24 00:00:00', '8-13', 1, '2018-11-22 00:56:02', 1, NULL, NULL, 'I8VHWEJ5GD', '', NULL, NULL, 0),
(22, 'ываываыв', '123', '123', '123', '+7 (952)-231-3986', '2018-12-08 00:00:00', '8-13', 1, '2018-11-22 00:58:02', 1, NULL, NULL, 'uQEHWnd9Ot', '', NULL, NULL, 0),
(23, 'ываываыв', '123', '123', '123', '+7 (952)-231-3986', '2018-12-08 00:00:00', '8-13', 1, '2018-11-22 00:58:17', 1, NULL, NULL, 'OvO1IRL5QQ', '', NULL, NULL, 0),
(24, 'ываываыв', '123', '123', '123', '+7 (952)-231-3986', '2018-12-08 00:00:00', '8-13', 1, '2018-11-22 00:58:26', 1, NULL, NULL, 'SK5PTilTxA', '', NULL, NULL, 0),
(25, 'ываываыв', '222', '2222', '', '', '2018-11-23 00:00:00', '14-19', 1, '2018-11-22 01:50:52', 1, NULL, NULL, 'bgANxmrrck', '', NULL, NULL, 0),
(26, 'ываываыв', '222', '2222', '', '', '2018-11-23 00:00:00', '14-19', 1, '2018-11-22 01:51:07', 1, NULL, NULL, 'xQ6VePJBEo', '', NULL, 'Платежная карта', 0),
(27, 'ываываыв', '121', '1212', '121', '', '2018-11-23 00:00:00', '14-19', 1, '2018-11-22 01:52:03', 1, NULL, NULL, 'vG66swTHPI', '', NULL, 'Наличная', 470),
(28, 'ываываыв', '', '', '', '', '2018-11-23 00:00:00', '8-13', 6, '2018-11-22 01:59:23', 1, 1, '2018-11-22 02:00:09', 'MXh6o6WTXL', '', NULL, 'Наличная', 855),
(29, 'ываываыв', '123', '123', '', '+7 (952)-231-3986', '2018-11-08 00:00:00', '14-19', 1, '2018-11-22 02:00:45', 1, NULL, NULL, 'K0kCHqkFOA', '', NULL, 'Платежная карта', 235),
(30, 'Гастелло', '12', '', 'Йе', '+7 (911)-997-8653', '2018-11-26 00:00:00', '14-19', 1, '2018-11-23 15:01:20', 27, NULL, NULL, 'S1glUgobBL', 'Всем привет', NULL, 'Наличная', 4125),
(31, 'ываываыв', '46', '1212', '', '+7 (952)-231-3986', '2018-11-27 00:00:00', '14-19', 6, '2018-11-26 12:50:11', 29, 1, '2018-11-26 12:50:43', 'VgKZAFpwBU', '', NULL, 'Платежная карта', 1010);

-- --------------------------------------------------------

--
-- Структура таблицы `orders_has_cart`
--

CREATE TABLE `orders_has_cart` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `orders_has_cart`
--

INSERT INTO `orders_has_cart` (`id`, `order_id`, `cart_id`) VALUES
(1, 16, 28),
(2, 16, 29),
(3, 16, 30),
(4, 16, 31),
(5, 16, 32),
(6, 16, 33),
(7, 16, 34),
(8, 16, 35),
(9, 16, 36),
(10, 16, 37),
(11, 16, 38),
(12, 17, 54),
(13, 17, 55),
(14, 17, 56),
(15, 17, 57),
(16, 17, 58),
(17, 17, 59),
(18, 17, 60),
(19, 17, 61),
(20, 17, 62),
(21, 17, 63),
(22, 17, 64),
(23, 17, 65),
(24, 17, 66),
(25, 17, 67),
(26, 17, 68),
(27, 17, 69),
(28, 17, 70),
(29, 17, 71),
(30, 17, 72),
(31, 17, 73),
(32, 17, 74),
(33, 18, 75),
(34, 18, 76),
(35, 27, 80),
(36, 27, 81),
(37, 27, 82),
(38, 28, 89),
(39, 28, 90),
(40, 28, 91),
(41, 28, 92),
(42, 28, 93),
(43, 28, 94),
(44, 29, 95),
(45, 29, 96),
(46, 29, 97),
(47, 30, 98),
(48, 30, 99),
(49, 30, 100),
(50, 30, 101),
(51, 30, 102),
(52, 30, 103),
(53, 30, 104),
(54, 30, 105),
(55, 31, 106),
(56, 31, 107);

-- --------------------------------------------------------

--
-- Структура таблицы `orders_status`
--

CREATE TABLE `orders_status` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `orders_status`
--

INSERT INTO `orders_status` (`id`, `name`) VALUES
(1, 'Заказ оформлен'),
(2, 'Заказ собирается'),
(3, 'Заказ отправлен'),
(4, 'Заказ в пути'),
(5, 'Заказ доставлен'),
(6, 'Заказ отменен');

-- --------------------------------------------------------

--
-- Структура таблицы `partners`
--

CREATE TABLE `partners` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image_id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `profile`
--

CREATE TABLE `profile` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `public_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_id` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8_unicode_ci,
  `timezone` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `surname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `middlename` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `inn` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_city` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Город',
  `address_street` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Улица',
  `address_house` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Дом',
  `address_housing` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Корпус',
  `address_office` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Город',
  `kpp` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'КПП'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `profile`
--

INSERT INTO `profile` (`user_id`, `name`, `public_email`, `gravatar_email`, `gravatar_id`, `location`, `website`, `bio`, `timezone`, `surname`, `middlename`, `phone`, `inn`, `company_name`, `address_city`, `address_street`, `address_house`, `address_housing`, `address_office`, `kpp`) VALUES
(1, 'Андрей ', NULL, '', 'd41d8cd98f00b204e9800998ecf8427e', '', NULL, NULL, NULL, 'Бережков', 'Вячеславович', '+7 (952)-231-3986', '123123123123123', 'ООО \"Альбатрос\"', '', '', '', '', '', '123123123123'),
(25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL),
(26, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL),
(27, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL),
(28, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL),
(29, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `slider`
--

CREATE TABLE `slider` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL COMMENT 'Заголовок',
  `image_id` int(11) DEFAULT NULL COMMENT 'Фотография',
  `desc` varchar(255) DEFAULT NULL COMMENT 'Описание',
  `button_url` varchar(255) DEFAULT '#',
  `order` int(11) DEFAULT NULL,
  `store_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `slider`
--

INSERT INTO `slider` (`id`, `title`, `image_id`, `desc`, `button_url`, `order`, `store_id`) VALUES
(8, 'Бананы                                      ', 97, 'Бананы                                      ', '', NULL, 46),
(9, 'Огурцы короткоплодные', 98, 'Огурцы короткоплодные', '', NULL, 22),
(10, 'Фундук', 96, 'Фундук', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `social_account`
--

CREATE TABLE `social_account` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `code` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `store`
--

CREATE TABLE `store` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL COMMENT 'Название товара',
  `boxes_count` int(11) DEFAULT '0' COMMENT 'Количество оставшихся коробок',
  `box_weight` float DEFAULT '0' COMMENT 'Вес одной коробки',
  `box_price` decimal(19,2) DEFAULT NULL COMMENT 'Цена за одну коробку',
  `desc` text COMMENT 'Описание товара',
  `logo_id` int(11) DEFAULT NULL COMMENT 'Логотип товара',
  `country_id` int(11) DEFAULT NULL COMMENT 'Страна происхождения ',
  `category_id` int(11) NOT NULL COMMENT 'Категория ',
  `is_sale` tinyint(1) DEFAULT '0' COMMENT 'Распродажа?',
  `is_active` tinyint(1) DEFAULT '1' COMMENT 'Активно?',
  `created_by` int(11) DEFAULT NULL COMMENT 'Автор записи',
  `updated_by` int(11) DEFAULT NULL COMMENT 'Последнее изменение записи',
  `created_at` datetime DEFAULT NULL COMMENT 'Запись создана ',
  `updated_at` datetime DEFAULT NULL COMMENT 'Запись обновлена',
  `discount_box_price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Основная табоица склада';

--
-- Дамп данных таблицы `store`
--

INSERT INTO `store` (`id`, `name`, `boxes_count`, `box_weight`, `box_price`, `desc`, `logo_id`, `country_id`, `category_id`, `is_sale`, `is_active`, `created_by`, `updated_by`, `created_at`, `updated_at`, `discount_box_price`) VALUES
(5, 'Баклажаны', 83, 1, '25.00', '', 12, 1, 5, 1, 1, 1, 1, '2018-11-16 00:07:18', '2018-11-22 02:00:45', 10),
(6, 'Грибы \"Шампиньоны\"', 997, 1, '200.00', '', 13, 1, 5, 0, 1, 1, 1, '2018-11-16 00:08:13', '2018-11-22 02:00:45', NULL),
(7, 'Кабачки', 998, 1, '25.00', '', 14, 1, 5, 0, 1, 1, 1, '2018-11-16 00:09:12', '2018-11-22 02:00:45', NULL),
(8, 'Капуста \"Пекинская\"', 998, 1, '35.00', '', 15, 1, 5, 0, 1, 1, 1, '2018-11-16 00:10:19', '2018-11-22 01:59:23', NULL),
(9, 'Капуста краснокочанная', 998, 1, '40.00', '', 16, 1, 5, 0, 1, 1, 1, '2018-11-16 00:11:11', '2018-11-22 01:59:23', NULL),
(10, 'Капуста цветная ', 999, 1, '35.00', '', 17, 1, 5, 0, 1, 1, 1, '2018-11-16 00:12:36', '2018-11-16 00:12:36', NULL),
(11, 'Капуста белокочанная н/у кг', 999, 1, '13.00', '', 18, 1, 5, 0, 1, 1, 1, '2018-11-16 00:13:36', '2018-11-16 00:13:36', NULL),
(12, 'Картофель Белый кг', 999, 1, '13.00', '', 19, 1, 5, 0, 1, 1, 1, '2018-11-16 00:14:45', '2018-11-16 00:14:45', NULL),
(13, 'Картофель \"Красный\" ', 999, 1, '13.00', '', 20, 1, 5, 0, 1, 1, 1, '2018-11-16 00:15:23', '2018-11-16 00:15:23', NULL),
(14, 'Корень \"Имбиря\"', 999, 1, '82.00', '', 21, 1, 5, 0, 1, 1, 1, '2018-11-16 00:16:20', '2018-11-16 00:16:20', NULL),
(15, 'Корень сельдерея', 998, 1, '1300.00', '', 22, 1, 5, 0, 1, 1, 27, '2018-11-16 00:17:24', '2018-11-23 15:01:21', NULL),
(16, 'Лук репчатый ', 999, 1, '13.00', '', 23, 1, 5, 0, 1, 1, 1, '2018-11-16 00:18:17', '2018-11-16 00:18:17', NULL),
(17, 'Лук  Белый', 997, 1, '25.00', '', 24, 1, 5, 0, 1, 1, 27, '2018-11-16 00:18:56', '2018-11-23 15:01:20', NULL),
(18, 'Лук \"Порей\" ', 996, 1, '200.00', '', 25, 1, 5, 0, 1, 1, 27, '2018-11-16 00:20:24', '2018-11-23 15:01:21', NULL),
(19, 'Морковь МЫТАЯ', 999, 1, '18.00', '', 26, 1, 5, 0, 1, 1, 1, '2018-11-16 00:21:33', '2018-11-16 00:21:33', NULL),
(20, 'Морковь кг', 997, 1, '14.00', '', 28, 1, 5, 0, 1, 1, 1, '2018-11-16 00:22:42', '2018-11-21 00:40:59', NULL),
(21, 'Огурцы  длинноплодные ', 997, 1, '35.00', '', 29, 1, 5, 0, 1, 1, 27, '2018-11-16 00:23:39', '2018-11-23 15:01:20', NULL),
(22, 'Огурцы короткоплодные', 989, 1, '24.00', '', 30, 1, 5, 1, 1, 1, 1, '2018-11-16 00:24:21', '2018-11-22 01:59:23', 10),
(23, 'Перец Болгарский  Красный', 999, 1, '180.00', '', 31, 1, 5, 0, 1, 1, 1, '2018-11-16 00:25:15', '2018-11-16 00:25:15', NULL),
(24, 'Перец Ласточка', 999, 1, '40.00', '', 32, 1, 5, 0, 1, 1, 1, '2018-11-16 00:25:50', '2018-11-16 00:25:50', NULL),
(25, 'Перец желтый', 999, 1, '190.00', '', 33, 1, 5, 0, 1, 1, 1, '2018-11-16 00:26:33', '2018-11-16 00:26:33', NULL),
(26, 'Перец оранж. ', 999, 1, '190.00', '', 34, 1, 5, 0, 1, 1, 1, '2018-11-16 00:27:14', '2018-11-16 00:27:14', NULL),
(27, 'Редис 500 гр', 999, 1, '600.00', '', 35, 1, 5, 0, 1, 1, 1, '2018-11-16 00:28:01', '2018-11-16 00:28:01', NULL),
(28, 'Редис Дайкон', 999, 1, '37.00', '', 36, 1, 5, 0, 1, 1, 1, '2018-11-16 00:28:53', '2018-11-16 00:28:53', NULL),
(29, 'Редька Маргеланская ', 999, 1, '22.00', '', 37, 1, 5, 0, 1, 1, 1, '2018-11-16 00:29:38', '2018-11-16 00:29:38', NULL),
(30, 'Редька Черная ', 999, 1, '20.00', '', 38, 1, 5, 0, 1, 1, 1, '2018-11-16 00:30:24', '2018-11-16 00:30:24', NULL),
(31, 'Репа', 999, 1, '20.00', '', 39, 1, 5, 0, 1, 1, 1, '2018-11-16 00:31:04', '2018-11-16 00:31:04', NULL),
(32, 'Свекла  кг', 999, 1, '13.00', '', 40, 1, 5, 0, 1, 1, 1, '2018-11-16 00:31:45', '2018-11-16 00:31:45', NULL),
(33, 'Томат Сливка ', 999, 1, '27.00', '', 41, 1, 5, 0, 1, 1, 1, '2018-11-16 00:32:25', '2018-11-16 00:32:25', NULL),
(34, 'Томаты', 999, 1, '60.00', '', 42, 1, 5, 0, 1, 1, 1, '2018-11-16 00:33:26', '2018-11-16 00:33:26', NULL),
(35, 'Томаты на ветке ', 999, 1, '75.00', '', 43, 1, 5, 0, 1, 1, 1, '2018-11-16 00:34:20', '2018-11-16 00:34:20', NULL),
(36, 'Томаты \"Черри\"  250гр', 999, 1, '650.00', '', 44, 1, 5, 0, 1, 1, 1, '2018-11-16 00:35:00', '2018-11-16 00:35:00', NULL),
(37, 'Томаты \"Черри\"  500гр', 999, 1, '700.00', '', 44, 1, 5, 0, 1, 1, 1, '2018-11-16 00:35:37', '2018-11-16 00:35:37', NULL),
(38, 'Томаты розовые', 999, 1, '80.00', '', 45, 1, 5, 0, 1, 1, 1, '2018-11-16 00:36:36', '2018-11-16 00:36:36', NULL),
(39, 'Тыква', 999, 1, '22.00', '', 46, 1, 5, 0, 1, 1, 1, '2018-11-16 00:42:11', '2018-11-16 00:42:11', NULL),
(40, 'Чеснок ', 999, 1, '40.00', '', 47, 1, 5, 0, 1, 1, 1, '2018-11-16 00:43:15', '2018-11-16 00:43:15', NULL),
(41, 'Авокадо ', 995, 1, '670.00', '', 48, 1, 6, 0, 1, 1, 29, '2018-11-16 00:45:14', '2018-11-26 12:50:11', NULL),
(42, 'Абрикосы', 993, 1, '85.00', '', 49, 1, 6, 0, 1, 1, 29, '2018-11-16 00:45:59', '2018-11-26 12:50:11', NULL),
(43, 'Ананас ', 997, 1, '90.00', '', 50, 1, 6, 0, 1, 1, 1, '2018-11-16 00:46:43', '2018-11-20 10:06:59', NULL),
(44, 'Апельсины', 998, 1, '80.00', '', 51, 1, 6, 0, 1, 1, 1, '2018-11-16 00:47:23', '2018-11-16 14:23:06', NULL),
(45, 'Арбуз', 988, 1, '10.00', '', 52, 1, 6, 0, 1, 1, 1, '2018-11-16 00:47:58', '2018-11-20 10:06:59', NULL),
(46, 'Бананы                                      ', 992, 1, '60.00', 'Бана́н — название съедобных плодов культивируемых видов рода Банан (Musa); обычно под таковыми понимают Musa acuminata и Musa   paradisiaca, а также Musa balbisiana, Musa fehi[en], Musa troglodytarum[en] и ряд других. Также бананами могут называть плоды Ensete ventricosum[en] (строго говоря, являющегося представителем другого рода семейства Банановые). С ботанической точки зрения банан является ягодой, многосеменной и толстокожей. У культурных форм часто отсутствуют семена, ненужные при вегетативном размножении. Имеют размеры до 15 см в длину и 3—4 см в диаметре. Соплодия могут состоять из 300 плодов и иметь массу до 50—60 кг.', 53, 1, 6, 0, 1, 1, 1, '2018-11-16 00:48:51', '2018-11-26 11:15:50', NULL),
(47, 'Виноград Белый', 996, 1, '135.00', '', 55, 1, 6, 0, 1, 1, 1, '2018-11-16 00:50:20', '2018-11-20 10:06:59', NULL),
(48, 'Виноград КИШ-МИШ', 993, 1, '155.00', '', 57, 1, 6, 0, 1, 1, 27, '2018-11-16 00:51:02', '2018-11-23 15:01:20', NULL),
(49, 'Виноград Красный ', 999, 1, '145.00', '', 56, 1, 6, 0, 1, 1, 1, '2018-11-16 00:51:43', '2018-11-16 00:51:43', NULL),
(50, 'Виноград Тайфи ', 998, 1, '95.00', '', 58, 1, 6, 0, 1, 1, 1, '2018-11-16 00:52:18', '2018-11-20 10:06:59', NULL),
(51, 'Виноград Черный', 995, 1, '90.00', '', 59, 1, 6, 0, 1, 1, 1, '2018-11-16 00:53:12', '2018-11-16 14:23:06', NULL),
(52, 'Гранаты', 995, 1, '100.00', '', 61, 1, 6, 0, 1, 1, 1, '2018-11-16 00:53:55', '2018-11-20 10:06:59', NULL),
(53, 'Грейпфрут', 996, 1, '90.00', '', 62, 1, 6, 0, 1, 1, 27, '2018-11-16 00:54:35', '2018-11-23 15:01:20', NULL),
(54, 'Груша \" Аббат\"', 995, 1, '80.00', '', 63, 1, 6, 0, 1, 1, 1, '2018-11-16 00:55:17', '2018-11-16 14:23:06', NULL),
(55, 'Груша \" Китайская\"', 997, 1, '65.00', '', 64, 1, 6, 0, 1, 1, 1, '2018-11-16 00:56:26', '2018-11-16 14:23:06', NULL),
(56, 'Груша \"Конференц\" ', 998, 1, '93.00', '', 65, 1, 6, 0, 1, 1, 1, '2018-11-16 00:57:45', '2018-11-20 10:06:59', NULL),
(57, 'Груша Анжу', 999, 1, '74.00', '', 66, 1, 6, 0, 1, 1, 1, '2018-11-16 00:58:15', '2018-11-16 00:58:15', NULL),
(58, 'Груша Вильямс', 999, 1, '70.00', '', 67, 1, 6, 0, 1, 1, 1, '2018-11-16 00:58:49', '2018-11-16 00:58:49', NULL),
(59, 'Груша Пакхам', 999, 1, '70.00', '', 68, 1, 6, 0, 1, 1, 1, '2018-11-16 00:59:22', '2018-11-16 00:59:22', NULL),
(60, 'Груша Фарель', 999, 1, '68.00', '', 69, 1, 6, 0, 1, 1, 1, '2018-11-16 01:00:01', '2018-11-16 01:00:01', NULL),
(61, 'Дыня кг', 998, 1, '40.00', '', 70, 1, 6, 0, 1, 1, 1, '2018-11-16 01:06:09', '2018-11-20 10:06:59', NULL),
(62, 'Дыня \"Торпеда\" кг', 999, 1, '35.00', '', 71, 1, 6, 0, 1, 1, 1, '2018-11-16 01:06:58', '2018-11-16 01:06:58', NULL),
(63, 'Киви ', 999, 1, '85.00', '', 72, 1, 6, 0, 1, 1, 1, '2018-11-16 01:07:51', '2018-11-16 01:07:51', NULL),
(64, 'Лайм, кг', 998, 1, '70.00', '', 73, 1, 6, 0, 1, 1, 1, '2018-11-16 01:08:34', '2018-11-20 10:06:59', NULL),
(65, 'Лимоны ', 999, 1, '105.00', '', 74, 1, 6, 0, 1, 1, 1, '2018-11-16 01:09:21', '2018-11-16 01:09:21', NULL),
(66, 'Мандарины  кг', 999, 1, '110.00', '', 75, 1, 6, 0, 1, 1, 1, '2018-11-16 01:10:02', '2018-11-16 01:10:02', NULL),
(67, 'Нектарины', 999, 1, '80.00', '', 76, 1, 6, 0, 1, 1, 1, '2018-11-16 01:10:40', '2018-11-16 01:10:40', NULL),
(68, 'Нектарин инжирный кг', 997, 1, '130.00', '', 77, 1, 6, 0, 1, 1, 1, '2018-11-16 01:11:12', '2018-11-20 10:06:59', NULL),
(69, 'Персики кг', 998, 1, '85.00', '', 78, 1, 6, 0, 1, 1, 1, '2018-11-16 01:11:53', '2018-11-20 10:06:59', NULL),
(70, 'Персик инжирный кг', 999, 1, '130.00', '', 79, 1, 6, 0, 1, 1, 1, '2018-11-16 01:12:51', '2018-11-16 01:12:51', NULL),
(71, 'Помело ', 999, 1, '98.00', '', 80, 1, 6, 0, 1, 1, 1, '2018-11-16 01:13:28', '2018-11-16 01:13:28', NULL),
(72, 'Слива', 997, 1, '80.00', '', 81, 1, 6, 0, 1, 1, 1, '2018-11-16 01:14:01', '2018-11-20 10:06:59', NULL),
(73, 'Свити ', 996, 1, '110.00', '', 82, 1, 6, 0, 1, 1, 1, '2018-11-16 01:14:36', '2018-11-20 10:06:59', NULL),
(74, 'Яблоки \"Айдаред\" ', 999, 1, '65.00', '', 83, 1, 6, 0, 1, 1, 1, '2018-11-16 01:15:15', '2018-11-16 01:15:15', NULL),
(75, 'Яблоки \"Антоновка\"', 999, 1, '55.00', '', 84, 1, 6, 0, 1, 1, 1, '2018-11-16 01:16:00', '2018-11-16 01:16:00', NULL),
(76, 'Яблоки \"Гала\"', 999, 1, '75.00', '', 85, 1, 6, 0, 1, 1, 1, '2018-11-16 01:18:55', '2018-11-16 01:18:55', NULL),
(77, 'Яблоки \"Глостер\"', 999, 1, '76.00', '', 86, 1, 6, 0, 1, 1, 1, '2018-11-16 01:24:28', '2018-11-16 01:24:28', NULL),
(78, 'Яблоки \"Гольден\"  ', 999, 1, '88.00', '', 87, 1, 6, 0, 1, 1, 1, '2018-11-16 01:25:10', '2018-11-16 01:25:10', NULL),
(79, 'Яблоки \"Грени Смит\"', 999, 1, '85.00', '', 88, 1, 6, 0, 1, 1, 1, '2018-11-16 01:25:50', '2018-11-16 01:25:50', NULL),
(80, 'Яблоки \"Лиголь\"', 999, 1, '78.00', '', 89, 1, 6, 0, 1, 1, 1, '2018-11-16 01:26:43', '2018-11-16 01:26:43', NULL),
(81, 'Яблоки Джонагоред', 999, 1, '75.00', '', 90, 1, 6, 0, 1, 1, 1, '2018-11-16 01:27:36', '2018-11-16 01:27:36', NULL),
(82, 'Яблоки Ред Чиф', 999, 1, '77.00', '', 91, 1, 6, 0, 1, 1, 1, '2018-11-16 01:28:29', '2018-11-16 01:28:29', NULL),
(83, 'Яблоки Симиренко', 999, 1, '67.00', '', 92, 1, 6, 0, 1, 1, 1, '2018-11-16 01:29:17', '2018-11-16 01:29:17', NULL),
(84, 'Яблоки Фуджи', 998, 1, '65.00', '', 93, 1, 6, 0, 1, 1, 1, '2018-11-16 01:30:30', '2018-11-16 14:23:06', NULL),
(85, 'Фундук', 498, 1, '500.00', 'Такой богатый и ценный сбалансированный состав биологически активных веществ благотворно воздействует на весь организм человека, укрепляет, оздоравливает, восполняет запасы нужных веществ, улучшает работу головного мозга.\r\n\r\nКровеносная и сердечно-сосудистая системы при употреблении фундука значительно улучшают свою работу, поскольку орех снижает уровень вредного холестерина, очищает кровь, повышает уровень гемоглобина, нормализует работу сердца, укрепляет миокард. Кровеносные сосуды под воздействием веществ, содержащихся в фундуке, становятся более эластичными, крепкими. Лесной орех широко применяется как лечебное средство против варикоза, тромбофлебита и др. болезней кровеносных сосудов.', 96, 1, 2, 1, 1, 1, 1, '2018-11-21 05:43:41', '2018-11-22 01:59:23', 450),
(87, 'Петрушка', NULL, NULL, NULL, '', NULL, 1, 1, 0, 1, 1, 1, '2018-11-21 05:54:43', '2018-11-21 05:54:43', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `store_has_images`
--

CREATE TABLE `store_has_images` (
  `id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `token`
--

CREATE TABLE `token` (
  `user_id` int(11) NOT NULL,
  `code` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `type` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `token`
--

INSERT INTO `token` (`user_id`, `code`, `created_at`, `type`) VALUES
(1, 'AF5DCALIyUaLryC_vGxs_Hp8IAoBWLTn', 1516880252, 0),
(28, 'bdykBaPpFrrh_7CKQSOm50Ff_YSit2Ot', 1542970461, 0),
(29, 'EbLQ0BDpPWYINv5rELwcAD3mrSSlzAir', 1543225758, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `confirmed_at` int(11) DEFAULT NULL,
  `unconfirmed_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blocked_at` int(11) DEFAULT NULL,
  `registration_ip` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `flags` int(11) NOT NULL DEFAULT '0',
  `last_login_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password_hash`, `auth_key`, `confirmed_at`, `unconfirmed_email`, `blocked_at`, `registration_ip`, `created_at`, `updated_at`, `flags`, `last_login_at`) VALUES
(1, 'admin', 'dead0343@gmail.com', '$2y$12$WBbcQKP80IGviwlHrQfjyOT90YuJZZgD0yucDLD1IqO0Bbck5lMsa', 'Dm8sgIecmg1bR1JYfgyEJVG5_zUNgZ8W', 1519132806, NULL, NULL, '127.0.0.1', 1516880252, 1516880252, 0, 1547053252),
(25, 'dead142@mail.ru', 'dead142@mail.ru', '$2y$12$oP0JRw9Jru28iM2XPYEe5empN1IXQQpdH7XQPv3O5zhHxhKSMEoj2', 'Oe25yKyn2ktQDrmNHzBeuNPOgVN4xikY', 1542827272, NULL, NULL, '92.100.39.60', 1542827120, 1542827120, 0, NULL),
(26, 'das-chebykina@yandex.ru', 'das-chebykina@yandex.ru', '$2y$12$u/4Pl9QCjjvWankjFQiCXu09TscwYFDfHZyhwqJIOe/1VWp/ot7oS', 'luqx5uGQtQtOze-HJQwn2O4OwI6BZ1N2', 1542888114, NULL, NULL, '176.59.21.16', 1542886465, 1542886465, 0, 1543999260),
(27, 'grushinra@mail.ru', 'grushinra@mail.ru', '$2y$12$3r8Fj1hPqt48CP75EwmwdesZHFgZ3FoUsO4v9EIj3iUoRGCdCqLl2', 'idGNM932ptkmAixxiHORRjO4HTmh29Pf', 1542895640, NULL, NULL, '185.97.201.62', 1542895589, 1542895589, 0, 1542975545),
(28, 'ereckii-fil@yandex.ru', 'ereckii-fil@yandex.ru', '$2y$12$B0Yu83AArbJnj2EX760n5e9uG8SYN7FSDWWoxVJeJypJ3BXdsj7h6', 'VdlXS_X2GaMX9Vsy4P7Hhcd7ZB61-1aW', NULL, NULL, NULL, '91.209.59.10', 1542970461, 1542970461, 0, NULL),
(29, 'dead142@list.ru', 'dead142@list.ru', '$2y$12$fxf6HAJONzJrTvLRn/TepeOe2WHzNti/Q3Na3VrJ7x4k6pmQRI4Rq', 'BomYVHNo0urhaBOvimD52q37pw4evisY', NULL, NULL, NULL, '217.66.157.137', 1543225758, 1543225758, 0, 1543225772);

-- --------------------------------------------------------

--
-- Структура таблицы `write_off`
--

CREATE TABLE `write_off` (
  `id` int(11) NOT NULL,
  `id_store` int(11) DEFAULT NULL,
  `count_box` int(11) DEFAULT NULL,
  `count_weight` float DEFAULT NULL,
  `in` tinyint(1) DEFAULT NULL,
  `out` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `auth_assignment_user_id_idx` (`user_id`);

--
-- Индексы таблицы `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Индексы таблицы `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Индексы таблицы `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_cart_profile_user_id` (`profile_id`),
  ADD KEY `FK_cart_profile_user_id2` (`updated_by`),
  ADD KEY `FK_cart_store_id` (`id_store`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_categories_image_id` (`image_id`);

--
-- Индексы таблицы `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ImageManager`
--
ALTER TABLE `ImageManager`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_code` (`unique_code`),
  ADD KEY `FK_orders_orders_status_id` (`delivery_status`);

--
-- Индексы таблицы `orders_has_cart`
--
ALTER TABLE `orders_has_cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_orders_has_cart_cart_id` (`cart_id`),
  ADD KEY `FK_orders_has_cart_orders_id` (`order_id`);

--
-- Индексы таблицы `orders_status`
--
ALTER TABLE `orders_status`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`user_id`);

--
-- Индексы таблицы `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_slider_image_id` (`image_id`),
  ADD KEY `FK_slider_store_id` (`store_id`);

--
-- Индексы таблицы `social_account`
--
ALTER TABLE `social_account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account_unique` (`provider`,`client_id`),
  ADD UNIQUE KEY `account_unique_code` (`code`),
  ADD KEY `fk_user_account` (`user_id`);

--
-- Индексы таблицы `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_store_logo_id` (`logo_id`),
  ADD KEY `IDX_store_country_id` (`country_id`),
  ADD KEY `IDX_store_category_id` (`category_id`),
  ADD KEY `IDX_store_created_by` (`created_by`),
  ADD KEY `IDX_store_updated_by` (`updated_by`);

--
-- Индексы таблицы `store_has_images`
--
ALTER TABLE `store_has_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_store_has_images_store_id` (`store_id`),
  ADD KEY `IDX_store_has_images_image_id` (`image_id`);

--
-- Индексы таблицы `token`
--
ALTER TABLE `token`
  ADD UNIQUE KEY `token_unique` (`user_id`,`code`,`type`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_unique_username` (`username`),
  ADD UNIQUE KEY `user_unique_email` (`email`);

--
-- Индексы таблицы `write_off`
--
ALTER TABLE `write_off`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_write_off_store_id` (`id_store`),
  ADD KEY `IDX_write_off_created_by` (`created_by`),
  ADD KEY `IDX_write_off_updated_by` (`updated_by`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `ImageManager`
--
ALTER TABLE `ImageManager`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;
--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT для таблицы `orders_has_cart`
--
ALTER TABLE `orders_has_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT для таблицы `orders_status`
--
ALTER TABLE `orders_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `partners`
--
ALTER TABLE `partners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `social_account`
--
ALTER TABLE `social_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `store`
--
ALTER TABLE `store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
--
-- AUTO_INCREMENT для таблицы `store_has_images`
--
ALTER TABLE `store_has_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT для таблицы `write_off`
--
ALTER TABLE `write_off`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `FK_cart_profile_user_id` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`user_id`),
  ADD CONSTRAINT `FK_cart_profile_user_id2` FOREIGN KEY (`updated_by`) REFERENCES `profile` (`user_id`),
  ADD CONSTRAINT `FK_cart_store_id` FOREIGN KEY (`id_store`) REFERENCES `store` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `FK_categories_ImageManager_id` FOREIGN KEY (`image_id`) REFERENCES `ImageManager` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_orders_orders_status_id` FOREIGN KEY (`delivery_status`) REFERENCES `orders_status` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `orders_has_cart`
--
ALTER TABLE `orders_has_cart`
  ADD CONSTRAINT `FK_orders_has_cart_cart_id` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_orders_has_cart_orders_id` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `fk_user_profile` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `slider`
--
ALTER TABLE `slider`
  ADD CONSTRAINT `FK_slider_ImageManager_id` FOREIGN KEY (`image_id`) REFERENCES `ImageManager` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_slider_store_id` FOREIGN KEY (`store_id`) REFERENCES `store` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `social_account`
--
ALTER TABLE `social_account`
  ADD CONSTRAINT `fk_user_account` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `store`
--
ALTER TABLE `store`
  ADD CONSTRAINT `FK_store_ImageManager_id` FOREIGN KEY (`logo_id`) REFERENCES `ImageManager` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_store_categories_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_store_countries_id` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_store_user_id` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `FK_store_user_id2` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Ограничения внешнего ключа таблицы `store_has_images`
--
ALTER TABLE `store_has_images`
  ADD CONSTRAINT `FK_store_has_images_ImageManager_id` FOREIGN KEY (`image_id`) REFERENCES `ImageManager` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_store_has_images_store_id` FOREIGN KEY (`store_id`) REFERENCES `store` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `token`
--
ALTER TABLE `token`
  ADD CONSTRAINT `fk_user_token` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `write_off`
--
ALTER TABLE `write_off`
  ADD CONSTRAINT `FK_write_off_profile1_user_id` FOREIGN KEY (`updated_by`) REFERENCES `profile` (`user_id`),
  ADD CONSTRAINT `FK_write_off_profile_user_id` FOREIGN KEY (`created_by`) REFERENCES `profile` (`user_id`),
  ADD CONSTRAINT `FK_write_off_store_id` FOREIGN KEY (`id_store`) REFERENCES `store` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
