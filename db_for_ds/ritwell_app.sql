-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2023 at 04:02 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ritwell_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(11, '2022_12_14_143801_recipe_table', 3),
(12, '2022_12_14_144059_create_recipe_table', 3),
(87, '2014_10_12_000000_create_users_table', 4),
(88, '2014_10_12_100000_create_password_resets_table', 4),
(89, '2016_06_01_000001_create_oauth_auth_codes_table', 4),
(90, '2016_06_01_000002_create_oauth_access_tokens_table', 4),
(91, '2016_06_01_000003_create_oauth_refresh_tokens_table', 4),
(92, '2016_06_01_000004_create_oauth_clients_table', 4),
(93, '2016_06_01_000005_create_oauth_personal_access_clients_table', 4),
(94, '2019_08_19_000000_create_failed_jobs_table', 4),
(95, '2019_12_14_000001_create_personal_access_tokens_table', 4),
(96, '2022_12_09_142248_create_products_table', 4),
(97, '2022_12_14_145507_create_recipe_table', 4),
(98, '2022_12_29_144330_create_special_events_table', 4),
(99, '2023_01_16_141607_create_nutrition_plan_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `nutrition_plan`
--

CREATE TABLE `nutrition_plan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `calories` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proteins` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `carbohydrates` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timeOfDay` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nutrition_plan`
--

INSERT INTO `nutrition_plan` (`id`, `created_at`, `updated_at`, `title`, `description`, `calories`, `proteins`, `carbohydrates`, `timeOfDay`, `image`) VALUES
(1, '2023-01-18 14:09:13', '2023-01-18 14:09:13', 'Banan', 'banana', 'aygdsyg', 'asuhdaosd', 'uaoihsdoiahsdoad', 'Breakfast', '/storage/images/NIYfx6YvuyBntALdJu0q7SHWXYM40kmmZ4BKMSXQ.jpg'),
(2, '2023-01-18 14:09:47', '2023-01-18 14:09:47', 'Banan', 'banana', 'aygdsyg', 'asuhdaosd', 'uaoihsdoiahsdoad', 'Breakfast', '/storage/images/Aye4Pe06pg0k86N9gAoW1Wrma3567FF8DLxTdbcE.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'MyApp', '4feb89c3be6a9d665efd32cc83dcc844682f62377809ee7c33cff6abe19277a5', '[\"*\"]', NULL, NULL, '2023-01-20 13:35:13', '2023-01-20 13:35:13'),
(2, 'App\\Models\\User', 1, 'main', 'b112b439e865c35dd8500b8b99752dce053ace69c54149b7a58c3ddea72e60f7', '[\"*\"]', NULL, NULL, '2023-01-20 13:45:03', '2023-01-20 13:45:03'),
(3, 'App\\Models\\User', 2, 'MyApp', '06f9e34e7c8cb8c52a05a74c15ff9b56caca8c5ec15b33abcb85e198e912ee90', '[\"*\"]', NULL, NULL, '2023-01-20 13:45:56', '2023-01-20 13:45:56'),
(4, 'App\\Models\\User', 2, 'main', '8b95728cf885ed6b0b485e561287e808c55dd7c35c85bc84ae8b8aef51653559', '[\"*\"]', NULL, NULL, '2023-01-20 13:46:36', '2023-01-20 13:46:36'),
(5, 'App\\Models\\User', 2, 'main', '3d5ca18bd903778387315b824ba29052a776b7af3e626dd7a38731ecb0a7e48a', '[\"*\"]', NULL, NULL, '2023-01-20 13:48:47', '2023-01-20 13:48:47'),
(6, 'App\\Models\\User', 2, 'main', '0b37e74230e80f3bdbcebe25114aa668fcb11f6538d4822147bac4dbd27ae805', '[\"*\"]', NULL, NULL, '2023-01-20 13:49:48', '2023-01-20 13:49:48'),
(7, 'App\\Models\\User', 2, 'main', '6ebb38356805caa38340dbadbdc14a3ffe8c9257c59b26db3427dd047c038a61', '[\"*\"]', NULL, NULL, '2023-01-20 13:56:44', '2023-01-20 13:56:44'),
(8, 'App\\Models\\User', 2, 'main', '73f8e18278059996ae6603138365459c0981e21c815728eed31409d2658232eb', '[\"*\"]', NULL, NULL, '2023-01-20 14:10:07', '2023-01-20 14:10:07'),
(9, 'App\\Models\\User', 2, 'main', '931393757f9d48e44ba45b4877dff6521faefbacb946f9bee4a58aca5be2a2cd', '[\"*\"]', NULL, NULL, '2023-01-23 13:04:33', '2023-01-23 13:04:33'),
(10, 'App\\Models\\User', 2, 'main', 'b606e47f7f6d07f6a43f430417dc5c4a5ec85b738996dbe86340e76a80beb34f', '[\"*\"]', NULL, NULL, '2023-01-23 13:34:29', '2023-01-23 13:34:29'),
(11, 'App\\Models\\User', 2, 'main', '9b94cbe274e00dcde876a0a29bad4ab3a9182a6db5bb01eeb7379e458051d6a6', '[\"*\"]', NULL, NULL, '2023-01-23 13:36:44', '2023-01-23 13:36:44'),
(12, 'App\\Models\\User', 2, 'main', 'c6f4be47145622c482c1d1dcb84899e0bad308d7a22066d8fc8832a708f77fa6', '[\"*\"]', NULL, NULL, '2023-01-23 13:40:12', '2023-01-23 13:40:12'),
(13, 'App\\Models\\User', 2, 'main', '5f0628b84690f47eeab08b3436191b66121f22cef930e25e2da782d0677ba700', '[\"*\"]', NULL, NULL, '2023-01-23 13:48:42', '2023-01-23 13:48:42'),
(14, 'App\\Models\\User', 2, 'main', 'ee52a1e86ef8ee1fb09608d3459f1f7b9cb8c0a8f7f206902f2aa0dbc98d177c', '[\"*\"]', NULL, NULL, '2023-01-24 13:44:29', '2023-01-24 13:44:29'),
(15, 'App\\Models\\User', 2, 'main', 'bfba1b82eb3761d374765f004c4556268aef23ab1a7c19ab485608a5a7ed3835', '[\"*\"]', NULL, NULL, '2023-01-24 13:50:59', '2023-01-24 13:50:59'),
(16, 'App\\Models\\User', 2, 'main', 'ff1ce4cfc054f5c1ee77521c5eca0ca42a0dd4ec3badccc3b7e3d1f28953240d', '[\"*\"]', NULL, NULL, '2023-01-24 13:51:37', '2023-01-24 13:51:37');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `details`, `image`, `created_at`, `updated_at`) VALUES
(1, 'ahudauishdiauhsd', 'sdasdasda', '/storage/images/7WiL1P3vidbKwm8ZKkofZnFoVUtD1EQAnStcvqY6.jpg', '2023-01-18 14:22:48', '2023-01-18 14:22:48');

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

CREATE TABLE `recipe` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recipe` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` (`id`, `title`, `recipe`, `time`, `image`, `created_at`, `updated_at`) VALUES
(1, 'ahudauishdiauhsd', 'sdasdasda', '15', '/storage/images/7WNAzhdmpLZe1IxppTPPCBOuVCBnwuqACd0MQ8Vu.jpg', '2023-01-18 14:15:07', '2023-01-18 14:15:07'),
(2, 'ahudauishdiauhsd', 'sdasdasda', '15', '/storage/images/ikMZYuGBVQunvDA8dOjSoV8dg4Uf6b7Blwh1rS9P.jpg', '2023-01-18 14:15:34', '2023-01-18 14:15:34');

-- --------------------------------------------------------

--
-- Table structure for table `special_events`
--

CREATE TABLE `special_events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `eventType` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'bob', 'bob@gmail.com', NULL, '$2y$10$AptK4UzoQvZzU8qCq7eLxuh7Y5Wg.BwETYXi7x3wJ7mpF5U029ZKK', 0, NULL, '2023-01-20 13:35:12', '2023-01-20 13:35:12'),
(2, 'bob', 'bobiii@gmail.com', NULL, '$2y$10$vKVGYs0snFf89q0NSIh/IuACQ6Ve/JnnDYaagHLNkfn9h5buKQ2h6', 1, NULL, '2023-01-20 13:45:56', '2023-01-20 13:45:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nutrition_plan`
--
ALTER TABLE `nutrition_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `special_events`
--
ALTER TABLE `special_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `nutrition_plan`
--
ALTER TABLE `nutrition_plan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `recipe`
--
ALTER TABLE `recipe`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `special_events`
--
ALTER TABLE `special_events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
