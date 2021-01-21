-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 21 2021 г., 15:14
-- Версия сервера: 8.0.19
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `comfort`
--
CREATE DATABASE IF NOT EXISTS `comfort` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `comfort`;

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int UNSIGNED NOT NULL,
  `parent_id` int DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `code`, `url`, `img`) VALUES
(1, NULL, 'Крупная бытовая техника', 'categories', 'large-home-appliances', 'kitchen-utensils.png'),
(2, NULL, 'Встраиваемая бытовая техника', 'categories', 'built-in-household-appliances', 'gas-stove.png'),
(3, NULL, 'Мелкая бытовая техника', 'categories', 'small-household-appliances', 'blender.png'),
(4, NULL, 'Климатическая техника', 'categories', 'climatic-equipment', 'air-conditioner.png'),
(5, NULL, 'Техника для уборки', 'categories', 'cleaning-equipment', 'vacuum.png'),
(6, NULL, 'Красота и здоровье', 'categories', 'health-and-beauty', 'hair-dryer.png'),
(7, 1, 'Морозильные камеры', 'large-home-appliances', 'freezers', 'freezer.png'),
(8, 1, 'Стиральные машины', 'large-home-appliances', 'washing-machines', 'washing-machine.png'),
(9, 1, 'Плиты', 'large-home-appliances', 'cookers', 'kitchen-pack.png'),
(10, 1, 'Холодильники', 'large-home-appliances', 'refrigerators', 'smart-refrigerator.png'),
(11, 2, 'Варочные поверхности', 'built-in-household-appliances', 'cooking-surfaces', 'stove.png'),
(12, 2, 'Духовки', 'built-in-household-appliances', 'ovens', 'oven.png'),
(13, 3, 'Блендеры', 'small-household-appliances', 'blenders', NULL),
(14, 3, 'Мультиварки', 'small-household-appliances', 'multicooker', NULL),
(15, 3, 'Мясорубки', 'small-household-appliances', 'meat-grinder', NULL),
(16, 3, 'Соковыжималки', 'small-household-appliances', 'juicers', NULL),
(17, 3, 'Электрические чайники', 'small-household-appliances', 'electric-kettles', NULL),
(18, 3, 'Утюги', 'small-household-appliances', 'irons', NULL),
(19, 3, 'Электрические печи', 'small-household-appliances', 'electric-ovens', NULL),
(20, 4, 'Обогреватели', 'climatic-equipment', 'heaters', NULL),
(21, 4, 'Кондиционеры', 'climatic-equipment', 'air-conditioners', NULL),
(22, 4, 'Водонагреватели', 'climatic-equipment', 'water-heaters', NULL),
(23, 5, 'Классические пылесосы', 'cleaning-equipment', 'classic-vacuum-cleaners', NULL),
(24, 5, 'Ручные пылесосы', 'cleaning-equipment', 'hand-vacuum-cleaners', NULL),
(25, 5, 'Роботы уборщики', 'cleaning-equipment', 'cleaning-robots', NULL),
(26, 6, 'Фены', 'health-and-beauty', 'hair-dryers', NULL),
(27, 6, 'Плойки', 'health-and-beauty', 'curling-iron', NULL),
(28, 6, 'Электрорасчески', 'health-and-beauty', 'electric-comb', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(70, '2014_10_12_000000_create_users_table', 1),
(71, '2020_10_11_164100_create_categories_table', 1),
(72, '2020_10_11_164349_create_products_table', 1),
(73, '2020_10_11_164404_create_menus_table', 1),
(74, '2020_10_21_094407_create_product_images_table', 1),
(75, '2014_10_12_100000_create_password_resets_table', 2),
(76, '2020_11_14_090642_create_orders_table', 2),
(77, '2020_11_19_130343_create_users_table', 3),
(78, '2021_01_08_052012_create_orders_table', 4),
(79, '2021_01_09_184712_create_orders_table', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cart` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `created_at`, `updated_at`, `user_id`, `name`, `email`, `phone`, `address`, `cart`) VALUES
(86, '2021-01-18 01:26:59', '2021-01-18 01:26:59', 11, 'Name1', 'test123@gmail.com', '555555', NULL, 'O:8:\"stdClass\":3:{s:5:\"items\";a:1:{i:3;a:7:{s:4:\"name\";s:45:\"Стиральная машина LG F2T3HS6W\";s:3:\"qty\";s:1:\"1\";s:8:\"prod_url\";s:11:\"lg_f2t3hs6w\";s:8:\"code_cat\";s:21:\"large-home-appliances\";s:7:\"url_cat\";s:16:\"washing-machines\";s:3:\"img\";s:10:\"img_10.jpg\";s:4:\"cost\";i:380;}}s:8:\"totalQty\";s:1:\"1\";s:10:\"totalPrice\";i:380;}'),
(87, '2021-01-18 08:15:33', '2021-01-18 08:15:33', 11, 'Admin', 'admin@gmail.com', '994134132413', NULL, 'O:16:\"App\\Classes\\Cart\":3:{s:5:\"items\";a:1:{i:2;a:9:{s:3:\"qty\";i:1;s:2:\"id\";i:2;s:8:\"prod_url\";s:27:\"hotpoint_ariston_hfz_6175_s\";s:8:\"code_cat\";s:21:\"large-home-appliances\";s:7:\"url_cat\";s:8:\"freezers\";s:4:\"name\";s:63:\"Морозильная камера Hotpoint-Ariston HFZ 6175 S\";s:4:\"cost\";i:250;s:5:\"price\";i:250;s:3:\"img\";s:9:\"img_6.jpg\";}}s:8:\"totalQty\";i:1;s:10:\"totalPrice\";i:250;}'),
(88, '2021-01-18 08:34:44', '2021-01-18 08:34:44', 11, 'Name11111111', 'test123@gmail.com', '994324132413', NULL, 'O:8:\"stdClass\":3:{s:5:\"items\";a:1:{i:2;a:7:{s:4:\"name\";s:63:\"Морозильная камера Hotpoint-Ariston HFZ 6175 S\";s:3:\"qty\";s:1:\"1\";s:8:\"prod_url\";s:27:\"hotpoint_ariston_hfz_6175_s\";s:8:\"code_cat\";s:21:\"large-home-appliances\";s:7:\"url_cat\";s:8:\"freezers\";s:3:\"img\";s:9:\"img_6.jpg\";s:4:\"cost\";i:250;}}s:8:\"totalQty\";s:1:\"1\";s:10:\"totalPrice\";i:250;}'),
(89, '2021-01-18 08:35:09', '2021-01-18 08:35:09', 11, 'Name1', 'test123@gmail.com', '994111111111', NULL, 'O:8:\"stdClass\":3:{s:5:\"items\";a:1:{i:3;a:7:{s:4:\"name\";s:45:\"Стиральная машина LG F2T3HS6W\";s:3:\"qty\";s:1:\"1\";s:8:\"prod_url\";s:11:\"lg_f2t3hs6w\";s:8:\"code_cat\";s:21:\"large-home-appliances\";s:7:\"url_cat\";s:16:\"washing-machines\";s:3:\"img\";s:10:\"img_10.jpg\";s:4:\"cost\";i:380;}}s:8:\"totalQty\";s:1:\"1\";s:10:\"totalPrice\";i:380;}');

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('test123@mail.ru', '$2y$10$Zfyjht2Qaj6PPkECdHP3U.Mp1rMWSLVmhfEa5s1FJzbeSG1daiQ5i', '2020-11-29 09:03:53'),
('test1@mail.ru', '$2y$10$mYclbth38XeUX3r34YRzTOroVXBbC1e.vDaIb/LYIU02KgMAaWSK6', '2020-11-29 09:12:14'),
('TEST@mail.ru', '$2y$10$OByJqPSxMHyCftoGLb6c3OdJLYGGh5yR9.ymRo8vYKoARNTImDs1C', '2020-11-29 09:12:24');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int UNSIGNED NOT NULL,
  `properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `category_id`, `properties`, `description`, `price`, `url`, `status`) VALUES
(1, 'Холодильник INDESIT DF 4181 W', 10, '1', 'Холоди́льник — устройство, поддерживающее низкую температуру в теплоизолированной камере. ... Работа холодильника основана на использовании холодильной машины, переносящей тепло из рабочей камеры холодильника наружу, где оно рассеивается во внешнюю среду.', 470, 'indesit_df_4181_w', 1),
(2, 'Морозильная камера Hotpoint-Ariston HFZ 6175 S', 7, '1', 'Морозильная камера – это холодильное оборудование, предназначенное для хранения продуктов питания и прочих веществ, которые требуют низких температур.', 250, 'hotpoint_ariston_hfz_6175_s', 1),
(3, 'Стиральная машина LG F2T3HS6W', 8, '1', 'Стиральная машина — установка для стирки текстильных изделий.', 380, 'lg_f2t3hs6w', 1),
(4, 'Плита газовая GORENJE G 5111 WF', 9, '1', 'Га́зовая плита́ — кухонная плита, использующая в качестве топлива горючий газ.', 490, 'gorenje_g_5111_wf', 1),
(5, 'Варочная поверхность GORENJE GW 640 X', 11, '1', 'На кухне плита представляет собой выступ, полку, решетку или скамью для хранения пищи или посуды на задней или боковой поверхности очага, чтобы они оставались теплыми, или внутренний угол дымохода.', 200, 'gorenje_gw_640_x', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `product_images`
--

CREATE TABLE `product_images` (
  `id` int UNSIGNED NOT NULL,
  `product_id` int UNSIGNED NOT NULL,
  `path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `path`, `position`) VALUES
(1, 1, 'img_1.jpg', 1),
(2, 1, 'img_2.jpg', 2),
(3, 1, 'img_3.jpg', 3),
(4, 1, 'img_4.jpg', 4),
(5, 1, 'img_5.jpg', 5),
(6, 2, 'img_6.jpg', 1),
(7, 2, 'img_7.jpg', 2),
(8, 2, 'img_8.jpg', 3),
(9, 2, 'img_9.jpg', 4),
(10, 3, 'img_10.jpg', 1),
(11, 3, 'img_11.jpg', 2),
(12, 3, 'img_12.jpg', 3),
(13, 3, 'img_13.jpg', 4),
(14, 3, 'img_14.jpg', 5),
(15, 3, 'img_15.jpg', 6),
(16, 4, 'img_16.jpg', 1),
(17, 4, 'img_17.jpg', 2),
(18, 4, 'img_18.jpg', 3),
(19, 4, 'img_19.jpg', 4),
(20, 4, 'img_20.jpg', 5),
(21, 5, 'img_21.jpg', 1),
(22, 5, 'img_22.jpg', 2),
(23, 5, 'img_23.jpg', 3),
(24, 5, 'img_24.jpg', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `img`, `email_verified_at`, `password`, `remember_token`, `role`, `created_at`, `updated_at`) VALUES
(1, 'asd', 'nangaparbat73@mail.ru', NULL, NULL, NULL, '$2y$10$Yr/Aqo1nO/.FBMX3sAywGOedgbxdHp0dqT4Ql.681.crsh4VMGARa', '7pr9FI2bw3oogKqHb8sJoPXuptrlbLvm6FqLwIRqvZ9vonCFeq1I4mZVWkKG', 0, '2020-11-19 09:04:41', '2020-11-21 05:43:43'),
(2, 'TEST', 'TEST@mail.ru', NULL, NULL, NULL, '$2y$10$k4Sq6XdipGRkfSdSO4vhb.vzEIUOxk6AbTwJNbbClLkQJ14qLwOM.', 'p4uI8MtutzfEH87ZTZxNDt707mgPDCfcggupC5HIJpqCJfCTAj0XRGGeiDn6', 0, '2020-11-19 15:25:29', '2020-11-20 18:45:25'),
(3, 'Kənan', 'nangaparbat73@mail.rut', NULL, NULL, NULL, '$2y$10$qBEoZS40Ed7bUkI6JGbIzuZXRXZKnbhQWTP45s.UOegOLl06Af6h2', NULL, 0, '2020-11-19 15:41:11', '2020-11-19 15:41:11'),
(4, 'Kənan', 'nangaparbat@mail.ru', NULL, NULL, NULL, '$2y$10$rTScg6Gyv9OL79LlOlrbqekit8lVgwKXLnzEx9N/dFxzt6jyoVs9W', NULL, 0, '2020-11-20 04:33:22', '2020-11-20 04:33:22'),
(5, 'Tonia', 'Tonia73@mail.ru', NULL, NULL, NULL, '$2y$10$jhJf.l206pzudz4.dbIjTOvHMGtdDkY81uquu6r62ZbSjaCp2a4u6', NULL, 0, '2020-11-20 05:42:01', '2020-11-20 05:42:01'),
(6, 'wqd', 'ms@mail.ru', NULL, NULL, NULL, '$2y$10$aXwJykh0Y.7B8F1gMP3DY.VLswJh9YMqUuy.y9EUUY1A0sJIyVVLW', NULL, 0, '2020-11-20 18:53:08', '2020-11-20 18:53:08'),
(8, '123', 'test123@mail.ru', NULL, NULL, NULL, '$2y$10$FGJxnBFcBrGJO7k1IXOk2e9eOKNVVzobJ6kMVob2q3tTPr5uFeVui', NULL, 0, '2020-11-29 09:01:34', '2020-11-29 09:01:34'),
(9, '123', 'test1@mail.ru', NULL, NULL, NULL, '$2y$10$w4XRi10q6k/9u3PnhGWdfu4p8k63rrbBnCcz.JM0fqW06in/4NVe6', NULL, 0, '2020-11-29 09:08:50', '2020-11-29 09:08:50'),
(10, 'asdas', 'asdas@mai.ru', NULL, 'tesla.png', NULL, '$2y$10$th2PX/EQZVexk8EZI4fBLejnl0tzW9sAwKftugLTWx.mgMTUbSzrC', NULL, 0, '2020-11-29 09:23:10', '2020-11-29 09:23:10'),
(11, 'Admin', 'admin@gmail.com', '994504504334', NULL, NULL, '$2y$10$nCpCDI5u3k7ESwX5hlT4MugGcicUEeA9m83GP1F8b9ynCj7P6uBiq', NULL, 2, '2020-12-23 07:26:53', '2021-01-18 05:47:18');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_parent_id_index` (`code`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Индексы таблицы `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Ограничения внешнего ключа таблицы `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
--
-- База данных: `testworkunitedskills`
--
CREATE DATABASE IF NOT EXISTS `testworkunitedskills` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `testworkunitedskills`;

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'blog.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `code`, `img`, `created_at`, `updated_at`) VALUES
(1, 'World', 'world', 'blog.jpg', NULL, NULL),
(2, 'Technology', 'technology', 'blog.jpg', NULL, NULL),
(3, 'Design', 'design', 'blog.jpg', NULL, NULL),
(4, 'Science', 'science', 'blog.jpg', NULL, NULL),
(5, 'Travel', 'travel', 'blog.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` bigint UNSIGNED NOT NULL,
  `post_id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `parent_id` int UNSIGNED NOT NULL DEFAULT '0',
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_01_19_113655_create_posts_table', 1),
(5, '2021_01_19_120205_create_comments_table', 1),
(6, '2021_01_19_120314_create_categories_table', 1),
(7, '2014_10_12_200000_add_two_factor_columns_to_users_table', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'blog.jpg',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
