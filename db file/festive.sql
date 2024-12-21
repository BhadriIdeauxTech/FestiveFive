-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2024 at 05:47 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `festive`
--

-- --------------------------------------------------------

--
-- Table structure for table `catalogs`
--

CREATE TABLE `catalogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `catalog_name` varchar(255) DEFAULT NULL,
  `slug_catalog_name` varchar(255) DEFAULT NULL,
  `catalog_image` varchar(255) DEFAULT NULL,
  `catalog_pdf` varchar(255) DEFAULT NULL,
  `catalog_status` int(11) NOT NULL DEFAULT 1,
  `catalog_delete` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `catalogs`
--

INSERT INTO `catalogs` (`id`, `catalog_name`, `slug_catalog_name`, `catalog_image`, `catalog_pdf`, `catalog_status`, `catalog_delete`, `created_at`, `updated_at`) VALUES
(1, 'Corporate Gifts Products', 'corporategifts', 'corporate_gift_image.jpg', 'corporate_gifts_catalog.pdf', 1, 1, NULL, '2024-05-09 05:42:20'),
(2, 'sdfgghf', 'sdfgghf', '1715253228_2312.jpg', 'sdfgghf.pdf', 1, 0, NULL, NULL),
(3, 'fhdfyhrfh', 'fhdfyhrfh', '1715253264_8946.jpg', 'fhdfyhrfh.pdf', 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `slug_category_name` varchar(255) DEFAULT NULL,
  `category_image` varchar(255) DEFAULT NULL,
  `category_status` int(11) NOT NULL DEFAULT 1,
  `category_delete` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `slug_category_name`, `category_image`, `category_status`, `category_delete`, `created_at`, `updated_at`) VALUES
(1, 'Welcome Kits', 'welcome-kits', '1734504311_3472.jpg', 1, 1, NULL, '2024-12-18 01:18:39'),
(4, 'Eco-Friendly Gifts', 'eco-friendly-gifts', '1734505010_4197.png', 1, 1, NULL, '2024-12-18 01:26:50');

-- --------------------------------------------------------

--
-- Table structure for table `customer_enquiries`
--

CREATE TABLE `customer_enquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `message` longtext DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_enquiries`
--

INSERT INTO `customer_enquiries` (`id`, `firstname`, `lastname`, `message`, `email`, `date`, `created_at`, `updated_at`) VALUES
(1, 'P5Rc9v602f', 'HEwtwUCMeb', 'G7l87mXrVX', 'mtfpe@exeo.com', '2024-05-09', NULL, NULL),
(2, '5yrtyt', 'ertrtyrtyrtytry', 'afdgeryhqethasdgsfbzdrt aerghrtavdvvvfbg  aefgcv cvgtghzcfaEG CGHFDVB VB XZFDGBV XFGDFHCGDN ZXVGTGHBXZ BZSDFVHXDGV', 'drterygwer@gmail.com', '2024-05-09', NULL, NULL),
(3, 'asdfgasrfgv', 'ASDFghdtyj', 'fdgjhfggertearh srtfghsfgghsdghryh SEdtrtyjdghbnfty aertgsytVJKBIKFUYKHJM CGHJKvjhkgj,mn jh,khjkjhklfjm   icghnhndghjm', 'rajagopal@gmauil.com', '2024-05-09', NULL, NULL),
(4, 'clinton', 'premanand', 'festive five', 'clintonpremanand@gmail.com', '2024-12-10', NULL, NULL),
(5, 'clinton', 'premanand', 'festive five', 'clintonpremanand@gmail.com', '2024-12-12', NULL, NULL),
(6, 'Aneesh', 'Jb', 'Hi Hello', 'ane@gmail.com', '2024-12-18', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(23, '2014_10_12_000000_create_users_table', 1),
(24, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(25, '2014_10_12_100000_create_password_resets_table', 1),
(26, '2019_08_19_000000_create_failed_jobs_table', 1),
(27, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(28, '2024_01_03_065011_create_catalogs_table', 1),
(29, '2024_01_03_065028_create_categories_table', 1),
(30, '2024_01_03_065047_create_products_table', 1),
(32, '2024_04_30_112602_create_quotationlists_table', 1),
(33, '2024_04_30_112741_create_quotationproducts_table', 1),
(34, '2024_04_02_085111_create_customer_enquiries_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` varchar(255) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `slug_product_name` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `product_status` int(11) NOT NULL DEFAULT 1,
  `product_delete` int(11) NOT NULL DEFAULT 1,
  `date` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `product_name`, `slug_product_name`, `amount`, `product_image`, `product_status`, `product_delete`, `date`, `created_at`, `updated_at`) VALUES
(1, '1', 'obfv', 'obfv', '100', '1715234830_9265.jpg', 1, 1, '09-05-2024', NULL, '2024-05-09 00:37:10'),
(2, '3', 'umberla', 'umberla', '150', '1715234355_2036.png', 1, 1, '09-05-2024', NULL, NULL),
(3, '3', 'yp', 'yp', '200', '1715234496_1755.jpg', 1, 1, '09-05-2024', NULL, NULL),
(4, '3', 'tp', 'tp', '250', '1715234496_3785.png', 1, 1, '09-05-2024', NULL, NULL),
(5, '3', 'up', 'up', '275', '1715234496_4789.jpg', 1, 1, '09-05-2024', NULL, NULL),
(6, '2', 'ted01', 'ted01', '550', '1715234685_2450.jpg', 1, 1, '09-05-2024', NULL, NULL),
(7, '2', 'ted02', 'ted02', '650', '1715234685_5342.jpg', 1, 1, '09-05-2024', NULL, NULL),
(8, '2', 'ted03', 'ted03', '750', '1715234685_5884.jpg', 1, 1, '09-05-2024', NULL, NULL),
(9, '2', 'ted04', 'ted04', '900', '1715234685_5700.jpg', 1, 1, '09-05-2024', NULL, NULL),
(10, '1', 'elephant', 'elephant', '500', '1715235314_8770.jpg', 1, 1, '09-05-2024', NULL, NULL),
(11, '1', 'na', 'na', '451', '1715235314_4416.jpg', 1, 1, '09-05-2024', NULL, NULL),
(12, '1', 'dd', 'dd', '1521', '1715235314_4791.jpg', 1, 1, '09-05-2024', NULL, NULL),
(13, '1', 'sds', 'sds', '245', '1715235314_6061.jpg', 1, 1, '09-05-2024', NULL, NULL),
(14, '1', 'wa', 'wa', '400', '1715235314_3311.jpg', 1, 1, '09-05-2024', NULL, NULL),
(15, '1', 'lion', 'lion', '450', '1715235314_1589.jpg', 1, 1, '09-05-2024', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quotationlists`
--

CREATE TABLE `quotationlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `message` longtext DEFAULT NULL,
  `quotationlists_status` int(11) NOT NULL DEFAULT 1,
  `quotationlists_delete` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quotationlists`
--

INSERT INTO `quotationlists` (`id`, `first_name`, `last_name`, `company_name`, `phone`, `email`, `message`, `quotationlists_status`, `quotationlists_delete`, `created_at`, `updated_at`) VALUES
(1, 'KLBHuTXqTI', 'zI7PDIHsxr', '6kONi4vU4e', '358228', 'pebba@kqpf.com', '35MneNYi5Y', 1, 1, '2024-05-08 06:01:57', '2024-05-08 06:01:57'),
(2, 'colin', 'b', 'DD store', '9636592652', 'admin@gmail.com', 'decode bar', 1, 1, '2024-05-09 00:52:32', '2024-05-09 00:52:32'),
(3, 'colin', 'b', 'DD store', '3242456357', 'ideauxF5@superadmin.com', 'sdbfcgnvbhmnm', 1, 1, '2024-05-09 00:54:12', '2024-05-09 00:54:12'),
(4, 'colin', 'b', 'DD store', '9985656532', 'admin@gmail.com', 'sddscxvgvcxvxcgcvbfgsdcdgvsdvscxvcs', 1, 1, '2024-05-09 03:54:54', '2024-05-09 03:54:54');

-- --------------------------------------------------------

--
-- Table structure for table `quotationproducts`
--

CREATE TABLE `quotationproducts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quotationlists_id` int(11) DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quotationproducts`
--

INSERT INTO `quotationproducts` (`id`, `quotationlists_id`, `product_image`, `product_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'https://dev.festivefive.in/product_image/1715166389_1221.jpg', 'obfv', '2024-05-08 06:01:57', '2024-05-08 06:01:57'),
(2, 2, 'https://dev.festivefive.in/product_image/1715235314_8770.jpg', 'elephant', '2024-05-09 00:52:32', '2024-05-09 00:52:32'),
(3, 3, 'https://dev.festivefive.in/product_image/1715235314_8770.jpg', 'elephant', '2024-05-09 00:54:12', '2024-05-09 00:54:12'),
(4, 4, 'https://dev.festivefive.in/product_image/1715234830_9265.jpg', 'obfv', '2024-05-09 03:54:54', '2024-05-09 03:54:54'),
(5, 4, 'https://dev.festivefive.in/product_image/1715235314_8770.jpg', 'elephant', '2024-05-09 03:54:54', '2024-05-09 03:54:54'),
(6, 4, 'https://dev.festivefive.in/product_image/1715235314_4416.jpg', 'na', '2024-05-09 03:54:54', '2024-05-09 03:54:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 0,
  `status` varchar(255) NOT NULL DEFAULT '1',
  `delete` varchar(255) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `type`, `status`, `delete`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ideaux', 'ideaux@superadmin.com', NULL, '$2y$10$QnVDgroswHo2zdD56Op8puGGG21S68XOTaCbvlCPRbGbWAdKlErZa', 1, '1', '1', NULL, NULL, NULL),
(2, 'festive 5', 'festive5@superadmin.com', NULL, '$2y$12$zJj0Z6IKppY0Jg3Ile9a9.H/GL2OJD1TmMfUUQ8CSWDFlU3wcidNO', 1, '1', '1', NULL, NULL, NULL),
(3, 'festive', 'festive@superadmin.com', NULL, '$2y$10$QnVDgroswHo2zdD56Op8puGGG21S68XOTaCbvlCPRbGbWAdKlErZa', 1, '1', '1', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catalogs`
--
ALTER TABLE `catalogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_enquiries`
--
ALTER TABLE `customer_enquiries`
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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

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
-- Indexes for table `quotationlists`
--
ALTER TABLE `quotationlists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotationproducts`
--
ALTER TABLE `quotationproducts`
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
-- AUTO_INCREMENT for table `catalogs`
--
ALTER TABLE `catalogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer_enquiries`
--
ALTER TABLE `customer_enquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `quotationlists`
--
ALTER TABLE `quotationlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `quotationproducts`
--
ALTER TABLE `quotationproducts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
