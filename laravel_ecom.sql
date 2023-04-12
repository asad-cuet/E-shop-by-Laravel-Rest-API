-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2022 at 09:54 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `prod_id`, `prod_qty`, `created_at`, `updated_at`) VALUES
(109, '1', '16', '5', '2022-05-26 13:34:21', '2022-07-11 08:34:44'),
(111, '1', '6', '3', '2022-06-12 12:19:52', '2022-07-11 08:34:43'),
(112, '1', '13', '3', '2022-06-12 12:20:13', '2022-07-11 08:34:41');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `popular` tinyint(4) NOT NULL DEFAULT 0,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_descript` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `status`, `popular`, `image`, `meta_title`, `meta_descript`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(6, 'Mobile', 'mobile', 'Mobile', 1, 1, '627ac174a7d43.jpg', 'iphone', 'ddd', 'kk', '2022-05-10 13:48:04', '2022-05-10 14:00:10'),
(7, 'T-Shirt', 'T-Shirt', '...', 1, 1, '628bcc702ed3a.jpeg', 'T-Shirt', 'Here is awesome shirts', 'T-Shirt, Shirt, black shirt', '2022-05-23 12:03:28', '2022-05-27 13:20:42'),
(8, 'Islamic Book', 'Islamic-Book', 'rgerg', 1, 1, '628c768c997a3.jpeg', 'eefew', 'fefewf', 'ewfwef', '2022-05-24 00:09:16', '2022-05-27 13:02:29');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_05_10_161436_create_categories_table', 2),
(6, '2022_05_11_111217_create_products_table', 3),
(7, '2022_05_12_175905_create_carts_table', 4),
(8, '2022_05_14_203103_create_orders_table', 5),
(9, '2022_05_14_203129_create_order_items_table', 5),
(10, '2022_05_18_163236_create_wishlists_table', 6),
(11, '2022_05_21_093505_create_ratings_table', 7),
(12, '2022_05_21_184501_create_reviews_table', 8),
(13, '2022_05_21_185430_create_reviews_table', 9),
(14, '2022_05_30_164349_create_settings_table', 10),
(15, '2022_06_02_150709_create_views_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` bigint(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `payment_mode` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tracking_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `fname`, `lname`, `email`, `phone`, `address1`, `address2`, `city`, `state`, `country`, `pincode`, `total_price`, `status`, `payment_mode`, `payment_id`, `message`, `tracking_no`, `created_at`, `updated_at`) VALUES
(1, 1, 'Asadul', 'Islam', 'asadul7733@gmail.com', '01781856861', 'Shoronika', NULL, 'Savar', 'Dhaka', 'Bangladesh', '1234', 20, 0, 'COD', NULL, NULL, 'asad6521', '2022-05-26 13:33:48', '2022-05-26 13:33:48'),
(2, 4, 'Asadul', 'Islam', 'user3@gmail.com', '01781856861', 'Shoronika', NULL, 'Savar', 'Dhaka', 'Bangladesh', '1234', 22, 0, 'COD', NULL, NULL, 'asad6881', '2022-05-27 12:39:01', '2022-05-27 12:39:01'),
(3, 4, 'Asadul', 'Islam', 'user3@gmail.com', '01781856861', 'Shoronika', NULL, 'Savar', 'Dhaka', 'Bangladesh', '1234', 11, 0, 'COD', NULL, NULL, 'asad9452', '2022-05-27 12:40:19', '2022-05-27 12:40:19');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `prod_id`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(1, '1', '16', 2, 10, '2022-05-26 13:33:48', '2022-05-26 13:33:48'),
(2, '2', '13', 2, 11, '2022-05-27 12:39:01', '2022-05-27 12:39:01'),
(3, '3', '13', 1, 11, '2022-05-27 12:40:19', '2022-05-27 12:40:19');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('asadul7733@gmail.com', '$2y$10$J4ApVdciXjT65QwJC7UoneDow/R7ontFz9Yu3cE95W6XXKL1ogUT6', '2022-05-23 13:11:10'),
('asadul77330@gmail.com', '$2y$10$K1szd71ZtfI/.aer1IhygebgUUdcF2u7wNH6D9qJtXvMBgvGfeUFu', '2022-05-23 13:12:09');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cate_id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `small_description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `original_price` int(255) NOT NULL,
  `selling_price` int(255) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` int(255) NOT NULL,
  `tax` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `trending` tinyint(4) NOT NULL,
  `meta_title` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_descript` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `cate_id`, `name`, `slug`, `small_description`, `description`, `original_price`, `selling_price`, `image`, `qty`, `tax`, `status`, `trending`, `meta_title`, `meta_keywords`, `meta_descript`, `created_at`, `updated_at`) VALUES
(6, 6, 'Oppo A5', 'dem6', 'Fantastic Phone', 'You should buy it', 7, 5, '627bddb566b0d.jpg', 10, '300', 1, 1, 'demo', 'oppo,phone', 'mmmm', '2022-05-11 10:00:53', '2022-05-27 12:57:34'),
(7, 6, 'Mobile', 'dem5', 'ewd', 'werew', 13, 2, '627c242147f36.jpg', 0, '300', 1, 1, 'iphone', 'kk', 'ewfewf', '2022-05-11 15:01:21', '2022-05-27 12:57:35'),
(8, 6, 'Mobile', 'dem3', 'ewfew', 'ewfwef', 13, 15, '627c244d3b4b4.jpg', 7, '300', 1, 1, 'ewfef', 'jhvhjv', 'ewfwe', '2022-05-11 15:02:05', '2022-05-27 12:57:35'),
(9, 6, 'Mobile', 'dem2', 'dfwef', 'This product is awesome.The feedback of this phone is strong.Ram 4GB, Rom 64 GB, 48 px Camera. Bettery is 5000 mah fast charging.', 8, 6, '627c246f926e7.jpg', -1, '300', 1, 1, 'ewfef', 'jhvhjv', 'ewfwef', '2022-05-11 15:02:39', '2022-05-27 12:57:35'),
(10, 6, 'demo', 'demo1', 'wefew', 'wefwef', 15000, 12000, '627c2490a623d.jpg', 0, '300', 1, 1, 'jhhg', 'ewfwef', 'sdfwef', '2022-05-11 15:03:12', '2022-05-27 12:57:35'),
(11, 6, 'Asad', 'Asad', 'dsvadv', 'ascasdvsa', 13, 15, '627ce10056a58.jpg', 0, '300', 1, 1, 'jhhg', 'kk', 'asfasfc', '2022-05-12 04:27:12', '2022-05-27 12:57:35'),
(12, 7, 'Black Shirt', 'Black-Shirt', 'fesefewf', 'sdvds', 12, 10, '628bcd2d1a500.jpeg', 9, '-1', 1, 0, 'fwef', 'efwe', 'dfcwef', '2022-05-23 12:06:37', '2022-05-27 12:57:35'),
(13, 7, 'Blue Shirt', 'Blue-Shirt', '<p>asad</p>', '<p>efwe</p>', 13, 11, '628bcd7805d75.jpg', 3, '0', 1, 1, 'efwe', 'wefew', 'esfwef', '2022-05-23 12:07:52', '2022-05-27 12:57:35'),
(14, 7, 'Black Shirt', 'Black-Shirt-', '<p>dsvsv</p>', '<p>dsd</p>', 10, 8, '628bce0a27052.jpg', 11, '0', 1, 0, 'afqf', 'wdwqd', 'ascasc', '2022-05-23 12:10:18', '2022-06-02 09:24:45'),
(15, 7, 'Light Shirt', 'Light-Shirt', 'sdfwef', 'wefwe', 7, 6, '628bce2c3988e.jpg', 10, '0', 1, 0, 'fwef', 'ewfwe', 'efwef', '2022-05-23 12:10:52', '2022-05-27 12:57:35'),
(16, 7, 'Gray Shirt', 'Gray-Shirt', '<h2>This T Shirt is Awesome</h2>\r\n<p>The t shirt is so well. This is an <em><strong>exception piece.</strong></em></p>', '<h2>This T Shirt is Awesome</h2>\r\n<p>The t shirt is so well. This is exception piece</p>', 12, 10, '628bce4e62d46.jpg', 6, '0', 1, 1, 'wr23r', 'r23r', 'wr23r', '2022-05-23 12:11:26', '2022-05-27 12:57:35');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `stars_rated` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `user_id`, `prod_id`, `stars_rated`, `created_at`, `updated_at`) VALUES
(1, 1, 9, 4, '2022-05-21 04:41:12', '2022-05-23 10:46:52'),
(2, 1, 6, 4, '2022-05-21 04:46:56', '2022-05-21 04:59:01'),
(3, 1, 7, 4, '2022-05-22 10:39:16', '2022-05-22 10:39:16'),
(4, 1, 8, 4, '2022-05-22 10:40:23', '2022-05-22 10:40:23'),
(5, 2, 9, 4, '2022-05-22 10:44:35', '2022-05-22 10:44:35'),
(6, 5, 9, 5, '2022-05-22 10:54:19', '2022-05-22 10:54:19'),
(7, 1, 10, 3, '2022-05-23 11:39:36', '2022-05-23 11:45:56'),
(8, 1, 16, 4, '2022-05-24 02:53:50', '2022-05-27 12:58:05'),
(9, 1, 13, 4, '2022-05-24 02:56:18', '2022-05-24 02:56:18'),
(10, 1, 12, 5, '2022-05-24 03:07:43', '2022-05-24 03:07:43');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `user_review` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `prod_id`, `user_review`, `created_at`, `updated_at`) VALUES
(1, 1, 9, 'I got the accurate product...', '2022-05-22 03:56:28', '2022-05-22 04:58:03'),
(3, 1, 7, 'Awesome', '2022-05-22 10:39:45', '2022-05-22 10:39:45'),
(4, 2, 9, 'Awesome', '2022-05-22 10:44:55', '2022-05-22 10:44:55'),
(5, 5, 9, 'Joss..', '2022-05-22 10:53:58', '2022-05-22 10:53:58'),
(6, 1, 9, 'zxczc', '2022-05-22 11:05:50', '2022-05-22 11:05:50'),
(7, 1, 10, 'awesome...', '2022-05-23 11:39:49', '2022-05-23 11:46:26'),
(8, 1, 12, 'awesome', '2022-05-24 03:05:57', '2022-05-24 03:05:57'),
(9, 1, 16, 'awesome', '2022-05-27 12:58:24', '2022-05-27 12:58:24');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `favicon` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer_descript` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `nav_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_image1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_image2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_image3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_descript` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `logo`, `favicon`, `title`, `name`, `footer_descript`, `nav_color`, `body_color`, `banner_image1`, `banner_image2`, `banner_image3`, `meta_title`, `meta_keywords`, `meta_descript`, `created_at`, `updated_at`) VALUES
(1, '6298eda5c9eec.jpeg', '6298ee7a9c89a.jpeg', 'Welcome to E-Shop', 'E-Shop', '<h3 style=\"text-align: center;\">Description</h3>\r\n<p style=\"text-align: center;\">This website is to make easy your shopping. You can buy anything from here. Cash-on-delivery or Online payment is available here.</p>\r\n<h3 style=\"text-align: center;\">Contact</h3>\r\n<p style=\"text-align: center;\"><strong>Phone :</strong> xxxxxx</p>\r\n<p style=\"text-align: center;\"><strong>Email :</strong> <a href=\"mailto:assadul7733@gmail.com\">assadul7733@gmail.com</a></p>\r\n<p style=\"text-align: center;\">&nbsp;</p>\r\n<p style=\"text-align: center;\">&nbsp;</p>', 'navbar-dark bg-dark', 'bg-light text-dark', '6295e01d123ea.jpg', '6295dffc650d6.jpg', '6295e0401687b.jpg', 'E-shop', 'ecommerce', 'online shopping', NULL, '2022-06-02 11:08:10');

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
  `role_as` tinyint(255) NOT NULL DEFAULT 0,
  `fname` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lname` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pincode` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_as`, `fname`, `lname`, `phone`, `address1`, `address2`, `city`, `state`, `country`, `pincode`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Asadul Islam', 'asadul7733@gmail.com', '2022-05-01 19:07:04', '$2y$10$dBUY95eg.3KPlDZ3zp42VuHegcfoM6c3610yfRcXU2D7oh0zYpSfC', 1, 'Asadul', 'Islam', '01781856861', 'Shoronika', NULL, 'Savar', 'Dhaka', 'Bangladesh', '1234', 'iLEjRm19zfaseNEv0dUvYWzQYY6MRYJBQNBob58wMu48zfHQMWZfdmRbBMc9', '2022-05-10 06:13:59', '2022-05-14 15:03:36'),
(2, 'User', 'user@gmail.com', NULL, '$2y$10$tLvCFnBq2/N/JM9h0/E/Z.mAO4yQNY6YHJkwVN0FRiH2TVEzHBLfK', 0, 'User', 'User', '01781856861', 'Shoronika', NULL, 'Savar', 'Dhaka', 'Bangladesh', '1234', NULL, '2022-05-10 07:00:44', '2022-05-17 10:32:36'),
(3, 'User 2', 'user2@gmail.com', NULL, '$2y$10$HnOSP9m.SyT2xr5zcK6rpuuxEfX8jmLGJY9F8vvZVho4sSmKsbO1a', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-22 10:45:42', '2022-05-22 10:45:42'),
(4, 'User 3', 'user3@gmail.com', NULL, '$2y$10$OcLeX8gj/.49djTOQ2XOYOWpjClKpu8YNLhFtqWeStQ/wJZh//ML.', 0, 'Asadul', 'Islam', '01781856861', 'Shoronika', NULL, 'Savar', 'Dhaka', 'Bangladesh', '1234', NULL, '2022-05-22 10:48:38', '2022-05-27 12:39:01'),
(5, 'User 4', 'user4@gmail.com', NULL, '$2y$10$q9m0EMJ7NprrHvkB5gYdveIE/JEAuEI8Q7Sw/bA8hAu6JXSCPWwhS', 0, 'User', 'User', '01781856861', 'Shoronika', NULL, 'Savar', 'Dhaka', 'Bangladesh', '1340', NULL, '2022-05-22 10:50:46', '2022-05-22 10:53:43'),
(6, 'User 5', 'user5@gmail.com', NULL, '$2y$10$Z7.aYCvZxaTJkhoKjp8wiuCfwFRzBtX/4WPL/Bmg65zh94tIQN0gO', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-23 12:33:42', '2022-05-23 12:33:42'),
(10, 'Asad 2', 'asadul77330@gmail.com', NULL, '$2y$10$JqpQkicpqr/NXIaCmODYruk4Hl5ycUvraakeFCPMHj/cq8n/4JEZa', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-23 12:51:57', '2022-05-23 12:51:57');

-- --------------------------------------------------------

--
-- Table structure for table `views`
--

CREATE TABLE `views` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prod_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `views`
--

INSERT INTO `views` (`id`, `prod_id`, `ip`, `created_at`, `updated_at`) VALUES
(1, '13', '127.0.0.1', '2022-06-02 09:18:40', '2022-06-02 09:18:40'),
(2, '16', '127.0.0.1', '2022-06-02 09:19:22', '2022-06-02 09:19:22'),
(3, '12', '127.0.0.1', '2022-06-02 09:19:56', '2022-06-02 09:19:56'),
(4, '6', '127.0.0.1', '2022-06-02 09:23:12', '2022-06-02 09:23:12'),
(5, '14', '127.0.0.1', '2022-06-02 09:25:00', '2022-06-02 09:25:00'),
(6, '9', '127.0.0.1', '2022-07-11 08:38:45', '2022-07-11 08:38:45'),
(7, '10', '127.0.0.1', '2022-07-11 08:40:54', '2022-07-11 08:40:54');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `prod_id`, `created_at`, `updated_at`) VALUES
(5, 2, 9, '2022-05-22 10:43:31', '2022-05-22 10:43:31'),
(9, 1, 9, '2022-07-11 08:39:12', '2022-07-11 08:39:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `views`
--
ALTER TABLE `views`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
