-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2026 at 12:23 PM
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
-- Database: `4brokhata`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-5c785c036466adea360111aa28563bfd556b5fba', 'i:2;', 1773313847),
('laravel-cache-5c785c036466adea360111aa28563bfd556b5fba:timer', 'i:1773313847;', 1773313847);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `jobs`
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
(1, '2025_03_06_000002_create_tbl_departments_table', 1),
(2, '2025_03_10_100000_add_user_name_to_portal_users_table', 2);

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
-- Table structure for table `sessions`
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
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('1bgACrQ0Id84IMh0j2SsF6IqYrTutYYIpz7doLnN', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoia2dkcm5lNHdTZXJLTUlwR0MxT0RleDcwbHpTbUlnN2w1alEwa2pwTSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tZW1iZXJzLXBvcnRhbC9vdHAiO3M6NToicm91dGUiO3M6MTg6Im1lbWJlcnMtcG9ydGFsLm90cCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTI6ImxvZ2luX2FkbWluXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjk6Im90cF9lbWFpbCI7czoyMjoiYS5zaGFtb29uQHNvZnRsaW5rcy5hZSI7czo4OiJvdHBfY29kZSI7czo4OiIxNjE4MjQzMyI7czoxNDoib3RwX2V4cGlyZXNfYXQiO2k6MTc3MTY3ODEwMTt9', 1771677505),
('emyfrxiQ03hEYxGscSkeHhvaKbkSPur59hqgWaBs', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'YTozOntzOjY6Il9mbGFzaCI7YToyOntzOjM6Im5ldyI7YTowOnt9czozOiJvbGQiO2E6MDp7fX1zOjk6Il9wcmV2aW91cyI7YToyOntzOjM6InVybCI7czozNjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL21lbWJlcnMtcG9ydGFsIjtzOjU6InJvdXRlIjtzOjE0OiJtZW1iZXJzLXBvcnRhbCI7fXM6NjoiX3Rva2VuIjtzOjQwOiJQQzVrOG1TM3FKSVZNVldCM2hMYllhVDZNSDlaem51TGtEb3hzdmxSIjt9', 1771677892),
('JJO703agJAVA7pyepdbO7TkpX76iNWL4Of2M96CA', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il9mbGFzaCI7YToyOntzOjM6Im5ldyI7YTowOnt9czozOiJvbGQiO2E6MDp7fX1zOjk6Il9wcmV2aW91cyI7YToyOntzOjM6InVybCI7czozNjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL21lbWJlcnMtcG9ydGFsIjtzOjU6InJvdXRlIjtzOjE0OiJtZW1iZXJzLXBvcnRhbCI7fXM6NjoiX3Rva2VuIjtzOjQwOiJpWTR2TkhCMjBIVTdVVDlnZTF3dmtVdDlHT2JDZDR3VWplYVlITmlsIjtzOjk6Im90cF9lbWFpbCI7czoyMjoiYS5zaGFtb29uQHNvZnRsaW5rcy5hZSI7czo4OiJvdHBfY29kZSI7czo4OiIzOTg2MDk1NiI7czoxNDoib3RwX2V4cGlyZXNfYXQiO2k6MTc3MTY3ODMxNTt9', 1771677845),
('KKCTZGx9CBB6vEnU1hnfyj2n1KRN80Q4F49dMhxC', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il9mbGFzaCI7YToyOntzOjM6Im5ldyI7YTowOnt9czozOiJvbGQiO2E6MDp7fX1zOjk6Il9wcmV2aW91cyI7YToyOntzOjM6InVybCI7czo0MDoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL21lbWJlcnMtcG9ydGFsL290cCI7czo1OiJyb3V0ZSI7czoxODoibWVtYmVycy1wb3J0YWwub3RwIjt9czo2OiJfdG9rZW4iO3M6NDA6IlJlRWJlcG81TjhRWmd5UzNMY25ueU5xajNiRDh2dHN2T1Y4cE9tQWQiO3M6OToib3RwX2VtYWlsIjtzOjIyOiJhLnNoYW1vb25Ac29mdGxpbmtzLmFlIjtzOjg6Im90cF9jb2RlIjtzOjg6IjMwNTA4NjQ4IjtzOjE0OiJvdHBfZXhwaXJlc19hdCI7aToxNzcxNjc4MjgzO30=', 1771677686),
('tMaqB0KFmG8h2zQcEY7ezYojk37Y0bFerQRFNdiJ', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'YTozOntzOjY6Il9mbGFzaCI7YToyOntzOjM6Im5ldyI7YTowOnt9czozOiJvbGQiO2E6MDp7fX1zOjk6Il9wcmV2aW91cyI7YToyOntzOjM6InVybCI7czozNjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL21lbWJlcnMtcG9ydGFsIjtzOjU6InJvdXRlIjtzOjE0OiJtZW1iZXJzLXBvcnRhbCI7fXM6NjoiX3Rva2VuIjtzOjQwOiJrMGxqaWl3a1RyaTFROFFHbHdKUEpjbXVaQXcwNGtCYUNSMTBVWXpwIjt9', 1771681248),
('u3UTWGYWJNyboCS3vCv5nKivhMblBAzU1dEMi1Yl', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiTjdUaDFyaGowT0lhc2hRNkRBcDJVNGw4QTNqVVpBTE1ZdU9YcFRnQiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tZW1iZXJzLXBvcnRhbC9vdHAiO3M6NToicm91dGUiO3M6MTg6Im1lbWJlcnMtcG9ydGFsLm90cCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6OToib3RwX2VtYWlsIjtzOjIyOiJhLnNoYW1vb25Ac29mdGxpbmtzLmFlIjtzOjg6Im90cF9jb2RlIjtzOjg6IjUzNzI4MjAwIjtzOjE0OiJvdHBfZXhwaXJlc19hdCI7aToxNzcxNjgxODIzO30=', 1771681227),
('wx6A4VqxRloX3RNKJA5Fwm48EqA9PAwtpVtAZxOt', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiNVFmUG1VS01JYTZ1bEhVcnJITmhaY0xhWHY3STIzYzdHMFMzOHB0NiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tZW1iZXJzLXBvcnRhbC9vdHAiO3M6NToicm91dGUiO3M6MTg6Im1lbWJlcnMtcG9ydGFsLm90cCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6OToib3RwX2VtYWlsIjtzOjIyOiJhLnNoYW1vb25Ac29mdGxpbmtzLmFlIjtzOjg6Im90cF9jb2RlIjtzOjg6IjMzMTMxMTczIjtzOjE0OiJvdHBfZXhwaXJlc19hdCI7aToxNzcxNjc4NDY3O30=', 1771677871);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `employee_ad_id` varchar(100) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `remember_token` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `theme_color` varchar(50) DEFAULT NULL,
  `user_type` enum('custom','all') NOT NULL DEFAULT 'custom',
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `employee_ad_id`, `is_active`, `remember_token`, `password`, `theme_color`, `user_type`, `is_deleted`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'admin', 1, 'g8Yt0Oum2GUuGh2WYNgdCvmEgWp4VjoVxRTuZem0ULTDluCN2hgijOJNcsYw', '$2y$12$.MPwjsdQrgzDzARkE4IZEuvVagoYLKdrP29xKyXsyWBOaZWhzyMq2', NULL, 'all', 0, NULL, '2026-02-06 10:18:10', '2026-02-06 10:18:10'),
(2, 'company', 1, 'IjMXkfhA5nYtUXsgYmWO8caIo6O1zCZTa2ewxaGHBPwSD7ZClAN7N3rVZrPq', '$2y$12$.MPwjsdQrgzDzARkE4IZEuvVagoYLKdrP29xKyXsyWBOaZWhzyMq2', NULL, 'custom', 0, NULL, '2026-03-09 06:26:28', '2026-03-09 06:26:28'),
(3, 'kashif', 1, 'ks1AiYTqI5N2wJPkcHN6ZDjK2Cgk5JfzoAtz99GO6LbLEs0r0H86Ta9qQZqx', '$2y$12$iw/4CIJKQSTWqAQegNakeuhDdtDH8qhUy.yeltCi7ZsIW.KL/SUDq', NULL, 'custom', 0, NULL, '2026-03-10 01:22:11', '2026-03-10 01:22:11'),
(4, 'sdfsfsdf', 1, NULL, '$2y$12$eP31XZUXxSEahxtdV9hD3unktIuKDTzKHSf36bTnnQluPppblgLxm', NULL, 'custom', 0, NULL, '2026-03-12 05:55:31', '2026-03-12 05:55:31'),
(5, 'SADFASFAD', 1, NULL, '$2y$12$g00Zmxho5fzBZUvYTbMiVOYiA5d1x5LxAGVRG4gWOnml3..9Fc3te', NULL, 'custom', 0, NULL, '2026-03-12 05:57:40', '2026-03-12 05:57:40'),
(6, 'amjad', 1, 'NdpwxZ5YwmKouyO3EXFd16n2IG2THZOzFe9wxfcDoFnCxaxMGMovfYuQ9BQO', '$2y$12$8Ll0KrjGv2hTszAKkyWF5e1bggLKH//r0ywKbb3FhvXFI7qDl6tuO', NULL, 'custom', 0, NULL, '2026-03-12 06:07:36', '2026-03-12 06:07:36');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_user_roles`
--

CREATE TABLE `tbl_admin_user_roles` (
  `ID` int(10) UNSIGNED NOT NULL,
  `admin_ID` int(10) UNSIGNED NOT NULL,
  `role_ID` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_admin_user_roles`
--

INSERT INTO `tbl_admin_user_roles` (`ID`, `admin_ID`, `role_ID`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2026-02-06 10:18:10', '2026-02-06 10:18:10'),
(3, 2, 3, '2026-03-12 05:34:14', '2026-03-12 05:34:14'),
(4, 4, 3, '2026-03-12 05:55:31', '2026-03-12 05:55:31'),
(5, 3, 3, '2026-03-12 05:55:44', '2026-03-12 05:55:44'),
(6, 5, 3, '2026-03-12 05:57:40', '2026-03-12 05:57:40'),
(8, 6, 3, '2026-03-12 06:08:07', '2026-03-12 06:08:07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_departments`
--

CREATE TABLE `tbl_departments` (
  `ID` int(10) UNSIGNED NOT NULL,
  `company_ID` int(11) DEFAULT NULL,
  `department_slug` varchar(100) DEFAULT NULL,
  `department_name` varchar(155) DEFAULT NULL,
  `about_department` text DEFAULT NULL,
  `department_icon` text DEFAULT NULL,
  `highlights` text DEFAULT NULL,
  `department_head_ad_id` varchar(100) DEFAULT NULL,
  `sts` tinyint(4) DEFAULT 1 COMMENT '0=inactive, 1=active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `display_order` int(11) DEFAULT NULL,
  `direct_to_head_profile` tinyint(4) DEFAULT 0 COMMENT '0=No, 1=Yes',
  `email_recipient_ad_id` varchar(100) DEFAULT NULL,
  `category_ID` int(11) DEFAULT NULL,
  `show_on_suggestion` tinyint(4) DEFAULT 0,
  `newlayout` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_departments`
--

INSERT INTO `tbl_departments` (`ID`, `company_ID`, `department_slug`, `department_name`, `about_department`, `department_icon`, `highlights`, `department_head_ad_id`, `sts`, `created_at`, `updated_at`, `display_order`, `direct_to_head_profile`, `email_recipient_ad_id`, `category_ID`, `show_on_suggestion`, `newlayout`) VALUES
(1, 1, 'finance', 'Finance', 'Financial Management & Business Solutions', 'icd-dashboard/images/nav-icon-2.svg', NULL, NULL, 1, NULL, NULL, 1, 0, NULL, NULL, 0, 0),
(2, 2, 'human-resources', 'Human Resources', 'Talent Management & Employee Services', 'icd-dashboard/images/nav-icon-3.svg', NULL, NULL, 1, NULL, NULL, 2, 0, NULL, NULL, 0, 0),
(3, NULL, 'investment', 'Investment', 'Investment Management & Portfolio Solutions', 'icd-dashboard/images/nav-icon-4.svg', NULL, NULL, 1, NULL, NULL, 3, 0, NULL, NULL, 0, 0),
(4, NULL, 'risk-audit', 'Risk & Audit', 'Risk Management & Compliance Solutions', 'icd-dashboard/images/nav-icon-5.svg', NULL, NULL, 1, NULL, NULL, 4, 0, NULL, NULL, 0, 0),
(5, NULL, 'information-technology', 'Information Technology', 'Information Technology', 'icd-dashboard/images/nav-icon-6.svg', NULL, NULL, 1, NULL, NULL, 5, 0, NULL, NULL, 0, 0),
(6, NULL, 'procurement', 'Procurement', NULL, 'icd-dashboard/images/nav-icon-6.svg', NULL, NULL, 1, NULL, NULL, 6, 0, NULL, NULL, 0, 0),
(7, NULL, 'tax', 'Tax', NULL, 'icd-dashboard/images/nav-icon-5.svg', NULL, NULL, 1, NULL, NULL, 7, 0, NULL, NULL, 0, 0),
(8, NULL, 'intranet', 'Intranet', NULL, 'icd-dashboard/images/nav-icon-1.svg', NULL, NULL, 1, NULL, NULL, 8, 0, NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employees`
--

CREATE TABLE `tbl_employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_ad_id` varchar(250) DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `email` varchar(155) NOT NULL,
  `phone_number` varchar(30) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_employees`
--

INSERT INTO `tbl_employees` (`id`, `employee_ad_id`, `status`, `first_name`, `last_name`, `image`, `email`, `phone_number`, `gender`, `created_at`, `updated_at`) VALUES
(1, 'admin', 1, 'Abdullah', 'Shamoon', 'storage/portal_users/KxidiwlEZTc2rTxWD4HGbGt5Huzoi3gpOFnwHl5A.png', 'a.shamoon@softlinks.ae', '03445473718', 'male', '2026-02-06 08:22:56', '2026-02-20 04:53:27'),
(4, 'kashif', 1, 'Kashif', 'Ali', 'storage/portal_users/69b29bb07ff514.93721493.png', 'kashif@gmail.com', '3453453453345', 'male', '2026-03-10 01:22:10', '2026-03-12 05:55:44'),
(5, 'sdfsfsdf', 1, 'adsfsf', 'sdfsdf', 'storage/portal_users/69b29ba3736e81.77505285.png', 'alikashsdfi54321@gmail.com', '03057502419', 'female', '2026-03-12 05:55:31', '2026-03-12 05:55:31'),
(6, 'SADFASFAD', 1, 'ASDF', 'ASFDSAF', NULL, 'alikashiEE54321@gmail.com', '03057502419', 'female', '2026-03-12 05:57:40', '2026-03-12 05:57:40'),
(7, 'amjad', 1, 'Amjad', 'Amjad', 'storage/portal_users/69b29e789e7467.76962765.jpg', 'amjadali@gmail.com', '03057502419', 'male', '2026-03-12 06:07:36', '2026-03-12 06:07:36');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_modules`
--

CREATE TABLE `tbl_modules` (
  `ID` int(10) UNSIGNED NOT NULL,
  `module_category_ID` int(10) UNSIGNED NOT NULL,
  `module_name` varchar(155) NOT NULL,
  `route` varchar(155) NOT NULL,
  `show_in_menu` tinyint(4) NOT NULL DEFAULT 1,
  `css_class` varchar(100) DEFAULT NULL,
  `display_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_modules`
--

INSERT INTO `tbl_modules` (`ID`, `module_category_ID`, `module_name`, `route`, `show_in_menu`, `css_class`, `display_order`, `created_at`, `updated_at`) VALUES
(1, 1, 'Dashboard', 'admin/dashboard', 1, NULL, 1, '2026-02-06 10:18:10', '2026-02-06 10:18:10'),
(2, 2, 'Module Categories', 'admin/acl/module-categories', 1, NULL, 1, '2026-02-06 10:18:10', '2026-02-06 10:18:10'),
(3, 2, 'Modules', 'admin/acl/module', 1, NULL, 2, '2026-02-06 10:18:10', '2026-02-06 10:18:10'),
(4, 3, 'Portal Users', 'admin/acl/portal-users', 1, NULL, 100, '2026-02-06 12:55:29', '2026-02-06 12:55:29'),
(5, 3, 'Add User', 'admin/acl/portal-users/add', 0, NULL, 101, '2026-02-06 12:57:59', '2026-02-06 12:57:59'),
(6, 3, 'Edit User', 'admin/acl/portal-users/edit', 0, NULL, 102, '2026-02-06 12:58:00', '2026-02-06 12:58:00'),
(7, 3, 'Delete User', 'admin/acl/portal-users/delete', 0, NULL, 103, '2026-02-06 12:58:00', '2026-02-06 12:58:00'),
(49, 2, 'Add Module Category', 'admin/acl/module-categories/add', 0, NULL, 4, '2026-02-20 12:23:51', '2026-02-20 12:23:51'),
(50, 2, 'Edit Module Category', 'admin/acl/module-categories/edit', 0, NULL, 5, '2026-02-20 12:23:51', '2026-02-20 12:23:51'),
(51, 2, 'Delete Module Category', 'admin/acl/module-categories/delete', 0, NULL, 6, '2026-02-20 12:23:51', '2026-02-20 12:23:51'),
(52, 2, 'Add Module', 'admin/acl/module/add', 0, NULL, 11, '2026-02-20 12:31:43', '2026-02-20 12:31:43'),
(53, 2, 'Edit Module', 'admin/acl/module/edit', 0, NULL, 12, '2026-02-20 12:31:43', '2026-02-20 12:31:43'),
(54, 2, 'Delete Module', 'admin/acl/module/delete', 0, NULL, 13, '2026-02-20 12:31:43', '2026-02-20 12:31:43'),
(57, 2, 'Roles', 'admin/acl/roles', 1, NULL, 0, '2026-02-23 04:27:19', '2026-02-23 04:27:19'),
(58, 2, 'Show Role Detail', 'admin/acl/roles/show/{token}', 0, NULL, 0, '2026-02-23 04:28:05', '2026-02-23 04:28:05'),
(59, 2, 'Edit Role', 'admin/acl/roles/edit/{token}', 0, NULL, 0, '2026-02-23 04:28:33', '2026-02-23 04:28:33'),
(60, 2, 'Add Role', 'admin/acl/roles/add', 0, NULL, 0, '2026-02-23 04:29:01', '2026-02-23 04:29:01'),
(61, 2, 'Delete Role', 'admin/acl/module/delete/{token}', 0, NULL, 0, '2026-02-23 04:29:46', '2026-02-23 04:29:46'),
(62, 17, 'Projects Listing', 'icd-projects', 0, NULL, 0, '2026-03-06 06:03:24', '2026-03-06 06:03:24'),
(63, 17, 'ICD Projects', 'admin/icd-projects', 1, NULL, 13, '2026-03-09 00:21:40', '2026-03-09 00:21:40'),
(64, 17, 'ICD Projects Add', 'admin/icd-projects/add', 0, NULL, 2, '2026-03-09 00:21:40', '2026-03-09 00:21:40'),
(65, 17, 'ICD Projects Edit', 'admin/icd-projects/edit', 0, NULL, 3, '2026-03-09 00:21:40', '2026-03-09 00:21:40'),
(66, 17, 'ICD Projects Show', 'admin/icd-projects/show', 0, NULL, 4, '2026-03-09 00:21:40', '2026-03-09 00:21:40'),
(67, 17, 'ICD Projects Delete', 'admin/icd-projects/delete', 0, NULL, 5, '2026-03-09 00:21:40', '2026-03-09 00:21:40'),
(68, 17, 'safsdf', 'sdfsdf', 0, NULL, 0, '2026-03-12 01:22:37', '2026-03-12 01:22:37');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_module_categories`
--

CREATE TABLE `tbl_module_categories` (
  `ID` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(155) NOT NULL,
  `css_class` varchar(100) DEFAULT NULL,
  `display_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_module_categories`
--

INSERT INTO `tbl_module_categories` (`ID`, `category_name`, `css_class`, `display_order`, `created_at`, `updated_at`) VALUES
(1, 'Dashboard', NULL, 1, '2026-02-06 10:18:10', '2026-02-06 10:18:10'),
(2, 'ACL', NULL, 2, '2026-02-06 10:18:10', '2026-02-06 10:18:10'),
(3, 'Users', NULL, 10, '2026-02-06 12:51:59', '2026-02-06 12:51:59'),
(17, 'Projects', NULL, 11, '2026-03-06 05:55:55', '2026-03-06 05:55:55');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `ID` int(10) UNSIGNED NOT NULL,
  `role_name` varchar(155) NOT NULL,
  `display_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`ID`, `role_name`, `display_order`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 1, '2026-02-06 10:18:10', '2026-02-06 10:18:10'),
(3, 'Company User', 0, '2026-03-09 05:42:28', '2026-03-09 05:42:28');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role_privileges`
--

CREATE TABLE `tbl_role_privileges` (
  `ID` int(10) UNSIGNED NOT NULL,
  `role_ID` int(10) UNSIGNED NOT NULL,
  `module_ID` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_role_privileges`
--

INSERT INTO `tbl_role_privileges` (`ID`, `role_ID`, `module_ID`, `created_at`, `updated_at`) VALUES
(99, 1, 62, '2026-03-09 03:53:58', '2026-03-09 03:53:58'),
(100, 1, 63, '2026-03-09 03:53:58', '2026-03-09 03:53:58'),
(101, 1, 64, '2026-03-09 03:53:58', '2026-03-09 03:53:58'),
(102, 1, 65, '2026-03-09 03:53:58', '2026-03-09 03:53:58'),
(103, 1, 66, '2026-03-09 03:53:58', '2026-03-09 03:53:58'),
(104, 1, 67, '2026-03-09 03:53:58', '2026-03-09 03:53:58'),
(105, 1, 1, '2026-03-09 03:53:58', '2026-03-09 03:53:58'),
(106, 1, 60, '2026-03-09 03:53:58', '2026-03-09 03:53:58'),
(107, 1, 59, '2026-03-09 03:53:58', '2026-03-09 03:53:58'),
(108, 1, 57, '2026-03-09 03:53:58', '2026-03-09 03:53:58'),
(109, 1, 58, '2026-03-09 03:53:58', '2026-03-09 03:53:58'),
(110, 1, 2, '2026-03-09 03:53:58', '2026-03-09 03:53:58'),
(111, 1, 3, '2026-03-09 03:53:58', '2026-03-09 03:53:58'),
(112, 1, 49, '2026-03-09 03:53:58', '2026-03-09 03:53:58'),
(113, 1, 50, '2026-03-09 03:53:58', '2026-03-09 03:53:58'),
(114, 1, 51, '2026-03-09 03:53:58', '2026-03-09 03:53:58'),
(115, 1, 52, '2026-03-09 03:53:58', '2026-03-09 03:53:58'),
(116, 1, 53, '2026-03-09 03:53:58', '2026-03-09 03:53:58'),
(117, 1, 54, '2026-03-09 03:53:58', '2026-03-09 03:53:58'),
(118, 1, 4, '2026-03-09 03:53:58', '2026-03-09 03:53:58'),
(119, 1, 5, '2026-03-09 03:53:58', '2026-03-09 03:53:58'),
(120, 1, 6, '2026-03-09 03:53:58', '2026-03-09 03:53:58'),
(121, 1, 7, '2026-03-09 03:53:59', '2026-03-09 03:53:59'),
(128, 3, 1, '2026-03-12 05:32:54', '2026-03-12 05:32:54'),
(129, 3, 4, '2026-03-12 05:32:54', '2026-03-12 05:32:54'),
(130, 3, 5, '2026-03-12 05:32:54', '2026-03-12 05:32:54'),
(131, 3, 6, '2026-03-12 05:32:54', '2026-03-12 05:32:54'),
(132, 3, 7, '2026-03-12 05:32:54', '2026-03-12 05:32:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tbl_admin_user_name_unique` (`employee_ad_id`);

--
-- Indexes for table `tbl_admin_user_roles`
--
ALTER TABLE `tbl_admin_user_roles`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `tbl_admin_user_roles_admin_ID_index` (`admin_ID`),
  ADD KEY `tbl_admin_user_roles_role_ID_index` (`role_ID`);

--
-- Indexes for table `tbl_departments`
--
ALTER TABLE `tbl_departments`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `tbl_departments_department_slug_unique` (`department_slug`);

--
-- Indexes for table `tbl_employees`
--
ALTER TABLE `tbl_employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `portal_users_email_unique` (`email`);

--
-- Indexes for table `tbl_modules`
--
ALTER TABLE `tbl_modules`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `tbl_modules_module_category_ID_index` (`module_category_ID`);

--
-- Indexes for table `tbl_module_categories`
--
ALTER TABLE `tbl_module_categories`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_role_privileges`
--
ALTER TABLE `tbl_role_privileges`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `tbl_role_privileges_role_ID_index` (`role_ID`),
  ADD KEY `tbl_role_privileges_module_ID_index` (`module_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_admin_user_roles`
--
ALTER TABLE `tbl_admin_user_roles`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_departments`
--
ALTER TABLE `tbl_departments`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_employees`
--
ALTER TABLE `tbl_employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_modules`
--
ALTER TABLE `tbl_modules`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `tbl_module_categories`
--
ALTER TABLE `tbl_module_categories`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_role_privileges`
--
ALTER TABLE `tbl_role_privileges`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_admin_user_roles`
--
ALTER TABLE `tbl_admin_user_roles`
  ADD CONSTRAINT `tbl_admin_user_roles_admin_fk` FOREIGN KEY (`admin_ID`) REFERENCES `tbl_admin` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_admin_user_roles_role_fk` FOREIGN KEY (`role_ID`) REFERENCES `tbl_roles` (`ID`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_modules`
--
ALTER TABLE `tbl_modules`
  ADD CONSTRAINT `tbl_modules_category_fk` FOREIGN KEY (`module_category_ID`) REFERENCES `tbl_module_categories` (`ID`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_role_privileges`
--
ALTER TABLE `tbl_role_privileges`
  ADD CONSTRAINT `tbl_role_privileges_module_fk` FOREIGN KEY (`module_ID`) REFERENCES `tbl_modules` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_role_privileges_role_fk` FOREIGN KEY (`role_ID`) REFERENCES `tbl_roles` (`ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
