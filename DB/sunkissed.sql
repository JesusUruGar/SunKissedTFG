-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-12-2025 a las 23:29:51
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sunkissed`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `street` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `postal_code` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `extra_details` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `addresses`
--

INSERT INTO `addresses` (`id`, `order_id`, `street`, `city`, `postal_code`, `country`, `extra_details`, `created_at`, `updated_at`) VALUES
(1, 1, 'Calle cueva de la pileta 2', 'Sevilla', '41020', 'España', NULL, '2025-12-07 21:03:47', '2025-12-07 21:03:47'),
(2, 2, 'Calle cueva de la pileta 2', 'Sevilla', '41020', 'España', NULL, '2025-12-07 21:07:37', '2025-12-07 21:07:37'),
(3, 3, 'Calle cueva de la pileta 2', 'Sevilla', '41020', 'España', NULL, '2025-12-07 21:21:23', '2025-12-07 21:21:23'),
(4, 4, 'Calle cueva de la pileta 2', 'Sevilla', '41020', 'España', NULL, '2025-12-07 21:31:27', '2025-12-07 21:31:27'),
(5, 5, 'Calle cueva de la pileta 2', 'Sevilla', '41020', 'España', NULL, '2025-12-09 10:13:06', '2025-12-09 10:13:06'),
(6, 6, 'Calle cueva de la pileta 2', 'Sevilla', '41020', 'España', NULL, '2025-12-09 21:24:06', '2025-12-09 21:24:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Camisetas', 'Parte de arriba ligera e informal', '2025-12-07 20:59:19', '2025-12-07 20:59:19'),
(2, 'Pantalones', 'Parte de abajo', '2025-12-07 20:59:26', '2025-12-07 20:59:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_12_03_105834_create_products_table', 1),
(5, '2025_12_03_111433_create_orders_table', 1),
(6, '2025_12_06_194123_add_role_to_users_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total_amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 245.00, 'pending', '2025-12-07 21:03:47', '2025-12-07 21:03:47'),
(2, 1, 245.00, 'pending', '2025-12-07 21:07:37', '2025-12-07 21:07:37'),
(3, 1, 245.00, 'shipped', '2025-12-07 21:21:23', '2025-12-09 10:12:47'),
(4, 1, 165.00, 'delivered', '2025-12-07 21:31:27', '2025-12-09 10:12:26'),
(5, 1, 80.00, 'pending', '2025-12-09 10:13:06', '2025-12-09 10:13:06'),
(6, 1, 210.00, 'pending', '2025-12-09 21:24:06', '2025-12-09 21:24:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_stock_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_stock_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 1, 85.00, '2025-12-07 21:03:47', '2025-12-07 21:03:47'),
(2, 1, 6, 2, 40.00, '2025-12-07 21:03:47', '2025-12-07 21:03:47'),
(3, 1, 12, 1, 40.00, '2025-12-07 21:03:47', '2025-12-07 21:03:47'),
(4, 1, 11, 1, 40.00, '2025-12-07 21:03:47', '2025-12-07 21:03:47'),
(5, 2, 3, 1, 85.00, '2025-12-07 21:07:37', '2025-12-07 21:07:37'),
(6, 2, 6, 2, 40.00, '2025-12-07 21:07:37', '2025-12-07 21:07:37'),
(7, 2, 12, 1, 40.00, '2025-12-07 21:07:37', '2025-12-07 21:07:37'),
(8, 2, 11, 1, 40.00, '2025-12-07 21:07:37', '2025-12-07 21:07:37'),
(9, 3, 3, 1, 85.00, '2025-12-07 21:21:23', '2025-12-07 21:21:23'),
(10, 3, 6, 2, 40.00, '2025-12-07 21:21:23', '2025-12-07 21:21:23'),
(11, 3, 12, 1, 40.00, '2025-12-07 21:21:23', '2025-12-07 21:21:23'),
(12, 3, 11, 1, 40.00, '2025-12-07 21:21:23', '2025-12-07 21:21:23'),
(13, 4, 3, 1, 85.00, '2025-12-07 21:31:27', '2025-12-07 21:31:27'),
(14, 4, 6, 1, 40.00, '2025-12-07 21:31:27', '2025-12-07 21:31:27'),
(15, 4, 11, 1, 40.00, '2025-12-07 21:31:27', '2025-12-07 21:31:27'),
(16, 5, 6, 2, 40.00, '2025-12-09 10:13:06', '2025-12-09 10:13:06'),
(17, 6, 2, 2, 85.00, '2025-12-09 21:24:06', '2025-12-09 21:24:06'),
(18, 6, 7, 1, 40.00, '2025-12-09 21:24:06', '2025-12-09 21:24:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `method` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `transaction_code` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `payments`
--

INSERT INTO `payments` (`id`, `order_id`, `method`, `status`, `transaction_code`, `created_at`, `updated_at`) VALUES
(1, 1, 'card', 'pending', NULL, '2025-12-07 21:03:47', '2025-12-07 21:03:47'),
(2, 2, 'card', 'pending', NULL, '2025-12-07 21:07:37', '2025-12-07 21:07:37'),
(3, 3, 'card', 'pending', NULL, '2025-12-07 21:21:23', '2025-12-07 21:21:23'),
(4, 4, 'paypal', 'pending', NULL, '2025-12-07 21:31:27', '2025-12-07 21:31:27'),
(5, 5, 'cash', 'pending', NULL, '2025-12-09 10:13:06', '2025-12-09 10:13:06'),
(6, 6, 'card', 'pending', NULL, '2025-12-09 21:24:06', '2025-12-09 21:24:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 'LA DURA VIDA TEE', 'Camiseta blanca slim fit con diseño en rojo', 40.00, '2025-12-07 20:59:58', '2025-12-07 20:59:58'),
(2, 1, 'BIG RACE TEE', 'Camiseta blanca boxy fit con diseño en rosa', 40.00, '2025-12-07 21:00:37', '2025-12-07 21:00:37'),
(3, 2, 'SHADOW PANTS 2.0', 'Pantalon corto negro informal', 85.00, '2025-12-07 21:01:25', '2025-12-07 21:01:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `is_primary` tinyint(1) NOT NULL DEFAULT 0,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image_path`, `is_primary`, `order`, `created_at`, `updated_at`) VALUES
(1, 1, '1765144798_camiseta_delante.webp', 1, 1, '2025-12-07 20:59:58', '2025-12-07 21:00:10'),
(2, 1, '1765144798_camiseta_detras.webp', 0, 3, '2025-12-07 20:59:58', '2025-12-07 21:00:10'),
(3, 1, '1765144798_camiseta_lookbook_back.webp', 0, 4, '2025-12-07 20:59:58', '2025-12-07 21:00:10'),
(4, 1, '1765144798_camiseta_lookbook_front.webp', 0, 0, '2025-12-07 20:59:58', '2025-12-07 21:00:10'),
(5, 1, '1765144798_camiseta_lookbook_side.webp', 0, 2, '2025-12-07 20:59:58', '2025-12-07 21:00:10'),
(6, 2, '1765144837_coche_lookbook_close_f.webp', 0, 5, '2025-12-07 21:00:37', '2025-12-07 21:00:59'),
(7, 2, '1765144837_coche_lookbook_close_m.webp', 0, 4, '2025-12-07 21:00:37', '2025-12-07 21:00:59'),
(8, 2, '1765144837_coche_lookbook_front_f.webp', 0, 2, '2025-12-07 21:00:37', '2025-12-07 21:00:59'),
(9, 2, '1765144837_coche_lookbook_front_m.webp', 0, 0, '2025-12-07 21:00:37', '2025-12-07 21:00:59'),
(10, 2, '1765144837_coches_back.jpg', 0, 3, '2025-12-07 21:00:37', '2025-12-07 21:00:59'),
(11, 2, '1765144837_coches_front.jpg', 1, 1, '2025-12-07 21:00:37', '2025-12-07 21:00:59'),
(12, 3, '1765144885_short_back.webp', 0, 3, '2025-12-07 21:01:25', '2025-12-07 21:01:53'),
(13, 3, '1765144885_short_front.webp', 1, 1, '2025-12-07 21:01:25', '2025-12-07 21:01:53'),
(14, 3, '1765144885_short_lookbook_back_f.jpg', 0, 7, '2025-12-07 21:01:25', '2025-12-07 21:01:53'),
(15, 3, '1765144885_short_lookbook_back_m.jpg', 0, 6, '2025-12-07 21:01:25', '2025-12-07 21:01:53'),
(16, 3, '1765144885_short_lookbook_front_f.webp', 0, 2, '2025-12-07 21:01:25', '2025-12-07 21:01:53'),
(17, 3, '1765144885_short_lookbook_front_m.jpg', 0, 0, '2025-12-07 21:01:25', '2025-12-07 21:01:53'),
(18, 3, '1765144885_short_lookbook_side_f.jpg', 0, 5, '2025-12-07 21:01:25', '2025-12-07 21:01:53'),
(19, 3, '1765144885_short_lookbook_side_m.jpg', 0, 4, '2025-12-07 21:01:25', '2025-12-07 21:01:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_stocks`
--

CREATE TABLE `product_stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `size` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `product_stocks`
--

INSERT INTO `product_stocks` (`id`, `product_id`, `size`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 3, 's', 32, '2025-12-07 21:02:05', '2025-12-07 21:02:25'),
(2, 3, 'm', 10, '2025-12-07 21:02:08', '2025-12-09 21:24:06'),
(3, 3, 'l', 13, '2025-12-07 21:02:11', '2025-12-08 10:18:11'),
(4, 3, 'xl', 30, '2025-12-07 21:02:15', '2025-12-07 21:02:25'),
(5, 2, 's', 22, '2025-12-07 21:02:29', '2025-12-07 21:02:51'),
(6, 2, 'm', 0, '2025-12-07 21:02:31', '2025-12-09 10:13:06'),
(7, 2, 'l', 12, '2025-12-07 21:02:34', '2025-12-09 21:24:06'),
(8, 2, 'xl', 45, '2025-12-07 21:02:37', '2025-12-07 21:02:51'),
(9, 1, 's', 0, '2025-12-07 21:03:01', '2025-12-07 21:03:01'),
(10, 1, 'm', 0, '2025-12-07 21:03:03', '2025-12-07 21:03:03'),
(11, 1, 'l', 9, '2025-12-07 21:03:06', '2025-12-07 21:31:27'),
(12, 1, 'xl', 17, '2025-12-07 21:03:09', '2025-12-07 21:21:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('kwIL7pSde7MKd04wnm3XQ6pvTUndqGa5i18jn5Lb', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiS1VHcVVkYWN4QXFVVHYyNTRnR2kxRnRCMDE4bG9ZUWNhTk5HWDFRViI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjI6Imh0dHA6Ly9zdW5raXNzZWQubG9jYWwiO3M6NToicm91dGUiO3M6NDoiaG9tZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1765319087),
('MilV0Xgc7G79sTCGDgXelWtbSWsYFFS3efvRLxE4', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiN3hDOGZ5cG5tbHNibjVCRjcyM085YndSMkdhMHN0dmQ1MFhTa0dPQyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjI6Imh0dHA6Ly9zdW5raXNzZWQubG9jYWwiO3M6NToicm91dGUiO3M6NDoiaG9tZSI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1765307445);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Jesús', 'jesus.uru.gar.per@gmail.com', NULL, '$2y$12$e7E/c7E4UwaouA0N7DvdUuneIpKJhd01HdkKF47GkY/BsWkX4Zlm6', NULL, '2025-12-07 20:57:55', '2025-12-09 10:09:13', 'admin'),
(2, 'Paco', 'paco@paco.paco', NULL, '$2y$12$DK/lRjc1BZMI63mZLBS5..RKOFMVM.vZnJprcexspqofuCoCwAMR2', NULL, '2025-12-09 10:53:13', '2025-12-09 10:53:13', 'user');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_order_id_foreign` (`order_id`);

--
-- Indices de la tabla `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indices de la tabla `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_stock_id_foreign` (`product_stock_id`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_order_id_foreign` (`order_id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_name_unique` (`name`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indices de la tabla `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indices de la tabla `product_stocks`
--
ALTER TABLE `product_stocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_stocks_product_id_foreign` (`product_id`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `product_stocks`
--
ALTER TABLE `product_stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_stock_id_foreign` FOREIGN KEY (`product_stock_id`) REFERENCES `product_stocks` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Filtros para la tabla `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `product_stocks`
--
ALTER TABLE `product_stocks`
  ADD CONSTRAINT `product_stocks_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
